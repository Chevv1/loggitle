<?php

declare(strict_types=1);

namespace App\Ingestion\Application\ReadModel;

use App\Ingestion\Application\Query\Search\LogStreamListDTO;

interface LogStreamReadModelRepositoryInterface
{
    public function search(int $page, int $limit): LogStreamListDTO;
}
