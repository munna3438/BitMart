# BitMart Design System

**Version:** 1.0 — Phase 1 · Design tokens & components (no pages yet)
**Tagline:** Modern e-commerce + smart shopping + Bangladesh-focused + trustworthy + fast.

---

## 1. Product Vision

BitMart is a personal e-commerce business for the Bangladesh market built for future scale.

AI-powered shopping assistance (AI search, shopping assistant, personalization, support, seller tools) is a **natural layer** of the shopping experience — never the identity of the brand.

> A customer's first impression should be: *"This is a modern e-commerce website, but it has some smart features that make shopping easier."*

### 1.1 Core principles (decision gates)

| Principle | Meaning |
|---|---|
| **Simplicity first** | Fewer sections, buttons, decorations. Every important action is obvious. |
| **Trust first** | Clear price, stock, delivery, return info. **No fake stats, reviews, counts, or badges.** |
| **Fast feeling** | Clean layout, skeleton loading, lightweight, minimal animation. |
| **Mobile first** | Mobile is the baseline. Desktop is an expanded mobile, never the reverse. |
| **Familiar + innovative** | Keep the familiar funnel: Home → Category → Product → Cart → Checkout → Order. AI improves it, doesn't replace it. |

### 1.2 AI principle

- AI is **highly discoverable but never overwhelming**.
- No large "AI" labels everywhere, no bots, no neon, no sci-fi, no ChatGPT look.
- AI enters through **existing shopping interactions**: search, product Q&A, recommendations, support.

**Approved AI copy** ("BitMart AI" is the only allowed product name):
- `Search products or ask BitMart AI…`
- `Not sure what to choose? Ask BitMart AI`
- `Find what you need`
- `Picked for you`
- `Need help choosing?`
- `Ask BitMart AI`

---

## 2. Color System

One strong primary brand color (emerald) + a small supporting palette. Warm-green neutrals. One confined indigo accent reserved for AI.

### 2.1 Primary — "BitMart Emerald"

Fresh, premium, trustworthy; echoes the Bangladesh flag's green without copying any competitor.

| Token | Hex | Roles |
|---|---|---|
| `primary-50` | `#ECFDF5` | Primary tint backgrounds, chips |
| `primary-100` | `#D1FAE5` | Primary tint borders, hover surfaces |
| `primary-200` | `#A7F3D0` | Progress, decorative fills |
| `primary-500` | `#10B981` | Icons/highlights on dark tint only |
| `primary-600` | `#059669` | Hover tint, large decorative |
| `primary-700` | `#047857` | **Primary actions, links, focus** (action base) |
| `primary-800` | `#065F46` | **Action hover** |
| `primary-900` | `#064E3B` | **Action active/pressed** |

> Contrast rule: white text on `primary-700` = **5.5:1 (AA/AAA)**. Never use white text on `primary-600` or lighter.

### 2.2 Secondary — warm sand

Used sparingly for warmth in illustrations, sale highlights (never as a full brand takeover).

| Token | Hex | Roles |
|---|---|---|
| `secondary-100` | `#FBF3E4` | Warm tint surfaces |
| `secondary-500` | `#D9A23E` | Accents, minor highlights |
| `secondary-700` | `#A06E1F` | Text/icons on light (≥4.5:1) |

### 2.3 AI accent — indigo (confined to AI surfaces)

| Token | Hex | Roles |
|---|---|---|
| `ai-50` | `#EEF2FF` | AI panel/suggestion background |
| `ai-100` | `#E0E7FF` | AI badge bg, AI borders |
| `ai-500` | `#6366F1` | AI icons on light, large decorative |
| `ai-600` | `#4F46E5` | AI action buttons, AI text links |
| `ai-700` | `#4338CA` | AI hover |

> ai-600 on white = **6.3:1**. AI color never appears outside AI contexts.

### 2.4 Status colors

| Token | Hex | Text/icon on white | Tint bg |
|---|---|---|---|
| `success-700` / `success-50` | `#15803D` / `#F0FDF4` | success text & icons | success surfaces |
| `warning-700` / `warning-100` | `#B45309` / `#FEF3C7` | warning text & icons | warning surfaces |
| `error-700` / `error-50` | `#B91C1C` / `#FEF2F2` | error text & icons | error surfaces |
| `info-700` / `info-50` | `#0369A1` / `#F0F9FF` | info text & icons | info surfaces |

Use the `-700` value for any color-coded text/icon on light backgrounds so contrast stays ≥4.5:1.

### 2.5 Neutral scale — warm green-gray

| Token | Hex | Roles |
|---|---|---|
| `neutral-0` | `#FFFFFF` | App background |
| `neutral-50` | `#F8FAF9` | Page background (alternate) |
| `neutral-100` | `#F1F4F2` | Subtle surfaces, hover |
| `neutral-200` | `#E4E9E6` | Borders (light components) |
| `neutral-300` | `#CBD5D1` | Borders (standard), dividers |
| `neutral-400` | `#9CA8A2` | Disabled only — never content text |
| `neutral-500` | `#74817B` | Placeholder, captions ≥16px bold/large |
| `neutral-600` | `#56625C` | Secondary text (6.4:1) |
| `neutral-700` | `#3D4A44` | Body text |
| `neutral-800` | `#26312C` | Strong body text |
| `neutral-900` | `#16211C` | Headings, emphasis |
| `neutral-950` | `#0C1511` | Near-black, dark surfaces |

### 2.6 Semantic tokens (UI go-tos)

| Token | Value used | Purpose |
|---|---|---|
| `bg-app` | `neutral-0` | Default page |
| `bg-subtle` | `neutral-50` | Alternating sections |
| `surface` | `neutral-0` | Cards, overlays |
| `border` | `neutral-300` | Standard borders |
| `border-subtle` | `neutral-200` | Light borders |
| `text-primary` | `neutral-900` | Headings |
| `text-body` | `neutral-800` | Body |
| `text-secondary` | `neutral-600` | Secondary |
| `text-muted` | `neutral-500` | Captions (large only) |
| `text-disabled` | `neutral-400` | Disabled |

**Accessibility gate:** any interactive control must meet WCAG AA 4.5:1 (normal) / 3:1 (large) on its background. Default `text-body` = >12:1 on white.

---

## 3. Typography

### 3.1 Fonts

| Token | Family | Use |
|---|---|---|
| `--font-sans` | `Inter` (wght 400–800), fallback system | Latin text |
| `--font-bengali` | `Hind Siliguri` → `Noto Sans Bengali` | Bangla text |

**Bangla rules:** Bangla is taller and denser — render Bangla ≥0.125rem larger and line-height +0.15 vs. the same Latin role. Applies when a string is primarily Bangla.

### 3.2 Type scale (mobile → desktop, fluid `clamp`)

| Token | Size / line-h | Weight | Tracking | Use |
|---|---|---|---|---|
| `display` | clamp(2.25rem, 2rem+2vw, 3.5rem) / 1.15 | 700 | -0.02em | Page hero |
| `h1` | clamp(1.75rem, 1.5rem+1vw, 2.25rem) / 1.2 | 700 | -0.02em | Page titles |
| `h2` | 1.5rem→1.875rem / 1.25 | 700 | -0.01em | Section titles |
| `h3` | 1.25rem→1.5rem / 1.3 | 600 | 0 | Card/block titles |
| `h4` | 1.125rem→1.25rem / 1.35 | 600 | 0 | Sub-blocks |
| `body-lg` | 1.125rem / 1.6 | 400 | 0 | Lead, descriptions |
| `body` | 1rem / 1.5 | 400 | 0 | Default |
| `body-sm` | 0.875rem / 1.5 | 400 | 0 | Dense UI, list rows |
| `caption` | 0.8125rem / 1.5 | 400 | 0 | Helpers, timestamps |
| `button` | 0.9375rem / 1 | 600 | 0 | Buttons |
| `label` | 0.8125rem / 1.25 | 600 | 0 | Field labels, tabs |
| `price` | 1.25rem / 1.3 | 700 | 0 | Product card price |
| `price-lg` | 1.5rem / 1.3 | 700 | 0 | PDP price |
| `product-title` | 0.9375rem / 1.4 | 500 | 0 | Card title |
| `product-title-lg` | 1.125rem / 1.4 | 500 | 0 | PDP title |

**Price rendering:** render BDT with currency glyph `৳` then amount — `৳890`. Use tabular numerals (`font-variant-numeric: tabular-nums`) so cart totals don't jitter.

---

## 4. Spacing System

4px base. Tokens only — never arbitrary values.

### 4.1 Scale

| Token | px | Typical use |
|---|---|---|
| `space-1` | 4 | Micro gap inside badges |
| `space-2` | 8 | Icon↔text gap, tight clusters |
| `space-3` | 12 | Input↔input, small vertical rhythm |
| `space-4` | 16 | Default gap, small card padding |
| `space-5` | 20 | Component internal gutters |
| `space-6` | 24 | Standard card padding, list gaps |
| `space-8` | 32 | Modal/drawer padding, section inset |
| `space-10` | 40 | Large block rhythm |
| `space-12` | 48 | Section vertical spacing |
| `space-16` | 64 | Page section spacing |
| `space-20` | 80 | Hero / major section rhythm |

### 4.2 Layout rhythm

- Mobile page gutter: `space-4` (16px) → `space-6` (24px) tablets → `space-8` (32px) desktop.
- Section vertical spacing: 48px mobile / 64px / 80px desktop.
- Cards: padding `space-6` standard, `space-4` dense (cart/order rows).
- Form field stacking: `space-4` (16px) between fields; button rows `space-6` below.
- Consistent gap of `space-2`/`space-3` between icon + adjacent text everywhere.

---

## 5. Border Radius

Medium, consistent. No "bubble" UI.

| Token | px | Use |
|---|---|---|
| `rad-xs` | 4 | Tiny chips, dot indicators |
| `rad-sm` | 6 | Badges, small controls |
| `rad-md` | 8 | Buttons, inputs, selects, dropdowns |
| `rad-lg` | 12 | Cards, product cards, filters |
| `rad-xl` | 16 | Modals, drawers, bottom sheets, featured cards |
| `rad-full` | 9999 | Promo chips, avatars only |

Rule: modals/drawers on mobile use square bottom corners + 16px top.

---

## 6. Shadow System

Borders and spacing carry the hierarchy; shadows are subtle elevation.

| Token | Value |
|---|---|
| `shadow-xs` | `0 1px 2px rgb(16 24 20 / 0.05)` |
| `shadow-sm` | `0 1px 2px rgb(16 24 20 / 0.06), 0 2px 4px rgb(16 24 20 / 0.04)` |
| `shadow-md` | `0 2px 8px rgb(16 24 20 / 0.08), 0 1px 2px rgb(16 24 20 / 0.06)` |
| `shadow-lg` | `0 8px 24px rgb(16 24 20 / 0.12), 0 2px 8px rgb(16 24 20 / 0.06)` |

Usage map: cards `shadow-sm` (hover → `shadow-md`); modals/drawers `shadow-lg`; product cards rely on borders, `shadow-sm` only on hover.

---

## 7. Component System

All components are mobile-first, font follow the type scale, spacing follows tokens, colors follow semantics. Touch targets ≥44px (48px on mobile).

### 7.1 Buttons

Base: medium radius, 600 weight, 2.5px–3px min-height for lg, `quiet` loading state, focus ring, min-width for single-line safety.

| Variant | Style |
|---|---|
| Primary | bg `primary-700`, text white, hover `primary-800`, active `primary-900` |
| Secondary | bg `neutral-100`, text `neutral-900`, border `neutral-200` or none, hover `neutral-200` |
| Outline | white bg, border `neutral-500`, text `neutral-800`, hover bg `neutral-50` |
| Ghost | transparent, text `neutral-700`, hover bg `neutral-100` |
| Destructive | bg `error-700`, text white, hover `error-800` |
| AI action | bg `ai-600`, text white, sparkle icon, hover `ai-700` |
| Icon button | 40px/48px square, `rad-md`, ghost style, visible label via `aria-label` |
| Loading button | content hidden, small spinner; do not shrink width (keep min-width) |

Sizes: `sm` 32px, `md` 40px, `lg` 48px. Disabled: bg `neutral-300`, text `neutral-500`, no shadow.

### 7.2 Inputs

`rad-md`, border `neutral-300`, height ≥44px, label above, helper `caption`, error message `error-700`. Styles:

- **Text input** — default.
- **Search input** — search icon left, rounded `rad-full` on header, `rad-md` in filters.
- **AI search input** — same as search + compact sparkle + "Ask BitMart AI" affordance right (isn't visibly dominant).
- **Number input** — spinner + up/down steppers (48px targets) for quantity.
- **Password input** — show/hide toggle.
- **Textarea** — body-sm/lg, 3 rows min.

### 7.3 Selects

- **Select**: single, chevron, `rad-md`.
- **Multi-select**: checkbox chips or tag-mode list.
- **Searchable select**: text filter + option list, used for address districts (Dhaka, Chattogram, Khulna…).

### 7.4 Cards

| Card | Spec |
|---|---|
| Standard | white, border `neutral-300`, `rad-lg`, `shadow-sm`, padding `space-6` |
| Product card | *see Section 8* |
| AI feature card | `ai-50` bg, `ai-100` border, sparkle icon slot, headline + 1-line body + optional action |
| Recommendation card | product card + `Picked for you` label slot |
| Order card | status row, lines, total, actions (track / reorder) |
| Information card | icon + title + caption (trust info) |

### 7.5 Badges

Small, `rad-xs`, 400–600 weight, single color chip. **Do not stack badges on product cards.**

| Badge | Style |
|---|---|
| New | `primary-100` text `primary-900` |
| Sale | `error-50` text `error-700` |
| Popular | `secondary-100` text `secondary-700` |
| Out of stock | `neutral-100` text `neutral-600` |
| Low stock | `warning-100` text `warning-700` |
| AI rec | `ai-100` text `ai-700` + sparkle icon |

### 7.6 Feedback

- **Alert**: tinted bg + status icon + message; `caption` body; closable for non-critical.
- **Success**: `success-50` + check icon + `success-700` text.
- **Warning / Error / Info**: same pattern with their `-50`/`-700` pair.
- **Toast**: `shadow-lg`, `rad-lg`, bottom-sheet on mobile / top-right on desktop, auto-dismiss 3-4s unless actionable.
- **Confirmation dialog**: title `h4`, message `body-sm`, two full-width buttons on mobile.

### 7.7 Navigation

- **Header** — *see Section 9*.
- **Desktop nav**: horizontal category links 44px min height.
- **Mobile nav**: bottom tab bar `neutral-0`, top border, 5 icons (`Home`, `Categories`, `Search`, `AI`, `Account`), active state `primary-700`; AI tab uses indigo when active.
- **Breadcrumb**: caption/body-sm, `Home / Category / Product`.
- **Tabs**: underline style, `body-sm` 600, 8px underline `primary-700`.
- **Dropdown**: panel `neutral-0`, `shadow-md`, `rad-lg`, 12px pad.
- **Pagination**: IDF style, icon prev/next + page numbers, current `primary-700`; mobile uses “Load more”.

### 7.8 Loading states

- **Skeleton cards**: shimmer blocks — image ratio box, 2 title lines, price bar (no pulsing, subtle shimmer at 1.5s ease).
- **Product skeleton**: same as card skeleton on PDP blocks.
- **Page skeleton**: scaffold of section skeletons matching page layout.
- **Button loading**: spinner.
- **AI response loading**: copy states are static, no shimmer libraries:

> `BitMart AI is finding the best matches…`

> `BitMart AI is thinking…`

Each AI state: `ai-50` card, small sparkle (breathing not>1 rotate per 2s), no skeleton shimmer.

### 7.9 Overlays

- **Modal** — centered, `rad-xl`, `shadow-lg`, 32px pad; mobile = full-width sheet with square bottom corners; focus trap + Esc close.
- **Drawer** — right side (or left for nav), 24px pad, `rad-lg` top-left corners.
- **Bottom sheet** — mobile main drawer pattern; grabber 32×4 `neutral-300` top.
- **Confirmation dialog** — same as modal.

---

## 8. Product Card

Mobile-first grid unit — the highest-frequency component. One card = one image, one CTA.

| Slot | Spec |
|---|---|
| Image | 4:3 ratio (default), `rad-lg` top, white bg, object-fit cover |
| Title | `product-title`, max 2 lines, `neutral-800` |
| Price | `price` `neutral-900` `৳` prefix |
| Original price | `caption` `neutral-400` strikethrough (only when discount real) |
| Discount | inline chip “-22%” `error-50`/`error-700` — only near price, not at top |
| Rating | star icon + `caption` value (e.g. `4.6`); show count only if real (e.g. `(312)`) |
| Stock | 1-line `caption`; `Out of stock` → text `neutral-500`; `In stock` hidden (clean) |
| Wishlist | top-right icon button overlay (48px) with active heart state |
| Quick view | appears on hover on card bottom (desktop); on mobile opens bottom sheet |
| Add to cart | bottom full-width `button` (mobile) / primary on hover (desktop); replaces with quantity stepper after add |
| Personalization label | single badge slot from 7.5 — e.g. `Picked for you`, `New`, `Selling fast` |

**Rules:** max 1 badge; never fake review counts; image auto-aspect; 2-col mobile grid, 3-col `md`, 4-col `lg`, 5-col `xl`.

---

## 9. Header & Footer

### 9.1 Header — desktop

Row 1 (primary): Logo `BitMart` (text logo, `display`-scale, `primary-700` wordmark + small cart sparkle) · [Categories ▾] · [Smart search (flex-grow, `rad-full`, `neutral-100`, search icon + sparkle + placeholder `Search products or ask BitMart AI…`)] · Wishlist icon · Cart icon with badge (count) · Account menu.

Row 2 (secondary, `neutral-50`): horizontal category & promo links (Men, Women, Panjabi & Kurta, Footwear, Home & Living, Electronics, Beauty, Offers).

Search is a major navigation element: flexible width, enters focus on `Cmd+K`.

### 9.2 Header — mobile

Compact sticky row: Logo · [Search icon] · [Cart icon with count]. Bottom tab bar fixed (Home / Categories / Search / AI / Account). Tapping search opens full search overlay (big input at top + suggested/AI chips).

AI entry: tab in bottom bar + sparkle inside search, never a banner. `AI` tab opens assistant panel via bottom sheet.

### 9.3 Footer

Desktop grid 4-5 columns (About BitMart / Customer Support / Policies / Contact & Social) + payment row.

Links (real pages only — no dead links to demo): About · How to Order · Delivery Info · Return Policy · Privacy Policy · Terms & Conditions · Help Center · Contact.

Payment row: show supported real methods only — `bKash`, `Nagad`, `Card (Visa/Mastercard)`, `Cash on Delivery`. Once a gateway is actually integrated, mark it; do not imply integrations that don't exist.

Bottom bar: `© year BitMart · Made in Bangladesh`.

---

## 10. AI Visual Language

### 10.1 Icons

- Single `Sparkles` (lucide `sparkles`, 14–24px) — gate for ALL AI surfaces.
- No robots, brains, or sci-fi.

### 10.2 Surfaces

- **AI badge**: `ai-100` bg, `ai-700` text, sparkle icon. Micro only.
- **AI buttons**: `ai-600` bg, white text, sparkle left.
- **AI cards/panels**: `ai-50` bg, `ai-100` border, `rad-lg`.
- **AI text**: `ai-700` inline links (underline on hover).
- **AI input**: search + sparkle right.

### 10.3 Do / Don't

- **Do**: seat AI in search, recommendations, support, product Q&A.
- **Do**: nudge with copy like `Picked for you` / `Ask BitMart AI`.
- **Don't**: neon gradients, purple spray, glowing, `AI-POWERED` banners, chatbot-first layouts, `.well AI` everywhere.

---

## 11. Trust Components

Reusable, shown "when needed", never a trust-badge wall. All copy must be truthful — **no fake counts/stats**.

| Component | Look | Where |
|---|---|---|
| Secure payment | info/neutral icon + caption "Secure payment" | Checkout summary |
| Cash on delivery | circle-check icon + "Cash on Delivery available" | PDP + checkout option |
| Easy return | refresh icon + "7-day easy return" | PDP accordion |
| Delivery info | truck icon + "Delivery in Dhaka 1–3 days" | PDP |
| Customer support | headset icon + "24/7 support" + chat link | Footer, PDP |
| Verified reviews | verified badge next to review count (real numbers only) | Reviews section |
| Product authenticity | shield-check + "Genuine product" only if verified true | Selected PDPs |

---

## 12. Responsive Rules

| Breakpoint | Min-width | Behavior |
|---|---|---|
| `sm` | 480px | Small-mobile → card grids 2-col |
| `md` | 768px | Tablets → sidebar layouts, header grows, desktop nav appears |
| `lg` | 1024px | Laptop → 3-4 col grids, hover quick-view enabled |
| `xl` | 1280px | Desktop → full width, 5-col product grid |
| `2xl` | 1440px | Large desktop → max container 1320px centered |

Rules: touch targets ≥44px (48px mobile) on mobile; hamburger/nav stays icon-above 768; bottom tab bar only `<lg`; filters inline on mobile (drawer for many), inline clearly from `lg`.

---

## 13. Micro-Interactions

Short (`120–250ms`), smooth (`ease-out`), purposeful. No idle/marquee decorations.

| Event | Behavior |
|---|---|
| Add to cart | button → 0.12s scale + cart icon bounce; toast 0.3s |
| Wishlist | heart toggles with 0.15s pop |
| Search | input expands on focus; chips enter on type |
| AI suggestions | panel fades in 0.2s; copy appears statically |
| Loading | shimmer 1.5s ease-loop; never >2s before content |
| Success | alert/toast 0.25s in |
| Navigation | route change fade 0.1s; no barrel-spline |

---

## 14. Accessibility Rules

- Lipstick layering: **color is never the only signal** — icon + text.
- Focus: visible 2px `primary-700` ring, 2px offset on all interactive elements.
- Keyboard: full tab flow, Esc closes overlays, Enter activates.
- Labels: every field has a visible label or `aria-label`; containers named via `aria-*`.
- Errors: text (not color-only) + `role="alert"` or inline; never silent.
- Motion: `prefers-reduced-motion` → no animation, content animates instantly.
- Touch: 44px min targets, adequate spacing between.
- Contrast: AA minimum (4.5:1 normal / 3:1 large), verified in tokens (§2).

---

## 15. Technology Mapping

Target stack: React + Next.js + Tailwind CSS (v4) + shadcn/ui + Lucide icons. Tokens map 1:1 to Tailwind `@theme` CSS variables → configurable via `--color-primary-700: #047857;` etc. Components are modular, no bespoke UI libraries.

---

## 16. Realistic Content Baseline (BD)

| Category | Product | Price |
|---|---|---|
| Men | Premium Cotton T-Shirt | ৳890 |
| Men | Casual Shirt | ৳1,290 |
| Men | Panjabi | ৳1,850 |
| Women | Kurti | ৳1,490 |
| Footwear | Casual Sneakers | ৳2,350 |

Category set: Men's Fashion · Women's Fashion · Panjabi & Kurta · Footwear · Home & Living · Electronics · Beauty & Personal Care · Grocery.

Currency: `৳` BDT, no decimals for normal prices.

---

## 17. Phase Roadmap

- **Phase 1 — Design system (✅ current):** tokens, colors, typography, space, radius, shadows, components, product card, header/footer, AI language, trust, responsive, motion, a11y. No pages.
- **Phase 2 — Visual direction mock:** signature page (home) in HTML/React to validate the direction.
- **Phase 3 — Implementation:** Next.js + Tailwind + shadcn build-out of pages & flows.
- **Phase 4 — AI features:** integrate AI search/assistant/support/seller tools using the existing visual language.

---

## 18. Change Log

- **v1.0** — Initial design system established (tokens, components, AI language, trust, responsive, motion, a11y). No pages created.