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
        $this->load->helper('session_helper');
    }

    public function updateUser(array $data): bool
    {
        if (!isset($data['id'])) {
            return false;
        }

        $userExist = $this->db->from('users')
            ->where('id', $data['id'])
            ->or_where('email', $data['email'])
            ->or_where('cpf', $data['cpf'])
            ->get()
            ->result();

        if (count($userExist) === 1) {
            $this->db->where('id', $data['id'])->update('users', $data);
            return true;
        }

        return false;
    }

    public function updatePasswordUser(array $data)
    {
        if (!isset($data['id'])) {
            redirect('/guest/login?fieldExist=invalidLogin');
        }

        $userExist = $this->db->from('users')
            ->where('id', $data['id'])
            ->get()
            ->result();

        if (!empty($userExist)) {
            $this->db->set('password', $data['newPassword'])->where('id', $data['id'])->update('users');
            return $userExist;
        }

        // Function to errors to url
        $this->checkFieldsToUpdate($data);
        return false;
    }

    public function checkFieldsToUpdate(array $data): array
    {
        $userExist = $this->db->from('users')
            ->where('email', $data['email'])
            ->or_where('cpf', $data['cpf'])
            ->get()
            ->result_array();

        if (!empty($userExist)) {
            $fieldExist = [];

            foreach ($userExist as $user) {
                if ($data['id'] === $user['id']) {
                    continue;
                }

                if ($data['cpf'] == $user['cpf']) {
                    $fieldExist[$user['name']] = 'cpf';
                }

                if ($data['email'] == $user['email']) {
                    $fieldExist[$user['name']] = 'email';
                }
            }
        }

        return $fieldExist;
    }

    public function createUser($data): bool
    {
        $userExist = $this->db->from('users')
            ->where('email', $data['email'])
            ->or_where('cpf', $data['cpf']);

        if (empty($userExist->get()->result())) {
            $this->db->insert('users', $data);
            return true;
        }

        $this->checkFieldsIsEquals($data);
        return false;
    }

    public function userLogin($data): array
    {
        $fieldsToCheck = [
            'email' => $data['email'],
            'password' => $data['password']
        ];

        $userExist = $this->db->from('users')
            ->where($fieldsToCheck)
            ->get()
            ->result();

        if (!empty($userExist)) {
            return $userExist;
        }

        return [];
    }

    public function checkFieldsIsEquals(array $data): array
    {
        $userExist = $this->db->from('users')
            ->where('email', $data['email'])
            ->or_where('cpf', $data['cpf'])
            ->get()
            ->result_array();

        if (!empty($userExist)) {
            $fieldExist = [];

            if ($data['cpf'] == $userExist[0]['cpf']) {
                $fieldExist[] = 'cpf';
            }

            if ($data['email'] == $userExist[0]['email']) {
                $fieldExist[] = 'email';
            }
        }

        return $fieldExist;
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

    public function deleteUser($id): void
    {
        $this->db->delete('users', ['id' => $id]);

        redirect('/');
    }

    public function getDataById($id, string $field): string
    {
        $value = $this->db->select($field)->from('users')->where('id', $id)->get()->result_array();
        return $value[0][$field];
    }

    public function getAllDatasById($id): array
    {
        $userData = $this->db->from('users')->where('id', $id)->get()->result();
        return $userData;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function setCpf(string $cpf): self
    {
        $this->cpf = $cpf;
        return $this;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    public function setBirthday(string $birthday): self
    {
        $this->birthday = $birthday;
        return $this;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;
        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
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

    public function getBirthday(): string
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
