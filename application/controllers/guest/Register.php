<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users');
    }

    public function index()
    {
        $this->template->show('guest/register');
    }

    public function registerPost()
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

        if ($this->users->saveUser($data)) {
            redirect('user/dashboard');
        }

        redirect('/guest/register?error=userExist');
    }

    public function validateFields($data)
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

        if ($this->validatePassword($data['password'])) {
            $data['password'] = md5($data['password']);
        } else {
            if (empty($wrongValues)) {
                $wrongValues = "password";
            } else {
                $wrongValues .= "&password";
            }
        }

        if (empty($wrongValues)) {
            return $data;
        }

        redirect('/guest/register?error=' . $wrongValues);
    }

    public function validateCpf($cpf)
    {
        if (strlen($cpf) === 14) {

            $removingDots = str_replace(".", "", $cpf);
            $formattedCpf = str_replace("-", "", $removingDots);

            return $formattedCpf;
        }

        return false;
    }

    public function validatePhone($phone)
    {
        if (strlen($phone) == 14 || strlen($phone) == 15) {
            $removingDash = str_replace("-", "", $phone);
            $removingFirstParentesis = str_replace("(", "", $removingDash);
            $phone = str_replace(") ", "-", $removingFirstParentesis);
            return $phone;
        }

        return false;
    }

    public function validateBirthday($date)
    {
        if (strlen($date) === 10) {
            $arrayDate = explode("/", $date);
            $date = $arrayDate[2] . "-" . $arrayDate[1] . "-" . $arrayDate[0];

            return $date;
        }

        return false;
    }

    public function validatePassword($password)
    {
        $cpassword = $this->input->post('cpassword');

        if ($password === $cpassword) {
            return true;
        }

        return false;
    }
}
