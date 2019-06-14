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
}