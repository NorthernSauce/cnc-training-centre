# Handover — CNC Training Centre Website

---

## 🚨 ROUND 3 (2026-05-27) — Build phase mid-flight + Tailwind strip + critical DB incident

**Read this whole section before doing anything on the project.** Today was a long, painful day. Some big wins, one serious incident (now resolved), structural skill changes made. Newest first.

### Where the project stands

- **Phase:** 5 (Build) — mid-flight. Linear: [NOR-54](https://linear.app/northern-sauce/issue/NOR-54/phase-6-build)
- **Local site:** `~/Local Sites/cnctrainingcentre/` (NOTE: slug differs from design repo — `cnctrainingcentre` not `cnc-training-centre`)
- **Theme on disk:** `~/Local Sites/cnctrainingcentre/app/public/wp-content/themes/cnc-training-centre/`
- **Theme repo:** [NorthernSauce/cnc-training-centre-website](https://github.com/NorthernSauce/cnc-training-centre-website) on `main` branch
- **WP siteurl:** `http://cnctrainingcentre.local/`
- **Active theme:** `cnc-training-centre/theme` (nested — WP recognises `cnc-training-centre` parent + `theme` subdir because that's where style.css lives)

### State of the WP install

- **Plugins active:** Secure Custom Fields, Fluent Forms. (Site Reviews installed earlier but deferred per your call — Google reviews plugin decision still open.)
- **Permalink structure:** `/learning-hub/%postname%/` (locked global rule — every NS project)
- **Front page:** Home page (ID 7) — composed with 8 ACF blocks, rendering correctly
- **Pages created (empty placeholders except Home):**
  - ID 7 Home (`/`) — **composed**
  - ID 8 About (`/about/`) — empty
  - ID 9 Contact (`/contact/`) — empty
  - ID 10 Onsite Training (`/onsite-training/`) — empty
  - ID 11 Classroom Training (`/classroom-training/`) — empty
  - ID 12 Programming Services (`/programming-services/`) — empty
  - ID 13 Online Courses (`/courses/`) — empty
  - ID 3 Privacy Policy — published
- **Menus:** 4 menus created + assigned to locations (Primary, Footer Services, Footer Learning, Footer Legal)
- **CPT:** `cnc-course` registered + `course-type` taxonomy (classroom/online/onsite) — no entries seeded yet
- **Customizer:** Fields registered (logos, contact, addresses including classroom venue, business/legal, social, footer content) — no values set yet

### CRITICAL: DB isolation incident — locked into skills, won't recur

Earlier today a cnctrainingcentre wp-config.php with bare `DB_HOST='localhost'` silently routed all CNC's WP-CLI writes + browser traffic into **Fuelled's** live MySQL. Overwrote Fuelled's Home (ID 11) + About (ID 15) post_content, inserted 5 phantom pages, repointed siteurl. Took an hour to diagnose. **Fully recovered:**

- Fuelled DB restored via `seed-home.php` + `seed-about.php` re-run from the theme repo. Phantom pages deleted. Fuelled site verified loading correctly.
- CNC wp-config DB_HOST now points at its OWN MySQL socket: `localhost:/Users/davidmerton/Library/Application Support/Local/run/kHnLEy_QU/mysql/mysqld.sock`
- `wp-cli.local.php` + `wp-cli.yml` created on CNC to match the pattern
- **Empirically verified isolation:** marker option written to CNC's DB does NOT appear in Fuelled's DB

**Skill protections added (binding every future project):**

1. **`ns-acf-block-builder` SKILL.md Step 0 (MANDATORY)** — every new project's Segment 1 first action is a marker-test that writes a unique `wp_option` then reads from every other Local site. If any other site sees it = shared MySQL = HALT before any writes.
2. **`build/lib/compose.php` runtime gate** — every composer script's first action compares the theme slug (from its own file path) against `home_url()` host. Mismatch = hard abort, no writes happen.
3. **wp-config `DB_HOST` must be explicit socket path** — bare `localhost` is now flagged as fatal in the bootstrap check.

### Tailwind v4 fully stripped (CNC `main`, Fuelled `chore/strip-tailwind`, base theme `chore/strip-tailwind`)

Theme architecture is now **pure PostCSS + plain CSS**, no utility framework. We were never using Tailwind utilities, `@apply`, or `@theme` — only the build pipeline. Tailwind's `@layer` cascade was actively breaking things (silent rule drops + competing auto-`.container` width).

- **Renames:** `tailwind.css` → `main.css`, `tailwind/` → `styles/`, `tailwind/tailwind-editor.css` → `styles/editor.css`
- **Removed deps:** `@tailwindcss/postcss`, `@tailwindcss/typography`, `@_tw/typography`, `tailwindcss`, `eslint-plugin-tailwindcss`, `prettier-plugin-tailwindcss`
- **Pipeline:** `postcss-import-ext-glob` → `postcss-advanced-variables` → `postcss-nesting` → `cssnano` (production)
- **All `@apply` / `@utility` / `@theme` / `@layer` Tailwind directives → equivalent plain CSS**
- **`_NS_TYPOGRAPHY_CLASSES` constant + JS injection + TinyMCE filter all stripped**
- **Compiled output:** 93KB front + 93KB editor (was 117KB), build time 271ms (was 600ms)

Architecture is unchanged otherwise — **BEM classes in markup** (matches design HTML 1:1), **hand-written CSS rules** in `styles/custom/components/*.css`, **`--ns-*` CSS variables** as the design system.

**Branches awaiting your merge:**
- [fuelledagency-website#chore/strip-tailwind](https://github.com/NorthernSauce/fuelledagency-website/tree/chore/strip-tailwind)
- [northern-sauce-base-theme#chore/strip-tailwind](https://github.com/NorthernSauce/northern-sauce-base-theme/tree/chore/strip-tailwind)

After merging the base theme strip, future projects clone the stripped scaffold and skip the per-project strip.

Base theme local working copy: `~/Documents/NorthernSauce/northern-sauce-base-theme/` (moved from `/tmp` for persistence).

### Other fixes landed today

- **Heading font weights** — `.hero-title` + h1–h3 = `font-weight: 400` (regular, matches design tokens). h4/h5 = 600. h6 = 500 uppercase.
- **Nav width** — `.nav-inner { max-width: var(--ns-max-content) }` (1280px, matches design + `.container`)
- **Editor styles regression** — `body { padding: 2rem 3rem !important }` + ACF block-preview canvas-fit overrides added to `styles/editor.css`. Targets BOTH `body` (iframed editor) AND `.editor-styles-wrapper` (legacy).
- **Editor stylesheet cache-bust** — `add_editor_style()` uses static WP cache-bust, so we added a parallel `wp_enqueue_style` via `enqueue_block_assets` with filemtime. Future rebuilds auto-bust without hard-refresh.
- **`/learning-hub/%postname%/` permalink structure** locked + skill rule saved.

### What's NOT done yet (Build phase remaining)

- **Compose 6 pages:** About, Contact, Onsite, Classroom, Programming, Online Courses. Composer scripts exist at `build/compose-*.php`; ready to run. Each takes ~1 min via `wp eval-file`. (Home is done.)
- **Customizer default values** — set phone / email / addresses / classroom venue / footer strap / company reg / social URLs / reviews count/score
- **CPT seeds** — 8 `cnc-course` posts (from design Courses page): Beginners Milling/Turning, Setter Milling/Turning, Learn to Program Milling/Turning, Macro Programming, Edgecam
- **Hub article seeds** — 3-5 native `post` placeholders so Learning Hub archive isn't empty
- **Fluent Forms contact form** — create form via FF API, patch `block-svc-cta-form` post_content with the form_id
- **Google reviews plugin decision** — Site Reviews installed but deferred. WP Business Reviews was OD-01 but not on WP.org. Pending your call: supply WPBR zip, lock Site Reviews, or choose a different plugin.
- **S9 QA pass** — production build, browser-verify every page desktop + mobile, fix P0/P1 issues, NOR-54 → Needs Review

### Build segments completed (skill structure)

| Segment | Status | Linear |
|---|---|---|
| S1 Bootstrap + Foundation | Done | NOR-336–342 |
| S2 Shared component CSS | Done (salvaged) | — |
| S3 Global parts + AJAX | Done | NOR-344/345/346/347 |
| S4 Block batch 1 (10 blocks) | Done | NOR-399–408 (note: duplicates of NOR-348–357; agent created new IDs) |
| S5 Block batch 2 (15 blocks) | Done | various |
| S6 Block batch 3 | Skipped (all 25 blocks built in S4+S5) | — |
| S7 Templates + archives | Done | NOR-385/386/387 + 3 new |
| S8 Pages composition | In flight — Home done, 6 pages awaiting | per-page issues |
| S9 Production QA | Not started | — |

**25 SCF blocks built + 7 WP template files (home.php Hub archive / single.php / archive-cnc-course.php / single-cnc-course.php / 404.php / search.php / page.php).**

### Where to resume

When you start a fresh chat, point Claude at:

1. **This handover** — `~/Documents/Clients/cnc-training-centre/HANDOVER.md`
2. **The implementation plan** — `~/Documents/Clients/cnc-training-centre/build/IMPLEMENTATION-PLAN.md` (Dave's decisions section captures all the OD answers)
3. **Linear** — NOR-54 Build phase issue
4. **The composer scripts** — `~/Local Sites/cnctrainingcentre/app/public/wp-content/themes/cnc-training-centre/build/compose-*.php`

To finish the Build phase, the next session needs to:
1. Resolve Google reviews plugin choice (still open)
2. Run remaining 6 composer scripts (About/Contact/Onsite/Classroom/Programming/Courses)
3. Seed CPT entries + Hub article placeholders
4. Set Customizer defaults
5. Create Fluent Forms contact form + patch form_id into Contact page
6. Run S9 QA pass — production build + browser verify every page + move NOR-54 to Needs Review

### Skill changes binding from today (cross-project)

These are in `~/.claude/skills/ns-acf-block-builder/learnings.md` + `~/.claude/skills/ns-website-project/SKILL.md`. Future projects inherit them.

- **DB isolation marker-test before any WP-CLI write** (Step 0 in Segment 1)
- **Bare `localhost` DB_HOST is fatal** — must be explicit socket path
- **`/learning-hub/%postname%/` permalink structure** — every NS project
- **Hub search + filter = AJAX, in-archive only**, never `search.php` redirect
- **Course catalogue blocks AUTO-PULL by taxonomy term** — never manual selection
- **Contact details = Customizer only** — every block reads via `get_theme_mod()`
- **Mobile drawer renders same `primary` menu**, different walker — not a separate menu location
- **All menus via Appearance → Menus** — zero hardcoded nav links
- **Theme directory = client slug** — never `_ns/`. Internal `_ns_` PHP namespacing kept untouched.
- **Page composition = ONE agent per page** (~150 lines) — never one mega-composer
- **Hard agent task-size cap 500 lines** — bigger = decompose into parallel
- **PM watchdog uses JSONL mtime, not task status** — 5 min silent = dead, kill it
- **Per-block CSS ports inside each block's segment** (markup + CSS together)
- **Tailwind stripped from base theme** — pure PostCSS pipeline, BEM + design tokens
- **`add_editor_style` paired with `wp_enqueue_style` + filemtime** for editor stylesheet cache-bust
- **No invented surnames / personal details** ever

### Today's commits (CNC theme main)

Recent commits all on `main`, pushed to origin:

```
21c9055  Nav: revert to design width
cb11f48  Remove remaining Tailwind Typography prose-class plumbing
23b17ad  Editor stylesheet: enqueue alongside add_editor_style for filemtime cache-bust
3b2d46a  Revert add_editor_style query string
ca18f18  Editor stylesheet: append filemtime cache-bust
52ccfbc  Bump theme Version 0.1.0 → 0.2.0
904784a  Editor fix: target body for iframed Gutenberg + .editor-styles-wrapper
ff5bdc6  Fix editor styles regression after Tailwind strip
4895ec6  Final cleanup: remove Tailwind references from file contents
0f90813  compose.php: hard DB-isolation gate
c3eb78c  Fix heading font-weight (400) + extend nav to full viewport
... + earlier S1–S8 build commits
```

---

> **Latest update — Round 2 (component consolidation + 3 new copy files + Hub archive)**
>
> Since you went offline I completed your overnight brief AND a second round of work you flagged just after. Summary of round 2 (newest first below):
>
> 1. **Block-reuse rule added to global skill standards.** `team-standards.md` now has a "Block reuse — non-negotiable" section. Designer global learnings has a sibling entry. Future agents on this and every project will scan existing blocks first and copy them, not invent variants. Failure mode you caught (3 FAQ variants + 2 Hub-preview variants across 4 pages) is now permanently called out.
> 2. **Component consolidation pass across home + 3 service pages.** FAQ markup unified to canonical `.faq-list / .faq-item / .faq-q-* / .faq-a` with native `<details name="faq">` exclusive-accordion (lifted to `page-home.css` so every page inherits). Hub-preview unified to the home `.hub` block verbatim (stats strip + control-tag filter row + featured-card + 2 secondaries) — every service page now uses the same block. Page-specific CSS for the old variants was deleted.
> 3. **Programming Hub CTA alignment fixed.** Root cause: page-local `.prog-hub-head` class had no entry in the 2-column media query at ≥900px, so the CTA fell into single-column stack. Now uses canonical `.hub-head` and right-aligns correctly. Verified.
> 4. **Three new copy files:** `copy/about.md`, `copy/contact.md`, `copy/learning-hub.md`. Same standard as the rest — first-person, sourced, banned-words-free.
> 5. **Learning Hub archive page designed.** `design/learning-hub.html` + `design/page-learning-hub.css`. **Filters and search actually work** — vanilla JS client-side filtering on control / skill / content-type pills + debounced substring search on title + dek + active-chip strip + result count + empty state + clear-all. Twelve `[GAP]` placeholder cards rendered with varied data-attributes to demonstrate every filter combination. Inherits the canonical `.hub` featured-strip block verbatim from page-home.css.
> 6. Linear updated: NOR-161/162/163 Copy Done; NOR-164 Design Learning Hub Needs Review.
>
> **Outstanding for morning sign-off:** the 3 service page designs + the Hub archive design. About + Contact have copy but no design yet (await your sign-off on copy first).
>
> Everything below is the round 1 handover, retained for reference.

---



**For:** Dave, returning to the project in the morning.
**Written:** 2026-05-15 evening — by PM at end of overnight run.
**Read this end-to-end before reviewing.**

---

## What got done overnight

Per your offline brief: copy + design for the three top-level service pages. All four service-touch pages (Home + Onsite + Classroom + Programming) are now in `design/` ready for your review.

### Phase 3a — Copy

Three canonical copy files written by the copywriter subagent, full Phase 3a quality, mirroring the structure of `copy/home.md`:

- `copy/onsite-training.md` (Buyer A primary, £700/day whole-team hook)
- `copy/classroom-training.md` (Buyer B primary, 8 courses, £300/student/day)
- `copy/programming-services.md` (Buyer A who'd rather hand work over, £60–£100/hr tiered)

Every fact sourced from `strategy/`, `copy/home.md`, `PRODUCT.md`. First-person singular throughout. Banned humaniser words avoided. Open `[GAP]` markers visible in each file where source material didn't exist — see § "Gaps for Dave" below.

### Phase 4 — Design (3 pages, parallel subagents)

Three high-fidelity HTML/CSS pages built by parallel designer subagents, each inheriting the LOCKED visual language from `home.html`:

- `design/onsite-training.html` + `design/page-onsite-training.css` — 10 sections
- `design/classroom-training.html` + `design/page-classroom-training.css` — 11 sections
- `design/programming-services.html` + `design/page-programming-services.css` — 10 sections

Each page:
- Byte-identical LOCKED nav / drawer / footer / scroll JS copied verbatim from `home.html` (with `aria-current="page"` on the matching drawer link).
- Direction-A signatures: marginalia spec panel in hero, ghost numerals, section pretitle pattern, surface alternation (paper → paper-tint → … → anchor for contact).
- New patterns introduced where the section type demanded it: native `<details name="...">` exclusive FAQ accordions, disqualifier callout boxes, pricing-tier blocks, course rosters, capability spec grids.
- Mobile nav verified at 375px: logo at left edge, hamburger at right edge, full-width nav (the rule logged to `~/.claude/skills/ns-website-designer/learnings.md` after the earlier session).
- First-person singular voice throughout — zero "we/us/our" anywhere on these pages.

### Linear board

All sub-issues for tonight's scope are at `Needs Review` (Onsite / Classroom / Programming designs) or `Done` (the three copy sub-issues). Phase issues NOR-51 (Copy) and NOR-53 (Design) stay `In Progress` until all sub-pages are signed off and the remaining pages (About, Contact, Hub index + article, Courses placeholder) are completed.

---

## Where to start in the morning

1. **Read all four canonical copy files end to end.** They're the truth of what's on each page; the design renders verbatim from them.
2. **Open each page in the preview** at `http://localhost:3847/design/`:
   - `home.html` (already approved at "miles better")
   - `onsite-training.html`
   - `classroom-training.html`
   - `programming-services.html`
3. **Review each page at desktop and at 375 mobile.**
4. **Sign off, send back for revisions, or call out specific section changes.** I'll route revisions through copywriter (if copy) or designer (if visual).

---

## Gaps for Dave (visible `[GAP]` markers on each page)

Each gap is currently rendered as a visible `[GAP — describe what's needed]` placeholder so nothing is silently invented.

### Across all three service pages
- **Testimonials** — 2 quote placeholders per page (6 total). I have your earlier Google review paste; can wire those quotes verbatim once you confirm which reviewer goes on which page. Suggested mapping (already in copy `[GAP]` notes):
  - Onsite — Albert Hall (manual→CNC conversion, onsite, code streamlining) + a second onsite/company quote.
  - Classroom — Ka Bo ("not YouTube" line) + Thomas Earl (10-yr manual turner → CNC) or Mark Guttridge (small biz owner forced to learn turning).
  - Programming — needs a quote about programming/turnkey work specifically. None in your paste fits — possible `[GAP]` to chase a separate testimonial, or repurpose Albert Hall's "streamlined the code" line.
- **Hub article cross-links** — 3 article slots per page (9 total). Pending content import strategy + your picks. I've labelled control + topic for each slot so they're filterable when the import runs.

### Onsite-specific
- **Lead time / availability** — copy currently flags "I aim to come back inside a working day" (sourced). The marginalia mark-highlighted lead-time wording in §01 hero is a `[GAP]` — what's a realistic typical onsite booking lead time you want stated? 1–2 weeks? 3–4 weeks?

### Classroom-specific
- **Macro Programming + Edgecam course prices** — sitemap lists the 8 classroom courses but only the standard £300/student/day base rate is sourced. Two course rows in §03 (Macro Programming, Edgecam) carry `[GAP]` chips — confirm pricing per course or whether everything's standard £300/day.
- **Weekend course variants** — sitemap open question. FAQ Q7 currently flags `[GAP — Dave to confirm]`. Are weekend variants distinct products, or a scheduling option of the same course?

### Programming-specific
- **Hourly pricing tiering** — copy says "£60–£100/hr" but tiers are uncertain. The pricing section currently flags `[GAP]` for the boundaries (e.g. what work falls at £60? What's £100?). Confirm or simplify.
- **"Network of trusted machine shops"** — the CNC machining sub-service depends on this. Either confirm the wording or pivot to "as required" / single trusted partner.

### Carried over from previous handover (still open)

- **Founding year** locked = 1996 (you confirmed).
- **YouTube subs** locked = 8,930 exact (you implicitly confirmed by moving on).
- **Logo SVG** — still PNG only. Renders fine in nav + footer (footer back on anchor surface after we tried paper). SVG-only swap remains a nice-to-have.
- **PM bookmark** — content import (≈300 articles + 332 YouTube videos) is a Phase 5/6 task. Out of scope for design phase. Flagged in earlier handover too.

---

## What's still pending in Phase 3a (Copy)

The sitemap has 12 top-level + template pages. Five down (Home + 3 services + the older `home.md` revisions), seven outstanding:

- Copy: About
- Copy: Contact
- Copy: Learning Hub (index)
- Copy: Hub category page template
- Copy: Hub article single template
- Copy: Courses (coming soon)
- Copy: Onsite / Classroom / Programming detail-page templates (per machine, per course, per sub-service)

These can be batched the same way once you've signed off on tonight's three services.

## What's still pending in Phase 4 (Design)

After tonight: 4 page designs done out of ~12. Remaining:

- Design: About
- Design: Contact (lives partially on every page via the contact band — but a standalone contact page with the prominent Fluent Forms `.form-stack` is still owed)
- Design: Learning Hub (index — taxonomy filter UI, article grid)
- Design: Learning Hub article (single template)
- Design: Courses (coming soon placeholder + notify-me form)
- Design: Onsite detail template (per machine/control)
- Design: Classroom course detail template
- Design: Programming detail template (per sub-service)

---

## Notes on tonight's process

- **No `/critique` numerical scores logged** — subagents self-iterated against Nielsen's heuristics in their head per their brief but did not produce a formal score artefact. Each page passes the pattern audit (no banned patterns, first-person voice, locked nav verified, surface rhythm correct).
- **Preview-screenshot quirk** noted by all three subagents — the preview server screenshot tool was returning blank captures past the hero region on some scroll positions. The Classroom subagent confirmed this is a tool quirk (also reproduces on the already-approved home.html). All layout verification was done via `preview_inspect` and `preview_eval` `getBoundingClientRect` — these gave conclusive positional readouts. **If you see anything visually wrong on the pages in your morning review, trust your eyes — the inspect data may have missed a rendering edge case.**
- **`page-home.css` is the shared CSS spine for now.** Locked nav, drawer, footer, sec-head, sec-pretitle, ghost-num, section utilities, hero specs panel, contact band — all live there. Each service page links it, then layers `page-{slug}.css` for service-specific patterns. A future clean-up will lift the shared chunks into a `design/site.css` and shrink `page-home.css` to home-only. Not urgent — works fine as is.
- **Team standards file** committed at `~/.claude/skills/ns-website-project/references/team-standards.md` with your verbatim "110/100 every time" statement. Now read-first item #1 on every NS specialist skill.

---

## Linear sub-issues seeded tonight

- NOR-155 Copy: Onsite training — **Done**
- NOR-156 Copy: Classroom training — **Done**
- NOR-157 Copy: Programming services — **Done**
- NOR-158 Design: Onsite training — **Needs Review** (awaiting-dave)
- NOR-159 Design: Classroom training — **Needs Review** (awaiting-dave)
- NOR-160 Design: Programming services — **Needs Review** (awaiting-dave)

---

## How to give feedback in the morning

For each page, drop me one of:
- **"approve [page]"** → I mark Linear Done + dispatch the next page in Phase 4
- **"revise [page]: [feedback]"** → routes back to designer for iteration
- **"copy change on [page] §X: [what]"** → routes through copywriter, updates `copy/{page}.md`, designer re-pulls

If you want all four service-touch pages reviewed together, just say "let's go through them" and I'll surface each in turn with the preview URL.

---

## Token budget

I stopped here because we delivered everything you asked for tonight and there's plenty of room to start the morning review fresh. No remaining work in flight — every subagent has reported back and exited cleanly.

Good night.
