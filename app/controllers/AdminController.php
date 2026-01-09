<?php

namespace app\controllers;

use app\core\Controller;
use app\config\DBConnection;
use PDO;

class AdminController extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = DBConnection::getInstance()->connectDB();
    }

    
    public function index()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (!isset($_SESSION['user_id']) || ($_SESSION['user_role'] ?? '') !== 'ADMIN') {
            header('Location: /login');
            exit();
        }

        
        $sqlArt = "SELECT a.id, a.title, a.created_at, u.fullName AS author_name, 
                   GROUP_CONCAT(DISTINCT c.name SEPARATOR ', ') AS categories
                   FROM articles a
                   LEFT JOIN users u ON a.author_id = u.id
                   LEFT JOIN article_category ac ON ac.article_id = a.id
                   LEFT JOIN categories c ON ac.category_id = c.id
                   GROUP BY a.id ORDER BY a.created_at DESC LIMIT 10";
        $articles = $this->db->query($sqlArt)->fetchAll(PDO::FETCH_ASSOC);

        
        $sqlRep = "SELECT r.*, u.fullName as reporter_name, 
                   art.title as article_report_title, 
                   parent_art.title as comment_parent_title
                   FROM reports r
                   JOIN users u ON r.reporter_id = u.id
                   LEFT JOIN articles art ON r.article_id = art.id
                   LEFT JOIN comments com ON r.comment_id = com.id
                   LEFT JOIN articles parent_art ON com.article_id = parent_art.id
                   ORDER BY r.created_at DESC LIMIT 5";
        $reports = $this->db->query($sqlRep)->fetchAll(PDO::FETCH_ASSOC);

        $this->view('admin/dashboard', [
            'title'    => 'Admin Dashboard',
            'articles' => $articles,
            'reports'  => $reports
        ]);
    }

   
    public function dismissReport()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $stmt = $this->db->prepare("DELETE FROM reports WHERE id = ?");
            $stmt->execute([$id]);
        }
        
        header('Location: /admin/dashboard');
        exit();
    }

   
    public function deleteReportedContent()
    {
         
        $targetId = $_GET['id'] ?? null;        
        $reportId = $_GET['report_id'] ?? null; 

        if ( $targetId) {
            
            
            $this->db->beginTransaction();
            try { 
                
                $stmt = $this->db->prepare("DELETE FROM comments WHERE id = ?");
                $stmt->execute([$targetId]);

                
                $stmtRep = $this->db->prepare("DELETE FROM reports WHERE id = ?");
                $stmtRep->execute([$reportId]);

                $this->db->commit();
            } catch (\Exception $e) {
                $this->db->rollBack();
            }
        }
       
        header('Location: /admin/dashboard');
        exit();
    }
}