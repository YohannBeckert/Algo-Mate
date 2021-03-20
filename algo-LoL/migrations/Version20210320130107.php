<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210320130107 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE availability (id INT AUTO_INCREMENT NOT NULL, monday LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:simple_array)\', tuesday LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:simple_array)\', wednesday LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:simple_array)\', thursday LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:simple_array)\', friday LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:simple_array)\', saturday LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:simple_array)\', sunday LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:simple_array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE availability');
    }
}
