<?php

class Users extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function saveUser($data)
    {
        var_dump($data);

        $userExist = $this->db->from('register')->where('email', $data['email'])->or_where('cpf', $data['cpf']);
        
        if (empty($userExist->get()->result())) {
            $this->db->insert('register', $data);
        } else {
            echo "This user already exists";
        }
        
    }

    public function loginUser($data)
    {
        $this->db->from('register')->where('email', $data['email'])->where('password', $data['password']);
    
        $userExist = $this->db->get();

        if (!empty($userExist)) {
            echo "Welcome " . $userExist->result_array()[0]['name'] . "!";
        } else {
            echo "This user doesn't exist";
        }
    }

    public function sendEmail($data)
    {
        $this->db->from('register')->where('email', $data['email'])->where('cpf', $data['cpf']);
        $userExist = $this->db->get();

        if (!empty($userExist->result())) {
            echo "E-mail sent to " . $data['email'] . '.';
        } else {
            echo "This e-mail doesn't exist.";
        }
    }

}