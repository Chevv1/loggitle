<?php

declare(strict_types=1);

namespace App\Ingestion\Infrastructure\Repository\Write;

use App\Ingestion\Domain\Entity\LogStream;
use App\Ingestion\Domain\Repository\LogStreamRepositoryInterface;
use App\Ingestion\Infrastructure\Entity\LogStreamEntity;
use App\Ingestion\Infrastructure\Mapper\LogStreamMapper;
use Doctrine\ORM\EntityManagerInterface;

final readonly class LogStreamRepository implements LogStreamRepositoryInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager,
    )
    {
    }

    public function save(LogStream $logStream): void
    {
        $repository = $this->entityManager->getRepository(LogStreamEntity::class);

        $existingEntity = $repository->find($logStream->getId()->value());

        if ($existingEntity instanceof LogStreamEntity) {
            $existingEntity->message = $logStream->getMessage()->value();
            $existingEntity->context = $logStream->getContext()->value();
        } else {
            $entity = LogStreamMapper::fromDomainToInfrastructure($logStream);

            $this->entityManager->persist($entity);
        }

        $this->entityManager->flush();
    }
}
