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

        $userData = $this->users->updateUser($data);

        $this->session->set_userdata("userData", $userData[0]);

        redirect('/user/account/profile');
    }

    public function validateFields(array $data)
    {
        $wrongValues = '';

        if (empty($data['name'])) {
            $wrongValues = "name";
        }

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

        if ($this->validatePhone($data['phone'])) {
            $data['phone'] = $this->validatePhone($data['phone']);
        } else {
            if (empty($wrongValues)) {
                $wrongValues = "phone";
            } else {
                $wrongValues .= "&phone";
            }
        }

        if ($this->validateBirthday($data['birthday'])) {
            $data['birthday'] = $this->validateBirthday($data['birthday']);
        } else {
            if (empty($wrongValues)) {
                $wrongValues = "birthday";
            } else {
                $wrongValues .= "&birthday";
            }
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

        redirect('/user/account/profile?error=' . $wrongValues);
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

    public function validatePhone(string $phone)
    {
        if (strlen($phone) == 14 || strlen($phone) == 15) {
            $removingDash = str_replace("-", "", $phone);
            $removingFirstParentesis = str_replace("(", "", $removingDash);
            $phone = str_replace(") ", "-", $removingFirstParentesis);

            return $phone;
        }

        return false;
    }

    public function validateBirthday(string $date)
    {
        if (strlen($date) === 10) {
            $arrayDate = explode("/", $date);
            $date = $arrayDate[2] . "-" . $arrayDate[1] . "-" . $arrayDate[0];

            return $date;
        }

        return false;
    }
}
