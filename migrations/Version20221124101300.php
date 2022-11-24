<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221124101300 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appellation (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE grape_variety (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, avatar LONGBLOB DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine (id INT AUTO_INCREMENT NOT NULL, color_id INT NOT NULL, country_id INT DEFAULT NULL, region_id INT DEFAULT NULL, appellation_id INT DEFAULT NULL, type_id INT DEFAULT NULL, domaine VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, comment LONGTEXT DEFAULT NULL, ranking INT DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL, stock INT DEFAULT NULL, value DOUBLE PRECISION DEFAULT NULL, cellar_location VARCHAR(255) DEFAULT NULL, picture VARCHAR(255) DEFAULT NULL, drink_before INT DEFAULT NULL, vintage INT DEFAULT NULL, purchase_date DATE DEFAULT NULL, INDEX IDX_560C64687ADA1FB5 (color_id), INDEX IDX_560C6468F92F3E70 (country_id), INDEX IDX_560C646898260155 (region_id), INDEX IDX_560C64687CDE30DD (appellation_id), INDEX IDX_560C6468C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine_grape_variety (wine_id INT NOT NULL, grape_variety_id INT NOT NULL, INDEX IDX_A741197828A2BD76 (wine_id), INDEX IDX_A7411978ED00A18A (grape_variety_id), PRIMARY KEY(wine_id, grape_variety_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine_wine_pairing (wine_id INT NOT NULL, wine_pairing_id INT NOT NULL, INDEX IDX_DBD77C4C28A2BD76 (wine_id), INDEX IDX_DBD77C4CF8AD6CE7 (wine_pairing_id), PRIMARY KEY(wine_id, wine_pairing_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine_user (wine_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_284BF93C28A2BD76 (wine_id), INDEX IDX_284BF93CA76ED395 (user_id), PRIMARY KEY(wine_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine_pairing (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C64687ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C6468F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C646898260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C64687CDE30DD FOREIGN KEY (appellation_id) REFERENCES appellation (id)');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C6468C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE wine_grape_variety ADD CONSTRAINT FK_A741197828A2BD76 FOREIGN KEY (wine_id) REFERENCES wine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_grape_variety ADD CONSTRAINT FK_A7411978ED00A18A FOREIGN KEY (grape_variety_id) REFERENCES grape_variety (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_wine_pairing ADD CONSTRAINT FK_DBD77C4C28A2BD76 FOREIGN KEY (wine_id) REFERENCES wine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_wine_pairing ADD CONSTRAINT FK_DBD77C4CF8AD6CE7 FOREIGN KEY (wine_pairing_id) REFERENCES wine_pairing (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_user ADD CONSTRAINT FK_284BF93C28A2BD76 FOREIGN KEY (wine_id) REFERENCES wine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_user ADD CONSTRAINT FK_284BF93CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C64687ADA1FB5');
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C6468F92F3E70');
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C646898260155');
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C64687CDE30DD');
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C6468C54C8C93');
        $this->addSql('ALTER TABLE wine_grape_variety DROP FOREIGN KEY FK_A741197828A2BD76');
        $this->addSql('ALTER TABLE wine_grape_variety DROP FOREIGN KEY FK_A7411978ED00A18A');
        $this->addSql('ALTER TABLE wine_wine_pairing DROP FOREIGN KEY FK_DBD77C4C28A2BD76');
        $this->addSql('ALTER TABLE wine_wine_pairing DROP FOREIGN KEY FK_DBD77C4CF8AD6CE7');
        $this->addSql('ALTER TABLE wine_user DROP FOREIGN KEY FK_284BF93C28A2BD76');
        $this->addSql('ALTER TABLE wine_user DROP FOREIGN KEY FK_284BF93CA76ED395');
        $this->addSql('DROP TABLE appellation');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE grape_variety');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE wine');
        $this->addSql('DROP TABLE wine_grape_variety');
        $this->addSql('DROP TABLE wine_wine_pairing');
        $this->addSql('DROP TABLE wine_user');
        $this->addSql('DROP TABLE wine_pairing');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
