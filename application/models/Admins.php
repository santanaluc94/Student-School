<?php

class Admins extends CI_Model
{
    /**
     * Id Administrator
     *
     * @var int
     */
    private $id;

    /**
     * Administrator Name
     *
     * @var string
     */
    private $name;

    /**
     * Administrator Nickname
     *
     * @var string
     */
    private $nickname;

    /**
     * Administrator Email
     *
     * @var string
     */
    private $email;

    /**
     * Administrator CPF
     *
     * @var string
     */
    private $cpf;

    /**
     * Administrator Password
     *
     * @var string
     */
    private $password;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
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

    public function setNickname(string $nickname): self
    {
        $this->nickname = $nickname;
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

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function userLogin($data): array
    {
        $fieldsToCheck = [
            'nickname' => $data['nickname'],
            'password' => $data['password']
        ];

        $userExist = $this->db->from('admins')
            ->where($fieldsToCheck)
            ->get()
            ->result();

        if (!empty($userExist)) {
            return $userExist;
        }

        return [];
    }

    public function getAllDatasByColumn(string $field, string $column): array
    {
        $value = [];
        $value = $this->db->select($column)->from('admins')->where($column, $field)->get()->result_array();

        return $value[0];
    }

    public function isDataUsed(string $field, string $column): bool
    {
        $value = $this->db->select($column)->from('admins')->where($column, $field)->get()->row_array();

        if (!empty($value)) {
            return true;
        }

        return false;
    }

    public function getDataById(int $id, string $column): string
    {
        $value = [];
        $value = $this->db->select($column)->from('admins')->where('id', $id)->get()->row_array();

        return $value[$column];
    }

    public function canCreateUser($data): bool
    {
        $usersExist = $this->db->from('admins')
            ->where('nickname', $data['nickname'])
            ->or_where('email', $data['email'])
            ->or_where('cpf', $data['cpf'])
            ->get()->result_array();

        if (empty($usersExist)) {
            return true;
        }

        return false;
    }

    public function createUser($data): void
    {
        $this->db->insert('admins', $data);
    }

    public function checkFieldsIsEquals(array $data): array
    {
        $usersExist = $this->db->from('admins')
            ->where('nickname', $data['nickname'])
            ->or_where('email', $data['email'])
            ->or_where('cpf', $data['cpf'])
            ->get()->result_array();

        $fieldExist = [];

        if (!empty($usersExist)) {
            foreach ($usersExist as $user) {
                if ($data['cpf'] == $user['cpf']) {
                    $fieldExist[$user['name']] = 'cpf';
                }

                if ($data['email'] == $user['email']) {
                    $fieldExist[$user['name']] = 'email';
                }

                if ($data['nickname'] == $user['nickname']) {
                    $fieldExist[$user['name']] = 'nickname';
                }
            }
        }

        return $fieldExist;
    }

    public function getAllTeachers(): array
    {
        return $this->db->select('id, name, nickname, email, cpf')
            ->from('admins')
            ->where('user_type', 'teacher')
            ->get()
            ->result_array();
    }

    public function getAdminUserData(int $id): array
    {
        return $this->db->select('id, name, nickname, email, cpf, user_type')
            ->from('admins')
            ->where('id', $id)
            ->get()
            ->row_array();
    }

    public function isDataUsedLessInId(string $field, string $column, int $id): bool
    {
        $value = $this->db->select($column)
            ->from('admins')
            ->where('id !=', $id)
            ->where($column, $field)
            ->get()
            ->result_array();

        if (!empty($value)) {
            return true;
        }

        return false;
    }

    public function canUpdateUser($data): bool
    {
        $usersExist = $this->db->from('admins')
            ->where('id !=', $data['id'])
            ->where('nickname', $data['nickname'])
            ->where('email', $data['email'])
            ->where('cpf', $data['cpf'])
            ->get()->result_array();

        if (empty($usersExist)) {
            return true;
        }

        return false;
    }

    public function updateUser($data): void
    {
        $this->db->where('id', $data['id'])->update('admins', $data);
    }

    public function deleteUser(int $id): void
    {
        $this->db->delete('admins', ['id' => $id]);
    }
}
