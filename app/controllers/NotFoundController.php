<?php

namespace app\controllers;

use app\core\Controller;

class NotFoundController extends Controller{

    public function index(){

        http_response_code(404);
        $this->view('404', ['title' => 'page not found']);
    }

    
}
