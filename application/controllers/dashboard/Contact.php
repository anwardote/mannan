<?php

class Contact extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Contact_model');
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

    function index() {
        $contacts = $this->Contact_model->get_all_contact();
        if (isset($contacts)) {
            foreach ($contacts as $contact) {
                $data['id'] = $contact['id'];
                $data['title'] = $contact['title'];
                $data['description'] = $contact['description'];
                $data['google_map'] = $contact['google_map'];
                $user = $this->User_model->get_user($contact['created_by']);
                $data['created_by'] = $user['name'];
                $data['created'] = date('jS F Y (T)', $contact['created']);
                $data['is_hidden'] = ($contact['is_hidden'] == 0) ? "No" : "Yes";
                $udate = new DateTime($contact['updated']);
                $data['updated'] = $udate->format('jS F Y (T)');
                // $data['is_deleted'] = ($stock['is_deleted'] == 0) ? "No" : "Yes";
                $data['remark'] = $contact['remark'];
                $detail['contact'][] = $data;
            }
        }
        $this->load->view('contact_view/index', $detail);
    }

    /*
     * Adding a new contact
     */

    function add() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('is_hidden', 'Is Hidden', 'required|exact_length[1]');
        $this->form_validation->set_rules('title', 'Title', 'max_length[120]');

        if ($this->form_validation->run()) {
            $params = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'google_map' => $this->input->post('google_map'),
                'created_by' => $this->session->userdata('id'),
                'created' => time(),
                'is_hidden' => $this->input->post('is_hidden'),
                'remark' => $this->input->post('remark'),
            );

            $contact_id = $this->Contact_model->add_contact($params);
            redirect('dashboard/contact/index');
        } else {
            $this->load->view('contact_view/add');
        }
    }

    /*
     * Editing a contact
     */

    function edit($id) {
        // check if the contact exists before trying to edit it
        $contact = $this->Contact_model->get_contact($id);

        if (isset($contact['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('is_hidden', 'Is Hidden', 'required|exact_length[1]');
            $this->form_validation->set_rules('title', 'Title', 'max_length[120]');

            if ($this->form_validation->run()) {
                $params = array(
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'google_map' => $this->input->post('google_map'),
                    'is_hidden' => $this->input->post('is_hidden'),
                    'remark' => $this->input->post('remark'),
                );

                $this->Contact_model->update_contact($id, $params);
                redirect('dashboard/contact/index');
            } else {
                $data['contact'] = $this->Contact_model->get_contact($id);
                $data['user'] = $this->User_model->get_user($data['contact']['created_by']);
                $this->load->view('contact_view/edit', $data);
            }
        } else
            show_error('The contact you are trying to edit does not exist.');
    }

    /*
     * Deleting contact
     */

    function remove($id) {
        $contact = $this->Contact_model->get_contact($id);

        // check if the contact exists before trying to delete it
        if (isset($contact['id'])) {
            $this->Contact_model->delete_contact($id);
            redirect('dashboard/contact/index');
        } else
            show_error('The contact you are trying to delete does not exist.');
    }

}
