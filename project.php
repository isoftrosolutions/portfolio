<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';

$slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';
if (!$slug) {
    header('HTTP/1.1 404 Not Found');
    echo 'Project not found.';
    exit;
}

$stmt = db()->prepare("SELECT * FROM projects WHERE slug = ? AND is_published = 1 LIMIT 1");
$stmt->execute([$slug]);
$p = $stmt->fetch();

if (!$p) {
    header('HTTP/1.1 404 Not Found');
    echo 'Project not found.';
    exit;
}

$features = json_list($p['features'] ?? '');
$hasDetail = $p['challenge'] || $p['solution'] || $p['results'] || $p['user_journey'] || $p['how_it_works'] || $p['how_we_helped'] || $p['tech_stack_detail'] || $features;

$pageTitle = e($p['title']) . ' — ' . ($p['client_name'] ? e($p['client_name']) . ' | ' : '') . 'iSoftro Solutions';
$pageDescription = e($p['short_desc'] ?: $p['title']);
require __DIR__ . '/header.php';
?>

<main id="main">
  <section class="relative isolate overflow-hidden bg-navy pt-32 text-white md:pt-40">
    <div class="orb -right-32 top-12 h-96 w-96 bg-green/20"></div>
    <div class="orb -left-32 bottom-12 h-80 w-80 bg-teal/20"></div>
    <div class="mx-auto max-w-[1240px] px-5 pb-20 md:px-8 lg:pb-28">
      <div class="mx-auto max-w-4xl text-center">
        <?php if ($p['thumbnail']): ?>
          <div class="mx-auto mb-6 grid h-20 w-20 place-items-center rounded-2xl bg-white p-4 shadow-lg">
            <img src="<?= e($p['thumbnail']) ?>" alt="<?= e($p['title']) ?>" class="max-h-12 w-auto" />
          </div>
        <?php endif; ?>
        <?php if ($p['industry']): ?>
          <span class="section-label !border-green/25 !bg-white/5"><?= e($p['industry']) ?></span>
        <?php endif; ?>
        <h1 class="mt-6 text-[clamp(2rem,5vw,3.5rem)] font-black uppercase leading-[.96] tracking-tight">
          <?= e($p['title']) ?>
        </h1>
        <?php if ($p['client_name']): ?>
          <p class="mt-2 text-[15px] font-medium text-white/60">Client: <?= e($p['client_name']) ?><?= $p['country'] ? ' &middot; ' . e($p['country']) : '' ?></p>
        <?php endif; ?>
        <?php if ($p['short_desc']): ?>
          <p class="mx-auto mt-4 max-w-2xl text-[17px] leading-8 text-white/72">
            <?= e($p['short_desc']) ?>
          </p>
        <?php endif; ?>
        <?php if ($p['live_url']): ?>
          <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
            <a href="<?= e($p['live_url']) ?>" target="_blank" rel="noopener" class="btn-primary inline-flex items-center gap-2 rounded-full bg-green px-7 py-3.5 text-[14px] font-bold uppercase tracking-wider text-white hover:bg-green-dark">
              Visit Live Site <i data-lucide="external-link" class="h-4 w-4"></i>
            </a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <?php if ($p['tech_stack'] || $p['tech_stack_detail']): ?>
  <section class="border-b border-border bg-softgrey">
    <div class="mx-auto max-w-[1240px] px-5 py-8 md:px-8">
      <div class="flex flex-wrap items-center justify-center gap-3">
        <span class="text-[12px] font-bold uppercase tracking-[.12em] text-muted">Tech Stack:</span>
        <?php
          $tags = $p['tech_stack'] ? array_map('trim', explode(',', $p['tech_stack'])) : [];
          foreach ($tags as $tag):
        ?>
          <span class="rounded-full border border-border bg-white px-4 py-1.5 text-[13px] font-semibold text-ink shadow-e1"><?= e($tag) ?></span>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <article class="bg-white">
    <div class="mx-auto max-w-[860px] px-5 py-14 md:px-8 md:py-20">

      <?php if ($p['long_desc']): ?>
      <section class="reveal">
        <h2 class="section-heading">Overview</h2>
        <div class="prose prose-slate max-w-none"><?= nl2br(e($p['long_desc'])) ?></div>
      </section>
      <?php endif; ?>

      <?php if ($p['challenge']): ?>
      <section class="reveal mt-14">
        <h2 class="section-heading">The Challenge</h2>
        <div class="prose prose-slate max-w-none"><?= nl2br(e($p['challenge'])) ?></div>
      </section>
      <?php endif; ?>

      <?php if ($p['solution']): ?>
      <section class="reveal mt-14">
        <h2 class="section-heading">Our Solution</h2>
        <div class="prose prose-slate max-w-none"><?= nl2br(e($p['solution'])) ?></div>
      </section>
      <?php endif; ?>

      <?php if ($p['how_it_works']): ?>
      <section class="reveal mt-14">
        <h2 class="section-heading">How It Works</h2>
        <div class="prose prose-slate max-w-none"><?= nl2br(e($p['how_it_works'])) ?></div>
      </section>
      <?php endif; ?>

      <?php if ($p['user_journey']): ?>
      <section class="reveal mt-14">
        <h2 class="section-heading">User Journey</h2>
        <div class="prose prose-slate max-w-none"><?= nl2br(e($p['user_journey'])) ?></div>
      </section>
      <?php endif; ?>

      <?php if ($features): ?>
      <section class="reveal mt-14">
        <h2 class="section-heading">Key Features</h2>
        <div class="mt-6 grid gap-3 sm:grid-cols-2">
          <?php foreach ($features as $feat): ?>
            <div class="flex items-start gap-3 rounded-xl border border-border bg-softgrey p-4">
              <span class="mt-0.5 grid h-6 w-6 shrink-0 place-items-center rounded-full bg-green/10 text-green">
                <i data-lucide="check" class="h-3.5 w-3.5"></i>
              </span>
              <span class="text-[14px] font-medium text-ink"><?= e($feat) ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </section>
      <?php endif; ?>

      <?php if ($p['how_we_helped']): ?>
      <section class="reveal mt-14">
        <h2 class="section-heading">How We Helped</h2>
        <div class="prose prose-slate max-w-none"><?= nl2br(e($p['how_we_helped'])) ?></div>
      </section>
      <?php endif; ?>

      <?php if ($p['results']): ?>
      <section class="reveal mt-14">
        <h2 class="section-heading">Results</h2>
        <div class="prose prose-slate max-w-none"><?= nl2br(e($p['results'])) ?></div>
      </section>
      <?php endif; ?>

      <?php if ($p['tech_stack_detail']): ?>
      <section class="reveal mt-14">
        <h2 class="section-heading">Technology Details</h2>
        <div class="prose prose-slate max-w-none"><?= nl2br(e($p['tech_stack_detail'])) ?></div>
      </section>
      <?php endif; ?>

      <?php if ($p['live_url'] || $hasDetail): ?>
      <section class="reveal mt-16 rounded-2xl border border-border bg-softgrey p-8 text-center">
        <h2 class="text-lg font-black text-ink">Want a similar solution?</h2>
        <p class="mt-2 text-[14px] text-muted">Let's discuss your project over a call.</p>
        <div class="mt-6 flex flex-wrap justify-center gap-4">
          <?php if ($p['live_url']): ?>
            <a href="<?= e($p['live_url']) ?>" target="_blank" rel="noopener" class="btn-primary inline-flex items-center gap-2 rounded-full bg-green px-7 py-3.5 text-[14px] font-bold uppercase tracking-wider text-white hover:bg-green-dark">
              Visit Live Site <i data-lucide="external-link" class="h-4 w-4"></i>
            </a>
          <?php endif; ?>
          <a href="index.php#contact" class="btn-outline inline-flex items-center gap-2 rounded-full border-2 border-ink px-7 py-3.5 text-[14px] font-bold uppercase tracking-wider text-ink hover:bg-ink hover:text-white">
            Contact Us <i data-lucide="arrow-right" class="h-4 w-4"></i>
          </a>
        </div>
      </section>
      <?php endif; ?>

    </div>
  </article>
</main>

<style>
.section-heading {
  font-size: clamp(1.3rem, 2.5vw, 1.6rem);
  font-weight: 900;
  text-transform: uppercase;
  line-height: 1.2;
  color: #0F172A;
}
.prose {
  margin-top: 1rem;
  font-size: 16px;
  line-height: 1.7;
  color: #64748B;
}
.reveal {
  opacity: 0;
  transform: translateY(16px);
  transition: opacity 0.4s cubic-bezier(0,0,0.2,1), transform 0.4s cubic-bezier(0,0,0.2,1);
}
.reveal.in { opacity: 1; transform: none; }
@media (prefers-reduced-motion: reduce) {
  .reveal { opacity: 1 !important; transform: none !important; transition: none; }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (!prefersReduced && 'IntersectionObserver' in window) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach((e) => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
    }, { threshold: 0.12 });
    document.querySelectorAll('.reveal').forEach((el) => io.observe(el));
  } else {
    document.querySelectorAll('.reveal').forEach((el) => el.classList.add('in'));
  }
});
</script>

<?php
$footerLinks = [
    ['url' => 'index.php', 'label' => 'Home'],
    ['url' => 'services.php', 'label' => 'Services'],
    ['url' => 'portfolio.php', 'label' => 'Portfolio'],
    ['url' => 'pricing.php', 'label' => 'Pricing'],
];
require __DIR__ . '/footer.php';
?>
