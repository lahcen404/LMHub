<?php

namespace app\controllers;
use app\core\Controller;

class AuthController extends Controller{

    public function login(){
        $this->view('auth/login',['login'=>'Login | LMHub']);
    }
}