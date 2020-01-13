<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200113103147 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE papeterie (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, format VARCHAR(255) NOT NULL, prix INT NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_608281A5C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prod_entret (id INT AUTO_INCREMENT NOT NULL, modele_prod_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, format VARCHAR(255) NOT NULL, prix INT NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_E70E3927445C5A7 (modele_prod_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recherche_entretien (id INT AUTO_INCREMENT NOT NULL, min_prix INT NOT NULL, max_prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recherche_papeterie (id INT AUTO_INCREMENT NOT NULL, min_prix INT NOT NULL, max_prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, marque_id INT DEFAULT NULL, couleur VARCHAR(255) NOT NULL, grammage INT NOT NULL, utilisation VARCHAR(255) NOT NULL, INDEX IDX_8CDE57294827B9B2 (marque_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bureau (id INT AUTO_INCREMENT NOT NULL, modele_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, intitule VARCHAR(255) NOT NULL, prix INT NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_166FDEC4AC14B70A (modele_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marque (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marque_prod (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modele (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, poids INT NOT NULL, couleur VARCHAR(255) NOT NULL, INDEX IDX_10028558BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modele_prod (id INT AUTO_INCREMENT NOT NULL, marque_prod_id INT DEFAULT NULL, couleur VARCHAR(255) NOT NULL, grammage VARCHAR(255) NOT NULL, utilisation VARCHAR(255) NOT NULL, INDEX IDX_733365B0D8129C60 (marque_prod_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE papeterie ADD CONSTRAINT FK_608281A5C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE prod_entret ADD CONSTRAINT FK_E70E3927445C5A7 FOREIGN KEY (modele_prod_id) REFERENCES modele_prod (id)');
        $this->addSql('ALTER TABLE type ADD CONSTRAINT FK_8CDE57294827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE bureau ADD CONSTRAINT FK_166FDEC4AC14B70A FOREIGN KEY (modele_id) REFERENCES modele (id)');
        $this->addSql('ALTER TABLE modele ADD CONSTRAINT FK_10028558BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE modele_prod ADD CONSTRAINT FK_733365B0D8129C60 FOREIGN KEY (marque_prod_id) REFERENCES marque_prod (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE papeterie DROP FOREIGN KEY FK_608281A5C54C8C93');
        $this->addSql('ALTER TABLE modele DROP FOREIGN KEY FK_10028558BCF5E72D');
        $this->addSql('ALTER TABLE type DROP FOREIGN KEY FK_8CDE57294827B9B2');
        $this->addSql('ALTER TABLE modele_prod DROP FOREIGN KEY FK_733365B0D8129C60');
        $this->addSql('ALTER TABLE bureau DROP FOREIGN KEY FK_166FDEC4AC14B70A');
        $this->addSql('ALTER TABLE prod_entret DROP FOREIGN KEY FK_E70E3927445C5A7');
        $this->addSql('DROP TABLE papeterie');
        $this->addSql('DROP TABLE prod_entret');
        $this->addSql('DROP TABLE recherche_entretien');
        $this->addSql('DROP TABLE recherche_papeterie');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE bureau');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE marque');
        $this->addSql('DROP TABLE marque_prod');
        $this->addSql('DROP TABLE modele');
        $this->addSql('DROP TABLE modele_prod');
    }
}
