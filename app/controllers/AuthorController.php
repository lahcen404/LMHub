<?php

namespace app\controllers;
use app\core\Controller;

class AuthorController extends Controller{

    public function dashboard(){
        $this->view('author/dashboard',['title'=>'Dashboard']);
    }

    public function addArticle(){
        $this->view('author/create',['title'=>'Create Article']);
    }

    public function editArticle(){
        $this->view('author/edit',['title'=>'Edit Article']);
    }
}