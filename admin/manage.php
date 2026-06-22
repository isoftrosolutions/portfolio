<?php
declare(strict_types=1);

require_once __DIR__ . '/_layout.php';

require_admin();

$modules = [
    'services' => [
        'title' => 'Services',
        'table' => 'services',
        'label' => 'title',
        'order' => 'sort_order ASC, id DESC',
        'fields' => [
            ['title', 'Title', 'text', true],
            ['slug', 'Slug', 'text', true],
            ['icon', 'Lucide Icon', 'text', false],
            ['short_desc', 'Short Description', 'textarea', false],
            ['long_desc', 'Long Description', 'textarea', false],
            ['sort_order', 'Sort Order', 'number', false],
            ['is_featured', 'Featured', 'checkbox', false],
            ['is_published', 'Published', 'checkbox', false],
        ],
    ],
    'projects' => [
        'title' => 'Projects',
        'table' => 'projects',
        'label' => 'title',
        'order' => 'sort_order ASC, id DESC',
        'fields' => [
            ['title', 'Title', 'text', true],
            ['slug', 'Slug', 'text', true],
            ['client_name', 'Client Name', 'text', false],
            ['industry', 'Industry', 'text', false],
            ['country', 'Country', 'text', false],
            ['short_desc', 'Short Description', 'textarea', false],
            ['long_desc', 'Long Description', 'textarea', false],
            ['challenge', 'Challenge / Problem', 'textarea', false],
            ['solution', 'Solution / Approach', 'textarea', false],
            ['results', 'Results / Outcomes', 'textarea', false],
            ['user_journey', 'User Journey', 'textarea', false],
            ['how_it_works', 'How It Works', 'textarea', false],
            ['how_we_helped', 'How We Helped', 'textarea', false],
            ['features', 'Features (one per line)', 'json_lines', false],
            ['tech_stack_detail', 'Tech Stack (detailed)', 'textarea', false],
            ['tech_stack', 'Tech Stack (short comma list)', 'text', false],
            ['live_url', 'Live URL', 'text', false],
            ['app_url', 'App URL', 'text', false],
            ['status', 'Status', 'text', false],
            ['year', 'Year', 'text', false],
            ['sort_order', 'Sort Order', 'number', false],
            ['is_featured', 'Featured', 'checkbox', false],
            ['is_published', 'Published', 'checkbox', false],
        ],
    ],
    'products' => [
        'title' => 'Products',
        'table' => 'products',
        'label' => 'name',
        'order' => 'sort_order ASC, id DESC',
        'fields' => [
            ['name', 'Name', 'text', true],
            ['slug', 'Slug', 'text', true],
            ['category', 'Category', 'text', false],
            ['description', 'Description', 'textarea', false],
            ['status', 'Status', 'select:live,beta,coming_soon,dev', false],
            ['pricing_note', 'Pricing Note', 'text', false],
            ['cta_label', 'CTA Label', 'text', false],
            ['cta_url', 'CTA URL', 'text', false],
            ['sort_order', 'Sort Order', 'number', false],
            ['is_published', 'Published', 'checkbox', false],
        ],
    ],
    'pricing' => [
        'title' => 'Pricing Plans',
        'table' => 'pricing_plans',
        'label' => 'name',
        'order' => 'sort_order ASC, id DESC',
        'fields' => [
            ['name', 'Name', 'text', true],
            ['target_audience', 'Target Audience', 'text', false],
            ['price', 'Price', 'text', false],
            ['price_note', 'Price Note', 'text', false],
            ['currency', 'Currency', 'text', false],
            ['features', 'Features, one per line', 'json_lines', false],
            ['category', 'Category', 'text', false],
            ['sort_order', 'Sort Order', 'number', false],
            ['is_popular', 'Popular', 'checkbox', false],
            ['is_published', 'Published', 'checkbox', false],
        ],
    ],
    'testimonials' => [
        'title' => 'Testimonials',
        'table' => 'testimonials',
        'label' => 'client_name',
        'order' => 'sort_order ASC, id DESC',
        'fields' => [
            ['client_name', 'Client Name', 'text', true],
            ['business_name', 'Business Name', 'text', false],
            ['review', 'Review', 'textarea', false],
            ['rating', 'Rating', 'number', false],
            ['country', 'Country', 'text', false],
            ['sort_order', 'Sort Order', 'number', false],
            ['is_featured', 'Featured', 'checkbox', false],
            ['is_approved', 'Approved', 'checkbox', false],
            ['is_published', 'Published', 'checkbox', false],
        ],
    ],
    'settings' => [
        'title' => 'Settings',
        'table' => 'settings',
        'label' => 'key_name',
        'order' => 'key_name ASC',
        'fields' => [
            ['key_name', 'Key', 'text', true],
            ['value', 'Value', 'textarea', false],
        ],
    ],
    'brands' => [
        'title' => 'Brands',
        'table' => 'brands',
        'label' => 'name',
        'order' => 'sort_order ASC, id DESC',
        'fields' => [
            ['name', 'Brand Name', 'text', true],
            ['logo_url', 'Logo Image', 'file', false],
            ['website_url', 'Website URL', 'text', false],
            ['sort_order', 'Sort Order', 'number', false],
            ['is_published', 'Published', 'checkbox', false],
        ],
    ],
];

$module = (string) ($_GET['module'] ?? 'services');
if ($module === 'leads') {
    require __DIR__ . '/leads-view.php';
    exit;
}
if (!isset($modules[$module])) {
    redirect(ADMIN_BASE . '/dashboard.php');
}

$config = $modules[$module];
$table = $config['table'];
$fields = $config['fields'];
$editId = isset($_GET['edit']) ? max(0, (int) $_GET['edit']) : 0;

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    verify_csrf();
    $action = (string) ($_POST['action'] ?? '');
    $id = max(0, (int) ($_POST['id'] ?? 0));

    if ($action === 'delete' && $id > 0) {
        $stmt = db()->prepare("DELETE FROM {$table} WHERE id = ?");
        $stmt->execute([$id]);
        flash_set('success', $config['title'] . ' record deleted.');
        redirect(ADMIN_BASE . '/' . $module . '/');
    }

    if ($action === 'save') {
        $values = [];
        foreach ($fields as [$name, , $type, $required]) {
            if ($type === 'checkbox') {
                $values[$name] = isset($_POST[$name]) ? 1 : 0;
                continue;
            }
            if ($type === 'file') {
                $file = $_FILES[$name] ?? null;
                if ($file && $file['error'] === UPLOAD_ERR_OK) {
                    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                    $allowed = ['jpg','jpeg','png','gif','webp','svg'];
                    if (!in_array($ext, $allowed, true)) {
                        flash_set('error', 'Invalid file type for ' . $label . '. Allowed: ' . implode(', ', $allowed));
                        redirect(ADMIN_BASE . '/' . $module . '/');
                    }
                    $uploadDir = __DIR__ . '/../uploads/' . $module . '/';
                    if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
                    $filename = uniqid() . '.' . $ext;
                    move_uploaded_file($file['tmp_name'], $uploadDir . $filename);
                    $values[$name] = '/my-website/uploads/' . $module . '/' . $filename;
                } else {
                    $values[$name] = trim((string) ($_POST['current_' . $name] ?? ''));
                }
                continue;
            }
            $value = trim((string) ($_POST[$name] ?? ''));
            if ($required && $value === '') {
                flash_set('error', 'Please complete required fields.');
                redirect(ADMIN_BASE . '/' . $module . '/');
            }
            if ($type === 'number') {
                $values[$name] = $value === '' ? 0 : (int) $value;
            } elseif ($type === 'json_lines') {
                $lines = array_values(array_filter(array_map('trim', preg_split('/\R/', $value) ?: [])));
                $values[$name] = json_encode($lines, JSON_UNESCAPED_SLASHES);
            } else {
                $values[$name] = $value;
            }
        }

        if ($id > 0) {
            $sets = implode(', ', array_map(static fn (string $name): string => "{$name} = ?", array_keys($values)));
            $stmt = db()->prepare("UPDATE {$table} SET {$sets} WHERE id = ?");
            $stmt->execute([...array_values($values), $id]);
        } else {
            $names = implode(', ', array_keys($values));
            $placeholders = implode(', ', array_fill(0, count($values), '?'));
            $stmt = db()->prepare("INSERT INTO {$table} ({$names}) VALUES ({$placeholders})");
            $stmt->execute(array_values($values));
        }
        flash_set('success', $config['title'] . ' saved.');
        redirect(ADMIN_BASE . '/' . $module . '/');
    }
}

$editRow = null;
if ($editId > 0) {
    $stmt = db()->prepare("SELECT * FROM {$table} WHERE id = ?");
    $stmt->execute([$editId]);
    $editRow = $stmt->fetch() ?: null;
}

$rows = db()->query("SELECT * FROM {$table} ORDER BY {$config['order']}")->fetchAll();

admin_header($config['title']);
?>
<div class="grid gap-6 xl:grid-cols-[1fr_1.3fr]">
    <form method="post" enctype="multipart/form-data" class="rounded-2xl border border-border bg-card p-6 shadow-card">
        <?= csrf_field() ?>
        <input type="hidden" name="action" value="save">
        <input type="hidden" name="id" value="<?= e((string) ($editRow['id'] ?? 0)) ?>">
        <div class="flex items-center justify-between gap-3">
            <h2 class="text-lg font-black tracking-tight"><?= $editRow ? 'Edit' : 'Add' ?> <?= e(rtrim($config['title'], 's')) ?></h2>
            <?php if ($editRow): ?><a class="btn btn-ghost rounded-xl px-4 py-2 text-xs font-bold" href="<?= ADMIN_BASE ?>/<?= e($module) ?>/">Cancel</a><?php endif; ?>
        </div>
        <div class="mt-5 space-y-4">
            <?php foreach ($fields as [$name, $label, $type, $required]): ?>
                <?php $value = (string) ($editRow[$name] ?? ''); ?>
                <label class="block">
                    <span class="text-sm font-bold"><?= e($label) ?><?= $required ? ' <span class="text-red-500">*</span>' : '' ?></span>
                    <?php if ($type === 'textarea' || $type === 'json_lines'): ?>
                        <?php $textareaValue = $type === 'json_lines' ? implode("\n", json_list($value)) : $value; ?>
                        <textarea class="input-focus mt-2 min-h-28 w-full rounded-xl border border-border bg-slate-50/50 px-4 py-3 text-sm" name="<?= e($name) ?>" <?= $required ? 'required' : '' ?>><?= e($textareaValue) ?></textarea>
                    <?php elseif ($type === 'checkbox'): ?>
                        <span class="mt-2 flex items-center gap-3 rounded-xl border border-border bg-slate-50/50 px-4 py-3">
                            <input class="h-5 w-5 accent-green" name="<?= e($name) ?>" type="checkbox" value="1" <?= (int) ($editRow[$name] ?? 1) === 1 ? 'checked' : '' ?>>
                            <span class="text-sm text-muted">Enabled</span>
                        </span>
                    <?php elseif ($type === 'file'): ?>
                        <?php if ($value): ?>
                            <div class="mt-2 mb-2 flex items-center gap-3 rounded-xl border border-border bg-slate-50/50 p-3">
                                <img src="<?= e($value) ?>" alt="" class="h-12 w-12 shrink-0 rounded-lg border border-border object-contain bg-white">
                                <span class="truncate text-xs text-muted"><?= e(basename($value)) ?></span>
                            </div>
                        <?php endif; ?>
                        <input class="input-focus mt-2 w-full rounded-xl border border-border bg-slate-50/50 px-4 py-2.5 text-sm file:mr-3 file:rounded-lg file:border-0 file:bg-green file:px-3 file:py-1.5 file:text-xs file:font-bold file:text-white" name="<?= e($name) ?>" type="file" accept="image/jpeg,image/png,image/gif,image/webp,image/svg+xml">
                        <input type="hidden" name="current_<?= e($name) ?>" value="<?= e($value) ?>">
                    <?php elseif (str_starts_with($type, 'select:')): ?>
                        <?php $options = explode(',', substr($type, 7)); ?>
                        <select class="input-focus mt-2 w-full rounded-xl border border-border bg-slate-50/50 px-4 py-3 text-sm" name="<?= e($name) ?>">
                            <?php foreach ($options as $option): ?>
                                <option value="<?= e($option) ?>" <?= $value === $option ? 'selected' : '' ?>><?= e(ucwords(str_replace('_', ' ', $option))) ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php else: ?>
                        <input class="input-focus mt-2 w-full rounded-xl border border-border bg-slate-50/50 px-4 py-3 text-sm" name="<?= e($name) ?>" type="<?= $type === 'number' ? 'number' : 'text' ?>" value="<?= e($value) ?>" <?= $required ? 'required' : '' ?>>
                    <?php endif; ?>
                </label>
            <?php endforeach; ?>
        </div>
        <button class="btn btn-primary mt-6 w-full rounded-xl px-5 py-3 text-sm font-black" type="submit">
            <span class="flex items-center justify-center gap-2">
                <i data-lucide="save" class="h-[18px] w-[18px]"></i>
                Save <?= e(rtrim($config['title'], 's')) ?>
            </span>
        </button>
    </form>

    <div class="rounded-2xl border border-border bg-card shadow-card">
        <div class="flex items-center justify-between border-b border-border px-5 py-4">
            <h2 class="text-lg font-black tracking-tight">All <?= e($config['title']) ?></h2>
            <span class="rounded-lg bg-slate-100 px-2.5 py-1 text-xs font-bold text-muted"><?= count($rows) ?></span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[760px] text-left text-sm">
                <thead>
                    <tr class="text-xs font-semibold uppercase tracking-wide text-muted">
                        <th class="p-4">Title</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Order</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border stagger-children">
                    <?php foreach ($rows as $row): ?>
                        <tr class="transition-colors duration-150 hover:bg-slate-50/80">
                            <td class="p-4">
                                <p class="font-bold text-ink"><?= e((string) $row[$config['label']]) ?></p>
                                <p class="mt-0.5 text-xs text-muted">ID: <?= (int) $row['id'] ?></p>
                            </td>
                            <td class="p-4">
                                <?php $published = array_key_exists('is_published', $row) ? (int) $row['is_published'] === 1 : true; ?>
                                <span class="inline-flex items-center gap-1.5 rounded-lg px-2.5 py-1 text-xs font-bold <?= $published ? 'bg-green-soft text-green-dark' : 'bg-slate-100 text-muted' ?>">
                                    <span class="h-1.5 w-1.5 rounded-full <?= $published ? 'bg-green' : 'bg-slate-400' ?>"></span>
                                    <?= $published ? 'Published' : 'Draft' ?>
                                </span>
                            </td>
                            <td class="p-4 text-muted"><?= e((string) ($row['sort_order'] ?? '')) ?></td>
                            <td class="p-4">
                                <div class="flex justify-end gap-2">
                                    <a class="btn btn-ghost inline-flex items-center gap-1.5 rounded-lg px-3.5 py-2 text-xs font-bold" href="<?= ADMIN_BASE ?>/<?= e($module) ?>/?edit=<?= (int) $row['id'] ?>">
                                        <i data-lucide="pen-line" class="h-3.5 w-3.5"></i>
                                        Edit
                                    </a>
                                    <form method="post" onsubmit="return confirm('Delete this record?')">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?= (int) $row['id'] ?>">
                                        <button class="btn btn-danger inline-flex items-center gap-1.5 rounded-lg px-3.5 py-2 text-xs font-bold" type="submit">
                                            <i data-lucide="trash-2" class="h-3.5 w-3.5"></i>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (!$rows): ?>
                        <tr><td colspan="4" class="p-10 text-center text-muted">No records yet.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php admin_footer(); ?>
