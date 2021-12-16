<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211216155312 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employee_employee (employee_source INT NOT NULL, employee_target INT NOT NULL, PRIMARY KEY(employee_source, employee_target))');
        $this->addSql('CREATE INDEX IDX_CDA0246676BBBBE6 ON employee_employee (employee_source)');
        $this->addSql('CREATE INDEX IDX_CDA024666F5EEB69 ON employee_employee (employee_target)');
        $this->addSql('ALTER TABLE employee_employee ADD CONSTRAINT FK_CDA0246676BBBBE6 FOREIGN KEY (employee_source) REFERENCES employee (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE employee_employee ADD CONSTRAINT FK_CDA024666F5EEB69 FOREIGN KEY (employee_target) REFERENCES employee (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE employee_employee');
    }
}
