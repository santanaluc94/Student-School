<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Restrict extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        if ($this->session->userdata("user_id")) {
            $this->template->show("user/dashboard.php");
        } else {
            $data = [
                'scripts' => [
                    'util.js',
                    'login.js'
                ]
            ];
            $this->template->show("guest/login.php", $data);
        }
    }

    public function logOff()
    {
        $this->session->session_destroy();
        header("Location: " . base_url() . "user/login");
    }
}
