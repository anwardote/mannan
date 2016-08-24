<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('Form', 'url'));
        $this->load->model('User_model');
        $this->load->model('Rank_model');
        $this->load->model('Auth');
        $this->load->library(array('form_validation', 'session', 'Auth'));
        // $this->load->library('encryption');
        $this->load->database();
    }

    public function login() {

        $this->load->view('auth_view/login');
    }

    public function signin() {

        $this->form_validation->set_error_delimiters('<li style="color:yellow">', '</li>');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            if ($userinfo = $this->Auth->login($email, $password)) {
                if ($userinfo->status == 0) {
                    return $this->LoginError("You are not an active user. Please contact with administrator");
                } elseif ($userinfo->is_deleted == 1) {
                    return $this->LoginError("You are not authorized user. Please contact with administrator");
                } elseif ($userinfo->is_banned == 1) {
                    return $this->LoginError("You are not banned user. Please contact with administrator");
                } else {

                    $this->session->set_userdata('name', $userinfo->name);
                    $this->session->set_userdata('id', $userinfo->id);
                    $this->session->set_userdata('rank_id', $userinfo->rank_id);
                    $this->session->set_userdata('email', $userinfo->email);
                    $this->session->set_userdata('thumbnil', $userinfo->thumbnil);
                    $this->session->set_userdata('login', 'logIn');
                    $rank = $this->Rank_model->get_rank($userinfo->rank_id);
                    $this->session->set_userdata('rank', $rank['rank']);
                    $this->session->set_userdata('permission', $rank['permission']);
                    redirect('dashboard/home');
                }
            } else {
                $info['message'] = "Email or password is wrong.";
                $this->load->view('auth_view/login', $info);
            }
        } else {
            $this->load->view('auth_view/login');
        }
    }

    public function logout() {

        // Remove userdata
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('rank_id');
        $this->session->unset_userdata('thumbnil');
        $this->session->unset_userdata('login');
        $this->session->set_userdata('login', 'NotLgoIn');
        $this->session->unset_userdata('email');
        redirect('home/index');

        // Set logged out userdata
        $this->ci->session->set_userdata(array(
            'logged_out' => $_SERVER['REQUEST_TIME']
        ));

        // Return true
        return TRUE;
    }

    public function signup() {
        $this->load->view('auth_view/register');
    }

    protected function LoginError($message) {
        $info['message'] = $message;
        $this->load->view('auth_view/login', $info);
    }

    public function register() {
        $this->form_validation->set_error_delimiters('<li style="color:yellow">', '</li>');
        $this->form_validation->set_rules('name', 'Name', 'required|max_length[80]');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]', array(
            'required' => 'You have not provided %s.',
            'is_unique' => 'This %s already exists.'
                )
        );
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('rpassword', 'Re-type Password', 'matches[password]');

        if ($this->form_validation->run()) {
            $params = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'rank_id' => 5,
                'created' => time(),
                'status' => '0',
                'is_deleted' => 0,
                'is_banned' => 0,
                'remark' => $this->input->post('remark'),
                'user_agent' => $_SERVER['HTTP_USER_AGENT'],
                'thumbnil' => 'defaultuser.'.'jpg'
            );
            $user_id = $this->User_model->add_user($params);
            if ($user_id) {
                redirect('dashboard/authentication');
            }
        } else {
            $this->load->view('auth_view/register');
        }
    }

    public function index() {

        $this->load->view('auth_view/login');
    }

}
