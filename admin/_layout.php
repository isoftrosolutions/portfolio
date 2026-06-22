<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/auth.php';

define('ADMIN_BASE', '/my-website/admin');

function admin_header(string $title): void
{
    $admin = current_admin();
    $nav = [
        'dashboard.php'     => ['label' => 'Dashboard',    'icon' => 'layout-dashboard'],
        'services/'         => ['label' => 'Services',     'icon' => 'code'],
        'projects/'         => ['label' => 'Projects',     'icon' => 'folder-closed'],
        'products/'         => ['label' => 'Products',     'icon' => 'package'],
        'pricing/'          => ['label' => 'Pricing',      'icon' => 'tag'],
        'testimonials/'     => ['label' => 'Testimonials', 'icon' => 'quote'],
        'leads/'            => ['label' => 'Leads',        'icon' => 'messages-square'],
        'brands/'           => ['label' => 'Brands',       'icon' => 'building-2'],
        'settings/'         => ['label' => 'Settings',     'icon' => 'settings-2'],
    ];
    $current = strtok($_SERVER['REQUEST_URI'] ?? '', '?') ?: '';
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= e($title) ?> | iSoftro Admin</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js" defer></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: { sans: ['Inter', 'system-ui', 'sans-serif'] },
                        colors: {
                            green:  { DEFAULT: '#16A34A', light: '#22C55E', dark: '#15803D', soft: '#F0FDF4' },
                            ink:    '#0B1220',
                            muted:  '#64748B',
                            border: '#E2E8F0',
                            card:   '#FFFFFF',
                        },
                        boxShadow: {
                            'card': '0 1px 3px rgba(11,18,32,0.06), 0 1px 2px rgba(11,18,32,0.04)',
                            'card-hover': '0 8px 24px rgba(11,18,32,0.10), 0 2px 4px rgba(11,18,32,0.06)',
                            'elevated': '0 12px 40px rgba(11,18,32,0.12)',
                        },
                    }
                }
            };
        </script>
        <style>
            *, *::before, *::after { --ease-out: cubic-bezier(0.23, 1, 0.32, 1); --ease-in-out: cubic-bezier(0.77, 0, 0.175, 1); }
            html { font-family: 'Inter', system-ui, sans-serif; }
            body { overflow-x: hidden; }
            ::-webkit-scrollbar { width: 6px; height: 6px; }
            ::-webkit-scrollbar-track { background: transparent; }
            ::-webkit-scrollbar-thumb { background: #CBD5E1; border-radius: 3px; }
            ::-webkit-scrollbar-thumb:hover { background: #94A3B8; }
            .nav-link { position: relative; transition: background 180ms var(--ease-out), color 180ms var(--ease-out); }
            .nav-link:active { transform: scale(0.97); }
            .nav-link.active::before { content: ''; position: absolute; left: -1.25rem; top: 50%; transform: translateY(-50%); width: 3px; height: 24px; border-radius: 0 3px 3px 0; background: #16A34A; }
            .flash-enter { animation: flashSlide 260ms var(--ease-out) forwards; }
            @keyframes flashSlide { from { opacity: 0; transform: translateY(-8px) scale(0.97); } to { opacity: 1; transform: translateY(0) scale(1); } }
            .stagger-children > * { opacity: 0; transform: translateY(6px); animation: stagFade 300ms var(--ease-out) forwards; }
            .stagger-children > *:nth-child(1) { animation-delay: 0ms; }
            .stagger-children > *:nth-child(2) { animation-delay: 40ms; }
            .stagger-children > *:nth-child(3) { animation-delay: 80ms; }
            .stagger-children > *:nth-child(4) { animation-delay: 120ms; }
            .stagger-children > *:nth-child(5) { animation-delay: 160ms; }
            .stagger-children > *:nth-child(6) { animation-delay: 200ms; }
            .stagger-children > *:nth-child(7) { animation-delay: 240ms; }
            .stagger-children > *:nth-child(8) { animation-delay: 280ms; }
            @keyframes stagFade { to { opacity: 1; transform: translateY(0); } }
            .btn { transition: transform 120ms var(--ease-out), box-shadow 200ms var(--ease-out); cursor: pointer; }
            .btn:active { transform: scale(0.97); }
            .btn-primary { background: #16A34A; color: #fff; }
            .btn-primary:hover { background: #15803D; box-shadow: 0 4px 16px rgba(22,163,74,0.30); }
            .btn-ghost { background: transparent; color: #475569; border: 1px solid #E2E8F0; }
            .btn-ghost:hover { background: #F1F5F9; border-color: #CBD5E1; }
            .btn-danger { background: #FEF2F2; color: #DC2626; border: 1px solid #FECACA; }
            .btn-danger:hover { background: #FEE2E2; }
            .input-focus { transition: border-color 180ms var(--ease-out), box-shadow 180ms var(--ease-out); }
            .input-focus:focus { border-color: #16A34A; box-shadow: 0 0 0 3px rgba(22,163,74,0.15); outline: none; }
            @media (prefers-reduced-motion: reduce) { *, *::before, *::after { animation-duration: .001ms !important; animation-iteration-count: 1 !important; transition-duration: .001ms !important; } .nav-link:active { transform: none; } .btn:active { transform: none; } }
        </style>
    </head>
    <body class="min-h-screen bg-slate-50 text-ink antialiased selection:bg-green/15">
        <div class="flex min-h-screen">
            <?php if ($admin): ?>
                <aside class="hidden w-64 shrink-0 border-r border-border bg-white p-4 lg:block">
                    <a href="<?= ADMIN_BASE ?>/dashboard.php" class="flex items-center gap-3">
                        <span class="grid h-10 w-10 place-items-center rounded-xl bg-green text-base font-black text-white">iS</span>
                        <span>
                            <span class="block text-sm font-black tracking-tight">iSoftro</span>
                            <span class="block text-[11px] font-semibold text-muted">CMS Admin</span>
                        </span>
                    </a>
                    <nav class="mt-8 space-y-0.5">
                        <?php foreach ($nav as $href => $item): ?>
                            <?php $active = str_starts_with($current, rtrim(ADMIN_BASE . '/' . $href, '/')); ?>
                            <a class="nav-link <?= $active ? 'active bg-green/10 text-green font-black' : 'text-muted hover:bg-slate-100 hover:text-ink font-semibold' ?> flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm" href="<?= ADMIN_BASE ?>/<?= e($href) ?>">
                                <i data-lucide="<?= e($item['icon']) ?>" class="h-[18px] w-[18px]"></i>
                                <?= e($item['label']) ?>
                            </a>
                        <?php endforeach; ?>
                    </nav>
                </aside>
            <?php endif; ?>
            <main class="min-w-0 flex-1">
                <header class="sticky top-0 z-20 border-b border-border bg-white/85 px-4 py-3 backdrop-blur-xl lg:px-8">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-[11px] font-black uppercase tracking-[.25em] text-green">Admin Panel</p>
                            <h1 class="mt-0.5 text-xl font-black tracking-tight"><?= e($title) ?></h1>
                        </div>
                        <?php if ($admin): ?>
                            <div class="flex items-center gap-3 text-sm">
                                <span class="hidden text-muted sm:inline"><?= e($admin['email']) ?></span>
                                <a class="btn btn-ghost rounded-xl px-4 py-2 text-xs font-bold" href="<?= ADMIN_BASE ?>/logout.php">Logout</a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if ($admin): ?>
                        <nav class="mt-3 -mb-3 flex gap-1 overflow-x-auto lg:hidden">
                            <?php foreach ($nav as $href => $item): ?>
                                <?php $active = str_starts_with($current, rtrim(ADMIN_BASE . '/' . $href, '/')); ?>
                                <a class="whitespace-nowrap rounded-lg border px-3 py-1.5 text-xs font-bold <?= $active ? 'border-green bg-green/10 text-green' : 'border-border text-muted hover:bg-slate-100' ?>" href="<?= ADMIN_BASE ?>/<?= e($href) ?>"><?= e($item['label']) ?></a>
                            <?php endforeach; ?>
                        </nav>
                    <?php endif; ?>
                </header>
                <section class="p-4 lg:p-8">
                    <?php foreach (flash_messages() as $flash): ?>
                        <div class="flash-enter mb-4 flex items-center gap-2.5 rounded-xl border px-4 py-3 text-sm font-bold <?= $flash['type'] === 'success' ? 'border-green/20 bg-green-soft text-green-dark' : 'border-red-200 bg-red-50 text-red-700' ?>">
                            <i data-lucide="<?= $flash['type'] === 'success' ? 'check-circle-2' : 'alert-circle' ?>" class="h-[18px] w-[18px] shrink-0"></i>
                            <?= e($flash['message']) ?>
                        </div>
                    <?php endforeach; ?>
    <?php
}

function admin_footer(): void
{
    ?>
                </section>
            </main>
        </div>
        <script>lucide.createIcons();</script>
    </body>
    </html>
    <?php
}
