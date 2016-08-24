<?php

class Home extends CI_controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('Form', 'url', 'file'));
        $this->load->model('account_model');
        $this->load->database();
        $this->load->library(array('form_validation', 'session'));

        if ($this->session->userdata('login') != 'logIn') {
            $this->load->view('auth_view/login');
            redirect('dashboard/authentication/login');
        }
    }

    public function index() {
        $this->load->view('manage');
    }

//index end
}
