<?php

namespace App\Infrastructure\Repository;

use App\Domain\Repository\EntityRepositoryInterface;
use App\Infrastructure\Database\DatabaseConnectionInterface;

abstract class EntityRepository implements EntityRepositoryInterface
{
    public function __construct(
        protected DatabaseConnectionInterface $connection
    ) {
    }
}
