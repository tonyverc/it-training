<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250722115344 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evaluation_jour CHANGE difficultes difficultes LONGTEXT DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9751967D4F62F731AA9E377A ON evaluation_jour (stagiaire, date)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_9751967D4F62F731AA9E377A ON evaluation_jour');
        $this->addSql('ALTER TABLE evaluation_jour CHANGE difficultes difficultes LONGTEXT NOT NULL');
    }
}
