<?php
declare(strict_types=1);
if (!isset($pageTitle)) $pageTitle = 'iSoftro Solutions - Websites, Apps, ERP, SaaS & AI Automation';
if (!isset($pageDescription)) $pageDescription = 'iSoftro Solutions builds premium websites, mobile apps, ERP/CRM systems, SaaS platforms, AI chatbots, automation tools, and custom business software for Nepal and beyond.';
?><!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= e($pageTitle) ?></title>
  <meta name="description" content="<?= e($pageDescription) ?>" />
  <meta name="theme-color" content="#0B1E3D" />
  <link rel="icon" href="assets/favicon.ico" sizes="any" />
  <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon-16x16.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="assets/apple-touch-icon.png" />
  <link rel="canonical" href="https://isoftro.com/" />
  <meta property="og:url" content="https://isoftro.com/" />
  <meta property="og:site_name" content="iSoftro Solutions" />
  <meta property="og:title" content="<?= e($pageTitle) ?>" />
  <meta property="og:description" content="<?= e($pageDescription) ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:image" content="https://isoftro.com/assets/og-image.png" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?= e($pageTitle) ?>" />
  <meta name="twitter:description" content="<?= e($pageDescription) ?>" />
  <meta name="twitter:image" content="https://isoftro.com/assets/og-image.png" />

  <script type="application/ld+json">
  [{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "iSoftro Solutions",
    "url": "https://isoftro.com/",
    "description": "Software agency and product studio building websites, mobile apps, ERP systems, SaaS platforms, AI chatbots, and custom software.",
    "logo": "https://isoftro.com/assets/isoftro-logo-full.png",
    "email": "hello@isoftro.com",
    "address": { "@type": "PostalAddress", "addressCountry": "NP" },
    "areaServed": ["NP", "IN", "International"]
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
            e1: '0 1px 3px rgba(0,0,0,0.08)',
            e2: '0 4px 16px rgba(0,0,0,0.10)',
            e3: '0 8px 32px rgba(0,0,0,0.12)',
            e4: '0 16px 48px rgba(0,0,0,0.18)',
            glow: '0 4px 20px rgba(29,185,84,0.30)'
          }
        }
      }
    };
  </script>
  <style>
    html { font-family: 'Poppins', 'Inter', 'Segoe UI', -apple-system, sans-serif; color: #0F172A; }
    body { overflow-x: hidden; }
    .glass { background: rgba(255,255,255,.78); border: 1px solid rgba(226,232,240,.8); backdrop-filter: blur(18px); -webkit-backdrop-filter: blur(18px); }
    .hero-grid {
      background-image:
        linear-gradient(rgba(255,255,255,.055) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,.055) 1px, transparent 1px),
        radial-gradient(circle at 85% 15%, rgba(29,185,84,.18), transparent 32%),
        radial-gradient(circle at 15% 70%, rgba(14,165,233,.15), transparent 30%);
      background-size: 72px 72px, 72px 72px, auto, auto;
    }
    .text-gradient { background: linear-gradient(135deg, #1DB954, #0EA5E9); -webkit-background-clip: text; background-clip: text; color: transparent; }
    .orb { position:absolute; border-radius:9999px; filter: blur(80px); pointer-events:none; }
    .section-label { display:inline-flex; align-items:center; gap:.5rem; border:1px solid rgba(29,185,84,.22); background:rgba(29,185,84,.07); color:#1DB954; padding:.42rem .9rem; border-radius:9999px; font-size:11px; font-weight:700; letter-spacing:.12em; text-transform:uppercase; }
    .service-card, .project-card, .price-card { transition: transform .24s ease, box-shadow .24s ease, border-color .24s ease; }
    .service-card:hover, .project-card:hover, .price-card:hover { transform: translateY(-5px); box-shadow: 0 12px 34px rgba(15,23,42,.12); border-color: rgba(29,185,84,.36); }
    .icon-box { display:grid; place-items:center; width:48px; height:48px; border-radius:14px; background:rgba(29,185,84,.1); color:#1DB954; }
    .portfolio-logo { max-height: 42px; width:auto; object-fit:contain; }
    .brand-marquee { overflow:hidden; border-top:1px solid #E2E8F0; border-bottom:1px solid #E2E8F0; }
    .brand-marquee-track { display:flex; width:max-content; gap:24px; animation:brandScroll 28s linear infinite; padding:8px 0; }
    .brand-marquee:hover .brand-marquee-track { animation-play-state:paused; }
    .brand-tile { width:160px; height:70px; flex:0 0 auto; display:flex; align-items:center; justify-content:center; border:1px solid #E2E8F0; border-radius:14px; background:#fff; padding:12px; }
    .brand-tile img { max-width:120px; max-height:44px; object-fit:contain; filter:grayscale(1); opacity:.6; transition:filter .3s, opacity .3s; }
    .brand-tile:hover img { filter:grayscale(0); opacity:1; }
    .brand-marquee-track-wrap { position:relative; }
    .brand-marquee-track-wrap::before, .brand-marquee-track-wrap::after { content:""; position:absolute; top:0; width:88px; height:100%; z-index:2; pointer-events:none; }
    .brand-marquee-track-wrap::before { left:0; background:linear-gradient(90deg, #fff, rgba(255,255,255,0)); }
    .brand-marquee-track-wrap::after { right:0; background:linear-gradient(270deg, #fff, rgba(255,255,255,0)); }
    @keyframes brandScroll { from { transform:translateX(-50%); } to { transform:translateX(0); } }
    @media (prefers-reduced-motion: reduce) {
      html { scroll-behavior: auto; }
      *, *::before, *::after { animation-duration:.001ms !important; animation-iteration-count:1 !important; transition-duration:.001ms !important; }
    }
  </style>
</head>
<body class="bg-white text-ink antialiased selection:bg-green/20">
  <a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-50 focus:rounded-xl focus:bg-white focus:px-4 focus:py-2 focus:shadow-e2 focus:ring-2 focus:ring-green">Skip to content</a>

  <header class="fixed left-0 right-0 top-0 z-50">
    <div class="mx-auto max-w-[1240px] px-4 pt-4">
      <nav class="glass flex items-center justify-between rounded-2xl px-4 py-3 shadow-e2 md:px-6">
        <a href="index.php" class="flex items-center" aria-label="iSoftro Solutions home">
          <img src="assets/isoftro-logo.png" alt="iSoftro Solutions" class="h-10 w-auto" />
        </a>
        <div class="hidden items-center gap-1 text-[13px] font-semibold text-ink/70 lg:flex">
          <a class="rounded-lg px-3 py-2 hover:bg-green/5 hover:text-green" href="index.php">Home</a>
          <a class="rounded-lg px-3 py-2 hover:bg-green/5 hover:text-green" href="services.php">Services</a>
          <a class="rounded-lg px-3 py-2 hover:bg-green/5 hover:text-green" href="expertise.php">Expertise</a>
          <a class="rounded-lg px-3 py-2 hover:bg-green/5 hover:text-green" href="index.php#brands">Portfolio</a>
          <a class="rounded-lg px-3 py-2 hover:bg-green/5 hover:text-green" href="pricing.php">Pricing</a>
          <a class="rounded-lg px-3 py-2 hover:bg-green/5 hover:text-green" href="#contact">Contact</a>
        </div>
        <div class="flex items-center gap-2">
          <a href="ecommerce-app.php" class="hidden rounded-full border border-green/30 px-4 py-2 text-[13px] font-semibold text-green transition hover:bg-green/5 sm:inline-flex">Ecommerce App</a>
          <a href="#contact" class="inline-flex items-center gap-2 rounded-full bg-green px-5 py-2.5 text-[13px] font-bold text-white shadow-glow transition hover:bg-green-dark">
            Start a Project
            <i data-lucide="arrow-right" class="h-4 w-4"></i>
          </a>
          <button id="menuToggle" class="grid h-10 w-10 place-items-center rounded-xl border border-bordergrey bg-white lg:hidden" aria-label="Toggle menu" aria-expanded="false" aria-controls="mobileMenu">
            <i data-lucide="menu" class="h-5 w-5"></i>
          </button>
        </div>
      </nav>
      <div id="mobileMenu" class="glass mt-2 hidden rounded-2xl p-3 text-[15px] font-semibold text-ink/75 lg:hidden">
        <a class="block rounded-xl px-3 py-3 hover:bg-green/5 hover:text-green" href="index.php">Home</a>
        <a class="block rounded-xl px-3 py-3 hover:bg-green/5 hover:text-green" href="services.php">Services</a>
        <a class="block rounded-xl px-3 py-3 hover:bg-green/5 hover:text-green" href="expertise.php">Expertise</a>
        <a class="block rounded-xl px-3 py-3 hover:bg-green/5 hover:text-green" href="index.php#brands">Portfolio</a>
        <a class="block rounded-xl px-3 py-3 hover:bg-green/5 hover:text-green" href="pricing.php">Pricing</a>
        <a class="block rounded-xl px-3 py-3 hover:bg-green/5 hover:text-green" href="#contact">Contact</a>
        <a class="block rounded-xl px-3 py-3 hover:bg-green/5 hover:text-green" href="ecommerce-app.php">Ecommerce App</a>
      </div>
    </div>
  </header>
