<?php
namespace app\config;
use PDO;
use PDOException;
class DBConnection {
    private $host = 'localhost';
    private $dbName = 'LMHubDB';
    private $username = 'root';
    private $password = 'root';
    private $connection;

    public function connectDB() {
        if ($this->connection == null) {
            try {
                $this->connection = new PDO("mysql:host={$this->host};dbname={$this->dbName}", $this->username, $this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

                // echo " Database is connected!<br>";
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
        return $this->connection;
    }
}