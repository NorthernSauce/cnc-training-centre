# CNC Training Centre Website

**Started:** 2026-05-15 (re-kickoff; original project began earlier in 2026)
**Design repo:** {TBC — Dave to provide GitHub URL}
**Local theme path:** to be filled at phase 5 kickoff — e.g. ~/Local Sites/cnc-training-centre/app/public/wp-content/themes/_ns
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

Phase 4 (Design) — full revision pass against copyseller v3 copy: **all 9 issues Needs Review, awaiting Dave**.

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

- 2026-05-15 — Sitemap trimmed from 5 services + shop to 4 services (Onsite / Classroom / Courses-coming-soon / Programming Services) + Learning Hub + About + Contact. Online Live Training folded back into Classroom; Shop removed; Courses kept as a "coming soon" placeholder.
- 2026-05-15 — Project migrated from `~/Documents/PROJECTS/Client Website Projects/cnc-training-centre/` to standard `~/Documents/Clients/cnc-training-centre/`. Old design + build folders archived to `_archive/`.

## Client preferences

(Append-only. Mirrors client-specific learnings.)

- Voice is sweary, direct, anti-corporate. Existing AI-written SEO pages on the current site (Doosan, Hurco) are the negative reference — do not replicate that register.
- Premium / high-end visual aesthetic, "industrial premium" — no SaaS gloss, no acid green, no decorative glass.
- Keep brand blue + add green for video content per client; no lime/acid green as a dominant colour.
- Two-font system; avoid Inter as the named display font.
