<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230524172748 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE anneeuniversitaire (id INT AUTO_INCREMENT NOT NULL, annee INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departement (id INT AUTO_INCREMENT NOT NULL, secretaire_id INT NOT NULL, directeurdedepart_id INT NOT NULL, codedep INT NOT NULL, libdep VARCHAR(20) NOT NULL, UNIQUE INDEX UNIQ_C1765B63A90F02B2 (secretaire_id), UNIQUE INDEX UNIQ_C1765B63F4B1B408 (directeurdedepart_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departement_enseignant (departement_id INT NOT NULL, enseignant_id INT NOT NULL, INDEX IDX_5F9BAFA9CCF9E01E (departement_id), INDEX IDX_5F9BAFA9E455FCC0 (enseignant_id), PRIMARY KEY(departement_id, enseignant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE directeur_de_depart (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, cin INT NOT NULL, email VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE directiondesetudesetdestage (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, cin INT NOT NULL, email VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enseignant (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, cin INT NOT NULL, email VARCHAR(20) NOT NULL, specialite VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, groupe_id INT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, cin INT NOT NULL, email VARCHAR(20) NOT NULL, code_gp VARCHAR(10) NOT NULL, INDEX IDX_717E22E37A45358C (groupe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe (id INT AUTO_INCREMENT NOT NULL, departement_id INT NOT NULL, code_gp INT NOT NULL, lib_gp VARCHAR(20) NOT NULL, codedep INT NOT NULL, INDEX IDX_4B98C21CCF9E01E (departement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere (id INT AUTO_INCREMENT NOT NULL, departement_id INT NOT NULL, enseignant_id INT NOT NULL, codemat INT NOT NULL, libmat VARCHAR(20) NOT NULL, nb_abs INT NOT NULL, INDEX IDX_9014574ACCF9E01E (departement_id), UNIQUE INDEX UNIQ_9014574AE455FCC0 (enseignant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere_etudiant (matiere_id INT NOT NULL, etudiant_id INT NOT NULL, INDEX IDX_C516BA5BF46CD258 (matiere_id), INDEX IDX_C516BA5BDDEAB1A3 (etudiant_id), PRIMARY KEY(matiere_id, etudiant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE secretaire (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, cin VARCHAR(8) NOT NULL, email VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE semestre (id INT AUTO_INCREMENT NOT NULL, anneeuniversitaire_id INT NOT NULL, codesem INT NOT NULL, libdep VARCHAR(20) NOT NULL, INDEX IDX_71688FBC5A33C2B (anneeuniversitaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE departement ADD CONSTRAINT FK_C1765B63A90F02B2 FOREIGN KEY (secretaire_id) REFERENCES secretaire (id)');
        $this->addSql('ALTER TABLE departement ADD CONSTRAINT FK_C1765B63F4B1B408 FOREIGN KEY (directeurdedepart_id) REFERENCES directeur_de_depart (id)');
        $this->addSql('ALTER TABLE departement_enseignant ADD CONSTRAINT FK_5F9BAFA9CCF9E01E FOREIGN KEY (departement_id) REFERENCES departement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE departement_enseignant ADD CONSTRAINT FK_5F9BAFA9E455FCC0 FOREIGN KEY (enseignant_id) REFERENCES enseignant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E37A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id)');
        $this->addSql('ALTER TABLE groupe ADD CONSTRAINT FK_4B98C21CCF9E01E FOREIGN KEY (departement_id) REFERENCES departement (id)');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_9014574ACCF9E01E FOREIGN KEY (departement_id) REFERENCES departement (id)');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_9014574AE455FCC0 FOREIGN KEY (enseignant_id) REFERENCES enseignant (id)');
        $this->addSql('ALTER TABLE matiere_etudiant ADD CONSTRAINT FK_C516BA5BF46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE matiere_etudiant ADD CONSTRAINT FK_C516BA5BDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE semestre ADD CONSTRAINT FK_71688FBC5A33C2B FOREIGN KEY (anneeuniversitaire_id) REFERENCES anneeuniversitaire (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE departement DROP FOREIGN KEY FK_C1765B63A90F02B2');
        $this->addSql('ALTER TABLE departement DROP FOREIGN KEY FK_C1765B63F4B1B408');
        $this->addSql('ALTER TABLE departement_enseignant DROP FOREIGN KEY FK_5F9BAFA9CCF9E01E');
        $this->addSql('ALTER TABLE departement_enseignant DROP FOREIGN KEY FK_5F9BAFA9E455FCC0');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E37A45358C');
        $this->addSql('ALTER TABLE groupe DROP FOREIGN KEY FK_4B98C21CCF9E01E');
        $this->addSql('ALTER TABLE matiere DROP FOREIGN KEY FK_9014574ACCF9E01E');
        $this->addSql('ALTER TABLE matiere DROP FOREIGN KEY FK_9014574AE455FCC0');
        $this->addSql('ALTER TABLE matiere_etudiant DROP FOREIGN KEY FK_C516BA5BF46CD258');
        $this->addSql('ALTER TABLE matiere_etudiant DROP FOREIGN KEY FK_C516BA5BDDEAB1A3');
        $this->addSql('ALTER TABLE semestre DROP FOREIGN KEY FK_71688FBC5A33C2B');
        $this->addSql('DROP TABLE anneeuniversitaire');
        $this->addSql('DROP TABLE departement');
        $this->addSql('DROP TABLE departement_enseignant');
        $this->addSql('DROP TABLE directeur_de_depart');
        $this->addSql('DROP TABLE directiondesetudesetdestage');
        $this->addSql('DROP TABLE enseignant');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('DROP TABLE matiere_etudiant');
        $this->addSql('DROP TABLE secretaire');
        $this->addSql('DROP TABLE semestre');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
