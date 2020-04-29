<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'controllers/admin/AdminSettings.php';

class Grid extends AdminSettings
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): void
    {
        if ($this->hasAdminSession()) {
            $data = get_object_vars($_SESSION['adminData']);

            if ($this->hasAdminPermissions($data['user_type'])) {
                $this->template->show("admin/teacher/grid.php", $data);
            } else {
                $this->flashMessageAndRedirect('danger', '<span>You do not have permissions to enter in this page!</span>', '/admin/dashboard');
            }
        } else {
            redirect('/guest/adminLogin');
        }
    }
}
