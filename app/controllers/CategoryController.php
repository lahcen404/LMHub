<?php

namespace app\controllers;

use app\core\Controller;
use app\helpers\Validation;
use app\config\DBConnection;
use PDO;

class CategoryController extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = DBConnection::getInstance()->connectDB();
    }

   
    public function index()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        
        
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'ADMIN') {
            header('Location: /login');
            exit();
        }

        $categories = self::getAll($this->db);

        $this->view('admin/categories', [
            'title' => 'Manage Categories | LMHub',
            'categories' => $categories
        ]);
    }

    
    public function addCategory()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        
        $name = Validation::clean($_POST['name'] ?? '');
        $errors = [];

        if (Validation::isEmpty($name)) {
            $errors['name'] = "Category name is required !!!";
        }

        if (empty($errors)) {
            
            $stmt = $this->db->prepare("SELECT id FROM categories WHERE name = ?");
            $stmt->execute([$name]);
            if ($stmt->fetch()) {
                $errors['name'] = "Category already exists !!!";
            } else {
                if (self::save($this->db, $name)) {
                    header('Location: /admin/add-category');
                    exit();
                }
            }
        }

        $categories = self::getAll($this->db);
        return $this->view('admin/categories', [
            'errors' => $errors,
            'categories' => $categories
        ]);
    }

    
    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $stmt = $this->db->prepare("DELETE FROM categories WHERE id = ?");
            $stmt->execute([$id]);
        }
        header('Location: /admin/add-category');
        exit();
    }


    public function update()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'ADMIN') {
            header('Location: /login');
            exit();
        }

        $id = $_POST['id'] ?? null;
        $name = Validation::clean($_POST['name'] ?? '');
        $errors = [];

        if (Validation::isEmpty($name)) {
            $errors['name'] = 'Categooory name is required';
        }

        if (empty($errors)) {
            $stmt = $this->db->prepare('UPDATE categories SET name = ? WHERE id = ?');
            $stmt->execute([$name, $id]);
            header('Location: /admin/add-category');
            exit();
        }

        $categories = self::getAll($this->db);
        return $this->view('admin/categories', [
            'errors' => $errors,
            'categories' => $categories
        ]);
    }

    
    public static function save($pdo, $name)
    {
        $sql = "INSERT INTO categories (name) VALUES (:name)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['name' => $name]);
    }

    
    public static function getAll($pdo)
    {
        $stmt = $pdo->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}