<?php
require_once __DIR__ . '/includes/functions.php';
$flashMessages = flash_messages();
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ecommerce Mobile App Development in Nepal - From Rs. 60,000</title>
  <meta name="description" content="Turn your ecommerce website into a professional Android and iOS shopping app. Push notifications, payment gateways, order tracking, fast checkout, and app publishing support from Rs. 60,000." />
  <meta name="theme-color" content="#0B1E3D" />
  <link rel="icon" href="assets/favicon.ico" sizes="any" />
  <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon-16x16.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="assets/apple-touch-icon.png" />
  <link rel="canonical" href="https://isoftro.com/ecommerce-app.php" />

  <meta property="og:url" content="https://isoftro.com/ecommerce-app.php" />
  <meta property="og:site_name" content="iSoftro Solutions" />
  <meta property="og:title" content="Turn Your Ecommerce Website Into A Mobile App" />
  <meta property="og:description" content="Android and iOS shopping apps for ecommerce businesses, starting from Rs. 60,000." />
  <meta property="og:type" content="website" />
  <meta property="og:image" content="https://isoftro.com/assets/og-image.png" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Ecommerce Mobile App Development in Nepal - From Rs. 60,000" />
  <meta name="twitter:description" content="Convert your existing ecommerce website into a branded Android and iOS shopping app." />
  <meta name="twitter:image" content="https://isoftro.com/assets/og-image.png" />

  <script type="application/ld+json">
  [{
    "@context": "https://schema.org",
    "@type": "Service",
    "name": "Ecommerce Mobile App Development",
    "provider": {
      "@type": "Organization",
      "name": "iSoftro Solutions",
      "url": "https://isoftro.com/",
      "logo": "https://isoftro.com/assets/isoftro-logo-full.png"
    },
    "areaServed": ["NP", "IN", "International"],
    "description": "Conversion of ecommerce websites into Android and iOS mobile shopping apps with push notifications, payments, order tracking, and publishing support.",
    "offers": {
      "@type": "Offer",
      "price": "60000",
      "priceCurrency": "NPR",
      "availability": "https://schema.org/InStock"
    }
  }]
  </script>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js" defer></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            green: { DEFAULT: '#1DB954', dark: '#18A348' },
            navy: '#0B1E3D',
            ink: '#0F172A',
            softgrey: '#F1F5F9',
            midgrey: '#64748B',
            bordergrey: '#E2E8F0',
            signal: '#2563EB',
            teal: '#0EA5E9'
          },
          fontFamily: {
            sans: ['Poppins', 'Inter', 'Segoe UI', '-apple-system', 'sans-serif']
          },
          boxShadow: {
            soft: '0 1px 3px rgba(15,23,42,.08)',
            card: '0 10px 30px rgba(15,23,42,.08)',
            deep: '0 24px 70px rgba(11,30,61,.18)',
            glow: '0 12px 34px rgba(29,185,84,.28)'
          }
        }
      }
    };
  </script>
  <style>
    html { font-family: 'Poppins', 'Inter', 'Segoe UI', -apple-system, sans-serif; color: #0F172A; }
    body { overflow-x: hidden; background: #fff; }
    .glass-nav { background: rgba(255,255,255,.82); border: 1px solid rgba(226,232,240,.9); backdrop-filter: blur(18px); -webkit-backdrop-filter: blur(18px); }
    .hero-surface {
      background:
        radial-gradient(circle at 86% 10%, rgba(29,185,84,.14), transparent 30%),
        radial-gradient(circle at 12% 72%, rgba(14,165,233,.12), transparent 32%),
        linear-gradient(180deg, #ffffff 0%, #f8fbfc 100%);
    }
    .subtle-grid {
      background-image: linear-gradient(rgba(15,23,42,.045) 1px, transparent 1px), linear-gradient(90deg, rgba(15,23,42,.045) 1px, transparent 1px);
      background-size: 64px 64px;
    }
    .text-gradient { background: linear-gradient(135deg, #1DB954 0%, #0EA5E9 100%); -webkit-background-clip: text; background-clip: text; color: transparent; }
    .section-label { display:inline-flex; align-items:center; gap:.5rem; border:1px solid rgba(29,185,84,.22); background:rgba(29,185,84,.07); color:#1DB954; padding:.42rem .9rem; border-radius:9999px; font-size:11px; font-weight:800; letter-spacing:.12em; text-transform:uppercase; }
    .store-icon-card { display:grid; place-items:center; width:74px; height:74px; border-radius:22px; background:#fff; border:1px solid #E2E8F0; box-shadow:0 20px 50px rgba(11,30,61,.16); transform:rotate(var(--rotate, 0deg)); }
    .store-icon-card img { max-width:64%; max-height:64%; object-fit:contain; }
    .phone-shell { border: 9px solid #0B1E3D; box-shadow: 0 30px 80px rgba(11,30,61,.2); }
    .card-hover { transition: transform .24s ease, box-shadow .24s ease, border-color .24s ease; }
    .card-hover:hover { transform: translateY(-5px); box-shadow: 0 16px 42px rgba(15,23,42,.12); border-color: rgba(29,185,84,.35); }
    .icon-box { display:grid; place-items:center; height:52px; width:52px; border-radius:16px; background:rgba(29,185,84,.1); color:#1DB954; }
    .project-phone { background: linear-gradient(180deg, #0B1E3D, #14325d); border: 7px solid #0B1E3D; }
    .faq[open] .faq-icon { transform: rotate(45deg); }
    .faq summary { list-style: none; }
    .faq summary::-webkit-details-marker { display: none; }
    @media (max-width: 767px) {
      .store-icon-card { width:58px; height:58px; border-radius:18px; }
    }
    @media (prefers-reduced-motion: reduce) {
      html { scroll-behavior: auto; }
      *, *::before, *::after { animation-duration:.001ms !important; animation-iteration-count:1 !important; transition-duration:.001ms !important; }
    }
  </style>
</head>
<body class="text-ink antialiased selection:bg-green/20">
  <a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[60] focus:rounded-xl focus:bg-white focus:px-4 focus:py-2 focus:shadow-card focus:ring-2 focus:ring-green">Skip to content</a>

  <header class="fixed left-0 right-0 top-0 z-50">
    <div class="mx-auto max-w-[1240px] px-4 pt-4">
      <nav class="glass-nav flex items-center justify-between rounded-2xl px-4 py-3 shadow-soft md:px-6">
        <a href="index.php" aria-label="iSoftro Solutions home" class="flex items-center">
          <img src="assets/isoftro-logo.png" alt="iSoftro Solutions" class="h-10 w-auto" width="124" height="48" />
        </a>
        <div class="hidden items-center gap-1 text-[13px] font-semibold text-ink/70 lg:flex">
          <a href="index.php" class="rounded-lg px-3 py-2 hover:bg-green/5 hover:text-green">Home</a>
          <a href="website-development.html" class="rounded-lg px-3 py-2 hover:bg-green/5 hover:text-green">Services</a>
          <a href="#features" class="rounded-lg px-3 py-2 hover:bg-green/5 hover:text-green">Features</a>
          <a href="pricing.php" class="rounded-lg px-3 py-2 hover:bg-green/5 hover:text-green">Pricing</a>
          <a href="#faq" class="rounded-lg px-3 py-2 hover:bg-green/5 hover:text-green">FAQ</a>
        </div>
        <div class="flex items-center gap-2">
          <a href="#lead-form" class="inline-flex items-center gap-2 rounded-full bg-green px-5 py-2.5 text-[13px] font-bold text-white shadow-glow transition hover:bg-green-dark">
            Get App Quote
            <i data-lucide="arrow-right" class="h-4 w-4"></i>
          </a>
          <button id="menuToggle" type="button" class="grid h-10 w-10 place-items-center rounded-xl border border-bordergrey bg-white lg:hidden" aria-label="Toggle menu" aria-expanded="false" aria-controls="mobileMenu">
            <i data-lucide="menu" class="h-5 w-5"></i>
          </button>
        </div>
      </nav>
      <div id="mobileMenu" class="glass-nav mt-2 hidden rounded-2xl p-3 text-[15px] font-semibold text-ink/75 lg:hidden">
        <a class="block rounded-xl px-3 py-3 hover:bg-green/5 hover:text-green" href="index.php">Home</a>
        <a class="block rounded-xl px-3 py-3 hover:bg-green/5 hover:text-green" href="website-development.html">Services</a>
        <a class="block rounded-xl px-3 py-3 hover:bg-green/5 hover:text-green" href="#features">Features</a>
        <a class="block rounded-xl px-3 py-3 hover:bg-green/5 hover:text-green" href="pricing.php">Pricing</a>
        <a class="block rounded-xl px-3 py-3 hover:bg-green/5 hover:text-green" href="#faq">FAQ</a>
      </div>
    </div>
  </header>

  <main id="main">
    <section class="hero-surface subtle-grid relative overflow-hidden pt-28 md:pt-32">
      <div class="mx-auto grid max-w-[1240px] items-center gap-12 px-5 pb-16 md:px-8 md:pb-24 lg:grid-cols-[1fr_1fr]">
        <div>
          <div class="inline-flex items-center gap-2 rounded-full border border-green/20 bg-green/5 px-4 py-2 text-[11px] font-extrabold uppercase tracking-[.12em] text-green">
            <span class="h-2 w-2 rounded-full bg-green"></span>
            Ecommerce Conversion Engine
          </div>
          <h1 class="mt-5 max-w-3xl text-[clamp(2.05rem,4.05vw,3.35rem)] font-black uppercase leading-[1.04] tracking-tight text-ink">
            Already Have An Ecommerce Website?
            <span class="text-gradient block">Turn It Into A Mobile App.</span>
          </h1>
          <p class="mt-5 max-w-xl text-[16px] leading-7 text-midgrey">
            Convert your existing ecommerce website into a powerful Android and iOS shopping app with push notifications, faster checkout, order tracking, payment gateway integration, and app publishing support.
          </p>
          <div class="mt-7 flex flex-wrap gap-3">
            <span class="inline-flex items-center gap-2 rounded-full bg-white px-4 py-2 text-[13px] font-bold text-ink shadow-soft"><i data-lucide="smartphone" class="h-4 w-4 text-green"></i> Android & iOS</span>
            <span class="inline-flex items-center gap-2 rounded-full bg-white px-4 py-2 text-[13px] font-bold text-ink shadow-soft"><i data-lucide="timer" class="h-4 w-4 text-green"></i> 2-6 Week Delivery</span>
            <span class="inline-flex items-center gap-2 rounded-full bg-white px-4 py-2 text-[13px] font-bold text-ink shadow-soft"><i data-lucide="badge-dollar-sign" class="h-4 w-4 text-green"></i> Starting Rs. 60,000</span>
          </div>
          <div class="mt-6 flex flex-col gap-3 sm:flex-row">
            <a href="#lead-form" class="inline-flex items-center justify-center gap-2 rounded-full bg-green px-8 py-4 text-[15px] font-bold text-white shadow-glow transition hover:bg-green-dark">
              Send Website Link
              <i data-lucide="arrow-right" class="h-5 w-5"></i>
            </a>
            <a href="pricing.php" class="inline-flex items-center justify-center gap-2 rounded-full border border-bordergrey bg-white px-8 py-4 text-[15px] font-bold text-ink transition hover:bg-softgrey">
              Get App Quote
              <i data-lucide="circle-arrow-right" class="h-5 w-5"></i>
            </a>
          </div>
          <div class="mt-5 flex flex-wrap gap-x-5 gap-y-2 text-[12px] font-semibold text-midgrey">
            <span class="inline-flex items-center gap-1.5"><i data-lucide="shield-check" class="h-4 w-4 text-green"></i> Secure</span>
            <span class="inline-flex items-center gap-1.5"><i data-lucide="message-circle-off" class="h-4 w-4 text-green"></i> No spam</span>
            <span class="inline-flex items-center gap-1.5"><i data-lucide="rocket" class="h-4 w-4 text-green"></i> Publishing support</span>
          </div>
        </div>

        <div class="relative min-h-[520px]">
          <div class="absolute left-0 top-5 z-20 hidden sm:block">
            <div class="store-icon-card" style="--rotate:-9deg"><img src="images.png" alt="Website icon" /></div>
          </div>
          <div class="absolute right-2 top-12 z-20">
            <div class="store-icon-card" style="--rotate:8deg"><img src="google-play-store-icon-logo-symbol-free-png.webp" alt="Google Play Store icon" /></div>
          </div>
          <div class="absolute right-0 top-36 z-20">
            <div class="store-icon-card" style="--rotate:-7deg"><img src="2365235.webp" alt="Apple App Store icon" /></div>
          </div>

          <div class="absolute left-[10%] top-2 w-[220px] rotate-[-3deg] rounded-[2.4rem] bg-navy p-2 shadow-deep sm:left-[20%] sm:w-[245px]">
            <div class="phone-shell overflow-hidden rounded-[1.9rem] bg-white">
              <div class="flex items-center justify-between bg-white px-4 pb-3 pt-5">
                <span class="text-[11px] font-black text-ink">iSoftro Store</span>
                <i data-lucide="search" class="h-4 w-4 text-midgrey"></i>
              </div>
              <div class="mx-3 rounded-2xl bg-green p-3 text-white">
                <p class="text-[9px] font-bold uppercase tracking-wider opacity-80">Summer Collection</p>
                <p class="mt-1 text-[16px] font-black">40% OFF</p>
                <button class="mt-2 rounded-full bg-white px-3 py-1 text-[9px] font-bold text-green">Shop Now</button>
              </div>
              <div class="px-3 py-3">
                <div class="grid grid-cols-4 gap-2 text-center text-[8px] font-semibold text-midgrey">
                  <span class="rounded-xl bg-softgrey p-2">Men</span>
                  <span class="rounded-xl bg-softgrey p-2">Women</span>
                  <span class="rounded-xl bg-softgrey p-2">Shoes</span>
                  <span class="rounded-xl bg-softgrey p-2">Bags</span>
                </div>
                <p class="mt-3 text-[10px] font-black text-ink">Best Sellers</p>
                <div class="mt-2 grid grid-cols-2 gap-2">
                  <div class="rounded-xl border border-bordergrey bg-white p-2 shadow-soft"><div class="h-16 rounded-lg bg-green/10"></div><p class="mt-2 text-[9px] font-bold">Sports Shoes</p><p class="text-[9px] font-black text-green">Rs. 2,499</p></div>
                  <div class="rounded-xl border border-bordergrey bg-white p-2 shadow-soft"><div class="h-16 rounded-lg bg-signal/10"></div><p class="mt-2 text-[9px] font-bold">Leather Bag</p><p class="text-[9px] font-black text-green">Rs. 1,199</p></div>
                </div>
              </div>
            </div>
          </div>

          <div class="absolute right-[7%] top-24 w-[225px] rotate-[2deg] rounded-[2.4rem] bg-navy p-2 shadow-deep sm:w-[250px]">
            <div class="phone-shell overflow-hidden rounded-[1.9rem] bg-white">
              <div class="px-4 pb-3 pt-5">
                <div class="flex items-center justify-between">
                  <i data-lucide="arrow-left" class="h-4 w-4 text-ink"></i>
                  <i data-lucide="heart" class="h-4 w-4 text-midgrey"></i>
                </div>
                <div class="mt-4 h-32 rounded-2xl bg-softgrey"></div>
                <p class="mt-4 text-[14px] font-black">Running Shoes</p>
                <p class="text-[10px] text-midgrey">White Green</p>
                <p class="mt-2 text-[18px] font-black text-green">Rs. 2,499</p>
                <div class="mt-3 flex gap-2">
                  <span class="grid h-7 w-7 place-items-center rounded-lg bg-softgrey text-[10px] font-bold">7</span>
                  <span class="grid h-7 w-7 place-items-center rounded-lg bg-green text-[10px] font-bold text-white">8</span>
                  <span class="grid h-7 w-7 place-items-center rounded-lg bg-softgrey text-[10px] font-bold">9</span>
                </div>
                <button class="mt-4 w-full rounded-xl bg-green py-3 text-[12px] font-black text-white">Add To Cart</button>
              </div>
            </div>
          </div>

          <div class="absolute bottom-20 right-4 z-30 max-w-[260px] rounded-2xl border border-green/30 bg-white p-4 shadow-deep">
            <div class="flex items-start gap-3">
              <span class="grid h-10 w-10 shrink-0 place-items-center rounded-full bg-green text-white"><i data-lucide="bell" class="h-5 w-5"></i></span>
              <div>
                <p class="text-[13px] font-black text-ink">Push Notification</p>
                <p class="mt-1 text-[11px] leading-5 text-midgrey">Big Sale is Live. Up to 40% OFF on all items.</p>
              </div>
            </div>
          </div>

          <div class="absolute bottom-0 left-[12%] z-30 rounded-2xl border border-bordergrey bg-white p-5 shadow-deep">
            <p class="text-[12px] font-bold uppercase tracking-[.12em] text-midgrey">Starting at</p>
            <p class="mt-1 text-[34px] font-black text-green">Rs. 60,000</p>
            <p class="mt-1 text-[13px] font-bold text-ink">Android & iOS App</p>
          </div>
        </div>
      </div>

      <div id="comparison" class="mx-auto max-w-[1180px] px-5 pb-16 md:px-8">
        <div class="rounded-[1.8rem] border border-bordergrey bg-white p-4 shadow-card md:p-6">
          <div class="grid gap-4 md:grid-cols-[1fr_auto_1.45fr] md:items-stretch">
            <div class="rounded-2xl bg-softgrey p-5">
              <p class="rounded-full bg-navy px-4 py-2 text-center text-[12px] font-black uppercase tracking-[.12em] text-white">Website Only</p>
              <ul class="mt-5 space-y-4 text-[14px] text-midgrey">
                <li class="flex gap-3"><i data-lucide="x-circle" class="h-5 w-5 shrink-0 text-red-500"></i>No push notifications</li>
                <li class="flex gap-3"><i data-lucide="x-circle" class="h-5 w-5 shrink-0 text-red-500"></i>Slower checkout process</li>
                <li class="flex gap-3"><i data-lucide="x-circle" class="h-5 w-5 shrink-0 text-red-500"></i>Lower repeat customers</li>
                <li class="flex gap-3"><i data-lucide="x-circle" class="h-5 w-5 shrink-0 text-red-500"></i>Limited home screen presence</li>
                <li class="flex gap-3"><i data-lucide="x-circle" class="h-5 w-5 shrink-0 text-red-500"></i>Harder to build loyalty</li>
              </ul>
            </div>
            <div class="grid place-items-center">
              <span class="grid h-12 w-12 place-items-center rounded-full bg-white text-[15px] font-black text-ink shadow-card">VS</span>
            </div>
            <div class="rounded-2xl bg-green/5 p-5">
              <p class="rounded-full bg-green px-4 py-2 text-center text-[12px] font-black uppercase tracking-[.12em] text-white">Mobile App</p>
              <div class="mt-5 grid gap-4 sm:grid-cols-[.85fr_1fr]">
                <ul class="space-y-4 text-[14px] font-semibold text-ink">
                  <li class="flex gap-3"><i data-lucide="check-circle-2" class="h-5 w-5 shrink-0 text-green"></i>Push notifications</li>
                  <li class="flex gap-3"><i data-lucide="check-circle-2" class="h-5 w-5 shrink-0 text-green"></i>Faster checkout</li>
                  <li class="flex gap-3"><i data-lucide="check-circle-2" class="h-5 w-5 shrink-0 text-green"></i>Better retention</li>
                  <li class="flex gap-3"><i data-lucide="check-circle-2" class="h-5 w-5 shrink-0 text-green"></i>App icon on home screen</li>
                  <li class="flex gap-3"><i data-lucide="check-circle-2" class="h-5 w-5 shrink-0 text-green"></i>Native app experience</li>
                </ul>
                <ul class="space-y-4 text-[14px] text-midgrey">
                  <li>Re-engage customers instantly</li>
                  <li>Smoother purchase flow</li>
                  <li>Customers come back more often</li>
                  <li>More visibility, more trust</li>
                  <li>Better performance and reliability</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="border-y border-bordergrey bg-white">
      <div class="mx-auto max-w-[1180px] px-5 py-8 text-center md:px-8">
        <p class="text-[11px] font-black uppercase tracking-[.18em] text-midgrey">Trusted by growing businesses</p>
        <div class="mt-6 grid grid-cols-2 items-center gap-4 opacity-70 sm:grid-cols-3 lg:grid-cols-6">
          <span class="text-[20px] font-black text-ink">Daraz</span>
          <span class="text-[20px] font-black text-ink">sastodeal.com</span>
          <span class="text-[18px] font-black text-ink">kumaripati.com</span>
          <span class="text-[20px] font-black text-ink">SmartDoko</span>
          <span class="text-[18px] font-black text-ink">Hamrobazar</span>
          <span class="text-[18px] font-black text-ink">aadhikhola</span>
        </div>
      </div>
    </section>

    <section id="features" class="bg-white">
      <div class="mx-auto max-w-[1240px] px-5 py-20 md:px-8 md:py-28">
        <div class="mx-auto max-w-3xl text-center">
          <span class="section-label">Everything You Need</span>
          <h2 class="mt-5 text-[clamp(2rem,4vw,3.2rem)] font-black leading-tight">Powerful Features. Higher Conversions.</h2>
          <p class="mt-4 text-[16px] leading-7 text-midgrey">A focused app package for stores that already have a working ecommerce website.</p>
        </div>
        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6">
          <article class="card-hover rounded-2xl border border-bordergrey bg-white p-6 text-center shadow-soft">
            <span class="icon-box mx-auto"><i data-lucide="smartphone" class="h-6 w-6"></i></span>
            <h3 class="mt-4 text-[16px] font-black">Android & iOS</h3>
            <p class="mt-2 text-[13px] leading-5 text-midgrey">Native apps for better performance and user experience.</p>
          </article>
          <article class="card-hover rounded-2xl border border-bordergrey bg-white p-6 text-center shadow-soft">
            <span class="icon-box mx-auto"><i data-lucide="bell" class="h-6 w-6"></i></span>
            <h3 class="mt-4 text-[16px] font-black">Push Notifications</h3>
            <p class="mt-2 text-[13px] leading-5 text-midgrey">Re-engage users with promotions, updates, and offers.</p>
          </article>
          <article class="card-hover rounded-2xl border border-bordergrey bg-white p-6 text-center shadow-soft">
            <span class="icon-box mx-auto"><i data-lucide="credit-card" class="h-6 w-6"></i></span>
            <h3 class="mt-4 text-[16px] font-black">Payment Gateway</h3>
            <p class="mt-2 text-[13px] leading-5 text-midgrey">eSewa, Khalti, cards, wallet, and COD-ready checkout.</p>
          </article>
          <article class="card-hover rounded-2xl border border-bordergrey bg-white p-6 text-center shadow-soft">
            <span class="icon-box mx-auto"><i data-lucide="package-check" class="h-6 w-6"></i></span>
            <h3 class="mt-4 text-[16px] font-black">Order Tracking</h3>
            <p class="mt-2 text-[13px] leading-5 text-midgrey">Real-time order tracking for better transparency.</p>
          </article>
          <article class="card-hover rounded-2xl border border-bordergrey bg-white p-6 text-center shadow-soft">
            <span class="icon-box mx-auto"><i data-lucide="cloud-upload" class="h-6 w-6"></i></span>
            <h3 class="mt-4 text-[16px] font-black">App Publishing</h3>
            <p class="mt-2 text-[13px] leading-5 text-midgrey">We handle Play Store and App Store publishing support.</p>
          </article>
          <article class="card-hover rounded-2xl border border-bordergrey bg-white p-6 text-center shadow-soft">
            <span class="icon-box mx-auto"><i data-lucide="calendar-clock" class="h-6 w-6"></i></span>
            <h3 class="mt-4 text-[16px] font-black">2-6 Week Delivery</h3>
            <p class="mt-2 text-[13px] leading-5 text-midgrey">A clear launch plan so you can start selling sooner.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="bg-softgrey">
      <div class="mx-auto max-w-[1180px] px-5 py-20 md:px-8 md:py-28">
        <div class="mx-auto max-w-3xl text-center">
          <span class="section-label bg-white">How It Works</span>
          <h2 class="mt-5 text-[clamp(2rem,4vw,3.1rem)] font-black leading-tight">From Website To Mobile App In 4 Simple Steps</h2>
        </div>
        <div class="mt-12 grid gap-5 md:grid-cols-4">
          <div class="rounded-2xl border border-bordergrey bg-white p-6 shadow-soft">
            <span class="grid h-12 w-12 place-items-center rounded-full bg-green/10 text-[18px] font-black text-green">1</span>
            <h3 class="mt-5 text-[17px] font-black">Share Your Website Link</h3>
            <p class="mt-2 text-[14px] leading-6 text-midgrey">Send us your store URL and app requirements.</p>
          </div>
          <div class="rounded-2xl border border-bordergrey bg-white p-6 shadow-soft">
            <span class="grid h-12 w-12 place-items-center rounded-full bg-green/10 text-[18px] font-black text-green">2</span>
            <h3 class="mt-5 text-[17px] font-black">We Analyze & Propose</h3>
            <p class="mt-2 text-[14px] leading-6 text-midgrey">We check your site and share the best fixed quote.</p>
          </div>
          <div class="rounded-2xl border border-bordergrey bg-white p-6 shadow-soft">
            <span class="grid h-12 w-12 place-items-center rounded-full bg-green/10 text-[18px] font-black text-green">3</span>
            <h3 class="mt-5 text-[17px] font-black">We Build Your App</h3>
            <p class="mt-2 text-[14px] leading-6 text-midgrey">Our team builds your Android and iOS app with key features.</p>
          </div>
          <div class="rounded-2xl border border-green/30 bg-navy p-6 text-white shadow-card">
            <span class="grid h-12 w-12 place-items-center rounded-full bg-green text-[18px] font-black text-white">4</span>
            <h3 class="mt-5 text-[17px] font-black">Test, Publish & Launch</h3>
            <p class="mt-2 text-[14px] leading-6 text-white/65">We test, publish on stores, and help you launch successfully.</p>
          </div>
        </div>
      </div>
    </section>

    <section id="work" class="bg-white">
      <div class="mx-auto max-w-[1240px] px-5 py-20 md:px-8 md:py-28">
        <div class="mx-auto max-w-3xl text-center">
          <span class="section-label">Our Work</span>
          <h2 class="mt-5 text-[clamp(2rem,4vw,3.1rem)] font-black leading-tight">Ecommerce Apps We Have Built</h2>
          <p class="mt-4 text-[16px] leading-7 text-midgrey">Example app directions for fashion, electronics, beauty, grocery, and books.</p>
        </div>
        <div class="mt-12 grid gap-5 md:grid-cols-5">
          <article class="card-hover rounded-2xl border border-bordergrey bg-white p-4 shadow-soft">
            <div class="project-phone rounded-2xl p-3"><div class="h-48 rounded-xl bg-white p-3"><div class="h-20 rounded-lg bg-signal/15"></div><div class="mt-3 h-3 w-3/4 rounded bg-ink/15"></div><div class="mt-2 h-3 w-1/2 rounded bg-green/35"></div></div></div>
            <h3 class="mt-4 text-[15px] font-black">Fashion Hub</h3>
            <p class="text-[12px] text-midgrey">Shopping</p>
          </article>
          <article class="card-hover rounded-2xl border border-bordergrey bg-white p-4 shadow-soft">
            <div class="project-phone rounded-2xl p-3"><div class="h-48 rounded-xl bg-white p-3"><div class="h-20 rounded-lg bg-teal/15"></div><div class="mt-3 h-3 w-2/3 rounded bg-ink/15"></div><div class="mt-2 h-3 w-1/2 rounded bg-green/35"></div></div></div>
            <h3 class="mt-4 text-[15px] font-black">Gadget Mart</h3>
            <p class="text-[12px] text-midgrey">Electronics</p>
          </article>
          <article class="card-hover rounded-2xl border border-bordergrey bg-white p-4 shadow-soft">
            <div class="project-phone rounded-2xl p-3"><div class="h-48 rounded-xl bg-white p-3"><div class="h-20 rounded-lg bg-pink-100"></div><div class="mt-3 h-3 w-3/4 rounded bg-ink/15"></div><div class="mt-2 h-3 w-2/5 rounded bg-green/35"></div></div></div>
            <h3 class="mt-4 text-[15px] font-black">Beauty House</h3>
            <p class="text-[12px] text-midgrey">Cosmetics</p>
          </article>
          <article class="card-hover rounded-2xl border border-bordergrey bg-white p-4 shadow-soft">
            <div class="project-phone rounded-2xl p-3"><div class="h-48 rounded-xl bg-white p-3"><div class="h-20 rounded-lg bg-green/15"></div><div class="mt-3 h-3 w-2/3 rounded bg-ink/15"></div><div class="mt-2 h-3 w-1/2 rounded bg-green/35"></div></div></div>
            <h3 class="mt-4 text-[15px] font-black">Fresh Bazaar</h3>
            <p class="text-[12px] text-midgrey">Groceries</p>
          </article>
          <article class="card-hover rounded-2xl border border-bordergrey bg-white p-4 shadow-soft">
            <div class="project-phone rounded-2xl p-3"><div class="h-48 rounded-xl bg-white p-3"><div class="h-20 rounded-lg bg-amber-100"></div><div class="mt-3 h-3 w-3/4 rounded bg-ink/15"></div><div class="mt-2 h-3 w-2/5 rounded bg-green/35"></div></div></div>
            <h3 class="mt-4 text-[15px] font-black">Book Store</h3>
            <p class="text-[12px] text-midgrey">Books & Media</p>
          </article>
        </div>
      </div>
    </section>

    <section id="pricing" class="bg-softgrey">
      <div class="mx-auto max-w-[1180px] px-5 py-20 md:px-8 md:py-28">
        <div class="mx-auto max-w-3xl text-center">
          <span class="section-label bg-white">Simple Transparent Pricing</span>
          <h2 class="mt-5 text-[clamp(2rem,4vw,3.1rem)] font-black leading-tight">Choose The Right Plan For Your Business</h2>
        </div>
        <div class="mt-12 grid gap-5 lg:grid-cols-3">
          <article class="card-hover rounded-2xl border border-bordergrey bg-white p-8 shadow-soft">
            <h3 class="text-[20px] font-black">Starter App</h3>
            <p class="mt-3 text-[34px] font-black text-green">Rs. 60,000</p>
            <p class="mt-2 text-[14px] text-midgrey">Best for small stores getting started.</p>
            <ul class="mt-6 space-y-3 text-[14px] text-ink/80">
              <li class="flex gap-2"><i data-lucide="check" class="h-5 w-5 text-green"></i>Android app</li>
              <li class="flex gap-2"><i data-lucide="check" class="h-5 w-5 text-green"></i>Basic features</li>
              <li class="flex gap-2"><i data-lucide="check" class="h-5 w-5 text-green"></i>Payment gateway integration</li>
              <li class="flex gap-2"><i data-lucide="check" class="h-5 w-5 text-green"></i>2-4 week delivery</li>
            </ul>
            <a href="#lead-form" class="mt-8 inline-flex w-full justify-center rounded-full bg-green px-6 py-3.5 text-[14px] font-black text-white shadow-glow">Get Started</a>
          </article>
          <article class="relative rounded-2xl border-2 border-green bg-white p-8 shadow-card">
            <span class="absolute left-1/2 top-0 -translate-x-1/2 -translate-y-1/2 rounded-full bg-green px-5 py-1.5 text-[12px] font-black uppercase tracking-wide text-white">Most Popular</span>
            <h3 class="text-[20px] font-black">Growth App</h3>
            <p class="mt-3 text-[34px] font-black text-green">Rs. 90,000</p>
            <p class="mt-2 text-[14px] text-midgrey">Ideal for growing businesses.</p>
            <ul class="mt-6 space-y-3 text-[14px] text-ink/80">
              <li class="flex gap-2"><i data-lucide="check" class="h-5 w-5 text-green"></i>Android + iOS apps</li>
              <li class="flex gap-2"><i data-lucide="check" class="h-5 w-5 text-green"></i>Push notifications</li>
              <li class="flex gap-2"><i data-lucide="check" class="h-5 w-5 text-green"></i>Order tracking</li>
              <li class="flex gap-2"><i data-lucide="check" class="h-5 w-5 text-green"></i>4-6 week delivery</li>
            </ul>
            <a href="#lead-form" class="mt-8 inline-flex w-full justify-center rounded-full bg-green px-6 py-3.5 text-[14px] font-black text-white shadow-glow">Get Started</a>
          </article>
          <article class="card-hover rounded-2xl border border-bordergrey bg-white p-8 shadow-soft">
            <h3 class="text-[20px] font-black">Advanced App</h3>
            <p class="mt-3 text-[34px] font-black text-ink">Custom</p>
            <p class="mt-2 text-[14px] text-midgrey">For large stores and custom needs.</p>
            <ul class="mt-6 space-y-3 text-[14px] text-ink/80">
              <li class="flex gap-2"><i data-lucide="check" class="h-5 w-5 text-green"></i>Custom features</li>
              <li class="flex gap-2"><i data-lucide="check" class="h-5 w-5 text-green"></i>ERP/CRM integration</li>
              <li class="flex gap-2"><i data-lucide="check" class="h-5 w-5 text-green"></i>Multi-vendor support</li>
              <li class="flex gap-2"><i data-lucide="check" class="h-5 w-5 text-green"></i>Dedicated project manager</li>
            </ul>
            <a href="#lead-form" class="mt-8 inline-flex w-full justify-center rounded-full border border-bordergrey px-6 py-3.5 text-[14px] font-black text-ink hover:bg-softgrey">Contact Us</a>
          </article>
        </div>
      </div>
    </section>

    <section id="lead-form" class="bg-white">
      <div class="mx-auto grid max-w-[1180px] gap-8 px-5 py-20 md:px-8 md:py-28 lg:grid-cols-[.78fr_1.22fr]">
        <div class="rounded-[2rem] bg-navy p-8 text-white shadow-deep">
          <span class="grid h-16 w-16 place-items-center rounded-2xl bg-green/15 text-green"><i data-lucide="lock-keyhole" class="h-8 w-8"></i></span>
          <h2 class="mt-6 text-[clamp(1.85rem,4vw,2.65rem)] font-black leading-tight">Ready To Turn Your Website Into An App?</h2>
          <p class="mt-4 text-[15px] leading-7 text-white/68">Send your website link and get a custom quote within 24 hours.</p>
          <div class="mt-8 flex flex-wrap gap-3 text-[12px] font-semibold text-white/70">
            <span class="inline-flex items-center gap-1.5"><i data-lucide="shield-check" class="h-4 w-4 text-green"></i> Secure</span>
            <span class="inline-flex items-center gap-1.5"><i data-lucide="message-circle-off" class="h-4 w-4 text-green"></i> No spam</span>
            <span class="inline-flex items-center gap-1.5"><i data-lucide="file-check-2" class="h-4 w-4 text-green"></i> NDA available</span>
          </div>
        </div>
        <form action="/my-website/lead-submit.php" method="post" class="rounded-[2rem] border border-bordergrey bg-white p-4 shadow-card">
          <?= csrf_field() ?>
          <input type="hidden" name="service_needed" value="Ecommerce Mobile App Development">
          <?php foreach ($flashMessages as $flash): ?>
            <div class="mb-4 rounded-2xl border px-4 py-3 text-[13px] font-bold <?= $flash['type'] === 'success' ? 'border-green/20 bg-green/10 text-green' : 'border-red-200 bg-red-50 text-red-700' ?>"><?= e($flash['message']) ?></div>
          <?php endforeach; ?>
          <div class="grid gap-4 md:grid-cols-3">
            <label class="text-[13px] font-bold text-ink">Your Name<input name="name" class="mt-2 w-full rounded-xl border border-bordergrey px-4 py-3 font-normal outline-none focus:border-green" placeholder="Enter your name" /></label>
            <label class="text-[13px] font-bold text-ink">Email Address<input name="email" type="email" class="mt-2 w-full rounded-xl border border-bordergrey px-4 py-3 font-normal outline-none focus:border-green" placeholder="Enter your email" /></label>
            <label class="text-[13px] font-bold text-ink">Website Link<input name="website" class="mt-2 w-full rounded-xl border border-bordergrey px-4 py-3 font-normal outline-none focus:border-green" placeholder="https://yourwebsite.com" /></label>
          </div>
          <label class="mt-4 block text-[13px] font-bold text-ink">Tell us about your requirement<textarea name="description" class="mt-2 min-h-40 w-full rounded-xl border border-bordergrey px-4 py-3 font-normal outline-none focus:border-green" placeholder="Features you need, design preferences, specific functionality, payment gateways, app timeline..."></textarea></label>
          <button class="mt-5 inline-flex w-full items-center justify-center gap-2 rounded-full bg-green px-7 py-4 text-[15px] font-black text-white shadow-glow transition hover:bg-green-dark" type="submit">
            Send Website Link
            <i data-lucide="arrow-right" class="h-5 w-5"></i>
          </button>
        </form>
      </div>
    </section>

    <section id="faq" class="bg-softgrey">
      <div class="mx-auto max-w-[900px] px-5 py-20 md:px-8 md:py-28">
        <div class="text-center">
          <span class="section-label bg-white">FAQ</span>
          <h2 class="mt-5 text-[clamp(2rem,4vw,3rem)] font-black leading-tight">Questions Before You Start</h2>
        </div>
        <div class="mt-10 space-y-4">
          <details class="faq rounded-2xl border border-bordergrey bg-white p-6 shadow-soft">
            <summary class="flex cursor-pointer items-center justify-between gap-5 font-black">Do I need an existing ecommerce website?<i data-lucide="plus" class="faq-icon h-5 w-5 shrink-0 text-green transition"></i></summary>
            <p class="mt-3 text-[14px] leading-7 text-midgrey">Yes. This package is designed for businesses that already have an ecommerce website and want a professional app experience.</p>
          </details>
          <details class="faq rounded-2xl border border-bordergrey bg-white p-6 shadow-soft">
            <summary class="flex cursor-pointer items-center justify-between gap-5 font-black">Will you publish the app on Play Store?<i data-lucide="plus" class="faq-icon h-5 w-5 shrink-0 text-green transition"></i></summary>
            <p class="mt-3 text-[14px] leading-7 text-midgrey">Yes. We support Play Store publishing and can guide App Store publishing depending on your plan and account setup.</p>
          </details>
          <details class="faq rounded-2xl border border-bordergrey bg-white p-6 shadow-soft">
            <summary class="flex cursor-pointer items-center justify-between gap-5 font-black">Can you connect payment gateways?<i data-lucide="plus" class="faq-icon h-5 w-5 shrink-0 text-green transition"></i></summary>
            <p class="mt-3 text-[14px] leading-7 text-midgrey">Yes. We can integrate eSewa, Khalti, cards, wallets, COD, and other supported payment flows.</p>
          </details>
          <details class="faq rounded-2xl border border-bordergrey bg-white p-6 shadow-soft">
            <summary class="flex cursor-pointer items-center justify-between gap-5 font-black">How long does it take?<i data-lucide="plus" class="faq-icon h-5 w-5 shrink-0 text-green transition"></i></summary>
            <p class="mt-3 text-[14px] leading-7 text-midgrey">Most apps take 2-6 weeks depending on the website, required features, publishing requirements, and integrations.</p>
          </details>
        </div>
      </div>
    </section>
  </main>

  <footer class="bg-navy text-white">
    <div class="mx-auto grid max-w-[1180px] gap-8 px-5 py-12 md:grid-cols-[1.2fr_.8fr_.8fr_.8fr] md:px-8">
      <div>
        <a href="index.php" class="inline-flex rounded-xl bg-white p-2">
          <img src="assets/isoftro-logo-full.png" alt="iSoftro Solutions" class="h-12 w-auto" />
        </a>
        <p class="mt-5 max-w-md text-[14px] leading-7 text-white/62">Professional Android and iOS shopping apps for ecommerce businesses ready to increase repeat orders and customer retention.</p>
      </div>
      <div>
        <h3 class="text-[14px] font-black uppercase tracking-[.12em]">Page</h3>
        <div class="mt-4 grid gap-2 text-[14px] text-white/62">
          <a href="index.php" class="hover:text-green">Home</a>
          <a href="#features" class="hover:text-green">Features</a>
          <a href="pricing.php" class="hover:text-green">Pricing</a>
          <a href="#lead-form" class="hover:text-green">Get Quote</a>
        </div>
      </div>
      <div>
        <h3 class="text-[14px] font-black uppercase tracking-[.12em]">Offer</h3>
        <div class="mt-4 grid gap-2 text-[14px] text-white/62">
          <span>Starting Rs. 60,000</span>
          <span>Android & iOS</span>
          <span>2-6 Week Delivery</span>
          <span>Play Store Support</span>
        </div>
      </div>
      <div>
        <h3 class="text-[14px] font-black uppercase tracking-[.12em]">Contact</h3>
        <div class="mt-4 grid gap-2 text-[14px] text-white/62">
          <span>hello@isoftro.com</span>
          <a href="https://www.facebook.com/isoftro" target="_blank" rel="noopener" class="inline-flex items-center gap-2 hover:text-green" aria-label="iSoftro on Facebook"><i data-lucide="facebook" class="h-4 w-4"></i></a>
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
