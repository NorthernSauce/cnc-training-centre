# Phase B2 Log — 6 Missing SCF Blocks
**Date:** 2026-05-27
**Status:** COMPLETE

---

## Blocks built

| Block | fields count | render lines | Built |
|---|---|---|---|
| block-bundle-list | 5 (pretitle, heading, items repeater×2, foot, surface) | 46 | yes |
| block-pricing-rates | 6 (pretitle, heading, lede, foot, rows repeater×4, surface) | 56 | yes |
| block-warn-list | 5 (pretitle, heading, lede, items repeater×3, surface) | 46 | yes |
| block-cs-archive | 5 (pretitle, heading, lede, courses repeater×8, surface) | 72 | yes |
| block-how-it-works | 4 (pretitle, heading, items repeater×3, surface) | 47 | yes |
| block-anti-positioning | 4 (pretitle, heading, items repeater×3, surface) | 44 | yes |

All 6 registered in `theme/functions.php` `_ns_register_acf_blocks()`.

---

## UNCLEAR resolutions

### 1. block-who variant field
**Decision:** Added `variant` select field (`standard` | `courses`) to `block-who/fields.php`. Updated `block-who.php` to switch between `problem-*` classes (standard, existing behaviour) and `who-*` classes (courses page + programming services `.prog-fit` usage). Default stays `standard` — existing onsite/classroom/about placements unaffected. Courses page and programming-services page should set variant = `courses` when composing.

### 2. block-authority `.cases-*` variant
**Decision:** No new fields added. The `.cases-*` CSS in `block-authority.css` covers a "case studies" section that does not have its own Linear issue and is not in the Phase B2 brief. CSS stays in `block-authority.css` as a future variant reserve. If a `block-cases` block is needed (Phase B3 or later), the CSS is ready and the Linear issue can be raised then.

---

## Production build
`npm run production` — PASS (447ms, no errors)

## PHP lint
All 12 new files + functions.php + block-who.php/fields.php — no syntax errors.

## Page-prefix grep
```
grep -rE 'class="[^"]*\b(prog-fit|prog-bundle|prog-price|prog-warn|prog-cases|prog-auth|cs-first|cs-anti|cs-hub|cs-hero|ct-trust|ot-)' theme/blocks/*/block-*.php
```
Zero results. Clean.

---

## Linear
NOR-369, NOR-371, NOR-372, NOR-373, NOR-374, NOR-375 → Done.

---

## Files created / modified

**Created (12 new):**
- `theme/blocks/block-bundle-list/fields.php`
- `theme/blocks/block-bundle-list/block-bundle-list.php`
- `theme/blocks/block-pricing-rates/fields.php`
- `theme/blocks/block-pricing-rates/block-pricing-rates.php`
- `theme/blocks/block-warn-list/fields.php`
- `theme/blocks/block-warn-list/block-warn-list.php`
- `theme/blocks/block-cs-archive/fields.php`
- `theme/blocks/block-cs-archive/block-cs-archive.php`
- `theme/blocks/block-how-it-works/fields.php`
- `theme/blocks/block-how-it-works/block-how-it-works.php`
- `theme/blocks/block-anti-positioning/fields.php`
- `theme/blocks/block-anti-positioning/block-anti-positioning.php`

**Modified:**
- `theme/functions.php` — +6 `acf_register_block_type()` calls
- `theme/blocks/block-who/fields.php` — +`variant` select field
- `theme/blocks/block-who/block-who.php` — variant-aware class switching

## Phase B3 next
Composer scripts for programming-services + courses pages (NOR-391, NOR-392 post-B2 blocks now available).
