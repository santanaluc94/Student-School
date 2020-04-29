<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'controllers/guest/GuestSettings.php';

class Boleto extends GuestSettings
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index(): void
    {
        if ($this->hasSession()) {
            $data = get_object_vars($_SESSION['userData']);
            $data = $this->formatUserData($data);

            $this->template->show("gues/boleto.php", $data);
        } else {
            redirect('/guest/login');
        }
    }
}
