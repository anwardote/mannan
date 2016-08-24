<?php

class Picture extends CI_Controller {

    protected $dirname = "pictures";

    function __construct() {
        parent::__construct();
        $this->load->model('Picture_model');
        $this->load->model('Pcategory_model');
        $this->load->model('User_model');
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('url', 'form', 'MY_upload_image_helper'));

        if ($this->session->userdata('login') == 'logIn') {
            if (!($this->session->userdata('rank_id') == 1 || $this->session->userdata('rank_id') == 2 || $this->session->userdata('rank_id') == 3 || $this->session->userdata('rank_id') == 4)) {
                redirect('dashboard/error/index');
            }
        } else {
            redirect('dashboard/authentication/login');
        }
    }

    function index() {
        $pictures = $this->Picture_model->get_all_pictures();
        if (isset($pictures)) {
            foreach ($pictures as $picture) {
                $data['id'] = $picture['id'];
                $data['title'] = $picture['title'];
                $data['description'] = $picture['description'];
                $data['pcategorie_id'] = $picture['pcategorie_id'];
                $pcategory = $this->Pcategory_model->get_pcategory($picture['pcategorie_id']);
                $data['pcategorie_id'] = $pcategory['title'];
                $data['found_at'] = $picture['found_at'];

                if (!empty($picture['thumbnil'])) {
                    $data['thumbnil'] = $picture['thumbnil'];
                    $thumb = explode(".", $picture['thumbnil']);
                    $data['thumbnil_thumb'] = $thumb['0'] . "_thumb." . $thumb['1'];
                } else {
                    $data['thumbnil'] = "Image-Not-Found.png";
                    $data['thumbnil_thumb'] = "Image-Not-Found.png";
                }

                //$data['created_by'] = $picture['created_by'];
                $user = $this->User_model->get_user($picture['created_by']);
                $data['created_by'] = $user['name'];
                $data['created'] = date('jS F Y', $picture['created']);
                $data['is_hidden'] = ($picture['is_hidden'] == 0) ? "No" : "Yes";
                //$data['updated'] = date('jS F Y (T)', $picture['updated']);
                $data['is_deleted'] = ($picture['is_deleted'] == 0) ? "No" : "Yes";
                $data['remark'] = $picture['remark'];
                $detail['pictures'][] = $data;
            }
        }
        $this->load->view('picture_view/index', $detail);
    }

    function add() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'required|max_length[80]');
        $this->form_validation->set_rules('pcategorie_id', 'Picture Category', 'required');
        $this->form_validation->set_rules('thumbnil', 'Thumbnil', 'callback_image_type_check');
        $this->form_validation->set_rules('is_hidden', 'Is Hidden', 'required|exact_length[1]');

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
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'pcategorie_id' => $this->input->post('pcategorie_id'),
                'found_at' => $this->input->post('found_at'),
                'thumbnil' => $finfo['file_name'],
                'created_by' => $this->session->userdata('id'),
                'created' => time(),
                'is_hidden' => $this->input->post('is_hidden'),
                'remark' => $this->input->post('remark'),
            );

            $picture_id = $this->Picture_model->add_picture($params);
            redirect('dashboard/picture/index');
        } else {

            $this->load->model('Pcategory_model');
            $data['all_pcategories'] = $this->Pcategory_model->get_all_pcategories();

            $this->load->view('picture_view/add', $data);
        }
    }

    function edit($id) {

        // check if the picture exists before trying to edit it
        $picture = $this->Picture_model->get_picture($id);
        if (isset($picture['id'])) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'required|max_length[80]');
            $this->form_validation->set_rules('pcategorie_id', 'Picture Category', 'required');
            $this->form_validation->set_rules('thumbnil', 'Thumbnil');
            $this->form_validation->set_rules('is_hidden', 'Is Hidden', 'required|exact_length[1]');

            if ($this->form_validation->run()) {
                if (isset($_FILES['thumbnil']['name']) == TRUE) {
                    if ($_FILES['thumbnil']['name'] == NULL) {
                        
                    } else {
                        $FieldName = "thumbnil";
                        $FileArr = $_FILES;
                        $dir = $this->dirname;
                        $allowed_types = "gif|jpg|jpeg|png";
                        $max_size = "1000";
                        $max_width = "1907";
                        $max_height = "1280";
                        $finfo = upload_image($FieldName, $FileArr, $dir, $allowed_types, $max_size, $max_width, $max_height);
                        createThumbnail($finfo['file_path'], $finfo['file_name'], "176", "133");
                        $thumbnail = $finfo['file_name'];
                        delete_old_image($picture['thumbnil'], $this->dirname);
                    }
                }
                $params = array(
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'pcategorie_id' => $this->input->post('pcategorie_id'),
                    'found_at' => $this->input->post('found_at'),
                    'is_hidden' => $this->input->post('is_hidden'),
                    'remark' => $this->input->post('remark'),
                );

                if (isset($thumbnail)) {

                    $params['thumbnil'] = $thumbnail;
                }

                $this->Picture_model->update_picture($id, $params);
                redirect('dashboard/picture/index');
            } else {
                $data['picture'] = $this->Picture_model->get_picture($id);

                $this->load->model('Pcategory_model');
                $data['all_pcategories'] = $this->Pcategory_model->get_all_pcategories();
                $data['user'] = $this->User_model->get_user($data['picture']['created_by']);
                $this->load->view('picture_view/edit', $data);
            }
        } else
            show_error('The picture you are trying to edit does not exist.');
    }

    /*
     * Deleting picture
     */

    function remove($id) {
        $picture = $this->Picture_model->get_picture($id);

        // check if the picture exists before trying to delete it
        if (isset($picture['id'])) {
            $this->Picture_model->delete_picture($id, $this->dirname);
            redirect('dashboard/picture/index');
        } else
            show_error('The picture you are trying to delete does not exist.');
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
