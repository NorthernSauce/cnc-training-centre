# CNC Training Centre Website

**Started:** 2026-05-15 (re-kickoff; original project began earlier in 2026)
**Design repo:** {TBC — Dave to provide GitHub URL}
**Local theme path:** to be filled at phase 5 kickoff — e.g. ~/Local Sites/cnc-training-centre/app/public/wp-content/themes/_ns
**Linear project:** https://linear.app/northern-sauce/project/cnc-training-centre-website-ec6281752867
**Linear phase issues:** NOR-49 Strategy · NOR-50 Brief · NOR-51 Copy · NOR-52 Wireframes · NOR-53 Design · NOR-54 Build · NOR-55 Launch
**Active Brief sub-issues:** NOR-148 Direction (Done) · NOR-149 Tokens (Done) · NOR-150 Components (Done) · NOR-151 Style guide (Done) · NOR-152 DESIGN.md (Done)
**Active Copy sub-issues:** NOR-153 Home (Done) · NOR-155 Onsite (Done) · NOR-156 Classroom (Done) · NOR-157 Programming (Done) · NOR-161 About (Done) · NOR-162 Contact (Done) · NOR-163 Learning Hub (Done)
**Active Design sub-issues:** NOR-154 Home (Done) · NOR-158 Onsite (Needs Review) · NOR-159 Classroom (Needs Review) · NOR-160 Programming (Needs Review) · NOR-164 Learning Hub (Needs Review)

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

Phase 3a (Copy) + Phase 4 (Design) running in parallel.

**Status:**
- Phase 3a — Home + 3 service pages copy Done. About / Contact / Hub / Courses / detail templates outstanding.
- Phase 4 — Home + 3 service pages design **Needs Review** (awaiting Dave morning sign-off). About / Contact / Hub / Courses / detail templates outstanding.

## Phases

- [x] 1. Strategy
- [x] 2. Design Brief
- [~] 3a. Copy (7 of ~12 pages done — Home, Onsite, Classroom, Programming, About, Contact, Learning Hub)
- [x̶] 3b. Wireframes — CANCELLED 2026-05-15 at Dave's direction
- [~] 4. Design (5 of ~12 pages done — Home approved; Onsite / Classroom / Programming / Learning Hub awaiting sign-off)
- [ ] 5. Build
- [ ] 6. Launch

## Handoffs

(Newest first.)

### 2026-05-15 — Designer-Copywriter → PM (Design Brief complete, awaiting Dave sign-off)

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
