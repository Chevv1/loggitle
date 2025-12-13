<?php

declare(strict_types=1);

namespace App\Ingestion\Application\Query\Search;

final readonly class SearchLogsQuery
{
    public function __construct(
        public int $page,
        public int $limit,
    )
    {
    }
}
