<?php

/*
 * Generated by CRUDigniter v2.3 Beta 
 * www.crudigniter.com
 */

class Contact_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('url', 'form'));
    }

    /*
     * Get contact by id
     */

    function get_contact($id) {
        return $this->db->get_where('contact', array('id' => $id))->row_array();
    }

    /*
     * Get all contact
     */

    function get_all_contact() {
        return $this->db->get('contact')->result_array();
    }

    /*
     * function to add new contact
     */

    function add_contact($params) {
        $this->db->insert('contact', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update contact
     */

    function update_contact($id, $params) {
        $this->db->where('id', $id);
        $this->db->update('contact', $params);
    }

    /*
     * function to delete contact
     */

    function delete_contact($id) {
        $this->db->delete('contact', array('id' => $id));
    }

}
