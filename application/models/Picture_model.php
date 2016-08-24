<?php

class Picture_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /*
     * Get picture by id
     */

    function get_picture($id) {
        return $this->db->get_where('pictures', array('id' => $id))->row_array();
    }

    /*
     * Get all pictures
     */

    function get_all_pictures() {
        return $this->db->get('pictures')->result_array();
    }

    /*
     * function to add new picture
     */

    function add_picture($params) {
        $this->db->insert('pictures', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update picture
     */

    function update_picture($id, $params) {
        $this->db->where('id', $id);
        $this->db->update('pictures', $params);
    }

    /*
     * function to delete picture
     */

    function delete_picture($id, $dir) {
        $this->delete_thumb($id, $dir);
        $this->db->delete('pictures', array('id' => $id));
    }

    protected function delete_thumb($id, $dir) {
        $data = $this->get_picture($id);
        if (!empty($data['thumbnil'])) {
            $thumb = $data['thumbnil'];
            $thumbArr = explode(".", $thumb);
            $thumbnil_thumb = $thumbArr['0'] . "_thumb." . $thumbArr['1'];
            @unlink('assets/uploads/' . $dir . "/" . $thumb);
            @unlink('assets/uploads/' . $dir . "/" . $thumbnil_thumb);
        }
    }

}
