<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DeletePost extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('session_helper');
        $this->load->helper('user_data_helper');
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

    public function delete(): void
    {
        if ($this->input->post('deleteAccount') === 'on') {
            $id = $this->input->post('id');

            $this->session->sess_destroy();
            $this->users->deleteUser($id);
        }
    }
}
