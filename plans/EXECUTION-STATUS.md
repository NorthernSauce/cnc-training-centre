# CNC Clone Build — Execution Status / Resume Point

**Target:** `cnctrainingcentre-old` (the deliverable clone). **Reference:** `cnctrainingcentre` (new build).
**Mode:** fully autonomous, local session (Local MySQL is local-only — no cloud agent can do this work).
**Last updated:** 2026-06-07 (Segment 1 + WS-A complete).

## Locked decisions (Dave, 2026-06-07)
- **Permalink:** `/%postname%/` (clone already on this — the `/learning-hub/` base was only ever the new site's; nothing to change).
- **Trainings:** each individual onsite/classroom training = a `cnc-course` CPT entry at `/training/<slug>/`, legacy content **lifted as-is** (old voice, no rewrite). A linking block on the Onsite + Classroom pages lists/links the relevant entries (by `course-type`).
- **Online courses:** stay on **Tutor LMS** (`/courses/` base — Tutor owns this URL). Do NOT create a clashing `courses` page. Style **all** Tutor templates to match the theme.
- **Single posts:** fix front-end formatting of the 290 legacy articles (single.php + article CSS).

## Content architecture (canonical)
- `post` (290) = Learning Hub articles. Hub archive at `/learning-hub/` (page_for_posts=21805), rendered by `home.php`.
- `cnc-course` CPT = onsite + classroom **trainings**. Archive `/training/`. Taxonomy `course-type` = Onsite / Classroom.
- Tutor `courses` CPT = online self-paced courses at `/courses/` (styled Tutor templates). Nav "Online" → `/courses/`.
- Marketing pages: Home, About, Contact, Onsite Training, Classroom Training, Programming Services, Learning Hub.

## Environment / safe-access (re-source every shell)
- Helper: `source /tmp/cncwp.sh` → defines `wpo`/`wpn` (wp-cli, skip-plugins+themes, noise-filtered), `$WP_OLD`/`$WP_NEW`, `$SOCK_OLD`/`$SOCK_NEW`, `$MYSQL84`/`$MYSQLDUMP84`, raised memory, Local mysql bin on PATH.
- If `/tmp/cncwp.sh` is gone, recreate from § "Appendix B" of CONTENT-MIGRATION-IMPLEMENTATION-PLAN.md + the memory/error_reporting + skip-plugins notes here.
- **wp-cli gotchas:** system PHP 8.5 spams a harmless `Deprecated:` line to stdout (filter it). The clone's 28-plugin stack blows the 128 MB CLI limit via `facebook-for-woocommerce` → always use raised memory + `--skip-plugins --skip-themes` for DB ops (drop `--skip-themes` only when CPT rewrite registration is needed, e.g. `rewrite flush`). TCP to MySQL is blocked — socket only.
- Backup (rollback point): `~/cnc-clone-backup-2026-06-07.sql` (137 MB, 178 tables). Take a fresh dump before each destructive segment.

## Theme code workflow
- Source of truth + build tooling = NEW theme parent `~/Local Sites/cnctrainingcentre/app/public/wp-content/themes/cnc-training-centre/` (has `javascript/`, `main.css`, `styles/`, `node_modules`, `package.json`, `.git`).
- The clone theme is just the compiled `theme/` folder (no tooling). Edit in NEW source → `npm run production` in NEW parent → `rsync -a NEW/theme/ CLONE/theme/`. Both `theme/` dirs were byte-identical at start.
- Commit theme changes to the GitHub repo as you go.

## Progress
- [x] **Segment 1 — DB isolation + backup.** `wp-config.php` DB_HOST pinned to clone socket (`O4IusZ9Wq`); marker test passed (NEW reads empty = isolated); 137 MB backup taken.
- [x] **WS-A — Marketing pages.** 6 pages built from new-site content (byte-copied `post_content`, zero media-ID refs):
  - Reused legacy: Home **15692**, Contact **20040**, Onsite Training **15854** (republished, content replaced, legacy `_wp_page_template` cleared).
  - Created fresh: About **21812**, Classroom Training **21813**, Programming Services **21814**.
  - Reading: front = 15692, posts = learning-hub **21805**. theme_mods copied NEW→clone. Stray old Home (21803) → draft.
  - Verified: all render HTTP 200 with hero + sections; hub page renders.
- [x] **Segment 2 — Display theme code (DONE, committed `cnc-clone-rebuild` 6a74718).**
  - single-post formatting: appended comprehensive `.ar-prose` rules to `article.css` for raw legacy HTML (h3-h6, lists, raw img/figure/caption + WP alignment, responsive YouTube iframes, tables w/ scroll, blockquote, code/pre, hr). Verified a sample post renders with `.ar-prose` + 18 imgs + TOC.
  - Hub filter rebuilt: `home.php` left-sidebar driven by real `category` (37) + `post_tag` (263) terms via `get_terms(hide_empty)`, correct IDs (`#lhSearch`/`#cardGrid`/`#lhResultCount`/`#lhClear`/`#lhActiveChips`/`#lhEmpty`); `functions.php` endpoint gained `tag` param + category/tag labels; `hub-filter.js` rewritten (s+category+tag, single-select pills, chips, URL state, clear-all). REST verified: category=fanuc-turn→41, tag=fanuc-training→21, AND combined→3, search "parameter"→71. Built + rsynced to clone.
  - **GOTCHA logged:** JS source lives at theme-parent `javascript/hub-filter.js` (NOT `theme/javascript/`). esbuild reads `./javascript/*.js` from the parent. Editing the wrong path silently builds the old JS.
  - **FOLLOW-UP (launch segment):** repo `.gitignore` excludes `theme/style.css` + `theme/js/script.min.js` + `theme/js/block-editor.min.js` (contradicts the NS committed-assets rule, NOR-440). Source CSS is committed + regenerable; clone gets assets via rsync. Fix `.gitignore` before the prod deploy so WP Migrate ships compiled assets.
  - Visual desktop/mobile QA of posts + hub deferred to Segment 6.
- [x] **Segment 3 — Trainings (DONE, committed `e9313a2`).**
  - Curated **17** genuine onsite/classroom trainings (richest-content source per distinct topic). cnc-course IDs **21815–21831**, content lifted as-is, ACF meta (`course_format`/`course_level`/`course_eyebrow`/`course_short_dek`) + `course-type` term + `legacy_page_id`/`legacy_slug` for the redirect map. Map of created entries at `/tmp/training_ids.tsv`.
  - Curation call: Apply-pages, online Zoom pages (→ Tutor), landing/duplicate/stub pages, and programming-service pages are NOT separate trainings — they become **redirects** in the link segment. (Avoids ~30 junk cnc-course entries.)
  - New `block-training-links` (auto-pulls cnc-course by course-type) placed on Onsite (course_type=onsite → 7 cards) + Classroom (classroom → 10 cards). `single-cnc-course.php` + `archive-cnc-course.php` retuned from online-courses copy to trainings. Verified all render HTTP 200.
  - **GOTCHA logged:** spawning ~187 wp-cli calls in one backgrounded loop died silently — use a single `wp ... eval-file` PHP migration for bulk DB writes instead (fast, reliable, idempotent).
- **Segment 4 — Nav + link integrity + redirects (REORDERED to next — highest review impact).**
  - [x] **NAV DONE (2026-06-07, Dave-specified).** Built 4 menus via `wp eval-file`, assigned to theme locations, deleted the 7 legacy menus. Primary (term 524): Onsite·Classroom·Programming·Online(→/courses/)·About·Learning Hub. Footer Services (525): Onsite·Classroom·Programming·Online (mirrors top nav per Dave). Footer Learning (526): Learning Hub·About·Contact. Footer Legal (527): Privacy Policy. Created Privacy Policy page (21849) from new-site content + set `wp_page_for_privacy_policy`. All render HTTP 200. Locations: primary/footer-services/footer-learning/footer-legal (also `social` location exists — uses Customizer, left as-is).
  - [ ] (b) WS-E in-content link rewrite (the 981 kept-post + 878 restructured + 297 orphan links) via `wp search-replace` (dry-run first, all surfaces incl. the new cnc-course bodies + nav + theme_mods). (c) Yoast 301 catch-all from the master old→new map (built from the marketing-page reuse map + `legacy_*` meta on the 17 trainings + orphans). Permalink already `/%postname%/`. Back up first.
- [ ] **Segment 5 — Tutor LMS template styling** (course archive `/courses/`, single course, lesson, quiz, dashboard, login, enrolment, certificate). Lowest-risk approach: a `tutor.css` targeting Tutor's frontend classes to match theme tokens; override Tutor PHP templates only if needed.
- [ ] **Segment 6 — Cleanup + QA + final build + handoff:** lock referenced media before any prune; full `npm run production`; crawl for 404s; browser QA desktop+mobile every page (incl. visual check of single-post prose + hub + trainings); PROJECT.md handoff; fix the `.gitignore` compiled-asset issue.

## Open follow-ups / notes
- Linear MCP disconnected this session — tracking in this file + PROJECT.md instead.
- `rewrite flush` ran with plugins skipped (Tutor/Woo rules may need a full flush later via browser or a plugins-loaded flush).
- Courses page content exported to `/tmp/page-courses.html` (kept for styling Tutor archive intro; no `courses` page created).
- WS-E full spec + 20-item risk register live in CONTENT-MIGRATION-IMPLEMENTATION-PLAN.md.

## Mid-build fixes (2026-06-07, Dave-reported)
- **Missing TOC sidebar on legacy posts** (committed 06884d8): toc.php now builds from all h2/h3 (ids resolved like _ns_add_heading_ids); :has() fallback centres heading-less posts.
- **Ugly Hub card excerpts** (committed 1f9c1ca): _ns_card_dek() strips tags + boilerplate + read-more; used on cards/featured/hub-preview.
- **Dodgy `u003c` characters in content** (DB fix, no theme change): root cause = `wp post create/update` unslashing block-JSON backslash escapes during WS-A copy → bare `u003c`. Fixed all 6 marketing pages by re-storing clean source via `$wpdb->update`. Full clone sweep clean. **Global prevention added to CLAUDE.md + ns-acf-block-builder learnings + project learnings.** (A literal-char replacement attempt mid-fix broke 4 pages' block JSON via `"`→`"`; corrected by restoring from new-site source.)

## Linear
- Linear MCP (95f62495) disconnected for this entire session — no API access. All progress tracked here + PROJECT.md + git commits on branch `cnc-clone-rebuild`. **TODO when Linear reconnects:** post a Build-phase (NOR-54) update summarising Segments 1–4 + the three mid-build fixes; mark nav/hub/trainings done.

---
## ✅ BUILD COMPLETE — SHIP-READY (2026-06-07)
All segments done. Site at http://cnctrainingcentre-old.local is ready for client review.

- **Seg 4b — Links + redirects (DONE, commit cdc771d):** in-content rewrite across 211 posts/trainings (prefix paths flattened, legacy slugs → new pages/`/training/`, orphans + online → service/Tutor); `inc/legacy-redirects.php` is_404-guarded 301 map + prefix collapse (travels with theme). All sampled links 200, 0 `u003c` regression. Redirects verified (e.g. /contact-us/→/contact/, /fanuc-training/→/training/fanuc-training/, /parameters/x/→/x/).
- **Seg 5 — Tutor LMS styling (DONE, commit dda4394):** `styles/custom/components/tutor.css` overrides Tutor CSS vars (--tutor-color-primary etc.) + fonts on `.tutor-wrap` → all Tutor surfaces (/courses/, single course, lesson, quiz, dashboard, login, certificate) on-brand. Variable-driven (load-order-safe). Deeper per-template polish (dashboard tables/quiz UI) optional follow-up.
- **Seg 6 — QA (DONE):** every key page 200 + 0 `u003c`; 15 sample posts clean; 17 trainings 200; hub filter live; nav (top + 3 footer menus) correct; redirects firing. Production build current + synced to clone.

### Follow-ups / notes for Dave
- **Visual mobile QA** — structurally responsive; recommend an eyeball pass on phone width before client send.
- **.gitignore** still excludes `theme/style.css` + 2 js bundles (NOR-440). NOT shipping-blocking — the compiled assets live in the theme dir and travel via WP Migrate DB (theme files). Fix before any pure-git deploy.
- **Remaining pending pages** (Apply/enquiry, course-details, Woo/system) are intentionally NOT separate content — they 404→301 via legacy-redirects to the nearest service/training/Tutor. If you want the "Apply" pages as real enquiry forms, that's a follow-up (OD-6).
- **Linear** still disconnected this session — post NOR-54 Build update when it's back.
- Git: all work on branch `cnc-clone-rebuild` (commits b…→dda4394), unpushed (awaiting your review). Deploy = WP Migrate DB (DB + theme files), not git.

---
## 2026-07-24 — Course pages + copy v4 + hub sidebar (autonomous run for Dave)

All on the clone (`cnctrainingcentre-old`), theme edited in source parent → built → rsynced. Theme repo commits d2efa09…4a2fc17 (branch cnc-clone-rebuild).

1. **Hub single sidebar** — sticky fixed (sticky moved to the always-rendered `.ar-side` grid item; was on `.ar-toc-inner` inside a content-height parent = zero travel). Under the ToC: dark classroom CTA banner + auto-pulled list of the classroom course child pages (`template-parts/hub/side-cta.php`, `side-courses.php`). CTA + course list hidden <1100px.
2. **8 course pages** created as children of /classroom-training/ (IDs 21869–21876), composed via `build/compose-classroom-courses.php`: hero / who / what-you'll-learn / pricing / Amelia calendar (anchor #dates) / OSM map / decisiveness. Facts lifted from legacy course pages.
3. **Calendar moved** — Amelia `[ameliaeventscalendarbooking]` removed from Classroom Training page, now on every course page. `block-training-links` gained optional `anchor` field.
4. **Course links block** — `block-course-sheet` on Classroom Training now links each of the 8 rows to its course page.
5. **Copy v4** — full rewrite of Home/Onsite/Classroom/Programming/About/Contact in the composers (see copy/REWRITE-V4-2026-07-24.md). Contact form wired to Fluent Form 1 (was form_id=0 = no form rendering).
6. **Verified:** all 15 pages HTTP 200, zero bare-escape + zero mojibake rows, zero console/page errors on 9 pages, sticky confirmed via puppeteer (pins at 88px), screenshots desktop+mobile. DB backup: `~/cnc-old-pre-courserewrite-2026-07-24.sql`.

**For Dave:** Amelia events are all "Fanuc Training" (£280) so every course calendar shows the same events — create per-course events in Amelia, then tag-filter each page's shortcode. "3-month take-home simulator" claim on 2 courses — strike if stale. Macro Programming intentionally not in the 8 (per your list); its /training/ entry still exists. FF form 1 notification email needs checking in Fluent Forms settings.

## 2026-07-24 (later) — Post link audit + copy v5 clarity pass

1. **Link audit, all 290 posts + 17 trainings:** extracted every in-content href (1,019 distinct internal), status-checked all. Found 40 404s + 38 redirecting. Applied `build/link-fix-2026-07-24.php` (idempotent, $wpdb-safe): 428 link fixes across 206 posts — classroom course links now point at the new /classroom-training/ pages (specific course where determinable, /classroom-training/ for generic mentions incl. all /training/edgecam-training/ + cnc-programmer-training links), apply-page links → course page #dates anchors, macro links → the Tutor/Woo macro product, 301s flattened, /training/-prefixed article links flattened. Post-sweep: every distinct in-content URL returns 200 direct. Backup: ~/cnc-old-pre-linkfix-wpposts-2026-07-24.sql. Also fixed pre-existing u0026 corruption in wp_navigation 20047.
2. **Copy v5:** clarity pass per Dave ("crystal clear, no dressing shit up") — flattened every oblique/curiosity-gap heading (e.g. "I know we should have sorted this ages ago" → "Untrained operators are costing you money"; "What's the only training that doesn't stop the line?" → "I train your team on your machines, while they work"). All 14 pages recomposed. Sweeps green.
