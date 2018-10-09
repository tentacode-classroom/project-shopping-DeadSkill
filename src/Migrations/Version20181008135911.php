<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181008135911 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE viande (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE price');
        $this->addSql('DROP TABLE taille');
        $this->addSql('ALTER TABLE kebab ADD viandes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE kebab ADD CONSTRAINT FK_B031F3ACDE89BEA FOREIGN KEY (viandes_id) REFERENCES viande (id)');
        $this->addSql('CREATE INDEX IDX_B031F3ACDE89BEA ON kebab (viandes_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE kebab DROP FOREIGN KEY FK_B031F3ACDE89BEA');
        $this->addSql('CREATE TABLE price (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taille (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE viande');
        $this->addSql('DROP INDEX IDX_B031F3ACDE89BEA ON kebab');
        $this->addSql('ALTER TABLE kebab DROP viandes_id');
    }
}
