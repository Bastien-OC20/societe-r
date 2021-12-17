<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211217095126 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE work_station (code VARCHAR(50) NOT NULL, category_id INT NOT NULL, label VARCHAR(255) NOT NULL, description TEXT NOT NULL, enable BOOLEAN NOT NULL, PRIMARY KEY(code))');
        $this->addSql('CREATE INDEX IDX_4AF2409312469DE2 ON work_station (category_id)');
        $this->addSql('ALTER TABLE work_station ADD CONSTRAINT FK_4AF2409312469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE work_station');
    }
}
