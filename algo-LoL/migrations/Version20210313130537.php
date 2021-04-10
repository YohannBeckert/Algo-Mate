<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210313130537 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favorite_champion DROP FOREIGN KEY FK_EF146645AA17481D');
        $this->addSql('ALTER TABLE prefer_champion DROP FOREIGN KEY FK_50884EA3F618429B');
        $this->addSql('DROP TABLE favorite');
        $this->addSql('DROP TABLE favorite_champion');
        $this->addSql('DROP TABLE prefer');
        $this->addSql('DROP TABLE prefer_champion');
    }
}
