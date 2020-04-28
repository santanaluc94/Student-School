<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminLogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('admin_session_helper');
    }

    public function index(): void
    {
        if (hasAdminSession()) {
            $data = get_object_vars($_SESSION['adminData']);

            redirect("/admin/dashboard", $data);
        }

        $this->template->show('guest/admin_login');
    }
}
