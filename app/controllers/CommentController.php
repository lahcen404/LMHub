<?php

namespace app\controllers;

use app\core\Controller;
use app\helpers\Validation;
use app\config\DBConnection;
use PDO;

class CommentController extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = DBConnection::getInstance()->connectDB();
    }

    // add comment
    public function addComment()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $articleId = $_POST['article_id'] ?? null;
        $content   = Validation::clean($_POST['content'] ?? '');
        $readerId  = $_SESSION['user_id'];

        if (Validation::isEmpty($content)) {
            header("Location: /articles/details?id=$articleId&error=empty_comment");
            exit();
        }

        if ($articleId) {
            
            $success = self::save($this->db, $content, $articleId, $readerId);

            if ($success) {
                header("Location: /articles/details?id=$articleId");
                exit();
            }
        }

        header("Location: /");
        exit();
    }

   
    // save comment in dbb
    public static function save($pdo, $content, $articleId, $readerId)
    {
        $sql = "INSERT INTO comments (content, article_id, reader_id, created_at) 
                VALUES (:content, :articleId, :readerId, NOW())";
        $stmt = $pdo->prepare($sql);
        
        return $stmt->execute([
            'content'   => $content,
            'articleId' => $articleId,
            'readerId'  => $readerId
        ]);
    }

   // get comments by article
    public static function getByArticle($pdo, $articleId)
    {
        $sql = "SELECT c.*, u.fullName 
                FROM comments c 
                JOIN users u ON c.reader_id = u.id 
                WHERE c.article_id = :articleId 
                ORDER BY c.created_at DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['articleId' => $articleId]);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}