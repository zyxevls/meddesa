<?php

use Dotenv\Dotenv;

class Database
{
    private static $instance = null;

    public static function connect()
    {
        if (self::$instance === null) {
            if (!class_exists(Dotenv::class)) {
                throw new RuntimeException('Dotenv is not available. Run composer install.');
            }

            $dotenv = Dotenv::createImmutable(dirname(__DIR__));
            $dotenv->load();
            $host = $_ENV['DB_HOST'];
            $dbname = $_ENV['DB_NAME'];
            $username = $_ENV['DB_USER'];
            $password = $_ENV['DB_PASS'];

            try {
                self::$instance = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Database connection failed: ' . $e->getMessage());
            }
        }
        return self::$instance;
    }
}
