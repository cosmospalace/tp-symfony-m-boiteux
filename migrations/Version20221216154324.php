<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221216154324 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pilote (id INT AUTO_INCREMENT NOT NULL, pilote_id INT DEFAULT NULL, nom VARCHAR(64) NOT NULL, prenom VARCHAR(64) NOT NULL, email VARCHAR(255) NOT NULL, INDEX IDX_6A3254DDF510AAE9 (pilote_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE qualification (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(8) NOT NULL, libelle VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pilote ADD CONSTRAINT FK_6A3254DDF510AAE9 FOREIGN KEY (pilote_id) REFERENCES qualification (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pilote DROP FOREIGN KEY FK_6A3254DDF510AAE9');
        $this->addSql('DROP TABLE pilote');
        $this->addSql('DROP TABLE qualification');
    }
}
