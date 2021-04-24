<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210416015924 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stage ADD societe_id INT NOT NULL');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369FCF77503 FOREIGN KEY (societe_id) REFERENCES societe_p (id)');
        $this->addSql('CREATE INDEX IDX_C27C9369FCF77503 ON stage (societe_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369FCF77503');
        $this->addSql('DROP INDEX IDX_C27C9369FCF77503 ON stage');
        $this->addSql('ALTER TABLE stage DROP societe_id');
    }
}
