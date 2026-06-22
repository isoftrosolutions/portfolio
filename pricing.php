<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Pricing — iSoftro Solutions';
$pageDescription = 'Transparent pricing for websites, mobile apps, ERP systems, SaaS platforms, AI chatbots, and custom software.';
require __DIR__ . '/header.php';

$plans = cms_all('pricing_plans', 'sort_order ASC, id DESC');

$categories = [];
foreach ($plans as $plan) {
    $cat = $plan['category'] ?: 'general';
    $categories[$cat][] = $plan;
}

$faqs = [
    ['q' => 'What do your prices include?', 'a' => 'Every quote includes development, testing, deployment, and a post-launch support window. Complex integrations or third-party API costs are quoted separately.'],
    ['q' => 'Do you offer monthly payment plans?', 'a' => 'Yes. We structure payments into milestones (30-40% upfront, balance split across deliverables). For larger builds we offer 3-4 phased payments.'],
    ['q' => 'Can I get a refund if the project doesn\'t work out?', 'a' => 'We work in milestones. Each completed milestone is reviewed and signed off before payment is due. This protects both sides and ensures you only pay for what you approve.'],
    ['q' => 'How long does a typical project take?', 'a' => 'A website takes 2-4 weeks. An ecommerce app takes 4-8 weeks. ERP and SaaS builds range from 8-20 weeks depending on module count and integrations.'],
    ['q' => 'What if I already have a website?', 'a' => 'We can build a mobile app that connects to your existing website. The ecommerce app package is designed exactly for this — your site stays, we add the app.'],
    ['q' => 'Do you provide ongoing maintenance?', 'a' => 'Yes. After launch we offer monthly maintenance plans covering updates, monitoring, backups, security patches, and minor feature additions.'],
];

$categoryMeta = [
    'ecommerce' => ['icon' => 'shopping-cart', 'label' => 'Ecommerce Apps', 'desc' => 'Android & iOS shopping apps that connect to your existing website or run standalone.'],
    'website'   => ['icon' => 'globe',         'label' => 'Websites & Platforms', 'desc' => 'Custom websites, portals, directories, and internal platforms.'],
    'ai'        => ['icon' => 'bot',           'label' => 'AI & Automation',      'desc' => 'Chatbots, lead qualification bots, workflow automation, and AI assistants.'],
    'general'   => ['icon' => 'package',       'label' => 'Other Services',       'desc' => 'Custom development, consulting, and project-specific builds.'],
];
?>

<main id="main">
  <section class="relative isolate overflow-hidden bg-navy pt-32 text-white md:pt-40">
    <div class="orb -right-32 top-12 h-96 w-96 bg-green/20"></div>
    <div class="orb -left-32 bottom-12 h-80 w-80 bg-teal/20"></div>
    <div class="mx-auto max-w-[1240px] px-5 pb-20 md:px-8 lg:pb-28">
      <div class="mx-auto max-w-4xl text-center">
        <span class="section-label !border-green/25 !bg-white/5">Pricing</span>
        <h1 class="mt-6 text-[clamp(2.2rem,5vw,4.2rem)] font-black uppercase leading-[.96] tracking-tight">
          Clear Pricing, No <span class="text-gradient">Hidden Fees</span>
        </h1>
        <p class="mx-auto mt-6 max-w-2xl text-[17px] leading-8 text-white/72">
          Every project starts with a transparent quote. Pick a category below to see starting prices, or send us your requirements for a custom estimate.
        </p>
        <div class="mt-9 flex flex-col items-center justify-center gap-3 sm:flex-row">
          <a href="#plans" class="inline-flex items-center gap-2 rounded-full bg-green px-7 py-4 text-[15px] font-bold text-white shadow-glow transition-all duration-200 hover:bg-green-dark active:scale-[0.97]">
            View Plans
            <i data-lucide="chevron-down" class="h-5 w-5"></i>
          </a>
          <a href="#contact" class="inline-flex items-center gap-2 rounded-full border border-white/20 px-7 py-4 text-[15px] font-bold text-white transition-all duration-200 hover:bg-white/10 active:scale-[0.97]">
            Request Custom Quote
          </a>
        </div>
      </div>
    </div>
  </section>

  <section id="plans" class="bg-white">
    <div class="mx-auto max-w-[1240px] px-5 py-20 md:px-8 md:py-28">
      <?php $idx = 0; foreach ($categories as $cat => $plans): ?>
        <?php $meta = $categoryMeta[$cat] ?? ['icon' => 'package', 'label' => ucfirst($cat), 'desc' => '']; ?>
        <div class="<?= $idx > 0 ? 'mt-20 pt-20 border-t border-border' : '' ?>">
          <div class="mx-auto max-w-3xl text-center stagger-children">
            <div class="mx-auto grid h-14 w-14 place-items-center rounded-2xl bg-green/10 text-green">
              <i data-lucide="<?= e($meta['icon']) ?>" class="h-7 w-7"></i>
            </div>
            <h2 class="mt-5 text-[clamp(1.8rem,3vw,2.8rem)] font-black uppercase leading-tight"><?= e($meta['label']) ?></h2>
            <?php if ($meta['desc']): ?><p class="mt-3 text-[16px] leading-7 text-midgrey"><?= e($meta['desc']) ?></p><?php endif; ?>
          </div>
          <div class="mt-10 grid gap-5 md:grid-cols-2 lg:grid-cols-3 stagger-children">
            <?php foreach ($plans as $plan): ?>
              <article class="group relative rounded-2xl border bg-white p-8 shadow-e1 transition-all duration-300 hover:-translate-y-1 hover:shadow-e3 <?= (int) ($plan['is_popular'] ?? 0) === 1 ? 'border-green ring-2 ring-green/20' : 'border-border' ?>">
                <?php if ((int) ($plan['is_popular'] ?? 0) === 1): ?>
                  <span class="absolute -top-3 left-6 rounded-full bg-green px-4 py-1 text-[11px] font-bold uppercase tracking-[.12em] text-white">Popular</span>
                <?php endif; ?>
                <p class="text-[13px] font-bold uppercase tracking-[.12em] text-green"><?= e($plan['target_audience'] ?: '') ?></p>
                <h3 class="mt-2 text-[22px] font-black"><?= e($plan['name']) ?></h3>
                <p class="mt-3 text-[36px] font-black text-ink"><?= e($plan['price'] ?: 'Custom') ?></p>
                <?php if ($plan['price_note']): ?><p class="mt-1 text-[13px] text-midgrey"><?= e($plan['price_note']) ?></p><?php endif; ?>
                <?php if ($plan['features']): ?>
                  <ul class="mt-6 space-y-2.5">
                    <?php foreach (json_list($plan['features']) as $feature): ?>
                      <li class="flex items-start gap-3 text-[14px] text-ink/80">
                        <i data-lucide="check-circle-2" class="mt-0.5 h-4 w-4 shrink-0 text-green"></i>
                        <?= e($feature) ?>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                <?php endif; ?>
                <a href="#contact" class="mt-7 inline-flex w-full items-center justify-center gap-2 rounded-xl border px-5 py-3.5 text-[14px] font-bold transition-all duration-200 active:scale-[0.97] <?= (int) ($plan['is_popular'] ?? 0) === 1 ? 'border-green bg-green text-white shadow-glow hover:bg-green-dark' : 'border-border text-ink hover:bg-softgrey' ?>">
                  <?= $cat === 'ecommerce' ? 'Get Started' : 'Request Quote' ?>
                  <i data-lucide="arrow-right" class="h-4 w-4"></i>
                </a>
              </article>
            <?php endforeach; ?>
          </div>
        </div>
      <?php $idx++; endforeach; ?>
      <?php if (!$plans): ?>
        <div class="text-center py-16">
          <p class="text-lg text-midgrey">Pricing plans coming soon. <a href="#contact" class="text-green font-bold hover:underline">Contact us</a> for a custom quote.</p>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <section class="bg-softgrey">
    <div class="mx-auto max-w-[800px] px-5 py-20 md:px-8 md:py-28">
      <div class="text-center">
        <span class="section-label">FAQ</span>
        <h2 class="mt-5 text-[clamp(1.8rem,3vw,2.8rem)] font-black uppercase leading-tight">Frequently Asked Questions</h2>
      </div>
      <div class="mt-12 space-y-3">
        <?php foreach ($faqs as $i => $faq): ?>
          <details class="group rounded-2xl border border-border bg-white shadow-e1 transition-all duration-200 open:shadow-e2">
            <summary class="flex cursor-pointer items-center justify-between gap-4 px-6 py-5 text-[15px] font-bold leading-snug text-ink list-none transition-colors duration-200 hover:text-green">
              <?= e($faq['q']) ?>
              <i data-lucide="chevron-down" class="h-5 w-5 shrink-0 text-midgrey transition-transform duration-200 group-open:rotate-180"></i>
            </summary>
            <div class="px-6 pb-6 pt-2">
              <p class="text-[14px] leading-7 text-midgrey"><?= e($faq['a']) ?></p>
            </div>
          </details>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section id="contact" class="bg-white">
    <div class="mx-auto grid max-w-[1240px] gap-10 px-5 py-20 md:px-8 md:py-28 lg:grid-cols-[.85fr_1.15fr]">
      <div>
        <span class="section-label">Contact</span>
        <h2 class="mt-5 text-[clamp(2rem,4vw,3.2rem)] font-black uppercase leading-tight">Tell Us What You Want To Build</h2>
        <p class="mt-5 text-[16px] leading-8 text-midgrey">Send your project idea, website link, or business problem. We will map the right software path and give you a transparent estimate.</p>
        <div class="mt-8 space-y-3 text-[14px] font-semibold text-ink/75">
          <p class="flex items-center gap-3"><i data-lucide="mail" class="h-5 w-5 text-green"></i> hello@isoftro.com</p>
          <p class="flex items-center gap-3"><i data-lucide="map-pin" class="h-5 w-5 text-green"></i> Nepal, serving Nepal, India & international clients</p>
        </div>
      </div>
      <form class="rounded-[2rem] border border-border bg-softgrey p-4 shadow-e2" action="#" method="post">
        <div class="rounded-[1.5rem] bg-white p-6 md:p-8">
          <div class="grid gap-4 md:grid-cols-2">
            <label class="text-[13px] font-bold text-ink">Name<input class="input-focus mt-2 w-full rounded-xl border border-border px-4 py-3 font-normal" name="name" placeholder="Your name" /></label>
            <label class="text-[13px] font-bold text-ink">Email<input class="input-focus mt-2 w-full rounded-xl border border-border px-4 py-3 font-normal" name="email" type="email" placeholder="you@example.com" /></label>
            <label class="text-[13px] font-bold text-ink">Phone<input class="input-focus mt-2 w-full rounded-xl border border-border px-4 py-3 font-normal" name="phone" placeholder="+977..." /></label>
            <label class="text-[13px] font-bold text-ink">Service Needed<select class="input-focus mt-2 w-full rounded-xl border border-border px-4 py-3 font-normal" name="service"><option>Website Development</option><option>Ecommerce Mobile App</option><option>ERP / CRM</option><option>SaaS Product</option><option>AI Chatbot & Automation</option><option>Custom Software</option></select></label>
          </div>
          <label class="mt-4 block text-[13px] font-bold text-ink">Website URL / Company<input class="input-focus mt-2 w-full rounded-xl border border-border px-4 py-3 font-normal" name="website" placeholder="https://yourbusiness.com" /></label>
          <label class="mt-4 block text-[13px] font-bold text-ink">Project Description<textarea class="input-focus mt-2 min-h-36 w-full rounded-xl border border-border px-4 py-3 font-normal" name="description" placeholder="Tell us what you need, current problems, budget range, and timeline."></textarea></label>
          <button class="btn btn-primary mt-5 inline-flex w-full items-center justify-center gap-2 rounded-xl px-7 py-4 text-[15px] font-bold" type="submit">Send Project Inquiry <i data-lucide="arrow-right" class="h-5 w-5"></i></button>
        </div>
      </form>
    </div>
  </section>
</main>

<?php require __DIR__ . '/footer.php'; ?>
