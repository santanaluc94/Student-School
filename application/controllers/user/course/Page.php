<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'controllers/user/UserSettings.php';

class Page extends UserSettings
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('courses');
    }

    public function index(): void
    {
        $id = (int) $_GET['id'];

        if ($this->hasSession()) {
            $data = get_object_vars($_SESSION['userData']);
            $data = $this->formatUserData($data);
            $data['course'] = $this->courses->getCourseById($id);

            $this->template->show("/user/course/page", $data);
        } else {
            redirect('guest/login');
        }
    }
}
