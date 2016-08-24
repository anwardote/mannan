<?php

class Equipment extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Equipment_model');
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
        $equipments = $this->Equipment_model->get_all_equipments();

        if (isset($equipments)) {
            foreach ($equipments as $equipment) {
                $data['id'] = $equipment['id'];
                $data['title'] = $equipment['title'];
                $data['description'] = $equipment['description'];

                $user = $this->User_model->get_user($equipment['created_by']);
                $data['created_by'] = $user['name'];
                $data['created'] = date('jS F Y (T)', $equipment['created']);
                $data['is_hidden'] = ($equipment['is_hidden'] == 0) ? "No" : "Yes";
                $udate = new DateTime($equipment['updated']);
                $data['updated'] = $udate->format('jS F Y (T)');
                // $data['is_deleted'] = ($equipment['is_deleted'] == 0) ? "No" : "Yes";
                $data['remark'] = $equipment['remark'];
                $detail['equipments'][] = $data;
            }
        }
        $this->load->view('equipment_view/index', $detail);
    }

    /*
     * Adding a new equipment
     */

    function add() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('is_hidden', 'Is Hidden', 'exact_length[1]|required');
        $this->form_validation->set_rules('title', 'Title', 'max_length[120]|required');

        if ($this->form_validation->run()) {
            $params = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'created_by' => $this->session->userdata('id'),
                'created' => time(),
                'is_hidden' => $this->input->post('is_hidden'),
                'remark' => $this->input->post('remark'),
            );

            $equipment_id = $this->Equipment_model->add_equipment($params);
            redirect('dashboard/equipment/index');
        } else {
            $this->load->view('equipment_view/add');
        }
    }

    /*
     * Editing a equipment
     */

    function edit($id) {
        // check if the equipment exists before trying to edit it
        $equipment = $this->Equipment_model->get_equipment($id);

        if (isset($equipment['id'])) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('is_hidden', 'Is Hidden', 'exact_length[1]|required');
            $this->form_validation->set_rules('title', 'Title', 'max_length[120]|required');

            if ($this->form_validation->run()) {
                $params = array(
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'is_hidden' => $this->input->post('is_hidden'),
                    'remark' => $this->input->post('remark'),
                );

                $this->Equipment_model->update_equipment($id, $params);
                redirect('dashboard/equipment/index');
            } else {
                $data['equipment'] = $this->Equipment_model->get_equipment($id);
                $data['user'] = $this->User_model->get_user($data['equipment']['created_by']);

                $this->load->view('equipment_view/edit', $data);
            }
        } else
            show_error('The equipment you are trying to edit does not exist.');
    }

    /*
     * Deleting equipment
     */

    function remove($id) {
        $equipment = $this->Equipment_model->get_equipment($id);

        // check if the equipment exists before trying to delete it
        if (isset($equipment['id'])) {
            $this->Equipment_model->delete_equipment($id);
            redirect('dashboard/equipment/index');
        } else
            show_error('The equipment you are trying to delete does not exist.');
    }

}
