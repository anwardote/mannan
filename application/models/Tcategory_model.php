<?php

class Tcategory_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /*
     * Get tcategory by id
     */

    function get_tcategory($id) {
        return $this->db->get_where('tcategories', array('id' => $id))->row_array();
    }

    /*
     * Get all tcategories
     */

    function get_all_tcategories() {
        return $this->db->get('tcategories')->result_array();
    }

    /*
     * function to add new tcategory
     */

    function add_tcategory($params) {
        $this->db->insert('tcategories', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update tcategory
     */

    function update_tcategory($id, $params) {
        $this->db->where('id', $id);
        $this->db->update('tcategories', $params);
    }

    /*
     * function to delete tcategory
     */

    function delete_tcategory($id, $dir) {
        //$this->db->update('tcategories', array('is_deleted' => "1"), array('id' => $id));
        $this->delete_thumb($id, $dir);
        $this->db->delete('tcategories', array('id' => $id));
    }

    protected function delete_thumb($id, $dir) {
        $data = $this->get_tcategory($id);

        if (!empty($data['thumbnil'])) {
            $thumb = $data['thumbnil'];
            $thumbArr = explode(".", $thumb);
            $thumbnil_thumb = $thumbArr['0'] . "_thumb." . $thumbArr['1'];
            @unlink('assets/uploads/' . $dir . "/" . $thumb);
            @unlink('assets/uploads/' . $dir . "/" . $thumbnil_thumb);
        }
    }

}
