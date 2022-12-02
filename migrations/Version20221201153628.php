<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221201153628 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE find (id INT AUTO_INCREMENT NOT NULL, plant_id INT DEFAULT NULL, user_id INT DEFAULT NULL, url LONGTEXT DEFAULT NULL, INDEX IDX_C9AE64041D935652 (plant_id), INDEX IDX_C9AE6404A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE find ADD CONSTRAINT FK_C9AE64041D935652 FOREIGN KEY (plant_id) REFERENCES plant (id)');
        $this->addSql('ALTER TABLE find ADD CONSTRAINT FK_C9AE6404A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE find DROP FOREIGN KEY FK_C9AE64041D935652');
        $this->addSql('ALTER TABLE find DROP FOREIGN KEY FK_C9AE6404A76ED395');
        $this->addSql('DROP TABLE find');
    }
}
