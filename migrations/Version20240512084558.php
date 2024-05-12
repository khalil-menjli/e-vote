<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240512084558 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E4477FCB71A');
        $this->addSql('DROP TABLE candidate');
        $this->addSql('ALTER TABLE user ADD demeand_id INT NOT NULL, ADD discr VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64977FCB71A FOREIGN KEY (demeand_id) REFERENCES demand (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64977FCB71A ON user (demeand_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidate (id INT AUTO_INCREMENT NOT NULL, demeand_id INT NOT NULL, usename VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_IDENTIFIER_USENAME (usename), UNIQUE INDEX UNIQ_C8B28E4477FCB71A (demeand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E4477FCB71A FOREIGN KEY (demeand_id) REFERENCES demand (id)');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D64977FCB71A');
        $this->addSql('DROP INDEX IDX_8D93D64977FCB71A ON `user`');
        $this->addSql('ALTER TABLE `user` DROP demeand_id, DROP discr');
    }
}
