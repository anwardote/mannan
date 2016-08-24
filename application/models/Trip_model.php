<?php

/*
 * Generated by CRUDigniter v2.3 Beta 
 * www.crudigniter.com
 */

class Trip_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * Get trip by id
     */

    function get_trip($id) {
        return $this->db->get_where('trips', array('id' => $id))->row_array();
    }

    /*
     * Get all trips
     */

    function get_all_trips() {
        return $this->db->get('trips')->result_array();
    }

    /*
     * function to add new trip
     */

    function add_trip($params) {
        $this->db->insert('trips', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update trip
     */

    function update_trip($id, $params) {
        $this->db->where('id', $id);
        $this->db->update('trips', $params);
    }

    /*
     * function to delete trip
     */

    function delete_trip($id, $dir) {
        // $this->db->delete('trips', array('id' => $id));
        // $this->db->update('trips', array('is_deleted' => "1"), array('id' => $id));
        $this->delete_thumb($id, $dir);
        $this->db->delete('trips', array('id' => $id));
        
    }

    protected function delete_thumb($id, $dir) {
        $data = $this->get_trip($id);

        if (!empty($data['thumbnil'])) {
            $thumb = $data['thumbnil'];
            $thumbArr = explode(".", $thumb);
            $thumbnil_thumb = $thumbArr['0'] . "_thumb." . $thumbArr['1'];
            @unlink('assets/uploads/' . $dir . "/" . $thumb);
            @unlink('assets/uploads/' . $dir . "/" . $thumbnil_thumb);
        }
    }

}