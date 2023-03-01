<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230301214317 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country_desire (country_id INT NOT NULL, desire_id INT NOT NULL, INDEX IDX_2D508EDFF92F3E70 (country_id), INDEX IDX_2D508EDF9B1C5641 (desire_id), PRIMARY KEY(country_id, desire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE desire (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, budget DOUBLE PRECISION DEFAULT NULL, country_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE desire_user (desire_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_8F94D1469B1C5641 (desire_id), INDEX IDX_8F94D146A76ED395 (user_id), PRIMARY KEY(desire_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trip (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, user_id INT DEFAULT NULL, description VARCHAR(500) DEFAULT NULL, country_name VARCHAR(255) NOT NULL, INDEX IDX_7656F53BF92F3E70 (country_id), INDEX IDX_7656F53BA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, phone INT NOT NULL, roles JSON NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE country_desire ADD CONSTRAINT FK_2D508EDFF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE country_desire ADD CONSTRAINT FK_2D508EDF9B1C5641 FOREIGN KEY (desire_id) REFERENCES desire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE desire_user ADD CONSTRAINT FK_8F94D1469B1C5641 FOREIGN KEY (desire_id) REFERENCES desire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE desire_user ADD CONSTRAINT FK_8F94D146A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE trip ADD CONSTRAINT FK_7656F53BF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE trip ADD CONSTRAINT FK_7656F53BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE country_desire DROP FOREIGN KEY FK_2D508EDFF92F3E70');
        $this->addSql('ALTER TABLE country_desire DROP FOREIGN KEY FK_2D508EDF9B1C5641');
        $this->addSql('ALTER TABLE desire_user DROP FOREIGN KEY FK_8F94D1469B1C5641');
        $this->addSql('ALTER TABLE desire_user DROP FOREIGN KEY FK_8F94D146A76ED395');
        $this->addSql('ALTER TABLE trip DROP FOREIGN KEY FK_7656F53BF92F3E70');
        $this->addSql('ALTER TABLE trip DROP FOREIGN KEY FK_7656F53BA76ED395');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE country_desire');
        $this->addSql('DROP TABLE desire');
        $this->addSql('DROP TABLE desire_user');
        $this->addSql('DROP TABLE trip');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
