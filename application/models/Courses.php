<?php

class Courses extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function registerCourses($data)
    {
        $this->db->insert('courses', $data);
    }

    public function getCourse()
    {
        return $this->db->from('courses')->get()->result_array();
    }

    public function getAllCourses(string $courseName): array
    {
        return $this->db->query("SELECT * FROM courses WHERE UPPER(course) LIKE UPPER('%$courseName%')")->result_array();
    }

    public function getCourseById(int $id): array
    {
        return $this->db->select('*')->from('courses')->where('id', $id)->get()->row_array();
    }
}
