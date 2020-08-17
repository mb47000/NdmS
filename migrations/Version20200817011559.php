<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200817011559 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, phone VARCHAR(30) DEFAULT NULL, mobile VARCHAR(30) DEFAULT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, zip_code INT NOT NULL, create_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE devis (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, number INT NOT NULL, titled VARCHAR(255) NOT NULL, date DATE NOT NULL, total DOUBLE PRECISION NOT NULL, INDEX IDX_8B27C52B9395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE devis_details (id INT AUTO_INCREMENT NOT NULL, devis_id INT NOT NULL, task_id INT NOT NULL, amount SMALLINT NOT NULL, unit_price DOUBLE PRECISION NOT NULL, labor DOUBLE PRECISION NOT NULL, materials DOUBLE PRECISION DEFAULT NULL, INDEX IDX_E0C890D641DEFADA (devis_id), INDEX IDX_E0C890D68DB60186 (task_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task (id INT AUTO_INCREMENT NOT NULL, unit_id INT NOT NULL, titled VARCHAR(255) NOT NULL, labor DOUBLE PRECISION NOT NULL, materials DOUBLE PRECISION DEFAULT NULL, INDEX IDX_527EDB25F8BD700D (unit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unit (id INT AUTO_INCREMENT NOT NULL, unit VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52B9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE devis_details ADD CONSTRAINT FK_E0C890D641DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id)');
        $this->addSql('ALTER TABLE devis_details ADD CONSTRAINT FK_E0C890D68DB60186 FOREIGN KEY (task_id) REFERENCES task (id)');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25F8BD700D FOREIGN KEY (unit_id) REFERENCES unit (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52B9395C3F3');
        $this->addSql('ALTER TABLE devis_details DROP FOREIGN KEY FK_E0C890D641DEFADA');
        $this->addSql('ALTER TABLE devis_details DROP FOREIGN KEY FK_E0C890D68DB60186');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB25F8BD700D');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE devis');
        $this->addSql('DROP TABLE devis_details');
        $this->addSql('DROP TABLE task');
        $this->addSql('DROP TABLE unit');
    }
}
