<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200109133206 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE commande_produit (id INT AUTO_INCREMENT NOT NULL, commande_id_id INT NOT NULL, produit_id_id INT NOT NULL, INDEX IDX_DF1E9E87462C4194 (commande_id_id), INDEX IDX_DF1E9E874FD8F9C3 (produit_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande_produit ADD CONSTRAINT FK_DF1E9E87462C4194 FOREIGN KEY (commande_id_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE commande_produit ADD CONSTRAINT FK_DF1E9E874FD8F9C3 FOREIGN KEY (produit_id_id) REFERENCES produit (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE commande_produit');
    }
}
