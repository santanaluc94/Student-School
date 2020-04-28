<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->CI = & get_instance();
    }

    public function index(): void
    {
        $this->load->model('courses');
        $courses = $this->courses->getAllCourses();

        foreach($courses as $course) {
            $course['price'] = $this->formatPrice($course['price']);
        }

        $data = [
            'courses' => $courses
        ];

        $this->template->show('home', $data);
    }

    public function formatPrice(string $price): string
    {
        $formatter = new NumberFormatter('pt_BR',  NumberFormatter::CURRENCY);
        $newPrice = $formatter->formatCurrency($price, 'BRL');

        return $newPrice;
    }
}
