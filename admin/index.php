<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/_layout.php';

if (current_admin()) {
    redirect(ADMIN_BASE . '/dashboard.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();
    $email = trim((string) ($_POST['email'] ?? ''));
    $password = (string) ($_POST['password'] ?? '');
    if (login_admin($email, $password)) {
        redirect(ADMIN_BASE . '/dashboard.php');
    }
    flash_set('error', 'Invalid email or password.');
}

admin_header('Login');
?>
<div class="mx-auto grid min-h-[70vh] max-w-5xl items-center gap-8 lg:grid-cols-[1fr_.85fr]">
    <div>
        <p class="text-sm font-black uppercase tracking-[.25em] text-green">Dynamic Website CMS</p>
        <h2 class="mt-4 text-4xl font-black tracking-tight text-ink md:text-6xl">Manage the iSoftro website.</h2>
        <p class="mt-5 max-w-xl text-base leading-8 text-muted">Update services, projects, productized offers, pricing, testimonials, settings, and incoming leads from one lightweight PHP admin panel.</p>
    </div>
    <form method="post" class="rounded-2xl border border-border bg-card p-6 shadow-card">
        <?= csrf_field() ?>
        <label class="block text-sm font-bold">Email</label>
        <input class="input-focus mt-2 w-full rounded-xl border border-border bg-slate-50/50 px-4 py-3 text-sm" name="email" type="email" value="admin@isoftro.com" required>
        <label class="mt-5 block text-sm font-bold">Password</label>
        <input class="input-focus mt-2 w-full rounded-xl border border-border bg-slate-50/50 px-4 py-3 text-sm" name="password" type="password" required>
        <button class="btn btn-primary mt-6 w-full rounded-xl px-5 py-3 text-sm font-black" type="submit">Sign In</button>
        <p class="mt-4 text-xs text-muted">Seed login: admin@isoftro.com / ChangeMe123!</p>
    </form>
</div>
<?php admin_footer(); ?>
