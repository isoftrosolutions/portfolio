<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Expertise — iSoftro Solutions';
$pageDescription = 'Industry expertise: ecommerce, education, finance & cooperatives, AI & automation. We build software for real business workflows.';
require __DIR__ . '/header.php';

$expertise = [
    [
        'icon' => 'shopping-cart',
        'title' => 'Ecommerce',
        'desc' => 'Stores, mobile apps, product catalogs, checkout systems, payment gateways, order management, inventory, and customer retention tools.',
        'slug' => 'ecommerce',
        'highlights' => [
            ['label' => 'Shopping Apps', 'desc' => 'Android & iOS apps synced with existing websites or built from scratch.'],
            ['label' => 'Product Catalogs', 'desc' => 'Multi-category listings with search, filter, variants, and bulk import.'],
            ['label' => 'Checkout & Payments', 'desc' => 'Integrated payment gateways, COD, wallets, and recurring billing.'],
            ['label' => 'Order Management', 'desc' => 'Admin dashboards for orders, invoices, returns, and fulfillment tracking.'],
        ],
    ],
    [
        'icon' => 'graduation-cap',
        'title' => 'Education',
        'desc' => 'School management systems, library tools, student portals, attendance tracking, gradebooks, and institutional dashboards.',
        'slug' => 'education',
        'highlights' => [
            ['label' => 'Student Portals', 'desc' => 'Profiles, attendance, grades, timetable, and parent communication.'],
            ['label' => 'Library Systems', 'desc' => 'Catalog, borrow/return, reservations, fines, and member management.'],
            ['label' => 'Institutional Dashboards', 'desc' => 'Reports on enrollment, performance, fees, and staff management.'],
            ['label' => 'Online Learning', 'desc' => 'Course management, assignments, submissions, and progress tracking.'],
        ],
    ],
    [
        'icon' => 'building-2',
        'title' => 'Finance & Cooperatives',
        'desc' => 'Member management, accounting workflows, loan tracking, savings, reports, and secure multi-role access for financial institutions.',
        'slug' => 'finance-cooperatives',
        'highlights' => [
            ['label' => 'Member Management', 'desc' => 'Registration, KYC, shares, savings, and loan lifecycle.'],
            ['label' => 'Accounting', 'desc' => 'Ledgers, vouchers, journal entries, trial balance, and financial statements.'],
            ['label' => 'Loan Management', 'desc' => 'Application, approval, disbursement, repayment schedule, and interest calc.'],
            ['label' => 'Reports & Compliance', 'desc' => 'Regulatory reports, audit trails, and role-based access control.'],
        ],
    ],
    [
        'icon' => 'sparkles',
        'title' => 'AI & Automation',
        'desc' => 'Support bots, lead qualification, email assistants, content generation, data insights, and automated business operations.',
        'slug' => 'ai-automation',
        'highlights' => [
            ['label' => 'Support Bots', 'desc' => 'FAQ automation, ticket triage, and human handoff when needed.'],
            ['label' => 'Lead Qualification', 'desc' => 'Incoming lead scoring, auto-reply, CRM enrichment, and routing.'],
            ['label' => 'Content Generation', 'desc' => 'AI-powered copywriting, description generation, and multilingual support.'],
            ['label' => 'Workflow Automation', 'desc' => 'Scheduled tasks, data syncing, notifications, and approval chains.'],
        ],
    ],
];
?>

<main id="main">
  <section class="relative isolate overflow-hidden bg-navy pt-32 text-white md:pt-40">
    <div class="orb -right-32 top-12 h-96 w-96 bg-green/20"></div>
    <div class="orb -left-32 bottom-12 h-80 w-80 bg-teal/20"></div>
    <div class="mx-auto max-w-[1240px] px-5 pb-20 md:px-8 lg:pb-28">
      <div class="mx-auto max-w-4xl text-center">
        <span class="section-label !border-green/25 !bg-white/5">Expertise</span>
        <h1 class="mt-6 text-[clamp(2.2rem,5vw,4.2rem)] font-black uppercase leading-[.96] tracking-tight">
          Built For Real <span class="text-gradient">Business Workflows</span>
        </h1>
        <p class="mx-auto mt-6 max-w-2xl text-[17px] leading-8 text-white/72">
          We understand the messy parts: roles, reports, data, payments, customer journeys, support, admin panels, and integrations — across the industries that matter.
        </p>
      </div>
    </div>
  </section>

  <?php foreach ($expertise as $i => $area): ?>
    <section class="<?= $i % 2 === 0 ? 'bg-white' : 'bg-softgrey' ?>" id="<?= e($area['slug']) ?>">
      <div class="mx-auto max-w-[1240px] px-5 py-20 md:px-8 md:py-28">
        <div class="grid gap-10 lg:grid-cols-[.9fr_1.1fr]">
          <div>
            <span class="grid h-14 w-14 place-items-center rounded-2xl bg-green/10 text-green">
              <i data-lucide="<?= e($area['icon']) ?>" class="h-7 w-7"></i>
            </span>
            <h2 class="mt-5 text-[clamp(1.8rem,3vw,2.8rem)] font-black uppercase leading-tight"><?= e($area['title']) ?></h2>
            <p class="mt-4 text-[16px] leading-7 text-midgrey"><?= e($area['desc']) ?></p>
            <a href="index.php#contact" class="mt-6 inline-flex items-center gap-2 rounded-xl border border-border px-5 py-3 text-[14px] font-bold text-ink transition-all duration-200 hover:bg-softgrey active:scale-[0.97]">
              Discuss a Project
              <i data-lucide="arrow-right" class="h-4 w-4"></i>
            </a>
          </div>
          <div class="grid gap-4 sm:grid-cols-2">
            <?php foreach ($area['highlights'] as $h): ?>
              <div class="rounded-2xl border border-border bg-white p-6 shadow-e1 transition-all duration-200 hover:-translate-y-0.5 hover:shadow-e2">
                <h3 class="text-[17px] font-black"><?= e($h['label']) ?></h3>
                <p class="mt-2 text-[13px] leading-6 text-midgrey"><?= e($h['desc']) ?></p>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>
  <?php endforeach; ?>

  <section class="bg-navy text-white">
    <div class="mx-auto max-w-[1240px] px-5 py-20 text-center md:px-8 md:py-28">
      <span class="section-label !border-green/25 !bg-white/5">Contact</span>
      <h2 class="mt-5 text-[clamp(1.8rem,3vw,2.8rem)] font-black uppercase leading-tight">Have a Project In Mind?</h2>
      <p class="mx-auto mt-4 max-w-xl text-[16px] leading-7 text-white/65">Tell us about your industry, current workflow, and what you want to improve. We will map the right solution.</p>
      <a href="index.php#contact" class="btn btn-primary mt-8 inline-flex items-center gap-2 rounded-xl px-7 py-4 text-[15px] font-bold">Start a Conversation <i data-lucide="arrow-right" class="h-5 w-5"></i></a>
    </div>
  </section>
</main>

<?php $footerLinks = [["url"=>"index.php","label"=>"Home"],["url"=>"services.php","label"=>"Services"],["url"=>"expertise.php","label"=>"Expertise"],["url"=>"pricing.php","label"=>"Pricing"]]; require __DIR__ . "/footer.php"; ?>
