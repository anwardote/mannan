<?php

class Pcategory extends CI_Controller {

    protected $dirname = "pcategory";

    function __construct() {
        parent::__construct();
        $this->load->model('Pcategory_model');
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
        $pcategories = $this->Pcategory_model->get_all_pcategories();

        if (isset($pcategories)) {
            foreach ($pcategories as $pcategory) {
                $data['id'] = $pcategory['id'];
                $data['title'] = $pcategory['title'];
                $data['description'] = $pcategory['description'];

                if (!empty($pcategory['thumbnil'])) {
                    $data['thumbnil'] = $pcategory['thumbnil'];
                    $thumb = explode(".", $pcategory['thumbnil']);
                    $data['thumbnil_thumb'] = $thumb['0'] . "_thumb." . $thumb['1'];
                } else {
                    $data['thumbnil'] = "Image-Not-Found.png";
                    $data['thumbnil_thumb'] = "Image-Not-Found.png";
                }
                //$data['is_hidden'] = ($tcategory['is_hidden'] == 0) ? "No" : "Yes";

                $data['remark'] = $pcategory['remark'];
                $detail['pcategories'][] = $data;
            }
        }
        $this->load->view('pcategory_view/index', $detail);
    }

    /*
     * Adding a new pcategory
     */

    function add() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required|max_length[80]');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('thumbnil', 'Thumbnil', 'callback_image_type_check');

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
                'thumbnil' => $finfo['file_name'],
                'created_by' => $this->session->userdata('id'),
                'created' => time(),
                'is_deleted' => 0,
                'remark' => $this->input->post('remark'),
            );

            $pcategory_id = $this->Pcategory_model->add_pcategory($params);
            redirect('dashboard/pcategory/index');
        } else {
            $this->load->view('pcategory_view/add');
        }
    }

    /*
     * Editing a pcategory
     */

    function edit($id) {
        // check if the pcategory exists before trying to edit it
        $pcategory = $this->Pcategory_model->get_pcategory($id);

        if (isset($pcategory['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'Title', 'required|max_length[80]');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('thumbnil', 'Thumbnil');

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
                        delete_old_image($trip['thumbnil'], $this->dirname);
                    }
                }

                $params = array(
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'remark' => $this->input->post('remark'),
                );

                if (isset($thumbnail)) {
                    $params['thumbnil'] = $thumbnail;
                }

                $this->Pcategory_model->update_pcategory($id, $params);
                redirect('dashboard/pcategory/index');
            } else {
                $data['pcategory'] = $this->Pcategory_model->get_pcategory($id);

                $this->load->view('pcategory_view/edit', $data);
            }
        } else
            show_error('The pcategory you are trying to edit does not exist.');
    }

    /*
     * Deleting pcategory
     */

    function remove($id) {
        $pcategory = $this->Pcategory_model->get_pcategory($id);

        // check if the pcategory exists before trying to delete it
        if (isset($pcategory['id'])) {
            $this->Pcategory_model->delete_pcategory($id, $this->dirname);
            redirect('dashboard/pcategory/index');
        } else
            show_error('The pcategory you are trying to delete does not exist.');
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
