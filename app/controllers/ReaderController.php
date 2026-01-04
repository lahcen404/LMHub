<?php

namespace app\controllers;
use app\core\Controller;

class ReaderController extends Controller{

    public function dashboard(){
        $this->view('reader/dashboard',['title'=>'Dashboard']);
    }
}