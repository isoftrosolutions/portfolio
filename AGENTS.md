# iSoftro Solutions — Portfolio Website

## Quick start

- **Local URL**: `http://localhost/my-website/`
- **Install/seeder**: hit `/install.php` once after DB setup (seeds admin, services, projects, products, pricing, testimonials, settings)
- **Admin**: `/admin/` — seed login `admin@isoftro.com` / `ChangeMe123!`
- **No build step** — raw PHP, Tailwind via CDN, Lucide icons via CDN

## Architecture

- **Single front-end**: `index.html` is the live landing page (static, design-focused). `ecommerce-app.php` is a dedicated ecommerce app landing page.
- **Admin CRUD**: single generic `admin/manage.php` reads `$_GET['module']`. Each subdirectory (`admin/services/`, `admin/products/`, etc.) is a 1-liner that sets the module and requires `manage.php`.
- **DB driver**: SQLite by default (`data/cms.sqlite`), MySQL for production. Switch via `DB_CONNECTION=mysql` env var. MySQL config in `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`.
- **Config**: `includes/config.php` returns an array — no `.env` file, uses `getenv()` with fallbacks.
- **Timezone**: `Asia/Kathmandu` (hardcoded in config)

## PHP conventions

- `declare(strict_types=1)` on every include file
- Prepared statements everywhere (`db()->prepare()`)
- CSRF on all POST forms via `csrf_field()` / `verify_csrf()`
- HTML escaping via `e(string): string` (wraps `htmlspecialchars`)
- Session-based flash messages via `flash_set()` / `flash_messages()`
- CMS queries go through `cms_all($table)` which only allows `services|projects|products|pricing_plans|testimonials`

## Seed data structure

`install.php` populates all tables in order: schema → admin → settings → services → projects → products → pricing → testimonials. Idempotent (checks `COUNT(*) > 0` before inserting).

## Dedicated service pages

Each service has its own page (`website-development.html`, `custom-web-applications.html`, `erp-crm-development.html`, `saas-product-development.html`, `ai-chatbots-automation.html`, `payment-integrations.html`, `ui-ux-product-design.html`, `maintenance-support.html`) with process, tech stack, and CTA. The ecommerce service links to `ecommerce-app.php`.

## Notable files

| File | Purpose |
|---|---|
| `index.html` | Static landing page (polished, design-focused) |
| `ecommerce-app.php` | Dedicated landing page with its own SEO/schema/lead form |
| `lead-submit.php` | POST handler for both contact forms |
| `install.php` | Schema + seeder (visit once after setup) |
| `admin/manage.php` | Generic CRUD for all modules |
| `includes/config.php` | All env-var config with fallbacks |
| `includes/db.php` | PDO singleton with SQLite/MySQL support |
| `includes/functions.php` | `e()`, `csrf_*()`, `cms_all()`, `flash_*()`, `json_list()`, `setting()` |
| `includes/auth.php` | `current_admin()`, `require_admin()`, `login_admin()`, `logout_admin()` |
| `sql/database.mysql.sql` | MySQL schema |
| `sql/database.sqlite.sql` | SQLite schema |

## Project detail pages

Static HTML files live in `projects/` (e.g. `projects/divyajyotish.html`). They contain full project writeups and are independent of the CMS.
