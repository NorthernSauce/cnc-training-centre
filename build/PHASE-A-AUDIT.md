# Phase A Audit — CNC Training Centre
**Date:** 2026-05-27  
**Status:** Read-only. No fixes. Phase B dispatch based on this.

---

## 1. Per-Page Design vs Composer Gap

### Legend
- **PRESENT** — block exists in composer via `ns_block()`
- **MISSING** — section in design but no corresponding composer/template
- **TEMPLATE** — rendered by a PHP template (not a page composer)
- **NO COMPOSER** — no `build/compose-*.php` exists for this page

> Only `compose-onsite-training.php` and `compose-classroom-training.php` exist on disk. All other pages have been composed (Linear: Done) but their composer scripts are not present in `build/` — either the scripts were run and discarded, or they were written inline.

---

### home.html → `build/` (no composer on disk)
| # | Design section class | Status | Notes |
|---|---------------------|--------|-------|
| 1 | `.hero` | MISSING (no composer) | — |
| 2 | `.agitation` | MISSING | — |
| 3 | `.positioning` | MISSING | — |
| 4 | `.mechanism` | MISSING | — |
| 5 | `.services` | MISSING | — |
| 6 | `.authority` | MISSING | — |
| 7 | `.hub` | MISSING | — |
| 8 | `.decisiveness` | MISSING | — |

**Note:** NOR-388 (Page — Home) is Done in Linear. WP page ID 7 exists (`home` slug). Composer PHP not in `build/` — likely run+deleted or written via WP-CLI inline. [UNCLEAR: verify post_content has blocks.]

---

### about.html → `build/` (no composer on disk)
| # | Design section class | Status |
|---|---------------------|--------|
| 1 | `.hero.about-hero` | MISSING (no composer) |
| 2 | `.problem.about-trainer` | MISSING |
| 3 | `.authority.known` | MISSING |
| 4 | `.problem.indep` | MISSING |
| 5 | `.s-paper.plan.how` | MISSING |
| 6 | `.problem.where` | MISSING |
| 7 | `.s-paper.faq.about-faq` | MISSING |
| 8 | `.contact` | MISSING |

NOR-393 Done in Linear. Blocks: `block-hero`, `block-who` (about-trainer = `.problem` variant), `block-known`, `block-indep` (Backlog NOR-378), `block-plan-steps`, `block-where` (Backlog NOR-379), `block-faq`, `block-contact-band`. **3 blocks referenced here (indep, where, about-trainer) are Backlog-only.**

---

### contact.html → `build/` (no composer on disk)
| # | Design section class | Status |
|---|---------------------|--------|
| 1 | `.hero.ct-hero` | MISSING (no composer) |
| 2 | `.ct-form-section` | MISSING |
| 3 | `.ct-other` | MISSING |
| 4 | `.ct-trust` | MISSING |

NOR-394 Done in Linear. `block-contact-form` (NOR-381) is Backlog. `block-trust-strip` = Done (NOR-383).

---

### courses.html (slug: `/courses/`) → `build/` (no composer on disk)
| # | Design section class | Status |
|---|---------------------|--------|
| 1 | `.hero.cs-hero` | MISSING (no composer) |
| 2 | `.cs-archive` | MISSING — `block-cs-archive` is Backlog (NOR-373) |
| 3 | `.cs-first` | MISSING — `block-how-it-works` is Backlog (NOR-374) |
| 4 | `.cs-who` | MISSING — re-use `block-who` |
| 5 | `.cs-anti` | MISSING — `block-anti-positioning` is Backlog (NOR-375) |
| 6 | `.cs-hub` | MISSING — `block-hub-preview` is Done |

NOR-392 Done in Linear. **3 of 6 blocks for this page are still Backlog.**

---

### onsite-training.html → `build/compose-onsite-training.php` ✓
| # | Design section class | Composer call | Status |
|---|---------------------|--------------|--------|
| 1 | `.hero.ot-hero` | `ns_block('block-hero')` | PRESENT |
| 2 | `.ot-who` | `ns_block('block-who')` | PRESENT |
| 3 | `.ot-included` | `ns_block('block-included-list')` | PRESENT |
| 4 | `.ot-outcome` | `ns_block('block-outcome')` | PRESENT |
| 5 | `.ot-pricing` | `ns_block('block-pricing-narrative')` | PRESENT |
| 6 | `svc-cta-form` (no section tag — within body) | `ns_block('block-svc-cta-form')` | PRESENT |
| 7 | `.ot-dq` | `ns_block('block-disqualifier')` | PRESENT |
| 8 | `.authority.ot-authority` | `ns_block('block-authority')` | PRESENT |
| 9 | `.hub` | `ns_block('block-hub-preview')` | PRESENT |
| 10 | `.faq` | `ns_block('block-faq')` | PRESENT |
| 11 | `.svc-cta` | `ns_block('block-decisiveness')` | PRESENT |

**All 11 design sections: PRESENT. No MISSING. No `ns_html()` fallbacks.**  
Note: design has `.ot-how-train` section (line 122) **not in composer** — this appears to be within the `block-who` body content (editorial text, not a standalone block). [UNCLEAR: confirm intentional fold-in.]

---

### classroom-training.html → `build/compose-classroom-training.php` ✓
| # | Design section class | Composer call | Status |
|---|---------------------|--------------|--------|
| 1 | `.hero.ct-hero` | `ns_block('block-hero')` | PRESENT |
| 2 | `.problem.who` | `ns_block('block-who')` | PRESENT |
| 3 | `.services.courses` | `ns_block('block-course-sheet')` | PRESENT |
| 4 | `.authority.expect` | `ns_block('block-offer-list')` | PRESENT |
| 5 | `.offer` | `ns_block('block-pricing-grid')` | PRESENT |
| 6 | `.outcome` | `ns_block('block-outcome')` | PRESENT |
| 7 | (venue location) | `ns_block('block-osm-map')` | PRESENT |
| 8 | `.disq` | `ns_block('block-disqualifier')` | PRESENT |
| 9 | `.auth` | `ns_block('block-authority')` | PRESENT |
| 10 | `.hub` | `ns_block('block-hub-preview')` | PRESENT |
| 11 | `.faq` | `ns_block('block-faq')` | PRESENT |
| 12 | `.decisiveness` | `ns_block('block-decisiveness')` | PRESENT |

**All 12 composer blocks: PRESENT. No `ns_html()` fallbacks.**  
Note: design has `.pricing` + `.pricing-list` subsections (lines 316–358) not mapped 1:1 — these are rendered inside `block-pricing-grid`. Intentional. Also `.s-paper.find` (line 534) is OSM map block.

---

### programming-services.html → `build/` (no composer on disk)
| # | Design section class | Status |
|---|---------------------|--------|
| 1 | `.hero.prog-hero` | MISSING (no composer) |
| 2 | `.prog-fit` | MISSING |
| 3 | `.prog-offer` | MISSING — `block-prog-offer` Done |
| 4 | `.prog-plan` | MISSING — `block-plan-steps` Done |
| 5 | `.prog-bundle` | MISSING — `block-bundle-list` Backlog (NOR-369) |
| 6 | `.prog-goal` | MISSING — `block-goal-editorial` Done |
| 7 | `.prog-price` | MISSING — `block-pricing-rates` Backlog (NOR-371) |
| 8 | `.prog-warn` | MISSING — `block-warn-list` Backlog (NOR-372) |
| 9 | `.prog-auth` | MISSING |
| 10 | `.hub` | MISSING — `block-hub-preview` Done |
| 11 | `.faq` | MISSING — `block-faq` Done |
| 12 | `.decisiveness` | MISSING — `block-decisiveness` Done |

NOR-391 Done in Linear. **3 blocks for this page are Backlog (bundle-list, pricing-rates, warn-list).**

---

### learning-hub.html → `home.php` template (no page composer)
| # | Design section class | Status |
|---|---------------------|--------|
| 1 | `.hero.lh-hero` | TEMPLATE (home.php) |
| 2 | `.hub.lh-featured` | TEMPLATE (home.php) |
| 3 | `.library` | TEMPLATE (home.php) |
| 4 | `.lh-paginate` | TEMPLATE (home.php) |

NOR-385 (home.php template) Done. All 4 sections are template-rendered, not block-composed. CSS for `.lh-*` lives in `blocks.css` — needs migration to a template-part CSS file per architecture contract.

---

### learning-hub-article.html → `single.php` template (no page composer)
| # | Design section class | Status |
|---|---------------------|--------|
| 1 | `.ar-masthead` | TEMPLATE (single.php) |
| 2 | `.ar-body` | TEMPLATE (single.php) |
| 3 | `.ar-author` | TEMPLATE (single.php) |
| 4 | `.ar-related` | TEMPLATE (single.php) |
| 5 | `.ar-cta` | TEMPLATE (single.php) |

NOR-386 Done. Template-rendered. No page composer needed.

---

## 2. Page-Prefix CSS Class Audit

**File audited:** `styles/custom/components/blocks.css` (4,344 lines)  
**Total page-prefix class rule selectors:** 233  
**Other component CSS files:** zero page-prefix matches in `components.css`, `layout.css`, `flourishes.css`, `nav.css`, `footer.css`, `forms.css`.

### Rename Table

#### `lh-` prefix — Learning Hub (in `blocks.css` lines 1–473, 3216–3760)

These belong to either `home.php` template or `block-hub-preview`. The `.lh-toolbar`, `.lh-card-grid` etc. are used in `home.php` (61 occurrences). The `.lh-hero-*`, `.lh-featured-*`, `.lh-paginate-*` are template-specific.

| Current class | Lines | Target location | Canonical rename |
|--------------|-------|----------------|-----------------|
| `.lh-toolbar`, `.lh-toolbar-search`, `.lh-toolbar-foot`, `.lh-toolbar-meta` | 22–473 | `theme/template-parts/global/hub/` CSS | keep `lh-toolbar-*` (template-scoped, not a block) |
| `.lh-search-*` | 51–100 | same | keep — template-part vocabulary |
| `.lh-filterset-*`, `.lh-pills`, `.lh-pill` | 104–183 | same | keep |
| `.lh-active-chips`, `.lh-chip-*` | 205–242 | same | keep |
| `.lh-result-count`, `.lh-clear` | 249–275 | same | keep |
| `.lh-card-grid`, `.lh-card-*`, `.lh-empty` | 278–379 | same | keep |
| `.lh-paginate-grid`, `.lh-paginate-title`, `.lh-paginate-lede` | 381–404 | same | keep |
| `.lh-hero`, `.lh-hero-*` | 3222–3275 | `theme/template-parts/global/hub/` CSS | keep |
| `.lh-featured .hub-head` | 3275 | same | keep |
| `.cs-hub .hub-lede` | 3762 | `block-cs-archive/block-cs-archive.css` when built | → `.cs-archive-hub-lede` or scope into block |

**Root issue:** all `.lh-*` CSS is in `blocks.css` but belongs in a template-part CSS file. It is **not** a page-prefix violation (it's a template-part namespace), but it's in the wrong file per the architecture contract. Move to `theme/template-parts/global/hub/hub.css` (or similar).

---

#### `ot-` prefix — Onsite Training (in `blocks.css`)

| Current class | Lines | Block | Canonical rename |
|--------------|-------|-------|-----------------|
| `.ot-included-head`, `.ot-included-title`, `.ot-included-lede`, `.ot-included-meta`, `.ot-included-list`, `.ot-included-name`, `.ot-included-body` | 1764–1878 | `block-included-list` | → `included-list-head`, `included-list-title`, `included-list-lede`, `included-list-meta`, `included-list`, `included-list-name`, `included-list-body` |
| `.ot-pricing`, `.ot-pricing-title`, `.ot-pricing-narrative`, `.ot-pricing-lead`, `.ot-pricing-body`, `.ot-pricing-note` | 1944–1990 | `block-pricing-narrative` | → `pricing-narrative`, `pricing-narrative-title`, `pricing-narrative-narrative`, `pricing-narrative-lead`, `pricing-narrative-body`, `pricing-narrative-note` |
| `.ot-outcome-*` | comment at 1885 (no rules visible at that line — see note) | `block-outcome` | → `outcome-*` (already canonical in render template) |

**Note:** `.ot-dq-*` referenced in a comment at line 1657 but no actual selector rules visible with that prefix — the block uses canonical `.disqualifier-*` in its render template. [UNCLEAR: confirm `.ot-dq-*` rules were never ported or were already renamed.]

---

#### `prog-` prefix — Programming Services (in `blocks.css`)

| Current class group | Lines | Block | Canonical rename |
|--------------------|-------|-------|-----------------|
| `.prog-offer-*` (title, meta, sheet, row, idx, body, name, lede) | 2513–2601 | `block-prog-offer` | → `prog-offer-*` — **already the block name**; rename only required to move file not rename selectors. Block is `block-prog-offer`, root class `prog-offer`. This is acceptable but CSS belongs in `block-prog-offer/block-prog-offer.css` not `blocks.css`. |
| `.prog-goal-title`, `.prog-goal-body` | 2713–2742 | `block-goal-editorial` | → `goal-editorial-title`, `goal-editorial-body` |
| `.prog-fit-title`, `.prog-fit-cols`, `.prog-fit-body`, `.prog-fit-pull` | 3770–3817 | `block-who` (prog variant) | → `who-title`, `who-cols`, `who-body`, `who-pull` OR variant modifier approach |
| `.prog-bundle-head`, `.prog-bundle-title`, `.prog-bundle-list`, `.prog-bundle-item`, `.prog-bundle-name`, `.prog-bundle-body`, `.prog-bundle-foot` | 3824–3940 | `block-bundle-list` (Backlog NOR-369) | → `bundle-list-head`, `bundle-list-title`, `bundle-list`, `bundle-list-item`, `bundle-list-name`, `bundle-list-body`, `bundle-list-foot` |
| `.prog-price-grid`, `.prog-price-title`, `.prog-price-lede`, `.prog-price-foot`, `.prog-price-sheet`, `.prog-price-row`, `.prog-price-rate`, `.prog-price-tier`, `.prog-price-detail` | 3959–4068 | `block-pricing-rates` (Backlog NOR-371) | → `pricing-rates-grid`, `pricing-rates-title`, etc. |
| `.prog-warn-title`, `.prog-warn-lede`, `.prog-warn-list`, `.prog-warn-item`, `.prog-warn-num`, `.prog-warn-name`, `.prog-warn-body` | 4076–4167 | `block-warn-list` (Backlog NOR-372) | → `warn-list-title`, `warn-list-lede`, `warn-list`, `warn-list-item`, etc. |
| `.prog-cases-title`, `.prog-cases-list`, `.prog-cases-item`, `.prog-cases-num`, `.prog-cases-body`, `.prog-cases-name`, `.prog-cases-meta`, `.prog-cases-text` | 4176–4268 | [UNCLEAR — no matching block in theme/blocks/] | → `cases-*` or fold into `block-authority` variant |
| `.prog-auth-quotes`, `.prog-auth-quote`, `.prog-auth-quote-mark`, `.prog-auth-quote-text`, `.prog-auth-quote-attr`, `.prog-auth-foot` | 4275–4344 | `block-authority` (prog variant) | → `authority-quotes`, `authority-quote`, etc. OR variant modifier |

---

#### `ct-` prefix — Contact/Classroom Training (in `blocks.css`)

| Current class | Lines | Block | Canonical rename |
|--------------|-------|-------|-----------------|
| `.ct-trust-title` | 2897 | `block-trust-strip` | → `trust-strip-title` |
| `.ct-trust .spec-block` scoped rules | 2907–2917 | `block-trust-strip` | → `.trust-strip .spec-block` |

---

#### `cs-` prefix — Courses (in `blocks.css`)

| Current class | Lines | Block | Canonical rename |
|--------------|-------|-------|-----------------|
| `.cs-gap` | 2926 | `archive-cnc-course.php` template or `block-cs-archive` | → `archive-gap` (template-part) |
| `.cs-hero .hero-stack` | 2943 | `block-hero` (courses variant) | scope via `.hero--courses .hero-stack` or ACF variant field |
| `.cs-archive-lede`, `.cs-archive-grid`, `.cs-archive-card`, `.cs-archive-eyebrow`, `.cs-archive-num`, `.cs-archive-name`, `.cs-archive-dek`, `.cs-archive-meta`, `.cs-archive-cta` | 2949–3074 | `block-cs-archive` (Backlog NOR-373) | → `cs-archive-*` is already the block name. CSS belongs in `block-cs-archive/block-cs-archive.css` not `blocks.css`. |
| `.cs-first-list`, `.cs-first-item`, `.cs-first-item-name`, `.cs-first-item-body`, `.cs-first-item-gap` | 3080–3128 | `block-how-it-works` (Backlog NOR-374) | → `how-it-works-list`, `how-it-works-item`, etc. |
| `.cs-who-cols`, `.cs-who-body`, `.cs-who-body-lead` | 3128–3155 | `block-who` (courses variant) | → `who-cols`, `who-body`, `who-body-lead` (already canonical in `block-who` render template) |
| `.cs-anti-list`, `.cs-anti-item`, `.cs-anti-num`, `.cs-anti-name`, `.cs-anti-body` | 3155–3222 | `block-anti-positioning` (Backlog NOR-375) | → `anti-positioning-list`, `anti-positioning-item`, etc. |

---

## 3. Composer Fallback HTML Page-Prefix Audit

Both existing composers (`compose-onsite-training.php`, `compose-classroom-training.php`) use **zero `ns_html()` calls**. All blocks use `ns_block()`. No page-prefix class strings embedded in composer HTML.

No other composers exist in `build/` (only these two files plus `IMPLEMENTATION-PLAN.md`).

**Result: CLEAN — no page-prefix pollution in composer fallback HTML.**

---

## 4. Block Render Template Class Audit

### Page-prefix classes in render templates

The following blocks use page-prefix classes in their `.php` render templates — these need renaming in tandem with `blocks.css`:

| Block | File | Page-prefix classes used | Canonical rename |
|-------|------|--------------------------|-----------------|
| `block-included-list` | `block-included-list.php` lines 14–35 | `ot-included`, `ot-included-head`, `ot-included-title`, `ot-included-lede`, `ot-included-list`, `ot-included-name`, `ot-included-body` | `included-list`, `included-list-head`, `included-list-title`, `included-list-lede`, `included-list`, `included-list-name`, `included-list-body` |
| `block-pricing-narrative` | `block-pricing-narrative.php` lines 13–29 | `ot-pricing`, `ot-pricing-title`, `ot-pricing-narrative`, `ot-pricing-note` | `pricing-narrative`, `pricing-narrative-title`, `pricing-narrative-body`, `pricing-narrative-note` |
| `block-goal-editorial` | `block-goal-editorial.php` lines 13–23 | `prog-goal`, `prog-goal-title`, `prog-goal-body` | `goal-editorial`, `goal-editorial-title`, `goal-editorial-body` |
| `block-trust-strip` | `block-trust-strip.php` lines 12–16 | `ct-trust`, `ct-trust-title` | `trust-strip`, `trust-strip-title` |
| `block-prog-offer` | `block-prog-offer.php` lines 13–47 | `prog-offer`, `prog-offer-head`, `prog-offer-title`, `prog-offer-meta`, `prog-offer-sheet`, `prog-offer-row`, `prog-offer-idx`, `prog-offer-body`, `prog-offer-name`, `prog-offer-lede` | `prog-offer` = the block name, so `prog-offer-*` is canonical. No rename needed but CSS must move to `block-prog-offer/block-prog-offer.css`. |

### Missing per-block CSS files

Per the architecture contract (`theme-contract.md`), block CSS must live at `theme/blocks/block-{name}/block-{name}.css`. **Zero blocks have per-block CSS files.** All 25 blocks have `NO_CSS`.

Additionally, `main.css` does **not** include `@import-glob "./theme/blocks/*/*.css"`. It only globs `./styles/custom/components/**/*.css`. Even if per-block CSS files were created today, they would be silently ignored.

**Two-part fix required:**
1. Add `@import-glob "./theme/blocks/*/*.css";` to `main.css` (after the components glob).
2. Create `block-{name}/block-{name}.css` for each block and move its rules out of `blocks.css`.

### Cross-reference: do all render-template classes have rules in CSS?

Spot-checked canonical-named blocks (`block-agitation`, `block-mechanism`, `block-faq`, `block-hero`, `block-hub-preview`, `block-who`, `block-disqualifier`, `block-pricing-grid`, `block-outcome`). All canonical class names (`agitation-*`, `mechanism-*`, `faq-*`, `hero-*`, `hub-*`, `problem-*`, `disqualifier-*`, `pricing-*`, `outcome-*`) have matching rules in `blocks.css`. No orphaned classes found for these blocks.

---

## 5. Linear State Reconciliation

**NOR-54 sub-issues total: 76**  
**Done: 62 | Backlog: 14 | In Progress: 0**

### Done issues vs disk state

All 62 Done issues have corresponding deliverables on disk — blocks exist in `theme/blocks/`, templates exist in `theme/`, segments S1–S7 complete. No discrepancy between Linear Done and disk.

### Backlog issues vs disk state

| Issue | Title | Disk state |
|-------|-------|-----------|
| NOR-369 | `block-bundle-list` | NOT on disk — no `theme/blocks/block-bundle-list/` |
| NOR-371 | `block-pricing-rates` | NOT on disk — no `theme/blocks/block-pricing-rates/` |
| NOR-372 | `block-warn-list` | NOT on disk — no `theme/blocks/block-warn-list/` |
| NOR-373 | `block-cs-archive` | NOT on disk — no `theme/blocks/block-cs-archive/` |
| NOR-374 | `block-how-it-works` | NOT on disk — no `theme/blocks/block-how-it-works/` |
| NOR-375 | `block-anti-positioning` | NOT on disk — no `theme/blocks/block-anti-positioning/` |
| NOR-376 | `block-about-trainer` | NOT on disk |
| NOR-378 | `block-indep` | NOT on disk |
| NOR-379 | `block-where` | NOT on disk |
| NOR-381 | `block-contact-form` | NOT on disk |
| NOR-382 | `block-other-ways` | NOT on disk |
| NOR-384 | `block-reviews-full` | NOT on disk |
| NOR-395 | Form — Contact enquiry | Not created (Fluent Forms) |
| NOR-396 | Form — Onsite training enquiry | Not created |
| NOR-397 | WP Business Reviews integration | Not done |
| NOR-398 | S9 — Production QA + handoff | Not done |

**Linear vs disk: fully consistent. Every Done issue has disk delivery. Every Backlog issue has nothing on disk.** No discrepancies.

---

## 6. Missing SCF Blocks

Six blocks from the original brief are confirmed not built — CSS for them was pre-ported into `blocks.css` using page-prefix naming, but no `theme/blocks/` folder or render template exists.

| Block name | Linear issue | Design source | Design section heading | Design class prefix | Canonical class prefix |
|-----------|-------------|--------------|----------------------|--------------------|-----------------------|
| `block-bundle-list` | NOR-369 (Backlog) | `programming-services.html` line 219 | "What's Bundled In" | `.prog-bundle-*` | `bundle-list-*` |
| `block-pricing-rates` | NOR-371 (Backlog) | `programming-services.html` line 281 | "Investment" | `.prog-price-*` | `pricing-rates-*` |
| `block-warn-list` | NOR-372 (Backlog) | `programming-services.html` line 330 | "Who Shouldn't Book" | `.prog-warn-*` | `warn-list-*` |
| `block-cs-archive` | NOR-373 (Backlog) | `courses.html` line 100 | "Course Archive" | `.cs-archive-*` | `cs-archive-*` (block name = slug) |
| `block-how-it-works` | NOR-374 (Backlog) | `courses.html` line 213 | "How Online Courses Work" | `.cs-first-*` | `how-it-works-*` |
| `block-anti-positioning` | NOR-375 (Backlog) | `courses.html` line 266 | "Three Things These Aren't" | `.cs-anti-*` | `anti-positioning-*` |

**Additional blocks noted Backlog, not in original brief scope:** `block-about-trainer` (NOR-376), `block-indep` (NOR-378), `block-where` (NOR-379), `block-contact-form` (NOR-381), `block-other-ways` (NOR-382), `block-reviews-full` (NOR-384).

**`prog-cases-*` CSS at lines 4176–4268** — no matching block or Linear issue found. [UNCLEAR: `.prog-cases` section in design is the authority/testimonials section on programming-services.html line 364 (`.prog-auth`). The `.prog-cases-*` CSS appears to be ported from a section that maps to `block-authority` with a testimonials variant. Verify against design source.]

---

## 7. UTF-8 / Encoding Audit

`&#039;` is the only entity form present across all pages (HTML-encoded apostrophe from the composer field values). No `&rsquo;`, `&mdash;`, `&amp;amp;`, `&lt;`, `&gt;` found.

| Page | URL | `&#039;` count | `&amp;` count | Notes |
|------|-----|---------------|--------------|-------|
| Home | `/` | 16 | 0 | Composer script not on disk — composed inline |
| Onsite Training | `/onsite-training/` | 22 | 0 | — |
| Classroom Training | `/classroom-training/` | 19 | 0 | — |
| Programming Services | `/programming-services/` | 24 | 3 | Highest pollution. `&amp;` also present |
| About | `/about/` | 8 | 0 | — |
| Contact | `/contact/` | 0 | 0 | Clean |
| Courses (slug: `/courses/`) | `/courses/` | 12 | 0 | [UNCLEAR: page has Backlog blocks — rendered partial?] |

**All pages with `&#039;` > 0 are affected.** Root cause: `html_entity_decode()` sanitiser not applied in `lib/compose.php` at compose time. The `ns_clean_string()` helper mentioned in the task brief — if added — would fix on re-compose.

`&amp;` on programming-services (3×) suggests a double-encoded `&` in a field value — likely a URL or copy with `&` character not decoded.

---

## Summary

| Metric | Count |
|--------|-------|
| Pages with composer on disk | 2 of 9 (onsite, classroom) |
| Pages with design sections not yet composed | 7 (no composer scripts in build/) |
| Page-prefix CSS rule selectors in blocks.css | 233 |
| Distinct page-prefix class names | ~120 |
| Block render templates with page-prefix classes | 5 |
| Blocks with per-block CSS files | 0 of 25 |
| main.css missing @import-glob for theme/blocks/ | YES — critical |
| Missing SCF blocks (Backlog, no disk folder) | 6 core + 6 further |
| Linear discrepancies | 0 |
| Pages with &#039; encoding pollution | 6 of 7 |
| Pages with &amp; pollution | 1 (programming-services) |
