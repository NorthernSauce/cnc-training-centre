# Handover — CNC Training Centre Website

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
