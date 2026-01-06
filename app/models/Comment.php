<?php

namespace app\models;

use app\core\Model;

class Comment extends Model{

    private ?int $id;
    private string $content;
    private ?int $articleId;
    private ?int $readerId;

    public function __construct(?int $id = null , string $content = '', ?int $articleId = null, ?int $readerId = null)
    {
         parent::__construct();
         $this->id = $id;
         $this->content = $content;
         $this->articleId = $articleId;
         $this->readerId = $readerId;
    }

    // getters
    public function getId(): ?int { return $this->id; }
    public function getContent(): string { return $this->content; }
    public function getArticleId(): ?int { return $this->articleId; }
    public function getReaderId(): ?int { return $this->readerId; }
    // setters
    public function setContent(string $content): void { $this->content = $content; } 
    public function setArticleId(?int $articleId): void { $this->articleId = $articleId; }
    public function setReaderId(?int $readerId): void { $this->readerId = $readerId; }
}