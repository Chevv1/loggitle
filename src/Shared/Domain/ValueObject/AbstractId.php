<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;

use Symfony\Component\Uid\Uuid;

abstract readonly class AbstractId extends AbstractString
{
    public static function generate(): static
    {
        return new static(Uuid::v4()->toString());
    }

    public static function fromString(string $value): self
    {
        return new static($value);
    }
}
