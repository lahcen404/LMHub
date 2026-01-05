<?php

namespace app\config;

use PDO;
use PDOException;

class DBConnection
{
    private static ?DBConnection $instance = null; 
    private ?PDO $connection = null;


    // load .env variables
    private static function loadEnv(): void
    {
        $envPath = dirname(__DIR__, 2) . '/.env';

        if (!file_exists($envPath)) {
            die('.env file not found');
        }

        $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            if (str_starts_with($line, '#')) continue;

            [$key, $value] = explode('=', $line, 2);
            $_ENV[$key] = trim($value);
        }
    }

   

    private function __construct() {}
    public function __wakeup() {
        throw new \Exception("Cannot unserialize singleton");
    }
    private function __clone(){}

    public static function getInstance(): DBConnection
    {
        if (self::$instance === null) {
            self::loadEnv();
            self::$instance = new DBConnection();
        }
        return self::$instance;
    }

    
    public function connectDB(): PDO
    {
        if ($this->connection === null) {
            try {
                $this->connection = new PDO(
                    "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};charset=utf8mb4",
                    $_ENV['DB_USER'],
                    $_ENV['DB_PASS']
                );

                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                echo "Connected sucesss";
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }

        return $this->connection;
    }

    

    
}
