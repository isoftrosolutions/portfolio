<?php
declare(strict_types=1);

require_once __DIR__ . '/functions.php';

function current_admin(): ?array
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    if (empty($_SESSION['admin_id'])) {
        return null;
    }
    $stmt = db()->prepare('SELECT id, username, email, created_at FROM admins WHERE id = ?');
    $stmt->execute([$_SESSION['admin_id']]);
    $admin = $stmt->fetch();
    return $admin ?: null;
}

function require_admin(): array
{
    $admin = current_admin();
    if (!$admin) {
        redirect('/my-website/admin/index.php');
    }
    return $admin;
}

function login_admin(string $email, string $password): bool
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    $stmt = db()->prepare('SELECT * FROM admins WHERE email = ? LIMIT 1');
    $stmt->execute([$email]);
    $admin = $stmt->fetch();
    if (!$admin || !password_verify($password, $admin['password_hash'])) {
        return false;
    }
    session_regenerate_id(true);
    $_SESSION['admin_id'] = (int) $admin['id'];
    return true;
}

function logout_admin(): never
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    $_SESSION = [];
    session_destroy();
    redirect('/my-website/admin/index.php');
}

