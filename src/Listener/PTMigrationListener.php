<?php

namespace Laminas\DoctrinePTMigrations\Listener;

use Doctrine\Common\EventSubscriber;
use Doctrine\Migrations\Event\MigrationsVersionEventArgs;
use Doctrine\Migrations\Events;
use Laminas\DoctrinePTMigrations\Migrations\ExpensiveMigration;

class PTMigrationListener implements EventSubscriber
{
    public function getSubscribedEvents(): array
    {
        return [
            Events::onMigrationsVersionExecuting
        ];
    }

    public function onMigrationsVersionExecuting(MigrationsVersionEventArgs $versionArgs): void
    {
        $migration = $versionArgs->getVersion()->getMigration();

        if ($migration instanceof ExpensiveMigration) {
            $wasWritten = $versionArgs->getVersion()->writeSqlFile(__DIR__ . '/../../');
            if (!$wasWritten) {
                throw new \RuntimeException('Could not write SQL to file');
            }
        }
    }
}
