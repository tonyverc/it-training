<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250724113539 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alerte_decharge (id INT AUTO_INCREMENT NOT NULL, stagiaire_id INT NOT NULL, formateur_id INT DEFAULT NULL, contenu LONGTEXT NOT NULL, INDEX IDX_ECCB5DB8BBA93DD6 (stagiaire_id), INDEX IDX_ECCB5DB8155D8F51 (formateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alerte_decharge ADD CONSTRAINT FK_ECCB5DB8BBA93DD6 FOREIGN KEY (stagiaire_id) REFERENCES stagiaire (id)');
        $this->addSql('ALTER TABLE alerte_decharge ADD CONSTRAINT FK_ECCB5DB8155D8F51 FOREIGN KEY (formateur_id) REFERENCES formateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alerte_decharge DROP FOREIGN KEY FK_ECCB5DB8BBA93DD6');
        $this->addSql('ALTER TABLE alerte_decharge DROP FOREIGN KEY FK_ECCB5DB8155D8F51');
        $this->addSql('DROP TABLE alerte_decharge');
    }
}
