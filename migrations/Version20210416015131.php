<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210416015131 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE societe_p ADD stages_id INT DEFAULT NULL, ADD numero_tel INT NOT NULL, ADD domaine VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE societe_p ADD CONSTRAINT FK_25FCA7D98E55E70A FOREIGN KEY (stages_id) REFERENCES stage (id)');
        $this->addSql('CREATE INDEX IDX_25FCA7D98E55E70A ON societe_p (stages_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE societe_p DROP FOREIGN KEY FK_25FCA7D98E55E70A');
        $this->addSql('DROP INDEX IDX_25FCA7D98E55E70A ON societe_p');
        $this->addSql('ALTER TABLE societe_p DROP stages_id, DROP numero_tel, DROP domaine');
    }
}
