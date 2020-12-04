<?php

$modules = [
    'DoctrineModule',
    'DoctrineORMModule',
    'Laminas\\Router',
    'Laminas\\Mvc\\Console',
    'Laminas\\DoctrinePTMigrations',
];

return [
    'modules'                 => $modules,
    'module_listener_options' => [
        'module_paths'             => [
            __DIR__ . '/../src',
        ],
        'config_glob_paths'        => [],
        'cache_dir'                => '',
        'config_cache_enabled'     => false,
        'config_cache_key'         => 'application.config.cache',
        'module_map_cache_enabled' => false,
        'module_map_cache_key'     => 'application.module.cache',
    ],
];
