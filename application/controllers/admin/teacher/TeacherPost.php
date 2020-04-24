<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TeacherPost extends CI_Controller
{
    /**
     * @var string
     */
    const USER_TYPE = 'teacher';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('admins');
        $this->load->helper('admin_session_helper');
    }

    public function index(): void
    {
        if (hasAdminSession()) {
            redirect('admin/teacher/list');
        } else {
            redirect('/guest/adminLogin');
        }
    }

    public function execute(): void
    {
        echo '<pre>';
        $data = [
            'name' => $this->input->post('name'),
            'nickname' => $this->input->post('nickname'),
            'email' => $this->input->post('email'),
            'cpf' => $this->input->post('cpf'),
            'password' => $this->input->post('password'),
            'cpassword' => $this->input->post('cpassword'),
            'your_password' => $this->input->post('your_password'),
            'user_type' => self::USER_TYPE
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
        $usedValues = [];

        if (empty($data['name'])) {
            $wrongValues[] = 'name';
        }

        if (empty($data['nickname'])) {
            $wrongValues[] = 'nickname';
        } elseif ($this->admins->isDataUsed($data['nickname'], 'nickname')) {
            $usedValues[] = 'nickname';
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $wrongValues[] = 'email';
        } elseif ($this->admins->isDataUsed($data['email'], 'email')) {
            $usedValues[] = 'email';
        }

        if ($this->validateCpf($data['cpf'])) {
            $data['cpf'] = $this->formatCpf($data['cpf']);
        } else {
            $wrongValues[] = 'cpf';
        }

        if ($this->validatePassword($data['password'])) {
            $data['password'] = md5($data['password']);
        } else {
            $wrongValues[] = "password";
        }

        if (!empty($wrongValues)) {
            $this->flashMessageAndRedirectWithManyErrors('danger', $wrongValues, '/guest/register');
        }

        if (!empty($usedValues)) {
            $this->flashMessageAndRedirectWithManyErrors('warning', $usedValues, '/admin/teacher/add');
        }

        return $data;
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

    public function validatePassword(string $password): bool
    {
        $cpassword = $this->input->post('cpassword');

        if ($password === $cpassword) {
            return true;
        }

        return false;
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
