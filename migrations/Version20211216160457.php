<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211216160457 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employee_employee DROP CONSTRAINT fk_cda0246676bbbbe6');
        $this->addSql('ALTER TABLE employee_employee DROP CONSTRAINT fk_cda024666f5eeb69');
        $this->addSql('DROP INDEX idx_cda0246676bbbbe6');
        $this->addSql('DROP INDEX idx_cda024666f5eeb69');
        $this->addSql('DROP INDEX "primary"');
        $this->addSql('ALTER TABLE employee_employee ADD employee_id INT NOT NULL');
        $this->addSql('ALTER TABLE employee_employee DROP employee_source');
        $this->addSql('ALTER TABLE employee_employee DROP employee_target');
        $this->addSql('ALTER TABLE employee_employee ADD CONSTRAINT FK_CDA024668C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE employee_employee ADD PRIMARY KEY (employee_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE employee_employee DROP CONSTRAINT FK_CDA024668C03F15C');
        $this->addSql('DROP INDEX employee_employee_pkey');
        $this->addSql('ALTER TABLE employee_employee ADD employee_target INT NOT NULL');
        $this->addSql('ALTER TABLE employee_employee RENAME COLUMN employee_id TO employee_source');
        $this->addSql('ALTER TABLE employee_employee ADD CONSTRAINT fk_cda0246676bbbbe6 FOREIGN KEY (employee_source) REFERENCES employee (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE employee_employee ADD CONSTRAINT fk_cda024666f5eeb69 FOREIGN KEY (employee_target) REFERENCES employee (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_cda0246676bbbbe6 ON employee_employee (employee_source)');
        $this->addSql('CREATE INDEX idx_cda024666f5eeb69 ON employee_employee (employee_target)');
        $this->addSql('ALTER TABLE employee_employee ADD PRIMARY KEY (employee_source, employee_target)');
    }
}
