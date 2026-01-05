<?php

namespace app\core;

use app\config\DBConnection;

abstract class Model {

    protected $db;

    public function __construct()
    {
        

         $this->db = DBConnection::getInstance()->connectDB();

    }
}