<?php

declare(strict_types=1);

namespace App\Ingestion\Application\Query\Search;

final readonly class LogStreamListDTO
{
    /**
     * @param LogStreamDTO[] $items
     */
    public function __construct(
        public array $items,
        public int $total,
        public int $page,
        public int $limit,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'data' => array_map(
                callback: static fn($item): array => [
                    'id' => $item->id,
                    'message' => $item->message,
                    'context' => $item->context,
                    'created_at' => $item->createdAt,
                ],
                array: $this->items,
            ),
            'meta' => [
                'total' => $this->total,
                'page' => $this->page,
                'limit' => $this->limit,
            ],
        ];
    }
}
