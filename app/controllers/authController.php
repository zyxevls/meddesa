<?php

class AuthController
{
    private $auth;

    public function __construct()
    {
        $this->auth = new AuthServices();
    }

    public function showLogin()
    {
        require '../views/auth/login.php';
    }

    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($this->auth->login($username, $password)) {
            header("Location: /dashboard");
            exit;
        }

        echo "Login Gagal";
    }

    public function logout()
    {
        $this->auth->logout();
        header("Location: /login");
    }
}
