<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'controllers/user/UserSettings.php';

class DeletePost extends UserSettings
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
        }

        redirect('/guest/login');
    }

    public function delete(): void
    {
        if ($this->input->post('deleteAccount') === 'on') {
            $id = $this->input->post('id');

            $this->session->sess_destroy();
            $this->users->deleteUser($id);
        }
    }
}
