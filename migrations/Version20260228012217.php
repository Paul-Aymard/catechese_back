<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260228012217 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE catechumenes_groupe DROP FOREIGN KEY FK_96EE66FFF0A2E60');
        $this->addSql('ALTER TABLE catechumenes_groupe DROP FOREIGN KEY FK_96EE66F7A45358C');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE60640426ED0855');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404E267AABE');
        $this->addSql('DROP TABLE catechumenes_groupe');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('ALTER TABLE catechistes DROP FOREIGN KEY FK_98FFAC74A76ED395');
        $this->addSql('DROP INDEX UNIQ_98FFAC74A76ED395 ON catechistes');
        $this->addSql('ALTER TABLE catechistes DROP user_id');
        $this->addSql('ALTER TABLE catechumenes DROP FOREIGN KEY FK_1F52044D8F5EA509');
        $this->addSql('ALTER TABLE catechumenes DROP FOREIGN KEY FK_1F52044DA76ED395');
        $this->addSql('ALTER TABLE catechumenes DROP FOREIGN KEY FK_1F52044D665F07C0');
        $this->addSql('DROP INDEX IDX_1F52044D8F5EA509 ON catechumenes');
        $this->addSql('DROP INDEX IDX_1F52044D665F07C0 ON catechumenes');
        $this->addSql('DROP INDEX UNIQ_1F52044DA76ED395 ON catechumenes');
        $this->addSql('ALTER TABLE catechumenes DROP user_id, DROP classe_id, DROP ceb_id');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA141A09194C');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14FF0A2E60');
        $this->addSql('DROP INDEX IDX_CFBDFA141A09194C ON note');
        $this->addSql('DROP INDEX IDX_CFBDFA14FF0A2E60 ON note');
        $this->addSql('ALTER TABLE note DROP catechistes_id, DROP catechumenes_id');
        $this->addSql('ALTER TABLE user CHANGE responsabilite responsabilite VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE catechumenes_groupe (catechumenes_id INT NOT NULL, groupe_id INT NOT NULL, INDEX IDX_96EE66FFF0A2E60 (catechumenes_id), INDEX IDX_96EE66F7A45358C (groupe_id), PRIMARY KEY(catechumenes_id, groupe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, note_id INT DEFAULT NULL, caechumenes_id INT DEFAULT NULL, motif VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, statut VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, reponse VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, datereclamation_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', datetraitement_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_CE606404E267AABE (caechumenes_id), INDEX IDX_CE60640426ED0855 (note_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE catechumenes_groupe ADD CONSTRAINT FK_96EE66FFF0A2E60 FOREIGN KEY (catechumenes_id) REFERENCES catechumenes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE catechumenes_groupe ADD CONSTRAINT FK_96EE66F7A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE60640426ED0855 FOREIGN KEY (note_id) REFERENCES note (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404E267AABE FOREIGN KEY (caechumenes_id) REFERENCES catechumenes (id)');
        $this->addSql('ALTER TABLE catechistes ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE catechistes ADD CONSTRAINT FK_98FFAC74A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_98FFAC74A76ED395 ON catechistes (user_id)');
        $this->addSql('ALTER TABLE catechumenes ADD user_id INT DEFAULT NULL, ADD classe_id INT DEFAULT NULL, ADD ceb_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE catechumenes ADD CONSTRAINT FK_1F52044D8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE catechumenes ADD CONSTRAINT FK_1F52044DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE catechumenes ADD CONSTRAINT FK_1F52044D665F07C0 FOREIGN KEY (ceb_id) REFERENCES ceb (id)');
        $this->addSql('CREATE INDEX IDX_1F52044D8F5EA509 ON catechumenes (classe_id)');
        $this->addSql('CREATE INDEX IDX_1F52044D665F07C0 ON catechumenes (ceb_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1F52044DA76ED395 ON catechumenes (user_id)');
        $this->addSql('ALTER TABLE note ADD catechistes_id INT DEFAULT NULL, ADD catechumenes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA141A09194C FOREIGN KEY (catechistes_id) REFERENCES catechistes (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14FF0A2E60 FOREIGN KEY (catechumenes_id) REFERENCES catechumenes (id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA141A09194C ON note (catechistes_id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA14FF0A2E60 ON note (catechumenes_id)');
        $this->addSql('ALTER TABLE user CHANGE responsabilite responsabilite VARCHAR(255) NOT NULL');
    }
}
