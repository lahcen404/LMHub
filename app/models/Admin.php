<?php

namespace app\models;

use app\enums\Role;


class Admin extends User{

   public function __construct(?int $id = null, string $fullName = '', string $email = '', string $password = '', Role $role = Role::ADMIN)
   {
         parent::__construct($id, $fullName, $email, $password, $role);
   }
}