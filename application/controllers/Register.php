<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		// $this->load->model('registerusers');
		// $this->registerusers->getUserData("Mary Dole");
		$this->template->show('register');
	}
}