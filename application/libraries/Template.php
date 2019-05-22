<?php 

if(!defined('BASEPATH'))
{
    exit ('No direct script access allowed');
} 

class Template {

    function show($view, $data=array())
    {
        $CI = & get_instance();

        $CI->load->view('template/guest/header', $data);

        $CI->load->view($view, $data);

        $CI->load->view('template/guest/footer', $data);

        $CI->load->view('template/guest/scripts', $data);

    }
}