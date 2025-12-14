<?php

declare(strict_types=1);

namespace App\Ingestion\Domain\Entity;

use App\Shared\Domain\Entity\AbstractAggregateRoot;

final class LogStream extends AbstractAggregateRoot
{
    public function __construct(
        private readonly LogStreamId        $id,
        private readonly LogStreamMessage   $message,
        private readonly LogStreamContext   $context,
        private readonly LogStreamLevel     $level,
        private readonly LogStreamCreatedAt $createdAt,
    )
    {
    }

    public static function create(
        LogStreamMessage $message,
        LogStreamContext $context,
        LogStreamLevel   $level,
    ): self {
        return new self(
            id: LogStreamId::generate(),
            message: $message,
            context: $context,
            level: $level,
            createdAt: LogStreamCreatedAt::now(),
        );
    }

    public function getId(): LogStreamId
    {
        return $this->id;
    }

    public function getMessage(): LogStreamMessage
    {
        return $this->message;
    }

    public function getContext(): LogStreamContext
    {
        return $this->context;
    }

    public function getLevel(): LogStreamLevel
    {
        return $this->level;
    }

    public function getCreatedAt(): LogStreamCreatedAt
    {
        return $this->createdAt;
    }
}
