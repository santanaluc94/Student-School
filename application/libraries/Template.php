<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Template
{
    function show($view, $data = array())
    {
        if (isset($_SERVER['REDIRECT_URL'])) {
            $folder = explode("/", $_SERVER['REDIRECT_URL']);

            switch ($folder[2]) {
                case 'user':
                    $CI = &get_instance();
                    $CI->load->view('user/header', $data);
                    $CI->load->view($view, $data);
                    break;
                case 'admin':
                    $CI = &get_instance();
                    $CI->load->view('admin/header', $data);
                    $CI->load->view($view, $data);
                    break;
                case 'guest':
                    $CI = &get_instance();
                    $CI->load->view('guest/header', $data);
                    $CI->load->view($view, $data);
                    break;
            }
        } else {
            $CI = &get_instance();
            $CI->load->view('guest/header', $data);
            $CI->load->view($view, $data);
        }

        $CI->load->view('footer', $data);
        $CI->load->view('scripts', $data);
    }
}
