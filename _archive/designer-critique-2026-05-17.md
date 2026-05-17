# Designer Critique — CNC Training Centre
**Date:** 2026-05-17
**Reviewer:** ns-website-designer (critique pass)
**Scope:** `design/*.html` + `design/page-*.css`, all 7 pages.

---

## Top-line verdict

The system is real. Direction A — Engineering Manual — is legible across every page, the home-as-vocabulary-source contract has largely held, and the typographic discipline (ghost numerals, sec-pretitle, marginalia, spec-block, svc-row) is doing the work it was designed to do. **But this is not ship-ready.** A binding learnings rule (no surname for David) has been broken across every page in the project, content gaps still mark seven pages, two reusable class names collide between pages, and the home page is the only page in the suite that ships without active-state nav. The bones are right; the discipline slipped during parallelisation.

---

## What's working

- **Block reuse is exemplary.** `.svc-cta`, `.find`, `.hub` (homepage preview → learning-hub featured), `.problem`, `.plan`, `.authority`/`.spec-block`, `.faq`, the locked `.nav`/`.drawer`/`.site-footer` — all genuinely re-used verbatim, not re-invented. The About page in particular leans on `.problem` three times for different content shapes without breaking the rhythm. This is what the standard asks for.
- **Typographic system carries the brand.** Tanker hero clamps, the `--` em-dash bullets implied through `.ns-list-bullet`, ghost numerals at 3.5% opacity, the rule-cap pretitle pattern, tabular-num figures — the page reads as one designer's hand, not seven.
- **`.svc-cta` canonical enquiry block (commit ed78983) is correct.** Markup + classes identical across all three service pages, content swaps cleanly, paper-deep surface keeps the anchor slot reserved for the footer. This is the move the brief asked for and it landed.
- **Learning Hub article template (commit 7afafca) has real engineering-typography rhythm** — prose at 65ch, marginalia, drop-cap, dimension-rule pull-quotes. The single article shape is the strongest single-page artefact in the project.
- **No gradient text, no cyan-on-dark, no 50/50 hero-with-stock-photo, no glassmorphism.** Anti-slop discipline largely held.

---

## Critical issues (P0) — must fix before client review

### 1. INVENTED SURNAME — **direct learnings.md violation, project-banned pattern**

Every page in the design ships `aria-label="David Garner on LinkedIn"` in the footer LinkedIn social link. `learnings.md` 2026-05-16 entry: **"NEVER WRITE A SURNAME FOR DAVID."** This is the exact pattern Dave personally caught and banned ("you're making shit up which should never ever happen"). The current files re-introduce it across the entire site.

- **Files:** `home.html:498`, `about.html:455`, `contact.html:322`, `classroom-training.html:778`, `onsite-training.html` (footer), `programming-services.html` (footer), `learning-hub.html` (footer), `learning-hub-article.html:364`. **Eight files, eight violations.**
- **Plus:** `contact.html:119` ships the placeholder `placeholder="David Garner"` on the name field of the enquiry form. The form literally suggests Dave's "surname" to the user.
- **Good:** every footer LinkedIn aria-label becomes `aria-label="David on LinkedIn"`. The name placeholder on the contact form becomes a generic example (`placeholder="Sarah Patel"` or `placeholder="Your full name"` — anything that isn't fabricating Dave's identity).

### 2. Home page nav is the only page missing `aria-current`

`home.html` nav (line 22–29) carries NO `aria-current="page"` on any `.nav-link` and no Home entry in the desktop nav at all (correctly — Home isn't a top-level nav item, the wordmark is the affordance). Every other page in the suite marks its current item with `aria-current="page"` on the desktop nav-link — `onsite-training.html:24`, `classroom-training.html:25`, `programming-services.html:54`, `about.html:29`, `contact.html:33`, `learning-hub.html:28`, `learning-hub-article.html:28`. The drawer-link state is consistent across the suite.

This is fine in principle (Home has no nav item), but it means **the active-state CSS underline on hover/aria-current never gets the visual proof that it works on Home** — and on `contact.html` the `aria-current="page"` is misapplied to the CTA button (`<a class="btn btn-primary btn-sm" href="contact.html" aria-current="page">`) rather than to a top-level nav-link. Two pages handle current-state differently from the other five.

- **Good:** Either (a) decide Home has no nav representation and leave it (current state), but document the rule; OR (b) add a Home nav-link to the desktop nav on every page that mirrors the drawer's `§ 00 Home` entry. Pick one. The contact-page `aria-current` on the CTA button is wrong either way — that's a primary action, not a navigation marker; remove the attribute from the button.

### 3. Class name collision: `.ct-hero` defined twice, different meanings

`classroom-training.html:80` ships `<section class="hero ct-hero">` and `contact.html:80` ships `<section class="hero ct-hero">`. `page-classroom-training.css:20` defines `.ct-hero .hero-title { max-width: 22ch; }`. `page-contact.css:20` defines `.ct-hero { padding-block: clamp(6rem, 9vw, 8rem) clamp(1.25rem, 2vw, 2rem); }`.

Today the bug is hidden by isolated CSS loads. But the build phase will fold both files into a shared theme/blocks Tailwind layer, and any cross-pollution will silently break one or both heroes. This is a **time-bomb the developer will inherit**. Same risk on `.ct-form*` classes (contact-only at present, but using the same `ct-` prefix as classroom). The `ct-` prefix means "classroom-training" or "contact" depending on which file you're reading.

- **Good:** Rename one or both. Suggest: `classroom-training` keeps `ct-` (it had it first) → contact page becomes `co-` or `cta-` prefix throughout (`.co-hero`, `.co-hero-title`, `.co-form-grid`, `.co-form-aside`). Single-pass find/replace inside `contact.html` and `page-contact.css`.

### 4. Content gaps still mark seven pages — visible to the client

Counted: ~30 `[GAP — …]` markers across the design files, several visible in primary above-the-fold sections.

- **Home:** all three testimonial card bodies are GAP placeholders (`home.html:323, 331, 339`); the Learning Hub preview featured card title + dek + control tag + the two secondaries are GAP (`home.html:413–442`). The hub-preview is `§ 07` — the marketing engine — and reads as a wireframe.
- **Classroom:** macro-programming price (`231`), weekend variants (`231, 240`), both auth-quote bodies (`456, 464`), all three hub-preview cards (`535–564`), `.find` postcode/parking (`673–691`).
- **About:** capacity figure (`391`), auth pull-quote (`299`).
- **Learning Hub:** every featured card and every library card title/dek/date — the page reads as a populated layout but with no real article titles.
- **Learning Hub article:** related-article cards.
- **Contact:** postcode, parking, coords.

The design phase rule is GAP placeholders are visible holding patterns until copywriter or client fills them. Fair so far. **But seven pages with surface-area GAPs is a sign the content imports haven't caught up to the design pace.** Before client review, every GAP needs either (a) real content or (b) Dave's explicit sign-off that the GAP is acceptable in the review. The current state will read to the client as "this is half-finished" regardless of the design quality.

- **Good:** Either content-fill, or wrap every GAP in a single visible review-only treatment (existing `.course-flag` style is good — extend project-wide) AND drop a top-of-page note in the design index/landing telling Dave the GAPs are intentional placeholders waiting on his input. Cleaner: spawn a copywriter subagent now to crank through Albert Hall / Ka Bo / Mark Guttridge real quotes (these are sourced from Google reviews per `learnings.md` — the data exists).

---

## Quality issues (P1) — should fix before client review

### 5. Hero pattern split across three implementations

Direction A's home hero uses `.hero-specs` (corner-tick framed engineering spec sheet). About / Classroom / Programming heroes all swap that for `.marginalia` instead — three pages doing the same swap with the same justification ("page-edge marginalia signature on service pages"). Onsite uses its own `.ot-hero-grid` (different from both). Contact + Learning Hub heroes are compressed (no RH panel). So there are **four hero compositions** across seven pages:

- Home — `.hero-specs` RH
- About / Classroom / Programming — `.marginalia` RH (consistent move)
- Onsite — `.ot-hero-grid` (different)
- Contact / Learning Hub — compressed, no RH panel

The Onsite divergence isn't obviously justified by content. If `.marginalia` is the service-page signature, Onsite should use it too. If Onsite genuinely needs its own grammar, the design-system note in DESIGN.md should explain why. Right now it just looks like one page was written by a different sub-agent.

- **Good:** Either consolidate Onsite onto the `.marginalia` pattern (recommended — three service pages becoming four with one shared shape), or document Onsite's variant in a design-decision comment in `page-onsite-training.css` so the developer doesn't normalise it away.

### 6. Hero scale change (commit 7578824 / 20db00c)

`.hero-title--svc` modifier (`page-home.css:474`) drops the H1 from `clamp(3.5rem, 1.4rem + 9vw, 9rem)` to `clamp(2.25rem, 1.1rem + 4.5vw, 5rem)`. **About then overrides it AGAIN** (`page-about.css:21`): `.about-hero .hero-title { font-size: clamp(2.6rem, 1.8rem + 4.8vw, 6rem); }`. So About is a third hero scale, between Home (9rem max) and svc (5rem max).

This is the right instinct (long About headline needs more) but the system now has three hero scales with no naming or documentation:
- Home: 56→144px
- About: ~42→96px
- Service: 36→80px

- **Good:** Promote these to named tokens — `--ns-hero-display-xl`, `--ns-hero-display-lg`, `--ns-hero-display-md`. Apply via modifier classes (`.hero-title--xl/lg/md`) so the developer can name the intent rather than reverse-engineering the cascade.

### 7. `.svg` fallback for logo asset

Every nav + drawer + footer in every page ships the same PNG (`assets/logos/cnc-training-centre-logo.png`). Footer renders at 64px height, nav at 56–64px. PNG at that intrinsic size on 2x retina will render soft. `learnings.md` 2026-05-15: "SVG version preferred — to be requested from client." Eight months of designer's time across the project and the SVG hasn't been requested yet.

- **Good:** Add a single line to the project handover for client kickoff: "request SVG of wordmark." Until then, ship a 2x or 3x PNG so retina is crisp.

### 8. Marginalia "01 / 05" hero-spec-num lies

`home.html:96` ships `<span class="hero-specs-num">01 / 05</span>` and `about.html:96` ships `<span class="about-hero-side-num">01 / 05</span>` — both implying "this is item 1 of 5 sections". It's actually the meta count of the spec list (5 rows). The notation is the same as the `.section-num` "§ 01" pretitle pattern, so it reads as a section-position indicator when it isn't. Mildly confusing — borderline AI-generated decorative numeric tell.

- **Good:** Either change the format (`05 / 05 specs`, `5 facts`) or remove. If kept, ensure it varies per page (Classroom's says `02 / 05`, About's says `01 / 05`, Home's says `01 / 05` — these don't follow a system).

### 9. Hub-preview homepage card chrome breaks the "rules + whitespace, not containers" principle

DESIGN.md § 5 Cards: "Direction A favours rules + whitespace + typography over containerised cards — reach for the article-row pattern first." The home `.hub-featured` and `.hub-secondary` use `border: 1px solid var(--ns-color-rule); border-radius: var(--ns-radius-tight); padding: 2.5rem` — full card chrome. The same content as `.article-row` rendered into containerised tiles. This is the one section in the home page that feels like a generic 1-featured + 2-secondary template.

The decision is defensible (the hub preview is a destination teaser, not a list), but the visual weight of those three boxes on `paper-deep` is high and competes with the spec-block in § 05 and the testimonial cards in § 06. **Three cardified sections in a row across § 05, 06, 07** is the "identical rhythm" anti-pattern in disguise.

- **Good:** Drop the borders off `.hub-secondary` and switch to `border-top: 1px solid` + tighter padding. Keep `.hub-featured` containerised (it's the editorial pick), but let the two secondaries read as typographic rows. Restores the rhythm break the section needs.

### 10. Marginalia uses both `<dl>` and pretitle eyebrow inconsistently

`brief/components.css` defines `.marginalia` with `marginalia-head` carrying the uppercase label. About + Classroom + Programming all add a SECOND meta number (`about-hero-side-num`, `ct-hero-side-num`, `prog-hero-side-num`) inside the head. These are page-local variants on a shared component, suggesting the base component is missing an optional slot.

- **Good:** Move the meta-number slot into `components.css` as `.marginalia-meta`. Then all three pages stop redefining the same thing in three different files.

---

## Polish issues (P2)

### 11. Hero "Scroll · …" base label — purpose drift

The `.hero-base` footer rule on Home / About / Classroom / Onsite / Programming reads `Scroll · The gap` / `Scroll · How I got here` / `Scroll · Who this is for` / `Scroll · Who this is for` / `Scroll · Drawing in, G-code out`. Onsite + Classroom both use `Scroll · Who this is for` — duplicated string for what should be distinct sections. Trivial fix, but it's the kind of micro-detail that betrays sub-agent parallelisation.

### 12. `.svc-row-pill` uses `border-radius: pill` (999px) on a non-tag element

DESIGN.md § 4: "Pill radius — Tags + filter chips only. Nothing else uses pill." The `.svc-row-pill` (Home § 04 "coming soon" badge on the Courses row, `page-home.css:972`) breaks this rule. Small, but the design system explicitly forbids it.

- **Good:** Either it's a tag (use `.tag` class, get the pill for free) or it's an inline note (use `--ns-radius-tight`).

### 13. Hub-stats nth-child border math is brittle

`page-home.css:1288` — `.hub-stat:nth-child(2n) { border-right: 0; }` then `@media (min-width: 700px) { .hub-stat:nth-child(2n) { border-right: 1px solid …; } .hub-stat:last-child { border-right: 0; } }`. Works for 4-up, breaks if a fifth stat is ever added. The Hub archive page Hero stats use a 5th stat (`<div><dt>Cost</dt><dd>Free</dd></div>`) but in a different container (`.lh-hero-stats` not `.hub-stat`) so they don't share this rule. Document the constraint.

### 14. `.problem-pull::before` decoration tints to paper-tint background

`page-home.css:743` — the centred dot decoration on `.problem-pull` is `background: var(--ns-color-paper-tint);` to "punch through" the rule above. About uses `.problem-pull` THREE times (`§ 02 about-trainer`, `§ 04 indep`, `§ 07 where`) on alternating `s-paper-tint` and `s-paper` sections. On `.s-paper` sections (§ 07 where), the dot's `paper-tint` background is the wrong colour — should be `paper`. Visible on the About page on the third pull-quote.

- **Good:** Inherit surface colour via `background: currentColor` trick or define `--ns-pull-dot-bg` per section.

### 15. Sticky filter bar `.lh-toolbar` uses `top: 88px` — magic number

`page-learning-hub.css:121` — hard-coded `top: 88px` to clear the nav. The nav itself is `padding: var(--ns-space-md) ...` + a 56-64px logo, so it computes to ~88–96px depending on viewport. Risk: nav grows or shrinks (already does at 900px breakpoint), sticky toolbar covers the section heading.

- **Good:** Use a CSS variable `--ns-nav-h` set once in `tokens.css` so the toolbar follows the nav.

### 16. Editor's pick eyebrow — colour drift

`.hub-featured-eyebrow` (`page-home.css:1399`) uses `color: var(--ns-color-primary)`. Most uppercase eyebrows on the site use `--ns-color-ink-muted`. Primary on a paper card breathes as "this is a link" not "this is an editorial eyebrow." Reads weird against the rest of the eyebrow system.

### 17. About page — `.where-coda` uses `font-style: italic`

`page-about.css:151` italicises the closing "If you want to come and see the classroom… the kettle's on." Italics in body prose are a generic decorative tell. The site otherwise uses italics only on hero `<em>` accent words, where they're rendered in primary. Inconsistent + soft.

### 18. Mobile nav-actions on contact + tiny screen — phone button missing

`.nav-actions .nav-phone { display: none; } @media (min-width: 700px) { display: inline-flex; }`. Below 700px the phone number disappears from the nav (correctly — drawer carries it). But the visible CTA `Contact David` button stays in the nav. On a phone, the primary action is to call, not to fill a form. Worth considering a phone icon button below 700px.

---

## Cross-cutting themes

1. **Parallel sub-agents diverged from the spec without surfacing it.** The Onsite hero grid, the duplicate `Scroll · Who this is for` label, the three different hero clamp formulas, the `ct-` class collision — all read like four agents working off the same brief but not cross-checking each other.

2. **GAP discipline slipped.** When `[GAP — …]` markers appear in section bodies AND in form placeholders AND in component eyebrows AND in marginalia data, the page stops reading as "almost done" and starts reading as "skeleton." Industry standard: GAPs in body paragraphs only; everything chrome-level (form placeholders, eyebrows, meta) is real or omitted. Tighten.

3. **The learnings.md rule about surnames was treated as a one-time correction, not a permanent ban.** The footer LinkedIn aria-label was copied across pages BEFORE the surname violation was caught, then never re-audited after the fix landed. Every dispatch brief should include "diff against learnings.md and re-scan past-killed patterns" as a literal step.

4. **The home page is the design reference, but it's also still GAP-heavy.** When subsequent pages copy from home, they sometimes copy the GAP patterns too (hub-preview stale across home + classroom + hub article). Tighten home first, then dispatch the rest with a clean reference.

5. **No `/critique` or `/polish` scoring committed.** The phase contract requires `/critique ≥ 38/40` with zero P0/P1 before showing Dave. No critique-loop output is checked in. This pass found three P0s in five minutes — the quality gate has been skipped.

---

## Recommended next move

**Today, in this order, no parallelisation:**

1. **Fix the surname violation.** Single find-replace across all eight HTML files (`David Garner` → `David` in aria-labels, `placeholder="David Garner"` → `placeholder="Your name"` on contact form). 15-min task.
2. **Fix the `.ct-hero` class collision.** Rename contact-page classes from `ct-` to `co-` throughout `contact.html` + `page-contact.css`. 30-min task.
3. **Fix the nav active-state inconsistency.** Pick one rule (Home has no nav-link, or Home has a nav-link) and apply across all pages. Remove `aria-current` from the contact-page CTA button. 15-min task.
4. **Burn down the high-visibility GAPs.** Spawn the copywriter to pull real Albert Hall / Ka Bo / Mark Guttridge review text from Google (sources exist), pick three real Hub article titles for the home Hub preview, pick three real library cards for the Hub archive. 90-min task.
5. **Run `/critique` on Home first**, fix to ≥38/40, then run on the other six pages in parallel. Surface any new findings to Dave.
6. **Audit hero scales** and promote to named tokens before phase 5 build picks up the variants.
7. **Then, and only then,** present to Dave.

The design is closer than the GAP-count suggests — most of the work is fix-pass and audit, not redesign. But it cannot be shown to the client in its current state. The "no invented details" rule has already been broken; presenting it now risks burning the same trust Dave caught and restored last week.
