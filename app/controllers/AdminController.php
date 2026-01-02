<?php
namespace app\controllers;

use app\core\Controller;

class AdminController extends Controller{
    
    public function index(){
        $this->view('admin/dashboard',['title'=>'Admin Dashboard']);
    }
}