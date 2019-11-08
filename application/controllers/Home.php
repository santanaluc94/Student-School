<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('courses');
        $courses = $this->courses->getCourse();
        $data = array(
            'courses' => $courses
        );
        $this->template->show('home', $data);
    }
}
