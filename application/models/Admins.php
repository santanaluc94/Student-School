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

    public function getAllDatasByColumn(string $field, string $collumn): array
    {
        $value = [];
        $value = $this->db->select($collumn)->from('admins')->where($collumn, $field)->get()->result_array();

        return $value[0];
    }

    public function isDataUsed(string $field, string $collumn): bool
    {
        $value = $this->db->select($collumn)->from('admins')->where($collumn, $field)->get()->row_array();

        if (!empty($value)) {
            return true;
        }

        return false;
    }
}
