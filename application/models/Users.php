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

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function setCpf($cpf): void
    {
        $this->cpf = $cpf;
    }

    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    public function setBirthday($birthday): void
    {
        $this->birthday = $birthday;
    }

    public function setGender($gender): void
    {
        $this->gender = $gender;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getBirthday(): date
    {
        return $this->birthday;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
