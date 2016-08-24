<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    protected $front = "front-end";

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->model('Pcategory_model');
        $this->load->model('Tcategory_model');
    }

    public function index() {
        $pcategories = $this->Pcategory_model->get_all_pcategories();
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
        $this->load->view($this->front . '/home_view', $detail);
    }

}
