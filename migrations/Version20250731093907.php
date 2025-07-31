<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250731093907 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE stagiaire_session (stagiaire_id INT NOT NULL, session_id INT NOT NULL, INDEX IDX_D32D02D4BBA93DD6 (stagiaire_id), INDEX IDX_D32D02D4613FECDF (session_id), PRIMARY KEY(stagiaire_id, session_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stagiaire_session ADD CONSTRAINT FK_D32D02D4BBA93DD6 FOREIGN KEY (stagiaire_id) REFERENCES stagiaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stagiaire_session ADD CONSTRAINT FK_D32D02D4613FECDF FOREIGN KEY (session_id) REFERENCES session (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE alerte_decharge DROP FOREIGN KEY FK_ECCB5DB8155D8F51');
        $this->addSql('ALTER TABLE alerte_decharge DROP FOREIGN KEY FK_ECCB5DB8BBA93DD6');
        $this->addSql('ALTER TABLE session_stagiaire DROP FOREIGN KEY FK_C80B23B613FECDF');
        $this->addSql('ALTER TABLE session_stagiaire DROP FOREIGN KEY FK_C80B23BBBA93DD6');
        $this->addSql('DROP TABLE alerte_decharge');
        $this->addSql('DROP TABLE session_stagiaire');
        $this->addSql('ALTER TABLE affecte ADD session_id INT DEFAULT NULL, CHANGE formateur_id formateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE affecte ADD CONSTRAINT FK_4890ADE8613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4890ADE8613FECDF ON affecte (session_id)');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D42A161580');
        $this->addSql('DROP INDEX UNIQ_D044D5D42A161580 ON session');
        $this->addSql('ALTER TABLE session DROP affecte_id, CHANGE prix prix DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE stagiaire DROP FOREIGN KEY FK_4F62F7315200282E');
        $this->addSql('DROP INDEX IDX_4F62F7315200282E ON stagiaire');
        $this->addSql('ALTER TABLE stagiaire DROP formation_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alerte_decharge (id INT AUTO_INCREMENT NOT NULL, stagiaire_id INT NOT NULL, formateur_id INT DEFAULT NULL, contenu LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_ECCB5DB8155D8F51 (formateur_id), INDEX IDX_ECCB5DB8BBA93DD6 (stagiaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE session_stagiaire (session_id INT NOT NULL, stagiaire_id INT NOT NULL, INDEX IDX_C80B23B613FECDF (session_id), INDEX IDX_C80B23BBBA93DD6 (stagiaire_id), PRIMARY KEY(session_id, stagiaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE alerte_decharge ADD CONSTRAINT FK_ECCB5DB8155D8F51 FOREIGN KEY (formateur_id) REFERENCES formateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE alerte_decharge ADD CONSTRAINT FK_ECCB5DB8BBA93DD6 FOREIGN KEY (stagiaire_id) REFERENCES stagiaire (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE session_stagiaire ADD CONSTRAINT FK_C80B23B613FECDF FOREIGN KEY (session_id) REFERENCES session (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_stagiaire ADD CONSTRAINT FK_C80B23BBBA93DD6 FOREIGN KEY (stagiaire_id) REFERENCES stagiaire (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stagiaire_session DROP FOREIGN KEY FK_D32D02D4BBA93DD6');
        $this->addSql('ALTER TABLE stagiaire_session DROP FOREIGN KEY FK_D32D02D4613FECDF');
        $this->addSql('DROP TABLE stagiaire_session');
        $this->addSql('ALTER TABLE affecte DROP FOREIGN KEY FK_4890ADE8613FECDF');
        $this->addSql('DROP INDEX UNIQ_4890ADE8613FECDF ON affecte');
        $this->addSql('ALTER TABLE affecte DROP session_id, CHANGE formateur_id formateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE stagiaire ADD formation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stagiaire ADD CONSTRAINT FK_4F62F7315200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_4F62F7315200282E ON stagiaire (formation_id)');
        $this->addSql('ALTER TABLE session ADD affecte_id INT DEFAULT NULL, CHANGE prix prix DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D42A161580 FOREIGN KEY (affecte_id) REFERENCES affecte (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D044D5D42A161580 ON session (affecte_id)');
    }
}
