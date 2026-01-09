<?php

namespace app\controllers;

use app\core\Controller;
use app\helpers\Validation;
use app\helpers\debug;
use app\config\DBConnection;
use app\controllers\LikeCommentController;
use app\controllers\LikeArticleController;
use Exception;
use PDO;


class ArticleController extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = DBConnection::getInstance()->connectDB();
    }

    // view of add article
    public function addArticleView()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (!isset($_SESSION['user_id']) || ($_SESSION['user_role'] ?? '') !== 'AUTHOR') {
            header('Location: /login');
            exit();
        }

        
        $categories = CategoryController::getAll($this->db);

        
        $this->view('author/create', [
            'title' => 'add Article | LMHub',
            'categories' => $categories
        ]);
    }

    // get ALll Articles

      public static function getAllArticle()
    {
        $db = DBConnection::getInstance()->connectDB();

        
        $sql = "SELECT a.*, u.fullName AS author_name,
                GROUP_CONCAT(c.name SEPARATOR ', ') AS categories
                FROM articles a
                LEFT JOIN users u ON a.author_id = u.id
                LEFT JOIN article_category ac ON a.id = ac.article_id
                LEFT JOIN categories c ON ac.category_id = c.id
                GROUP BY a.id
                ORDER BY a.created_at DESC";

        $stmt = $db->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result ? $result : [];
    }

    // stoore article
    public function storeArticle()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['user_id']) || ($_SESSION['user_role'] ?? '') !== 'AUTHOR') {
            header('Location: /login');
            exit();
        }
        
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

    // edit article view
    public function editArticleView()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['user_id']) || ($_SESSION['user_role'] ?? '') !== 'AUTHOR') {
            header('Location: /login');
            exit();
        }

        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /author/dashboard');
            exit();
        }

        
        $sql = "SELECT * FROM articles WHERE id = ? AND author_id = ? LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id, $_SESSION['user_id']]);
        $article = $stmt->fetch();

        if (!$article) {
            header('Location: /author/dashboard');
            exit();
        }

        
        $categories = CategoryController::getAll($this->db);

        $sqlSel = "SELECT category_id FROM article_category WHERE article_id = ?";
        $s = $this->db->prepare($sqlSel);
        $s->execute([$id]);
        $selected = array_column($s->fetchAll(), 'category_id');

        $this->view('author/edit', [
            'title' => 'Edit Article',
            'article' => $article,
            'categories' => $categories,
            'selected' => $selected
        ]);
    }

    public function viewArticle()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /');
            exit();
        }

        if (session_status() === PHP_SESSION_NONE) session_start();
        $userId = $_SESSION['user_id'] ?? 0;

        
        $sql = "SELECT a.id, a.title, a.content, a.created_at, u.fullName AS author_name,
                GROUP_CONCAT(c.name SEPARATOR ', ') AS categories
                FROM articles a
                LEFT JOIN users u ON a.author_id = u.id
                LEFT JOIN article_category ac ON ac.article_id = a.id
                LEFT JOIN categories c ON ac.category_id = c.id
                WHERE a.id = ?
                GROUP BY a.id
                LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $article = $stmt->fetch();

        if (!$article) {
            header('Location: /');
            exit();
        }

        $comments = LikeCommentController::getByArticle($this->db, $id, $userId);

        $articleLikeCount = LikeArticleController::getCount($this->db, $id);
        $isArticleLiked   = LikeArticleController::isLiked($this->db, $id, $userId);

       $this->view('articles/articleDetails', [
            'title'            => htmlspecialchars($article['title']),
            'article'          => $article,
            'comments'         => $comments,
            'articleLikeCount' => $articleLikeCount,
            'isArticleLiked'   => $isArticleLiked
        ]);
        
    }

    

    // updatte article
    public function updateArticle()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['user_id']) || ($_SESSION['user_role'] ?? '') !== 'AUTHOR') {
            header('Location: /login');
            exit();
        }

        $id = $_POST['article_id'] ?? null;
        $title = Validation::clean($_POST['title'] ?? '');
        $content = $_POST['content'] ?? '';
        $categoryIds = $_POST['category_ids'] ?? [];

        $errors = [];
        if (Validation::isEmpty($title)) $errors['title'] = 'Title required';
        if (Validation::isEmpty($content)) $errors['content'] = 'Content required';
        if (empty($categoryIds)) $errors['categories'] = 'Select at least one category';

        if ($id && empty($errors)) {
            try {
                $this->db->beginTransaction();
                $sql = "UPDATE articles SET title = ?, content = ? WHERE id = ? AND author_id = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$title, $content, $id, $_SESSION['user_id']]);

                $del = $this->db->prepare("DELETE FROM article_category WHERE article_id = ?");
                $del->execute([$id]);

                $ins = $this->db->prepare("INSERT INTO article_category (article_id, category_id) VALUES (?, ?)");
                foreach ($categoryIds as $c) {
                    $ins->execute([$id, $c]);
                }

                $this->db->commit();
                header('Location: /author/dashboard');
                exit();
            } catch (Exception $e) {
                $this->db->rollBack();
                $errors['system'] = $e->getMessage();
            }
        }

      
        $categories = CategoryController::getAll($this->db);
        $this->view('author/edit', [
            'errors' => $errors,
            'article' => ['id' => $id, 'title' => $title, 'content' => $content],
            'categories' => $categories,
            'selected' => $categoryIds
        ]);
    }

    // delaete article
    public function deleteArticle()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['user_id']) || ($_SESSION['user_role'] ?? '') !== 'AUTHOR') {
            header('Location: /login');
            exit();
        }

        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /author/dashboard');
            exit();
        }

        try {
            $this->db->beginTransaction();
            $delPvt = $this->db->prepare("DELETE FROM article_category WHERE article_id = ?");
            $delPvt->execute([$id]);

            $del = $this->db->prepare("DELETE FROM articles WHERE id = ? AND author_id = ?");
            $del->execute([$id, $_SESSION['user_id']]);

            $this->db->commit();
        } catch (Exception $e) {
            $this->db->rollBack();
        }

        header('Location: /author/dashboard');
        exit();
    }
    
}