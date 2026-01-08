<?php

namespace app\controllers;

use app\core\Controller;
use app\config\DBConnection;
use PDO;

class LikeCommentController extends Controller
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

        $commentId = $_POST['comment_id'] ?? null;
        $articleId = $_POST['article_id'] ?? null; 
        $userId    = $_SESSION['user_id'];

        if ($commentId && $articleId) {
            $checkSql = "SELECT id FROM likesComment WHERE comment_id = ? AND reader_id = ?";
            $stmt = $this->db->prepare($checkSql);
            $stmt->execute([$commentId, $userId]);
            $existingLike = $stmt->fetch();

            if ($existingLike) {
                // Unlike
                $sql = "DELETE FROM likesComment WHERE comment_id = ? AND reader_id = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$commentId, $userId]);
            } else {
                // Like
                $sql = "INSERT INTO likesComment (comment_id, reader_id) VALUES (?, ?)";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$commentId, $userId]);
            }

            
            header("Location: /articles/details?id=$articleId#comments");
            exit();
        }

        header("Location: /");
        exit();
    }

    public static function getByArticle($pdo, $articleId, $userId = 0)
    {
        $sql = "SELECT c.*, u.fullName, 
                (SELECT COUNT(*) FROM likesComment WHERE comment_id = c.id) as like_count,
                (SELECT COUNT(*) FROM likesComment WHERE comment_id = c.id AND reader_id = :userId) as is_liked
                FROM comments c 
                JOIN users u ON c.reader_id = u.id 
                WHERE c.article_id = :articleId 
                ORDER BY c.created_at DESC";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'articleId' => $articleId,
            'userId'    => $userId 
        ]);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}