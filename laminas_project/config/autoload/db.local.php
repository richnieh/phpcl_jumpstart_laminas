<?php
/**
 * Local Configuration Override
 *
 * This configuration override file is for overriding environment-specific and
 * security-sensitive configuration information. Copy this file without the
 * .dist extension at the end and populate values as needed.
 *
 * @NOTE: This file is ignored from Git by default with the .gitignore included
 * in ZendSkeletonApplication. This is a good practice, as it prevents sensitive
 * credentials from accidentally being committed into version control.
 */
return [
    'service_manager' => [
        'services' => [
            'local-db-config' => [
                'driver'   => 'pdo_mysql',
                'host'     => 'localhost',
                'dbname'   => 'jumpstart',
                'username' => 'test',
                'password' => 'password',
                'options'  => [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION],
            ],
        ],
    ],
];