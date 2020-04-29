<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'controllers/guest/GuestSettings.php';

class ForgotPassword extends GuestSettings
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
        } else {
            $this->template->show('guest/forgotpassword');
        }
    }

    public function forgotPasswordPost(): void
    {
        $data = [
            'email' => $this->input->post('email'),
            'cpf' => $this->input->post('cpf')
        ];

        if ($this->validateFields($data)) {
            $this->users->sendEmail($data);
        }
    }

    public function validateFields($data): bool
    {
        $wrongValues = [];

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $wrongValues[] = "email";
        }

        if ($this->validateCpf($data['cpf'])) {
            $data['cpf'] = $this->formatCpf($data['cpf']);
        } else {
            $wrongValues[] = "cpf";
        }

        if (empty($wrongValues)) {
            return true;
        }

        $this->flashMessageAndRedirectWithManyErrors('danger', $wrongValues, '/guest/register');
    }

    private function validateCpf(string $cpf): bool
    {
        if (strlen($cpf) === 14) {
            return true;
        }

        return false;
    }

    private function formatCpf(string $cpf): string
    {
        $removingDots = str_replace(".", "", $cpf);
        $formattedCpf = str_replace("-", "", $removingDots);

        return $formattedCpf;
    }
}
