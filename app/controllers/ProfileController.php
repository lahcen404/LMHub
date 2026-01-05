<?php

namespace app\controllers;

use app\core\Controller;

class ProfileController extends Controller{

    public function profile(){
        $this->view('profile',['title'=>'User Profile']);
    }
}