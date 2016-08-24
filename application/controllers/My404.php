<?php 
class My404 extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct(); 
		$this->load->helper('url');
    } 

    public function index() 
    { 
        //$this->output->set_status_header('404'); 
        //$data['content'] = 'header'; // View name 
        //$this->load->view('index',$data);//loading in my template 
		$this->load->view('front-end/header');
    } 
} 
?> 