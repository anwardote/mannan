<?php

class Rank extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Rank_model');
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
     * Listing of ranks
     */

    function index() {
        $data['ranks'] = $this->Rank_model->get_all_ranks();

        $this->load->view('rank_view/index', $data);
    }

    /*
     * Adding a new rank
     */

    function add() {

        if ($this->session->userdata('login') == 'logIn') {
            if (!($this->session->userdata('rank_id') == 1)) {
                redirect('dashboard/error/index');
            }
        } else {
            redirect('dashboard/authentication/login');
        }

        $this->load->library('form_validation');

        $this->form_validation->set_rules('rank', 'Rank Title', 'max_length[15]|required|alpha_dash');

        if ($this->form_validation->run()) {
            $params = array(
                'rank' => $this->input->post('rank'),
                'description' => $this->input->post('description'),
                'permission' => $this->input->post('permission'),
                'created' => time(),
            );
            $rank_id = $this->Rank_model->add_rank($params);
            redirect('dashboard/rank/index');
        } else {
            $this->load->view('rank_view/add');
        }
    }

    /*
     * Editing a rank
     */

    function edit($id) {
        // check if the rank exists before trying to edit it
        if ($this->session->userdata('login') == 'logIn') {
            if (!($this->session->userdata('rank_id') == 1 || $this->session->userdata('rank_id') == 2)) {
                redirect('dashboard/error/index');
            }
        } else {
            redirect('dashboard/authentication/login');
        }


        $rank = $this->Rank_model->get_rank($id);

        if (isset($rank['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('rank', 'Rank', 'max_length[15]|required|alpha_dash');

            if ($this->form_validation->run()) {
                $params = array(
                    'rank' => $this->input->post('rank'),
                    'description' => $this->input->post('description'),
                    'permission' => $this->input->post('permission'),
                );

                $this->Rank_model->update_rank($id, $params);
                redirect('dashboard/rank/index');
            } else {
                $data['rank'] = $this->Rank_model->get_rank($id);

                $this->load->view('rank_view/edit', $data);
            }
        } else
            show_error('The rank you are trying to edit does not exist.');
    }

    /*
     * Deleting rank
     */

    function remove($id) {
        $rank = $this->Rank_model->get_rank($id);

        // check if the rank exists before trying to delete it
        if (isset($rank['id'])) {
            $this->Rank_model->delete_rank($id);
            redirect('dashboard/rank/index');
        } else
            show_error('The rank you are trying to delete does not exist.');
    }

}
