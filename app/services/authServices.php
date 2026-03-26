<?php
class AuthServices
{
    public function login($username, $password)
    {
        $db = Database::connect();

        $stmt = $db->prepare("SELECT * FROM users WHERE username=?");
        $stmt->execute([$username]);

        $user = $stmt->fetch();

        if (!$user) {
            return false;
        }

        if (!password_verify($password, $user['password'])) {
            return false;
        }

        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'role' => $user['role'],
        ];

        return true;
    }

    public function logout()
    {
        session_destroy();
    }

    public function user()
    {
        return $_SESSION['user'] ?? null;
    }

    public function check()
    {
        return isset($_SESSION['user']);
    }
}
