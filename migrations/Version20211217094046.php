<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211217094046 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE profile_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE category (id INT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE profile (id INT NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, birthday DATE NOT NULL, gender VARCHAR(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE trainee (profile_id INT NOT NULL, school_name VARCHAR(50) NOT NULL, PRIMARY KEY(profile_id))');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, uuid VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649D17F50A6 ON "user" (uuid)');
        $this->addSql('CREATE TABLE work_station (code VARCHAR(50) NOT NULL, category_id INT NOT NULL, label VARCHAR(255) NOT NULL, description TEXT NOT NULL, enable BOOLEAN NOT NULL, PRIMARY KEY(code))');
        $this->addSql('CREATE INDEX IDX_4AF2409312469DE2 ON work_station (category_id)');
        $this->addSql('ALTER TABLE trainee ADD CONSTRAINT FK_46C68DE7CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE work_station ADD CONSTRAINT FK_4AF2409312469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE work_station DROP CONSTRAINT FK_4AF2409312469DE2');
        $this->addSql('ALTER TABLE trainee DROP CONSTRAINT FK_46C68DE7CCFA12B8');
        $this->addSql('DROP SEQUENCE category_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE profile_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE profile');
        $this->addSql('DROP TABLE trainee');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE work_station');
    }
}
