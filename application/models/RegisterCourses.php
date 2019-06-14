<?php

class RegisterCourses extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getData($id, $select = null)
    {
        if (!empty($select))
        {
            $this->db->select($select);
        }
        $this->db->from('courses');
        $this->db->where('id', $id);
        return $this->db->get();
    }

    public function registerUser($data)
    {
        $this->db->insert('courses', $data);
    }

    public function deleteUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('courses');
    }

    public function updateUser($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('courses', $data);
    }

    public function isDuplicated($field, $value, $id = null)
    {
        if (!empty($id)) {
            $this->db->where('id !=', $id);
        }
        this->db->from('courses');
        this->db->where($field, $value);
        return $this->db->get()->num_rows() > 0;

    }
}