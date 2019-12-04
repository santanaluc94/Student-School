<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('users');
    }

    public function index(): void
    {
        $this->template->show('guest/login');
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

    public function test()
    {
        var_dump($this->session->get_userdata());
        //var_dump(get_class_methods($this->session));
        echo 'XABLAU!!!';
    }
}
