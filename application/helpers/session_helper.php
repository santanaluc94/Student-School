<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function __construct()
{
    $this->load->library('session');
}

function hasSession(): bool
{
    if (count($_SESSION) > 1) {
        return true;
    }

    return false;
}
