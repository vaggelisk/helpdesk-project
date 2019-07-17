<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190717102246 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE uv_support_privilege CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE uv_user CHANGE is_enabled is_enabled TINYINT(1) DEFAULT \'0\' NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E8D39F613701B297 ON uv_user (timezone)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E8D39F6111F07F3F ON uv_user (timeformat)');
        $this->addSql('ALTER TABLE uv_saved_filters CHANGE route route VARCHAR(190) DEFAULT NULL');
        $this->addSql('ALTER TABLE uv_ticket CHANGE subject subject LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE uv_prepared_responses CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE uv_website_knowledgebase CHANGE disable_customer_login disable_customer_login TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE uv_prepared_responses CHANGE description description VARCHAR(2500) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE uv_saved_filters CHANGE route route VARCHAR(191) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE uv_support_privilege CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE uv_ticket CHANGE subject subject LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('DROP INDEX UNIQ_E8D39F613701B297 ON uv_user');
        $this->addSql('DROP INDEX UNIQ_E8D39F6111F07F3F ON uv_user');
        $this->addSql('ALTER TABLE uv_user CHANGE is_enabled is_enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE uv_website_knowledgebase CHANGE disable_customer_login disable_customer_login INT DEFAULT 0');
    }
}
