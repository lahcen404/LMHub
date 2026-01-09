<?php

session_start();
 require_once __DIR__ . '/../app/config/DBConnection.php';
require_once __DIR__ . '/../bootstrap/autoload.php';

// use app\config\DBConnection;
use app\core\Router;
use app\models\Admin;


require_once __DIR__. '/../app/helpers/debug.php';

$admin = new Admin(1,'lahcenAdmin','lahcen@gml.com','lahcen123');

// dd($admin);

// $role = $admin->getRole();
// echo "role" . (is_object($role) ? $role->name : $role);


 // DBConnection::getInstance()->connectDB();
 // $con = new DBConnection();

$router = new Router();
$router->get('/', "HomeController@index");
$router->get('/admin/dashboard', "AdminController@index");
$router->get('/admin/add-category', "CategoryController@index");
$router->get('/admin/reports', "AdminController@reports");
$router->get('/author/dashboard', "AuthorController@dashboard");
$router->get('/author/add-article', "ArticleController@addArticleView");
$router->get('/author/edit-article', "ArticleController@editArticleView");
$router->get('/author/delete-article', "ArticleController@deleteArticle");
$router->get('/articles/details', "ArticleController@viewArticle");
$router->get('/articles/search', "ArticleController@searchArticle");
$router->get('/dashboard', "ReaderController@dashboard");
$router->get('/profile', "UserController@profile");
$router->get('/login','AuthController@loginView');
$router->get('/register','AuthController@registerView');
$router->get('/logout','AuthController@logout');
$router->get('/admin/category/delete', 'CategoryController@delete');

$router->get('/admin/report/dismiss', "AdminController@dismissReport");
$router->get('/admin/report/delete-content', "AdminController@deleteReportedContent");


$router->post('/login', 'AuthController@Login');
$router->post('/register', 'AuthController@Register');
$router->post('/admin/add-category', 'CategoryController@addCategory');
$router->post('/admin/category/update', 'CategoryController@update');
$router->post('/author/add-article', 'ArticleController@storeArticle');
$router->post('/author/update-article', 'ArticleController@updateArticle');
$router->post('/article/comment', 'CommentController@addComment');
$router->post('/comment/like', 'LikeCommentController@toggle');
$router->post('/article/like', 'LikeArticleController@toggle');
$router->post('/report/submit', 'ReportController@submit');

$router->dispatch();