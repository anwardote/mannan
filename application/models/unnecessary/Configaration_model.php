<?php
class configaration_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
################################# Class Start ###########################################
// To Add Class #################
	
	public function add_class($data){
		// if class code exit then update
		
	$code=$data['class_code'];
	$query=$this->db->get_where('class', array('class_code'=>$code));
		if($query->num_rows()>0){
		$this->db->set($data);
		$this->db->where('class_code', $code);
		$this->db->update('class', $data);
			return TRUE;
			}
		else if ($query->num_rows()<1){				
				$this->db->insert('class', $data);
				return TRUE;
				}
				else { return FALSE;}
		
		}	
	
		
// To Update Student ###########	
	public function update_student($data, $rollid){
		$ctime=date('Y-m-d H:s:i');
		$data['created']=$ctime;
		$this->db->set($data);
		$this->db->where('roll', $rollid);
		if($this->db->update('student_info')){
			return TRUE;
			}
			else {
			return FALSE;
				}
		}		
		

// To check dublicate class code ####
	public function check_class_code($e){
		$query=$this->db->get_where('class', array('class_code'=>$e));
		if($query->num_rows()>0){
			return FALSE;
			}
			else {
				return TRUE;
				}
		
		}	
// Class value into table #############
	public function show_class(){
		$this->db->order_by("class_code", "asc");
		$query=$this->db->get('class');
		return $query->result_array();
		}
		
// Class Delete ###################################################
	public function class_delete($code){
		$this->db->where(array('class_code'=>$code));
		if($this->db->delete('class')){
			return TRUE;
			} else return FALSE;
		}		
###################### END Class ##################################











################################# Subject Start ###########################################
// To Add Class #################
	
	public function add_subject($data){
		// if subject code exit then update
	$code=$data['subject_code'];
	$query=$this->db->get_where('subject_info', array('subject_code'=>$code));
		if($query->num_rows()>0){
		$this->db->set($data);
		$this->db->where('subject_code', $code);
		$this->db->update('subject_info', $data);
			return "update";
			}
		else {				
				$this->db->insert('subject_info', $data);
				return "added";
				}
		
		}	
	
// subject value into table #############
	public function show_subject(){
		$this->db->order_by("subject_code", "asc");
		$query=$this->db->get('subject_info');
		return $query->result_array();
		}
		
// subject Delete ###################################################
	public function subject_delete($code){
		$this->db->where(array('subject_code'=>$code));
		if($this->db->delete('subject_info')){
			return TRUE;
			} else return FALSE;
		}		
	

###################### END subject ##################################










################################# board Start ###########################################
// To Add Class #################
	
	public function add_board($data){
		// if board code exit then update
	$code=$data['board_code'];
	$query=$this->db->get_where('board', array('board_code'=>$code));
		if($query->num_rows()>0){
		$this->db->set($data);
		$this->db->where('board_code', $code);
		$this->db->update('board', $data);
			return "update";
			}
		else {				
				$this->db->insert('board', $data);
				return "added";
				}
		
		}	
	
// board value into table #############
	public function show_board(){
		$this->db->order_by("board_code", "asc");
		$query=$this->db->get('board');
		return $query->result_array();
		}
		
// board Delete ###################################################
	public function board_delete($code){
		$this->db->where(array('board_code'=>$code));
		if($this->db->delete('board')){
			return TRUE;
			} else return FALSE;
		}		
	

###################### END board ##################################










################################# group Start ###########################################
// To Add Class #################
	
	public function add_group($data){
		// if group code exit then update
	$code=$data['group_code'];
	$query=$this->db->get_where('group', array('group_code'=>$code));
		if($query->num_rows()>0){
		$this->db->set($data);
		$this->db->where('group_code', $code);
		$this->db->update('group', $data);
			return "update";
			}
		else {				
				$this->db->insert('group', $data);
				return "added";
				}
		
		}	
	
// group value into table #############
	public function show_group(){
		$this->db->order_by("group_code", "asc");
		$query=$this->db->get('group');
		return $query->result_array();
		}
		
// group Delete ###################################################
	public function group_delete($code){
		$this->db->where(array('group_code'=>$code));
		if($this->db->delete('group')){
			return TRUE;
			} else return FALSE;
		}		


###################### END group ##################################











################################# Institute Start ###########################################
// To Add Class #################
	
	public function add_institute($data){
		// if institute code exit then update
	$code=$data['institute_code'];
	$query=$this->db->get_where('institute', array('institute_code'=>$code));
		if($query->num_rows()>0){
		$this->db->set($data);
		$this->db->where('institute_code', $code);
		$this->db->update('institute', $data);
			return "update";
			}
		else {				
				$this->db->insert('institute', $data);
				return "added";
				}
		
		}	
	
// institute value into table #############
	public function show_institute(){
		$this->db->order_by("institute_code", "asc");
		$query=$this->db->get('institute');
		return $query->result_array();
		}
		
// institute Delete ###################################################
	public function institute_delete($code){
		$this->db->where(array('institute_code'=>$code));
		if($this->db->delete('institute')){
			return TRUE;
			} else return FALSE;
		}		


###################### END institute ##################################






################################# exam Start ###########################################
// To Add Class #################
	
	public function add_exam($data){
		// if exam code exit then update
	$code=$data['exam_code'];
	$query=$this->db->get_where('exam', array('exam_code'=>$code));
		if($query->num_rows()>0){
		$this->db->set($data);
		$this->db->where('exam_code', $code);
		$this->db->update('exam', $data);
			return "update";
			}
		else {				
				$this->db->insert('exam', $data);
				return "added";
				}
		
		}	
	
// exam value into table #############
	public function show_exam(){
		$this->db->order_by("exam_code", "asc");
		$query=$this->db->get('exam');
		return $query->result_array();
		}
		
// exam Delete ###################################################
	public function exam_delete($code){
		$this->db->where(array('exam_code'=>$code));
		if($this->db->delete('exam')){
			return TRUE;
			} else return FALSE;
		}		


###################### END exam ##################################





}	











