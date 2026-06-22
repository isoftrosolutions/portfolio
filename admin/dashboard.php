<?php
declare(strict_types=1);

require_once __DIR__ . '/_layout.php';

require_admin();

$cards = [
    'Services'     => ['table' => 'services',     'icon' => 'code',           'href' => ADMIN_BASE . '/services/'],
    'Projects'     => ['table' => 'projects',      'icon' => 'folder-closed',  'href' => ADMIN_BASE . '/projects/'],
    'Products'     => ['table' => 'products',      'icon' => 'package',        'href' => ADMIN_BASE . '/products/'],
    'Pricing'      => ['table' => 'pricing_plans', 'icon' => 'tag',            'href' => ADMIN_BASE . '/pricing/'],
    'Testimonials' => ['table' => 'testimonials',  'icon' => 'quote',          'href' => ADMIN_BASE . '/testimonials/'],
    'Leads'        => ['table' => 'leads',         'icon' => 'messages-square','href' => ADMIN_BASE . '/leads/'],
    'Brands'       => ['table' => 'brands',        'icon' => 'building-2',     'href' => ADMIN_BASE . '/brands/'],
];

$recentLeads = db()->query('SELECT * FROM leads ORDER BY id DESC LIMIT 8')->fetchAll();
$totalLeads = (int) db()->query('SELECT COUNT(*) FROM leads')->fetchColumn();

$statusDot = static fn (string $status): string => match (strtolower($status)) {
    'new'       => 'bg-blue-500',
    'contacted' => 'bg-amber-500',
    'qualified' => 'bg-green',
    'closed'    => 'bg-slate-400',
    default     => 'bg-slate-300',
};

admin_header('Dashboard');
?>
<div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3 stagger-children">
    <?php foreach ($cards as $label => $card): ?>
        <?php $count = (int) db()->query("SELECT COUNT(*) FROM {$card['table']}")->fetchColumn(); ?>
        <a href="<?= e($card['href']) ?>" class="group relative overflow-hidden rounded-2xl border border-border bg-card p-6 shadow-card transition-all duration-200 hover:-translate-y-0.5 hover:shadow-card-hover active:scale-[0.98]">
            <div class="absolute -right-6 -top-6 h-20 w-20 rounded-full bg-green/5 transition-all duration-300 group-hover:scale-[3] group-hover:bg-green/10"></div>
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-semibold text-muted"><?= e($label) ?></p>
                    <p class="mt-1 text-4xl font-black tracking-tight text-ink"><?= $count ?></p>
                </div>
                <span class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-green/10 text-green">
                    <i data-lucide="<?= e($card['icon']) ?>" class="h-5 w-5"></i>
                </span>
            </div>
            <p class="mt-5 inline-flex items-center gap-1.5 text-sm font-bold text-green transition-all duration-200 group-hover:gap-2.5">
                Manage
                <i data-lucide="arrow-right" class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-0.5"></i>
            </p>
        </a>
    <?php endforeach; ?>
</div>

<div class="mt-8 rounded-2xl border border-border bg-card shadow-card">
    <div class="flex items-center justify-between border-b border-border px-5 py-4">
        <div class="flex items-center gap-3">
            <h2 class="text-lg font-black tracking-tight">Recent Leads</h2>
            <span class="rounded-lg bg-slate-100 px-2.5 py-1 text-xs font-bold text-muted"><?= $totalLeads ?></span>
        </div>
        <a class="btn btn-ghost inline-flex items-center gap-1.5 rounded-lg px-3.5 py-2 text-xs font-bold" href="<?= ADMIN_BASE ?>/leads/">
            View all
            <i data-lucide="arrow-right" class="h-3.5 w-3.5"></i>
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full min-w-[760px] text-left text-sm">
            <thead>
                <tr class="text-xs font-semibold uppercase tracking-wide text-muted">
                    <th class="p-4">Name</th>
                    <th class="p-4">Service</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Created</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-border stagger-children">
                <?php foreach ($recentLeads as $lead): ?>
                    <tr class="transition-colors duration-150 hover:bg-slate-50/80">
                        <td class="p-4 font-bold text-ink"><?= e($lead['name']) ?></td>
                        <td class="p-4 text-muted"><?= e($lead['service_needed'] ?: 'General') ?></td>
                        <td class="p-4 text-muted"><?= e($lead['email']) ?></td>
                        <td class="p-4">
                            <span class="inline-flex items-center gap-1.5 rounded-lg bg-green-soft px-2.5 py-1 text-xs font-bold text-green-dark">
                                <span class="h-1.5 w-1.5 rounded-full <?= $statusDot((string) ($lead['status'] ?? '')) ?>"></span>
                                <?= e(ucfirst((string) ($lead['status'] ?? 'new'))) ?>
                            </span>
                        </td>
                        <td class="p-4 text-muted"><?= e((string) ($lead['created_at'] ?? '')) ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php if (!$recentLeads): ?>
                    <tr><td colspan="5" class="p-10 text-center text-muted">No leads yet.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php admin_footer(); ?>
