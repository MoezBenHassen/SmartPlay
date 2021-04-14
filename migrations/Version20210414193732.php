<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210414193732 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, des_clt VARCHAR(255) NOT NULL, adr_clt VARCHAR(255) NOT NULL, tel_clt VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, code_clt_cde_id INT NOT NULL, date_cde DATE NOT NULL, heure_cde TIME NOT NULL, remise_cde INT NOT NULL, mnt_cde DOUBLE PRECISION NOT NULL, INDEX IDX_6EEAA67DC10EE90D (code_clt_cde_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, code_four INT NOT NULL, des_four LONGTEXT NOT NULL, adr_four VARCHAR(255) NOT NULL, contact_four VARCHAR(255) NOT NULL, tel_four VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jouet (id INT AUTO_INCREMENT NOT NULL, code_jouet INT NOT NULL, des_jouet VARCHAR(255) NOT NULL, qte_stock_jouet INT NOT NULL, pu_jouet DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jouet_fournisseur (jouet_id INT NOT NULL, fournisseur_id INT NOT NULL, INDEX IDX_6B93BE852E9710B0 (jouet_id), INDEX IDX_6B93BE85670C757F (fournisseur_id), PRIMARY KEY(jouet_id, fournisseur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_cde (id INT AUTO_INCREMENT NOT NULL, num_cde_ligne_id INT NOT NULL, qte_ligne INT NOT NULL, remise_ligne INT NOT NULL, UNIQUE INDEX UNIQ_5B71680BCFFB02A6 (num_cde_ligne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_cde_jouet (ligne_cde_id INT NOT NULL, jouet_id INT NOT NULL, INDEX IDX_91EAD9A3E0328A8F (ligne_cde_id), INDEX IDX_91EAD9A32E9710B0 (jouet_id), PRIMARY KEY(ligne_cde_id, jouet_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DC10EE90D FOREIGN KEY (code_clt_cde_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE jouet_fournisseur ADD CONSTRAINT FK_6B93BE852E9710B0 FOREIGN KEY (jouet_id) REFERENCES jouet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jouet_fournisseur ADD CONSTRAINT FK_6B93BE85670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_cde ADD CONSTRAINT FK_5B71680BCFFB02A6 FOREIGN KEY (num_cde_ligne_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE ligne_cde_jouet ADD CONSTRAINT FK_91EAD9A3E0328A8F FOREIGN KEY (ligne_cde_id) REFERENCES ligne_cde (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_cde_jouet ADD CONSTRAINT FK_91EAD9A32E9710B0 FOREIGN KEY (jouet_id) REFERENCES jouet (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DC10EE90D');
        $this->addSql('ALTER TABLE ligne_cde DROP FOREIGN KEY FK_5B71680BCFFB02A6');
        $this->addSql('ALTER TABLE jouet_fournisseur DROP FOREIGN KEY FK_6B93BE85670C757F');
        $this->addSql('ALTER TABLE jouet_fournisseur DROP FOREIGN KEY FK_6B93BE852E9710B0');
        $this->addSql('ALTER TABLE ligne_cde_jouet DROP FOREIGN KEY FK_91EAD9A32E9710B0');
        $this->addSql('ALTER TABLE ligne_cde_jouet DROP FOREIGN KEY FK_91EAD9A3E0328A8F');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE jouet');
        $this->addSql('DROP TABLE jouet_fournisseur');
        $this->addSql('DROP TABLE ligne_cde');
        $this->addSql('DROP TABLE ligne_cde_jouet');
    }
}
