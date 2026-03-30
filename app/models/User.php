<?php

class User extends BaseModel
{
    public $id;
    public $username;
    public $password;
    public $role;
    public $created_at;

    public function __construct($data = [])
    {
        $this->id = $data['id'] ?? null;
        $this->username = $data['username'] ?? null;
        $this->password = $data['password'] ?? null;
        $this->role = $data['role'] ?? null;
        $this->created_at = $data['created_at'] ?? null;
    }
}
