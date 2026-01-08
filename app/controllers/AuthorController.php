<?php

namespace app\controllers;
use app\core\Controller;
use app\config\DBConnection;


class AuthorController extends Controller{

        private $db;

    public function __construct()
    {
        $this->db = DBConnection::getInstance()->connectDB();
    }


    public function dashboard(){
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'AUTHOR') {
            header('Location: /login');
            exit();
        }


        $sql = "SELECT a.id, a.title, a.content, a.created_at, GROUP_CONCAT(c.name SEPARATOR ', ') as categories
                FROM articles a
                LEFT JOIN article_category ac ON ac.article_id = a.id
                LEFT JOIN categories c ON ac.category_id = c.id
                WHERE a.author_id = ?
                GROUP BY a.id
                ORDER BY a.created_at DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$_SESSION['user_id']]);
        $articles = $stmt->fetchAll();

        $this->view('author/dashboard',['title'=>'Dashboard','articles' => $articles]);
    }

    public function addArticle(){
        $this->view('author/create',['title'=>'Create Article']);
    }

}