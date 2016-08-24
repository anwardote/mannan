<?php

class Account extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('url', 'form', 'security'));
        $this->load->model('account_model');
        $this->_salt = "123456789987654321";
        $this->load->library('encrypt');
        $this->load->database();
    }

    function index() {
        if ($this->account_model->logged_in() === TRUE) {
            $this->dashboard(TRUE);
        } else {
            redirect("account/login");
        }
    }

//index end

    function dashboard($condition = FALSE) {
        if ($condition === TRUE OR $this->account_model->logged_in() === TRUE) {
            $this->load->view('index');
        } else {
            redirect("account/login");
        }
    }

//dashboard end


    function login() {
        $this->form_validation->set_error_delimiters('<div style="color:MediumVioletRed !important">', '</div>');
        $this->form_validation->set_rules('username', 'Username', 'xss_clean|required');
        $this->form_validation->set_rules('password', 'Password', 'xss_clean|required|min_length[4]');
        //########### Removing Sha1 from above line
        if ($this->form_validation->run() == FALSE) {


            $title['title'] = "Login";
            $this->load->view('front-end/header', $title);
            $this->load->view('front-end/menu');
            $this->load->view('account/login');
            $this->load->view('front-end/footer');
        } else {
            $this->_username = $this->input->post('username');
            $this->_password = sha1($this->_salt . $this->input->post('password'));

            if ($this->account_model->checkuser($this->_username, $this->_password) === TRUE) {
                $this->account_model->login();
                $this->load->view('index');
            } else {
                $data['message'] = "<h3 style='color:red'>Invalid username or password. Please try again!!</h3>";
                $title['title'] = "Login";
                $this->load->view('front-end/header', $title);
                $this->load->view('front-end/menu');
                $this->load->view('account/login', $data);
                $this->load->view('front-end/footer');
            }
        }
    }

//login end

    function password_check() {
        $this->db->where('username', $this->_username);
        $query = $this->db->get('regusers');
        $result = $query->row_array();
        //$this->_password =sha1($this->_salt . $this->input->post('password'));
        if ($result['password'] == sha1($this->_password))
            ; {
            return TRUE;
        }
        if ($query->num_rows() == 0) {
            $this->form_validation->set_message('password_check', 'There was an error!');
            return FALSE;
        }
    }

//end password_check

    function register() {
        $this->form_validation->set_error_delimiters('<div style="color:MediumVioletRed !important">', '</div>');
        $this->form_validation->set_rules('fullname', 'Full Name', 'xss_clean|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('username', 'Username', 'xss_clean|required|callback_user_exists');
        $this->form_validation->set_rules('email', 'Email Address', 'xss_clean|required|valid_email|callback_email_exists');
        $this->form_validation->set_rules('password', 'Password', 'xss_clean|required|min_length[4]|max_length[12]');
        $this->form_validation->set_rules('password_conf', 'Password Confirmation', 'xss_clean|required|matches[password]');

        if ($this->form_validation->run() == FALSE) {

            $title['title'] = "Register";
            $this->load->view('front-end/header', $title);
            $this->load->view('front-end/menu');
            $this->load->view('account/register');
            $this->load->view('front-end/footer');
        } else {
            $data['fullname'] = $this->input->post('fullname');
            $data['username'] = $this->input->post('username');
            $data['email'] = $this->input->post('email');
            $data['password'] = sha1($this->_salt . $this->input->post('password'));
            if ($this->account_model->create($data) === TRUE) {
                $data['message'] = "The user account has now been created! You can login "
                        . anchor('account/login', 'here') . ". pass: " . sha1($this->_salt . $this->input->post('password'));

                $title['title'] = "Success";
                $this->load->view('front-end/header', $title);
                $this->load->view('front-end/menu');
                $this->load->view('account/success', $data);
                $this->load->view('front-end/footer');
            } else {
                $data['error'] = "There was a problem when adding your account to the database.";

                $this->load->view('header');
                $this->load->view('account/error', $data);
                $this->load->view('footer');
            }
        }
    }

    //register end
    function user_exists($user) {
        $query = $this->db->get_where('regusers', array('username' => $user));
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('user_exists', 'The
		%s already exists in our database, please use a different one.');
            return FALSE;
        }
        $query->free_result();
        return TRUE;
    }

    //user exist end
    function email_exists($email) {
        $query = $this->db->get_where('regusers', array('email' => $email));
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('email_exists', 'The %s already exists in our database,	please use a different one.');
            return FALSE;
        }
        $query->free_result();
        return TRUE;
    }

    //email exist end

    function logout() {
        $this->session->sess_destroy();
        redirect("home");
    }

//logout end

    function editrecord($id) {
        $query = $this->db->get_where('regusers', array('id' => $id));
        if ($query->num_rows() > 0) {
            //$result = $query->result_array();
            $data['newrec'] = $query->result_array();
            //print_r($newrec);
            $this->load->view('header');
            $this->load->view("account/edituser", $data);
            $this->load->view('footer');
        }
    }

    function updateuser() {
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $datatoupdate = array('username' => $username, 'email' => $email);
        if ($this->account_model->updateuser($id, $datatoupdate) === TRUE) {
            $data['message'] = "data updated. id:  " . $id . "." .
                    anchor('account/dashboard', 'dashboard');
            $this->load->view('header');
            $this->load->view('account/success', $data);
            $this->load->view('footer');
        } else {
            $data['message'] = "PROBLEM, id:  " . $id . "." .
                    anchor('account/dashboard', 'dashboard');
            $this->load->view('header');
            $this->load->view('account/success', $data);
            $this->load->view('footer');
        }
    }

//updateuser end

    function deleterecord($id) {
        if ($this->account_model->deleteuser($id) === TRUE) {
            $data['message'] = "data deleted. id:  " . $id . "." .
                    anchor('account/dashboard', ' go to dashboard');
            $this->load->view('header');
            $this->load->view('account/success', $data);
            $this->load->view('footer');
        } else {
            $data['message'] = "PROBLEM DELETING DATA. id:  " . $id . "." .
                    anchor('account/dashboard', ' go to dashboard');
            $this->load->view('header');
            $this->load->view('account/success', $data);
            $this->load->view('footer');
        }
    }

    function alpha_dash_space($str) {
        if (!preg_match("/^([-a-z_ ])+$/i", $str)) {
            $this->form_validation->set_message('alpha_dash_space', ' The {field} only allow a-z, A-Z and space characters');
            return FALSE;
        }
    }

}

?>