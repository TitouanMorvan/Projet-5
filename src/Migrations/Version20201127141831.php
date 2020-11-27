<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201127141831 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ban_ip (id INT AUTO_INCREMENT NOT NULL, ip VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C4597A6CB7');
        $this->addSql('DROP INDEX IDX_D9BEC0C4597A6CB7 ON commentaires');
        $this->addSql('ALTER TABLE commentaires ADD projet_id INT NOT NULL, DROP projets_id');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C4C18272 FOREIGN KEY (projet_id) REFERENCES projets (id)');
        $this->addSql('CREATE INDEX IDX_D9BEC0C4C18272 ON commentaires (projet_id)');
        $this->addSql('ALTER TABLE user ADD roles LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE ban_ip');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C4C18272');
        $this->addSql('DROP INDEX IDX_D9BEC0C4C18272 ON commentaires');
        $this->addSql('ALTER TABLE commentaires ADD projets_id INT DEFAULT NULL, DROP projet_id');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C4597A6CB7 FOREIGN KEY (projets_id) REFERENCES projets (id)');
        $this->addSql('CREATE INDEX IDX_D9BEC0C4597A6CB7 ON commentaires (projets_id)');
        $this->addSql('ALTER TABLE user DROP roles');
    }
}
