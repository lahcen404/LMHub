<?php
// require_once __DIR__ . '/../app/config/DBConnection.php';
require_once __DIR__ . '/../bootstrap/autoload.php';

use app\core\Router;


// $dbConnection = new DBConnection();
// $connection = $dbConnection->connectDB();

$router = new Router();
$router->get('/', "HomeController@index");
$router->get('/admin/dashboard', "AdminController@index");
$router->get('/admin/add-category', "AdminController@addCategory");
$router->get('/admin/reports', "AdminController@reports");
$router->get('/login','AuthController@login');
$router->get('/register','AuthController@register');
$router->dispatch();