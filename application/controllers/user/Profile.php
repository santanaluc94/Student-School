<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index(): void
    {
        $data = get_object_vars($_SESSION['userData']);
        $data['birthday'] = date("d-m-Y", (int) $data['birthday']);

        $this->template->show("user/profile.php", $data);
    }
}
