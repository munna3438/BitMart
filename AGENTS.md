<bitmart-design-phase>
# BitMart — Design Process (READ FIRST, keep current)

This is the master record of BitMart's design phase. Before any UI work, read
`docs/design/bitmart-design-system.md` (the single source of truth) and this section.
Whenever the user changes ANY design decision, update BOTH this section and the
design doc immediately, then update the change log.

## Where we are

- **Phase 1 — Design System: ✅ complete** (v1.0).
- **Phase 2 — Visual direction mock: IN PROGRESS / ✅ homepage built for review.**
  Built in the current Laravel + Tailwind v4 stack (Blade) at `/` (`HomeController` →
  `resources/views/home.blade.php` + partials) so it's viewable now; translates to
  Next.js/Tailwind/shadcn later without redesign.
- Design system source of truth: `docs/design/bitmart-design-system.md`.
- **Only the homepage exists. Product/cart/checkout/admin pages are NOT created yet.**

## Design intent (always re-read full doc for details)

- **Product:** BitMart — modern, premium, trustworthy Bangladesh-focused e-commerce.
- **Core identity:** fresh emerald (`#047857`) primary; warm-green neutrals; single
  confined indigo AI accent (`#4F46E5`). AI is a natural shopping layer — never an AI-demo look.
- **Principles:** simplicity, trust (no fake stats/reviews/badges), fast feeling,
  mobile-first, familiar funnel + subtle AI innovation.
- **Rules to never violate:**
  - No large "AI POWERED" banners, neon/purple gradients, bots, or ChatGPT-style UI.
  - AI copy is the approved set only (e.g. `Search products or ask BitMart AI…`, `Picked for you`).
  - White text must sit on `primary-700`+, never `primary-600` (contrast gate).
  - Bangladesh content: `৳` BDT, realistic products (T-Shirt ৳890, Kurti ৳1,490, Sneakers ৳2,350).
  - Payments shown only if actually integrated (bKash, Nagad, Card, COD — never implied).
- **Tech direction:** React + Next.js + Tailwind v4 + shadcn/ui + Lucide icons
  (current repo is Laravel + Tailwind v4; tokens map 1:1 to `@theme`).

## Roadmap

1. Design system (tokens, colors, typography, spacing, radius, shadows, components,
   product card, nav, AI language, trust, responsive, motion, a11y) — DONE, v1.0.
2. Visual direction mock — single signature page (home) — DONE (Blade, viewable at `/`).
   Validates Direction; current home files: `resources/views/home.blade.php`,
   `resources/views/components/{icon,product-card}.blade.php`,
   `resources/views/components/layouts/app.blade.php`, `resources/views/partials/*`.
3. Implementation (Next.js + Tailwind + shadcn pages & flows).
4. AI features layered onto the existing visual language.

## Home page build notes (Phase 2)

- Route `/` → `HomeController@index` → `home.blade.php`.
- Homepage interactions are vanilla JS in `resources/js/app.js`: smart search panel,
  mobile search overlay, category drawer, add-to-cart + toast + counters, wishlist
  toggle, quick view sheet, AI assistant sheet (`data-ai-trigger` / `data-ai-prompt`
  buttons), skeleton loading on product grids, prompt → canned AI reply.
- Product images are icon placeholders in Tailwind tints (design mock stage — no CDN
  images yet); `x-icon` component renders lucide-style inline SVGs.
- Build via DDEV: `ddev npm run build` (Node 24 in container).

## Keep updated when the user changes anything

When the user says something changes (colors, fonts, spacing, copy, phase progress,
new components, AI behavior), update: (1) this section's status/notes, (2)
`docs/design/bitmart-design-system.md` relevant token/component, and (3) the
Change Log in the doc. Confirm to the user that the design record is updated.
</bitmart-design-phase>
<laravel-boost-guidelines>
# Laravel Application

This repository contains a Laravel application. Complete the following setup before working on the user's request.

## Prerequisites

Verify that PHP and Composer are available:

```sh
php -v
composer -V
```

If either command is unavailable, detect the user's operating system and install the prerequisites with the appropriate command:

macOS:

```sh
/bin/bash -c "$(curl -fsSL https://php.new/install/mac/8.5)"
```

Windows PowerShell:

```powershell
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.5'))
```

Linux:

```sh
/bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.5)"
```

After installation, ask the user to restart their terminal. If the agent needs the restarted shell to continue, ask the user to reopen their terminal and rerun their original prompt.

## Agent Setup

Install Laravel Boost from the application root before making application changes:

```sh
composer require laravel/boost --dev
php artisan boost:install
```

Boost replaces these bootstrap instructions with guidelines tailored to the application. After installation, read `AGENTS.md` again and continue with the user's original request using the generated guidelines.
</laravel-boost-guidelines>
