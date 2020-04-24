<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grid extends CI_Controller
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

            $this->template->show("admin/teacher/grid.php", $data);
        } else {
            redirect('/guest/adminLogin');
        }
    }
}
