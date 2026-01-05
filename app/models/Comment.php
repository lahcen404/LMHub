<?php

namespace app\models;

use app\core\Model;

class Comment extends Model{

    private ?int $id;
    private string $content;

    public function __construct(?int $id = null , string $content = '')
    {
         parent::__construct();
         $this->id = $id;
         $this->content = $content;
    }

    // getters
    public function getId(): ?int { return $this->id; }
    public function getContent(): string { return $this->content; }

    // setters
    public function setContent(string $content): void { $this->content = $content; } 
}