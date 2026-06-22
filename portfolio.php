<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Portfolio — iSoftro Solutions';
$pageDescription = 'Selected projects we have built: ecommerce platforms, astrology portals, cooperative systems, ERP solutions, and more.';
require __DIR__ . '/header.php';

$projects = db()->query("SELECT * FROM projects WHERE is_published = 1 ORDER BY sort_order ASC, id DESC")->fetchAll();
?>

<main id="main">
  <section class="relative isolate overflow-hidden bg-navy pt-32 text-white md:pt-40">
    <div class="orb -right-32 top-12 h-96 w-96 bg-green/20"></div>
    <div class="orb -left-32 bottom-12 h-80 w-80 bg-teal/20"></div>
    <div class="mx-auto max-w-[1240px] px-5 pb-20 md:px-8 lg:pb-28">
      <div class="mx-auto max-w-4xl text-center">
        <span class="section-label !border-green/25 !bg-white/5">Portfolio</span>
        <h1 class="mt-6 text-[clamp(2.2rem,5vw,4.2rem)] font-black uppercase leading-[.96] tracking-tight">
          Selected <span class="text-gradient">Projects</span>
        </h1>
        <p class="mx-auto mt-6 max-w-2xl text-[17px] leading-8 text-white/72">
          A mix of ecommerce, astrology, cooperative, ERP, school, library, and publishing products we have designed, built, and launched.
        </p>
      </div>
    </div>
  </section>

  <section class="bg-white">
    <div class="mx-auto max-w-[1240px] px-5 py-20 md:px-8 md:py-28">
      <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($projects as $p): ?>
          <?php
            $detailFile = __DIR__ . '/projects/' . e($p['slug']) . '.html';
            $hasDetail = file_exists($detailFile);
            $detailUrl = $hasDetail ? 'projects/' . e($p['slug']) . '.html' : null;
          ?>
          <article class="group rounded-2xl border border-border bg-white p-5 shadow-e1 transition-all duration-300 hover:-translate-y-1 hover:shadow-e3 active:scale-[0.98]">
            <div class="grid h-36 place-items-center rounded-xl bg-softgrey overflow-hidden">
              <?php if ($p['thumbnail']): ?>
                <img src="<?= e($p['thumbnail']) ?>" alt="<?= e($p['title']) ?>" class="portfolio-logo max-h-16 w-auto rounded-md" />
              <?php else: ?>
                <span class="text-4xl font-black text-muted opacity-30"><?= e(strtoupper(substr($p['title'], 0, 2))) ?></span>
              <?php endif; ?>
            </div>
            <?php if ($p['industry']): ?>
              <p class="mt-4 text-[11px] font-bold uppercase tracking-[.12em] text-green"><?= e($p['industry']) ?></p>
            <?php endif; ?>
            <h3 class="mt-1 text-[17px] font-black"><?= e($p['title']) ?></h3>
            <?php if ($p['client_name']): ?>
              <p class="mt-0.5 text-[13px] text-muted"><?= e($p['client_name']) ?></p>
            <?php endif; ?>
            <?php if ($p['short_desc']): ?>
              <p class="mt-2 text-[13px] leading-6 text-muted line-clamp-2"><?= e($p['short_desc']) ?></p>
            <?php endif; ?>
            <div class="mt-4 flex items-center gap-3">
              <?php if ($detailUrl): ?>
                <a href="<?= e($detailUrl) ?>" class="inline-flex items-center gap-1.5 text-[13px] font-bold text-green transition-all duration-200 hover:gap-2.5">
                  View Project <i data-lucide="arrow-right" class="h-3.5 w-3.5 transition-transform duration-200 group-hover:translate-x-0.5"></i>
                </a>
              <?php endif; ?>
              <?php if ($p['live_url']): ?>
                <a href="<?= e($p['live_url']) ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-[13px] font-bold text-muted hover:text-ink">
                  <i data-lucide="external-link" class="h-3.5 w-3.5"></i>
                </a>
              <?php endif; ?>
            </div>
          </article>
        <?php endforeach; ?>
        <?php if (!$projects): ?>
          <div class="col-span-full py-16 text-center">
            <p class="text-lg text-muted">Projects coming soon.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>

<?php
$footerLinks = [
    ['url' => 'index.php', 'label' => 'Home'],
    ['url' => 'services.php', 'label' => 'Services'],
    ['url' => 'portfolio.php', 'label' => 'Portfolio'],
    ['url' => 'pricing.php', 'label' => 'Pricing'],
];
require __DIR__ . '/footer.php';
?>
