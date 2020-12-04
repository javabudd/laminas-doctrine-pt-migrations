<?php

namespace Laminas\DoctrinePTMigrations;

use Doctrine\ORM\EntityManager;
use Laminas\DoctrinePTMigrations\Listener\PTMigrationListener;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;
use Laminas\Mvc\MvcEvent;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function onBootstrap(MvcEvent $event): void
    {
        /** @var EntityManager $em */
        $em = $event->getApplication()->getServiceManager()->get(EntityManager::class);

        $em->getEventManager()->addEventSubscriber(new PTMigrationListener());
    }
}
