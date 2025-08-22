<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250821094046 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE signalement_stagiaire (id INT AUTO_INCREMENT NOT NULL, stagiaire_id INT DEFAULT NULL, formateur_id INT DEFAULT NULL, commentaire LONGTEXT NOT NULL, INDEX IDX_47B5E482BBA93DD6 (stagiaire_id), INDEX IDX_47B5E482155D8F51 (formateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE signalement_stagiaire ADD CONSTRAINT FK_47B5E482BBA93DD6 FOREIGN KEY (stagiaire_id) REFERENCES stagiaire (id)');
        $this->addSql('ALTER TABLE signalement_stagiaire ADD CONSTRAINT FK_47B5E482155D8F51 FOREIGN KEY (formateur_id) REFERENCES formateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE signalement_stagiaire DROP FOREIGN KEY FK_47B5E482BBA93DD6');
        $this->addSql('ALTER TABLE signalement_stagiaire DROP FOREIGN KEY FK_47B5E482155D8F51');
        $this->addSql('DROP TABLE signalement_stagiaire');
    }
}
