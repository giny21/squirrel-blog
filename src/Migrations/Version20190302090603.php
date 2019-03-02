<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190302090603 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE header (id INT AUTO_INCREMENT NOT NULL, hero_image_id INT DEFAULT NULL, header_avatar_id INT DEFAULT NULL, hero_title VARCHAR(255) NOT NULL, hero_subtitle LONGTEXT DEFAULT NULL, INDEX IDX_6E72A8C198BB94C5 (hero_image_id), INDEX IDX_6E72A8C136597E33 (header_avatar_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE header_avatar (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE header_image (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE header ADD CONSTRAINT FK_6E72A8C198BB94C5 FOREIGN KEY (hero_image_id) REFERENCES header_image (id)');
        $this->addSql('ALTER TABLE header ADD CONSTRAINT FK_6E72A8C136597E33 FOREIGN KEY (header_avatar_id) REFERENCES header_avatar (id)');
        $this->addSql('ALTER TABLE user ADD name VARCHAR(255) NOT NULL, ADD surname VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE header DROP FOREIGN KEY FK_6E72A8C136597E33');
        $this->addSql('ALTER TABLE header DROP FOREIGN KEY FK_6E72A8C198BB94C5');
        $this->addSql('DROP TABLE header');
        $this->addSql('DROP TABLE header_avatar');
        $this->addSql('DROP TABLE header_image');
        $this->addSql('ALTER TABLE user DROP name, DROP surname');
    }
}
