<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/functions.php';
$brands = cms_all('brands', 'sort_order ASC, id DESC', 'is_published = 1');
?><?php require __DIR__ . '/header.php'; ?>

  <main id="main">
    <section class="hero-grid relative isolate overflow-hidden bg-navy pt-32 text-white md:pt-40">
      <div class="orb -right-32 top-12 h-96 w-96 bg-green/20"></div>
      <div class="orb -left-32 bottom-12 h-80 w-80 bg-teal/20"></div>
      <div class="mx-auto grid max-w-[1240px] items-center gap-14 px-5 pb-20 md:px-8 lg:grid-cols-[1.04fr_.96fr] lg:pb-28">
        <div>
          <div class="inline-flex items-center gap-2 rounded-full border border-green/30 bg-white/5 px-4 py-2 text-[11px] font-bold uppercase tracking-[.14em] text-green">
            <span class="h-2 w-2 rounded-full bg-green"></span>
            Software Agency + Product Studio
          </div>
          <h1 class="mt-6 max-w-3xl text-[clamp(2.55rem,6vw,5.35rem)] font-black uppercase leading-[.96] tracking-tight">
            Build, Launch & Scale <span class="text-gradient block">Digital Products.</span>
          </h1>
          <p class="mt-6 max-w-2xl text-[17px] leading-8 text-white/72 md:text-[19px]">
            iSoftro Solutions builds modern websites, ecommerce apps, ERP systems, SaaS platforms, AI chatbots, automation tools, and custom software for businesses in Nepal and beyond.
          </p>
          <div class="mt-9 flex flex-col gap-3 sm:flex-row">
            <a href="#contact" class="inline-flex items-center justify-center gap-2 rounded-full bg-green px-7 py-4 text-[15px] font-bold text-white shadow-glow transition hover:bg-green-dark">
              Start a Project
              <i data-lucide="arrow-right" class="h-5 w-5"></i>
            </a>
            <a href="#brands" class="inline-flex items-center justify-center gap-2 rounded-full border border-white/20 px-7 py-4 text-[15px] font-bold text-white transition hover:bg-white/10">
              View Our Work
            </a>
            <a href="ecommerce-app.php" class="inline-flex items-center justify-center gap-2 rounded-full border border-green/40 px-7 py-4 text-[15px] font-bold text-green transition hover:bg-green/10">
              Ecommerce App Offer
            </a>
          </div>
          <div class="mt-8 flex flex-wrap gap-x-6 gap-y-3 text-[13px] font-medium text-white/70">
            <span class="inline-flex items-center gap-2"><i data-lucide="check-circle-2" class="h-4 w-4 text-green"></i> 10+ projects delivered</span>
            <span class="inline-flex items-center gap-2"><i data-lucide="check-circle-2" class="h-4 w-4 text-green"></i> Web + Mobile + AI expertise</span>
            <span class="inline-flex items-center gap-2"><i data-lucide="check-circle-2" class="h-4 w-4 text-green"></i> Long-term support</span>
          </div>
        </div>

        <div class="relative">
          <div class="rounded-[2rem] border border-white/12 bg-white/8 p-4 shadow-e4 backdrop-blur">
            <div class="rounded-[1.5rem] bg-white p-4 text-ink shadow-e3">
              <div class="flex items-center justify-between border-b border-bordergrey pb-4">
                <div>
                  <p class="text-[12px] font-bold uppercase tracking-[.12em] text-green">iSoftro Studio OS</p>
                  <h2 class="mt-1 text-[22px] font-black">Project Command Center</h2>
                </div>
                <span class="rounded-full bg-green/10 px-3 py-1 text-[12px] font-bold text-green">Live</span>
              </div>
              <div class="mt-5 grid gap-3 sm:grid-cols-2">
                <div class="rounded-2xl bg-softgrey p-4">
                  <i data-lucide="layout-dashboard" class="h-6 w-6 text-green"></i>
                  <p class="mt-4 text-[24px] font-black">ERP</p>
                  <p class="text-[12px] leading-5 text-midgrey">Business operations, reports, roles, inventory.</p>
                </div>
                <div class="rounded-2xl bg-softgrey p-4">
                  <i data-lucide="shopping-bag" class="h-6 w-6 text-green"></i>
                  <p class="mt-4 text-[24px] font-black">Apps</p>
                  <p class="text-[12px] leading-5 text-midgrey">Android/iOS ecommerce and service apps.</p>
                </div>
                <div class="rounded-2xl bg-navy p-4 text-white">
                  <i data-lucide="sparkles" class="h-6 w-6 text-green"></i>
                  <p class="mt-4 text-[24px] font-black">AI</p>
                  <p class="text-[12px] leading-5 text-white/65">Chatbots, lead qualification, email assistants.</p>
                </div>
                <div class="rounded-2xl bg-softgrey p-4">
                  <i data-lucide="rocket" class="h-6 w-6 text-green"></i>
                  <p class="mt-4 text-[24px] font-black">SaaS</p>
                  <p class="text-[12px] leading-5 text-midgrey">Custom products with dashboards and billing.</p>
                </div>
              </div>
              <div class="mt-4 rounded-2xl border border-green/20 bg-green/5 p-4">
                <div class="flex items-center justify-between gap-4">
                  <div>
                    <p class="text-[12px] font-bold uppercase tracking-[.12em] text-green">Anchor Offer</p>
                    <p class="mt-1 text-[16px] font-black">Website to mobile app</p>
                  </div>
                  <p class="text-right text-[22px] font-black text-green">Rs. 60,000+</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="border-b border-bordergrey bg-white">
      <div class="mx-auto grid max-w-[1240px] grid-cols-2 gap-px px-5 py-10 md:grid-cols-4 md:px-8">
        <div class="p-5 text-center">
          <p class="text-[32px] font-black text-green">10+</p>
          <p class="mt-1 text-[13px] font-semibold text-midgrey">Projects Delivered</p>
        </div>
        <div class="p-5 text-center">
          <p class="text-[32px] font-black text-green">5+</p>
          <p class="mt-1 text-[13px] font-semibold text-midgrey">Industries Served</p>
        </div>
        <div class="p-5 text-center">
          <p class="text-[32px] font-black text-green">2-6</p>
          <p class="mt-1 text-[13px] font-semibold text-midgrey">Week App Launches</p>
        </div>
        <div class="p-5 text-center">
          <p class="text-[32px] font-black text-green">360</p>
          <p class="mt-1 text-[13px] font-semibold text-midgrey">Build + Support</p>
        </div>
      </div>
    </section>

    <section id="services" class="bg-softgrey">
      <div class="mx-auto max-w-[1240px] px-5 py-20 md:px-8 md:py-28">
        <div class="mx-auto max-w-3xl text-center">
          <span class="section-label">Services</span>
          <h2 class="mt-5 text-[clamp(2rem,4vw,3.2rem)] font-black uppercase leading-tight">Everything Needed To Build A Serious Digital Business</h2>
          <p class="mt-4 text-[16px] leading-7 text-midgrey">One team for strategy, design, development, launch, automation, and long-term product support.</p>
        </div>
        <div class="mt-12 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
          <a href="website-development.html" class="service-card rounded-2xl border border-bordergrey bg-white p-7 shadow-e1 block transition hover:-translate-y-1 hover:shadow-e3">
            <span class="icon-box"><i data-lucide="globe-2" class="h-6 w-6"></i></span>
            <h3 class="mt-5 text-[19px] font-black">Website Development</h3>
            <p class="mt-2 text-[14px] leading-6 text-midgrey">Fast, premium websites for brands, services, ecommerce, and product launches.</p>
            <span class="mt-4 inline-flex items-center gap-1 text-[13px] font-bold text-green">Learn more <i data-lucide="arrow-right" class="h-4 w-4"></i></span>
          </a>
          <article class="service-card rounded-2xl border border-green/30 bg-white p-7 shadow-e2">
            <span class="icon-box"><i data-lucide="smartphone" class="h-6 w-6"></i></span>
            <h3 class="mt-5 text-[19px] font-black">Ecommerce Mobile Apps</h3>
            <p class="mt-2 text-[14px] leading-6 text-midgrey">Turn an existing ecommerce website into Android/iOS apps with push, checkout, payments, and publishing.</p>
            <a href="ecommerce-app.php" class="mt-5 inline-flex items-center gap-2 text-[14px] font-bold text-green">View package <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
          </article>
          <a href="custom-web-applications.html" class="service-card rounded-2xl border border-bordergrey bg-white p-7 shadow-e1 block transition hover:-translate-y-1 hover:shadow-e3">
            <span class="icon-box"><i data-lucide="blocks" class="h-6 w-6"></i></span>
            <h3 class="mt-5 text-[19px] font-black">Custom Web Applications</h3>
            <p class="mt-2 text-[14px] leading-6 text-midgrey">Business portals, dashboards, booking systems, internal tools, and workflow software.</p>
            <span class="mt-4 inline-flex items-center gap-1 text-[13px] font-bold text-green">Learn more <i data-lucide="arrow-right" class="h-4 w-4"></i></span>
          </a>
          <a href="erp-crm-development.html" class="service-card rounded-2xl border border-bordergrey bg-white p-7 shadow-e1 block transition hover:-translate-y-1 hover:shadow-e3">
            <span class="icon-box"><i data-lucide="database" class="h-6 w-6"></i></span>
            <h3 class="mt-5 text-[19px] font-black">ERP / CRM Development</h3>
            <p class="mt-2 text-[14px] leading-6 text-midgrey">Inventory, accounts, leads, HR, reports, roles, permissions, and operational dashboards.</p>
            <span class="mt-4 inline-flex items-center gap-1 text-[13px] font-bold text-green">Learn more <i data-lucide="arrow-right" class="h-4 w-4"></i></span>
          </a>
          <a href="saas-product-development.html" class="service-card rounded-2xl border border-bordergrey bg-white p-7 shadow-e1 block transition hover:-translate-y-1 hover:shadow-e3">
            <span class="icon-box"><i data-lucide="cloud-cog" class="h-6 w-6"></i></span>
            <h3 class="mt-5 text-[19px] font-black">SaaS Product Development</h3>
            <p class="mt-2 text-[14px] leading-6 text-midgrey">Multi-tenant SaaS platforms with onboarding, subscriptions, admin panels, and analytics.</p>
            <span class="mt-4 inline-flex items-center gap-1 text-[13px] font-bold text-green">Learn more <i data-lucide="arrow-right" class="h-4 w-4"></i></span>
          </a>
          <a href="ai-chatbots-automation.html" class="service-card rounded-2xl border border-bordergrey bg-white p-7 shadow-e1 block transition hover:-translate-y-1 hover:shadow-e3">
            <span class="icon-box"><i data-lucide="bot" class="h-6 w-6"></i></span>
            <h3 class="mt-5 text-[19px] font-black">AI Chatbots & Automation</h3>
            <p class="mt-2 text-[14px] leading-6 text-midgrey">Customer support, lead qualification, ecommerce assistants, FAQ bots, and business automation.</p>
            <span class="mt-4 inline-flex items-center gap-1 text-[13px] font-bold text-green">Learn more <i data-lucide="arrow-right" class="h-4 w-4"></i></span>
          </a>
          <a href="payment-integrations.html" class="service-card rounded-2xl border border-bordergrey bg-white p-7 shadow-e1 block transition hover:-translate-y-1 hover:shadow-e3">
            <span class="icon-box"><i data-lucide="credit-card" class="h-6 w-6"></i></span>
            <h3 class="mt-5 text-[19px] font-black">Payment Integrations</h3>
            <p class="mt-2 text-[14px] leading-6 text-midgrey">eSewa, Khalti, cards, wallets, order tracking, invoices, and secure transaction flows.</p>
            <span class="mt-4 inline-flex items-center gap-1 text-[13px] font-bold text-green">Learn more <i data-lucide="arrow-right" class="h-4 w-4"></i></span>
          </a>
          <a href="ui-ux-product-design.html" class="service-card rounded-2xl border border-bordergrey bg-white p-7 shadow-e1 block transition hover:-translate-y-1 hover:shadow-e3">
            <span class="icon-box"><i data-lucide="pen-tool" class="h-6 w-6"></i></span>
            <h3 class="mt-5 text-[19px] font-black">UI/UX & Product Design</h3>
            <p class="mt-2 text-[14px] leading-6 text-midgrey">Product planning, wireframes, high-fidelity interfaces, dashboards, and conversion flows.</p>
            <span class="mt-4 inline-flex items-center gap-1 text-[13px] font-bold text-green">Learn more <i data-lucide="arrow-right" class="h-4 w-4"></i></span>
          </a>
          <a href="maintenance-support.html" class="service-card rounded-2xl border border-bordergrey bg-white p-7 shadow-e1 block transition hover:-translate-y-1 hover:shadow-e3">
            <span class="icon-box"><i data-lucide="life-buoy" class="h-6 w-6"></i></span>
            <h3 class="mt-5 text-[19px] font-black">Maintenance & Support</h3>
            <p class="mt-2 text-[14px] leading-6 text-midgrey">Hosting help, bug fixes, upgrades, monitoring, backups, and ongoing product improvements.</p>
            <span class="mt-4 inline-flex items-center gap-1 text-[13px] font-bold text-green">Learn more <i data-lucide="arrow-right" class="h-4 w-4"></i></span>
          </a>
        </div>
      </div>
    </section>

    <section class="relative overflow-hidden bg-white">
      <div class="orb -right-32 top-20 h-80 w-80 bg-green/10"></div>
      <div class="mx-auto grid max-w-[1240px] items-center gap-12 px-5 py-20 md:px-8 md:py-28 lg:grid-cols-[.92fr_1.08fr]">
        <div>
          <span class="section-label">Featured Offer</span>
          <h2 class="mt-5 text-[clamp(2rem,4vw,3.25rem)] font-black uppercase leading-tight">Already Have An Ecommerce Website? Turn It Into A Mobile App.</h2>
          <p class="mt-5 text-[16px] leading-8 text-midgrey">This gets its own focused landing page because it is the strongest conversion offer: Android/iOS app, push notifications, faster checkout, payment gateway, order tracking, and app publishing support.</p>
          <div class="mt-7 flex flex-col gap-3 sm:flex-row">
            <a href="ecommerce-app.php" class="inline-flex items-center justify-center gap-2 rounded-full bg-green px-7 py-4 text-[15px] font-bold text-white shadow-glow transition hover:bg-green-dark">
              Open Ecommerce App Page
              <i data-lucide="arrow-right" class="h-5 w-5"></i>
            </a>
            <a href="#contact" class="inline-flex items-center justify-center rounded-full border border-bordergrey px-7 py-4 text-[15px] font-bold text-ink transition hover:bg-softgrey">Send Website Link</a>
          </div>
        </div>
        <div class="rounded-[2rem] border border-bordergrey bg-softgrey p-4 shadow-e2">
          <div class="grid gap-4 md:grid-cols-2">
            <div class="rounded-2xl bg-white p-6">
              <p class="text-[12px] font-bold uppercase tracking-[.12em] text-midgrey">Website Only</p>
              <ul class="mt-5 space-y-3 text-[14px] text-midgrey">
                <li class="flex gap-2"><i data-lucide="x-circle" class="h-5 w-5 shrink-0 text-red-500"></i> No push notifications</li>
                <li class="flex gap-2"><i data-lucide="x-circle" class="h-5 w-5 shrink-0 text-red-500"></i> Slower mobile checkout</li>
                <li class="flex gap-2"><i data-lucide="x-circle" class="h-5 w-5 shrink-0 text-red-500"></i> Lower repeat customers</li>
                <li class="flex gap-2"><i data-lucide="x-circle" class="h-5 w-5 shrink-0 text-red-500"></i> Browser-dependent shopping</li>
              </ul>
            </div>
            <div class="rounded-2xl bg-navy p-6 text-white">
              <p class="text-[12px] font-bold uppercase tracking-[.12em] text-green">Mobile App</p>
              <ul class="mt-5 space-y-3 text-[14px] text-white/78">
                <li class="flex gap-2"><i data-lucide="check-circle-2" class="h-5 w-5 shrink-0 text-green"></i> Android/iOS app</li>
                <li class="flex gap-2"><i data-lucide="check-circle-2" class="h-5 w-5 shrink-0 text-green"></i> Push notifications</li>
                <li class="flex gap-2"><i data-lucide="check-circle-2" class="h-5 w-5 shrink-0 text-green"></i> Faster checkout</li>
                <li class="flex gap-2"><i data-lucide="check-circle-2" class="h-5 w-5 shrink-0 text-green"></i> Better retention</li>
              </ul>
              <div class="mt-6 rounded-2xl border border-green/30 bg-white/5 p-5">
                <p class="text-[12px] font-bold uppercase tracking-[.12em] text-white/60">Starting at</p>
                <p class="mt-1 text-[34px] font-black text-green">Rs. 60,000</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="expertise" class="bg-navy text-white">
      <div class="mx-auto max-w-[1240px] px-5 py-20 md:px-8 md:py-28">
        <div class="grid gap-12 lg:grid-cols-[.8fr_1.2fr]">
          <div>
            <span class="section-label bg-white/5">Expertise</span>
            <h2 class="mt-5 text-[clamp(2rem,4vw,3.2rem)] font-black uppercase leading-tight">Built For Real Business Workflows</h2>
            <p class="mt-5 text-[16px] leading-8 text-white/65">We understand the messy parts: roles, reports, data, payments, customer journeys, support, admin panels, and integrations.</p>
          </div>
          <div class="grid gap-4 sm:grid-cols-2">
            <div class="rounded-2xl border border-white/10 bg-white/5 p-6">
              <i data-lucide="shopping-cart" class="h-7 w-7 text-green"></i>
              <h3 class="mt-4 text-[18px] font-black">Ecommerce</h3>
              <p class="mt-2 text-[14px] leading-6 text-white/62">Stores, apps, product catalogs, checkout, payments, orders, and retention.</p>
            </div>
            <div class="rounded-2xl border border-white/10 bg-white/5 p-6">
              <i data-lucide="graduation-cap" class="h-7 w-7 text-green"></i>
              <h3 class="mt-4 text-[18px] font-black">Education</h3>
              <p class="mt-2 text-[14px] leading-6 text-white/62">School systems, library tools, student portals, and institutional dashboards.</p>
            </div>
            <div class="rounded-2xl border border-white/10 bg-white/5 p-6">
              <i data-lucide="building-2" class="h-7 w-7 text-green"></i>
              <h3 class="mt-4 text-[18px] font-black">Finance & Cooperatives</h3>
              <p class="mt-2 text-[14px] leading-6 text-white/62">Member management, accounting workflows, reports, and secure access.</p>
            </div>
            <div class="rounded-2xl border border-white/10 bg-white/5 p-6">
              <i data-lucide="sparkles" class="h-7 w-7 text-green"></i>
              <h3 class="mt-4 text-[18px] font-black">AI + Automation</h3>
              <p class="mt-2 text-[14px] leading-6 text-white/62">Support bots, lead qualification, email assistants, insights, and automated operations.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="brands" class="brand-marquee bg-white">
      <div class="mx-auto max-w-[1240px] px-5 py-16 md:px-8">
        <div class="text-center">
          <span class="section-label">Trusted By</span>
          <h2 class="mt-4 text-[clamp(1.5rem,3vw,2rem)] font-black uppercase tracking-tight">Brands & Businesses We Work With</h2>
        </div>
        <?php if (!empty($brands)): ?>
        <div class="brand-marquee-track-wrap mt-10">
          <div class="brand-marquee-track">
            <?php foreach ($brands as $brand): ?>
            <div class="brand-tile">
              <?php if (!empty($brand['logo_url'])): ?>
              <img src="<?= e($brand['logo_url']) ?>" alt="<?= e($brand['name']) ?>" loading="lazy" />
              <?php else: ?>
              <span class="text-sm font-black text-midgrey"><?= e($brand['name']) ?></span>
              <?php endif; ?>
            </div>
            <?php endforeach; ?>
            <?php foreach ($brands as $brand): ?>
            <div class="brand-tile">
              <?php if (!empty($brand['logo_url'])): ?>
              <img src="<?= e($brand['logo_url']) ?>" alt="<?= e($brand['name']) ?>" loading="lazy" />
              <?php else: ?>
              <span class="text-sm font-black text-midgrey"><?= e($brand['name']) ?></span>
              <?php endif; ?>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <?php else: ?>
        <div class="mt-10 grid gap-5 md:grid-cols-2 lg:grid-cols-4">
          <?php foreach (['Easy Shopping ARS', 'Divya Jyotish', 'Ekta Cooperative', 'Nepal ERP'] as $fallback): ?>
          <div class="rounded-2xl border border-bordergrey bg-softgrey p-6 text-center">
            <p class="text-lg font-black text-midgrey"><?= e($fallback) ?></p>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>
    </section>


    <section class="bg-white">
      <div class="mx-auto max-w-[1240px] px-5 py-20 md:px-8 md:py-28">
        <div class="mx-auto max-w-3xl text-center">
          <span class="section-label">Process</span>
          <h2 class="mt-5 text-[clamp(2rem,4vw,3.2rem)] font-black uppercase leading-tight">From Idea To Launch, Without Guesswork</h2>
        </div>
        <div class="mt-12 grid gap-4 md:grid-cols-4">
          <div class="rounded-2xl border border-bordergrey bg-white p-6 shadow-e1"><p class="text-[28px] font-black text-green">01</p><h3 class="mt-3 font-black">Discovery</h3><p class="mt-2 text-[14px] leading-6 text-midgrey">Goals, audience, workflows, scope, timeline.</p></div>
          <div class="rounded-2xl border border-bordergrey bg-white p-6 shadow-e1"><p class="text-[28px] font-black text-green">02</p><h3 class="mt-3 font-black">Design & Plan</h3><p class="mt-2 text-[14px] leading-6 text-midgrey">UX, data model, architecture, screens.</p></div>
          <div class="rounded-2xl border border-bordergrey bg-white p-6 shadow-e1"><p class="text-[28px] font-black text-green">03</p><h3 class="mt-3 font-black">Build & Test</h3><p class="mt-2 text-[14px] leading-6 text-midgrey">Development, integrations, QA, security.</p></div>
          <div class="rounded-2xl border border-bordergrey bg-navy p-6 text-white shadow-e2"><p class="text-[28px] font-black text-green">04</p><h3 class="mt-3 font-black">Launch & Scale</h3><p class="mt-2 text-[14px] leading-6 text-white/65">Deploy, support, measure, improve.</p></div>
        </div>
      </div>
    </section>

    <section id="pricing" class="bg-softgrey">
      <div class="mx-auto max-w-[1240px] px-5 py-20 md:px-8 md:py-28">
        <div class="mx-auto max-w-3xl text-center">
          <span class="section-label">Pricing</span>
          <h2 class="mt-5 text-[clamp(2rem,4vw,3.2rem)] font-black uppercase leading-tight">Clear Starting Points, Custom Scope Where Needed</h2>
        </div>
        <div class="mt-12 grid gap-5 lg:grid-cols-3">
          <article class="price-card rounded-2xl border border-green/30 bg-white p-8 shadow-e2">
            <p class="text-[13px] font-bold uppercase tracking-[.12em] text-green">Anchor Offer</p>
            <h3 class="mt-3 text-[22px] font-black">Ecommerce App</h3>
            <p class="mt-3 text-[36px] font-black text-green">Rs. 60,000+</p>
            <p class="mt-2 text-[14px] text-midgrey">Android app starter for existing ecommerce websites.</p>
            <a href="ecommerce-app.php" class="mt-7 inline-flex w-full justify-center rounded-full bg-green px-6 py-3.5 text-[14px] font-bold text-white shadow-glow">View Package</a>
          </article>
          <article class="price-card rounded-2xl border border-bordergrey bg-white p-8 shadow-e1">
            <p class="text-[13px] font-bold uppercase tracking-[.12em] text-midgrey">Business Software</p>
            <h3 class="mt-3 text-[22px] font-black">Website / ERP / SaaS</h3>
            <p class="mt-3 text-[36px] font-black text-ink">Custom</p>
            <p class="mt-2 text-[14px] text-midgrey">Scoped by modules, integrations, users, reports, and launch timeline.</p>
            <a href="#contact" class="mt-7 inline-flex w-full justify-center rounded-full border border-bordergrey px-6 py-3.5 text-[14px] font-bold text-ink hover:bg-softgrey">Request Quote</a>
          </article>
          <article class="price-card rounded-2xl border border-bordergrey bg-navy p-8 text-white shadow-e2">
            <p class="text-[13px] font-bold uppercase tracking-[.12em] text-green">AI + Support</p>
            <h3 class="mt-3 text-[22px] font-black">Automation & Maintenance</h3>
            <p class="mt-3 text-[36px] font-black text-white">Monthly</p>
            <p class="mt-2 text-[14px] text-white/65">For support bots, lead workflows, updates, monitoring, and product improvements.</p>
            <a href="#contact" class="mt-7 inline-flex w-full justify-center rounded-full bg-white px-6 py-3.5 text-[14px] font-bold text-navy">Talk To Us</a>
          </article>
        </div>
      </div>
    </section>

    <section id="contact" class="bg-white">
      <div class="mx-auto grid max-w-[1240px] gap-10 px-5 py-20 md:px-8 md:py-28 lg:grid-cols-[.85fr_1.15fr]">
        <div>
          <span class="section-label">Contact</span>
          <h2 class="mt-5 text-[clamp(2rem,4vw,3.2rem)] font-black uppercase leading-tight">Tell Us What You Want To Build</h2>
          <p class="mt-5 text-[16px] leading-8 text-midgrey">Send your project idea, website link, or business problem. We will map the right software path: website, app, ERP, SaaS, AI automation, or a phased build.</p>
          <div class="mt-8 space-y-3 text-[14px] font-semibold text-ink/75">
            <p class="flex items-center gap-3"><i data-lucide="mail" class="h-5 w-5 text-green"></i> hello@isoftro.com</p>
            <p class="flex items-center gap-3"><i data-lucide="map-pin" class="h-5 w-5 text-green"></i> Nepal, serving Nepal, India & international clients</p>
          </div>
        </div>
        <form class="rounded-[2rem] border border-bordergrey bg-softgrey p-4 shadow-e2" action="#" method="post">
          <div class="rounded-[1.5rem] bg-white p-6 md:p-8">
            <div class="grid gap-4 md:grid-cols-2">
              <label class="text-[13px] font-bold text-ink">Name<input class="mt-2 w-full rounded-xl border border-bordergrey px-4 py-3 font-normal outline-none focus:border-green" name="name" placeholder="Your name" /></label>
              <label class="text-[13px] font-bold text-ink">Email<input class="mt-2 w-full rounded-xl border border-bordergrey px-4 py-3 font-normal outline-none focus:border-green" name="email" type="email" placeholder="you@example.com" /></label>
              <label class="text-[13px] font-bold text-ink">Phone<input class="mt-2 w-full rounded-xl border border-bordergrey px-4 py-3 font-normal outline-none focus:border-green" name="phone" placeholder="+977..." /></label>
              <label class="text-[13px] font-bold text-ink">Service Needed<select class="mt-2 w-full rounded-xl border border-bordergrey px-4 py-3 font-normal outline-none focus:border-green" name="service"><option>Website Development</option><option>Ecommerce Mobile App</option><option>ERP / CRM</option><option>SaaS Product</option><option>AI Chatbot & Automation</option><option>Custom Software</option></select></label>
            </div>
            <label class="mt-4 block text-[13px] font-bold text-ink">Website URL / Company<input class="mt-2 w-full rounded-xl border border-bordergrey px-4 py-3 font-normal outline-none focus:border-green" name="website" placeholder="https://yourbusiness.com" /></label>
            <label class="mt-4 block text-[13px] font-bold text-ink">Project Description<textarea class="mt-2 min-h-36 w-full rounded-xl border border-bordergrey px-4 py-3 font-normal outline-none focus:border-green" name="description" placeholder="Tell us what you need, current problems, budget range, and timeline."></textarea></label>
            <button class="mt-5 inline-flex w-full items-center justify-center gap-2 rounded-full bg-green px-7 py-4 text-[15px] font-bold text-white shadow-glow transition hover:bg-green-dark" type="submit">Send Project Inquiry <i data-lucide="arrow-right" class="h-5 w-5"></i></button>
            <p class="mt-3 text-center text-[12px] text-midgrey">Special ecommerce CTA: send your website link and get a free app consultation.</p>
          </div>
        </form>
      </div>
    </section>
  </main>

  <footer class="bg-navy text-white">
    <div class="mx-auto grid max-w-[1240px] gap-8 px-5 py-12 md:grid-cols-[1.2fr_.8fr_.8fr] md:px-8">
      <div>
        <img src="assets/isoftro-logo-full.png" alt="iSoftro Solutions" class="h-14 w-auto rounded-xl bg-white p-2" />
        <p class="mt-5 max-w-md text-[14px] leading-7 text-white/62">Premium software agency and product studio building websites, mobile apps, ERP, SaaS, AI automation, and custom business systems.</p>
      </div>
      <div>
        <h3 class="text-[14px] font-black uppercase tracking-[.12em] text-white">Explore</h3>
        <div class="mt-4 grid gap-2 text-[14px] text-white/62">
          <a href="services.php" class="hover:text-green">Services</a>
          <a href="expertise.php" class="hover:text-green">Expertise</a>
          <a href="portfolio.php" class="hover:text-green">Portfolio</a>
          <a href="pricing.php" class="hover:text-green">Pricing</a>
          <a href="ecommerce-app.php" class="hover:text-green">Ecommerce App</a>
        </div>
      </div>
      <div>
        <h3 class="text-[14px] font-black uppercase tracking-[.12em] text-white">Contact</h3>
        <div class="mt-4 grid gap-2 text-[14px] text-white/62">
          <span>hello@isoftro.com</span>
          <span>Nepal</span>
          <a href="https://www.facebook.com/isoftro" target="_blank" rel="noopener" class="inline-flex items-center gap-2 hover:text-green"><i data-lucide="facebook" class="h-4 w-4"></i></a>
        </div>
      </div>
    </div>
    <div class="border-t border-white/10 px-5 py-5 text-center text-[12px] text-white/45">Copyright 2026 iSoftro Solutions. All rights reserved.</div>
  </footer>

  <script>
    window.addEventListener('DOMContentLoaded', () => {
      if (window.lucide) window.lucide.createIcons();

      const menuToggle = document.getElementById('menuToggle');
      const mobileMenu = document.getElementById('mobileMenu');
      menuToggle?.addEventListener('click', () => {
        const isOpen = !mobileMenu.classList.contains('hidden');
        mobileMenu.classList.toggle('hidden', isOpen);
        menuToggle.setAttribute('aria-expanded', String(!isOpen));
      });

      mobileMenu?.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => {
          mobileMenu.classList.add('hidden');
          menuToggle?.setAttribute('aria-expanded', 'false');
        });
      });
    });
  </script>
</body>
</html>
