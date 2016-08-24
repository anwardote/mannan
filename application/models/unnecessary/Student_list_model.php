<?php
class Student_list_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }


	
	// To Add New Student ############################################################	
	public function student_list(){
		$query=$this->db->get('student_info');
		return $query->result_array();	
	}
	
	// Delete
	public function delete($id){
		return $this->db->delete('student_info', array('roll' => $id));
	}	
	
	//Single Student Details
	
	public function detail($id){
		$query=$this->db->get_where('student_info', array('roll' => $id));
		return $query->result_array();	
	}	
	
	
	
	public function add_student($data){
		$ctime=date('Y-m-d H:s:i');
		$data['created']=$ctime;
		if($this->db->insert('student_info', $data)){
			return TRUE;
			}
			else {
			return FALSE;
				}
		}

// To check dublicate Roll no ######################################################	
	public function check_roll($e){
		$query=$this->db->get_where('student_info', array('roll'=>$e));
		if($query->num_rows()>0){
			return FALSE;
			}
			else {
				return TRUE;
				}
		
		}	
// Class value into form ###################################################
	public function select_class(){
		$query=$this->db->get('class');
		return $query->result();
		}

// Board value into form ###################################################
	public function select_board(){
		$query=$this->db->get('board');
		return $query->result();
		}
// Exam value into form ###################################################
	public function select_exam(){
		$query=$this->db->get('exam');
		return $query->result();
		}	
// Group value into form ###################################################
	public function select_group(){
		$query=$this->db->get('group');
		return $query->result();
		}			
// Institute value into form ###################################################
	public function select_institute(){
		$query=$this->db->get('institute');
		return $query->result();
		}				
		
// Subject value into form ###################################################
	public function select_subject(){
		$query=$this->db->get('subject_info');
		return $query->result();
		}			
		
		
}	