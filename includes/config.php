<?php
declare(strict_types=1);

return [
    'app' => [
        'name' => 'iSoftro Solutions',
        'base_url' => getenv('APP_URL') ?: 'http://127.0.0.1/my-website',
        'timezone' => 'Asia/Kathmandu',
    ],
    'db' => [
        // Default to MySQL for the live CMS. Override with DB_CONNECTION if needed.
        'connection' => getenv('DB_CONNECTION') ?: 'mysql',
        'sqlite_path' => __DIR__ . '/../data/cms.sqlite',
        'mysql' => [
            'host' => getenv('DB_HOST') ?: '127.0.0.1',
            'port' => getenv('DB_PORT') ?: '3306',
            'database' => getenv('DB_DATABASE') ?: 'isoftro_website',
            'username' => getenv('DB_USERNAME') ?: 'root',
            'password' => getenv('DB_PASSWORD') ?: '',
            'charset' => 'utf8mb4',
        ],
    ],
    'admin' => [
        // Seed login: admin@isoftro.com / ChangeMe123!
        'seed_email' => 'admin@isoftro.com',
        'seed_username' => 'admin',
        'seed_password' => 'ChangeMe123!',
    ],
    'mail' => [
        'from_email' => getenv('MAIL_FROM') ?: 'hello@isoftro.com',
        'admin_email' => getenv('MAIL_ADMIN') ?: 'hello@isoftro.com',
    ],
];
