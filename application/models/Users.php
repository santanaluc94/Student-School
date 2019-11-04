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
        } else {
            echo "This user already exists";
        }

    }

    public function userExist($data)
    {
        $userExist = $this->db->from('users')->where('email', $data['email'])->where('password', $data['password'])->get()->result_array();

        if (!empty($userExist)) {
            foreach ($userExist as $key => $value) {
                $this->setId($value['id']);
                $this->setName($value['name']);
                $this->setEmail($value['email']);
                $this->setCpf($value['cpf']);
                $this->setPhone($value['phone']);
                $this->setBirthday($value['birthday']);
                $this->setGender($value['gender']);
                $this->setPassword($value['password']);
            }
            if ($userExist[0]['email'] == $data['email'] && $userExist[0]['password'] == $data['password']) {
                return true;
            }
        } else {
            return false;
        }
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
