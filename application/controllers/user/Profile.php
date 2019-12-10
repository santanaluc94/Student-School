<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): void
    {
        if ($this->hasSession()) {
            $data = get_object_vars($_SESSION['userData']);
            $data['birthday'] = date("d-m-Y", (int) $data['birthday']);

            $this->template->show("user/profile.php", $data);
        } else {
            redirect('/guest/login');
        }
    }
}
