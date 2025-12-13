<?php

declare(strict_types=1);

namespace App\Ingestion\Presentation\Request;

use Symfony\Component\Validator\Constraints as Assert;

final readonly class SearchLogsRequest
{
    public function __construct(
        #[Assert\Positive(message: 'Page must be a positive number')]
        #[Assert\LessThanOrEqual(value: 10000, message: 'Page cannot exceed {{ compared_value }}')]
        public int $page = 1,

        #[Assert\Positive(message: 'Limit must be a positive number')]
        #[Assert\Range(
            notInRangeMessage: 'Limit must be between {{ min }} and {{ max }}',
            min: 1,
            max: 100
        )]
        public int $limit = 10,
    ) {}
}
