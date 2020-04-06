<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ForgotPassword extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users');
        $this->load->helper('session_helper');
        $this->load->helper('user_data_helper');
        $this->load->library('session');
    }

    public function index(): void
    {
        if (hasSession()) {
            $data = get_object_vars($_SESSION['userData']);
            $data = formatUserData($data);

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

    public function flashMessageAndRedirectWithManyErrors(string $messageType, array $wrongValues, string $url)
    {
        $messages = [];

        switch ($messageType) {
            case 'danger':
                foreach ($wrongValues as $field) {
                    $messages[] = '<span><strong>' . ucfirst($field) . '</strong> is not valid!</span>';
                }
                break;
            case 'warning':
                foreach ($wrongValues as $field) {
                    $messages[] = '<span><strong>' . ucfirst($field) . '</strong> is already been used by an user!</span>';
                }
                break;
        }

        $this->session->set_flashdata($messageType, $messages);
        redirect($url);
    }
}
