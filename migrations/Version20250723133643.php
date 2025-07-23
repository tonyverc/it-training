<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250723133643 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE note_qualite (id INT AUTO_INCREMENT NOT NULL, valeur SMALLINT NOT NULL, date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE alert_qualite');
        $this->addSql('ALTER TABLE alerte_qualite DROP FOREIGN KEY FK_D2100C552AA7DFFB');
        $this->addSql('DROP INDEX IDX_D2100C552AA7DFFB ON alerte_qualite');
        $this->addSql('ALTER TABLE alerte_qualite CHANGE stagiaire_id_id stagiaire_id INT NOT NULL');
        $this->addSql('ALTER TABLE alerte_qualite ADD CONSTRAINT FK_D2100C55BBA93DD6 FOREIGN KEY (stagiaire_id) REFERENCES stagiaire (id)');
        $this->addSql('CREATE INDEX IDX_D2100C55BBA93DD6 ON alerte_qualite (stagiaire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alert_qualite (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE note_qualite');
        $this->addSql('ALTER TABLE alerte_qualite DROP FOREIGN KEY FK_D2100C55BBA93DD6');
        $this->addSql('DROP INDEX IDX_D2100C55BBA93DD6 ON alerte_qualite');
        $this->addSql('ALTER TABLE alerte_qualite CHANGE stagiaire_id stagiaire_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE alerte_qualite ADD CONSTRAINT FK_D2100C552AA7DFFB FOREIGN KEY (stagiaire_id_id) REFERENCES stagiaire (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_D2100C552AA7DFFB ON alerte_qualite (stagiaire_id_id)');
    }
}
