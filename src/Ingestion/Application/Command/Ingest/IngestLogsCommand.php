<?php

declare(strict_types=1);

namespace App\Ingestion\Application\Command\Ingest;

use App\Shared\Application\Command\CommandInterface;

final readonly class IngestLogsCommand implements CommandInterface
{
    public function __construct(
        public string $message,
        public array $context,
    )
    {
    }
}
