<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210320161518 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE availability ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE availability ADD CONSTRAINT FK_3FB7A2BFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3FB7A2BFA76ED395 ON availability (user_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64961778466');
        $this->addSql('DROP INDEX IDX_8D93D64961778466 ON user');
        $this->addSql('ALTER TABLE user DROP availability_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE availability DROP FOREIGN KEY FK_3FB7A2BFA76ED395');
        $this->addSql('DROP INDEX IDX_3FB7A2BFA76ED395 ON availability');
        $this->addSql('ALTER TABLE availability DROP user_id');
        $this->addSql('ALTER TABLE user ADD availability_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64961778466 FOREIGN KEY (availability_id) REFERENCES availability (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8D93D64961778466 ON user (availability_id)');
    }
}
