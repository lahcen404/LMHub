<?php

namespace app\controllers;

use app\core\Controller;
use app\config\DBConnection;
use PDO;

class LikeArticleController extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = DBConnection::getInstance()->connectDB();
    }

    
    public function toggle()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $articleId = $_POST['article_id'] ?? null;
        $userId    = $_SESSION['user_id'];

        if ($articleId) {
            
            $checkSql = "SELECT id FROM likesArticle WHERE article_id = ? AND reader_id = ?";
            $stmt = $this->db->prepare($checkSql);
            $stmt->execute([$articleId, $userId]);
            $existingLike = $stmt->fetch();

            if ($existingLike) {
                // unlike
                $sql = "DELETE FROM likesArticle WHERE article_id = ? AND reader_id = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$articleId, $userId]);
            } else {
                // like
                $sql = "INSERT INTO likesArticle (article_id, reader_id) VALUES (?, ?)";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$articleId, $userId]);
            }

            
            header("Location: /articles/details?id=$articleId");
            exit();
        }

        header("Location: /");
        exit();
    }

   
    public static function getCount($pdo, $articleId)
    {
        $sql = "SELECT COUNT(*) FROM likesArticle WHERE article_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$articleId]);
        return (int)$stmt->fetchColumn();
    }

    public static function isLiked($pdo, $articleId, $userId)
    {
        if (!$userId) return false;

        $sql = "SELECT 1 FROM likesArticle WHERE article_id = ? AND reader_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$articleId, $userId]);
        return (bool)$stmt->fetch();
    }
}