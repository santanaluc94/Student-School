<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('courses');
        $this->load->helper('session_helper');
        $this->load->helper('user_data_helper');
    }

    public function index(): void
    {
        $id = (int) $_GET['id'];


        if (hasSession()) {
            $data = get_object_vars($_SESSION['userData']);
            $data = formatUserData($data);
            $data['course'] = $this->courses->getCourseById($id);

            $this->template->show("/user/course/page", $data);
        } else {
            redirect('guest/login');
        }
    }
}
