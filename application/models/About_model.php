<?php

class About_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * Get about by id
     */

    function get_about($id) {
        return $this->db->get_where('about', array('id' => $id))->row_array();
    }

    /*
     * Get all about
     */

    function get_all_about() {
        return $this->db->get('about')->result_array();
    }

    /*
     * function to add new about
     */

    function add_about($params) {
        $this->db->insert('about', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update about
     */

    function update_about($id, $params) {
        $this->db->where('id', $id);
        $this->db->update('about', $params);
    }

    /*
     * function to delete about
     */

    function delete_about($id) {
        $this->db->delete('about', array('is_hidden' => "1"), array('id' => $id));
    }

}
