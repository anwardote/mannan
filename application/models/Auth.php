<?php

class Auth extends CI_Model {

    public $table = "users";

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /*
     * Get user by id
     */

    function login($email, $password) {
        $this->db->from($this->table);
        $this->db->where(['email' => $email, 'password' => $password]);
        $query = $this->db->get();
        return $query->row();
    }

    function get_user($id) {
        return $this->db->get_where('users', array('id' => $id))->row_array();
    }

    /*
     * Get all users
     */

    function get_all_users() {
        return $this->db->get('users')->result_array();
    }

    /*
     * function to add new user
     */

    function add_user($params) {
        $this->db->insert('users', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update user
     */

    function update_user($id, $params) {
        $this->db->where('id', $id);
        $this->db->update('users', $params);
    }

    /*
     * function to delete user
     */

    function delete_user($id, $dir) {
        $this->delete_thumb($id, $dir);
        $this->db->update('users', array('is_deleted' => "1"), array('id' => $id));
    }

    protected function delete_thumb($id, $dir) {
        $data = $this->get_user($id);

        if (!empty($data['thumbnil'])) {
            $thumb = $data['thumbnil'];
            $thumbArr = explode(".", $thumb);
            $thumbnil_thumb = $thumbArr['0'] . "_thumb." . $thumbArr['1'];
            @unlink('assets/uploads/' . $dir . "/" . $thumb);
            @unlink('assets/uploads/' . $dir . "/" . $thumbnil_thumb);
        }
    }

}
