# CNC Training Centre — Content Migration & Hub Rebuild Implementation Plan

**Stage:** Post-build content migration onto the live-content clone
**Client:** CNC Training Centre
**Plan date:** 2026-06-05
**Author:** PM (planning only — no code written, no DB touched beyond read-only queries)
**Target site:** `cnctrainingcentre-old` (the clone of the current live site, new theme already installed)
**Reference site:** `cnctrainingcentre` (the finished new build — source of truth for pages, blocks, settings)

> This plan is read-only research turned into an executable map. Nothing in the codebase or either database has been modified. Execute only after Dave signs off and answers the open decisions in § 12.

---

## 1. Phase goal

Get the finished new-site content (8 SCF-block pages + the Learning Hub) onto the clone that already holds the client's real archive (290 posts, ~2,400 media, Tutor/Woo data), rebuild the Learning Hub filter so it actually works against the real categories and tags, and turn the relevant "Pending" legacy pages into structured Training entries — without losing any of the client's existing content or SEO equity.

---

## 2. ⚠️ STEP 0 — DB ISOLATION CHECK (BLOCKING — do this before anything else)

**This is the exact failure that wiped the Fuelled database on 2026-05-27.** It is live right now on this clone.

**Finding:** `cnctrainingcentre-old`'s `wp-config.php` has a **bare `DB_HOST=localhost`** — no socket path. The finished new site (`cnctrainingcentre`) correctly pins its socket:

```
NEW  (cnctrainingcentre):     DB_HOST = 'localhost:/Users/.../Local/run/kHnLEy_QU/mysql/mysqld.sock'
OLD  (cnctrainingcentre-old): DB_HOST = 'localhost'      ← DANGER: resolves to the default socket, can hit another site's MySQL
```

A bare `localhost` lets MySQL/`wp-cli` connect to whatever is on the default socket. If that default ever points at another Local site's MySQL, every write meant for the clone lands in the wrong database. Because this clone holds the **only local copy of the client's real content**, a misroute here is unrecoverable.

**Mandatory before any wp-cli / mysql write:**

1. Confirm each site's dedicated socket (verified during research):
   - OLD `cnctrainingcentre-old`: id `O4IusZ9Wq`, MySQL **8.4.0**, port 10034
     socket: `~/Library/Application Support/Local/run/O4IusZ9Wq/mysql/mysqld.sock`
   - NEW `cnctrainingcentre`: id `kHnLEy_QU`, MySQL **8.0.35**, port 10019
     socket: `~/Library/Application Support/Local/run/kHnLEy_QU/mysql/mysqld.sock`
2. Edit the clone's `wp-config.php` `DB_HOST` to pin its own socket explicitly:
   `define( 'DB_HOST', 'localhost:/Users/davidmerton/Library/Application Support/Local/run/O4IusZ9Wq/mysql/mysqld.sock' );`
   (Stop the site in Local first; Local may rewrite this on start — if it does, set it again, or always run wp-cli with `--socket`.)
3. **Marker test** (the binding NS isolation gate): write a unique option to the clone, then read it back from every other running site. If any other site can read it, the routing is wrong — HALT.
   ```
   # write marker on OLD via its socket
   wp option add ns_iso_marker O4IusZ9Wq_$(date +%s) --path="$HOME/Local Sites/cnctrainingcentre-old/app/public"
   # read it back from NEW — MUST return "not set"
   wp option get ns_iso_marker --path="$HOME/Local Sites/cnctrainingcentre/app/public"
   ```
4. **TCP is blocked** on these MySQL servers (`Host '127.0.0.1' is not allowed`). All direct SQL must go through the **unix socket** with the version-matched client:
   - OLD: `.../lightning-services/mysql-8.4.0/bin/darwin-arm64/bin/mysql --socket=<O4IusZ9Wq sock> -uroot -proot local`
   - NEW: `.../lightning-services/mysql-8.0.35+4/bin/darwin-arm64/bin/mysql --socket=<kHnLEy_QU sock> -uroot -proot local`
5. **Full DB dump of the clone before the first write**, kept off the site tree:
   `wp db export ~/cnc-clone-backup-YYYY-MM-DD.sql --path="$HOME/Local Sites/cnctrainingcentre-old/app/public" --socket=<O4IusZ9Wq sock>`
   Take a fresh dump before each workstream (A, B, C). These are the rollback points.

**No write command runs until steps 1–5 pass.** Every wp-cli/mysql invocation in this plan must carry the explicit `--socket`/`--path` for the intended site. Never rely on a bare host.

---

## 3. Current-state findings (verified by read-only query, 2026-06-05)

### 3.1 The clone (`cnctrainingcentre-old`) — what's really there
- **Theme:** `cnc-training-centre/theme` active (the new build). Good — all 37 SCF blocks, CPTs and taxonomies are registered here.
- **Posts:** 290 published `post` entries = the Learning Hub archive. **All 290 have categories; 193 have tags.**
- **Pages:** 120 **Pending** (the legacy pages Dave parked) + 2 published.
- **Taxonomy reality:** `category` 40 terms (all in use), `post_tag` 285 terms (the "mess"), plus the theme's own `cnc-control` (5) / `cnc-skill` (6) / `course-type` (3) which are **seeded but essentially unused on real posts.**
- **Tutor LMS + WooCommerce present:** `courses` (Tutor) 8 private/1 publish, `lesson` 80, `topics` 44, `tutor_quiz` 176, `product` 4.
- **Junk volume:** `c4p_log` 7,428, `iwp_log` 567, `feedback` 278, `revision` 5,770, `attachment` 2,462, `nav_menu_item` 447 (legacy menus).
- **28 active plugins** incl. WooCommerce, Tutor Pro, Gravity Forms, Fluent Forms (+Pro), Mailchimp, Wordfence, Yoast Premium suite, WP Migrate DB Pro, MainWP. **Both required plugins are already active: `secure-custom-fields` (SCF) and `fluentform`.**
- **Reading settings point at legacy pages:** `page_on_front=21803`, `page_for_posts=21805` (old IDs). These must be repointed to the new Home + Learning Hub once built.
- `_wp_page_template` set on 106 of the pending pages (legacy custom templates); 0 of the 120 use SCF/Gutenberg blocks.

### 3.2 The finished build (`cnctrainingcentre`) — source of truth
- **8 SCF-block pages**, all storing pure ACF block markup in `post_content`:
  | ID | Page | ACF blocks | Notes |
  |----|------|-----------|-------|
  | 7 | Home | 8 | |
  | 8 | About | 8 | |
  | 9 | Contact | 4 | Fluent Form embedded |
  | 10 | Onsite Training | 11 | |
  | 11 | Classroom Training | 13 | incl. OSM map block |
  | 12 | Programming Services | 12 | |
  | 13 | Courses | 6 | static `cs-archive` repeater |
  | 20 | Learning Hub | 0 | rendered by `home.php` template, not blocks |
- **Block content carries ZERO attachment IDs / upload URLs / `wp-image-` refs** — confirmed across all 7 block pages. This is the key enabler: page content can be copied DB→DB and will render identically with no media-ID reconciliation.
- **`theme_mods_cnc-training-centre/theme`** present (525 bytes) — Customizer values (contact details, venue address, social, logo) the footer/contact blocks read from.
- Reading settings: `page_on_front=7`, `page_for_posts=20`.
- **`cnc-course` CPT exists but is EMPTY (0 posts) on both sites**, and **no block queries it** — `block-cs-archive` uses a manual ACF repeater (`courses`), not an auto-pull. The CPT's archive (`archive-cnc-course.php`) and `single-cnc-course.php` are fully built and *do* auto-pull `cnc-course`, but nothing is feeding them yet. See § 7.

### 3.3 The Learning Hub filter — why it doesn't work
- `home.php` renders a **top toolbar** with **hardcoded pills**: Control (Fanuc/Heidenhain/Siemens/Mazak/Hurco/Brother/Haas/Sliding head/Edgecam/Doosan/XYZ), Skill level (Beginner/Intermediate/Advanced), Content type (Article/Video/Guide).
- These map to taxonomies `cnc-control` / `cnc-skill` and to invented "type" values that **almost no real post carries** — so every pill returns nothing.
- The REST endpoint **already exists and works**: `GET /wp-json/_ns/v1/hub` (`_ns_hub_rest_handler` in `functions.php`), accepts `s`, `category`, `cnc-control`, `cnc-skill`, `paged`; renders `template-parts/hub/card.php`; returns `{html,total,has_more}`. It already supports **`category` and free-text `s`** — the two things the real data actually has.
- Source JS: `javascript/hub-filter.js` (compiled to `theme/js/hub-filter.min.js` via esbuild). It reads `.lh-pill` buttons grouped into `cnc-control`/`cnc-skill`/`category` and posts to the endpoint.
- Build pipeline (theme parent dir): `npm run production` → PostCSS (`main.css`→`style.css`) + esbuild (`javascript/*.js`→`theme/js/*.min.js`). Compiled assets are committed.

**Conclusion:** the plumbing is 80% there. The fix is to drive the filter from the **real `category` + `post_tag` terms** (only those with `count > 0`), add a `tag` param to the endpoint, move the toolbar into a **left sidebar**, and rewrite the JS pill/term wiring. No new framework needed.

---

## 4. Workstreams

| WS | Title | Outcome |
|----|-------|---------|
| **A** | New marketing pages onto the clone | The 8 finished pages live on the clone, byte-identical to the new site, front/posts pages repointed |
| **B** | Learning Hub filter rebuild | Left-sidebar search + category + tag filtering, AJAX, no page refresh, built from real assigned terms |
| **C** | Trainings from the Pending pages | Each legacy training page becomes a structured `cnc-course` entry with migrated content |
| **D** | Nav, redirects, settings, cleanup | New menu, 301 map for SEO, reading settings, legacy-page disposition |
| **E** | Internal link integrity & redirects | Every internal link + ~965 inbound URLs resolve in one hop after restructure; no 404 storm |

Recommended order: **Step 0 → A → B → C → E → D**. A is low-risk and unblocks visual QA; B is self-contained; C is the largest content effort; **E runs after C because it can only rewrite links once every destination exists (pages copied, `cnc-course` populated)** — it shares the master URL map with D's redirects; D closes out. The **permalink-base decision (WS-E E.1, OD-9) is the master gate** for both C and E — lock it before building the URL map.

---

## 5. WS-A — New marketing pages onto the clone

**Method: direct `post_content` copy, DB→DB.** Because the block markup has no embedded media IDs and both sites share identical theme + local ACF field keys, copying `post_content` reproduces each page exactly. This beats re-running the `build/compose-*.php` WP-CLI composers (those are the fallback if a page needs regenerating from scratch).

### A0. Pre-flight
- Backup clone DB (§ 2.5).
- Confirm SCF + the theme are active on the clone (verified: yes).
- Copy Customizer values so footer/contact/venue render: export `theme_mods_cnc-training-centre/theme` from NEW and import to OLD (`wp option get/update` with each site's `--path`/`--socket`). Also copy any theme options the blocks read (Customizer reviews link, phone/email/address).

### A1. Create / reuse the 8 page records on the clone
Each new page maps to either a **legacy pending page to repurpose** (keep its ID + slug for SEO) or a **fresh page**. Preferred: reuse the legacy slug where one cleanly matches, so the ranking URL is preserved.

| New page | Clone target | Action |
|----------|-------------|--------|
| Home | new front page | new page `home` (legacy `home`/`home-2` 15692/15694 → 301) |
| About | — (no legacy "about") | new page `about` |
| Contact | legacy `contact` 20040 | repurpose → publish, replace content |
| Onsite Training | legacy `onsite-training` 15854 | repurpose → publish, replace content |
| Classroom Training | legacy `cnc-classroom-training` 429 | repurpose → publish, replace content |
| Programming Services | legacy `cnc-programming-2` 972 (or new `programming-services`) | repurpose or new |
| Courses | legacy `courses` 1020 | repurpose → publish, replace content |
| Learning Hub | new page `learning-hub` | new page, set as posts page |

> Slug reuse vs. new slug is a per-page SEO call (§ 12 OD-4). Default: reuse the legacy slug when the page is a true 1:1 replacement; otherwise new slug + 301 from the legacy slug.

### A2. Copy content (per page)
For each of the 7 block pages (not Learning Hub):
1. Read `post_content` from NEW by ID (table § 3.2).
2. Write it verbatim into the clone target page's `post_content`; set `post_status=publish`, correct `post_title`, `post_name` (slug per A1), `_wp_page_template` cleared (use default `page.php`).
3. Use `wp post get <id> --field=content` / `wp post update` with explicit `--path`/`--socket` per site, or a single PHP migration script run via `wp eval-file` against each site. **Never** copy by hand.

### A3. Learning Hub page
- Create/confirm page `learning-hub` (empty content — `home.php` renders it).
- Set reading settings on the clone: `show_on_front=page`, `page_on_front=<new Home ID>`, `page_for_posts=<learning-hub ID>`.
- This activates `home.php` (the Hub archive) and makes WS-B testable.

### A4. Verify A
- `npm run production` not required for WS-A (no asset change) — but run it once at the end of the whole job.
- Browser-check each page on `cnctrainingcentre-old.local` desktop + mobile against the same page on `cnctrainingcentre.local`. They must be visually identical.
- Section-count parity: rendered `<section>` count/order on clone == new site, per page (the NS section-diff gate).
- Confirm footer/contact/venue pull correct values from the copied Customizer mods.

**Risk for A:** the Courses page (`block-cs-archive`) holds a **manual** course repeater, so its 8 cards copy across fine as static content. If WS-C later makes Courses auto-pull `cnc-course`, this page changes — sequence C's Courses decision before finalising this page (§ 7, § 12 OD-1).

---

## 6. WS-B — Learning Hub filter rebuild (left sidebar, real terms, AJAX)

**Goal:** a working filter that uses the categories and tags **already on the 290 posts**, plus a search box, all AJAX, no page refresh, laid out as a **left-hand sidebar** beside the results grid.

### B1. Decide the filter taxonomy set (real data)
- **Primary facet: `category`** — 40 terms, every post has one. Strong signal (Fanuc Turn 41, Fanuc Mill 38, Haas Mill 35, Beginners 23, Siemens 15, Edgecam 18, Macro 11…). This is the spine of the filter.
- **Secondary facet: `post_tag`** — 285 terms, 193 posts tagged. Useful but noisy; show as a secondary, possibly searchable/"show more" list, or top-N by count (§ 12 OD-2).
- **Search: `s`** — free text across title/content (endpoint already supports it).
- **Drop** the `cnc-control` / `cnc-skill` / content-type pills entirely for now (no data behind them). Keep the taxonomies registered for future structured tagging; just don't surface empty filters.

### B2. Endpoint changes (`functions.php` `_ns_hub_rest_handler`)
- Add a **`tag`** param (`sanitize_key`, `post_tag` by slug) to the `tax_query`.
- Allow **multiple** category/tag selections (accept comma-separated slugs → `terms` arrays; `operator` `IN`; relation between facets `AND`).
- Keep `s`, `category`, `paged`. Keep `per_page=12` + pagination (`has_more`).
- Leave `cnc-control`/`cnc-skill` handling in place (harmless) or remove — minor.
- Return the existing `{html,total,has_more}` shape (card markup unchanged — `card.php` already renders category as the tag chip).

### B3. Template changes (`home.php`)
- Replace the hardcoded `.lh-toolbar` block with a **two-column layout**: `aside.lh-sidebar` (filters) + the results column (`#cardGrid` + count + pagination/empty state).
- Render filter lists **dynamically**:
  - Categories: `get_terms(['taxonomy'=>'category','hide_empty'=>true])` → checkboxes/pills with `data-tax="category" data-slug="…"` + count.
  - Tags: same with `post_tag`, `hide_empty=>true`, ordered by count, optional `number` cap + "show all" (OD-2).
  - Search input at the top of the sidebar.
- Keep IDs the JS needs consistent (`cardGrid`, result count, clear-all, active chips). **Note an existing ID mismatch to fix:** `home.php` uses `#hubSearch`, `#filterBar`, `#cardGrid`, `#resultCount`, `#clearAll`, `#activeChips`, while `hub-filter.js` looks for `#lhSearch`, `#lhEmpty`, `#lhResultCount`, `#lhClear`, `#lhActiveChips`. **This ID drift is part of why nothing fires.** Align them in the rewrite.
- Sidebar must collapse to a top accordion / "Filters" disclosure on mobile.

### B4. JS rewrite (`javascript/hub-filter.js`)
- Read selected `category` + `tag` slugs from the sidebar controls (support multi-select), plus debounced search (250ms).
- Build query string, `fetch` the endpoint with `X-WP-Nonce`, swap `#cardGrid` innerHTML with `html`, update count, toggle empty state, manage active-filter chips with × removal and "clear all".
- Push state to URL (`?category=…&tag=…&s=…`) for shareable/back-button support; hydrate filters from URL on load.
- Pagination: either "Load more" (append, using `has_more`) or numbered (replace). Pick one (OD-3) — "Load more" is simplest with AJAX and matches the endpoint's `has_more`.
- Loading state class on the grid.

### B5. Build + verify
- `npm run production` (compiles JS + CSS, stamps `assets.ver`). Commit compiled assets.
- Verify on the clone Hub page: search narrows live; category filter returns correct counts; tag filter works; combined facets AND correctly; clear-all resets; URL reflects state and is shareable; no full-page reload; mobile accordion works; empty state shows on no match.
- Cross-check totals against direct SQL counts for a couple of categories (e.g. "Fanuc Turn" → 41).

**Out of scope for B:** re-tagging or cleaning the 285 tags. Dave's directive is "use the tags and categories already assigned for now." A future tidy-up of the tag mess is a separate optimisation (note in § 11).

---

## 7. WS-C — Trainings from the Pending pages

This is the largest and most decision-sensitive workstream. **It needs Dave's model decision (§ 12 OD-1) before execution.**

### 7.1 What the theme gives us
- A purpose-built **`cnc-course` CPT** (UI label literally **"Training"**, menu "Training", archive slug **`/training/`**), with ACF "Course Details": `course_eyebrow`, `course_format` (Classroom / Online / Onsite), `course_duration`, `course_price`, `course_level` (Beginner / Intermediate / Advanced), `course_short_dek`.
- `course-type` taxonomy (Classroom / Online / Onsite — already seeded).
- `archive-cnc-course.php` (renders the *online courses* design, auto-pulls all `cnc-course`) and `single-cnc-course.php` (individual training page). **Both already built, currently fed nothing.**
- **Latent bug to fix:** `archive-cnc-course.php`'s header comment says it serves `/courses/`, but the CPT registers `has_archive => 'training'`. And there's also a **static `Courses` page** (block-built) plus Tutor LMS's own `courses` CPT. Three "courses/training" surfaces overlap — resolve the URL ownership during C (§ 12 OD-1/OD-5).

### 7.2 The model decision (OD-1)
- **Option A (recommended): `cnc-course` CPT.** Each legacy training page → one `cnc-course` post. Set `course_format`/`course-type`/`course_level`/`duration`/`price`/`dek`; migrate the legacy body into the editor. Surfaces at `/training/` archive + `single-cnc-course.php`, and can feed the service-page blocks once we wire an auto-pull. Matches what the theme was explicitly built for. Cleanest long-term + best for SEO (structured, filterable).
- **Option B: SCF-block pages.** Each training = a normal page built from blocks (like the 8 marketing pages). Maximum layout control per training, but 40+ hand-composed pages, no shared structure, no archive — high effort, weak consistency.
- **Option C: hybrid.** Service landing pages stay as the marketing pages (Onsite/Classroom/Programming/Courses); only the *online* courses become `cnc-course`; the machine/control-specific in-person trainings (Fanuc, Mazak, Siemens, Toshiba, Sliding head…) become Learning-Hub-adjacent content or are folded into the service pages + redirects.

**Recommendation: Option A**, because the CPT, archive and single template already exist and the client's catalogue is naturally structured (format × skill level × machine/control). If A is chosen, we also decide whether the service pages (Onsite/Classroom/Courses) should **auto-pull** their relevant `cnc-course` entries (by `course-type`/`course_format`) instead of the current manual repeater — that's the "auto-pull by term" intent from the 2026-05-27 decisions, not yet implemented (OD-1b).

### 7.3 Pending-page disposition (all 120 bucketed)
Counts are approximate groupings; the full ID list is in Appendix A. Each bucket gets a rule, not per-page hand-holding, except where flagged.

| Bucket | ~Count | Rule |
|--------|-------|------|
| **Trainings** (in-person, online, control/machine/skill-specific) | ~48 | → `cnc-course` (Option A). Migrate body, set ACF fields, assign `course-type`. 301 legacy slug → new training URL. |
| **"Apply / Enquiry" funnel pages** | ~27 | Replace with a single Fluent Forms enquiry flow + per-training CTA (pre-filled service). Decide keep-vs-consolidate (OD-6). 301 to the matching training. |
| **"Course Details" (Tutor LMS)** | 8 | Tied to Tutor courses. Keep Tutor for paid online courses, or migrate to `cnc-course` (OD-5). |
| **Woo / system pages** (cart×3, checkout×3, my-account, shop, dashboard, registrations, tutor-login, certificates, form previews) | ~17 | Keep only what the chosen commerce/LMS path needs; trash the rest. Driven by OD-5 (Woo/Tutor future). |
| **Content/other** (news, tips-n-tricks, video-tutorials, case-studies, careers, business-partners, "best course for me", refund-policy) | ~12 | Case-by-case: route Hub-type content into the Learning Hub; keep policy pages; 301 the rest. |
| **Duplicates of new pages** (home/home-2, contact, courses, onsite-training, classroom variants) | ~8 | Superseded by WS-A pages → 301. |

### 7.4 Execution (assuming Option A)
1. Backup clone DB.
2. Build/confirm `course-type` terms (Classroom/Online/Onsite) and decide whether `course_level` + a `machine/control` need their own taxonomy for training filtering (OD-1c).
3. **One migration pass, scripted, idempotent** (via `wp eval-file` on the clone):
   - For each training page in Appendix A → create a `cnc-course` post: title from page, `post_content` = cleaned legacy body (strip legacy shortcodes/templates), `post_status=publish`.
   - Set ACF fields from a **mapping table Dave confirms** (format, level, duration, price, dek, eyebrow). Body content exists and is substantial (5K–11K chars on the big ones), so there's real copy to migrate — but it predates the new voice; flag whether it needs a copy pass (OD-7).
   - Assign `course-type` term.
   - Record `legacy_page_id` + `legacy_slug` in post meta for the redirect map.
4. Decide Courses/Training URL ownership and wire the service pages (auto-pull or keep manual) per OD-1b.
5. Fix the `archive-cnc-course.php` `/courses/` vs `/training/` comment/route mismatch.
6. Verify `/training/` archive + a sample of singles render with correct fields, desktop + mobile.

**This workstream should itself be decomposed into small scripted batches** (e.g. by `course-type`), each ≤ a few hundred lines, with a dry-run that prints what it *would* create before writing. No single mega-script.

---

## 8. WS-D — Nav, redirects, settings, cleanup

### D1. Navigation
- New site menu (reference): Home · Learning Hub · Onsite · Classroom · Programming · Online (+ About/Contact). The clone has 447 legacy `nav_menu_item`s across 8 menus — do **not** try to edit those.
- Build a fresh primary menu on the clone matching the new site, pointed at the new page IDs + `/training/` (or per OD-1 URL). Assign to the theme's nav location(s). Build the mobile drawer menu to match.
- Trash the legacy menus once the new menu is verified.

### D2. Redirects (SEO-critical — the site has ~965 indexed URLs)
- Produce a **301 map**: every legacy slug that we supersede or convert → its new destination (training single, service page, or Hub). Source legacy slugs from Appendix A + the broader published-page/post set.
- Yoast Premium (active) has a redirects module — use it, or Redirection plugin. Export the map as CSV first for Dave to eyeball.
- Priority: the high-content training pages (Fanuc, Mazak, Siemens, Macro, Setter/Operator, Edgecam) and any URL with existing rankings/backlinks.

### D3. Reading + front settings
- `show_on_front=page`, `page_on_front=<Home>`, `page_for_posts=<learning-hub>` (done in A3 — reconfirm).
- Permalinks: flush after CPT/redirect changes (`wp rewrite flush`).

### D4. Cleanup (after everything verified — separate backup first)
- Trash legacy menus, superseded pages (left as redirects, not deleted, until 301s confirmed).
- **Before pruning any media:** compute the set of upload URLs referenced in content (the 1,043 in-content media links + PDFs) and lock those files against deletion. Never prune by "unattached in the library" — attachment-parent ≠ referenced-in-body (WS-E R7). Cleanup must run AFTER WS-E, not before.
- Optionally prune logs (`c4p_log` 7.4k, `iwp_log` 567) and old revisions (5,770) to slim the DB before the eventual migrate-up — but only with Dave's nod; these are non-destructive to content.
- Reconcile plugins: the live launch needs SCF + Fluent Forms + Yoast + (Woo/Tutor per OD-5). Deactivate what the new site doesn't use **only after** confirming nothing live depends on it.

---

## WS-E — Internal link integrity & redirect strategy

> Produced by a multi-agent design + red-team pass against the measured link graph (2026-06-05). This is the answer to "internal links will 404 after restructure." Self-contained; subsections E.0–E.6.

### E.0 — Problem (measured, read-only from the real DBs)

The clone holds 290 published posts (Learning Hub) and 120 pending legacy pages carrying **4,201 `<a href>` links** (3,202 internal). The new theme moved the post permalink base from the live `/%postname%/` to `/learning-hub/%postname%/`, which breaks every existing internal article link. Classified by final slug: **981** internal links point at surviving posts (kept slugs, but stored at old `/<slug>/` or `/<prefix>/<slug>/` paths) — they break under the new base; **878** point at pending pages being restructured (404 risk); **297** are true orphans (top: `/contact-us/` ×153, `/featured-article/haas-programming-training/` ×73, `/pay-two-days-weekend-classroom-training/` ×9, `/advanced-mill-turn-training/` ×8, plus `/apply-now/`, `/product/cnc-basics/`, 2 `/wp-admin/post.php` junk); and **1,043** are internal media links (`/wp-content/uploads/...`) that survive only if the media file survives.

### E.1 — RECOMMENDATION: revert the permalink base to `/%postname%/`

**Revert to `/%postname%/` (match live). Do NOT keep `/learning-hub/%postname%/`.** Reasoning:

- **External backlink equity is anchored at `/<slug>/`.** Every inbound link a third party ever built points at the live structure (`/<slug>/` or a historical prefix), never at `/learning-hub/<slug>/` — that base has never existed in production. Keeping the new base puts a permanent 301 hop on 100% of post-level backlink equity on day one.
- **981 internal links resolve for free.** Under `/%postname%/`, the bare-`/<slug>/` subset is a native 200 with no redirect at all. Under the new base, all 981 need a 301.
- **The ~700 historical prefix paths need redirects either way** — but under the revert they 301 to a live, stable `/<slug>/` target that also matches backlinks, instead of to a base Google has never indexed.

| URL class | Keep `/learning-hub/` | Revert to `/%postname%/` |
|---|---|---|
| 290 posts at bare `/<slug>/` | 290 × 301 (every post moves) | **0** (native 200) |
| ~700 prefix paths → post | ~700 × 301 (target = new base) | ~700 × 301 (target = `/<slug>/`) |
| 120 pending → marketing/cnc-course | ~120 × 301 | ~120 × 301 |
| 297 orphans | ~10 deduped rules | ~10 deduped rules |
| **Net cost of base choice** | **+290 redirects, +290 backlink hops** | **baseline** |

Keeping the new base buys nothing and costs 290 avoidable redirects plus a permanent hop on the highest-value backlink class. CLAUDE.md's theme rules ban page-prefix CSS classes — they do **not** mandate a `/learning-hub/` permalink base. No conflict. Revert unless the client gives a hard reason not to.

> This decision is the master gate. The base flips the direction of the in-content rewrite (E.4 category A/B) and the redirect targets (E.5). **Lock it in writing before authoring a single map row or command.** The procedure below is written for the reverted base; the `$BASE` switch in E.4 carries the alternative.

### E.2 — Destination rules per URL bucket (reverted base)

| Bucket | Old URL shape | New destination | Status |
|---|---|---|---|
| Kept post (native) | `/<slug>/` | same `/<slug>/` | **200 native** (no rule) |
| Kept post via old prefix | `/<prefix>/<slug>/` | `/<slug>/` | **301** |
| Restructured training | old training page path | `/training/<cnc-course-slug>/` | **301** (human-assigned target) |
| Restructured marketing | pending marketing page | new SCF page (`/classroom-training/`, `/onsite-training/`, …) | **301** (human-assigned) |
| Apply / enquiry intent | `/apply-now/`, `/pay-two-days-weekend-classroom-training/` (×9) | new enquiry/contact page | **301** |
| Contact | `/contact-us/` (×153) | `/contact/` | **301** (top priority) |
| WooCommerce product | `/product/cnc-basics/` | nearest cnc-course or `/training/` | **301** |
| Tutor course | `/courses/<slug>/` | matching cnc-course single, else `/training/` | **301** |
| Tutor lesson deep-link | `/courses/<slug>/lesson/<y>/` | parent cnc-course single | **301** (or 410 if lessons not reproduced) |
| Orphan, topical home exists | misc orphan that maps | nearest relevant post/page | **301** |
| Orphan, no home / junk | dead campaign URL, `/wp-admin/post.php?...` | — | **410** (junk anchors also stripped from source) |

**Never 301 a dead URL to the homepage** — Google reads mass redirect-to-home as soft-404. Use 410 for genuinely dead URLs with no successor.

### E.3 — Procedure (run in this order)

**Site:** `cnctrainingcentre-old` (clone). **DB access = unix socket only** (verified socket in Appendix B; the bare `DB_HOST` hazard is § 2). Set up once per script (shell state does not persist between calls):

```bash
WP="/Users/davidmerton/Local Sites/cnctrainingcentre-old/app/public"
SOCK="/Users/davidmerton/Library/Application Support/Local/run/O4IusZ9Wq/mysql/mysqld.sock"
D="$(wp --path="$WP" --socket="$SOCK" option get home)"   # literal Local domain for absolute-link pairs
```

**Step 0 — Backup (non-negotiable rollback point).**
```bash
wp --path="$WP" --socket="$SOCK" db export /tmp/cnc-old-pre-rewrite.sql
```
Confirm the dump exists and is restorable before any live replace.

**Step 1 — Make every destination exist first.** Marketing SCF pages copied; `cnc-course` CPT created **and trainings migrated (bodies present)**; pending pages restructured/merged/deleted; contact page final slug fixed. Rewriting to a URL that does not exist yet = guaranteed 404. The CPT must be populated **before** Step 4 or its body links go untouched and its targets do not resolve.

**Step 2 — Finalise merge/delete/restructure decisions**, then **build and FREEZE the master OLD→NEW map** (CSV: `old_path,new_path,status,bucket,priority`, relative paths, no domain). Freeze *after* content decisions are final and *before* Step 4. This one map drives both the in-content rewrite (Step 4) and the redirects (Step 6). Enumeration sources:
1. 290 kept post slugs → `/<slug>/`.
2. **Every historical prefix path — derived by grepping the actual hrefs**, not a hardcoded list (prefixes incl. `/parameters/`, `/tips-tricks/`, `/cnc-programming/`, `/featured-article/`, `/video-tutorials/`, `/courses/`, `/beginners/`, …). For each `/<prefix>/<slug>/` emit literal old → `/<slug>/`.
3. 120 pending page slugs → chosen destination.
4. 297 orphans (dedupe to ~10 rules).
5. Tutor `/courses/<slug>/` **and** `/courses/<slug>/lesson/<y>/` deep-links.
6. **The live `.htaccess` + live Yoast/Redirection table, exported and diffed in** (Risk R6) + GSC "Pages" top inbound URLs (the internal graph misses paths linked only externally).

Map integrity asserts before freeze: every `/<prefix>/<slug>/` flatten target resolves **1:1** to a real post ID (flag many-to-one / one-to-many); **exclude all orphan paths from the prefix-flatten set**; no `new_url` appears as another row's `old_url` (chain); zero rows where old or new contains `/learning-hub/` for a post slug (loop guard).

**Step 3 — Set the permalink base + flush.**
```bash
wp --path="$WP" --socket="$SOCK" option update permalink_structure '/%postname%/'
wp --path="$WP" --socket="$SOCK" rewrite flush      # soft — NOT --hard (.htaccess does not travel via WP Migrate)
```
Confirm `cnc-course` single + `/training/` archive resolve and do not collide with the reverted post base.

**Step 4 — In-content rewrite (all surfaces) — see E.4 for exact commands.** Dry-run every pair, read clean, then run live and tee a log. Makes internal links native 200 with zero hops; redirects are only the safety net.

**Step 5 — `wp rewrite flush` again** if any CPT/archive rule changed during Step 4.

**Step 6 — 301 catch-all in Yoast.** Build the redirect CSV from the SAME frozen map (relative, domain-agnostic). **Verify the exact Yoast Premium import schema in the installed version before generating the file.** Yoast redirects run as a PHP `template_redirect` hook stored in the DB (so they travel with the WP Migrate push). Pre-import grep the export: zero `learning-hub` post-level rows; no `new_url` that is another `old_url`; each rule fixpoint-stable. Use Yoast regex for prefix buckets (`/<prefix>/(.*)` → `/$1`), explicit rows for orphans/pending. 410 the junk URLs scoped to their exact query string, never bare `/wp-admin/post.php`.

**Step 7 — Crawl the clone for residual 404s (LOCAL crawler).** Use `wget --spider -r` or Screaming Frog on the `.local` URL — **Firecrawl cannot reach a `.local` host; reserve it for public staging/prod.** Assert: zero internal 404s; internal `<a>` responses 200 not 301 (a 301 on an internal link = a missed rewrite pair → fix the pair); no 301→301 chains. **QA by content presence, not status code** (catch soft-404s). DB complement: run each old prefix/orphan path as an identity-replace **with `--dry-run`** → must report 0 changed rows; non-zero = a surface the table list missed. Loop until clean.

**Step 8 — Push, then GSC.** WP Migrate DB Pro push (does the Local→live domain swap on the now-correct paths). After push: no Change of Address (same domain); resubmit `sitemap_index.xml` and confirm it lists `/<slug>/` posts + `/training/` + cnc-course singles + new SCF pages, and **zero** `/learning-hub/` or pending/draft URLs; URL-Inspection-request the top kept posts + `/contact/` + `/training/`; monitor Coverage daily for 2 weeks (each new 404 = a missing map row); expect the 410 junk as "Excluded → Not found (410)".

### E.4 — In-content rewrite: exact WP-CLI

**Why `wp search-replace`, never raw SQL `UPDATE … REPLACE()`:** post_content, ACF postmeta, `theme_mods`, and widget options hold PHP-serialized, length-prefixed strings. Raw SQL changes bytes but not the length prefix → the blob corrupts on unserialize. `wp search-replace` unserializes, replaces inside, re-serializes with corrected lengths. (Serialization safety is wp-cli's default; `--precise` forces the PHP path over the SQL fast-path for match fidelity — keep it, but the safety comes from using wp-cli at all.)

**Command shape — every pair, dry-run first:**
```bash
wp --path="$WP" --socket="$SOCK" search-replace '<OLD>' '<NEW>' \
  wp_posts wp_postmeta wp_options wp_terms wp_termmeta \
  --skip-columns=guid --precise --report-changed-only --dry-run
```
- `--skip-columns=guid` — **mandatory.** `$D` appears in `guid`; rewriting GUIDs re-floats all 290 posts in every feed reader.
- **Explicit table list, NOT `--all-tables`.** Never pass `--all-tables-with-prefix=false` (invalid — the flag is a bare boolean). If a dry-run shows Tutor/Woo course bodies missed, widen deliberately to bare `--all-tables-with-prefix`, never `--all-tables`.
- Tables cover the surfaces: `wp_posts` (post_content of posts + cnc-course + `nav_menu_item`), `wp_postmeta` (ACF/SCF block fields, `_menu_item_url` custom-link nav, Yoast meta), `wp_options` (`theme_mods_cnc-training-centre` footer/Customizer, `widget_*`), `wp_terms`/`wp_termmeta` (term descriptions). Do **not** touch `siteurl`/`home`.

**Work in Local-domain space.** All 3,201 absolute internal links point at `$D` now. Rewrite paths against `$D`; let WP Migrate swap Local→live on push.

**Category A — flatten historical prefix paths → bare slug** (prefix list grepped from real hrefs, orphans excluded):
```bash
for P in $(cat /tmp/prefixes-from-href-grep.txt); do   # NOT a hardcoded list
  wp --path="$WP" --socket="$SOCK" search-replace "$D/$P/" "$D/" \
    wp_posts wp_postmeta wp_options wp_terms wp_termmeta \
    --skip-columns=guid --precise --report-changed-only --dry-run
done
```

**Category B — bare-slug kept posts.** Under the reverted base this is a **no-op** (links already `/<slug>/`). Keep behind the `$BASE` switch so the same script serves the kept-base decision (then B rewrites `$D/<slug>/` → `$D/learning-hub/<slug>/`). Generate slugs with `wp post list --post_type=post --post_status=publish --field=post_name` (one slug per line; do NOT add `--format=ids`).
**Slug-collision guard (both bases):** before any bare-`/<slug>/` pair, diff post slugs against (a) prefix tokens, (b) pending-page slugs, (c) all category/tag slugs (`category_base`/`tag_base` empty → archives at `/<slug>/`). Any collision → hand-authored fully-qualified pair, never the blanket loop.

**Category C — pending pages → new destinations** (878 bucket), one explicit pair per the frozen map. **Category D — orphans → chosen destinations** (explicit, never via prefix flatten):
```bash
wp ... search-replace "$D/contact-us/" "$D/contact/" ... --dry-run   # ×153, top priority
wp ... search-replace "$D/apply-now/"  "$D/contact/" ... --dry-run
# /featured-article/haas-programming-training/ (×73): ORPHAN — slug does NOT survive.
#   Hand-map to nearest Haas article/cnc-course; EXCLUDE from Category A (blind flatten → 404).
```
**Junk:** the 2 `/wp-admin/post.php?...` links are **stripped from source posts** (edit the anchor out), not mapped. **Relative link:** the 1 relative href won't match a `$D`-prefixed pair — add a domainless pair or normalise to absolute. **Media:** the 1,043 `/wp-content/uploads/...` links are **left alone** (survive if the file survives; WP Migrate swaps domain).

After all dry-runs read clean, re-run with `--dry-run` removed, `| tee -a /tmp/cnc-rewrite.log`.

### E.5 — Risk register (deduped, survived red-team)

| # | Risk | Mitigation |
|---|---|---|
| R1 | Base change turns the 981 surviving-post links into a self-inflicted 301 storm. | Revert base (E.1); rewrite the 981 hrefs in-content (E.4). Redirects = net for external traffic only. |
| R2 | ~700 historical-prefix paths not covered by a slug-only map → 404/soft-404. | Enumerate every `/<prefix>/<slug>/` by grepping real hrefs; flatten to `/<slug>/`. Derive, don't hardcode. |
| R3 | Redirect chain (prefix → old base → new base) or loop. | Every map row → its final 200 target in ONE hop; zero rows touching `/learning-hub/` for a post slug; chain audit; fixpoint-test each rule. |
| R4 | Slug collisions (short slug matches inside a prefix/page/taxonomy path; shared slugs under different prefixes). | Diff post slugs vs prefix/pending/taxonomy before the bare-slug pass; hand-author colliding pairs; assert each flatten target → 1:1 post ID. |
| R5 | `/featured-article/haas-programming-training/` (×73) double-classified (orphan + flatten candidate); blind flatten → 404. | Exclude all orphan paths from Category A; hand-map to nearest Haas article/cnc-course. |
| R6 | Live `.htaccess` / existing live redirects lost on push (orphan profile implies live already redirects these). | Export live `.htaccess` + live Yoast/Redirection table before building the map; diff in; never let the push truncate the redirects table. |
| R7 | Referenced media pruned → 1,043 links become hard 404s (missing static file, outside WP). | Compute the referenced-upload-URL set (incl. PDFs) from content; lock those files against deletion **before** any media cleanup. Never prune by "unattached in library". |
| R8 | cnc-course CPT bodies (5–11k chars legacy copy) are a fresh link surface, not in the original graph. | Populate CPT before Step 4; `wp_posts` rewrite hits all post types — confirm rows exist, re-scan post-rewrite. |
| R9 | Surfaces outside post_content missed — nav `_menu_item_url`, Customizer `theme_mods`, widgets, ACF/SCF fields. | E.4 table list covers them; `--precise` for serialized rows; spot-check `wp menu item list`, `wp option get theme_mods_*`, `wp post meta list`. |
| R10 | wp-cli flag errors (guid rewritten, invalid `=false`, `--field`+`--format=ids` garbage, identity-replace without `--dry-run`). | `--skip-columns=guid` always; drop `=false`; `--field=post_name` alone; `--dry-run` on every identity counter. |
| R11 | Soft-404: new theme returns 200 on an unknown slug (empty archive shell). | Ensure unmatched routes return a real 404 header; QA by content presence, not HTTP 200. |
| R12 | 301 to a generic page = soft-404 + equity dilution for the 878 restructured pages. | Map each retired page 1:1 to its closest successor; 410 truly dead; homepage only last resort. |
| R13 | Map built from clone internal links ≠ inbound reality (externally-linked old paths absent). | Cross-reference GSC "Pages" + top inbound + the live redirect export into the map. |
| R14 | Tutor lesson deep-links / Woo conversion paths orphaned. | Add lesson-path + product + apply buckets (E.2); 301 to new cnc-course/contact; test the click path end-to-end. |
| R15 | Fluent Forms confirmation/redirect URLs point at orphans (`/apply-now/`, `/contact-us/`). | Audit every form's confirmation + redirect-after-submit; map any old path; test a submission per form post-launch. |
| R16 | Yoast manual canonical / sitemap pointing at a redirected URL (canonical→301 merges wrong URL). | Clear/repoint `_yoast_wpseo_canonical` to final `/<slug>/`; regenerate + resubmit sitemap; never leave a canonical on a redirected URL. |
| R17 | GUID rewrite re-floats the feed. | Don't rewrite the `guid` column (covered by R10); regenerate the feed. |
| R18 | Firecrawl can't reach `.local` — verification crawl silently fails. | Local crawler (`wget --spider -r` / Screaming Frog) for the clone; Firecrawl only against public staging/prod. |
| R19 | WP Migrate domain swap misses URL variants (`http`/`https`, `www`/non-`www`, JSON-escaped `\/`). | Configure WP Migrate find/replace for every variant of both domains; post-push grep for residual Local-domain strings. |
| R20 | No live backup before destructive replace. | Step 0 `wp db export`, confirmed restorable, before the first live run. |

### E.6 — Open decisions this surfaces (added to § 12 as OD-9…OD-12)

1. **Permalink base** — revert to `/%postname%/` (recommended) or keep `/learning-hub/%postname%/`? Master gate.
2. **301 vs 410** for genuinely dead URLs (the `/wp-admin/post.php` junk + any dead campaign/product URL with no successor). Recommend 410.
3. **Historical prefix paths** — retire the redirect rules after ~a year once GSC shows zero hits, or keep permanently for long-tail backlinks?
4. **Tutor LMS fate** — does `cnc-course` fully replace Tutor (then `/courses/` + lessons 301 to cnc-course; lessons 410 if not reproduced), or does Tutor stay (its `/courses/` base must not collide with `/training/`)? Needs a call before map freeze. (Same axis as OD-5.)
5. **`/apply-now/` + `/pay-two-days-weekend-classroom-training/` destination** — single `/contact/`, or a dedicated enquiry page with its own Fluent Form? (Same axis as OD-6.)
6. **Redirect engine** — Yoast Premium (already active) vs Redirection plugin. Pick one; never both.
7. **`/contact-us/` final slug** — confirm new contact page is `/contact/` (the ×153 top rule depends on it).

---

## 9. Build / deploy mechanics
- Any theme code change (WS-B JS/CSS, template edits, auto-pull wiring) is made in the theme repo, then **`npm run production`** (PostCSS + esbuild + `assets.ver` stamp). Compiled `style.css` / `style-editor.css` / `js/*.min.js` are **committed**.
- The clone is a *content* target; theme code edits belong in the theme's git repo (`cnc-training-centre-website`) and get pulled in. Keep content (DB) and code (theme) changes in their own lanes.
- Eventual go-live = WP Migrate DB Pro push (DB + theme files) from clone → staging/prod (the server can't compile, so committed assets must travel).

---

## 10. QA gates (per workstream, before sign-off)
1. **DB isolation marker test passes** (§ 2) — re-run before each workstream.
2. **No page-prefix CSS leaks:** `grep -rE '\.(prog|ot|ct|cs|lh|ab)-' theme/styles theme/blocks` → only canonical block roots (the codebase already uses `.lh-*`/`.cs-*` inside `home.php`/blocks as block roots — confirm these are block-namespaced, not page-slug-coupled).
3. **Section-diff parity:** each copied page's rendered `<section>` count + order on the clone == new site.
4. **Hub filter:** live search + category + tag + combined facets return SQL-accurate counts; no refresh; shareable URL; mobile accordion; empty state.
5. **Trainings:** `/training/` archive + sample singles render all ACF fields; redirects resolve; no 404s on superseded URLs.
6. **Visual side-by-side** clone vs new site, desktop + mobile, every page.
7. **Backups exist** at each workstream boundary.
8. **Link integrity (WS-E):** local crawl returns zero internal 404s; internal `<a>` resolve 200 not 301 (a 301 = a missed rewrite pair); no redirect chains/loops; soft-404 check (real 404 header on unknown slug, not an empty 200 shell); DB identity-replace `--dry-run` of every old path reports 0 changed rows.

---

## 11. Risks & dependencies
- **DB misroute (Step 0)** — highest risk, mitigated by socket pinning + marker test + per-stage backups. Non-negotiable.
- **Slug/SEO** — getting 301s wrong tanks rankings on a 965-URL site. Redirect map reviewed by Dave before cleanup.
- **Three overlapping "courses/training" surfaces** (static Courses page, `cnc-course` `/training` archive, Tutor `courses` CPT) — resolve URL ownership before publishing (OD-1/OD-5).
- **Legacy body content predates the new voice** — migrated training copy may read as the old AI-SEO register the client rejects. Decide copy pass (OD-7).
- **Tag mess (285 tags)** — filter will surface a long, noisy tag list until a future tidy-up. In-scope decision is only how to present them now (OD-2).
- **Plugin weight on the clone (Woo + Tutor + Gravity + MainWP + Wordfence)** — keep until launch decisions are made; don't deactivate blind.
- **Local may rewrite `wp-config.php` DB_HOST on site start** — always pass explicit `--socket` to wp-cli regardless.

---

## 12. Open decisions for Dave (answer before execution)

- **OD-9 — Permalink base (MASTER GATE, decide first).** Revert post base to `/%postname%/` (matches live, recommended — see WS-E E.1) vs keep the theme's new `/learning-hub/%postname%/`. Keeping it costs ~290 avoidable 301s + a permanent hop on every post-level backlink. This decision drives the whole link-integrity workstream and the URL map — lock it before C/E start.
- **OD-10 — 301 vs 410** for genuinely dead URLs (junk + no-successor). Recommend 410. (WS-E E.6)
- **OD-11 — Redirect engine** — Yoast Premium (already active) vs Redirection plugin. One only. (WS-E E.6)
- **OD-12 — Historical prefix-path redirects** — retire after ~a year of zero GSC hits, or keep permanently. (WS-E E.6)
- **OD-1 — Training model.** Option A (`cnc-course` CPT, recommended) / B (SCF-block pages per training) / C (hybrid)? → drives all of WS-C.
  - **OD-1b** — If A: should the Onsite/Classroom/Courses service pages **auto-pull** their `cnc-course` entries by `course-type`, or keep the current manual ACF repeater?
  - **OD-1c** — Do trainings need a machine/control taxonomy of their own for filtering the `/training/` archive, or is `course-type` + `course_level` enough?
- **OD-2 — Hub tag presentation.** Show all 285 tags (searchable "show more"), or top-N by count only? Categories are always shown.
- **OD-3 — Hub pagination style.** "Load more" (append) vs numbered pages.
- **OD-4 — Slug strategy per superseded page.** Reuse legacy slug for the 1:1 replacements (best SEO) vs new clean slug + 301. Default: reuse where clean.
- **OD-5 — Woo + Tutor future.** Keep paid online courses on Tutor/Woo, or fold everything into `cnc-course` (no commerce yet)? Determines disposition of ~25 system/Course-Details pages.
- **OD-6 — "Apply/Enquiry" pages (~27).** Consolidate to one Fluent Forms enquiry with a pre-filled service field, or keep per-training apply pages?
- **OD-7 — Migrated training copy.** Lift legacy body as-is for now, or route each training's copy through the copywriter to match the new voice before publishing?
- **OD-8 — Scope confirmation.** Is About a brand-new page on the clone (no legacy equivalent), and is Programming's slug `programming-services` (new) or reused `cnc-programming-2`?

---

## Appendix A — Pending pages by bucket (IDs)

**Trainings → `cnc-course`:** 20169 Advance Mill Turn · 1374 Beginners CNC Lathe Operator · 13765 Beginners CNC Machining (Turn+Mill) · 18772 Beginners CNC Milling · 1376 Beginners CNC Milling Operator · 18752 Beginners CNC Turning · 16971 Beginners Courses · 1641 CNC Macro Programming · 9211 CNC Operator Setter (Turning) · 549 CNC Programmer Training · 972 CNC Programming · 542 CNC Programming on/offsite · 17013 CNC Router Training · 18768 CNC Setter Operator Milling · 7848 CNC Setter Operator (Milling) · 18770 CNC Setter Operator Turning · 1368 Basic Milling · 1371 Basic Turning · 605 CNC Training Onsite/Offsite · 419 CNC Turnkey Solutions · 970 turnkey · 1233 CNC Productivity Improvements · 1197/1535 Edgecam · 1201 Edgecam Training · 6322 Fanuc Training · 18281 Learn CNC Programming (Individual) · 18762 Macro Programming · 6427 Mazak Mazatrol Training · 16673 Online CNC Milling Zoom · 16702 Online CNC Programming Zoom (Mill) · 16690 Online CNC Programming Zoom (Turn) · 16685 Online CNC Turning Zoom · 16752 Online Training with Zoom · 352 Operator Training (All) · 18764 Program CNC Milling · 18766 Program CNC Turning · 13622 Siemens Training · 19713 Sliding Head & Swiss · 6176 Toshiba Tosnuc · 3518 Work Holding/Fixture · 1153 The Edgecam · 1157 The Haas · 1155 The Heidenhain · 3771 The Programming · 2881 The Turning · 1426/17444 Classroom Courses · 16829/16858/16861/16855/16849/16852 Weekend variants · 9465 Training Onsite

**Apply/Enquiry:** 19427 · 16568 · 20062 · 12480 · 20467 · 18627 · 12490 · 17449 · 19918 · 20071 · 19921 · 12475 · 12412 · 15044 · 9245 · 16858* · 16829* · 16861* · 16855* · 16849* · 16852* · 20065 · 20068 · 12464 · 17385 · 15917 (online-training-enquiry) · 15850 (onsite-training-enquiry)  *(weekend "Apply" vs "training" pages overlap — de-dupe at execution)*

**Course Details (Tutor):** 15177 · 15170 · 15174 · 15151 · 15137 · 15155 · 15161 · 15129

**Woo/system:** 15023/19939/21778 cart · 15024/19940/21779 checkout · 15025 my-account · 15022 shop · 14902 dashboard · 14903 student-registration · 14904 instructor-registration · 19255 tutor-login · 18607/21777 tutor-certificate · 19258 trainee-register · 19222 olstral-registration · 19511 beginners-registration · 4198 mc4wp preview · 8847 wpforms preview

**Content/other:** 450 news · 1151 the-news · 1132 All Posts · 1161 tips-n-tricks · 1159 video-tutorials · 381 case-studies · 18714 careers-in-cnc · 121 business-partners · 9311 best-course-for-me · 13235 refund-policy · 15177 course-details

**Duplicates of new pages → 301:** 15692 home · 15694 home-2 · 20040 contact · 1020 courses · 15854 onsite-training · 429 cnc-classroom-training · 974 Training (child of 972)

> Some IDs appear in two buckets where the legacy title is ambiguous (e.g. weekend "Apply" vs "training"). De-duplicate during the WS-C dry-run before any write.

---

## Appendix B — Verified connection reference (read-only research used these)

```
OLD  cnctrainingcentre-old   id O4IusZ9Wq   MySQL 8.4.0    port 10034
     socket: ~/Library/Application Support/Local/run/O4IusZ9Wq/mysql/mysqld.sock
     client: ~/Library/Application Support/Local/lightning-services/mysql-8.4.0/bin/darwin-arm64/bin/mysql
     wp path: ~/Local Sites/cnctrainingcentre-old/app/public
     ⚠️ wp-config DB_HOST is bare 'localhost' — FIX FIRST (§2)

NEW  cnctrainingcentre       id kHnLEy_QU   MySQL 8.0.35   port 10019
     socket: ~/Library/Application Support/Local/run/kHnLEy_QU/mysql/mysqld.sock
     client: ~/Library/Application Support/Local/lightning-services/mysql-8.0.35+4/bin/darwin-arm64/bin/mysql
     wp path: ~/Local Sites/cnctrainingcentre/app/public

TCP (127.0.0.1:port) is BLOCKED — use the unix socket. root / root / db 'local'.
Theme (both): wp-content/themes/cnc-training-centre/theme ; build tooling in parent dir (npm run production).
```
