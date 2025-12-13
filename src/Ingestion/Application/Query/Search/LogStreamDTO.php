<?php

declare(strict_types=1);

namespace App\Ingestion\Application\Query\Search;

final readonly class LogStreamDTO
{
    public function __construct(
        public string $id,
        public string $message,
        public array $context,
        public string $createdAt,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'message' => $this->message,
            'context' => $this->context,
            'createdAt' => $this->createdAt,
        ];
    }
}
