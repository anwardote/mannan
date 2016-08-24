<?php

class Error extends CI_Controller {

    protected $dirname = "users";

    function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Rank_model');
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('url', 'form', 'MY_upload_image_helper'));
    }

    public function index() {
        $this->load->view('errors/unauthorized');
    }

}
