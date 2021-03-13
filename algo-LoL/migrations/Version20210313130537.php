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
        $this->addSql('DELETE TABLE favorite (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DELETE TABLE favorite_champion (favorite_id INT NOT NULL, champion_id INT NOT NULL, INDEX IDX_EF146645AA17481D (favorite_id), INDEX IDX_EF146645FA7FD7EB (champion_id), PRIMARY KEY(favorite_id, champion_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DELETE TABLE prefer (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DELETE TABLE prefer_champion (prefer_id INT NOT NULL, champion_id INT NOT NULL, INDEX IDX_50884EA3F618429B (prefer_id), INDEX IDX_50884EA3FA7FD7EB (champion_id), PRIMARY KEY(prefer_id, champion_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE favorite_champion ADD CONSTRAINT FK_EF146645AA17481D FOREIGN KEY (favorite_id) REFERENCES favorite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favorite_champion ADD CONSTRAINT FK_EF146645FA7FD7EB FOREIGN KEY (champion_id) REFERENCES champion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prefer_champion ADD CONSTRAINT FK_50884EA3F618429B FOREIGN KEY (prefer_id) REFERENCES prefer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prefer_champion ADD CONSTRAINT FK_50884EA3FA7FD7EB FOREIGN KEY (champion_id) REFERENCES champion (id) ON DELETE CASCADE');
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
