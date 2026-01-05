<?php

namespace app\models;

use app\core\Model;

use app\enums\Status;

class Report extends Model{
    private ?int $id;
    private string $reason;
    private Status $status;

    public function __construct(?int $id = null , string $reason = '', Status $status = Status::PENDING)
    {
         parent::__construct();
         $this->id = $id;
         $this->reason = $reason;
         $this->status = $status;
    }

    // getters
    public function getId(): ?int { return $this->id; }
    public function getReason(): string { return $this->reason; }
    public function getStatus(): Status { return $this->status; }

    // setters
    public function setReason(string $reason): void { $this->reason = $reason; }
    public function setStatus(Status $status): void { $this->status = $status; }
}