<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once (APPPATH . 'controllers/Settings.php');

class TeacherPost extends Settings
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
            redirect('admin/teacher/grid');
        } else {
            redirect('/guest/adminLogin');
        }
    }

    public function execute(): void
    {
        $data = [
            'name' => $this->input->post('name'),
            'nickname' => $this->input->post('nickname'),
            'email' => $this->input->post('email'),
            'cpf' => $this->input->post('cpf'),
            'password' => $this->input->post('password'),
            'cpassword' => $this->input->post('cpassword'),
            'your_password' => $this->input->post('your_password'),
            'user_type' => self::USER_TYPE,
            'id' => (int) $_SESSION['adminData']->id
        ];

        $data = $this->validateFields($data);

        if ($this->admins->canCreateUser($data)) {
            // remove datas to insert only user datas
            unset($data['id']);
            unset($data['cpassword']);
            unset($data['your_password']);

            // create user
            $this->admins->createUser($data);
            $this->flashMessageAndRedirect('success', '<span>Teacher created!</span>', '/admin/teacher/grid');
        }

        $wrongValues = $this->admins->checkFieldsIsEquals($data);

        $this->flashMessageAndRedirectWithManyErrors('warning', $wrongValues, '/admin/teacher/add');
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

        if (!$this->validateCpf($data['cpf'])) {
            $wrongValues[] = 'cpf';
        } elseif ($this->admins->isDataUsed($data['cpf'], 'cpf')) {
            $usedValues[] = 'cpf';
        } else {
            $data['cpf'] = $this->formatCpf($data['cpf']);
        }

        if ($this->validatePassword($data['password'], $data['cpassword'])) {
            $data['password'] = md5($data['password']);
        } else {
            $wrongValues[] = "password";
        }

        if (!$this->validatePasswordAdmin($data['your_password'], $data['id'])) {
            $wrongValues[] = 'Your Password';
        }

        if (!empty($wrongValues)) {
            $this->flashMessageAndRedirectWithManyErrors('danger', $wrongValues, '/admin/teacher/add');
        }

        if (!empty($usedValues)) {
            $this->flashMessageAndRedirectWithManyErrors('warning', $usedValues, '/admin/teacher/add');
        }

        return $data;
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

    private function validatePassword(string $password, string $confirmPassword): bool
    {
        if ($password === $confirmPassword) {
            return true;
        }

        return false;
    }

    private function validatePasswordAdmin(string $password, int $id): bool
    {
        $passwordAdmin = $this->admins->getDataById($id, 'password');

        if ($password === $passwordAdmin) {
            return true;
        }

        return false;
    }
}
