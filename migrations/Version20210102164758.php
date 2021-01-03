<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210102164758 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, type VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture (id_facture INT AUTO_INCREMENT NOT NULL, id_user INT DEFAULT NULL, link VARCHAR(255) NOT NULL, date DATETIME NOT NULL, INDEX id_user_facture (id_user), PRIMARY KEY(id_facture)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE registered (id_registered INT AUTO_INCREMENT NOT NULL, id_event INT DEFAULT NULL, id_volunteer INT DEFAULT NULL, INDEX id_volunteer (id_volunteer), INDEX id_event (id_event), PRIMARY KEY(id_registered)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task_group (id_taskgroup INT AUTO_INCREMENT NOT NULL, id_event INT DEFAULT NULL, INDEX id_event_tg (id_event), PRIMARY KEY(id_taskgroup)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tasks (id_task INT AUTO_INCREMENT NOT NULL, id_taskgroup INT DEFAULT NULL, task_name VARCHAR(250) NOT NULL, INDEX id_taskgroup (id_taskgroup), PRIMARY KEY(id_task)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(250) NOT NULL, password VARCHAR(60) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone_number INT NOT NULL, is_admin TINYINT(1) NOT NULL, is_verified TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE8664106B3CA4B FOREIGN KEY (id_user) REFERENCES user (id)');
        $this->addSql('ALTER TABLE registered ADD CONSTRAINT FK_4BFEE160D52B4B97 FOREIGN KEY (id_event) REFERENCES event (id)');
        $this->addSql('ALTER TABLE registered ADD CONSTRAINT FK_4BFEE160D17562FC FOREIGN KEY (id_volunteer) REFERENCES user (id)');
        $this->addSql('ALTER TABLE task_group ADD CONSTRAINT FK_AA645FE5D52B4B97 FOREIGN KEY (id_event) REFERENCES event (id)');
        $this->addSql('ALTER TABLE tasks ADD CONSTRAINT FK_50586597C3631C82 FOREIGN KEY (id_taskgroup) REFERENCES task_group (id_taskgroup)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE registered DROP FOREIGN KEY FK_4BFEE160D52B4B97');
        $this->addSql('ALTER TABLE task_group DROP FOREIGN KEY FK_AA645FE5D52B4B97');
        $this->addSql('ALTER TABLE tasks DROP FOREIGN KEY FK_50586597C3631C82');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE8664106B3CA4B');
        $this->addSql('ALTER TABLE registered DROP FOREIGN KEY FK_4BFEE160D17562FC');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE registered');
        $this->addSql('DROP TABLE task_group');
        $this->addSql('DROP TABLE tasks');
        $this->addSql('DROP TABLE user');
    }
}
