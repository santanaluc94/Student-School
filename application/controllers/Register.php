<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users');
	}
	
	public function index()
	{
		$this->template->show('register');
	}

	public function register()
	{
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'cpf' => $this->input->post('cpf'),
			'phone' => $this->input->post('phone'),
			'birthday' => $this->input->post('birthday'),
			'gender' => $this->input->post('gender'),
			'password' => $this->input->post('password')
		);

		$cpassword = $this->input->post('cpassword');
		
		if ($data['gender'] == 1) {
			$data['gender'] = "Male";
		} elseif ($data['gender'] == 2) {
			$data['gender'] = "Female";
		} else {
			$data['gender'] = "Other";
		}
		if ($data['password'] === $cpassword)
		{
			$this->users->saveUser($data);
		}
	}
}