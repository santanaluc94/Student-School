<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'controllers/admin/AdminSettings.php';

class AdminPost extends AdminSettings
{
    /**
     * @var string
     */
    const USER_TYPE = 'admin';

    /**
     * @var int
     */
    const DEFAULT_PASSWORD = 123456;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admins');
    }

    public function index(): void
    {
        if ($this->hasAdminSession()) {
            redirect('admin/admin/grid');
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
            'your_password' => md5($this->input->post('your_password')),
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
            $this->flashMessageAndRedirect('success', '<span>Admin created!</span>', '/admin/admin/grid');
        }

        $wrongValues = $this->admins->checkFieldsIsEquals($data);

        $this->flashMessageAndRedirectWithManyErrors('warning', $wrongValues, '/admin/admin/add');
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
            $this->flashMessageAndRedirectWithManyErrors('danger', $wrongValues, '/admin/admin/add');
        }

        if (!empty($usedValues)) {
            $this->flashMessageAndRedirectWithManyErrors('warning', $usedValues, '/admin/admin/add');
        }

        return $data;
    }

    public function update(): void
    {
        $data = [
            'teacher_id' => (int) $this->input->post('teacher_id'),
            'name' => $this->input->post('name'),
            'nickname' => $this->input->post('nickname'),
            'email' => $this->input->post('email'),
            'cpf' => $this->input->post('cpf'),
            'reset_password' => $this->input->post('reset_password'),
            'your_password' => md5($this->input->post('your_password')),
            'user_type' => self::USER_TYPE,
            'id' => (int) $_SESSION['adminData']->id
        ];

        $data = $this->validateFieldsToUpdate($data);
        $data['id'] = $data['teacher_id'];

        if ($this->admins->canUpdateUser($data)) {
            if (!is_null($data['reset_password'])) {
                $data['password'] = md5(self::DEFAULT_PASSWORD);
            }

            // remove datas to insert only user datas
            unset($data['teacher_id']);
            unset($data['your_password']);
            unset($data['reset_password']);

            // update user
            $this->admins->updateUser($data);
            $this->flashMessageAndRedirect('success', '<span>Teacher updated!</span>', '/admin/teacher/grid');
        }

        $wrongValues = $this->admins->checkFieldsIsEquals($data);

        $this->flashMessageAndRedirectWithManyErrors('warning', $wrongValues, '/admin/teacher/edit/?id=' . $data['teacher_id']);
    }


    public function validateFieldsToUpdate(array $data)
    {
        $wrongValues = [];
        $usedValues = [];

        if (empty($data['name'])) {
            $wrongValues[] = 'name';
        }

        if (empty($data['nickname'])) {
            $wrongValues[] = 'nickname';
        } elseif ($this->admins->isDataUsedLessInId($data['nickname'], 'nickname', $data['teacher_id'])) {
            $usedValues[] = 'nickname';
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $wrongValues[] = 'email';
        } elseif ($this->admins->isDataUsedLessInId($data['email'], 'email', $data['teacher_id'])) {
            $usedValues[] = 'email';
        }

        if (!$this->validateCpf($data['cpf'])) {
            $wrongValues[] = 'cpf';
        } else {
            $data['cpf'] = $this->formatCpf($data['cpf']);

            if ($this->admins->isDataUsedLessInId($data['cpf'], 'cpf', $data['teacher_id'])) {
                $usedValues[] = 'cpf';
            }
        }

        if (!$this->validatePasswordAdmin($data['your_password'], $data['id'])) {
            $wrongValues[] = 'Your Password';
        }

        if (!empty($wrongValues)) {
            $this->flashMessageAndRedirectWithManyErrors('danger', $wrongValues, '/admin/teacher/edit/?id=' . $data['teacher_id']);
        }

        if (!empty($usedValues)) {
            $this->flashMessageAndRedirectWithManyErrors('warning', $usedValues, '/admin/teacher/edit/?id=' . $data['teacher_id']);
        }

        return $data;
    }

    public function delete(): void
    {
        $id = (int) $this->input->post('id');

        $userType = $this->admins->getDataById($id, 'user_type');

        if ($userType !== self::USER_TYPE) {
            $this->flashMessageAndRedirect('danger', '<span>This user is not a teacher!</span>', '/admin/teacher/grid');
        }

        $this->admins->deleteUser($id);
        $this->flashMessageAndRedirect('warning', '<span>Teacher was deleted!</span>', '/admin/teacher/grid');
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
