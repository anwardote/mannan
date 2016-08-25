<?php

class Bank_capital extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Bank_capital_model');
        $this->load->model('User_model');
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('url', 'form'));

        if ($this->session->userdata('login') == 'logIn') {
            if (!($this->session->userdata('rank_id') == 1 || $this->session->userdata('rank_id') == 2 || $this->session->userdata('rank_id') == 3 || $this->session->userdata('rank_id') == 4)) {
                redirect('dashboard/error/index');
            }
        } else {
            redirect('dashboard/authentication/login');
        }
    }

    /*
     * Listing of bank_capital
     */

    function index() {
        $this->load->view('bank_capital/index');
    }

    function table($status) {
        $bank_capital = $this->Bank_capital_model->get_all_bank_capital($status);
        $total=0;
        if (isset($bank_capital)) {
            foreach ($bank_capital as $capital) {
                $data['id'] = $capital['id'];
                $data['description'] = $capital['description'];
                if ($capital['t_type'] == 1) {
                    $data['t_type'] = "Addition";
                } else {
                    $data['t_type'] = "Deduction";
                }
                $data['amount'] = number_format($capital['amount'], 2, '.', ',');
                $total=$total+$capital['amount'];
                $data['total']= number_format($total, 2, '.', ',');                
                $owner = $this->User_model->get_user($capital['approved_by_owner']);
                $data['approved_by_owner'] = $owner['name'];
                $owner = $this->User_model->get_user($capital['approved_by_manager']);
                $data['approved_by_manager'] = $owner['name'];
                if ($capital['hidden'] == 1) {
                    $data['hidden'] = "Yes";
                } else {
                    $data['hidden'] = "No";
                }

                $data['comments'] = $capital['comments'];

                $owner = $this->User_model->get_user($capital['created_by']);
                $data['created_by'] = $owner['name'];
                $data['entry_date'] = Date("jS F Y", $capital['entry_date']);
                $data['created_at'] = Date("jS F Y", $capital['created_at']);

                $udate = new DateTime($capital['updated_at']);
                $data['updated_at'] = $udate->format('jS F Y (T)');
                $data['bank_capital'][] = $data;
            }
        }


        echo json_encode($data['bank_capital']);
    }

    
    function approvedtable() {
        $bank_capital = $this->Bank_capital_model->get_all_bank_capital_approved();
        $total=0;
        if (isset($bank_capital)) {
            foreach ($bank_capital as $capital) {
                $data['id'] = $capital['id'];
                $data['description'] = $capital['description'];
                if ($capital['t_type'] == 1) {
                    $data['t_type'] = "Addition";
                } else {
                    $data['t_type'] = "Deduction";
                }
                $data['amount'] = number_format($capital['amount'], 2, '.', ',');
                $total=$total+$capital['amount'];
                $data['total']= number_format($total, 2, '.', ',');                
                $owner = $this->User_model->get_user($capital['approved_by_owner']);
                $data['approved_by_owner'] = $owner['name'];
                $owner = $this->User_model->get_user($capital['approved_by_manager']);
                $data['approved_by_manager'] = $owner['name'];
                if ($capital['hidden'] == 1) {
                    $data['hidden'] = "Yes";
                } else {
                    $data['hidden'] = "No";
                }

                $data['comments'] = $capital['comments'];

                $owner = $this->User_model->get_user($capital['created_by']);
                $data['created_by'] = $owner['name'];
                $data['entry_date'] = Date("jS F Y", $capital['entry_date']);
                $data['created_at'] = Date("jS F Y", $capital['created_at']);

                $udate = new DateTime($capital['updated_at']);
                $data['updated_at'] = $udate->format('jS F Y (T)');
                $data['bank_capital'][] = $data;
            }
        }


        echo json_encode($data['bank_capital']);
    }
    
    
    function notapprovedtable() {
        $bank_capital = $this->Bank_capital_model->get_all_bank_capital_notapproved();
        $total=0;
        if (isset($bank_capital)) {
            foreach ($bank_capital as $capital) {
                $data['id'] = $capital['id'];
                $data['description'] = $capital['description'];
                if ($capital['t_type'] == 1) {
                    $data['t_type'] = "Addition";
                } else {
                    $data['t_type'] = "Deduction";
                }
                $data['amount'] = number_format($capital['amount'], 2, '.', ',');
                $total=$total+$capital['amount'];
                $data['total']= number_format($total, 2, '.', ',');                
                $owner = $this->User_model->get_user($capital['approved_by_owner']);
                $data['approved_by_owner'] = $owner['name'];
                $owner = $this->User_model->get_user($capital['approved_by_manager']);
                $data['approved_by_manager'] = $owner['name'];
                if ($capital['hidden'] == 1) {
                    $data['hidden'] = "Yes";
                } else {
                    $data['hidden'] = "No";
                }

                $data['comments'] = $capital['comments'];

                $owner = $this->User_model->get_user($capital['created_by']);
                $data['created_by'] = $owner['name'];
                $data['entry_date'] = Date("jS F Y", $capital['entry_date']);
                $data['created_at'] = Date("jS F Y", $capital['created_at']);

                $udate = new DateTime($capital['updated_at']);
                $data['updated_at'] = $udate->format('jS F Y (T)');
                $data['bank_capital'][] = $data;
            }
        }


        echo json_encode($data['bank_capital']);
    }
    
    
    
    
    
    function tabledataall() {
        $bank_capital = $this->Bank_capital_model->get_all_bank_capital_all();
        $total=0;
        if (isset($bank_capital)) {
            foreach ($bank_capital as $capital) {
                $data['id'] = $capital['id'];
                $data['description'] = $capital['description'];
                if ($capital['t_type'] == 1) {
                    $data['t_type'] = "Addition";
                } else {
                    $data['t_type'] = "Deduction";
                }
                $data['amount'] = number_format($capital['amount'], 2, '.', ',');
                $total=$total+$capital['amount'];
                $data['total']= number_format($total, 2, '.', ',');                
                $owner = $this->User_model->get_user($capital['approved_by_owner']);
                $data['approved_by_owner'] = $owner['name'];
                $owner = $this->User_model->get_user($capital['approved_by_manager']);
                $data['approved_by_manager'] = $owner['name'];
                if ($capital['hidden'] == 1) {
                    $data['hidden'] = "Yes";
                } else {
                    $data['hidden'] = "No";
                }

                $data['comments'] = $capital['comments'];

                $owner = $this->User_model->get_user($capital['created_by']);
                $data['created_by'] = $owner['name'];
                $data['entry_date'] = Date("jS F Y", $capital['entry_date']);
                $data['created_at'] = Date("jS F Y", $capital['created_at']);

                $udate = new DateTime($capital['updated_at']);
                $data['updated_at'] = $udate->format('jS F Y (T)');
                $data['bank_capital'][] = $data;
            }
        }


        echo json_encode($data['bank_capital']);
    }
    
    
    
    
    
    
    
    
    function viewdetail($id) {
        $capital = $this->Bank_capital_model->get_bank_capital($id);
        $data['id'] = $capital['id'];
        $data['description'] = $capital['description'];
        if ($capital['t_type'] == 1) {
            $data['t_type'] = "Addition";
        } else {
            $data['t_type'] = "Deduction";
        }
        $data['amount'] = $capital['amount'];
        $owner = $this->User_model->get_user($capital['approved_by_owner']);
        $data['approved_by_owner'] = $owner['name'];
        $owner = $this->User_model->get_user($capital['approved_by_manager']);
        $data['approved_by_manager'] = $owner['name'];
        if ($capital['hidden'] == 1) {
            $data['hidden'] = "Yes";
        } else {
            $data['hidden'] = "No";
        }

        $data['comments'] = $capital['comments'];

        $owner = $this->User_model->get_user($capital['created_by']);
        $data['created_by'] = $owner['name'];
        $data['entry_date'] = Date("jS F Y", $capital['entry_date']);
        $data['created_at'] = Date("jS F Y", $capital['created_at']);

        $udate = new DateTime($capital['updated_at']);
        $data['updated_at'] = $udate->format('jS F Y (T)');
        $data['bank_capital'][] = $data;
        // print_r($data['bank_capital']);
        echo json_encode($data['bank_capital']);
    }

    function edit($id) {
        $capital = $this->Bank_capital_model->get_bank_capital($id);
        $data['id'] = $capital['id'];
        $data['description'] = $capital['description'];
        $data['t_type'] = $capital['t_type'];
        $data['amount'] = $capital['amount'];
        $owner = $this->User_model->get_user($capital['approved_by_owner']);
        $data['approved_by_owner'] = $owner['name'];
        $owner = $this->User_model->get_user($capital['approved_by_manager']);
        $data['approved_by_manager'] = $owner['name'];
        $data['hidden'] = $capital['hidden'];



        $data['comments'] = $capital['comments'];
        $owner = $this->User_model->get_user($capital['created_by']);
        $data['created_by'] = $owner['name'];
        $data['entry_date'] = Date("m/d/Y", $capital['entry_date']);
        $data['bank_capital'][] = $data;
        echo json_encode($data['bank_capital']);
    }

    /*
     * Adding a new bank_capital
     */

    function add() {
        $this->form_validation->set_rules('description', 'Description', 'max_length[80]');
        $this->form_validation->set_rules('t_type', 'Transaction Type', 'required|numeric|exact_length[1]');
        $this->form_validation->set_rules('amount', 'Amount', 'decimal|required|max_length[10]');
        $this->form_validation->set_rules('hidden', 'Hidden', 'required|numeric|exact_length[1]');

        if ($this->form_validation->run()) {
            $params = array(
                'description' => $this->input->post('description'),
                't_type' => $this->input->post('t_type'),
                'amount' => $this->input->post('amount'),
                'approved_by_owner' => $this->input->post('approved_by_owner'),
                'approved_by_manager' => $this->input->post('approved_by_manager'),
                'hidden' => $this->input->post('hidden'),
                'comments' => $this->input->post('comments'),
                'created_by' => $this->input->post('created_by'),
                'created_at' => $this->input->post('created_at'),
                'entry_date' => $this->input->post('entry_date'),
                'updated_at' => $this->input->post('updated_at'),
            );

            $bank_capital_id = $this->Bank_capital_model->add_bank_capital($params);
            redirect('bank_capital/index');
        } else {

            $this->load->model('User_model');
            $data['all_users'] = $this->User_model->get_all_users();
            $data['all_users'] = $this->User_model->get_all_users();
            $data['all_users'] = $this->User_model->get_all_users();

            $this->load->view('bank_capital/add', $data);
        }
    }

    public function new_capital() {
        if ($this->session->userdata('login') == 'logIn') {
            if (!($this->session->userdata('rank_id') == 1 || $this->session->userdata('rank_id') == 2 || $this->session->userdata('rank_id') == 3)) {
                redirect('dashboard/error/index');
            }

            $this->_validate();
            $params = array(
                'description' => $this->input->post('description'),
                't_type' => $this->input->post('t_type'),
                'amount' => $this->input->post('amount'),
                'approved_by_owner' => NULL,
                'approved_by_manager' => NULL,
                'hidden' => $this->input->post('hidden'),
                'comments' => $this->input->post('comments'),
                'created_by' => $this->session->userdata('id'),
                'created_at' => time(),
                'entry_date' => (new DateTime($this->input->post('entry_date')))->getTimestamp(),
            );


            $bank_capital_id = $this->Bank_capital_model->add_bank_capital($params);
            echo json_encode(array("status" => $bank_capital_id));
        }
    }

    public function update() {
        if ($this->session->userdata('login') == 'logIn') {
            if (!($this->session->userdata('rank_id') == 1 || $this->session->userdata('rank_id') == 2 || $this->session->userdata('rank_id') == 3)) {
                redirect('dashboard/error/index');
            }

            $this->_validate();
            $id = $this->input->post('edit-id');
            $params = array(
                'description' => $this->input->post('description'),
                't_type' => $this->input->post('t_type'),
                'amount' => $this->input->post('amount'),
                'hidden' => $this->input->post('hidden'),
                'comments' => $this->input->post('comments'),
                'entry_date' => (new DateTime($this->input->post('entry_date')))->getTimestamp(),
            );
            $bank_capital_id = $this->Bank_capital_model->update_bank_capital($id, $params);
            echo json_encode(array("status" => $bank_capital_id));
        }
    }

    private function _validate() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
        if (strlen(trim($this->input->post('description'))) > 80) {
            $data['inputerror'][] = 'description';
            $data['error_string'][] = 'Description field text cannot be greater than 80 chars.';
            $data['status'] = FALSE;
        }
        if (!is_numeric($this->input->post('amount'))) {
            $data['inputerror'][] = 'amount';
            $data['error_string'][] = 'Amount fields must be numeric or decimal value.';
            $data['status'] = FALSE;
        }

        if (!is_numeric($this->input->post('t_type'))) {
            $data['inputerror'][] = 't_type';
            $data['error_string'][] = 'Transaction Type field is required';
            $data['status'] = FALSE;
        }

        if (strlen(trim($this->input->post('amount'))) < 1) {
            $data['inputerror'][] = 'amount';
            $data['error_string'][] = 'Amount field is required.';
            $data['status'] = FALSE;
        }

        if (strlen(trim($this->input->post('amount'))) > 8) {
            $data['inputerror'][] = 'amount';
            $data['error_string'][] = 'Amount field value cannot be greater than 8 chars.';
            $data['status'] = FALSE;
        }


        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    /*
     * Editing a bank_capital
     */

    function updates($id) {
        $bank_capital = $this->Bank_capital_model->get_bank_capital($id);

        if (isset($bank_capital['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('description', 'Description', 'max_length[80]');
            $this->form_validation->set_rules('t_type', 'T Type', 'required|alpha');
            $this->form_validation->set_rules('amount', 'Amount', 'decimal|required|max_length[10]');
            $this->form_validation->set_rules('hidden', 'Hidden', 'required|numeric|exact_length[1]');

            if ($this->form_validation->run()) {
                $params = array(
                    'description' => $this->input->post('description'),
                    't_type' => $this->input->post('t_type'),
                    'amount' => $this->input->post('amount'),
                    'approved_by_owner' => $this->input->post('approved_by_owner'),
                    'approved_by_manager' => $this->input->post('approved_by_manager'),
                    'hidden' => $this->input->post('hidden'),
                    'comments' => $this->input->post('comments'),
                    'created_by' => $this->input->post('created_by'),
                    'created_at' => $this->input->post('created_at'),
                    'entry_date' => $this->input->post('entry_date'),
                    'updated_at' => $this->input->post('updated_at'),
                );

                $this->Bank_capital_model->update_bank_capital($id, $params);
                redirect('bank_capital/index');
            } else {
                $data['bank_capital'] = $this->Bank_capital_model->get_bank_capital($id);

                $this->load->model('User_model');
                $data['all_users'] = $this->User_model->get_all_users();
                $data['all_users'] = $this->User_model->get_all_users();
                $data['all_users'] = $this->User_model->get_all_users();

                $this->load->view('bank_capital/edit', $data);
            }
        } else
            show_error('The bank_capital you are trying to edit does not exist.');
    }

    /*
     * Deleting bank_capital
     */

    function remove() {
        $this->Bank_capital_model->delete_bank_capital($this->input->post('id'));
        echo json_encode(array("status" => $this->input->post('id')));
    }

}
