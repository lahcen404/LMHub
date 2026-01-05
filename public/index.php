<?php
 require_once __DIR__ . '/../app/config/DBConnection.php';
require_once __DIR__ . '/../bootstrap/autoload.php';

// use app\config\DBConnection;
use app\core\Router;
use app\models\Admin;


require_once __DIR__. '/../helpers/functions/debug.php';

$admin = new Admin(1,'lahcenAdmin','lahcen@gml.com','lahcen123');

// dd($admin);

// $role = $admin->getRole();
// echo "role" . (is_object($role) ? $role->name : $role);


 // DBConnection::getInstance()->connectDB();
 // $con = new DBConnection();

$router = new Router();
$router->get('/', "HomeController@index");
$router->get('/admin/dashboard', "AdminController@index");
$router->get('/admin/add-category', "AdminController@addCategory");
$router->get('/admin/reports', "AdminController@reports");
$router->get('/author/dashboard', "AuthorController@dashboard");
$router->get('/author/add-article', "AuthorController@addArticle");
$router->get('/author/edit-article', "AuthorController@editArticle");
$router->get('/articles/details', "ArticleController@showArticle");
$router->get('/articles/search', "ArticleController@searchArticle");
$router->get('/dashboard', "ReaderController@dashboard");
$router->get('/login','AuthController@login');
$router->get('/register','AuthController@register');
$router->dispatch();