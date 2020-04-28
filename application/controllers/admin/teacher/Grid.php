<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once (APPPATH . 'controllers/Settings.php');

class Grid extends Settings
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('admin_session_helper');
        $this->load->helper('admin_permisions_helper');
    }

    public function index(): void
    {
        if (hasAdminSession()) {
            $data = get_object_vars($_SESSION['adminData']);

            if (hasAdminPermissions($data['user_type'])) {
                $this->template->show("admin/teacher/grid.php", $data);
            } else {
                $this->flashMessageAndRedirect('danger', '<span>You do not have permissions to enter in this page!</span>', '/admin/dashboard');
            }

            $this->template->show("admin/teacher/grid.php", $data);
        } else {
            redirect('/guest/adminLogin');
        }
    }
}
