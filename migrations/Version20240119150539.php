<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240119150539 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price INT NOT NULL, killometering INT NOT NULL, circulation INT NOT NULL, brand VARCHAR(255) DEFAULT NULL, model VARCHAR(255) DEFAULT NULL, fuel VARCHAR(255) DEFAULT NULL, gearbox VARCHAR(255) DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, numberofdoors INT DEFAULT NULL, fiscalpower INT DEFAULT NULL, powerdin INT DEFAULT NULL, otherinfo VARCHAR(500) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picturecar (id INT AUTO_INCREMENT NOT NULL, car_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_FF399E12C3C6F69F (car_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE picturecar ADD CONSTRAINT FK_FF399E12C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE picturecar DROP FOREIGN KEY FK_FF399E12C3C6F69F');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE picturecar');
    }
}
