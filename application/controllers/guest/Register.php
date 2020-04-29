<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'controllers/guest/GuestSettings.php';

class Register extends GuestSettings
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users');
    }

    public function index(): void
    {
        if ($this->hasSession()) {
            $data = get_object_vars($_SESSION['userData']);
            $data = $this->formatUserData($data);

            redirect("/user/dashboard", $data);
        }

        $this->template->show('guest/register');
    }
}
