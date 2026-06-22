<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Services — iSoftro Solutions';
$pageDescription = 'Full-stack software services: websites, mobile apps, ERP/CRM, SaaS, AI chatbots, payment integrations, UI/UX design, and ongoing maintenance.';
require __DIR__ . '/header.php';

$services = [
    [
        'icon' => 'globe',
        'title' => 'Website Development',
        'desc' => 'Fast, conversion-focused websites for service businesses, ecommerce brands, product launches, and growing companies.',
        'link' => 'website-development.html',
        'features' => ['Responsive design', 'SEO foundation', 'Contact & lead flows', 'CMS or static'],
    ],
    [
        'icon' => 'smartphone',
        'title' => 'Custom Web Applications',
        'desc' => 'Pair your existing website with a custom mobile app — or build a web application from scratch with modern architecture.',
        'link' => 'custom-web-applications.html',
        'features' => ['React / Vue frontend', 'REST / GraphQL APIs', 'Auth & roles', 'Dashboard UIs'],
    ],
    [
        'icon' => 'layout-dashboard',
        'title' => 'ERP & CRM Development',
        'desc' => 'Business management systems with inventory, HR, accounting, sales pipelines, reports, and role-based dashboards.',
        'link' => 'erp-crm-development.html',
        'features' => ['Modules: inventory, sales, HR', 'Role-based access', 'Real-time reports', 'Multi-branch support'],
    ],
    [
        'icon' => 'cloud',
        'title' => 'SaaS Product Development',
        'desc' => 'From concept to launch: multi-tenant SaaS platforms with subscription billing, analytics, and scalable cloud infrastructure.',
        'link' => 'saas-product-development.html',
        'features' => ['Multi-tenant architecture', 'Subscription billing', 'Usage analytics', 'Scalable infra'],
    ],
    [
        'icon' => 'bot',
        'title' => 'AI Chatbots & Automation',
        'desc' => 'Support bots, lead qualification, email assistants, AI content tools, and workflow automation for repetitive tasks.',
        'link' => 'ai-chatbots-automation.html',
        'features' => ['FAQ & support bots', 'Lead qualification', 'Email automation', 'Workflow triggers'],
    ],
    [
        'icon' => 'credit-card',
        'title' => 'Payment Integrations',
        'desc' => 'Connect your platform to payment gateways, mobile wallets, bank integrations, and recurring billing systems for Nepal and international markets.',
        'link' => 'payment-integrations.html',
        'features' => ['eSewa, Khalti, ConnectIPS', 'Stripe / Razorpay', 'Recurring billing', 'Invoice generation'],
    ],
    [
        'icon' => 'palette',
        'title' => 'UI/UX & Product Design',
        'desc' => 'End-to-end product design: wireframes, high-fidelity prototypes, design systems, and user research for web and mobile products.',
        'link' => 'ui-ux-product-design.html',
        'features' => ['Wireframes & prototypes', 'Design systems', 'User research', 'Mobile-first UX'],
    ],
    [
        'icon' => 'wrench',
        'title' => 'Maintenance & Support',
        'desc' => 'Post-launch support: bug fixes, feature updates, performance monitoring, security patches, and uptime tracking.',
        'link' => 'maintenance-support.html',
        'features' => ['Bug fixes & patches', 'Performance monitoring', 'Security updates', 'Priority support'],
    ],
];
?>

<main id="main">
  <section class="relative isolate overflow-hidden bg-navy pt-32 text-white md:pt-40">
    <div class="orb -right-32 top-12 h-96 w-96 bg-green/20"></div>
    <div class="orb -left-32 bottom-12 h-80 w-80 bg-teal/20"></div>
    <div class="mx-auto max-w-[1240px] px-5 pb-20 md:px-8 lg:pb-28">
      <div class="mx-auto max-w-4xl text-center">
        <span class="section-label !border-green/25 !bg-white/5">Services</span>
        <h1 class="mt-6 text-[clamp(2.2rem,5vw,4.2rem)] font-black uppercase leading-[.96] tracking-tight">
          What We <span class="text-gradient">Build</span>
        </h1>
        <p class="mx-auto mt-6 max-w-2xl text-[17px] leading-8 text-white/72">
          From marketing sites to AI-powered platforms — every service is designed to ship fast, scale clean, and solve real business problems.
        </p>
      </div>
    </div>
  </section>

  <section class="bg-white">
    <div class="mx-auto max-w-[1240px] px-5 py-20 md:px-8 md:py-28">
      <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($services as $s): ?>
          <a href="<?= e($s['link']) ?>" class="group rounded-2xl border border-border bg-white p-8 shadow-e1 transition-all duration-300 hover:-translate-y-1 hover:shadow-e3 active:scale-[0.98]">
            <span class="icon-box">
              <i data-lucide="<?= e($s['icon']) ?>" class="h-5 w-5"></i>
            </span>
            <h3 class="mt-5 text-[19px] font-black"><?= e($s['title']) ?></h3>
            <p class="mt-2 text-[14px] leading-7 text-midgrey"><?= e($s['desc']) ?></p>
            <ul class="mt-4 space-y-1.5">
              <?php foreach ($s['features'] as $f): ?>
                <li class="flex items-center gap-2 text-[13px] text-midgrey">
                  <i data-lucide="check" class="h-3.5 w-3.5 text-green"></i>
                  <?= e($f) ?>
                </li>
              <?php endforeach; ?>
            </ul>
            <span class="mt-5 inline-flex items-center gap-1.5 text-[13px] font-bold text-green transition-all duration-200 group-hover:gap-2.5">
              Learn more
              <i data-lucide="arrow-right" class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-0.5"></i>
            </span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="bg-softgrey">
    <div class="mx-auto max-w-[1240px] px-5 py-20 text-center md:px-8 md:py-28">
      <span class="section-label">Contact</span>
      <h2 class="mt-5 text-[clamp(1.8rem,3vw,2.8rem)] font-black uppercase leading-tight">Not Sure Which Service You Need?</h2>
      <p class="mx-auto mt-4 max-w-xl text-[16px] leading-7 text-midgrey">Send us your project idea and we will recommend the right approach — no commitment, just honest advice.</p>
      <a href="index.php#contact" class="btn btn-primary mt-8 inline-flex items-center gap-2 rounded-xl px-7 py-4 text-[15px] font-bold">Get Advice <i data-lucide="arrow-right" class="h-5 w-5"></i></a>
    </div>
  </section>
</main>

<?php $footerLinks = [["url"=>"index.php","label"=>"Home"],["url"=>"services.php","label"=>"Services"],["url"=>"expertise.php","label"=>"Expertise"],["url"=>"pricing.php","label"=>"Pricing"]]; require __DIR__ . "/footer.php"; ?>
