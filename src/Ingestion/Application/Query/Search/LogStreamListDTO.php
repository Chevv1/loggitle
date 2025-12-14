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
                callback: static fn(LogStreamDTO $item): array => $item->toArray(),
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
