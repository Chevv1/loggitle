<?php

declare(strict_types=1);

namespace App\Ingestion\Infrastructure\Repository\Read;

use App\Ingestion\Application\Query\Search\LogStreamListDTO;
use App\Ingestion\Application\Query\Search\LogStreamDTO;
use App\Ingestion\Application\ReadModel\LogStreamReadModelRepositoryInterface;
use Doctrine\DBAL\Connection;

final readonly class LogStreamReadModelRepository implements LogStreamReadModelRepositoryInterface
{
    public function __construct(
        private Connection $connection,
    ) {}

    public function search(int $page, int $limit): LogStreamListDTO
    {
        $result = $this->connection->executeQuery(
            sql: '
                SELECT
                    id,
                    message,
                    context,
                    created_at 
                FROM
                    log_streams
                ORDER BY created_at DESC 
                LIMIT :limit
                OFFSET :offset
            ',
            params: [
                'limit' => $limit,
                'offset' => ($page - 1) * $limit,
            ],
        );

        return new LogStreamListDTO(
            items: array_map(
                callback: static fn(array $row) => new LogStreamDTO(
                    id: $row['id'],
                    message: $row['message'],
                    context: json_decode($row['context'], true),
                    createdAt: $row['created_at'],
                ),
                array: $result->fetchAllAssociative(),
            ),
            total: (int) $this->connection->fetchOne('SELECT COUNT(*) FROM log_streams'),
            page: $page,
            limit: $limit,
        );
    }
}
