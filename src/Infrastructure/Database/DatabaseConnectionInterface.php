<?php

namespace App\Infrastructure\Database;

use PDO;

interface DatabaseConnectionInterface
{
    /**
     * @throws DatabaseAdapterException
     */
    public function getConnection(): PDO;
}
