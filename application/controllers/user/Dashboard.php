<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('session_helper');
    }

    public function index(): void
    {
        if (hasSession()) {
            $this->template->show('user/dashboard');
        } else {
            $data = [
                'scripts' => [
                    'util.js',
                    'login.js'
                ]
            ];
            $this->template->show("user/dashboard.php", $data);
        }
    }

    public function logOut(): void
    {
        $this->session->sess_destroy();
        header("Location: " . base_url() . "guest/login");
    }

    public function test()
    {
        var_dump($this->session->get_userdata());
        //var_dump(get_class_methods($this->session));
        echo 'XABLAU!!!';
    }
}
