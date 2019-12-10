<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    public function hasSession(): bool
    {
        if ($_SESSION !== null) {
            return true;
        }

        return false;
    }
}
