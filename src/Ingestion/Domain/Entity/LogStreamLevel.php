<?php

declare(strict_types=1);

namespace App\Ingestion\Domain\Entity;

use App\Shared\Domain\ValueObject\AbstractString;
use InvalidArgumentException;

final readonly class LogStreamLevel extends AbstractString
{
    private const string DEBUG_LEVEL = 'debug';
    private const string INFO_LEVEL = 'info';
    private const string WARNING_LEVEL = 'warning';
    private const string ERROR_LEVEL = 'error';
    private const string FATAL_LEVEL = 'fatal';

    private const array ALLOWED = [
        self::DEBUG_LEVEL,
        self::INFO_LEVEL,
        self::WARNING_LEVEL,
        self::ERROR_LEVEL,
        self::FATAL_LEVEL,
    ];

    public function __construct(string $value)
    {
        if (!in_array(needle: $value,haystack: self::ALLOWED)) {
            throw new InvalidArgumentException('Invalid log stream level value');
        }

        parent::__construct($value);
    }

    public static function debug(): self
    {
        return new self(self::DEBUG_LEVEL);
    }

    public static function info(): self
    {
        return new self(self::INFO_LEVEL);
    }

    public static function warning(): self
    {
        return new self(self::WARNING_LEVEL);
    }

    public static function error(): self
    {
        return new self(self::ERROR_LEVEL);
    }

    public static function fatal(): self
    {
        return new self(self::FATAL_LEVEL);
    }
}
