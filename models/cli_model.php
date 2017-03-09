<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cli_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    public function updateProjectCategories($data) {
        foreach ($data as $category) {
            $insert_data = array('id' => $category['category_no'], 'name' => $category['description']);
            $result = $this->db->on_duplicate_update('project_category', array_keys($insert_data), $insert_data);
            if ($category['sub_categories']) {
                foreach ($category['sub_categories'] as $subcategory) {
                    $insert_data = array('id' => $subcategory['sub_category_no'], 'category_id' => $category['category_no'], 'name' => $subcategory['description']);
                    $this->db->on_duplicate_update('project_subcategory', array_keys($insert_data), $insert_data);
                }
            }
        }
    }

    public function updateProjectTypes($data) {
        foreach ($data as $type) {
            $insert_data = array('id' => $type['type_no'], 'name' => $type['description']);
            $result = $this->db->on_duplicate_update('project_type', array_keys($insert_data), $insert_data);
            if ($type['sub_types']) {
                foreach ($type['sub_types'] as $subtype) {
                    $insert_data = array('id' => $subtype['sub_type_no'], 'type_id' => $type['type_no'], 'name' => $subtype['description']);
                    $this->db->on_duplicate_update('project_subtype', array_keys($insert_data), $insert_data);
                }
            }
        }
    }

    /**
     * Update a Video
     *
     * @param  string   $update_id
     * @param  array    $set fields
     * @param  string   $timestamp
     *
     * @return boolean
     */
    public function updateVideo($md5, $fields, $timestamp = null) {
        if (!$timestamp) {
            $timestamp = date('Y-m-d H:i:s');
        }

        $this->db->set('processed_at', $timestamp)->where(compact('md5'))->update('video', $fields);

        // return null if the insert failed
        return ($this->db->affected_rows() > 0); // true or false
    }

    /**
     * Get a LOCAL video that will be uploaded to Vimeo
     *
     * @return array    $video object or empty array
     */
    public function getNextUploadVideo() {
        return $this->call('GET_LOCK_VIDEO', array('LOCAL', 'UPLOADING'));
    }

    /**
     * Get Videos By Status
     *
     * @param  string   $status         LOCAL UPLOADING TRANSCODING READY FAILED
     *
     * @return array    $entries
     */
    public function getVideosByStatus($status) {
        return $this->db->where('status', $status)->get('video')->result_array();
    }

}
