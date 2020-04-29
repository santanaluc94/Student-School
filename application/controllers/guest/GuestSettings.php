<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GuestSettings extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    protected function formatUserData(array $data): array
    {
        $data['birthday'] = date("d-m-Y", (int) $data['birthday']);
        $data['gender'] = $this->formatGender($data['gender']);

        return $data;
    }

    protected function formatGender(string $gender): string
    {
        if ($gender === "Male") {
            $value = 1;
        } elseif ($gender === "Female") {
            $value = 2;
        } elseif ($gender === "Other") {
            $value = 3;
        } else {
            $value = '';
        }

        return $value;
    }
}
