<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once (APPPATH . 'controllers/Settings.php');

class AdminLoginPost extends Settings
{
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
            redirect('admin/dashboard');
        } else {
            redirect('/admin/login');
        }
    }

    public function execute(): void
    {
        $data = [
            'nickname' => $this->input->post('nickname'),
            'password' => md5($this->input->post('password'))
        ];

        $adminData = $this->admins->userLogin($data);

        if (empty($adminData)) {
            $this->flashMessageAndRedirect('danger', '<span><strong>Nickname</strong> or <strong>password</strong> is wrong!</span>', '/guest/adminLogin');
        }

        $this->session->set_userdata("adminData", $adminData[0]);
        redirect('/admin/dashboard');

        $this->flashMessageAndRedirect('danger', '<span><strong>' . $data['email'] . '</strong> is not valid!</span>', '/admin/login');
    }
}
