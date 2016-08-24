<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function upload_image($FieldName, $FileArr, $dir, $allowed_types, $max_size, $max_width, $max_height) {

    $ci = & get_instance();
    $orgFilename = $FileArr['thumbnil']['name'];
    $ext = pathinfo($orgFilename, PATHINFO_EXTENSION);
    $filename = strtotime(date("Y-m-d H:i:s")) . rand(111, 999) . "." . $ext;
    $config['upload_path'] = "assets/uploads/" . $dir;
    $config['allowed_types'] = $allowed_types;
    $config['max_size'] = $max_size; //"5000";
    $config['max_width'] = $max_width; //"1907";
    $config['max_height'] = $max_height; //"1280";
    $config['file_name'] = $filename;
    $ci->load->library('upload', $config);
    if (!$ci->upload->do_upload($FieldName)) {
//$ci->form_validation->set_message('thumb_type_check', $ci->upload->display_errors());
//echo  $ci->upload->display_errors();
    } else {
        return $ci->upload->data();
    }
}

function createThumbnail($source_image, $filename, $width, $height) {
    $ci = & get_instance();
    $config['image_library'] = "gd2";
    $config['source_image'] = $source_image . $filename;
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width'] = $width;
    $config['height'] = $height;
    $ci->load->library('image_lib', $config);
    if (!$ci->image_lib->resize()) {
        echo $ci->image_lib->display_errors();
    }
}

function delete_old_image($imageFile, $dir) {
    $thumbArr = explode(".", $imageFile);
    $thumbnil_thumb = $thumbArr['0'] . "_thumb." . $thumbArr['1'];
    @unlink('assets/uploads/' . $dir . "/" . $imageFile);
    @unlink('assets/uploads/' . $dir . "/" . $thumbnil_thumb);
}
