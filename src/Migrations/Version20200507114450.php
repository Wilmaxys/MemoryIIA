<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200507114450 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE carte (id INT AUTO_INCREMENT NOT NULL, fichier VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partie (id INT AUTO_INCREMENT NOT NULL, joueur_id INT DEFAULT NULL, plateau_id INT NOT NULL, fini TINYINT(1) DEFAULT NULL, INDEX IDX_59B1F3DA9E2D76C (joueur_id), UNIQUE INDEX UNIQ_59B1F3D927847DB (plateau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plateau_carte (id INT AUTO_INCREMENT NOT NULL, statut_id INT NOT NULL, plateau_id INT DEFAULT NULL, carte_id INT DEFAULT NULL, INDEX IDX_C3EB5E15F6203804 (statut_id), INDEX IDX_C3EB5E15927847DB (plateau_id), INDEX IDX_C3EB5E15C9C7CEB6 (carte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plateau (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statut (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE partie ADD CONSTRAINT FK_59B1F3DA9E2D76C FOREIGN KEY (joueur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE partie ADD CONSTRAINT FK_59B1F3D927847DB FOREIGN KEY (plateau_id) REFERENCES plateau (id)');
        $this->addSql('ALTER TABLE plateau_carte ADD CONSTRAINT FK_C3EB5E15F6203804 FOREIGN KEY (statut_id) REFERENCES statut (id)');
        $this->addSql('ALTER TABLE plateau_carte ADD CONSTRAINT FK_C3EB5E15927847DB FOREIGN KEY (plateau_id) REFERENCES plateau (id)');
        $this->addSql('ALTER TABLE plateau_carte ADD CONSTRAINT FK_C3EB5E15C9C7CEB6 FOREIGN KEY (carte_id) REFERENCES carte (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE plateau_carte DROP FOREIGN KEY FK_C3EB5E15C9C7CEB6');
        $this->addSql('ALTER TABLE partie DROP FOREIGN KEY FK_59B1F3DA9E2D76C');
        $this->addSql('ALTER TABLE partie DROP FOREIGN KEY FK_59B1F3D927847DB');
        $this->addSql('ALTER TABLE plateau_carte DROP FOREIGN KEY FK_C3EB5E15927847DB');
        $this->addSql('ALTER TABLE plateau_carte DROP FOREIGN KEY FK_C3EB5E15F6203804');
        $this->addSql('DROP TABLE carte');
        $this->addSql('DROP TABLE partie');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE plateau_carte');
        $this->addSql('DROP TABLE plateau');
        $this->addSql('DROP TABLE statut');
    }
}
