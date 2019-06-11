<?php

class RegisterUsers extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getUserData($userLogin)
    {
        $this->db->select("*")->from("register")->where("name", $userLogin);
        
        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            return $result->row();
        } else {
            return null;
        }
    }
}