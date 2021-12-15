<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211214101336 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE inscriptionevent');
        $this->addSql('DROP TABLE participantevenement');
        $this->addSql('ALTER TABLE evenement CHANGE idHackat idHackat INT DEFAULT NULL');
        $this->addSql('ALTER TABLE inscription CHANGE idParticipant idParticipant INT DEFAULT NULL, CHANGE idHackathon idHackathon INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE inscriptionevent (idevent INT NOT NULL, idpartic INT NOT NULL, INDEX idevent (idevent), INDEX idpartic (idpartic)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE participantevenement (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, prenom VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, mail VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE inscriptionevent ADD CONSTRAINT inscriptionevent_ibfk_1 FOREIGN KEY (idevent) REFERENCES evenement (idEvent) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inscriptionevent ADD CONSTRAINT inscriptionevent_ibfk_2 FOREIGN KEY (idpartic) REFERENCES participant (idP) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('DROP TABLE users');
        $this->addSql('ALTER TABLE evenement CHANGE idHackat idHackat INT NOT NULL');
        $this->addSql('ALTER TABLE inscription CHANGE idHackathon idHackathon INT NOT NULL, CHANGE idParticipant idParticipant INT NOT NULL');
    }
}
