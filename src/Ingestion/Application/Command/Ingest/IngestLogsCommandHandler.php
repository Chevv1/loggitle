<?php

declare(strict_types=1);

namespace App\Ingestion\Application\Command\Ingest;

use App\Ingestion\Domain\Entity\LogStream;
use App\Ingestion\Domain\Entity\LogStreamContext;
use App\Ingestion\Domain\Entity\LogStreamMessage;
use App\Ingestion\Domain\Repository\LogStreamRepositoryInterface;
use App\Shared\Application\Command\CommandHandlerInterface;

final readonly class IngestLogsCommandHandler implements CommandHandlerInterface
{
    public function __construct(
        private LogStreamRepositoryInterface $logStreamRepository,
    )
    {
    }

    public function __invoke(IngestLogsCommand $command): void
    {
        $logStream = LogStream::create(
            message: new LogStreamMessage($command->message),
            context: new LogStreamContext($command->context),
        );

        $this->logStreamRepository->save($logStream);
    }
}
