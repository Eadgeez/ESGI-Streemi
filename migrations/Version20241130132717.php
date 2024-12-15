<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20241130132717 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Adding relations between entities for media and working fixtures';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE comment ADD media_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9474526CEA9FDD75 ON comment (media_id)');
        $this->addSql('ALTER TABLE episode RENAME COLUMN release_date TO release_at');
        $this->addSql('ALTER TABLE media RENAME COLUMN release_date TO release_at');
        $this->addSql('ALTER TABLE playlist_media ADD media_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE playlist_media ADD playlist_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE playlist_media ADD CONSTRAINT FK_C930B84FEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE playlist_media ADD CONSTRAINT FK_C930B84F6BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_C930B84FEA9FDD75 ON playlist_media (media_id)');
        $this->addSql('CREATE INDEX IDX_C930B84F6BBD148 ON playlist_media (playlist_id)');
        $this->addSql('ALTER TABLE playlist_subscription RENAME COLUMN subscription_at TO subscribed_at');
        $this->addSql('ALTER TABLE subscription_history ADD subscription_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE subscription_history ADD start_at DATE NOT NULL');
        $this->addSql('ALTER TABLE subscription_history ADD end_at DATE NOT NULL');
        $this->addSql('ALTER TABLE subscription_history DROP start_date');
        $this->addSql('ALTER TABLE subscription_history DROP end_date');
        $this->addSql('ALTER TABLE subscription_history ADD CONSTRAINT FK_54AF90D09A1887DC FOREIGN KEY (subscription_id) REFERENCES subscription (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_54AF90D09A1887DC ON subscription_history (subscription_id)');
        $this->addSql('ALTER TABLE watch_history RENAME COLUMN last_watched TO last_watched_at');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE episode RENAME COLUMN release_at TO release_date');
        $this->addSql('ALTER TABLE playlist_media DROP CONSTRAINT FK_C930B84FEA9FDD75');
        $this->addSql('ALTER TABLE playlist_media DROP CONSTRAINT FK_C930B84F6BBD148');
        $this->addSql('DROP INDEX IDX_C930B84FEA9FDD75');
        $this->addSql('DROP INDEX IDX_C930B84F6BBD148');
        $this->addSql('ALTER TABLE playlist_media DROP media_id');
        $this->addSql('ALTER TABLE playlist_media DROP playlist_id');
        $this->addSql('ALTER TABLE media RENAME COLUMN release_at TO release_date');
        $this->addSql('ALTER TABLE watch_history RENAME COLUMN last_watched_at TO last_watched');
        $this->addSql('ALTER TABLE subscription_history DROP CONSTRAINT FK_54AF90D09A1887DC');
        $this->addSql('DROP INDEX IDX_54AF90D09A1887DC');
        $this->addSql('ALTER TABLE subscription_history ADD start_date DATE NOT NULL');
        $this->addSql('ALTER TABLE subscription_history ADD end_date DATE NOT NULL');
        $this->addSql('ALTER TABLE subscription_history DROP subscription_id');
        $this->addSql('ALTER TABLE subscription_history DROP start_at');
        $this->addSql('ALTER TABLE subscription_history DROP end_at');
        $this->addSql('ALTER TABLE playlist_subscription RENAME COLUMN subscribed_at TO subscription_at');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526CEA9FDD75');
        $this->addSql('DROP INDEX IDX_9474526CEA9FDD75');
        $this->addSql('ALTER TABLE comment DROP media_id');
    }
}
