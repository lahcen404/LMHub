<?php
require_once __DIR__ . '/../app/config/DBConnection.php';

$dbConnection = new DBConnection();
$connection = $dbConnection->connectDB();

