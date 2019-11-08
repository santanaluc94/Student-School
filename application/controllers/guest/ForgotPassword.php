<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ForgotPassword extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users');
    }

    public function index()
    {
        $this->template->show('guest/forgotpassword');
    }

    public function forgotPasswordPost()
    {
        $data = array(
            'email' => $this->input->post('email'),
            'cpf' => $this->input->post('cpf')
        );

        $this->users->sendEmail($data);
    }
}
