<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CLI extends MY_Controller {

    const THUMB_MIN_AREA = 229401; // 639 x 359;
    const WAIT_FOR_HD_THRESHOLD = 3600;   // one hour

    protected $upload_dir = null;
    protected $max_upload_attempts = 10;
    protected $album_id = null; // from config/vimeo.php
    protected $error_log = '';
    protected $error_log_file = '/tmp/missio-cron-error.log';
    protected $DEBUG = true;
    protected $WARN = 3;
    protected $ERROR = 2;
    protected $FATAL = 1;
    protected $ERROR_STATUS_BY_INT = array(
        1 => 'FATAL',
        2 => 'ERROR',
        3 => 'WARN',
    );

    public function __construct() {
        parent::__construct();
        $this->is_cli();
        $this->load->config('vimeo');
        $this->upload_dir = rtrim($this->config->item('upload_dir'), '/');
        $this->album_id = $this->config->item('album_id');
        $this->load->model('cli_model');
    }

    public function __destruct() {
        if (!$this->error_log) {
            return;
        }
        @file_put_contents($this->error_log_file, $this->error_log, FILE_APPEND);
    }

    public function update_data() {
        $this->load->library('propfaith');
        $this->update_subcategories();
        $this->update_subtypes();
    }

    public function update_subcategories() {
        $result = $this->propfaith->getProjectCategories();
        $this->cli_model->updateProjectCategories($result);
    }

    public function update_subtypes() {
        $result = $this->propfaith->getProjectTypes();
        $this->cli_model->updateProjectTypes($result);
    }

    /**
     *
     * 1) upload(): Uploads any LOCAL video files to Vimeo
     * 2) check():  Checks the status of any TRANSCODING videos
     * 3) meta(): Grab poster & thumbnail for any TRANSCODED files
     * 4) NOT USING BITLY: bitly():  Generate and store the bit.ly URLs for all entries
     *
     * @return void
     */
    public function process_videos() {
        // Video Statuses
        // --------------
        // LOCAL        video file has been uploaded to our server
        // UPLOADING    a crontask is uploading the video to Vimeo
        // TRANSCODING  the video file has been uploaded and is being processed by Vimeo
        // TRANSCODED   Vimeo has finished transcoding the video
        // READY        width, height, duration, file, and suitable thumbnail has been rendered
        // FAILED       either the video failed to upload or transcode
        // call list
        foreach (array('upload', 'check', 'meta') as $func) {
            call_user_func(array($this, $func));
        }
    }

    /**
     * Upload LOCAL videos to Vimeo
     *
     * Set status to TRANSCODING on success
     *
     * @return string   Vimeo's id for this video or null
     */
    public function upload() {

        // this call to getNextUploadEntry() will auto-lock the row
        $video = $this->cli_model->getNextUploadVideo();
        if (!$video) {
            return;
        }

        $file = rtrim($this->upload_dir, '/') . '/' . @$video['md5'];
        if (!@$video['md5'] || !file_exists($file)) {
            $this->cli_model->updateVideo($video['md5'], array(
                'status' => 'FAILED',
            ));
            $this->error('No md5 file found for video id ' . $video['md5'] . PHP_EOL);
            $this->upload();
            return;
        }

        $this->load->library('Vimeo');
        $attempt = 1;
        do {
            $uri = $this->vimeo->upload($file);
            if (!$uri) {
                self::error("Vimeo bug (empty header): " . $file);
                self::error("Re-trying upload: " . $file);
            }
        } while (!$uri && ++$attempt <= $this->max_upload_attempts); // Retry in case of the Vimeo bug (empty header)
        // reconnect to DB as the upload might have exceeded our mysql timeout
        $this->db->reconnect();

        if (!$uri) {
            // Failed to upload for whatever reason, must manually change
            // status from FAILED back to LOCAL.
            // Source video file will NOT be removed since it failed.
            $this->error('Failed to upload video id ' . $video['md5'] . PHP_EOL);
            $this->cli_model->updateVideo($video['md5'], array(
                'status' => 'FAILED',
            ));
            $this->upload();
            return;
        }

        // grab the vimeo_id from the vimeo->upload() response
        $vimeo_id = str_replace('/videos/', '', $uri);

        if (!$this->cli_model->updateVideo($video['md5'], array(
                    'status' => 'TRANSCODING',
                    'vimeo' => $vimeo_id,
                ))) {
            // This is a bummer, all of our Vimeo calls were successful,
            // but, we failed to update the `video` with the Vimeo id.
            // This will now require someone to manually change the status
            // from UPLOADING to LOCAL so that this can be re-uploaded.
            $this->error('Failed to update ' . $video['md5'] . ' with the Vimeo id.' . PHP_EOL);
            $this->upload();
            return;
        }

        // // // DISABLED unlinking of any uploaded media, for now.
        // // At this point, Vimeo is TRANSCODING the video file and we have
        // // stored the associated vimeo id in the `video` table.  It is
        // // safe to delete the source video file.
        // @unlink($file);
        // set the video title in Vimeo. If this fails, c'est la vie!
        $this->vimeo->request('/videos/' . $vimeo_id, array(
            'name' => $video['md5']), 'PATCH');

        // Add this video to the correct album. If it failes, too bad.
        if ($this->album_id) {
            $this->vimeo->request('/me/albums/' . $this->album_id . '/videos/' . $vimeo_id, array(), 'PUT');
        }

        // recursively call this method until getNextUploadEntry() returns empty
        $this->upload();
    }

    /**
     * Check up on all TRANSCODING videos
     *
     * @return void
     */
    public function check() {
        // bring in the database library, Vimeo library, and cli_model
        $this->load->library('Vimeo');

        $videos = $this->cli_model->getVideosByStatus('TRANSCODING');
        if (!$videos) {
            return;
        }

        foreach ($videos as $video) {
            $request = $this->vimeo->request("/videos/" . $video['vimeo']);
            if (@$request['status'] !== 200 && @$request['body']['status'] !== 'available') {
                continue;
            }
            // check if the meta information is ready
            if ($meta = $this->processRequest($request)) {
                // set this video "READY" with the new meta information
                $meta['status'] = 'READY';
                $this->cli_model->updateVideo($video['md5'], $meta);
            } else {
                // update the status of this video to "TRANSCODED"
                $this->cli_model->updateVideo($video['md5'], array('status' => 'TRANSCODED'));
            }
        }
    }

    /**
     * Grab:
     *      • width of the ORIGINAL video
     *      • height of the ORIGINAL video
     *      • duration of the video
     *      • a suitable poster frame (pictures.sizes)
     *      • <video>-able src 720p URL (files[].link_secure ~ profile=113)
     *
     * Once all these criteria are met, we can set the status to READY.
     *
     * We don't have to worry so much about double-requesting
     * along with $this->check(), because the statuses are different
     * (TRANSCODING vs TRANSCODED)
     *
     * @return void
     */
    public function meta() {
        // bring in the database library, Vimeo library, and cli_model
        $this->load->library('Vimeo');
        $this->load->model('cli_model');

        $videos = $this->cli_model->getVideosByStatus('TRANSCODED');
        if (!$videos) {
            return;
        }

        foreach ($videos as $video) {
            $request = $this->vimeo->request("/videos/" . $video['vimeo']);
            if ($meta = $this->processRequest($request)) {
                // set this video "READY" with the new meta information
                $meta['status'] = 'READY';
                $this->cli_model->updateVideo($video['md5'], $meta);
            }
        }
    }

    /**
     * Parse the request body and return
     *
     *
     * @return  mixed   array() of meta fields, or false
     */
    public function processRequest($request) {
        $meta = array();
        if (@$request['status'] !== 200 || !@$request['body']['pictures']['sizes']) {
            return false;
        }
        $width = (int) @$request['body']['width'];
        $height = (int) @$request['body']['height'];
        $duration = (int) @$request['body']['duration'];
        // find a suitable sized poster frame
        $thumb = $this->thumbPick(@$request['body']['pictures']['sizes']);
        // find the 720p hd video with the 113 profile_id in the URL
        // If more than an hour has gone by since the latest video
        // has been converted, then just choose the SD version.
        $video = $this->videoPick(@$request['body']['files']);
        if (!$width || !$height || !$duration || !$thumb || !$video) {
            return false;
        }
        return compact('width', 'height', 'duration', 'thumb', 'video');
    }

    /**
     * Grab a suitable thumbnail
     *
     * Once transcoding is complete, Vimeo will start creating pictures
     * or poster frames in different sizes.  As they create one size,
     * they make it available through the API.  This means, that you
     * might not be seeing all of the poster frame pictures.
     *
     * This can make it really tricky to grab multiple poster frame sizes.
     * For a good example of code that handles this scenario, look at
     * this file (controllers/cron.php) in commit aa38da9.
     *
     * @return  mixed   (string) of image URL, or (bool) false
     */
    public function thumbPick($sizes) {
        $thumb = null;

        if (!$sizes) {
            return false;
        }
        // pick the thumb immediately larger than the minimum width and height
        foreach ($sizes as $pic) {

            // Vimeo may use a default poster image, we don't want that
            if (strpos($pic['link'], 'default') !== false) {
                continue;
            }
            if ($pic['width'] * $pic['height'] >= self::THUMB_MIN_AREA) {
                return $pic['link'];
            }
        }
        return false;
    }

    /**
     * Grab the 720p HD video (&profile_id=113)
     *
     * @return  mixed   (string) of video URL, or (bool) false
     */
    public function videoPick($files) {
        if (!$files) {
            return false;
        }
        // find the video URL with profile_id=113 in the query string
        foreach ($files as $file) {
            if ($file['quality'] === 'sd') {
                $sd = preg_replace('/&oauth2_token_id=.*$/', '', $file['link_secure']);
                $sd_timestamp = strtotime($file['created_time']);
            }
            // Vimeo may use a default poster image, we don't want that
            if (strpos($file['link_secure'], '&profile_id=113') !== false) {
                // great, we found it; but let's strip off the &oauth2= param
                return preg_replace('/&oauth2_token_id=.*$/', '', $file['link_secure']);
            }
        }
        if (@$sd && time() - $sd_timestamp > self::WAIT_FOR_HD_THRESHOLD) {
            return $sd;
        }

        return false;
    }

    protected function error($msg, $status = 3) {
        $trace = debug_backtrace();
        $caller = (@$trace[1]['class'] ? $trace[1]['class'] . '::' : '') . $trace[1]['function'];
        if ($status < 3) {
            $this->error_log .= '[' . date('Y-m-d H:i:s') . '] ' . $this->ERROR_STATUS_BY_INT[$status] . ' ' . $caller . PHP_EOL . $msg . PHP_EOL;
        }
        if ($this->DEBUG) {
            print_r($msg);
        }
        if ($status == 1) {
            // FATAL
            exit;
        }
    }

}
