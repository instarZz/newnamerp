<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210715204347 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE parking (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cars ADD parking_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cars ADD CONSTRAINT FK_95C71D14F17B2DD FOREIGN KEY (parking_id) REFERENCES parking (id)');
        $this->addSql('CREATE INDEX IDX_95C71D14F17B2DD ON cars (parking_id)');
        $this->addSql('ALTER TABLE user ADD parking_id INT DEFAULT NULL, ADD firstname VARCHAR(255) NOT NULL, ADD lastname VARCHAR(255) NOT NULL, ADD birthday DATE NOT NULL, ADD phone_number VARCHAR(255) NOT NULL, CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F17B2DD FOREIGN KEY (parking_id) REFERENCES parking (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649F17B2DD ON user (parking_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cars DROP FOREIGN KEY FK_95C71D14F17B2DD');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F17B2DD');
        $this->addSql('DROP TABLE parking');
        $this->addSql('DROP INDEX IDX_95C71D14F17B2DD ON cars');
        $this->addSql('ALTER TABLE cars DROP parking_id');
        $this->addSql('DROP INDEX IDX_8D93D649F17B2DD ON user');
        $this->addSql('ALTER TABLE user DROP parking_id, DROP firstname, DROP lastname, DROP birthday, DROP phone_number, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
