<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        if ($this->session->userdata("id")) {
            $this->template->show('user/dashboard');
        } else {
            $data = array(
                'scripts' => array(
                    'util.js',
                    'login.js'
                )
            );
            $this->template->show("guest/login.php", $data);
        }
    }

    public function logOff()
    {
        $this->session->sess_destroy();
        header("Location: " . base_url() . "guest/login");
    }

    public function test()
    {
        echo 'XABLAU!!!';
    }
}
