<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'controllers/admin/AdminSettings.php';

class Edit extends AdminSettings
{
    /**
     * @var string
     */
    const USER_TYPE = 'admin';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admins');
    }

    public function index(): void
    {
        if ($this->hasAdminSession()) {
            $data = get_object_vars($_SESSION['adminData']);

            if ($this->hasAdminPermissions($data['user_type'])) {
                $data['userAdmin']['id'] = $_GET['id'];
                $data['userAdmin'] = $this->admins->getAdminUserData($data['userAdmin']['id']);

                if ($data['userAdmin']['user_type'] != self::USER_TYPE) {
                    $this->flashMessageAndRedirect('danger', '<span>This user is not a admin!</span>', '/admin/admin/grid');
                }

                $this->template->show("admin/admin/edit.php", $data);
            } else {
                $this->flashMessageAndRedirect('danger', '<span>You do not have permissions to enter in this page!</span>', '/admin/dashboard');
            }
        } else {
            redirect('/guest/adminLogin');
        }
    }
}
