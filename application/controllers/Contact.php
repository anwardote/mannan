<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    protected $front = "front-end";

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->model('Pcategory_model');
        $this->load->model('Contact_model');
    }

    public function index() {
        $pcategories = $this->Pcategory_model->get_all_pcategories();
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
        $this->load->view($this->front."/".'contact', $detail);
    }

}
