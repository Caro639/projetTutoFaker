<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250704074029 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comic_genre (comic_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_E221EBF4D663094A (comic_id), INDEX IDX_E221EBF44296D31F (genre_id), PRIMARY KEY(comic_id, genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comic_genre ADD CONSTRAINT FK_E221EBF4D663094A FOREIGN KEY (comic_id) REFERENCES comic (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comic_genre ADD CONSTRAINT FK_E221EBF44296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comic_genre DROP FOREIGN KEY FK_E221EBF4D663094A');
        $this->addSql('ALTER TABLE comic_genre DROP FOREIGN KEY FK_E221EBF44296D31F');
        $this->addSql('DROP TABLE comic_genre');
        $this->addSql('DROP TABLE genre');
    }
}
