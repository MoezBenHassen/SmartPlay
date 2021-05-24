<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210511175822 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, date_cde DATETIME DEFAULT NULL, heure_cde TIME DEFAULT NULL, remise_cde DOUBLE PRECISION DEFAULT NULL, mnt_cde DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_cde (id INT AUTO_INCREMENT NOT NULL, num_cde_ligne_id INT DEFAULT NULL, code_jouet_ligne_id INT DEFAULT NULL, qte_ligne INT DEFAULT NULL, remise_ligne INT DEFAULT NULL, INDEX IDX_5B71680BCFFB02A6 (num_cde_ligne_id), INDEX IDX_5B71680B1DA9D220 (code_jouet_ligne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ligne_cde ADD CONSTRAINT FK_5B71680BCFFB02A6 FOREIGN KEY (num_cde_ligne_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE ligne_cde ADD CONSTRAINT FK_5B71680B1DA9D220 FOREIGN KEY (code_jouet_ligne_id) REFERENCES jouet (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_cde DROP FOREIGN KEY FK_5B71680BCFFB02A6');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE ligne_cde');
    }
}
