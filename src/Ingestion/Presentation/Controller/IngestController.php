<?php

declare(strict_types=1);

namespace App\Ingestion\Presentation\Controller;

use App\Ingestion\Application\Command\Ingest\IngestLogsCommand;
use App\Ingestion\Presentation\Request\IngestLogsRequest;
use App\Shared\Application\Bus\CommandBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;

final class IngestController extends AbstractController
{
    public function __construct(
        private readonly CommandBusInterface $commandBus,
    )
    {
    }

    public function ingestLogs(
        #[MapRequestPayload] IngestLogsRequest $requestDTO,
    ): JsonResponse {
        $this->commandBus->dispatch(new IngestLogsCommand(
            message: $requestDTO->message,
            level: $requestDTO->level,
            context: $requestDTO->context,
        ));

        return $this->json(['success' => true]);
    }
}
