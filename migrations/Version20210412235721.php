<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210412235721 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ens_classe DROP FOREIGN KEY fk_ens_classe_classe');
        $this->addSql('ALTER TABLE classe DROP FOREIGN KEY fk_classe_emploi_dt');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY fk_etudiant_emplois_dt');
        $this->addSql('ALTER TABLE ens_classe DROP FOREIGN KEY fk_ens_classe_enseignant');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY fk_note_etudiant');
        $this->addSql('ALTER TABLE resultat DROP FOREIGN KEY fk_resultat_etudiant');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY fk_etudiant_stage');
        $this->addSql('ALTER TABLE admin DROP FOREIGN KEY fk_admin_user');
        $this->addSql('ALTER TABLE assiduite DROP FOREIGN KEY fk_assiduite_user');
        $this->addSql('ALTER TABLE conn DROP FOREIGN KEY idfk');
        $this->addSql('ALTER TABLE enseignant DROP FOREIGN KEY fk_enseignant_user');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY fk_etudiant_user');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY fk_evenement_user');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE assiduite');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE conn');
        $this->addSql('DROP TABLE cour');
        $this->addSql('DROP TABLE dem_conv');
        $this->addSql('DROP TABLE departement');
        $this->addSql('DROP TABLE emplois_dt');
        $this->addSql('DROP TABLE ens_classe');
        $this->addSql('DROP TABLE enseignant');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE participer');
        $this->addSql('DROP TABLE resultat');
        $this->addSql('DROP TABLE reunion');
        $this->addSql('DROP TABLE stage');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP INDEX fk_evenement_user ON evenement');
        $this->addSql('ALTER TABLE evenement ADD id INT AUTO_INCREMENT NOT NULL, DROP date_evenement, CHANGE id_evenement id_evenement INT NOT NULL, CHANGE description description VARCHAR(30) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id_user INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id_user)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE assiduite (id_assiduite INT NOT NULL, id_user INT NOT NULL, id_matiere INT NOT NULL, date DATE NOT NULL, INDEX fk_assiduite_user (id_user), INDEX fk_assiduite_matiere (id_matiere), PRIMARY KEY(id_assiduite)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE classe (id_classe INT AUTO_INCREMENT NOT NULL, id_emp INT NOT NULL, nom_classe VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, nbr_etudiant INT NOT NULL, nom_salle VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, UNIQUE INDEX nom_classe (nom_classe), INDEX fk_classe_emploi_dt (id_emp), PRIMARY KEY(id_classe)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE conn (id_user INT NOT NULL, img LONGBLOB DEFAULT NULL, etat INT DEFAULT NULL, PRIMARY KEY(id_user)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE cour (id_cours INT AUTO_INCREMENT NOT NULL, nom_cour VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, id_matiere INT NOT NULL, INDEX fk_cour_matiere (id_matiere), PRIMARY KEY(id_cours)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE dem_conv (id_conv INT AUTO_INCREMENT NOT NULL, user_name VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, nom VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prenom VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, email VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, etat_demande VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, id_user INT NOT NULL, UNIQUE INDEX email (email, id_user), PRIMARY KEY(id_conv)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE departement (id_departement INT AUTO_INCREMENT NOT NULL, nom_departement VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, chef_departement VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, UNIQUE INDEX nom_departement (nom_departement), UNIQUE INDEX chef_departement (chef_departement), PRIMARY KEY(id_departement)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE emplois_dt (id_emp INT AUTO_INCREMENT NOT NULL, semaine DATE NOT NULL, emplois VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id_emp)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ens_classe (id_classe INT NOT NULL, id_user INT NOT NULL, INDEX fk_ens_classe_enseignant (id_user), INDEX IDX_89E2EC6CA9B00A7B (id_classe), PRIMARY KEY(id_classe, id_user)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE enseignant (id_user INT AUTO_INCREMENT NOT NULL, id_matiere INT DEFAULT NULL, nom_departement VARCHAR(30) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_general_ci`, UNIQUE INDEX nom_departement (nom_departement), INDEX fk_enseignant_matiere (id_matiere), PRIMARY KEY(id_user)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE etudiant (id_user INT NOT NULL, id_stage INT NOT NULL, id_emp INT NOT NULL, niveau VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, specialite VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX fk_etudiant_stage (id_stage), INDEX fk_etudiant_emplois_dt (id_emp), PRIMARY KEY(id_user)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE matiere (id_matiere INT AUTO_INCREMENT NOT NULL, nom_matiere VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, coefficient VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, volume_h VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id_matiere)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE note (id_note INT AUTO_INCREMENT NOT NULL, id_user INT NOT NULL, note INT NOT NULL, id_matiere INT NOT NULL, INDEX fk_note_matiere (id_matiere), INDEX fk_note_etudiant (id_user), PRIMARY KEY(id_note)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE participer (id INT AUTO_INCREMENT NOT NULL, idevent INT NOT NULL, iduser INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE resultat (id_res INT AUTO_INCREMENT NOT NULL, id_user INT NOT NULL, moy DOUBLE PRECISION NOT NULL, ment VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX fk_resultat_etudiant (id_user), PRIMARY KEY(id_res)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reunion (id_reunion INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, nom_departement VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, matiere VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, objectif VARCHAR(200) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, horaire VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id_reunion)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE stage (id_stage INT AUTO_INCREMENT NOT NULL, societe VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Email_Société VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, pays VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, date_debut DATE NOT NULL, date_fin DATE NOT NULL, type_stage VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, UNIQUE INDEX Email_Société (Email_Société), PRIMARY KEY(id_stage)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id_user INT AUTO_INCREMENT NOT NULL, user_name VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, nom VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prenom VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, email VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, date_de_naissance DATE NOT NULL, role VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Mdp VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, UNIQUE INDEX user_name (user_name), PRIMARY KEY(id_user)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE admin ADD CONSTRAINT fk_admin_user FOREIGN KEY (id_user) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE assiduite ADD CONSTRAINT fk_assiduite_user FOREIGN KEY (id_user) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT fk_classe_emploi_dt FOREIGN KEY (id_emp) REFERENCES emplois_dt (id_emp) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE conn ADD CONSTRAINT idfk FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE ens_classe ADD CONSTRAINT fk_ens_classe_classe FOREIGN KEY (id_classe) REFERENCES classe (id_classe) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ens_classe ADD CONSTRAINT fk_ens_classe_enseignant FOREIGN KEY (id_user) REFERENCES enseignant (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE enseignant ADD CONSTRAINT fk_enseignant_user FOREIGN KEY (id_user) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT fk_etudiant_emplois_dt FOREIGN KEY (id_emp) REFERENCES emplois_dt (id_emp) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT fk_etudiant_stage FOREIGN KEY (id_stage) REFERENCES stage (id_stage) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT fk_etudiant_user FOREIGN KEY (id_user) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT fk_note_etudiant FOREIGN KEY (id_user) REFERENCES etudiant (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE resultat ADD CONSTRAINT fk_resultat_etudiant FOREIGN KEY (id_user) REFERENCES etudiant (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evenement MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE evenement DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE evenement ADD date_evenement DATE NOT NULL, DROP id, CHANGE id_evenement id_evenement INT AUTO_INCREMENT NOT NULL, CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT fk_evenement_user FOREIGN KEY (id_user) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX fk_evenement_user ON evenement (id_user)');
        $this->addSql('ALTER TABLE evenement ADD PRIMARY KEY (id_evenement)');
    }
}
