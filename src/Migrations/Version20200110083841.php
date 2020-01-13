<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200110083841 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE client ADD nom_entreprise VARCHAR(50) NOT NULL, ADD responsable VARCHAR(50) NOT NULL, ADD adresse_de_livraison VARCHAR(50) NOT NULL, ADD telephone VARCHAR(14) NOT NULL, DROP designation, DROP tel, DROP portable, DROP solde_init, DROP resp_comm, DROP resp_finan, DROP adr_liv, DROP solde, CHANGE adr_facture adresse_de_facturation VARCHAR(100) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE client ADD designation VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD portable VARCHAR(14) NOT NULL COLLATE utf8mb4_unicode_ci, ADD solde_init DOUBLE PRECISION NOT NULL, ADD resp_comm VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD resp_finan VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD adr_liv VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD solde DOUBLE PRECISION NOT NULL, DROP nom_entreprise, DROP responsable, DROP adresse_de_livraison, CHANGE adresse_de_facturation adr_facture VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE telephone tel VARCHAR(14) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
