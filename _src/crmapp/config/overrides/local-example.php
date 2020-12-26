<?php
/**
 * This is the example for local configuration overrides.
 * You must declare at least the database connection parameters.
 */

return [
    'components' => [
        'db' => [
            'dsn' => 'mysql:host=localhost;dbname=DB_NAME',
            'username' => 'DB_USERNAME',
            'password' => 'DB_PASSWORD'
        ]
    ]
];
