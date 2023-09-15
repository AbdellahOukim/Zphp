<?php

namespace app\core;

use PDO;
use PDOException;

class Database
{
    public PDO $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=" . $_ENV['DB_HOST_NAME'] . ";dbname=" . $_ENV['DB_NAME'], $_ENV['DB_USER_NAME'], $_ENV['DB_PASSWORD']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new \Exception("Database connection failed: " . $e->getMessage());
        }
    }
}
