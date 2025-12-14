<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;

abstract readonly class AbstractArray extends AbstractValueObject
{
    public function __construct(
        private array $value,
    )
    {
    }

    public static function fromArray(array $value): static
    {
        return new static($value);
    }

    public function value(): array
    {
        return $this->value;
    }
}
