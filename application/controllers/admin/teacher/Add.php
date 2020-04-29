<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'controllers/admin/AdminSettings.php';

class Add extends AdminSettings
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): void
    {
        if ($this->hasAdminSession()) {
            $data = get_object_vars($_SESSION['adminData']);

            $this->template->show("admin/teacher/add.php", $data);
        } else {
            redirect('/guest/adminLogin');
        }
    }
}
