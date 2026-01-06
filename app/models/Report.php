<?php

namespace app\models;

use app\core\Model;

use app\enums\Status;

class Report extends Model{
    private ?int $id;
    private string $reason;
    private Status $status;
    private ?int $readerId;
    private ?int $articleId;
    private ?int $commentId; 

    public function __construct(?int $id = null , string $reason = '', Status $status = Status::PENDING, ?int $readerId = null, ?int $articleId = null, ?int $commentId = null)
    {
         parent::__construct();
         $this->id = $id;
         $this->reason = $reason;
         $this->status = $status;
         $this->readerId = $readerId;
         $this->articleId = $articleId;
         $this->commentId = $commentId;
    }

    // getters
    public function getId(): ?int { return $this->id; }
    public function getReason(): string { return $this->reason; }
    public function getStatus(): Status { return $this->status; }
    public function getReaderId(): ?int { return $this->readerId; }
    public function getArticleId(): ?int { return $this->articleId; }
    public function getCommentId(): ?int { return $this->commentId; }

    // setters
    public function setReason(string $reason): void { $this->reason = $reason; }
    public function setStatus(Status $status): void { $this->status = $status; }
    public function setReaderId(?int $readerId): void { $this->readerId = $readerId; }
    public function setArticleId(?int $articleId): void { $this->articleId = $articleId; } 
    public function setCommentId(?int $commentId): void { $this->commentId = $commentId; }  
}