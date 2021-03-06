<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'controllers/guest/GuestSettings.php';

class RegisterPost extends GuestSettings
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users');
    }

    public function index(): void
    {
        if ($this->hasSession()) {
            redirect('user/account/dashboard');
        } else {
            redirect('/guest/login');
        }
    }

    public function execute(): void
    {
        $data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'cpf' => $this->input->post('cpf'),
            'phone' => $this->input->post('phone'),
            'birthday' => $this->input->post('birthday'),
            'gender' => $this->input->post('gender'),
            'password' => $this->input->post('password')
        ];

        $data = $this->validateFields($data);

        if ($this->users->createUser($data)) {
            $id = $this->db->insert_id();
            $userData = $this->users->getAllDatasById($id);
            $this->session->set_userdata("userData", $userData[0]);

            redirect('user/dashboard');
        }

        $wrongValues = $this->users->checkFieldsIsEquals($data);
        $this->flashMessageAndRedirectWithManyErrors('warning', $wrongValues, '/guest/register');
    }

    public function validateFields(array $data)
    {
        $wrongValues = [];

        if (empty($data['name'])) {
            $wrongValues[] = "name";
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $wrongValues[] = "email";
        }

        if ($this->validateCpf($data['cpf'])) {
            $data['cpf'] = $this->formatCpf($data['cpf']);
        } else {
            $wrongValues[] = "cpf";
        }

        if ($this->validatePhone($data['phone'])) {
            $data['phone'] = $this->formatPhone($data['phone']);
        } else {
            $wrongValues[] = "phone";
        }

        if ($this->validateBirthday($data['birthday'])) {
            $data['birthday'] = $this->formatBirthday($data['birthday']);
        } else {
            $wrongValues[] = "birthday";
        }

        if ($data['gender'] == 1) {
            $data['gender'] = "Male";
        } elseif ($data['gender'] == 2) {
            $data['gender'] = "Female";
        } elseif ($data['gender'] == 3) {
            $data['gender'] = "Other";
        } else {
            $wrongValues[] = "gender";
        }

        if ($this->validatePassword($data['password'])) {
            $data['password'] = md5($data['password']);
        } else {
            $wrongValues[] = "password";
        }

        if (empty($wrongValues)) {
            return $data;
        }

        $this->flashMessageAndRedirectWithManyErrors('danger', $wrongValues, '/guest/register');
    }

    public function validateCpf(string $cpf): bool
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

    private function validatePhone(string $phone): bool
    {
        if (strlen($phone) == 14 || strlen($phone) == 15) {
            return true;
        }

        return false;
    }

    private function formatPhone(string $phone): string
    {
        $removingDash = str_replace("-", "", $phone);
        $removingFirstParentesis = str_replace("(", "", $removingDash);
        $phone = str_replace(") ", "-", $removingFirstParentesis);

        return $phone;
    }

    private function validateBirthday(string $date): bool
    {
        if (strlen($date) === 10) {
            return true;
        }

        return false;
    }

    private function formatBirthday(string $date)
    {
        $arrayDate = explode("/", $date);
        $date = $arrayDate[2] . "-" . $arrayDate[1] . "-" . $arrayDate[0];

        return $date;
    }

    public function validatePassword(string $password): bool
    {
        $cpassword = $this->input->post('cpassword');

        if ($password === $cpassword) {
            return true;
        }

        return false;
    }
}
