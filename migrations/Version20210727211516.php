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
                name VARCHAR(255) NOT NULL
            );
        ');

        $this->addSql('
            INSERT INTO user (id, name)
            VALUES("7fe42501-69d1-41d7-bf43-788e4aade3c4", "Pepe Iglesias");
        ');
    }

    public function down(Schema $schema): void
    {

        $this->addSql("TRUNCATE TABLE USER");
    }
}
