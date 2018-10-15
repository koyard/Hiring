<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

use Symfony\Component\Yaml\Parser;

$yaml = new Parser();

$parameters = $yaml->parse(file_get_contents(__DIR__ . '/app/config/parameters.yml'))['parameters'];

return [
    'paths'        => [
        'migrations' => __DIR__ . '/db/migrations',
        'seeds'      => __DIR__ . '/db/seeds',
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database'        => 'production',
        'production'              => [
            'adapter' => 'mysql',
            'host'    => $parameters['database_host'],
            'name'    => $parameters['database_name'],
            'user'    => $parameters['database_user'],
            'pass'    => $parameters['database_password'],
            'port'    => $parameters['database_port'],
            'charset' => 'utf8',
        ],
    ],
];
