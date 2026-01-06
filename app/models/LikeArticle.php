<?php

namespace app\models;

use app\core\Model;

class LikeArticle extends Model{

    private ?int $id;
    private ?int $readerId;
    private ?int $articleId;

    public function __construct(?int $id = null, ?int $readerId = null, ?int $articleId = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->readerId = $readerId;
        $this->articleId = $articleId;
    }

    // getters
    public function getId(): ?int { return $this->id; }
    public function getReaderId(): ?int { return $this->readerId; }
    public function getArticleId(): ?int { return $this->articleId; }

    // setters
    public function setReaderId(?int $readerId): void { $this->readerId = $readerId; }
    public function setArticleId(?int $articleId): void { $this->articleId = $articleId; }

}