<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'controllers/user/UserSettings.php';

class Search extends UserSettings
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('courses');
    }

    public function index(): void
    {
        if ($this->hasSession()) {
            $data = get_object_vars($_SESSION['userData']);
            $data = $this->formatUserData($data);

            $this->template->show('user/search/search', $data);
        } else {
            redirect('/guest/login');
        }
    }

    public function searchPost(): void
    {
        $search = $this->input->post('search');

        $courses['result'] = $this->courses->getAllCoursesByName($search);
        $courses['search'] = $search;

        $this->template->show("user/search/search.php", $courses);
    }
}
