<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function __construct()
{
    $this->load->library('session');
}

function hasAdminSession(): bool
{
    if (isset($_SESSION['adminData'])) {
        if (count($_SESSION) > 1) {
            return true;
        }
    }

    return false;
}