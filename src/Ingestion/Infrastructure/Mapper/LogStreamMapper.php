<?php

declare(strict_types=1);

namespace App\Ingestion\Infrastructure\Mapper;

use App\Ingestion\Domain\Entity\LogStream;
use App\Ingestion\Domain\Entity\LogStreamContext;
use App\Ingestion\Domain\Entity\LogStreamCreatedAt;
use App\Ingestion\Domain\Entity\LogStreamId;
use App\Ingestion\Domain\Entity\LogStreamMessage;
use App\Ingestion\Infrastructure\Entity\LogStreamEntity;

final readonly class LogStreamMapper
{
    public static function fromInfrastructureToDomain(LogStreamEntity $entity): LogStream
    {
        return new LogStream(
            id: LogStreamId::fromString($entity->id),
            message: LogStreamMessage::create($entity->message),
            context: LogStreamContext::create($entity->context),
            createdAt: LogStreamCreatedAt::fromDateTime($entity->createdAt),
        );
    }

    public static function fromDomainToInfrastructure(LogStream $domain): LogStreamEntity
    {
        return new LogStreamEntity(
            id: $domain->getId()->value(),
            message: $domain->getMessage()->value(),
            context: $domain->getContext()->value(),
            createdAt: $domain->getCreatedAt()->value(),
        );
    }
}
