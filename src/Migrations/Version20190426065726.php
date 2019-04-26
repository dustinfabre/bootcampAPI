<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190426065726 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE famous_quote (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, quote VARCHAR(255) NOT NULL, INDEX IDX_E3985443F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE famous_quote ADD CONSTRAINT FK_E3985443F675F31B FOREIGN KEY (author_id) REFERENCES author (id)');
        $this->addSql('DROP TABLE famous_qoute');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE famous_qoute (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, quote VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_CD8DC51EF675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE famous_qoute ADD CONSTRAINT FK_CD8DC51EF675F31B FOREIGN KEY (author_id) REFERENCES author (id)');
        $this->addSql('DROP TABLE famous_quote');
    }
}
