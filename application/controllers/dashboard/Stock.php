<?php

class Stock extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Stock_model');
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
     * Listing of stocks
     */
    /*
      function index() {
      $data['stocks'] = $this->Stock_model->get_all_stocks();

      $this->load->view('stock_view/index', $data);
      }
     */

    function index() {
        $stocks = $this->Stock_model->get_all_stocks();
        if (isset($stocks)) {
            foreach ($stocks as $stock) {
                $data['id'] = $stock['id'];
                $data['title'] = $stock['title'];
                $data['description'] = $stock['description'];

                $user = $this->User_model->get_user($stock['created_by']);
                $data['created_by'] = $user['name'];
                $data['created'] = date('jS F Y (T)', $stock['created']);
                $data['is_hidden'] = ($stock['is_hidden'] == 0) ? "No" : "Yes";
                $udate = new DateTime($stock['updated']);
                $data['updated'] = $udate->format('jS F Y (T)');
                // $data['is_deleted'] = ($stock['is_deleted'] == 0) ? "No" : "Yes";
                $data['remark'] = $stock['remark'];
                $detail['stocks'][] = $data;
            }
        }
        $this->load->view('stock_view/index', $detail);
    }

    /*
     * Adding a new stock
     */

    function add() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required|max_length[120]');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('is_hidden', 'Is Hidden', 'required|exact_length[1]');

        if ($this->form_validation->run()) {
            $params = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'created_by' => $this->session->userdata('id'),
                'created' => time(),
                'is_hidden' => $this->input->post('is_hidden'),
                'is_deleted' => 0,
                'remark' => $this->input->post('remark'),
            );

            $stock_id = $this->Stock_model->add_stock($params);
            redirect('dashboard/stock/index');
        } else {
            $this->load->view('stock_view/add');
        }
    }

    /*
     * Editing a stock
     */

    function edit($id) {
        // check if the stock exists before trying to edit it
        $stock = $this->Stock_model->get_stock($id);

        if (isset($stock['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'Title', 'required|max_length[120]');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('is_hidden', 'Is Hidden', 'required|exact_length[1]');

            if ($this->form_validation->run()) {
                $params = array(
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'is_hidden' => $this->input->post('is_hidden'),
                    'remark' => $this->input->post('remark'),
                );

                $this->Stock_model->update_stock($id, $params);
                redirect('dashboard/stock/index');
            } else {
                $data['stock'] = $this->Stock_model->get_stock($id);
                $data['user'] = $this->User_model->get_user($data['stock']['created_by']);
                $this->load->view('stock_view/edit', $data);
            }
        } else
            show_error('The stock you are trying to edit does not exist.');
    }

    /*
     * Deleting stock
     */

    function remove($id) {
        $stock = $this->Stock_model->get_stock($id);

        // check if the stock exists before trying to delete it
        if (isset($stock['id'])) {
            $this->Stock_model->delete_stock($id);
            redirect('dashboard/stock/index');
        } else
            show_error('The stock you are trying to delete does not exist.');
    }

}
