<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210721071151 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cars (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cars_user (cars_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_7F73E6C88702F506 (cars_id), INDEX IDX_7F73E6C8A76ED395 (user_id), PRIMARY KEY(cars_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gang (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, job_id INT DEFAULT NULL, gang_id INT DEFAULT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, birthday DATE NOT NULL, phone_number VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649BE04EA9 (job_id), INDEX IDX_8D93D6499266B5E (gang_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_cars (user_id INT NOT NULL, cars_id INT NOT NULL, INDEX IDX_EF4651DDA76ED395 (user_id), INDEX IDX_EF4651DD8702F506 (cars_id), PRIMARY KEY(user_id, cars_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_weapons (user_id INT NOT NULL, weapons_id INT NOT NULL, INDEX IDX_A03A5EBA76ED395 (user_id), INDEX IDX_A03A5EB2EE82581 (weapons_id), PRIMARY KEY(user_id, weapons_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weapons (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, price VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cars_user ADD CONSTRAINT FK_7F73E6C88702F506 FOREIGN KEY (cars_id) REFERENCES cars (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cars_user ADD CONSTRAINT FK_7F73E6C8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649BE04EA9 FOREIGN KEY (job_id) REFERENCES job (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6499266B5E FOREIGN KEY (gang_id) REFERENCES gang (id)');
        $this->addSql('ALTER TABLE user_cars ADD CONSTRAINT FK_EF4651DDA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_cars ADD CONSTRAINT FK_EF4651DD8702F506 FOREIGN KEY (cars_id) REFERENCES cars (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_weapons ADD CONSTRAINT FK_A03A5EBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_weapons ADD CONSTRAINT FK_A03A5EB2EE82581 FOREIGN KEY (weapons_id) REFERENCES weapons (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cars_user DROP FOREIGN KEY FK_7F73E6C88702F506');
        $this->addSql('ALTER TABLE user_cars DROP FOREIGN KEY FK_EF4651DD8702F506');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6499266B5E');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649BE04EA9');
        $this->addSql('ALTER TABLE cars_user DROP FOREIGN KEY FK_7F73E6C8A76ED395');
        $this->addSql('ALTER TABLE user_cars DROP FOREIGN KEY FK_EF4651DDA76ED395');
        $this->addSql('ALTER TABLE user_weapons DROP FOREIGN KEY FK_A03A5EBA76ED395');
        $this->addSql('ALTER TABLE user_weapons DROP FOREIGN KEY FK_A03A5EB2EE82581');
        $this->addSql('DROP TABLE cars');
        $this->addSql('DROP TABLE cars_user');
        $this->addSql('DROP TABLE gang');
        $this->addSql('DROP TABLE job');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_cars');
        $this->addSql('DROP TABLE user_weapons');
        $this->addSql('DROP TABLE weapons');
    }
}
