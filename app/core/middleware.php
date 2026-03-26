<?php

class Middleware
{
    public static function auth()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }
    }

    public static function guest()
    {
        if (isset($_SESSION['user'])) {
            header('Location: /dashboard');
            exit();
        }
    }

    public static function role($role)
    {
        self::auth();

        if ($_SESSION['user']['role'] !== $role) {
            header('HTTP/1.0 403 Forbidden');
            echo "Access denied.";
            exit();
        }
    }
}
