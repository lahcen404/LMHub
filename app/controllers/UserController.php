<?php

namespace app\controllers;

use app\models\Reader;
use app\core\Controller;
use PDO;


class UserController extends Controller{

     public function profile()
    {
        $this->view('profile', ['title' => 'User Profile | LMHub']);
    }

     public static function save($pdo, $name, $email, $password, $role = 'READER')
    {
        $sql = "INSERT INTO users (fullName, email, password, role) VALUES (:name, :email, :pass, :role)";
        $stmt = $pdo->prepare($sql);
        
        return $stmt->execute([
            'name'  => $name,
            'email' => $email,
            'pass'  => $password,
            'role'  => $role
        ]);
    }

      public static function findByEmail($pdo, $email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ?: null;
    }

    public static function getAll($pdo)
    {
        $stmt = $pdo->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}