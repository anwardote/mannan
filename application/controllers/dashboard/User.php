<?php

class User extends CI_Controller {

    protected $dirname = "users";

    function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Rank_model');
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('url', 'form', 'MY_upload_image_helper'));

        if ($this->session->userdata('login') == 'logIn') {
            if (!($this->session->userdata('rank_id') == 1 || $this->session->userdata('rank_id') == 2 || $this->session->userdata('rank_id') == 3)) {
                redirect('dashboard/error/index');
            }
        } else {
            redirect('dashboard/authentication/login');
        }
    }

    function index() {
        $users = $this->User_model->get_all_users();

        if (isset($users)) {
            foreach ($users as $user) {
                $data['id'] = $user['id'];
                $data['name'] = $user['name'];
                $data['email'] = $user['email'];
                $data['remark'] = $user['remark'];
                $rank = $this->Rank_model->get_rank($user['rank_id']);
                $data['rank_id'] = $rank['rank'];
//                $data['status'] = $user['status'];
                $data['status'] = ($user['status'] == 0) ? "Inactive" : "Active";
// $data['is_banned'] = $user['is_banned'];
                $data['is_banned'] = ($user['is_banned'] == 0) ? "No" : "Yes";

                if (!empty($user['thumbnil'])) {
                    $data['thumbnil'] = $user['thumbnil'];
                    $thumb = explode(".", $user['thumbnil']);
                    $data['thumbnil_thumb'] = $thumb['0'] . "_thumb." . $thumb['1'];
                } else {
                    $data['thumbnil'] = "Image-Not-Found.png";
                    $data['thumbnil_thumb'] = "Image-Not-Found.png";
                }
                $detail['users'][] = $data;
            }
        }
        $this->load->view('manage/index', $detail);
    }

    function add() {
        $this->form_validation->set_rules('name', 'Name', 'required|max_length[60]|min_length[4]');
        //$this->form_validation->set_rules('email', 'Email', 'valid_email|required|max_length[60]');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]', array(
            'required' => 'You have not provided %s.',
            'is_unique' => 'This %s already exists.'
                )
        );
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|matches[rpassword]|max_length[40]');
        $this->form_validation->set_rules('rpassword', 'Re-Type Password', 'required|min_length[5]');
        $this->form_validation->set_rules('rank_id', 'Rank', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('thumbnil', 'thumbnil', 'callback_image_type_check');
        $this->form_validation->set_rules('remark', 'Remark', 'max_length[120]');

        if ($this->form_validation->run()) {
            $FieldName = "thumbnil";
            $FileArr = $_FILES;
            $dir = $this->dirname;
            $allowed_types = "gif|jpg|jpeg|png";
            $max_size = "10000";
            $max_width = "9000";
            $max_height = "6000";
            $finfo = upload_image($FieldName, $FileArr, $dir, $allowed_types, $max_size, $max_width, $max_height);
            createThumbnail($finfo['file_path'], $finfo['file_name'], "176", "133");

            $params = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'rank_id' => $this->input->post('rank_id'),
                'created' => time(),
                'status' => '0',
                'is_deleted' => 0,
                'is_banned' => 0,
                'remark' => $this->input->post('remark'),
                'user_agent' => $_SERVER['HTTP_USER_AGENT'],
                'thumbnil' => $finfo['file_name']
            );

            $user_id = $this->User_model->add_user($params);
            redirect('dashboard/user/index');
        } else {

            $this->load->model('Rank_model');
            $data['all_ranks'] = $this->Rank_model->get_all_ranks();

            $this->load->view('user_view/add', $data);
        }
    }

    /*
     * Editing a user
     */

    function edit($id) {
// check if the user exists before trying to edit it
        $user = $this->User_model->get_user($id);

        if (isset($user['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'Name', 'required|max_length[60]|min_length[4]');
            $this->form_validation->set_rules('password', 'Password', 'min_length[5]|matches[rpassword]|max_length[40]');
            $this->form_validation->set_rules('rpassword', 'Re-Type Password', 'min_length[5]');
            $this->form_validation->set_rules('rank_id', 'Rank', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('thumbnil', 'Thumbnil');
            $this->form_validation->set_rules('remark', 'Remark', 'max_length[120]');
            $this->form_validation->set_rules('is_deleted', 'Is Deleted', 'exact_length[1]');
            $this->form_validation->set_rules('is_banned', 'Is Banned', 'exact_length[1]');

            if ($this->form_validation->run()) {

                if (isset($_FILES['thumbnil']['name']) == TRUE) {
                    if ($_FILES['thumbnil']['name'] == NULL) {
                        
                    } else {
                        $FieldName = "thumbnil";
                        $FileArr = $_FILES;
                        $dir = $this->dirname;
                        $allowed_types = "gif|jpg|jpeg|png";
                        $max_size = "10000";
                        $max_width = "9000";
                        $max_height = "6000";
                        $finfo = upload_image($FieldName, $FileArr, $dir, $allowed_types, $max_size, $max_width, $max_height);

                        createThumbnail($finfo['file_path'], $finfo['file_name'], "176", "133");
                        $thumbnail = $finfo['file_name'];
                        delete_old_image($user['thumbnil'], $this->dirname);
                    }
                }

                $params = array(
                    'name' => $this->input->post('name'),
                    'rank_id' => $this->input->post('rank_id'),
                    'status' => $this->input->post('status'),
                    'is_banned' => $this->input->post('is_banned'),
                    'remark' => $this->input->post('remark'),
                );

                if (isset($thumbnail)) {
                    $params['thumbnil'] = $thumbnail;
                }
                if (!empty(trim($this->input->post('password'))) || $this->input->post('password') != "") {
                    $params['password'] = $this->input->post('password');
                }
                $this->User_model->update_user($id, $params);
                redirect('dashboard/user/index');
            } else {
                $data['user'] = $this->User_model->get_user($id);

                $this->load->model('Rank_model');
                $data['all_ranks'] = $this->Rank_model->get_all_ranks();
                $this->load->view('user_view/edit', $data);
            }
        } else
            show_error('The user you are trying to edit does not exist.');
    }

    /*
     * Deleting user
     */

    function remove($id) {
        $user = $this->User_model->get_user($id);

// check if the user exists before trying to delete it
        if (isset($user['id'])) {
            $this->User_model->delete_user($id, $this->dirname);
            redirect('dashboard/user/index');
        } else
            show_error('The user you are trying to delete does not exist.');
    }

    function image_type_check() {
        $ext = pathinfo($_FILES['thumbnil']['name'], PATHINFO_EXTENSION);
        $allowed_types = ['gif', 'jpg', 'jpeg', 'png'];
        if (in_array($ext, $allowed_types)) {
            // go to /system/language/form_validaiton_lang.php
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
