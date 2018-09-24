<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180727143330 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE newsletter (id INT AUTO_INCREMENT NOT NULL, subject VARCHAR(96) NOT NULL, body LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newsletter_subscriber (newsletter_id INT NOT NULL, subscriber_id INT NOT NULL, INDEX IDX_401562C322DB1917 (newsletter_id), INDEX IDX_401562C37808B1AD (subscriber_id), PRIMARY KEY(newsletter_id, subscriber_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE newsletter_subscriber ADD CONSTRAINT FK_401562C322DB1917 FOREIGN KEY (newsletter_id) REFERENCES newsletter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE newsletter_subscriber ADD CONSTRAINT FK_401562C37808B1AD FOREIGN KEY (subscriber_id) REFERENCES subscriber (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE newsletter_subscriber DROP FOREIGN KEY FK_401562C322DB1917');
        $this->addSql('DROP TABLE newsletter');
        $this->addSql('DROP TABLE newsletter_subscriber');
    }
}
