<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    protected $front = "front-end";

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->model('Pcategory_model');
        $this->load->model('About_model');
    }

    public function index() {
        $pcategories = $this->Pcategory_model->get_all_pcategories();
        $detail['about'] = $this->About_model->get_all_about();

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
        $this->load->view($this->front . "/" . 'about', $detail);
    }

}
