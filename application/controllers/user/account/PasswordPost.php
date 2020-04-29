<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'controllers/user/UserSettings.php';

class PasswordPost extends UserSettings
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users');
    }

    public function index(): void
    {
        if ($this->hasSession()) {
            redirect('user/account/delete');
        } else {
            redirect('/guest/login');
        }
    }

    public function execute(): void
    {
        $data = [
            'id' => (int) $this->input->post('id'),
            'currentPassword' => md5($this->input->post('currentPassword')),
            'newPassword' => md5($this->input->post('newPassword')),
            'confirmNewPassword' => md5($this->input->post('confirmNewPassword'))
        ];

        $this->validatePassword($data['newPassword'], $data['confirmNewPassword'], $data['currentPassword'], $data['id']);

        $userData = $this->users->updatePasswordUser($data);

        $this->session->set_userdata("userData", $userData[0]);
        $this->flashMessageAndRedirect('success', '<span><strong>Current Password</strong> changed!</span>', '/user/account/password');
    }

    public function validatePassword(string $newPassword, string $confirmNewPassword, string $currentPassword, $id): void
    {
        if (!$this->checkPasswordsIsEquals($newPassword, $confirmNewPassword)) {
            $this->flashMessageAndRedirect('danger', '<span><strong>New Password</strong> and <strong>Confirm New Password</strong> must be equals!</span>', '/user/account/password');
        }

        if (!$this->checkCurrentPassword($currentPassword, $id)) {
            $this->flashMessageAndRedirect('danger', '<span><strong>Current Password</strong> is wrong!</span>', '/user/account/password');
        }

        if ($this->checkCurrentPasswordIsEqualsToNewPassword($newPassword, $currentPassword)) {
            $this->flashMessageAndRedirect('danger', '<span><strong>Current Password</strong> must be different from <strong>New Password</strong>!</span>', '/user/account/password');
        }
    }

    private function checkPasswordsIsEquals(string $newPassword, string $confirmNewPassword): bool
    {
        if ($newPassword === $confirmNewPassword) {
            return true;
        }

        return false;
    }

    private function checkCurrentPassword(string $currentPassword, int $id): bool
    {
        $passwordUser = $this->users->getDataById($id, 'password');

        if ($currentPassword === $passwordUser) {
            return true;
        }

        return false;
    }

    private function checkCurrentPasswordIsEqualsToNewPassword(string $newPassword, string $currentPassword): bool
    {
        if ($currentPassword === $newPassword) {
            return true;
        }

        return false;
    }
}
