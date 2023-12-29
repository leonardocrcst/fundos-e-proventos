<?php

use DI\Container;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$routes = require_once __DIR__ . '/../src/Application/Setting/routes.php';
$inject = require_once __DIR__ . '/../src/Application/Setting/inject.php';

$container = new Container();
$inject($container);
AppFactory::setContainer($container);
$app = AppFactory::create();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);
$routes($app);
$app->run();
