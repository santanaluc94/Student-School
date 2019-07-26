<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users');
	}

    public function index()
	{
		$this->template->show('guest/login');
	}

	public function login()
	{
		$data = array(
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
		);

		$this->users->loginUser($data);
	}
}