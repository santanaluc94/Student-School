<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'controllers/user/UserSettings.php';

class Search extends UserSettings
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('courses');
        $this->load->library('session');
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
        if (isset($_GET['numberPage'])) {
            $courses['page'] = (int) $_GET['numberPage'];
            $courses['numberPage'] = (int) $_GET['numberPage'];
        } else {
            $courses['page'] = 1;
            $courses['numberPage'] = 1;
        }

        // Search text
        $courses['search'] = "";

        if ($this->input->post('search') !== null) {
            $courses['search'] = $this->input->post('search');
            $this->session->set_userdata(array("search" => $courses['search']));
        } else {
            if ($this->session->userData('search') !== null) {
                $courses['search'] = $this->session->userdata('search');
            }
        }

        // Show how many cards will be displayed per page
        $courses['pageQty'] = 9;

        // Row position
        if ($courses['numberPage'] !== 1) {
            $courses['numberPage'] = ($courses['numberPage'] - 1) * $courses['pageQty'];
        }

        // Get page courses
        $courses['result'] = $this->courses->getAllCoursesByName($courses['search']);

        // Count total results
        $courses['countAllResult'] = count($courses['result']);

        // Count current page result
        $courses['countResult'] = (int) ceil($courses['countAllResult'] / $courses['pageQty']);

        // Courses in current pages
        if ($courses['countResult'] > 1) {
            $courses['result'] = array_slice($courses['result'], $courses['numberPage'], $courses['pageQty']);
        }

        // Setitng previous and next page buttons
        $courses['previousPage'] = $courses['page'] - 1;
        $courses['nextPage'] = $courses['page'] + 1;

        // Load view
        $this->template->show("user/search/search", $courses);
    }
}
