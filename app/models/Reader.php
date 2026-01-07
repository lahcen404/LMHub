<?php

namespace app\models;

use app\config\DBConnection;
use app\enums\Role;


class Reader extends User{
      public $db;

   public function __construct(?int $id = null, string $fullName = '', string $email = '', string $password = '', Role $role = Role::READER)
   {
         parent::__construct($id, $fullName, $email, $password, $role);
            $this->db = DBConnection::getInstance()->connectDB();
   }

   public function findByEmail(string $email)
   {
         $stmt = $this->db->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
         $stmt->execute([trim($email)]);
         $row = $stmt->fetch();
         return $row ?: false;
   }
}