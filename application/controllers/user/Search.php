<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('courses');
        $this->load->library('session');
        $this->load->helper('session_helper');
    }

    public function index(): void
    {
        if (hasSession()) {
            $this->template->show('user/search/search');
        } else {
            $data = [
                'scripts' => [
                    'util.js',
                    'login.js'
                ]
            ];
            $this->template->show("user/search/search.php", $data);
        }
    }

    public function searchPost(): void
    {
        $search = $this->input->post('search');

        $courses['result'] = $this->courses->getAllCourses($search);
        $courses['search'] = $search;

        $this->template->show("user/search/search.php", $courses);
    }
}
