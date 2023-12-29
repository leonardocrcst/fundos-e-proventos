<?php

use App\Domain\Repository\AtivoRepositoryInterface;
use App\Infrastructure\Database\DatabaseConnection;
use App\Infrastructure\Database\DatabaseConnectionInterface;
use App\Infrastructure\Repository\AtivoRepository;
use DI\Container;

return function (Container $container): Container
{
    $container->set(
        DatabaseConnectionInterface::class,
        fn() => new DatabaseConnection()
    );
    $container->set(
        AtivoRepositoryInterface::class,
        fn() => new AtivoRepository($container->get(DatabaseConnectionInterface::class))
    );
    return $container;
};
