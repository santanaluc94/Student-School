<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restrict extends CI_Controler{
    public function ajaxLogin()
    {
        $json = array[];
        $json['status'] = 1;
        $json['errorList'] = array();

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if(empty($email)){
            $json['status'] = 0;
            $json['errorList']['#email'] = "Preencha seu e-mail!";
        }        
        
        if(empty($password)){
            $json['status'] = 0;
            $json['errorList']['#password'] = "Preencha o campo de senha!";
        }

        else {
            $this->load->model("users");
            $result = $this->users->loginUser();

            if($result){
                $id = $result->id;
                $password = $result->password;
            }
        }
    }
}
