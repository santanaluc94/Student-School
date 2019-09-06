<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restrict extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    public function ajaxLogin()
    {
        $json = array();
        $json['status'] = 1;
        $json['errorList'] = array();

        $data = array(
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
        );
        
        if (empty($data['email'])) {
            $json['status'] = 0;
            $json['errorList']['#email'] = "Preencha seu e-mail!";
        } elseif (empty($data['password'])) {
            $json['status'] = 0;
            $json['errorList']['#password'] = "Preencha o campo de senha!";
        } else {
            $this->load->model("users");
            $result = $this->users->userExist($data);
            
            if($result != null) {
                $json['status'] = 1;
                $id = $this->users->getId();
                $password = $this->users->getPassword();
            } else {
                $json['status'] = 0;
            }
        }
        if ($json['status'] == 0) {
            $json['errorList']['btn_login'] = "Usuário e/ou senha incorretos!";
        }

        echo json_encode($json);
    }
}
