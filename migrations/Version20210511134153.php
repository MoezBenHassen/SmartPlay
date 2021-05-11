<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210511134153 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE ligne_cde_jouet');
        $this->addSql('ALTER TABLE ligne_cde DROP INDEX UNIQ_5B71680BCFFB02A6, ADD INDEX IDX_5B71680BCFFB02A6 (num_cde_ligne_id)');
        $this->addSql('ALTER TABLE ligne_cde ADD code_jouet_ligne_id INT NOT NULL, CHANGE remise_ligne remise_ligne INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ligne_cde ADD CONSTRAINT FK_5B71680B1DA9D220 FOREIGN KEY (code_jouet_ligne_id) REFERENCES jouet (id)');
        $this->addSql('CREATE INDEX IDX_5B71680B1DA9D220 ON ligne_cde (code_jouet_ligne_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ligne_cde_jouet (ligne_cde_id INT NOT NULL, jouet_id INT NOT NULL, INDEX IDX_91EAD9A32E9710B0 (jouet_id), INDEX IDX_91EAD9A3E0328A8F (ligne_cde_id), PRIMARY KEY(ligne_cde_id, jouet_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ligne_cde_jouet ADD CONSTRAINT FK_91EAD9A32E9710B0 FOREIGN KEY (jouet_id) REFERENCES jouet (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_cde_jouet ADD CONSTRAINT FK_91EAD9A3E0328A8F FOREIGN KEY (ligne_cde_id) REFERENCES ligne_cde (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_cde DROP INDEX IDX_5B71680BCFFB02A6, ADD UNIQUE INDEX UNIQ_5B71680BCFFB02A6 (num_cde_ligne_id)');
        $this->addSql('ALTER TABLE ligne_cde DROP FOREIGN KEY FK_5B71680B1DA9D220');
        $this->addSql('DROP INDEX IDX_5B71680B1DA9D220 ON ligne_cde');
        $this->addSql('ALTER TABLE ligne_cde DROP code_jouet_ligne_id, CHANGE remise_ligne remise_ligne INT NOT NULL');
    }
}
