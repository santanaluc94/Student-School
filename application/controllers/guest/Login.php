<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function login()
	{
		$this->load->helper('url');
		$this->template->show('template/guest/login');
    }
    
    
    // $email = $_POST['email'];
    // $password = $_POST['password'];

    // $connectionDb = new Database();
    // $connection = $connectionDb->connection();

    // $queryLogin = "SELECT * FROM register where email = '$email' AND password = '$password';";

    // $query = mysqli_query($connection, $queryLogin);
    // $connected = mysqli_num_rows($query);


    // if ($connected == 1) {
    //     $datas = mysqli_fetch_array($query);    
    //     $_SESSION = $datas;
    //     header("Location: ../../view/user/index.php");
    // }

    // else {
    //     header("Location: javascript:history.back(-2)");
    // }

}