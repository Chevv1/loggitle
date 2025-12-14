<?php

declare(strict_types=1);

namespace App\Ingestion\Infrastructure\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'log_streams')]
class LogStreamEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid')]
    public string $id {
        get {
            return $this->id;
        }
    }

    #[ORM\Column(type: 'text')]
    public string $message {
        get {
            return $this->message;
        }
        set {
            $this->message = $value;
        }
    }

    #[ORM\Column(type: 'string', length: 20)]
    public string $level {
        get {
            return $this->level;
        }
        set {
            $this->level = $value;
        }
    }

    #[ORM\Column(type: 'json')]
    public array $context {
        get {
            return $this->context;
        }
        set {
            $this->context = $value;
        }
    }

    #[ORM\Column(type: 'datetime_immutable')]
    public DateTimeImmutable $createdAt {
        get {
            return $this->createdAt;
        }
    }

    public function __construct(
        string $id,
        string $message,
        string $level,
        array $context,
        DateTimeImmutable $createdAt,
    ) {
        $this->id = $id;
        $this->message = $message;
        $this->level = $level;
        $this->context = $context;
        $this->createdAt = $createdAt;
    }
}
