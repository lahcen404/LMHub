<?php

namespace app\controllers;

use app\core\Controller;
use app\config\DBConnection;
use PDO;

class AuthorController extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = DBConnection::getInstance()->connectDB();
    }

    
    public function dashboard()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

       
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'AUTHOR') {
            header('Location: /login');
            exit();
        }

        $authorId = $_SESSION['user_id'];

        
        $sql = "SELECT a.*, 
                (SELECT COUNT(*) FROM likesArticle WHERE article_id = a.id) as like_count,
                (SELECT COUNT(*) FROM comments WHERE article_id = a.id) as comment_count,
                GROUP_CONCAT(c.name SEPARATOR ', ') as category_list
                FROM articles a
                LEFT JOIN article_category ac ON a.id = ac.article_id
                LEFT JOIN categories c ON ac.category_id = c.id
                WHERE a.author_id = ?
                GROUP BY a.id
                ORDER BY a.created_at DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$authorId]);
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        
        $totalLikes = array_sum(array_column($articles, 'like_count'));
        $totalComments = array_sum(array_column($articles, 'comment_count'));
        $totalArticles = count($articles);

        $this->view('author/dashboard', [
            'title'         => 'Author Workspace | LMHub',
            'articles'      => $articles,
            'stats'         => [
                'articles' => $totalArticles,
                'likes'    => $totalLikes,
                'comments' => $totalComments
            ]
        ]);
    }
}