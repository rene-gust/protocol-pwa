<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20211004181254 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE protocol_entry 
            (
                id INT AUTO_INCREMENT NOT NULL, 
                date DATE NOT NULL, 
                disturbance_type VARCHAR(255) NOT NULL, 
                start_time TIME NOT NULL, 
                end_time TIME NOT NULL, 
                description MEDIUMTEXT NOT NULL, 
                witness MEDIUMTEXT NOT NULL, PRIMARY KEY(id)
            ) 
            DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB'
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE protocol_entry');
    }
}
