<?php

namespace app\controllers;

use app\core\Controller;

class NotFoundController extends Controller{

    public function index(){

        echo "<h1> page not found </h1>";
        $this->view('404',['title' => 'page not found']);
    }

    
}
