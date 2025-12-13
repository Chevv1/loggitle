<?php

declare(strict_types=1);

namespace App\Ingestion\Infrastructure\Repository\Read;

use App\Ingestion\Application\Query\Search\LogStreamListDTO;
use App\Ingestion\Application\ReadModel\LogStreamReadModelRepositoryInterface;
use Symfony\Contracts\Cache\TagAwareCacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

final readonly class CachedLogStreamReadModelRepository implements LogStreamReadModelRepositoryInterface
{
    public function __construct(
        private LogStreamReadModelRepository $decoratedRepository,
        private TagAwareCacheInterface $cache,
    )
    {
    }

    public function search(int $page, int $limit): LogStreamListDTO
    {
        return $this->cache->get(
            key: sprintf('logs.search.%d.%d', $page, $limit),
            callback: function (ItemInterface $item) use ($page, $limit) {
                $item->expiresAfter(300);

                return $this->decoratedRepository->search($page, $limit);
            },
        );
    }
}
