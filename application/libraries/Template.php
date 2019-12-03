<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Template {

    function show($view, $data=array())
    {
        $folder = explode("/", $_SERVER['REDIRECT_URL']);

        if ($folder[2] == 'guest') {
            $CI = & get_instance();

            $CI->load->view('guest/header',$data);

            $CI->load->view($view, $data);

            $CI->load->view('guest/footer',$data);

            $CI->load->view('guest/scripts',$data);
        }

        if ($folder[2] == 'user') {
            $CI = & get_instance();

            $CI->load->view('user/header',$data);

            $CI->load->view($view, $data);

            $CI->load->view('user/footer',$data);

            $CI->load->view('user/scripts',$data);
        }

        if ($folder[2] == 'admin') {
            $CI = & get_instance();

            $CI->load->view('admin/header',$data);

            $CI->load->view($view, $data);

            $CI->load->view('admin/footer',$data);

            $CI->load->view('admin/scripts',$data);
        }

    }
}