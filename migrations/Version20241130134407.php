<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use App\Enum\CommentStatusEnum;
use App\Enum\UserAccountStatusEnum;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20241130134407 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Adding status to comment and account_status to user';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(sprintf('ALTER TABLE comment ADD status VARCHAR(255) DEFAULT \'%s\' NOT NULL', CommentStatusEnum::PENDING->value));
        $this->addSql(sprintf('ALTER TABLE "user" ADD account_status VARCHAR(255) DEFAULT \'%s\' NOT NULL', UserAccountStatusEnum::INACTIVE->value));
    }

    public function down(Schema $schema): void
    {
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "user" DROP account_status');
        $this->addSql('ALTER TABLE comment DROP status');
    }
}
