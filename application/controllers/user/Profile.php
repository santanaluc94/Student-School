<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        var_dump($_SESSION['userData']);
        $userData = $_SESSION['userData'];
        $userData->cpf = $this->maskCpf($userData->cpf);
        var_dump($userData);
        $this->template->show("user/profile.php", $userData);
    }

    public function maskCpf($cpf)
    {
        $mask = '###.###.###-##';
        $maskared = '';
        $k = 0;

        for ($i = 0; $i <= strlen($mask) - 1; $i++) {
            if ($mask[$i] == '#') {
                if (isset($cpf[$k]))
                    $maskared .= $cpf[$k++];
            } else {
                if (isset($mask[$i]))
                    $maskared .= $mask[$i];
            }
        }

        return $maskared;
    }
}
