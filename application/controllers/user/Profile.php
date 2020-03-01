<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('session_helper');
    }

    public function index(): void
    {
        var_dump($data);
        die;
        if (hasSession()) {
            $data = get_object_vars($_SESSION['userData']);
            $data['birthday'] = date("d-m-Y", (int) $data['birthday']);
            $data['gender'] = $this->formatGender($data['gender']);

            $this->template->show("user/profile.php", $data);
        } else {
            redirect('/guest/login');
        }
    }

    public function formatGender(string $gender)
    {
        if ($gender === "Male") {
            $value = 1;
        } elseif ($gender === "Female") {
            $value = 2;
        } elseif ($gender === "Other") {
            $value = 3;
        } else {
            $value = '';
        }

        return $value;
    }
}
