<?php

class Tcategory extends CI_Controller {

    protected $dirname = "tcategory";

    function __construct() {
        parent::__construct();
        $this->load->model('Tcategory_model');
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
        $tcategories = $this->Tcategory_model->get_all_tcategories();

        if (isset($tcategories)) {
            foreach ($tcategories as $tcategory) {
                $data['id'] = $tcategory['id'];
                $data['title'] = $tcategory['title'];
                $data['description'] = $tcategory['description'];

                if (!empty($tcategory['thumbnil'])) {
                    $data['thumbnil'] = $tcategory['thumbnil'];
                    $thumb = explode(".", $tcategory['thumbnil']);
                    $data['thumbnil_thumb'] = $thumb['0'] . "_thumb." . $thumb['1'];
                } else {
                    $data['thumbnil'] = "Image-Not-Found.png";
                    $data['thumbnil_thumb'] = "Image-Not-Found.png";
                }
                //$data['is_hidden'] = ($tcategory['is_hidden'] == 0) ? "No" : "Yes";

                $data['remark'] = $tcategory['remark'];
                $detail['tcategories'][] = $data;
            }
        }
        $this->load->view('tcategory_view/index', $detail);
    }

    /*
     * Adding a new tcategory
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
                'Remark' => $this->input->post('Remark'),
            );

            $tcategory_id = $this->Tcategory_model->add_tcategory($params);
            redirect('dashboard/tcategory/index');
        } else {
            $this->load->view('tcategory_view/add');
        }
    }

    /*
     * Editing a tcategory
     */

    function edit($id) {
        // check if the tcategory exists before trying to edit it
        $tcategory = $this->Tcategory_model->get_tcategory($id);

        if (isset($tcategory['id'])) {
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

                $this->Tcategory_model->update_tcategory($id, $params);
                redirect('dashboard/tcategory/index');
            } else {
                $data['tcategory'] = $this->Tcategory_model->get_tcategory($id);

                $this->load->view('tcategory_view/edit', $data);
            }
        } else
            show_error('The tcategory you are trying to edit does not exist.');
    }

    /*
     * Deleting tcategory
     */

    function remove($id) {
        $tcategory = $this->Tcategory_model->get_tcategory($id);

        // check if the tcategory exists before trying to delete it
        if (isset($tcategory['id'])) {
            $this->Tcategory_model->delete_tcategory($id, $this->dirname);
            redirect('dashboard/tcategory/index');
        } else
            show_error('The tcategory you are trying to delete does not exist.');
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
