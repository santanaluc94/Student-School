<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    /**
     * Add flash messages with many errors and redirect to custom page
     *
     * @param string $messageType
     * @param array $wrongValues
     * @param string $url
     * @return void
     */
    public function flashMessageAndRedirectWithManyErrors(string $messageType, array $wrongValues, string $url): void
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

    /**
     * Add flash messages an redirect to custom url
     *
     * @param string $messageType
     * @param string $message
     * @param string $url
     * @return void
     */
    public function flashMessageAndRedirect(string $messageType, string $message, string $url): void
    {
        $this->session->set_flashdata($messageType, $message);
        redirect($url);
    }

    /**
     * Has user session
     *
     * @return boolean
     */
    public function hasSession(): bool
    {
        if (isset($_SESSION['userData'])) {
            if (count($_SESSION) > 1) {
                return true;
            }
        }

        return false;
    }

    /**
     * Has user admin session
     *
     * @return boolean
     */
    protected function hasAdminSession(): bool
    {
        if (isset($_SESSION['adminData'])) {
            if (count($_SESSION) > 1) {
                return true;
            }
        }

        return false;
    }

}
