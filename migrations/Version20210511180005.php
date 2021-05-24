<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210511180005 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande ADD code_clt_cde_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DC10EE90D FOREIGN KEY (code_clt_cde_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DC10EE90D ON commande (code_clt_cde_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DC10EE90D');
        $this->addSql('DROP INDEX IDX_6EEAA67DC10EE90D ON commande');
        $this->addSql('ALTER TABLE commande DROP code_clt_cde_id');
    }
}
