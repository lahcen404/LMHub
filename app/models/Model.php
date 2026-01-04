<?php

namespace app\config;

use app\config\DBConnection;

abstract class Model {

    protected $db;

    public function __construct()
    {
        $dbConn = new DBConnection();
        $this->db = $dbConn->connectDB();
    }
}