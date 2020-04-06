<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfilePost extends CI_Controller
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
            redirect('/user/account/profile');
        } else {
            redirect('/guest/login');
        }
    }

    public function execute(): void
    {
        $data = [
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'cpf' => $this->input->post('cpf'),
            'phone' => $this->input->post('phone'),
            'birthday' => $this->input->post('birthday'),
            'gender' => $this->input->post('gender'),
        ];
        $data = $this->validateFields($data);

        if ($this->users->updateUser($data)) {
            $userData = $this->users->getAllDatasById($data['id']);
            $this->session->set_userdata("userData", $userData[0]);
            $this->flashMessageAndRedirect('success', '<span>User updated!</span>', '/user/account/profile');
        }

        $wrongValues = $this->users->checkFieldsToUpdate($data);
        $this->flashMessageAndRedirectWithManyErrors('warning', $wrongValues, '/user/account/profile');
    }

    public function validateFields(array $data): array
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
            if (empty($wrongValues)) {
                $wrongValues = "gender";
            } else {
                $wrongValues .= "&gender";
            }
        }

        if (empty($wrongValues)) {
            return $data;
        }

        $this->flashMessageAndRedirectWithManyErrors('danger', $wrongValues, '/user/account/profile');
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

    public function flashMessageAndRedirect(string $messageType, string $message, string $url)
    {
        $this->session->set_flashdata($messageType, $message);
        redirect($url);
    }
}
