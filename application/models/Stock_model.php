<?php

class Stock_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /*
     * Get stock by id
     */

    function get_stock($id) {
        return $this->db->get_where('stocks', array('id' => $id))->row_array();
    }

    /*
     * Get all stocks
     */

    function get_all_stocks() {
        return $this->db->get('stocks')->result_array();
    }

    /*
     * function to add new stock
     */

    function add_stock($params) {
        $this->db->insert('stocks', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update stock
     */

    function update_stock($id, $params) {
        $this->db->where('id', $id);
        $this->db->update('stocks', $params);
    }

    /*
     * function to delete stock
     */

    function delete_stock($id) {
        $this->db->delete('stocks', array('id' => $id));
    }

}
