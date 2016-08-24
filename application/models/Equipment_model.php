<?php

 
class Equipment_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get equipment by id
     */
    function get_equipment($id)
    {
        return $this->db->get_where('equipments',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all equipments
     */
    function get_all_equipments()
    {
        return $this->db->get('equipments')->result_array();
    }
    
    /*
     * function to add new equipment
     */
    function add_equipment($params)
    {
        $this->db->insert('equipments',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update equipment
     */
    function update_equipment($id,$params)
    {
        $this->db->where('id',$id);
        $this->db->update('equipments',$params);
    }
    
    /*
     * function to delete equipment
     */
    function delete_equipment($id)
    {
        $this->db->delete('equipments',array('is_deleted' => "1"), array('id' => $id));
    }
}