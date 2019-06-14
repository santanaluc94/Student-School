<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForgotPassword extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users');
	}
	
	public function index()
	{
		$this->template->show('forgotpassword');
	}

	public function forgotPassword()
	{
		$data = array(
			'email' => $this->input->post('email'),
			'cpf' => $this->input->post('cpf')
		);

		$this->users->sendEmail($data);
	}
}