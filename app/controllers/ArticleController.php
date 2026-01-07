<?php

namespace app\controllers;

use app\core\Controller;
use app\helpers\Validation;
use app\config\DBConnection;
use Exception;

class ArticleController extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = DBConnection::getInstance()->connectDB();
    }

    
    public function addArticleView()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        
        if (!isset($_SESSION['user_id']) || !in_array($_SESSION['user_role'], ['AUTHOR', 'ADMIN'])) {
            header('Location: /login');
            exit();
        }

        
        $categories = CategoryController::getAll($this->db);

        $this->view('author/create', [
            'title' => 'add Article | LMHub',
            'categories' => $categories
        ]);
    }

    
    public function storeArticle()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        
        $errors = [];
        $title       = Validation::clean($_POST['title'] ?? '');
        $content     = $_POST['content'] ?? ''; 
        $categoryIds = $_POST['category_ids'] ?? []; 
        $authorId    = $_SESSION['user_id'];

        if (Validation::isEmpty($title)) $errors['title'] = "Title required !!!";
        if (Validation::isEmpty($content)) $errors['content'] = "Content required !!!";
        if (empty($categoryIds)) $errors['categories'] = "Select at least one category !!!";

        if (empty($errors)) {
            try {
                
                $this->db->beginTransaction();

                
                $sqlArt = "INSERT INTO articles (title, content, author_id) VALUES (?, ?, ?)";
                $stmtArt = $this->db->prepare($sqlArt);
                $stmtArt->execute([$title, $content, $authorId]);
                
                $newArticleId = $this->db->lastInsertId();

                
                $sqlPvt = "INSERT INTO article_category (article_id, category_id) VALUES (?, ?)";
                $stmtPvt = $this->db->prepare($sqlPvt);
                
                foreach ($categoryIds as $catId) {
                    $stmtPvt->execute([$newArticleId, $catId]);
                }

                $this->db->commit();
                header('Location: /author/dashboard');
                exit();

            } catch (Exception $e) {
                $this->db->rollBack();
                $errors['system'] = "Database error: " . $e->getMessage();
            }
        }

        $categories = CategoryController::getAll($this->db);
        $this->view('author/create', [
            'errors' => $errors,
            'categories' => $categories
        ]);
    }
}