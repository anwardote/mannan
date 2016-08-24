<?php

class Rank_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /*
     * Get rank by id
     */

    function get_rank($id) {
        return $this->db->get_where('ranks', array('id' => $id))->row_array();
    }

    /*
     * Get all ranks
     */

    function get_all_ranks() {
        return $this->db->get('ranks')->result_array();
    }

    /*
     * function to add new rank
     */

    function add_rank($params) {
        $this->db->insert('ranks', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update rank
     */

    function update_rank($id, $params) {
        $this->db->where('id', $id);
        $this->db->update('ranks', $params);
    }

    /*
     * function to delete rank
     */

    function delete_rank($id) {
        $this->db->delete('ranks', array('is_deleted' => "1"), array('id' => $id));
    }

}
