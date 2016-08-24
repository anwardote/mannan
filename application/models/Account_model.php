<?php
class Account_model extends CI_Model
{
	function Account_model()
	{
		parent::__construct();
		//$this->load->database();
	}//constructor end
	function create($data)
	{
	return $this->db->insert('regusers',$data);	
//            if($this->db->insert('users', $data))
//		{
//			return TRUE;
//		}
//			return FALSE;
	}//create end
	
	function checkuser($name,$pass){
		//echo $name ." and ". $pass; return;		
		$arr = array('username' => $name, 'password' => $pass);
		$checkquery = $this->db->select('*')->from('regusers')->where($arr)->get();
		//echo $checkquery->num_rows();
		//$numberreturned = $query->result_array(); 
		if($checkquery->num_rows() > 0){
		//$userinfo=$checkquery->result_array();
		//$this->session->set_userdata($userinfo);		
		return TRUE;}		
		return FALSE;
		}
		
	
	function login()
	{
	
		$arr = array('username' => $this->input->post('username'));
		$checkquery = $this->db->select('*')->from('regusers')->where($arr)->get();
		$userinfo=$checkquery->result_array();	

		$data = array(
		'id'=>$userinfo[0]['id'],
		'fullname'=>$userinfo[0]['fullname'],
		'logintime'=>date("F j, Y, g:i a"),
		'userinfo' => $this->session->userdata(),
		'username' => $this->input->post('username'),
		'logged_in' => TRUE
		);
		$this->session->set_userdata($data);
	}//login end
	
	
	function logged_in()
	{
		if($this->session->userdata('logged_in') == TRUE)
		{
			return TRUE;
		}
		return FALSE;
	}
	
	function showusers(){
		$select_query = $this->db->select('*')->where(array('deleted'=>'0'))->from('regusers')->get();
		return $select_query->result_array();//returnd as array(page 77 and 78
		}
	function updateuser($updateid, $data){
		$this->db->where('id', $updateid);
		if($this->db->update('regusers', $data)){
			return TRUE;
			}
			return FALSE;
		
		}
	function deleteuser($id){
		$this->db->where('id', $id);
		if($this->db->update('regusers', array('deleted'=>'1'))){
			return TRUE;
			}
		return FALSE;	
		}		
}
?>