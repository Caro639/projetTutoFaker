<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250704072940 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE author (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comic ADD author_id INT NOT NULL, ADD is_black_and_white TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE comic ADD CONSTRAINT FK_5B7EA5AAF675F31B FOREIGN KEY (author_id) REFERENCES author (id)');
        $this->addSql('CREATE INDEX IDX_5B7EA5AAF675F31B ON comic (author_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comic DROP FOREIGN KEY FK_5B7EA5AAF675F31B');
        $this->addSql('DROP TABLE author');
        $this->addSql('DROP INDEX IDX_5B7EA5AAF675F31B ON comic');
        $this->addSql('ALTER TABLE comic DROP author_id, DROP is_black_and_white');
    }
}
