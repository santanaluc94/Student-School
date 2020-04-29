<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminSettings extends MY_Controller
{
    const USER_ALLOWED_ADMIN = [
        'root',
        'admin',
        'teacher_admin'
    ];

    const USER_ALLOWED_TEACHERS = [
        'root',
        'teachers',
        'teacher_admin'
    ];

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    /**
     * has admin permission
     *
     * @param string $userType
     * @return boolean
     */
    protected function hasAdminPermissions(string $userType): bool
    {
        if (in_array($userType, self::USER_ALLOWED_ADMIN)) {
            return true;
        }

        return false;
    }

    /**
     * has teacher admin permission
     *
     * @param string $userType
     * @return boolean
     */
    protected function hasTeacherPermissions(string $userType): bool
    {
        if (in_array($userType, self::USER_ALLOWED_TEACHERS)) {
            return true;
        }

        return false;
    }
}
