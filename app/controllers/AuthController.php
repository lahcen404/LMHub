<?php

namespace app\controllers;

use app\core\Controller;
use app\helpers\Validation;
use app\controllers\UserController;
use app\config\DBConnection;
use app\enums\Role;

class AuthController extends Controller
{
    private $db;

    public function __construct()
    {
        
        $this->db = DBConnection::getInstance()->connectDB();
    }

    public function loginView()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!empty($_SESSION['user_id'])) {
            return $this->redirectByRole($_SESSION['user_role'] ?? null);
        }

        $this->view('auth/login', ['login' => 'Login | LMHub']);
    }

    public function registerView()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!empty($_SESSION['user_id'])) {
            return $this->redirectByRole($_SESSION['user_role'] ?? null);
        }

        $this->view('auth/register', ['Register' => 'Register | LMHub']);
    }

    
    public function Register()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        $errors = [];

        
        $name     = Validation::clean($_POST['fullName'] ?? '');
        $email    = Validation::clean($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        
        if (Validation::isEmpty($name)) {
            $errors['name'] = 'name required !!!';
        }

        if (Validation::isEmpty($email)) {
            $errors['email'] = 'email required !!!';
        }

        if (Validation::isEmpty($password)) {
            $errors['password'] = 'password required !!!';
        }

        if (!empty($email) && !Validation::isEmail($email)) {
            $errors['email'] = 'invalid email format !!!';
        }

        if (!empty($password) && !Validation::isStrongPassword($password)) {
            $errors['password'] = "Password must be more than 6 characters !!";
        }

        if (empty($errors)) {

            if (UserController::findByEmail($this->db, $email)) {
                $errors['email'] = 'email already exists !!!';
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                if (UserController::save($this->db, $name, $email, $hashedPassword, 'READER')) {
                    
                    header('Location: /login');
                    exit;
                } else {
                    $errors['system'] = 'System error!! Try again';
                }
            }
        }

        return $this->view('auth/register', ['errors' => $errors]);
    }

    
    public function Login()
    {
        $email = Validation::clean($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (Validation::isEmpty($email) || Validation::isEmpty($password)) {
            $errors['email'] = "email required t !!!";
            $errors['password'] = "password required !!!";
        }

        $userRecord = UserController::findByEmail($this->db, $email);

        if ($userRecord && password_verify($password, $userRecord['password'])) {
            if (session_status() === PHP_SESSION_NONE) session_start();
            
            $_SESSION['user_id'] = $userRecord['id'];
            $_SESSION['user_name'] = $userRecord['fullName'];
            $_SESSION['user_role'] = $userRecord['role'];

            return $this->redirectByRole($userRecord['role']);
        }

        return $this->view('auth/login', ['error' => 'Invalid email or password!!']);
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        session_destroy();
        header('Location: /login');
        exit;
    }

    private function redirectByRole($role)
    {
        switch ($role) {
            case 'ADMIN':  header('Location: /admin/dashboard'); break;
            case 'AUTHOR': header('Location: /author/dashboard'); break;
            default:       header('Location: /'); break;
        }
        exit;
    }
}