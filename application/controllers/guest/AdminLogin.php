<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'controllers/guest/GuestSettings.php';

class AdminLogin extends GuestSettings
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): void
    {
        if ($this->hasAdminSession()) {
            $data = get_object_vars($_SESSION['adminData']);

            redirect("/admin/dashboard", $data);
        }

        $this->template->show('guest/admin_login');
    }
}
