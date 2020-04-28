<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function flashMessageAndRedirectWithManyErrors(string $messageType, array $wrongValues, string $url)
    {
        $messages = [];

        switch ($messageType) {
            case 'danger':
                foreach ($wrongValues as $field) {
                    $messages[] = '<span><strong>' . ucfirst($field) . '</strong> is not valid!</span>';
                }
                break;
            case 'warning':
                foreach ($wrongValues as $field) {
                    $messages[] = '<span><strong>' . ucfirst($field) . '</strong> is already been used by an user!</span>';
                }
                break;
        }

        $this->session->set_flashdata($messageType, $messages);
        redirect($url);
    }

    public function flashMessageAndRedirect(string $messageType, string $message, string $url)
    {
        $this->session->set_flashdata($messageType, $message);
        redirect($url);
    }
}
