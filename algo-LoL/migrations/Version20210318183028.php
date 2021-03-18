<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210318183028 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE favorite_champion favorite_champion LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:simple_array)\', CHANGE hated_champion hated_champion LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:simple_array)\', CHANGE solo_division solo_division VARCHAR(5) DEFAULT NULL, CHANGE flex_division flex_division VARCHAR(5) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE favorite_champion favorite_champion LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', CHANGE hated_champion hated_champion LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', CHANGE solo_division solo_division VARCHAR(3) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE flex_division flex_division VARCHAR(3) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
