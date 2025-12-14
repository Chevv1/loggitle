<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;

abstract readonly class AbstractString extends AbstractValueObject
{
    public function __construct(
        private string $value,
    )
    {
    }

    public static function fromString(string $value): static
    {
        return new static($value);
    }

    public function value(): string
    {
        return $this->value;
    }
}
