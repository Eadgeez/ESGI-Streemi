<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20241207151013 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add quality, catchphrase and description to Subscription';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE subscription ADD quality VARCHAR(15) DEFAULT NULL');
        $this->addSql('ALTER TABLE subscription ADD catchphrase VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE subscription ADD description TEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE subscription DROP quality');
        $this->addSql('ALTER TABLE subscription DROP catchphrase');
        $this->addSql('ALTER TABLE subscription DROP description');
    }
}
