<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210727211516 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create User table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('
            CREATE TABLE user (
                id VARCHAR(36) NOT NULL,
                user VARCHAR(255) NOT NULL,
                password VARCHAR(36) NOT NULL
            );
        ');
    }

    public function down(Schema $schema): void
    {

        $this->addSql("TRUNCATE TABLE USER");
    }
}
