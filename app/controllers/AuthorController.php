<?php

namespace app\controllers;
use app\core\Controller;

class AuthorController extends Controller{

    public function addArticle(){
        $this->view('author/create',['title'=>'Create Article']);
    }
}