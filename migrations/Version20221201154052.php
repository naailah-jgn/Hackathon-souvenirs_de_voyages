<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221201154052 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE desire (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, budget DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE desire_user (desire_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_8F94D1469B1C5641 (desire_id), INDEX IDX_8F94D146A76ED395 (user_id), PRIMARY KEY(desire_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE desire_user ADD CONSTRAINT FK_8F94D1469B1C5641 FOREIGN KEY (desire_id) REFERENCES desire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE desire_user ADD CONSTRAINT FK_8F94D146A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE desire_user DROP FOREIGN KEY FK_8F94D1469B1C5641');
        $this->addSql('ALTER TABLE desire_user DROP FOREIGN KEY FK_8F94D146A76ED395');
        $this->addSql('DROP TABLE desire');
        $this->addSql('DROP TABLE desire_user');
    }
}
