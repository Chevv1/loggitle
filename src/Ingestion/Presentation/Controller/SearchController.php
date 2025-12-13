<?php

declare(strict_types=1);

namespace App\Ingestion\Presentation\Controller;

use App\Ingestion\Application\Query\Search\SearchLogsQuery;
use App\Ingestion\Presentation\Request\SearchLogsRequest;
use App\Shared\Application\Bus\QueryBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;

final class SearchController extends AbstractController
{
    public function __construct(
        private readonly QueryBusInterface $queryBus,
    )
    {
    }

    public function search(
        #[MapQueryString] SearchLogsRequest $requestDTO,
    ): JsonResponse
    {
        $readModel = $this->queryBus->dispatch(new SearchLogsQuery(
            page: $requestDTO->page,
            limit: $requestDTO->limit,
        ));

        return $this->json(
            data: $readModel->toArray(),
        );
    }
}
