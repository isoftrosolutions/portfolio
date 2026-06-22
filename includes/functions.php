<?php
declare(strict_types=1);

require_once __DIR__ . '/db.php';

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function redirect(string $path): never
{
    header('Location: ' . $path);
    exit;
}

function csrf_token(): string
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrf_field(): string
{
    return '<input type="hidden" name="csrf_token" value="' . e(csrf_token()) . '">';
}

function verify_csrf(): void
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    $token = $_POST['csrf_token'] ?? '';
    if (!is_string($token) || !hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
        http_response_code(419);
        exit('Invalid CSRF token.');
    }
}

function setting(string $key, ?string $fallback = null): ?string
{
    $stmt = db()->prepare('SELECT value FROM settings WHERE key_name = ? LIMIT 1');
    $stmt->execute([$key]);
    $value = $stmt->fetchColumn();
    return $value === false ? $fallback : (string) $value;
}

function cms_all(string $table, string $order = 'sort_order ASC, id DESC', string $where = 'is_published = 1'): array
{
    $allowed = ['services', 'projects', 'products', 'pricing_plans', 'testimonials', 'brands'];
    if (!in_array($table, $allowed, true)) {
        throw new InvalidArgumentException('Unsupported CMS table.');
    }
    $stmt = db()->query("SELECT * FROM {$table} WHERE {$where} ORDER BY {$order}");
    return $stmt->fetchAll();
}

function json_list(?string $json): array
{
    $decoded = json_decode((string) $json, true);
    return is_array($decoded) ? $decoded : [];
}

function flash_set(string $type, string $message): void
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    $_SESSION['flash'][] = ['type' => $type, 'message' => $message];
}

function flash_messages(): array
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    $messages = $_SESSION['flash'] ?? [];
    unset($_SESSION['flash']);
    return $messages;
}

