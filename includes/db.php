<?php
declare(strict_types=1);

function app_config(): array
{
    static $config = null;
    if ($config === null) {
        $config = require __DIR__ . '/config.php';
        date_default_timezone_set($config['app']['timezone'] ?? 'UTC');
    }
    return $config;
}

function db_driver(): string
{
    return app_config()['db']['connection'];
}

function db(): PDO
{
    static $pdo = null;
    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $config = app_config()['db'];
    if ($config['connection'] === 'mysql') {
        $mysql = $config['mysql'];
        $dsn = sprintf(
            'mysql:host=%s;port=%s;dbname=%s;charset=%s',
            $mysql['host'],
            $mysql['port'],
            $mysql['database'],
            $mysql['charset']
        );
        $pdo = new PDO($dsn, $mysql['username'], $mysql['password']);
    } else {
        $dir = dirname($config['sqlite_path']);
        if (!is_dir($dir)) {
            mkdir($dir, 0775, true);
        }
        $pdo = new PDO('sqlite:' . $config['sqlite_path']);
        $pdo->exec('PRAGMA foreign_keys = ON');
    }

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
}

function db_now_sql(): string
{
    return db_driver() === 'mysql' ? 'NOW()' : "datetime('now')";
}

