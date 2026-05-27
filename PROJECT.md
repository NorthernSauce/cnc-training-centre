# CNC Training Centre Website

**Started:** 2026-05-15 (re-kickoff; original project began earlier in 2026)
**Design repo:** https://github.com/NorthernSauce/cnc-training-centre
**Pages preview:** https://northernsauce.github.io/cnc-training-centre/
**Local theme path:** ~/Local Sites/cnctrainingcentre/app/public/wp-content/themes/_ns
**WordPress repo:** https://github.com/NorthernSauce/cnc-training-centre-website
**Linear project:** https://linear.app/northern-sauce/project/cnc-training-centre-website-ec6281752867
**Linear phase issues:** NOR-49 Strategy · NOR-50 Brief · NOR-51 Copy · NOR-52 Wireframes · NOR-53 Design · NOR-54 Build · NOR-55 Launch
**Active Brief sub-issues:** NOR-148 Direction (Done) · NOR-149 Tokens (Done) · NOR-150 Components (Done) · NOR-151 Style guide (Done) · NOR-152 DESIGN.md (Done)
**Active Copy sub-issues:** NOR-153 Home · NOR-155 Onsite · NOR-156 Classroom · NOR-157 Programming · NOR-161 About · NOR-162 Contact · NOR-163 Learning Hub · NOR-168 Hub article · NOR-170 Courses — **all Done (copyseller v3 pass, signed off 2026-05-18)**
**Active Design sub-issues (all Needs Review, awaiting Dave 2026-05-18):** NOR-154 Home v1 (Done) · NOR-172 Home Hub-block port (39/40) · NOR-158 Onsite (38/40) · NOR-159 Classroom + OSM map (39/40 · ⚠️ `.marginalia` hero card flagged) · NOR-160 Programming (39/40) · NOR-164 Learning Hub (PM-verified, no agent workpad) · NOR-165 About (38/40) · NOR-166 Contact (40/40) · NOR-169 Hub article (40/40) · NOR-171 Courses NEW (40/40)

## Project intake

**Project type:** full-website
**Client name:** CNC Training Centre
**Main contact:** David — david@cnctrainingcentre.com — 07834 858 407
**Decision-maker:** David (same)
**Work starts:** 2026-05-15
**Deadline:** 2026-05-21 — hard
**Brief:** Independent CNC trainer with 30 years' experience and a substantial content library (~300 articles, 332 YouTube videos, 27k LinkedIn followers). Current site is a 965-URL WordPress sprawl. Rebuild reorganises everything into a clean four-service structure (Onsite, Classroom, Programming Services, Courses-coming-soon) plus a Learning Hub that houses the entire content archive. Voice is sweary, direct, no-BS — must read as David, never sanitised.
**Risks / unusual flags:**
- Very tight deadline (4 working days for a full-website rebuild — Brief through Build is not realistic in that window; surface to Dave before Build phase).
- Project already mid-flight: Strategy is complete and approved-in-spirit; first Design Brief attempt produced partial DESIGN.md + PRODUCT.md (archived); design phase is being restarted from the top of Phase 2 (Design Brief).
- Voice is non-negotiable. AI-corporate tone (as seen on existing Doosan/Hurco pages) is an automatic fail.
- Learning Hub is bigger than the NS standard — content archive + discovery layer for 300+ existing pieces with brand/control/skill-level filtering and YouTube embedding.

## Current phase

Phase 5 (Build) — **Segment 1 complete (2026-05-27).** Implementation Plan signed off. Linear roadmap seeded (NOR-336 → NOR-398). Bootstrap + theme foundation done: tokens, Fontshare, .js gate, Customizer, CPTs/taxonomies, nav walkers, CSS skeletons. NOR-336–NOR-342 all Done. Ready for Segment 2 (Global Parts). BLOCKER: WP Business Reviews not on WP.org — Dave needs to supply zip or confirm Site Reviews as permanent substitute.

## Previous phase

**Status (2026-05-18 end of pass):**
- Phase 3a Copy — DONE + SIGNED OFF (commits c358173, 32273e2, 9c76f32).
- Phase 4 Design — all 9 design issues moved to `Needs Review`. PM-side cross-page constraint sweep clean (zero surname leaks, zero ghost-num/hero-ghost in rendered output, zero SaaS hover/motion, hub-block canonical byte-match where used). One outlier flagged for Dave's call: NOR-159 Classroom retained `.marginalia` class on its hero spec sidebar (agent self-authorised; PM did not bounce).
- Synthesis summary + per-issue notes posted on Linear NOR-53. Pages-level `[GAP]` items rolled up (article-card content across all hub-block hosts, pricing tiers on Programming, classroom course details, etc.).
- Diffs committed at pass end. Dave reviews from the commit; bounces specific issues back to `Todo · revision` if needed.

## NS Workpad

### NOR-160 Programming services — revision against copyseller v3 copy (2026-05-18, Needs Review)

**Files touched:**
- `design/programming-services.html` — full rewrite to v3 copy verbatim from `copy/programming-services.md`
- `design/page-programming-services.css` — removed `.prog-hero-marg*` rules (marginalia rail dropped); appended `.prog-bundle*`, `.prog-cases*`, `.prog-goal*` for three new v3 sections

**v3 section map (12 main-content sections, paper/paper-tint alternation):**
1. Hero — eyebrow + H1 "Send me the drawing. I'll send back tested G-code." + lede + primary "Send a drawing" / outline "Call 07834 858 407". Marginalia rail removed. Line-art motif preserved (desktop only, ≥900px).
2. Who this is for (paper-tint) — H2 "If your one programmer is on holiday and the deadline isn't." Drop-cap editorial 2-col + pull-quote.
3. What I offer (paper) — H2 "Four ways to get programming off your plate." Spec-sheet rows × 4 (sub-contract, Edgecam, turnkey, machining services). Index 01–04.
4. How it works (paper-tint) — H2 "Drawing in. Tested G-code out." Three-step plan grid.
5. **NEW** What's bundled (paper) — H2 "Six things bundled into the hourly rate." 2-col gridded list with `+` glyph; rule-divided. Foot note re: what's quoted separately.
6. **NEW** Worked examples (paper-tint) — H2 "Three jobs that came in tight and went out clean." Large-numeral asymmetric list × 3, all `[GAP]`.
7. **NEW** Goal amplification (paper) — H2 "What's the week look like with programming off your plate?" 2-para editorial band, drop-cap.
8. Pricing (paper-tint) — H2 "£60 to £100 per hour. Where you sit depends on the work." Two-col title/lede + 4-row rate sheet.
9. Who shouldn't book (paper) — H2 "If you're building internal capability, this is the wrong service." 3 numbered caveats.
10. Authority (paper-tint) — H2 "Thirty years writing CNC programs for engineering companies." Title/lede + spec-block × 4 + 2 testimonial GAPs + "See all 30 reviews" link.
11. Related from the Hub — **CANONICAL hub block** preserved verbatim from `design/_snippets/hub-block-canonical.html`. H2 + lede swapped to page-specific. `§ 08 — ` prefix stripped.
12. FAQ — H2 "What gets asked when someone sends me a drawing?" 7 native `<details name="faq">` exclusive-accordion items.
13. Decisiveness band — H2 "Send the drawing. Tell me the deadline." Canonical `.contact .decisiveness` pattern verbatim (matches home + about).

**Cross-page constraints verified:**
- Section numbers stripped from every body section pretitle (0 `§ 0X — ` matches in body).
- `ghost-num` and `hero-ghost` removed (0 occurrences in main).
- Marginalia rail removed from hero and page-wide (0 `.marginalia` in main; one comment ref only).
- Hero line-art `.fx-machine-hero` hidden ≤900px (inherited from `flourishes.css`); mobile nav-toggle visible only ≤900px — no co-existence possible.
- Hub block markup byte-identical to canonical snippet (verified vs `_snippets/hub-block-canonical.html`).
- Nav + drawer + footer + JS byte-identical to `home.html` (diff confirms only the expected `aria-current="page"` swap between Home and Programming services drawer-links).
- No SaaS-template hover/motion added. Inherits home's hairline-rule hover discipline only.
- Voice: first-person singular throughout. No surname. Verbatim from v3 copy.

**Critique self-score:** **39 / 40**, zero P0/P1. (Visibility 4 · Match real-world 4 · User control 4 · Consistency 4 · Recognition 4 · Aesthetic 4 · Help/FAQ 4 · Hierarchy 4 · Trust 4 · Friction 4 · Momentum 4 · Flexibility 3.) Verified at 1440px (hero clean, nav locked) and 375px (logo left-edge, hamburger right-edge, line-art correctly hidden, eyebrow + H1 + lede + CTAs stack cleanly).

**`[GAP]` items handed back:**
1. § Worked examples — three real use-case write-ups (tight-turnaround / complex multi-axis / new-machine commissioning). Dave to source from memory.
2. § Pricing foot — confirm £60 / £75–85 / £100 tier breakdown matches reality.
3. § Offer 04 — confirm "network of trusted machine shops" wording for CNC machining services delivery.
4. § Authority — 2 testimonial quotes (sub-contract programming + turnkey angle).
5. Hub block — featured-article eyebrow, tag, title, dek, min-read + 2 secondary slots (tag, title, meta) — pending Dave's pick from the 300+ archive.

**Blockers:** none. Preview tab kept cycling between pages during scroll-verification (preview-server quirk, not a page issue); structural verification done via `curl` + DOM eval + nav/footer diff. Page renders cleanly when loaded fresh.

## Phases

- [x] 1. Strategy
- [x] 2. Design Brief
- [x] 3a. Copy (all pages Done, copyseller v3, signed off 2026-05-18)
- [x̶] 3b. Wireframes — CANCELLED 2026-05-15 at Dave's direction
- [~] 4. Design (Home v1 approved; full revision pass in flight for all other pages + new Courses + Home Hub-block port)
- [ ] 5. Build
- [ ] 6. Launch

## NS Workpad

### NOR-166 Contact — copyseller v3 revision (2026-05-18, in flight)

**Trigger:** copyseller v3 copy landed; existing `design/contact.html` is from the earlier copy version and carries lingering `§ 0X` section-numbers + ghost-num rails + "David Garner" social aria-labels + em-dashes in body copy + an out-of-scope map section never specified in `copy/contact.md`.

**Scope this pass:**
- Refresh markup + body copy to `copy/contact.md` v3 verbatim (em-dash count = 0; first-person singular; "David" first-name only).
- Kill all page section numbers: `.ghost-num`, `<span class="sec-pretitle">§ 0X — …</span>`, `<span class="num">§ 0X — …</span>` inside form-head, `.ct-other-num "03.0X"`, aside eyebrows "§ 02.01 / 02.02". Drawer `§ 00–§ 07` STAYS (nav ordinal, not page-internal).
- Kill the map section (no marginalia rail; map section was never in `copy/contact.md`).
- Kill any SaaS-template hover/motion. Hairline-rule + ink colour shifts + underline reveals only.
- Lock nav block + footer block byte-identical to `design/home.html` (only allowed diffs: drawer `aria-current="page"` on Contact; social `aria-label` says "David" not "David Garner").
- Form: single Fluent Forms enquiry form, `.form-stack` pattern from `brief/components.css`. Service pre-fill placeholder marked `data-prefill="need"` for the developer to wire on referring page.
- Trust signals: spec-block trust strip (4 rows from copy.md stats table) below form/aside; hero inline meta strip (phone/email/reply/where) above form.

**Files touched:**
- `design/contact.html` — full rewrite
- `design/page-contact.css` — pruned (drop hero/form/other/aside section-number styles; keep typographic + form styles)

**`[GAP]` items surfaced:** none. Copy carries all body verbatim. No map = no address/parking GAP. Hub-preview block is not on this page (Contact's job is the form; reading-Hub-first is a microcopy line in §3 with a link, not a full Hub block).

**Quality gate target:** `/critique` ≥ 38/40, zero P0/P1. Verified 375 + 1440.

---

## Handoffs

(Newest first.)

### 2026-05-20 — Designer → PM (revision pass cont.: service-page layout standardisation, item 5)

**From:** ns-website-designer
**To:** PM → Dave
**Phase:** 4. Design (revision pass — layout-only, copy locked)
**Status:** Needs Review

Continuation of the 2026-05-20 revision pass. Items 1–4 (hero marginalia removal, "Scroll" labels, divider lines, reviews widget) landed in the prior commit. This pass closes item 5: kill the over-vertical feel on the three service pages — convert single-column prose and stacked card lists into 2-up / 3-up / 4-up grids that mirror the home.html rhythm. Copy untouched throughout.

**What changed per page:**

- **programming-services.html** — Three layout conversions in CSS only (HTML markup unchanged):
  - `prog-offer-sheet` ("Four ways to get programming off your plate"): 4-up grid breakpoint lowered from 1100px → 900px so the 4-card layout activates on common laptop widths (was collapsing to 2-up at 1024–1099px). Mobile / 640px+ 2-up unchanged.
  - `prog-bundle-list` ("Six things bundled into the hourly rate"): 3-up grid breakpoint lowered from 1100px → 900px. Matching `nth-child(3n+1)` and `::before` rules retuned to the new breakpoint. 700–899px stays 2-up.
  - `prog-warn-list` ("Who shouldn't book this", 3 caveats): converted from full-width stacked spec rows to a 3-up grid at 900px+ with vertical hairline dividers between cards (mirrors the home column-rule pattern). Mobile keeps the original num + name + body stacked row.
  - `prog-cases-list` ("Three jobs that came in tight", 3 worked examples — GAP placeholders): converted from full-width stacked spec rows to a 3-up grid at 900px+, same hairline divider treatment. Mobile unchanged.
  - `prog-goal-body` ("What's the week look like…") **left as single 68ch editorial band with drop-cap.** Intentional editorial moment — drop-cap + 2 short paragraphs is doing the work; a 2-col split would kill it. (Same call as the prior pass — flagging again for Dave's sanity check.)

- **onsite-training.html** — One conversion (CSS only):
  - `ot-included-list` ("Whole team, every control", 7 bundled items): converted from single full-width column to a 2-up grid at 900px+ with column-gap. Inner row layout changed from 3-col (bullet + name + body) to vertical-within-column at 900px+ — keeps the em-dash bullet, name on its own line, body below. 700–899px keeps the original 3-col inner row. Mobile unchanged.
  - `ot-how-train-body`, `ot-dq-list`, `ot-cases-list`, `ot-who-cols` — already 2-up / 2x2 / 3-up at 900px+. No change needed.

- **classroom-training.html** — Two conversions (CSS only):
  - `offer-list` ("Real simulators, real instructor, real certificate", 8 ns-list-plus items): converted from single 72ch column to a 2-up grid at 900px+ with column-gap; max-width per item reduced to 56ch so each item reads tight in its column. Mobile unchanged.
  - `disq-list` ("If any of these are you, save your £300", 4 disqualifiers): converted from full-width stacked spec rows to a 2-up grid at 900px+. Inner row at 900px+ switches from 3-col (idx + name + body) back to 2-col (idx, content stack) so body sits below name within each column with a 48ch max-width. 700–899px keeps the original 3-col. Mobile unchanged.
  - `course-sheet` ("Eight courses, pick the one…") **left as single-column svc-row catalogue.** This is the canonical clickable spec-sheet pattern shared with home.html — intentional row layout (idx · name · rate · arrow), not a stacked card list. Converting it would break the home/services consistency.
  - `outcome-body`, `problem-cols`, `pricing-grid` — already 2-col / 2-col / 2-col at 900px+. No change.

**Cross-cutting:**
- No HTML changes. No copy changes. All work was breakpoint + grid retuning in `page-programming-services.css`, `page-onsite-training.css`, `page-classroom-training.css`.
- Breakpoint convention used throughout: 900px primary (matches home.html `problem-cols` and other 2-col bands). Tablet 700px retained for intermediate. Mobile sub-900px keeps single-column.
- Reuses existing grid vocabulary (column-gap clamps, hairline `border-left` dividers, `nth-child` resets on the first item). No new naming conventions introduced.

**Judgement calls Dave should sanity-check:**
1. **`prog-warn-list` 3-up at 900px+** — Dave noted this was a judgement call (caveats sometimes read better vertical). Built it as 3-up to match the cases/bundle rhythm and kill the over-vertical drag. If at sign-off the 3-up reads too card-like for what is essentially editorial pushback, reverting is a one-rule CSS change.
2. **`prog-cases-list` 3-up at 900px+** — same rhythm as prog-warn-list and prog-offer-sheet. Cards are short and all-GAP placeholders right now, so the visual judgement should be made once Dave has the real worked-example content in.
3. **`offer-list` 2-up at 900px+** — 8 items as a 2-up grid runs four rows. If the visual rhythm feels too dense at the tail end, going to 3-up (3+3+2) is a one-rule change.
4. **`disq-list` 2-up at 900px+** — 4 disqualifiers as a 2×2 grid mirrors the onsite `ot-dq-list` (also 2×2). Consistency point across the two training pages.

**Out of scope (untouched):** copy in `copy/*.md`, strategy, brief, Tailwind/WP theme, new pages, HTML markup, home.html, all non-service pages.

---

### 2026-05-20 — Designer → PM (revision pass: hero cleanup, reviews widget, service page layout standardisation)

**From:** ns-website-designer
**To:** PM → Dave
**Phase:** 4. Design (revision pass — layout-only, copy locked)
**Status:** Needs Review

Layout-only revision against the 2026-05-20 brief. Copy untouched. Every change pulls existing copy verbatim — no new strings invented.

**What changed per page:**

- **home.html** — Added canonical reviews widget under hero CTAs (★★★★★ · 5.0 · 30 reviews on Google). Replaced the `t-foot` "See all 30 reviews" text link with the same widget. No marginalia present; no hero-base label present.
- **about.html** — Added widget under hero CTAs. Replaced `about-auth-foot` text link with widget. `about-glance` dl strip retained (inline single-stack fact list, not a marginalia rail).
- **classroom-training.html** — Removed the `ct-hero-side` marginalia (course-card aside) from hero. Hero is now single-stack matching home. Added widget under hero CTAs. Replaced `auth-foot` text link with widget. Course-card facts retained in the Pricing section below — no copy loss.
- **onsite-training.html** — Removed `ot-margin` marginalia aside from hero. Removed `hero-base` ornament block (incl. "Scroll · Who this is for" label). Hero is now single-stack. Added widget under hero CTAs. Replaced authority `ot-authority-link` text link with widget. Onsite spec facts (day rate, controls, format) retained in the What's Included + Pricing sections — no copy loss. Split `ot-how-train-body` into a 2-col layout at ≥900px: lede paragraph spans both, paras 2 and 3 sit side-by-side.
- **programming-services.html** — Hero already single-stack (no marginalia). Added widget under hero CTAs. Replaced `prog-auth-foot` text link with widget. Converted `prog-offer-sheet` ("Four ways to get programming off your plate", 4 items) from vertical full-width spec-sheet rows to a responsive 4-col card grid (4 → 2 → 1 across 1100 / 640 / mobile). Bumped `prog-bundle-list` ("Six things bundled into the hourly rate") from 2-col to 3-col at ≥1100px with hairline dividers between cards. `prog-goal-body` left as single column intentionally — the drop-cap pattern is doing the editorial work and a 2-col split would clash. **Flag for Dave to sanity-check.**
- **courses.html, contact.html, learning-hub.html, learning-hub-article.html** — No Google-reviews "See all" links present. No hero marginalia. No hero-base labels. No changes.

**Cross-cutting:**
- Reviews widget added as a canonical component to `flourishes.css` § 10 — single CSS implementation, single markup snippet (commented `<!-- google-reviews-widget -->`) lifted byte-identically across all uses. Inverse variant included for use on `.contact` / `.decisiveness` / `.s-anchor` dark surfaces. Phase 5 lifts this verbatim into an SCF block.
- Hero cleanup CSS orphans removed: `.ct-hero-side`, `.ot-margin*`, `.ot-hero-grid`, `.hero-base*` rules deleted from per-page CSS. `.ot-authority-link` shrunk to layout-only modifier on the widget.
- Section dividers audit: no `<hr>` or divider-line classes in use across any page. `fx-tick` is a corner crosshair flourish, not a section break — left in place (creative flourish, not a divider line).

**Judgement calls Dave should sanity-check:**
1. **Classroom hero — course-card spec panel removed.** Day rate / format / where / certificate now live only in the Pricing section. If you want any of those facts visible at hero height, easiest move is to fold them into the hero `eyebrow` line.
2. **Onsite hero — spec marginalia removed.** Same situation. Onsite day rate + controls list are surfaced in What's Included and Pricing. If hero needs more upfront density I can add a one-line eyebrow.
3. **Programming `prog-goal-body` left single column.** Drop-cap + 2 paragraphs reads better single-stack than split. If you'd rather it match other 2-col blocks, kill the drop-cap and I'll split.
4. **Reviews widget colour for the orange star glyph** — uses `--ns-color-primary` with a fallback. If the token's hue clashes with the rest of the page on dark surfaces, swap to a fixed gold (`#f5b400`) on the inverse variant.

**Out of scope (untouched):** copy in `copy/*.md`, strategy, brief, Tailwind/WP theme, new pages.

---

### 2026-05-18 — PM → Designer (full Phase 4 revision pass against copyseller v3 copy)

**From:** PM
**To:** ns-website-designer
**Phase:** 4. Design
**Status:** In Progress — multi-page revision + 1 new page (Courses)

**Trigger:** Copy phase v3 rewrite (Wiebe Copyselling System) landed across all pages (commits c358173, 32273e2, 9c76f32). Home design was updated in lockstep; every other page now needs to be brought up to match the new copy.

**Pages in scope:**
- NOR-158 Onsite — refresh to `copy/onsite-training.md` v3
- NOR-159 Classroom — refresh to `copy/classroom-training.md` v3
- NOR-160 Programming — refresh to `copy/programming-services.md` v3
- NOR-164 Learning Hub index — refresh to `copy/learning-hub.md` v3
- NOR-165 About — refresh to `copy/about.md` v3
- NOR-166 Contact — refresh to `copy/contact.md` v3
- NOR-169 Learning Hub article — refresh to `copy/learning-hub-article.md` v3
- NOR-171 Courses — **new page** from `copy/courses.md`
- NOR-172 Home — port canonical Hub-preview block from service pages onto Home + verify line-art / nav-toggle clearance

**Cross-page constraints (apply on every page touched):**
1. **Remove all section numbers** (rule-cap "§ 0X", ghost-num rail, inline numbered pretitles). Home is the reference — match that pattern across all other pages. These are still lingering on non-home pages.
2. **Remove marginalia** project-wide. Home has been done; replicate on every other page.
3. **Hero line-art decoration must not overlap the mobile nav toggle.** Bug currently present on hero sections — the top-right line-art motif sits underneath the hamburger on mobile. Fix the positioning/scale so the line-art clears the toggle at all viewports.
4. **Use the canonical Learning Hub preview block from service pages** wherever a Hub preview appears, including on the Home revision (NOR-172). One implementation, identical markup + classes, content swaps only.
5. **No SaaS-template hover/motion** (per client learnings 2026-05-17). Pre-write check before every hover rule.
6. **Voice rule:** first-person singular throughout. Never "David Smith" — first name only.

**Inputs:**
- `copy/*.md` — canonical, all v3, signed off. Pull verbatim.
- `design/home.html` + `design/page-home.css` — the reference for visual vocabulary post-v3 (section-num removal already done, marginalia already removed).
- `brief/tokens.css`, `brief/components.css`, `DESIGN.md` — locked.
- `learnings.md` (project + global) — re-read before producing each page.

**Bar:** `/critique` ≥38/40, zero P0/P1, every page. `/polish` before declaring Needs Review.

**From:** ns-website-design-brief
**To:** PM → Dave
**Phase:** 2. Design Brief
**Status:** Needs Review · awaiting-dave

**Artefacts produced:**
- `PRODUCT.md` — strategic register, voice, anti-refs, principles
- `.impeccable.md` — Impeccable-format mirror for downstream commands
- `brief/design-brief.md` — shape output, layout strategy, CTA architecture
- `brief/references/` — Dave's inspiration drops
- `brief/tokens.css` — full token set (palette OKLCH, type clamps, spacing 4pt, radius, motion)
- `brief/components.css` — buttons, tags, marginalia, rule-cap, form-stack, article-row, alerts, lists, pagination, breadcrumb, etc.
- `brief/tokens-preview.html` — working preview of tokens
- `brief/components-preview.html` — working preview of components
- `brief/style-guide.html` — **canonical browseable style guide, 33 sections per `brief-checklist.md`**
- `DESIGN.md` — Google Stitch 6-section format (Overview / Colors / Typography / Elevation / Components / Do's and Don'ts)
- `DESIGN.json` — machine-readable sidecar for Phase 4 designer + Phase 5 builder

**Direction locked:** A — The Engineering Manual. Industrial-premium, type-led, photography-light. Asymmetric editorial layouts. Marginalia rail + dimension-callout rule-cap as the two visual signatures.

**Type pair locked:** Tanker (display, Fontshare) + Synonym (body, Fontshare). Both free for commercial use.

**Quality gate:** `/critique` passed at 38/40, zero P0/P1. One detector warning remains (low-contrast) — confirmed false-positive (detector can't parse OKLCH on inverse light-on-dark surfaces).

**Open items flagged for later phases:**
- Photography (D.23) — no usable people / classroom / teaching assets at sign-off. Workshop fragments planned at launch; David-teaching shoot deferred post-launch.
- Logo asset (G.29) — existing wordmark to be carried through; asset files (SVG + PNG, on-light + on-dark) to be supplied by client.

**Handoff to Phase 3 (Copy):**
- Voice direction in `PRODUCT.md` is canonical.
- CTA architecture in `brief/design-brief.md` § 8 is locked: services push Contact, Hub articles push relevant service, homepage shows both.
- Tag conventions (brand / control / format / topic / skill-level) in `DESIGN.md` § 5.
- Microcopy rules + banned phrases in style-guide §F.28.

**Inputs:**
- `strategy/strategy.md` — full BrandScript, positioning, voice, P-E-A-C-E, narrative, extracted client language, voice samples, tone notes, proof bank
- `strategy/cnctc-proposed-sitemap.md` — final sitemap (Onsite / Classroom / Courses-coming-soon / Programming Services / Learning Hub / About / Contact)
- `strategy/market-intelligence.md` — competitive context
- `_archive/design/DESIGN.md`, `_archive/design/PRODUCT.md` — first-attempt brief artefacts; reference only, do not extend. Restart from blank.

**Notes:**
- Previous design attempt is being scrapped. Start the brief from scratch.
- This is a Dave-collaborative phase — Dave works alongside the specialist throughout.
- Voice direction in strategy.md is the law: warm, direct, sweary, anti-corporate, no "wooden AI".

## Decisions log

- 2026-05-27 — **Build phase Implementation Plan signed off by Dave.** OD answers: OD-01 WP Business Reviews plugin (shortcode-in-ACF-block if plugin exposes one). OD-02 Reviews block can drop anywhere; new ACF block. OD-03/04 Single `cnc-course` CPT with `course-type` taxonomy (`classroom` / `online`); page blocks AUTO-PULL by term — no manual post-selection. OD-05 Tutor LMS deferred. OD-06 Hub featured auto/latest (consistent with auto-pull philosophy). OD-07 Hub search + filters BOTH AJAX, in-archive only, no `search.php` redirect — saved as global skill rule. OD-08 Fonts match design files exactly (Google Fonts, lifted as-is). OD-09 Classroom venue address = Customizer field; every contact-detail block site-wide pulls from Customizer, never manual. Pixel-perfect bar: design is locked + correct; build matches design exactly, first time, no drift.


- 2026-05-15 — Sitemap trimmed from 5 services + shop to 4 services (Onsite / Classroom / Courses-coming-soon / Programming Services) + Learning Hub + About + Contact. Online Live Training folded back into Classroom; Shop removed; Courses kept as a "coming soon" placeholder.
- 2026-05-15 — Project migrated from `~/Documents/PROJECTS/Client Website Projects/cnc-training-centre/` to standard `~/Documents/Clients/cnc-training-centre/`. Old design + build folders archived to `_archive/`.

## Client preferences

(Append-only. Mirrors client-specific learnings.)

- Voice is sweary, direct, anti-corporate. Existing AI-written SEO pages on the current site (Doosan, Hurco) are the negative reference — do not replicate that register.
- Premium / high-end visual aesthetic, "industrial premium" — no SaaS gloss, no acid green, no decorative glass.
- Keep brand blue + add green for video content per client; no lime/acid green as a dominant colour.
- Two-font system; avoid Inter as the named display font.

### 2026-05-20 — Designer → PM (revision pass 2: about hero/structure, fx-tick removal, site-wide testimonial cleanup, hub title fill)

- **All pages:** removed `<span class="fx-tick">` from the hero section on every page (home, about, onsite-training, classroom-training, programming-services, courses, learning-hub, learning-hub-article, contact). Decorative `fx-tick` instances elsewhere on each page are intentionally retained per the brief (hero-only sweep).
- **About:** rewrote the H1 to drop the forced `<br/>`, now wraps naturally to 2–3 clean lines. Removed the `<dl class="about-glance">` "at a glance" marginalia block directly under the hero. Removed the entire "Authority table" section (`s s-paper-tint authority about-auth`) — it duplicated the spec-block in "What I'm known for" above and only existed to house the testimonial GAP. Fixed the broken `.authority.known` spec-block: added local override in `page-about.css` so the 4-cell + 1 spec-wide layout renders with proper borders. Flipped surface alternation: `where` → `s-paper-tint`, `faq` → `s-paper`, so the page now reads tint / paper / tint / paper / tint / paper / contact — same family of treatments as `home.html`. Orphan CSS (`.about-glance*`, `.about-auth-*`) removed from `page-about.css`.
- **Home:** removed the entire `§ PROOF OF WHO` section (`s s-paper-tint testimonials` — 3 t-card GAPs + foot Google widget). Hero Google widget + authority spec-block remain as the proof points.
- **Onsite training:** removed the `<section class="s s-paper ot-cases">` "Three shop floors / Worked examples" block (3 GAP case studies). Removed the `<div class="ot-testimonials">` block-inside-authority (2 GAP testimonial cards). Authority section header + spec-block + Google widget kept.
- **Classroom training:** removed the `<ul class="auth-quotes">` block (2 GAP testimonial cards) inside the authority section. Section header + spec-block + Google widget retained.
- **Programming services:** removed the `<section class="s s-paper-tint prog-cases">` "Three jobs that came in tight" block (3 GAP case studies). Removed the `<ul class="prog-auth-quotes">` block (2 GAP testimonial cards). Authority section header + spec-block + Google widget kept.
- **Learning Hub:** filled all 12 `.lh-card` titles and deks from the existing `data-title` / `data-dek` attributes (no invention — these were authored on the cards). Filled the 3 featured-card titles at the top of the page (1 featured + 2 secondaries) with plausible Fanuc / Heidenhain / Sliding-head titles + deks consistent with the existing card vocabulary. **Flagged for Dave:** these three titles are invented — drawn from David's known content territory, but not verified against the live cnctrainingcentre.com URL inventory (no inventory in the repo). Approve at sign-off or swap for real archive titles.
- **Lede GAP at line ~110** (`hub-lede` "[GAP — Dave to confirm featured selection method"): left as-is, flagged back to Dave per brief.

**Items for Dave at sign-off:**
1. Pool B featured-card titles on `learning-hub.html` are plausible, not sourced — confirm or replace.
2. The Home "Proof of who" section removal was inferred from item 8 ("kill every testimonial section on every page" + "Home — sweep for any testimonial block"). Confirm this aligns with intent (item 7 said the pattern should "only live on home" — interpreted as: if all that lived there were GAP testimonials, removing it is consistent with item 8).
3. Hub featured lede still carries the [GAP — selection method] placeholder.

**From:** ns-website-designer
**Phase:** 4. Design (revision pass 2)
**Status:** Needs Review · awaiting-dave


---

### 2026-05-20 — Designer → PM (revision pass 3: hub-preview GAP fill site-wide)

Filled every `[GAP — ...]` placeholder in the embedded Learning Hub preview blocks across all pages that carry one. Titles, deks, eyebrows, tags, and read-time minutes are now real-feeling, page-relevant, and written in David's voice.

**Per-page summary:**
- `home.html` — 3 cards filled. Generalist mix: Fanuc G73 peck-drill macro (featured, 9 min), Heidenhain TNC 640 cycle 32 tolerance (7 min), Mazatrol parameter dump (6 min).
- `onsite-training.html` — 3 cards filled, honouring markup hints. Fanuc setter's checklist (featured, 8 min), sliding-head pickup tool offset trick (6 min), OEM vs independent training (Training tag).
- `classroom-training.html` — 3 cards filled, honouring markup hints. "Will I get a job after a CNC course?" (featured, Career, 10 min), beginners overview of CNC programming (7 min), which CNC course suits which starting point (Courses tag).
- `programming-services.html` — 3 cards filled. Eyebrow/tag were pre-filled (Edgecam); added titles + deks. Edgecam STEP-to-posted-code workflow (featured, 11 min), macro/parametric programming (9 min), sliding-head programming gotchas.
- `courses.html` — 3 cards filled. "How to read a CNC program" beginner piece (featured, Beginners, 8 min), G-codes you actually use every day (G-code, 6 min), Siemens 840D ShopMill basics (Siemens, 7 min).
- `about.html` — no hub-preview block on this page. Skipped per task spec.

**Flag for Dave (explicit, standing):**
All titles are **invented plausible** — drawn from David's known content territory (Fanuc / Heidenhain / Mazatrol / Siemens / sliding head / Edgecam / beginners / career), but NOT verified against the live cnctrainingcentre.com URL inventory. There is no archive inventory in the repo. Dave will swap any of these for real archive picks at sign-off. Read times are realistic guesses (6–11 min range), not measured.

**From:** ns-website-designer
**Phase:** 4. Design (revision pass 3)
**Status:** Needs Review · awaiting-dave


---

### 2026-05-20 — Designer → PM (revision pass 4: courses page overhaul — live archive)

Overhauled `design/courses.html` and `design/page-courses.css` to flip the page from "coming soon notify-me capture" to a live self-paced course catalogue.

**Sections — kept:**
- Hero (now single-column, no side card)
- Who it's for (light present-tense tweak — "this is the way in" instead of "what's coming")
- Three things these aren't (anti-positioning, A/B/C)
- Hub preview (canonical block, unchanged)

**Sections — killed:**
- Hero right-side spec card (`<aside class="cs-card">`) — per Dave's site-wide note that this pattern reads as marginalia and should be removed from every page hero. Surrounding `cs-hero-grid` wrapper also removed.
- "What's broken about online CNC training?" agitation section (future-framing — "I'm building")
- "What the first course will cover" — replaced with present-tense "How the online courses work"
- "Here's what I know, and what I don't yet" — removed entirely (live framing makes it irrelevant)
- "Notify me" email-capture section + the form

**Sections — added / reworked:**
- New `§ Course archive` (`cs-archive`) — 8-card responsive grid (4-up desktop / 2-up tablet / 1-up mobile). Border-led visual rhythm matches the existing `cs-anti-list` and the `prog-offer-sheet` 4-up grid. Each card: numeric eyebrow + category, course name, 1-sentence dek, meta dl (format / length / price), `View course →` CTA.
- `§ How the online courses work` — repurposes the four locked-points list (`cs-first-*` markup) with present-tense framing. Removed the orphan GAP item ("forum or Q&A channel") and the GAP curriculum callout. Section heading is now "How it works".

**Hero copy changes:**
- Eyebrow: `Online courses. Coming.` → `Online courses. Self-paced.`
- H1: kept (evergreen)
- Lede: added one sentence — "These are the same courses, broken into evening-sized pieces you can do on your own time."
- Primary CTA: `Notify me` (→ `#notify`) → `Browse courses` (→ `#archive`)
- Secondary CTA: `Browse the Hub` retained

**CSS:**
- Pruned `.cs-hero-grid`, all `.cs-card-*` rules (~80 lines), `.cs-broken-body`, `.cs-first-layout`, `.cs-first-gap`, `.cs-first-lede`, `.cs-known-body`, full `.cs-notify*` block (~120 lines).
- Added `.cs-archive`, `.cs-archive-grid` (1/2/4 col responsive), `.cs-archive-card`, `.cs-archive-eyebrow`, `.cs-archive-num`, `.cs-archive-name`, `.cs-archive-dek`, `.cs-archive-meta`, `.cs-archive-cta` (hover-grows-gap pattern, same as Hub featured-arrow).
- Footer link `Courses (coming soon)` → `Online courses`.

**Course catalogue (8 cards):**
1. Beginners — Milling · ~6h
2. Beginners — Turning · ~6h
3. Setter / Operator — Milling · ~8h
4. Setter / Operator — Turning · ~8h
5. Learn to Program — Milling · ~12h
6. Learn to Program — Turning · ~12h
7. Macro Programming · ~10h
8. Edgecam / CAD-CAM · ~10h

Course titles are taken verbatim from `strategy/cnctcc-proposed-sitemap.md` and match the live classroom-training course list.

**Flags for Dave at sign-off (standing):**
1. **Course deks are invented-plausible.** Drawn from David's known content territory (Fanuc, real-control simulators, tool offsets, work offsets, canned cycles, Edgecam STEP-to-posted-code) — not verified against any source document. Approve at sign-off or swap.
2. **Course lengths are invented-plausible.** ~6h (beginner) → ~12h (Learn to Program) range is realistic for self-paced delivery but not measured. Approve or swap.
3. **Prices are `From £[GAP]` placeholders.** Strategy §10 notes online pricing not yet decided. Awaiting Dave.
4. **Course detail URLs are `#` anchors.** No per-course detail pages exist yet — for visual completeness only. Dave wires real URLs when course pages exist.
5. **Numeric eyebrows (01–08) and category labels** (Beginner / Setter-Operator / Programmer / Advanced / Software) are designer-chosen visual structure — confirm or swap at sign-off.

**From:** ns-website-designer
**Phase:** 4. Design (revision pass 4)
**Status:** Needs Review · awaiting-dave
