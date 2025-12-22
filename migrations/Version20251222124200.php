<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251222124200 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bulletin (id INT AUTO_INCREMENT NOT NULL, decisionfinale VARCHAR(255) NOT NULL, observationdecision VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE catechistes (id INT AUTO_INCREMENT NOT NULL, mat_catechiste INT NOT NULL, nom_catechiste VARCHAR(255) NOT NULL, prenom_catechiste VARCHAR(255) NOT NULL, datenaissancecatechiste_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', lieunaissancecatechiste VARCHAR(255) NOT NULL, professioncatechiste VARCHAR(255) NOT NULL, numlogementcatechiste VARCHAR(255) NOT NULL, quartiercatechiste VARCHAR(255) NOT NULL, sacrementcatechiste VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE catechumenes (id INT AUTO_INCREMENT NOT NULL, matricule INT NOT NULL, nomcatechumene VARCHAR(255) NOT NULL, prenomcatechumene VARCHAR(255) NOT NULL, lieunaissancecatechumene VARCHAR(255) NOT NULL, parrain_maraine VARCHAR(255) DEFAULT NULL, quartiercatechumene VARCHAR(255) NOT NULL, contactcatechumene VARCHAR(255) NOT NULL, sacrementcatechumene VARCHAR(255) DEFAULT NULL, professioncatechumene VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ceb (id INT AUTO_INCREMENT NOT NULL, nom_ceb VARCHAR(255) NOT NULL, zone VARCHAR(255) NOT NULL, secteur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, code INT NOT NULL, anneecatechumenat VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe (id INT AUTO_INCREMENT NOT NULL, nom_groupe VARCHAR(255) NOT NULL, commission VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jour_catechese (id INT AUTO_INCREMENT NOT NULL, jours VARCHAR(255) NOT NULL, heure INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE journal (id INT AUTO_INCREMENT NOT NULL, tablej INT NOT NULL, event VARCHAR(255) NOT NULL, datej_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', anciennevaleur INT NOT NULL, nouvellevaleur INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, numerodevoir INT NOT NULL, note INT NOT NULL, absencemesse TINYINT(1) NOT NULL, absencecours TINYINT(1) NOT NULL, observation VARCHAR(255) NOT NULL, moyenne DOUBLE PRECISION NOT NULL, total_presence INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section (id INT AUTO_INCREMENT NOT NULL, code_section INT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE bulletin');
        $this->addSql('DROP TABLE catechistes');
        $this->addSql('DROP TABLE catechumenes');
        $this->addSql('DROP TABLE ceb');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('DROP TABLE jour_catechese');
        $this->addSql('DROP TABLE journal');
        $this->addSql('DROP TABLE niveau');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE section');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
