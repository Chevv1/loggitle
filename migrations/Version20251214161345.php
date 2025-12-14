<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20251214161345 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('
            CREATE TABLE log_streams (
                id UUID NOT NULL,
                message TEXT NOT NULL,
                level VARCHAR(20) NOT NULL,
                context JSON NOT NULL,
                created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
                PRIMARY KEY (id)
             )
        ');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE log_streams');
    }
}
