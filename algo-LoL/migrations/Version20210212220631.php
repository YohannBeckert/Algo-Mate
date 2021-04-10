<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210212220631 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prefer_champion ADD CONSTRAINT FK_50884EA3FA7FD7EB FOREIGN KEY (champion_id) REFERENCES champion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_champion ADD CONSTRAINT FK_A5CE9AB4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_champion ADD CONSTRAINT FK_A5CE9AB4FA7FD7EB FOREIGN KEY (champion_id) REFERENCES champion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD champion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649FA7FD7EB FOREIGN KEY (champion_id) REFERENCES champion (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649FA7FD7EB ON user (champion_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE favorite_champion');
        $this->addSql('DROP TABLE prefer_champion');
        $this->addSql('DROP TABLE user_champion');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649FA7FD7EB');
        $this->addSql('DROP INDEX IDX_8D93D649FA7FD7EB ON user');
        $this->addSql('ALTER TABLE user DROP champion_id');
    }
}