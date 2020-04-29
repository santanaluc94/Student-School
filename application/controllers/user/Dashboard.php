<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'controllers/user/UserSettings.php';

class Dashboard extends UserSettings
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): void
    {
        if ($this->hasSession()) {
            $data = get_object_vars($_SESSION['userData']);
            $data = $this->formatUserData($data);

            $this->template->show("user/dashboard.php", $data);
        } else {
            redirect('/guest/login');
        }
    }

    public function logOut(): void
    {
        $this->session->sess_destroy();
        redirect('/guest/login');
    }
}
