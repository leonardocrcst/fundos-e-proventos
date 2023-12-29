<?php

namespace App\Infrastructure\Database;

use PDO;

class DatabaseConnection implements DatabaseConnectionInterface
{
    protected static PDO $connection;

    /**
     * @throws DatabaseAdapterException
     */
    public function getConnection(): PDO
    {
        if (empty(self::$connection)) {
            self::$connection = $this->create();
        }
        return self::$connection;
    }

    /**
     * @throws DatabaseAdapterException
     */
    private function create(): PDO
    {
        $settings = require_once __DIR__ . '/../../../phinx.php';
        $environment = $settings['environments']['default_environment'];
        $adapter = $settings['environments'][$environment]['adapter'];
        if ('sqlite' == $adapter) {
            return new PDO("sqlite:{$settings['environments'][$environment]['name']}");
        }
        throw new DatabaseAdapterException("Adapter not found: $adapter");
    }
}
