<?php

declare(strict_types=1);

use App\Ingestion\Presentation\Controller\IngestController;
use App\Ingestion\Presentation\Controller\SearchController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes): void {
    $routes
        ->add(name: 'ingest_logs', path: '/api/v1/ingest')
        ->controller([IngestController::class, 'ingestLogs'])
        ->methods(['POST']);

    $routes
        ->add(name: 'search_logs', path: '/api/v1/logs/search')
        ->controller([SearchController::class, 'search'])
        ->methods(['GET']);
};
