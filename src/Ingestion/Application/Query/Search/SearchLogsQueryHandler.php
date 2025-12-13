<?php

declare(strict_types=1);

namespace App\Ingestion\Application\Query\Search;

use App\Ingestion\Application\ReadModel\LogStreamReadModelRepositoryInterface;
use App\Shared\Application\Query\QueryHandlerInterface;

final readonly class SearchLogsQueryHandler implements QueryHandlerInterface
{
    public function __construct(private LogStreamReadModelRepositoryInterface $logStreamReadModelRepository)
    {
    }

    public function __invoke(SearchLogsQuery $query): LogStreamListDTO
    {
        return $this->logStreamReadModelRepository->search(
            page: $query->page,
            limit: $query->limit,
        );
    }
}
