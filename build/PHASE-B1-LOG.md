# Phase B1 Log — Architecture Wiring + CSS Split
**Date:** 2026-05-27  
**Status:** COMPLETE — build passes, verification clean.

---

## Step 1 — main.css globs

Added to `main.css` after `@import-glob "./styles/custom/components/**/*.css";`:
```css
@import-glob "./theme/blocks/*/*.css";
@import-glob "./theme/template-parts/**/*.css";
```

---

## Step 2 — blocks.css split (4344 → 16 lines)

**31 per-block CSS files created** across 31 block directories.

Used section comment markers in `blocks.css` to split cleanly. Sections mapped 1:1 to block folders.

**Existing blocks (25 files written):**
- block-agitation, block-authority, block-contact-band, block-course-sheet, block-decisiveness, block-disqualifier, block-faq, block-goal-editorial (renamed), block-hero, block-hub-preview, block-included-list (renamed), block-known, block-mechanism, block-offer-list, block-osm-map, block-outcome, block-plan-steps, block-positioning, block-pricing-grid, block-pricing-narrative (renamed), block-prog-offer, block-services-grid, block-svc-cta-form, block-trust-strip (renamed), block-who

**Prog-fit rules (renamed who-*) appended to block-who.css.**  
**Prog-cases + prog-auth (renamed authority-*) appended to block-authority.css.**

**Future block stubs created (6 folders + css):**
- `theme/blocks/block-bundle-list/block-bundle-list.css` (renamed bundle-list-*)
- `theme/blocks/block-pricing-rates/block-pricing-rates.css` (renamed pricing-rates-*)
- `theme/blocks/block-warn-list/block-warn-list.css` (renamed warn-list-*)
- `theme/blocks/block-cs-archive/block-cs-archive.css` (cs-archive-* kept canonical)
- `theme/blocks/block-how-it-works/block-how-it-works.css` (renamed how-it-works-*)
- `theme/blocks/block-anti-positioning/block-anti-positioning.css` (renamed anti-positioning-*)

**Courses page section** (cs-archive rules) consolidated into `block-cs-archive/block-cs-archive.css`.

**Cross-block components moved to `components.css`:**
- `.spec-block` + `.spec` + `.spec-wide` + `.spec-figure` + `.spec-label` + `.spec-note`
- `.pagination`, `.pagination-page`, `.pagination-step`, `.pagination-ellipsis`
- `.sec-head-centered`
- `.ns-list`, `.ns-list-plus`, `.ns-list-bullet`
- `.indep-coda`

---

## Step 3 — Page-prefix class renames

**Render templates updated (4 files):**

| Block | Old root | New root |
|-------|----------|----------|
| block-included-list | `ot-included` | `included-list` |
| block-pricing-narrative | `ot-pricing` | `pricing-narrative` |
| block-goal-editorial | `prog-goal` | `goal-editorial` |
| block-trust-strip | `ct-trust` | `trust-strip` |

`block-prog-offer` kept `prog-offer-*` (canonical = block name).

**Future block CSS renames applied:**
- `.prog-fit-*` → `.who-*` (appended to block-who)
- `.prog-bundle-*` → `.bundle-list-*`
- `.prog-price-*` → `.pricing-rates-*`
- `.prog-warn-*` → `.warn-list-*`
- `.prog-cases-*` → `.cases-*` (authority variant)
- `.prog-auth-*` → `.authority-*` (authority variant)
- `.cs-first-*` → `.how-it-works-*`
- `.cs-who-*` → `.who-*`
- `.cs-anti-*` → `.anti-positioning-*`
- `.cs-gap` → `.archive-gap`
- `.cs-hero` → `.hero--courses`
- `.cs-hub` → `.hub--courses`

---

## Step 4 — template-parts CSS

**Created:**
- `theme/template-parts/global/hub/hub.css` (569 lines) — all `.lh-*` rules
- `theme/template-parts/global/article/article.css` (462 lines) — all `.ar-*` rules

---

## Step 5 — Build + verification

**Build:** `npm run production` — PASS (295ms, no errors)

**Page-prefix selector grep** (blocks/* + styles/custom/):
- Zero non-canonical page-prefix selectors in any CSS file
- `lh-*` in `hub.css` = canonical template-part vocabulary (not a violation)

**Render template grep** (block-*.php files):
- Zero old page-prefix class strings in render templates

**curl onsite-training:** 0 fatals. `.included-list`, `.pricing-narrative` classes rendering in HTML. Old `.ot-included`, `.ot-pricing` absent.

**curl classroom-training:** 0 fatals.

---

## UNCLEAR items for Dave

1. **`.prog-cases-*`** — no matching block or Linear issue. Audit mapped it to `.prog-auth` section (authority/testimonials on programming-services.html). Renamed to `.cases-*` and placed in `block-authority.css` as a variant. If Dave wants a separate `block-cases` block, Phase B2 can create it — the CSS is ready.

2. **`block-who` has two sets of `.who-*` rules** — original `block-who` section (from onsite/classroom pages) + appended `prog-fit` variant (from programming services). These use identical class names (`.who-title`, `.who-cols`, `.who-body`). If the layouts differ visually between pages, a variant modifier (`--prog` modifier via ACF) is needed. Flag for B2 block audit.

3. **Article single.php CSS (`ar-*`)** — these rules are in `theme/template-parts/global/article/article.css`. There is currently no `theme/template-parts/global/article/article.php` — the template file is `theme/single.php`. The glob will pick up the CSS correctly regardless of whether a matching PHP exists. No action required but noted.

---

## Files changed

**Modified:**
- `main.css` — +2 glob lines
- `styles/custom/components/blocks.css` — gutted to 16-line stub
- `styles/custom/components/components.css` — +~60 lines cross-block components
- `theme/blocks/block-included-list/block-included-list.php` — classes renamed
- `theme/blocks/block-pricing-narrative/block-pricing-narrative.php` — classes renamed
- `theme/blocks/block-goal-editorial/block-goal-editorial.php` — classes renamed
- `theme/blocks/block-trust-strip/block-trust-strip.php` — classes renamed

**Created (31 block CSS files):** see Step 2 above  
**Created (template-parts CSS):** `hub.css`, `article.css`
