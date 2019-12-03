<?php

class Users extends CI_Model
{
    private $id;
    private $name;
    private $email;
    private $cpf;
    private $phone;
    private $birthday;
    private $gender;
    private $password;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function saveUser($data)
    {
        $userExist = $this->db->from('users')->where('email', $data['email'])->or_where('cpf', $data['cpf']);

        if (empty($userExist->get()->result())) {
            $this->db->insert('users', $data);
            return true;
        }

        $this->checkFieldsIsEquals($data);
    }

    public function userLogin($data)
    {
        $userExist = $this->db->from('users')->where('email', $data['email'])->where('password', $data['password'])->get()->result();
        if (!empty($userExist)) {
            return $userExist;
        }

        redirect('/guest/login?error=invalidLogin');
    }

    protected function checkFieldsIsEquals($data)
    {
        $userExist = $this->db->from('users')->where('email', $data['email'])->or_where('cpf', $data['cpf'])->get()->result_array();

        if (!empty($userExist)) {
            $fieldExist = '';

            if ($data['cpf'] == $userExist[0]['cpf']) {
                $fieldExist = 'cpf';
            }

            if ($data['email'] == $userExist[0]['email']) {
                if (empty($fieldExist)) {
                    $fieldExist = 'email';
                } else {
                    $fieldExist .= "&email";
                }
            }
        }

        redirect('/guest/register?fieldExist=' . $fieldExist);
    }

    public function sendEmail($data)
    {
        $this->db->from('users')->where('email', $data['email'])->where('cpf', $data['cpf']);
        $userExist = $this->db->get();

        if (!empty($userExist->result())) {
            echo "E-mail sent to " . $data['email'] . '.';
        } else {
            echo "This e-mail doesn't exist.";
        }
    }

    public function getDataById($id)
    {
        $userData = $this->db->from('users')->where('id', $id)->get()->result();
        return $userData;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
