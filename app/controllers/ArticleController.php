<?php

namespace app\controllers;
use app\core\Controller;

class ArticleController extends Controller{

    public function showArticle(){
        $this->view('articles/articleDetails',['title'=>'Article Details']);
    }

    public function searchArticle(){
        $this->view('articles/search',['title'=>'Search Article']);
    }
}