<?php

use Laminas\Mvc\Application;

require_once __DIR__ . '/../vendor/autoload.php';

$config = require __DIR__ . '/application.config.php';

Application::init($config)->run();

