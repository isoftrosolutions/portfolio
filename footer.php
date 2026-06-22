<?php
$footerLinks ??= [
    ['url' => 'index.php', 'label' => 'Home'],
    ['url' => 'pricing.php', 'label' => 'Pricing'],
    ['url' => '#contact', 'label' => 'Contact'],
];
?>
<footer class="bg-navy text-white">
  <div class="mx-auto max-w-[1240px] px-5 py-16 md:px-8">
    <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4">
      <div class="sm:col-span-2 lg:col-span-1">
        <img src="assets/isoftro-logo.png" alt="iSoftro Solutions" class="h-10 w-auto brightness-0 invert" />
        <p class="mt-5 max-w-xs text-[14px] leading-7 text-white/62">Software agency and product studio building websites, mobile apps, ERP systems, SaaS platforms, AI chatbots, and custom software.</p>
      </div>
      <div>
        <h3 class="text-[14px] font-black uppercase tracking-[.12em] text-white">Services</h3>
        <div class="mt-4 grid gap-2 text-[14px] text-white/62">
          <a href="website-development.html" class="hover:text-green">Web Development</a>
          <a href="ecommerce-app.php" class="hover:text-green">Ecommerce App</a>
          <a href="saas-product-development.html" class="hover:text-green">SaaS Development</a>
          <a href="ai-chatbots-automation.html" class="hover:text-green">AI Automation</a>
        </div>
      </div>
      <div>
        <h3 class="text-[14px] font-black uppercase tracking-[.12em] text-white">Quick Links</h3>
        <div class="mt-4 grid gap-2 text-[14px] text-white/62">
          <?php foreach ($footerLinks as $link): ?>
            <a href="<?= e($link['url']) ?>" class="hover:text-green"><?= e($link['label']) ?></a>
          <?php endforeach; ?>
        </div>
      </div>
      <div>
        <h3 class="text-[14px] font-black uppercase tracking-[.12em] text-white">Contact</h3>
        <div class="mt-4 grid gap-2 text-[14px] text-white/62">
          <span>hello@isoftro.com</span>
          <span>Nepal</span>
          <a href="https://www.facebook.com/isoftro" target="_blank" rel="noopener" class="inline-flex items-center gap-2 hover:text-green" aria-label="iSoftro on Facebook"><i data-lucide="facebook" class="h-4 w-4"></i></a>
        </div>
      </div>
    </div>
    <div class="border-t border-white/10 px-5 py-5 mt-8 text-center text-[12px] text-white/45">Copyright 2026 iSoftro Solutions. All rights reserved.</div>
  </div>
</footer>

<script>
window.addEventListener('DOMContentLoaded', () => {
  if (window.lucide) window.lucide.createIcons();
});
</script>
</body>
</html>
