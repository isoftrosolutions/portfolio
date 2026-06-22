<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    redirect('/my-website/#contact');
}

verify_csrf();

$referer = $_SERVER['HTTP_REFERER'] ?? '/my-website/#contact';
$name = trim((string) ($_POST['name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$phone = trim((string) ($_POST['phone'] ?? ''));
$company = trim((string) ($_POST['company'] ?? ''));
$website = trim((string) ($_POST['website_url'] ?? ($_POST['website'] ?? '')));
$service = trim((string) ($_POST['service_needed'] ?? ''));
$budget = trim((string) ($_POST['budget_range'] ?? ''));
$description = trim((string) ($_POST['description'] ?? ''));
$preferred = trim((string) ($_POST['preferred_contact'] ?? 'email'));

if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    flash_set('error', 'Please provide your name and a valid email.');
    redirect($referer);
}

if ($website !== '' && !filter_var($website, FILTER_VALIDATE_URL)) {
    $website = 'https://' . ltrim($website, '/');
}

$stmt = db()->prepare(
    'INSERT INTO leads (name, email, phone, company, website_url, service_needed, budget_range, description, preferred_contact)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)'
);
$stmt->execute([$name, $email, $phone, $company, $website, $service, $budget, $description, $preferred]);

flash_set('success', 'Your request has been received. We will contact you shortly.');
redirect($referer);
