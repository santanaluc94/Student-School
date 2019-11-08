<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Restrict extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        if ($this->session->userdata("user_id")) {
            $this->template->show("user/restrict.php");
        } else {
            $data = array(
                'scripts' => array(
                    'util.js',
                    'login.js'
                )
            );
            $this->template->show("guest/login.php", $data);
        }
    }

    public function logOff()
    {
        $this->session->session_destroy();
        header("Location: " . base_url() . "user/restrict");
    }

    public function ajaxLogin()
    {
        if (!$this->input->is_ajax_request()) {
            exit("Método de login inválido.");
        }
        $json = array();
        $json['status'] = 1;
        $json['errorList'] = array();

        $data = array(
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password'))
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

            if ($result != null) {
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
