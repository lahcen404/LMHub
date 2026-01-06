<?php

namespace app\models;
use app\core\Model;

class ArticleCategory extends Model{

    private ?int $id;
    private ?int $articleId;
    private ?int $categoryId;

    public function __construct(?int $id = null, ?int $articleId = null, ?int $categoryId = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->articleId = $articleId;
        $this->categoryId = $categoryId;
    }

    // getters
    public function getId(): ?int { return $this->id; }
    public function getArticleId(): ?int { return $this->articleId; }
    public function getCategoryId(): ?int { return $this->categoryId; }

    // setters
    public function setArticleId(?int $articleId): void { $this->articleId = $articleId; }
    public function setCategoryId(?int $categoryId): void { $this->categoryId = $categoryId; }

}