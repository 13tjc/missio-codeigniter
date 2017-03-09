<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class File extends MY_Controller {

    private $upload_dirs = array('media' => '/var/www/html/media/', 'carousel' => '/var/www/html/carousel/', 'resources' => '/var/www/html/_resources/');
    private $mime_types = array(
        'document' => array(
            'pdf' => 'application/pdf'
        ),
        'photo' => array(
            'jfif' => 'image/jpeg',
            'jfif-tbnl' => 'image/jpeg',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'x-png' => 'image/png'
        ),
        'video' => array(
            'avi' => 'video/avi',
            'm1v' => 'video/mpeg',
            'm2v' => 'video/mpeg',
            'mp2' => 'video/mpeg',
            'mp3' => 'video/mpeg',
            'mpa' => 'video/mpeg',
            'mpe' => 'video/mpeg',
            'mpeg' => 'video/mpeg',
            'mpg' => 'video/mpeg',
            'mp4' => 'video/mp4',
            'moov' => 'video/quicktime',
            'mov' => 'video/quicktime',
            'qt' => 'video/quicktime'
        )
    );

    function __construct() {
        parent::__construct();
    }

    public function upload($module = 'media') {
        $upload_dir = $this->upload_dirs[$module];
        $response['success'] = false;
        if (!empty($_FILES)) {
            foreach ($_FILES as $type => $file) {
                $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                if ($file['error'] > 0) {
                    switch ($file['error']) {
                        case '1': // The uploaded file exceeds the upload_max_filesize directive in php.ini
                        case '2': // The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form
                            $response['message'] = 'Maximum file size is 100MB';
                            break;
                        case '3': // The uploaded file was only partially uploaded
                        case '4': // No file was uploaded
                        case '6': // Missing a temporary folder
                        case '7': // Failed to write file to disk
                        case '8': // File upload stopped by extension
                        case '999': // Unknown
                        default:
                            $response['message'] = 'An error occured while uploading the file. Please try again';
                    }
                } elseif (!in_array($extension, array_keys($this->mime_types[$type]))) {
                    $response['message'] = 'Invalid file type';
                } elseif (empty($file['tmp_name']) || $file['tmp_name'] == 'none') {
                    $response['message'] = 'No file was uploaded';
                } else {
                    if ($type === 'image' || $module === 'carousel') {
                        $this->processImage($file['tmp_name'], $module);
                    }
                    $md5_name = @md5_file($file['tmp_name']);
                    $data = array(
                        'name' => $file['name'],
                        'size' => @filesize($file['tmp_name']),
                        'file' => $md5_name . '.' . $extension,
                        'type' => $this->mime_types[$type][$extension],
                        'location'=> $upload_dir . $data['file']
                    );
                    if ($module === 'media') {
                        if ($type === 'video') {
                            $upload_dir .= 'videos/';
                            $fp = explode('.', $data['file']);
                            $data['file'] = $fp[0];
                        } else {
                            $upload_dir .= 'photos/';
                        }
                    }
                    // Check the upload directory. Create it if not exist
                    if (!is_dir($upload_dir)) {
                        mkdir($upload_dir, 0777, true);
                    }
                    // move the file into its final destination
                    $r = rename($file['tmp_name'], $upload_dir . $data['file']);
                    //for security reason, we force to remove all uploaded file
                    //@unlink($file);
                    $response = array('success' => true, 'message' => 'Your file has been uploaded successfully', 'file' => $data);
                }
            }
        }
        // Detect ie 8 and 9 and trat the header differently
        if (preg_match('/(?i)msie [8-9]/', $_SERVER['HTTP_USER_AGENT'])) {
            $this->print_json_as_text($response);
        } else {
            $this->print_json($response);
        }
    }

    private function processImage($file, $module) {
        list($w, $h, $type) = getimagesize($file);
        $config = array('source_image' => $file, 'maintain_ratio' => false);
        if ($module === 'media') {
            if ($w > $h) {
                $config['width'] = 800;
                $config['height'] = 800 * $h / $w;
            } else {
                $config['height'] = 800;
                $config['width'] = 800 * $w / $h;
            }
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
        } elseif ($module === 'carousel' || $module === 'resources') {
            if ($w < $h) {
                $th = $w * 0.75;
                $config['height'] = $th;
                $config['y_axis'] = ($h - $th) / 2;
            } else {
                $tw = $h / 0.75;
                $config['width'] = $tw;
                $config['x_axis'] = ($w - $tw) / 2;
            }
            $this->load->library('image_lib', $config);
            $this->image_lib->crop();
        }
    }

}
