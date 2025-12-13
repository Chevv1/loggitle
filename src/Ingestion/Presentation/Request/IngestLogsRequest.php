<?php

declare(strict_types=1);

namespace App\Ingestion\Presentation\Request;

use Symfony\Component\Validator\Constraints as Assert;

final class IngestLogsRequest
{
    public function __construct(
        #[Assert\Type('string')]
        #[Assert\NotBlank]
        public string $message,

        #[Assert\Type('array')]
        public ?array $context,
    )
    {
    }
}
