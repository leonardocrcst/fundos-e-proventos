<?php

return
[
    'paths' => [
        'migrations' => 'src/Infrastructure/Database/Migration',
        'seeds' => 'src/Infrastructure/Database/Seed'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => $_ENV['environment'] ?? 'development',
        'production' => [
            'adapter' => 'mysql',
            'host' => 'localhost',
            'name' => 'production_db',
            'user' => 'root',
            'pass' => '',
            'port' => '3306',
            'charset' => 'utf8',
        ],
        'staging' => [
            'adapter' => 'sqlite',
            'name' => '../data/fep.sqlite3',
            'mode' => 'rwc',
            'suffix' => '.sqlite3',
            'charset' => 'utf8',
        ],
        'development' => [
            'adapter' => 'sqlite',
            'name' => 'data/fep.sqlite3',
            'mode' => 'rwc',
            'suffix' => '.sqlite3',
            'charset' => 'utf8',
        ],
        'testing' => [
            'adapter' => 'sqlite',
            'name' => 'testing',
            'mode' => 'memory',
            'cache' => 'shared',
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];
