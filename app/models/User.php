<?php

namespace app\models;

use app\core\Model;
use app\enums\Role;

abstract class User extends Model{

    protected ?int $id;
    protected string $fullName;
    protected string $email;
    protected string $password;
    protected Role $role;

    public function __construct(?int $id=null,string $fullName='',string $email='',string $password='',Role $role=Role::READER)
    {
         parent::__construct();
         $this->id=$id;
         $this->fullName = $fullName;
         $this->email = $email;
         $this->password = $password;
         $this->role = $role;


    }

    // getters
    public function getId(): ?int{return $this->id ;}
    public function getFullName(): string{return $this->fullName;}
    public function getEmail(): string{return $this->email;}
    public function getPassword(): string{return $this->password;}
    public function getRole(): Role{return $this->role;}

    // setters 
    public function setFullName(string $fullName): void{$this->fullName=$fullName;}
    public function setEmail(string $email): void{$this->email = $email;}
    public function setPassword(string $password): void{ $this->password = password_hash($password,PASSWORD_DEFAULT);}
    public function setRole(Role $role): void{ $this->role= $role;}

}