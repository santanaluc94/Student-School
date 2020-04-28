<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once (APPPATH . 'controllers/Settings.php');

class LoginPost extends Settings
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('users');
        $this->load->helper('session_helper');
        $this->load->helper('user_data_helper');
    }

    public function index(): void
    {
        if (hasSession()) {
            redirect('user/account/delete');
        } else {
            redirect('/guest/login');
        }
    }

    public function execute(): void
    {
        $data = [
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password'))
        ];

        if ($this->validateEmail($data)) {
            $userData = $this->users->userLogin($data);

            if (empty($userData)) {
                $this->flashMessageAndRedirect('danger', '<span><strong>Email</strong> or <strong>password</strong> is wrong!</span>', '/guest/login');
            }

            $this->session->set_userdata("userData", $userData[0]);
            redirect('/user/dashboard');
        }

        $this->flashMessageAndRedirect('danger', '<span><strong>' . $data['email'] . '</strong> is not valid!</span>', '/guest/login');
    }

    private function validateEmail($data): bool
    {
        if (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }
}
