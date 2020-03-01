<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('users');
        $this->load->helper('session_helper');
    }

    public function index(): void
    {
        if (hasSession()) {
            $data = get_object_vars($_SESSION['userData']);
            $data['birthday'] = date("d-m-Y", (int) $data['birthday']);
            $data['gender'] = $this->formatGender($data['gender']);

            $this->template->show("user/profile.php", $data);
        } else {
            $this->template->show('guest/login');
        }
    }

    public function loginPost(): void
    {
        $data = [
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password'))
        ];

        $cpfValited = $this->validateEmail($data);

        if ($cpfValited) {
            $userData = $this->users->userLogin($data);
            $this->session->set_userdata("userData", $userData[0]);

            redirect('/user/dashboard');
        }
    }

    public function validateEmail($data): bool
    {
        if (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        redirect('/guest/login?error=email');
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

    public function test()
    {
        var_dump($this->session->get_userdata());
        //var_dump(get_class_methods($this->session));
        echo 'XABLAU!!!';
    }
}
