<?php
namespace app\controllers;

use app\config\DBConnection;
use app\core\Controller;
use app\controllers\ArticleController;
use app\controllers\LikeArticleController;
use app\controllers\CommentController;

use function app\helpers\dd;

class HomeController extends Controller{

    private $db;

    public function __construct()
    {
        $this->db = DBConnection::getInstance()->connectDB();
    }
    
    public function index(){

        $articles = ArticleController::getAllArticle();

        // dd($articles);

        $this->view('home',['title'=>'Welcome to Home', 'articles' => $articles]);
    }
}