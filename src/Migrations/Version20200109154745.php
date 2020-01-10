<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200109154745 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE client ADD resp_comm VARCHAR(50) NOT NULL, ADD resp_finan VARCHAR(50) NOT NULL, ADD adr_liv VARCHAR(50) NOT NULL, ADD solde DOUBLE PRECISION NOT NULL, DROP RespComm, DROP respFinan, DROP adrLiv, CHANGE adrfacture adr_facture VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE lcommande DROP id_commande_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE client ADD RespComm VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD respFinan VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD adrLiv VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, DROP resp_comm, DROP resp_finan, DROP adr_liv, DROP solde, CHANGE adr_facture adrFacture VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE lcommande ADD id_commande_id INT NOT NULL');
    }
}
