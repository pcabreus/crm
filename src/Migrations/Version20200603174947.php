<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200603174947 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE customer_attributes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE attribute_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE customer_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE customer_attributes (id INT NOT NULL, customer_id INT DEFAULT NULL, attribute_id INT DEFAULT NULL, value TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_CC529AF29395C3F3 ON customer_attributes (customer_id)');
        $this->addSql('CREATE INDEX IDX_CC529AF2B6E62EFA ON customer_attributes (attribute_id)');
        $this->addSql('CREATE TABLE attribute (id INT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(80) NOT NULL, mandatory BOOLEAN DEFAULT NULL, options JSON NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE customer (id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, phone VARCHAR(120) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE customer_attributes ADD CONSTRAINT FK_CC529AF29395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE customer_attributes ADD CONSTRAINT FK_CC529AF2B6E62EFA FOREIGN KEY (attribute_id) REFERENCES attribute (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE customer_attributes DROP CONSTRAINT FK_CC529AF2B6E62EFA');
        $this->addSql('ALTER TABLE customer_attributes DROP CONSTRAINT FK_CC529AF29395C3F3');
        $this->addSql('DROP SEQUENCE customer_attributes_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE attribute_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE customer_id_seq CASCADE');
        $this->addSql('DROP TABLE customer_attributes');
        $this->addSql('DROP TABLE attribute');
        $this->addSql('DROP TABLE customer');
    }
}
