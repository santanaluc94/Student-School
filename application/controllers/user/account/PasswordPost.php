<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PasswordPost extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('session_helper');
        $this->load->model('users');
    }

    public function index(): void
    {
        if (hasSession()) {
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

        if (!$this->checkPasswordsIsEquals($data)) {
            $this->flashMessageAndRedirect('danger', '<span><strong>New Password</strong> and <strong>Confirm New Password</strong> must be equals!</span>', '/user/account/password');
        }

        if (!$this->checkCurrentPassword($data['currentPassword'], $data['id'])) {
            $this->flashMessageAndRedirect('danger', '<span><strong>Current Password</strong> is wrong!</span>', '/user/account/password');
        }

        if ($this->checkCurrentPasswordisEqualsToNewPassword($data)) {
            $this->flashMessageAndRedirect('danger', '<span><strong>Current Password</strong> must be different from <strong>New Password</strong>!</span>', '/user/account/password');
        }

        $userData = $this->users->updatePasswordUser($data);

        $this->session->set_userdata("userData", $userData[0]);
        $this->session->set_flashdata("success", "<span><strong>Current Password</strong> changed!</span>");

        redirect('/user/account/password?success=passwordChanged');
    }

    private function checkPasswordsIsEquals(array $data): bool
    {
        if ($data['newPassword'] === $data['confirmNewPassword']) {
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

    private function checkCurrentPasswordisEqualsToNewPassword(array $data): bool
    {
        if ($data['currentPassword'] === $data['newPassword']) {
            return true;
        }

        return false;
    }

    public function flashMessageAndRedirect(string $messageType, string $message, string $url)
    {
        $this->session->set_flashdata($messageType, $message);
        redirect($url);
    }
}
