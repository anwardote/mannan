<?php

class Trip extends CI_Controller {

    protected $dirname = "trips";

    function __construct() {
        parent::__construct();
        $this->load->model('Trip_model');
        $this->load->model('Tcategory_model');
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
        $trips = $this->Trip_model->get_all_trips();
        if (isset($trips)) {
            foreach ($trips as $trip) {
                $data['id'] = $trip['id'];
                $data['title'] = $trip['title'];
                $data['description'] = $trip['description'];
                //$data['tcategorie_id'] = $trip['tcategorie_id'];
                $tcategory = $this->Tcategory_model->get_tcategory($trip['tcategorie_id']);
                $data['tcategorie_id'] = $tcategory['title'];
                $data['found_at'] = $trip['found_at'];

                if (!empty($trip['thumbnil'])) {
                    $data['thumbnil'] = $trip['thumbnil'];
                    $thumb = explode(".", $trip['thumbnil']);
                    $data['thumbnil_thumb'] = $thumb['0'] . "_thumb." . $thumb['1'];
                } else {
                    $data['thumbnil'] = "Image-Not-Found.png";
                    $data['thumbnil_thumb'] = "Image-Not-Found.png";
                }
                //$data['created_by'] = $picture['created_by'];
                $user = $this->User_model->get_user($trip['created_by']);
                $data['created_by'] = $user['name'];
                $data['created'] = date('jS F Y (T)', $trip['created']);
                $data['is_hidden'] = ($trip['is_hidden'] == 0) ? "No" : "Yes";
                //$data['updated'] = date('jS F Y (T)', $picture['updated']);
                $data['is_deleted'] = ($trip['is_deleted'] == 0) ? "No" : "Yes";
                $data['remark'] = $trip['remark'];
                $detail['trips'][] = $data;
            }
        }
        $this->load->view('trip_view/index', $detail);
    }

    /*
     * Adding a new trip
     */

    function add() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required|max_length[80]');
        $this->form_validation->set_rules('tcategorie_id', 'Tcategorie Id', 'required');
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
                'tcategorie_id' => $this->input->post('tcategorie_id'),
                'found_at' => $this->input->post('found_at'),
                'thumbnil' => $finfo['file_name'],
                'created_by' => $this->session->userdata('id'),
                'created' => time(),
                'is_hidden' => $this->input->post('is_hidden'),
                'remark' => $this->input->post('remark'),
            );

            $trip_id = $this->Trip_model->add_trip($params);
            redirect('dashboard/trip/index');
        } else {

            $this->load->model('Tcategory_model');
            $data['all_tcategories'] = $this->Tcategory_model->get_all_tcategories();

            $this->load->view('trip_view/add', $data);
        }
    }

    /*
     * Editing a trip
     */

    function edit($id) {
        // check if the trip exists before trying to edit it
        $trip = $this->Trip_model->get_trip($id);

        if (isset($trip['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'Title', 'required|max_length[80]');
            $this->form_validation->set_rules('tcategorie_id', 'Trip Category', 'required');
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
                    'tcategorie_id' => $this->input->post('tcategorie_id'),
                    'found_at' => $this->input->post('found_at'),
                    'thumbnil' => $this->input->post('thumbnil'),
                    'is_hidden' => $this->input->post('is_hidden'),
                    'remark' => $this->input->post('remark'),
                );
                if (isset($thumbnail)) {

                    $params['thumbnil'] = $thumbnail;
                }

                $this->Trip_model->update_trip($id, $params);
                redirect('dashboard/trip/index');
            } else {
                $data['trip'] = $this->Trip_model->get_trip($id);
                $this->load->model('Tcategory_model');
                $data['all_tcategories'] = $this->Tcategory_model->get_all_tcategories();
                $data['user'] = $this->User_model->get_user($data['trip']['created_by']);

                $this->load->view('trip_view/edit', $data);
            }
        } else
            show_error('The trip you are trying to edit does not exist.');
    }

    /*
     * Deleting trip
     */

    function remove($id) {
        $trip = $this->Trip_model->get_trip($id);

        // check if the trip exists before trying to delete it
        if (isset($trip['id'])) {
            $this->Trip_model->delete_trip($id, $this->dirname);
            redirect('dashboard/trip/index');
        } else
            show_error('The trip you are trying to delete does not exist.');
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
