<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210511175130 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, des_clt VARCHAR(255) DEFAULT NULL, adr_clt VARCHAR(255) DEFAULT NULL, tel_clt VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, des_four VARCHAR(255) DEFAULT NULL, adr_four VARCHAR(255) DEFAULT NULL, contact_four VARCHAR(255) DEFAULT NULL, tel_four VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jouet (id INT AUTO_INCREMENT NOT NULL, code_four_jouer_id INT NOT NULL, des_jouet VARCHAR(255) DEFAULT NULL, qte_stock_jouet INT DEFAULT NULL, pu_jouet DOUBLE PRECISION DEFAULT NULL, INDEX IDX_6B3DFFD8784BB8EB (code_four_jouer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE jouet ADD CONSTRAINT FK_6B3DFFD8784BB8EB FOREIGN KEY (code_four_jouer_id) REFERENCES fournisseur (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jouet DROP FOREIGN KEY FK_6B3DFFD8784BB8EB');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE jouet');
    }
}
