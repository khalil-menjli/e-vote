<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240512073557 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate ADD demeand_id INT NOT NULL');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E4477FCB71A FOREIGN KEY (demeand_id) REFERENCES demand (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C8B28E4477FCB71A ON candidate (demeand_id)');
        $this->addSql('ALTER TABLE demand DROP FOREIGN KEY FK_428D797391BD8781');
        $this->addSql('DROP INDEX UNIQ_428D797391BD8781 ON demand');
        $this->addSql('ALTER TABLE demand DROP candidate_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E4477FCB71A');
        $this->addSql('DROP INDEX UNIQ_C8B28E4477FCB71A ON candidate');
        $this->addSql('ALTER TABLE candidate DROP demeand_id');
        $this->addSql('ALTER TABLE demand ADD candidate_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE demand ADD CONSTRAINT FK_428D797391BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_428D797391BD8781 ON demand (candidate_id)');
    }
}
