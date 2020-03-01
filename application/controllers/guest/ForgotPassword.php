<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ForgotPassword extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users');
    }

    public function index(): void
    {
        $this->template->show('guest/forgotpassword');
    }

    public function forgotPasswordPost(): void
    {
        $data = [
            'email' => $this->input->post('email'),
            'cpf' => $this->input->post('cpf')
        ];

        $this->validateFields($data);

        $this->users->sendEmail($data);
    }

    public function validateFields($data): bool
    {
        $wrongValues = '';

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            if (empty($wrongValues)) {
                $wrongValues = "email";
            } else {
                $wrongValues .= "&email";
            }
        }

        if ($this->validateCpf($data['cpf'])) {
            $data['cpf'] = $this->validateCpf($data['cpf']);
        } else {
            if (empty($wrongValues)) {
                $wrongValues = "cpf";
            } else {
                $wrongValues .= "&cpf";
            }
        }

        if (empty($wrongValues)) {
            return true;
        }

        redirect('/guest/forgotPassword?error=' . $wrongValues);
    }

    public function validateCpf(string $cpf)
    {
        if (strlen($cpf) === 14) {

            $removingDots = str_replace(".", "", $cpf);
            $formattedCpf = str_replace("-", "", $removingDots);

            return $formattedCpf;
        }

        return false;
    }
}
