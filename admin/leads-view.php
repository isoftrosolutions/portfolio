<?php
declare(strict_types=1);

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    verify_csrf();
    $id = max(0, (int) ($_POST['id'] ?? 0));
    $status = (string) ($_POST['status'] ?? 'new');
    $allowed = ['new', 'contacted', 'qualified', 'converted', 'rejected'];
    if ($id > 0 && in_array($status, $allowed, true)) {
        $stmt = db()->prepare('UPDATE leads SET status = ?, admin_notes = ? WHERE id = ?');
        $stmt->execute([$status, trim((string) ($_POST['admin_notes'] ?? '')), $id]);
        flash_set('success', 'Lead updated.');
    }
    redirect(ADMIN_BASE . '/leads/');
}

$leads = db()->query('SELECT * FROM leads ORDER BY id DESC')->fetchAll();

$statusColors = [
    'new'       => ['bg' => 'bg-blue-100', 'dot' => 'bg-blue-500', 'text' => 'text-blue-700'],
    'contacted' => ['bg' => 'bg-amber-100', 'dot' => 'bg-amber-500', 'text' => 'text-amber-700'],
    'qualified' => ['bg' => 'bg-green-soft', 'dot' => 'bg-green', 'text' => 'text-green-dark'],
    'converted' => ['bg' => 'bg-emerald-100', 'dot' => 'bg-emerald-600', 'text' => 'text-emerald-700'],
    'rejected'  => ['bg' => 'bg-slate-100', 'dot' => 'bg-slate-400', 'text' => 'text-slate-500'],
];

admin_header('Leads');
?>
<div class="rounded-2xl border border-border bg-card shadow-card">
    <div class="flex items-center justify-between border-b border-border px-5 py-4">
        <div class="flex items-center gap-3">
            <h2 class="text-lg font-black tracking-tight">Incoming Project Leads</h2>
            <span class="rounded-lg bg-slate-100 px-2.5 py-1 text-xs font-bold text-muted"><?= count($leads) ?></span>
        </div>
    </div>
    <div class="divide-y divide-border">
        <?php foreach ($leads as $lead): ?>
            <form method="post" class="grid gap-4 p-5 transition-colors duration-150 hover:bg-slate-50/50 xl:grid-cols-[1fr_.75fr]">
                <?= csrf_field() ?>
                <input type="hidden" name="id" value="<?= (int) $lead['id'] ?>">
                <div>
                    <div class="flex flex-wrap items-center gap-3">
                        <h3 class="text-xl font-black tracking-tight"><?= e($lead['name']) ?></h3>
                        <?php $c = $statusColors[$lead['status']] ?? $statusColors['new']; ?>
                        <span class="inline-flex items-center gap-1.5 rounded-lg <?= $c['bg'] ?> px-2.5 py-1 text-xs font-bold <?= $c['text'] ?>">
                            <span class="h-1.5 w-1.5 rounded-full <?= $c['dot'] ?>"></span>
                            <?= e(ucwords($lead['status'])) ?>
                        </span>
                    </div>
                    <p class="mt-2 text-sm text-muted"><?= e($lead['email']) ?><?= $lead['phone'] ? ' | ' . e($lead['phone']) : '' ?></p>
                    <p class="mt-2 text-sm font-semibold"><?= e($lead['service_needed'] ?: 'General inquiry') ?><?= $lead['budget_range'] ? ' | ' . e($lead['budget_range']) : '' ?></p>
                    <?php if ($lead['website_url']): ?><p class="mt-2 text-sm"><a class="font-bold text-green" href="<?= e($lead['website_url']) ?>" target="_blank" rel="noopener">Website link</a></p><?php endif; ?>
                    <p class="mt-4 max-w-3xl text-sm leading-7 text-muted"><?= nl2br(e($lead['description'])) ?></p>
                    <p class="mt-4 text-xs text-muted">Created: <?= e($lead['created_at']) ?></p>
                </div>
                <div>
                    <label class="block text-sm font-bold">Status</label>
                    <select class="input-focus mt-2 w-full rounded-xl border border-border bg-slate-50/50 px-4 py-3 text-sm" name="status">
                        <?php foreach (['new', 'contacted', 'qualified', 'converted', 'rejected'] as $status): ?>
                            <option value="<?= e($status) ?>" <?= $lead['status'] === $status ? 'selected' : '' ?>><?= e(ucwords($status)) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label class="mt-4 block text-sm font-bold">Admin Notes</label>
                    <textarea class="input-focus mt-2 min-h-28 w-full rounded-xl border border-border bg-slate-50/50 px-4 py-3 text-sm" name="admin_notes"><?= e($lead['admin_notes']) ?></textarea>
                    <button class="btn btn-primary mt-4 inline-flex w-full items-center justify-center gap-2 rounded-xl px-5 py-3 text-sm font-bold" type="submit">
                        <i data-lucide="check-circle-2" class="h-[18px] w-[18px]"></i>
                        Update Lead
                    </button>
                </div>
            </form>
        <?php endforeach; ?>
        <?php if (!$leads): ?>
            <p class="p-10 text-center text-muted">No leads yet.</p>
        <?php endif; ?>
    </div>
</div>
<?php admin_footer(); ?>
