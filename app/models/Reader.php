<?php

namespace app\models;

use app\enums\Role;


class Reader extends User{

   public function __construct(?int $id = null, string $fullName = '', string $email = '', string $password = '', Role $role = Role::READER)
   {
         parent::__construct($id, $fullName, $email, $password, $role);
   }
}