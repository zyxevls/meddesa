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
        require BASE_PATH . '/views/auth/login.php';
    }

    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($this->auth->login($username, $password)) {
            flash()->success('Login berhasil. Selamat datang kembali!');
            header("Location: /admin/dashboard");
            exit;
        }

        flash()->error('Username atau password tidak valid.');
        header("Location: /login");
        exit;
    }

    public function logout()
    {
        $this->auth->logout();
        flash()->info('Anda telah logout.');
        header("Location: /login");
        exit;
    }
}
