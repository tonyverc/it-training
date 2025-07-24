<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250724124550 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alerte_qualite (id INT AUTO_INCREMENT NOT NULL, stagiaire_id INT NOT NULL, formation_id INT NOT NULL, date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', titre VARCHAR(160) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_D2100C55BBA93DD6 (stagiaire_id), INDEX IDX_D2100C555200282E (formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evaluation_jour (id INT AUTO_INCREMENT NOT NULL, alerte_qualite_id INT DEFAULT NULL, stagiaire_id INT DEFAULT NULL, formation_id INT NOT NULL, satisfaction INT NOT NULL, clarte INT NOT NULL, difficultes LONGTEXT DEFAULT NULL, suggestions LONGTEXT DEFAULT NULL, date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_9751967DBD3476D1 (alerte_qualite_id), INDEX IDX_9751967DBBA93DD6 (stagiaire_id), INDEX IDX_9751967D5200282E (formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formateur (id INT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(140) NOT NULL, fiche_formation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stagiaire (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, diplome VARCHAR(100) DEFAULT NULL, prerequis_valide TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, discr VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alerte_qualite ADD CONSTRAINT FK_D2100C55BBA93DD6 FOREIGN KEY (stagiaire_id) REFERENCES stagiaire (id)');
        $this->addSql('ALTER TABLE alerte_qualite ADD CONSTRAINT FK_D2100C555200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE evaluation_jour ADD CONSTRAINT FK_9751967DBD3476D1 FOREIGN KEY (alerte_qualite_id) REFERENCES alerte_qualite (id)');
        $this->addSql('ALTER TABLE evaluation_jour ADD CONSTRAINT FK_9751967DBBA93DD6 FOREIGN KEY (stagiaire_id) REFERENCES stagiaire (id)');
        $this->addSql('ALTER TABLE evaluation_jour ADD CONSTRAINT FK_9751967D5200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE formateur ADD CONSTRAINT FK_ED767E4FBF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alerte_qualite DROP FOREIGN KEY FK_D2100C55BBA93DD6');
        $this->addSql('ALTER TABLE alerte_qualite DROP FOREIGN KEY FK_D2100C555200282E');
        $this->addSql('ALTER TABLE evaluation_jour DROP FOREIGN KEY FK_9751967DBD3476D1');
        $this->addSql('ALTER TABLE evaluation_jour DROP FOREIGN KEY FK_9751967DBBA93DD6');
        $this->addSql('ALTER TABLE evaluation_jour DROP FOREIGN KEY FK_9751967D5200282E');
        $this->addSql('ALTER TABLE formateur DROP FOREIGN KEY FK_ED767E4FBF396750');
        $this->addSql('DROP TABLE alerte_qualite');
        $this->addSql('DROP TABLE evaluation_jour');
        $this->addSql('DROP TABLE formateur');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE stagiaire');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
