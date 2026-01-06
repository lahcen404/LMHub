<?php

namespace app\models;
use app\core\Model;

class LikeComment extends Model{

    private ?int $id;
    private ?int $readerId;
    private ?int $commentId;

    public function __construct(?int $id = null, ?int $readerId = null, ?int $commentId = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->readerId = $readerId;
        $this->commentId = $commentId;
    }

    // getters
    public function getId(): ?int { return $this->id; }
    public function getReaderId(): ?int { return $this->readerId; }
    public function getCommentId(): ?int { return $this->commentId; }

    // setters
    public function setReaderId(?int $readerId): void { $this->readerId = $readerId; }
    public function setCommentId(?int $commentId): void { $this->commentId = $commentId; }

}