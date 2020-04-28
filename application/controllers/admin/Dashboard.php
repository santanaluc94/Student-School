<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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

            $this->template->show("admin/dashboard.php", $data);
        } else {
            redirect('/guest/adminLogin');
        }
    }

    public function logOut(): void
    {
        $this->session->sess_destroy();
        header("Location: " . base_url() . "guest/adminLogin");
    }
}
