<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Restrict extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index(): void
    {
        if ($this->session->userdata("user_id")) {
            redirect("user/dashboard.php");
        } else {
            $data = [
                'scripts' => [
                    'util.js',
                    'login.js'
                ]
            ];
            redirect("guest/login.php", $data);
        }
    }
}
