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
        private readonly LogStreamCreatedAt $createdAt,
    )
    {
    }

    public static function create(
        LogStreamMessage $message,
        LogStreamContext $context,
    ): self {
        return new self(
            id: LogStreamId::generate(),
            message: $message,
            context: $context,
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

    public function getCreatedAt(): LogStreamCreatedAt
    {
        return $this->createdAt;
    }
}
