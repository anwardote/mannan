<?php

class Bank_capital_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * Get bank_capital by id
     */

    function get_bank_capital($id) {
        return $this->db->get_where('bank_capital', array('id' => $id))->row_array();
    }

    /*
     * Get all bank_capital
     */

    function get_all_bank_capital_approved() {
        $this->db->select("*");
        $this->db->from("bank_capital");
        $this->db->order_by("id", "asc");
        $this->db->where("approved_by_manager !=", NULL);
        $this->db->where("hidden",0 );
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_bank_capital_notapproved() {
        $this->db->select("*");
        $this->db->from("bank_capital");
        $this->db->order_by("id", "asc");
        $this->db->where("approved_by_manager", NULL);
        $this->db->where("hidden",0 );
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_bank_capital_all() {
        $this->db->select("*");
        $this->db->from("bank_capital");
        $this->db->order_by("id", "asc");
        $this->db->where("hidden",0 );
        // $this->db->where("approved_by_manager !=", NULL);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_bank_my_capital_all() {
        $this->db->select("*");
        $this->db->from("bank_capital");
        $this->db->order_by("id", "asc");
        $this->db->where("created_by", $this->session->userdata('id'));
        $this->db->where("hidden",0 );
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function get_all_bank_my_capital_all_hidden() {
        $this->db->select("*");
        $this->db->from("bank_capital");
        $this->db->order_by("id", "asc");
        $this->db->where("created_by", $this->session->userdata('id'));
        $this->db->where("hidden",1 );
        $query = $this->db->get();
        return $query->result_array();
    }  
    

    /*
     * function to add new bank_capital
     */

    function add_bank_capital($params) {
        $this->db->insert('bank_capital', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update bank_capital
     */

    function update_bank_capital($id, $params) {
        $this->db->where('id', $id);
        $this->db->update('bank_capital', $params);
        return TRUE;
    }

    /*
     * function to delete bank_capital
     */

    function approval_bank_capital($id) {
        $this->db->where('id', $id);
        if ($this->session->userdata('rank_id') == 3) {
            $approved = "approved_by_owner";
        } elseif ($this->session->userdata('rank_id') == 4) {
            $approved = "approved_by_manager";
        } else {
            return "error";
        }
        $this->db->update('bank_capital', [$approved => $this->session->userdata('id')]);
        return TRUE;
    }

    function delete_bank_capital($id) {
        $this->db->delete('bank_capital', array('id' => $id));
        return TRUE;
    }

}
