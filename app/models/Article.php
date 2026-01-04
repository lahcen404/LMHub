<?php

namespace app\models;

use app\core\Model;

class Article extends Model{

    private ?int $id;
    private string $title;
    private string $content;
    private ?int $authorId;
    private string $createdAt;

    public function __construct(?int $id=null, string $title='' , string $content='' , ?int $authorId = null, string $createdAt = '')
    {
            parent::__construct();
            $this->id = $id;
            $this->title = $title;
            $this->content = $content;
            $this->authorId = $authorId;
            $this->createdAt = $createdAt;
    }

    // getters
    public function getId(): ?int { return $this->id; }
    public function getTitle(): string { return $this->title; }
    public function getContent(): string { return $this->content; }
    public function getAuthorId(): ?int { return $this->authorId; }
    public function getCreatedAt(): string { return $this->createdAt; }

    // setters
    public function setTitle(string $title): void { $this->title = $title;}
    public function setContent(string $content): void { $this->content = $content; }
    public function setAuthorId(int $authorId): void { $this->authorId = $authorId; }


}