<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190426051201 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE famous_qoute ADD author_id_id INT NOT NULL, DROP name');
        $this->addSql('ALTER TABLE famous_qoute ADD CONSTRAINT FK_CD8DC51E69CCBE9A FOREIGN KEY (author_id_id) REFERENCES author (id)');
        $this->addSql('CREATE INDEX IDX_CD8DC51E69CCBE9A ON famous_qoute (author_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE famous_qoute DROP FOREIGN KEY FK_CD8DC51E69CCBE9A');
        $this->addSql('DROP INDEX IDX_CD8DC51E69CCBE9A ON famous_qoute');
        $this->addSql('ALTER TABLE famous_qoute ADD name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP author_id_id');
    }
}
