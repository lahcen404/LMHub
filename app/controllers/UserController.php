<?php

namespace app\controllers;

use app\models\Reader;
use app\helpers\debug;
use app\core\Controller;
use PDO;
use app\config\DBConnection;


class UserController extends Controller{

    private $db;

    public function __construct(){
        $this->db = DBConnection::getInstance()->connectDB();
    }



     public function profile()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        $id = $_SESSION['user_id'];

        

        $user = self::getById($this->db,$id);
        $this->view('profile', ['title' => 'User Profile | LMHub',
                                'user'=> $user]);
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

    public static function getById($pdo ,$id){

        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);

        $user = $stmt->fetch();
        return $user ?: null;

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