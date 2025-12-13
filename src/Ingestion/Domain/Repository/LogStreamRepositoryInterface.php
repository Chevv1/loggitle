<?php

declare(strict_types=1);

namespace App\Ingestion\Domain\Repository;

use App\Ingestion\Domain\Entity\LogStream;

interface LogStreamRepositoryInterface
{
    public function save(LogStream $logStream): void;
}
