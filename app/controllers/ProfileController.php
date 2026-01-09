<?php

namespace app\controllers;

use app\core\Controller;
use app\config\DBConnection;

class ProfileController extends Controller{

    private $db;

    public function __construct()
    {
        $this->db= DBConnection::getInstance()->getInstance();
    }

    public function profile(){

        

        $this->view('profile',['title'=>'User Profile']);
    }

    
}