<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190426051421 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE famous_qoute DROP FOREIGN KEY FK_CD8DC51E69CCBE9A');
        $this->addSql('DROP INDEX IDX_CD8DC51E69CCBE9A ON famous_qoute');
        $this->addSql('ALTER TABLE famous_qoute CHANGE author_id_id author_id INT NOT NULL');
        $this->addSql('ALTER TABLE famous_qoute ADD CONSTRAINT FK_CD8DC51EF675F31B FOREIGN KEY (author_id) REFERENCES author (id)');
        $this->addSql('CREATE INDEX IDX_CD8DC51EF675F31B ON famous_qoute (author_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE famous_qoute DROP FOREIGN KEY FK_CD8DC51EF675F31B');
        $this->addSql('DROP INDEX IDX_CD8DC51EF675F31B ON famous_qoute');
        $this->addSql('ALTER TABLE famous_qoute CHANGE author_id author_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE famous_qoute ADD CONSTRAINT FK_CD8DC51E69CCBE9A FOREIGN KEY (author_id_id) REFERENCES author (id)');
        $this->addSql('CREATE INDEX IDX_CD8DC51E69CCBE9A ON famous_qoute (author_id_id)');
    }
}
