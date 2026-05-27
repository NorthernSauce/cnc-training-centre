# Phase B3 Log — Composer Updates + Re-composition
**Date:** 2026-05-27
**Status:** COMPLETE

---

## Step 1 — Composer updates

### compose-programming-services.php
- Replaced `ns_html()` for "What's bundled" → `ns_block('block-bundle-list', [...])` — 6 items verbatim from design
- Replaced `ns_html()` for "Pricing" → `ns_block('block-pricing-rates', [...])` — 4 rate rows verbatim from design
- Replaced `ns_html()` for "Who shouldn't book" → `ns_block('block-warn-list', [...])` — 3 items verbatim from design
- Added `variant => 'courses'` to block-who call (was missing — gets `.who-*` classes for prog-fit layout)
- Updated block stack comment in docblock

### compose-courses.php
- Replaced `ns_html()` for "Course Archive" → `ns_block('block-cs-archive', [...])` — 8-course static catalogue verbatim from design (prices remain `[GAP — Dave to confirm price]` as they were in design)
- Replaced `ns_html()` for "How it works" → `ns_block('block-how-it-works', [...])` — 4 items verbatim from design
- Replaced `ns_html()` for "Anti-positioning" → `ns_block('block-anti-positioning', [...])` — 3 items verbatim from design
- Added `variant => 'courses'` to block-who call

### Other 5 composers (home, onsite-training, classroom-training, about, contact)
- Re-run as-is. All field values pass through `ns_clean_string()` automatically in `compose.php`. No structural changes needed.

---

## Step 2 — Re-run all 7 composers

All 7 passed on first run. No errors.

| Page | Result |
|------|--------|
| home | updated (ID 7) |
| onsite-training | updated (ID 10) |
| classroom-training | updated (ID 11) |
| programming-services | updated (ID 12) |
| about | updated (ID 8) |
| contact | updated (ID 9) — form_id = 0, Fluent Forms agent must patch |
| courses | updated (ID 13) |

---

## Step 3 — Bonus fix: archive-cnc-course.php page-prefix rename

Verification revealed `/courses/` resolves to `archive-cnc-course.php` (CPT `has_archive => 'courses'` conflict, noted in compose-courses.php comment). That template had 38 page-prefix class hits: `cs-hero`, `cs-first-*`, `cs-who-*`, `cs-anti-*`, `cs-hub`.

Renamed all to canonical in one sed pass:
- `cs-hero` → `hero--courses` modifier on `.hero` root
- `cs-first*` → `how-it-works*`
- `cs-who*` → `who*`
- `cs-anti*` → `anti-positioning*`
- `cs-hub` → `hub--courses` modifier on `.hub` root

This was out of B3 scope but required for the verification gate to pass.

---

## Step 4 — Build

`npm run production` — PASS (537ms, no errors)

---

## Step 5 — Verification

| Page | page-prefix | enc | em | fatal |
|------|------------|-----|----|-------|
| / | 0 | 0 | 6 | 0 |
| /onsite-training/ | 0 | 0 | 9 | 0 |
| /classroom-training/ | 0 | 0 | 10 | 0 |
| /programming-services/ | 0 | 0 | 11 | 0 |
| /about/ | 0 | 0 | 6 | 0 |
| /contact/ | 0 | 0 | 0 | 0 |
| /courses/ | 0 | 0 | 6 | 0 |

All gates pass: page-prefix=0, enc=0, fatal=0 on every page.

---

## Step 6 — Linear

NOR-369, NOR-371, NOR-372, NOR-373, NOR-374, NOR-375 were already transitioned to Done in Phase B2 per B2-LOG.md. Confirmed via Linear MCP (`get_issue NOR-369` → `status: "Done"`). No action needed.

---

## Items for Dave

1. **Course prices** — 8 course cards in block-cs-archive have `From £[GAP — Dave to confirm price]`. Dave must fill these in via the editor or a follow-up composer patch once prices are confirmed.

2. **CPT archive conflict** — `/courses/` is served by `archive-cnc-course.php`, not the composed page at ID 13. The block-composed page exists at slug `courses` but WP routes `/courses/` to the CPT archive because `cnc-course` registers `has_archive => 'courses'`. The archive template is now class-clean (B3 renamed its page-prefix classes). But the composed page (with proper SCF blocks, block-who, block-anti-positioning etc.) is not the live URL. Dave needs to decide: (a) rename composed page slug to `online-courses`, (b) change CPT archive slug to `cnc-courses`, or (c) use `has_archive => false`. See composer comment for detail.

3. **contact: form_id = 0** — Fluent Forms form not yet created. WP-CLI success message confirmed: `form_id = 0`. Fluent Forms agent must create the form and patch `block-svc-cta-form` data in contact page post_content.

---

## Files changed

**Modified:**
- `build/compose-programming-services.php` — 3 ns_html → ns_block, variant added to block-who
- `build/compose-courses.php` — 3 ns_html → ns_block, variant added to block-who
- `theme/archive-cnc-course.php` — page-prefix class rename (cs-first/cs-who/cs-anti/cs-hub/cs-hero → canonical)
