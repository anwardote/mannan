<?php

class Pcategory_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /*
     * Get pcategory by id
     */

    function get_pcategory($id) {
        return $this->db->get_where('pcategories', array('id' => $id))->row_array();
    }

    /*
     * Get all pcategories
     */

    function get_all_pcategories() {
        return $this->db->get('pcategories')->result_array();
    }

    /*
     * function to add new pcategory
     */

    function add_pcategory($params) {
        $this->db->insert('pcategories', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update pcategory
     */

    function update_pcategory($id, $params) {
        $this->db->where('id', $id);
        $this->db->update('pcategories', $params);
    }

    /*
     * function to delete pcategory
     */

    function delete_pcategory($id, $dir) {
        $this->delete_thumb($id, $dir);
        $this->db->delete('pcategories', array('id' => $id));
    }

    protected function delete_thumb($id, $dir) {
        $data = $this->get_pcategory($id);

        if (!empty($data['thumbnil'])) {
            $thumb = $data['thumbnil'];
            $thumbArr = explode(".", $thumb);
            $thumbnil_thumb = $thumbArr['0'] . "_thumb." . $thumbArr['1'];
            @unlink('assets/uploads/' . $dir . "/" . $thumb);
            @unlink('assets/uploads/' . $dir . "/" . $thumbnil_thumb);
        }
    }

}
