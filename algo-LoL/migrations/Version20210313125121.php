<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210313125121 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD username VARCHAR(255) DEFAULT NULL, ADD country_in_game VARCHAR(255) DEFAULT NULL, ADD solo_rank VARCHAR(255) DEFAULT NULL, ADD flex_rank VARCHAR(255) DEFAULT NULL, ADD first_role VARCHAR(255) DEFAULT NULL, ADD second_role VARCHAR(255) DEFAULT NULL, ADD favorite_champion LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ADD hated_champion LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ADD goal LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ADD availability LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP username, DROP country_in_game, DROP solo_rank, DROP flex_rank, DROP first_role, DROP second_role, DROP favorite_champion, DROP hated_champion, DROP goal, DROP availability');
    }
}
