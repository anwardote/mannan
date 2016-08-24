<?php

class About extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('About_model');
        $this->load->model('User_model');
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('url', 'form'));

        if ($this->session->userdata('login') == 'logIn') {
            if (!($this->session->userdata('rank_id') == 1 || $this->session->userdata('rank_id') == 2 || $this->session->userdata('rank_id') == 3)) {
                redirect('dashboard/error/index');
            }
        } else {
            redirect('dashboard/authentication/login');
        }
    }

    /*
     * Listing of about
     */

    function index() {
        $data['about'] = $this->About_model->get_all_about();

        $this->load->view('about_view/index', $data);
    }

    /*
     * Adding a new about
     */

    function add() {

        if ($this->session->userdata('login') == 'logIn') {
            if ($this->session->userdata('rank_id') != 1) {
                redirect('dashboard/error/index');
            }
        } else {
            redirect('dashboard/authentication/login');
        }

        $this->load->library('form_validation');

        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('title', 'Title', 'max_length[120]');
        $this->form_validation->set_rules('is_hidden', 'Is Hidden', 'exact_length[1]|required');

        if ($this->form_validation->run()) {
            $params = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'photo' => $this->input->post('photo'),
                'created_by' => $this->session->userdata('id'),
                'created' => time(),
                'is_hidden' => $this->input->post('is_hidden'),
                'is_deleted' => 0,
                'remark' => $this->input->post('remark'),
            );

            $about_id = $this->About_model->add_about($params);
            redirect('dashboard/about/index');
        } else {
            $this->load->view('about_view/add');
        }
    }

    /*
     * Editing a about
     */

    function edit($id) {
        // check if the about exists before trying to edit it
        $about = $this->About_model->get_about($id);

        if (isset($about['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('title', 'Title', 'max_length[120]');
            $this->form_validation->set_rules('is_hidden', 'Is Hidden', 'exact_length[1]|required');

            if ($this->form_validation->run()) {
                $params = array(
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'photo' => $this->input->post('photo'),
                    'is_hidden' => $this->input->post('is_hidden'),
                    'remark' => $this->input->post('remark'),
                );

                $this->About_model->update_about($id, $params);
                redirect('dashboard/about/index');
            } else {
                $data['about'] = $this->About_model->get_about($id);
                $data['user'] = $this->User_model->get_user($data['about']['created_by']);

                $this->load->view('about_view/edit', $data);
            }
        } else
            show_error('The about you are trying to edit does not exist.');
    }

    /*
     * Deleting about
     */

    function remove($id) {
        $about = $this->About_model->get_about($id);

        // check if the about exists before trying to delete it
        if (isset($about['id'])) {
            $this->About_model->delete_about($id);
            redirect('dashboard/about/index');
        } else
            show_error('The about you are trying to delete does not exist.');
    }

}
