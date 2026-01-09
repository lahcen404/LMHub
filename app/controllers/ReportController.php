<?php

namespace app\controllers;

use app\core\Controller;
use app\config\DBConnection;
use app\helpers\Validation;

class ReportController extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = DBConnection::getInstance()->connectDB();
    }

    public function submit()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $reporterId = $_SESSION['user_id'];
        $articleId  = $_POST['article_id'] ?? null;
        $commentId  = $_POST['comment_id'] ?? null;
        $reason     = Validation::clean($_POST['reason'] ?? '');

        if (empty($reason)) {
            header("Location: /articles/details?id=$articleId&error=report_empty#comments");
            exit();
        }

        try {
            
            $sql = "INSERT INTO reports (reason, reporter_id, comment_id, article_id) 
                    VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$reason, $reporterId, $commentId, $articleId]);

            
            header("Location: /articles/details?id=$articleId&status=report_sent#comments");
            exit();

        } catch (\PDOException $e) {
            header("Location: /articles/details?id=$articleId&error=system_fail#comments");
            exit();
        }
    }
}