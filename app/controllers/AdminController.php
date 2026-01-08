<?php
namespace app\controllers;

use app\core\Controller;
use app\config\DBConnection;

class AdminController extends Controller{

     private $db;

    public function __construct()
    {
        $this->db = DBConnection::getInstance()->connectDB();
    }
    
    public function index(){
       
         if (!isset($_SESSION['user_id']) || ($_SESSION['user_role'] ?? '') !== 'ADMIN') {
            header('Location: /login');
            exit();
        }

        $sql = "SELECT a.id, a.title, a.created_at, u.fullname AS author_name, 
                GROUP_CONCAT(DISTINCT c.name SEPARATOR ', ') AS categories
                FROM articles a
                LEFT JOIN users u ON a.author_id = u.id
                LEFT JOIN article_category ac ON ac.article_id = a.id
                LEFT JOIN categories c ON ac.category_id = c.id
                GROUP BY a.id
                ORDER BY a.created_at DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $articles = $stmt->fetchAll();

        $this->view('admin/dashboard',['title'=>'Admin Dashboard','articles' => $articles]);
    }

    public function addCategory(){
        $this->view('admin/categories',['title'=>'Add Category']);
    }

    public function reports(){
        $this->view('admin/reports',['title'=>'Manage Reports']);
    }
}