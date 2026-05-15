# Handover — CNC Training Centre Website

**For:** PM agent picking this up in a new chat.
**Written:** 2026-05-15 by previous PM session.
**Read this end-to-end before doing anything.** Don't re-run intake. Don't re-pitch direction. The work is already mid-flight.

---

## Where we are right now

Phase 3a (Copy) is mid-flight. Home page draft is signed off (voice locked). Next session's first action is **Phase 4 Design — starting with the Homepage**. Wireframing was deliberately cancelled by Dave — Designer works directly from approved copy + the locked style guide.

### Phases — current state

| # | Phase | Linear | State |
|---|---|---|---|
| 1 | Strategy | NOR-49 | ✅ Done (approved 2026-05-15) |
| 2 | Design Brief | NOR-50 | ✅ Done (approved 2026-05-15) — full token + component system + style guide signed off |
| 3a | Copy | NOR-51 | 🟡 In Progress — Home signed off; 11 pages still to write |
| 3b | Wireframes | NOR-52 | ❌ **CANCELLED** — Dave's call. Skip this phase. |
| 4 | Design | NOR-53 | ⏳ Backlog → moves to In Progress on Homepage when next session starts |
| 5 | Build | NOR-54 | ⏳ Backlog |
| 6 | Launch | NOR-55 | ⏳ Backlog |

### Deadline

Hard deadline: **21 May 2026 (Thu)**. Today is 15 May (Fri). 4 working days remaining including launch day. Tight but Dave is confident.

---

## Dave's plan for the next session (verbatim)

> "I'd like to skip the wireframing, cancel it off on this project. Once i start the new chat we'll be getting straight on with the design of the homepage. Once thats done we'll be finishing up copy then finishing the design."

Translation:
1. Start the new chat → designer phase kicks off **Homepage design** using `copy/home.md`.
2. While Homepage design is going, **finish the rest of copy in parallel** (10 service / hub / about / contact / detail pages).
3. Once homepage design is signed off, **complete the remaining page designs** off the back of finished copy.

So the workflow is non-linear from this point: Phase 4 (homepage design) and Phase 3a (remaining copy) overlap. PM needs to dispatch both threads and reconcile in Linear.

---

## The single most important voice rule

**Copy is FIRST PERSON SINGULAR — "I", "me", "my". NEVER "we", "us", "our".** David is the only person in the business. Any copy that drifts to plural gets bounced.

Exception: "Contact David" / "Tell David what you need" are kept as direct CTAs (proper-noun form is warmer than "Contact me"). Body copy: first person.

This rule is locked in `PRODUCT.md` (Voice section) and `learnings.md`. Any copywriter dispatch must surface it explicitly in the brief.

---

## Project location + key files

**Working directory:** `~/Documents/Clients/cnc-training-centre/`

**Read these first, in order:**

1. `PROJECT.md` — single source of truth for phase state, handoffs, decisions.
2. `learnings.md` — **BINDING** client-specific rules. Re-read every time. First-person voice rule lives here.
3. `PRODUCT.md` — strategic register, voice, anti-references, design principles.
4. `DESIGN.md` — Google Stitch 6-section format. Phase 4 designer reads this as canonical visual spec.
5. `DESIGN.json` — machine-readable sidecar for designer + builder.
6. `strategy/strategy.md` — full BrandScript, P-E-A-C-E, voice samples, proof bank.
7. `strategy/cnctc-proposed-sitemap.md` — finalised 4-services + Hub + About + Contact sitemap.
8. `brief/tokens.css` + `brief/components.css` — ships verbatim into the theme at Phase 5.
9. `brief/style-guide.html` — full rendered style guide. Open this in a browser before designing.
10. `copy/home.md` — Home page copy, signed off. The only copy file written so far.

---

## Direction A — what's locked

**Engineering Manual.** Industrial-premium, type-led, photography-light. Asymmetric editorial layouts. Marginalia rail + dimension-callout rule-cap as the two visual signatures. Light theme only. WCAG 2.1 AA.

**Type pair:** Tanker (display, Fontshare, free) + Synonym (body, Fontshare 400/500/600/700, free).

**Anti-references:** corporate SaaS landers, OEM training brand pages, the existing site's AI-generated SEO pages (Doosan / Hurco).

---

## Linear project

**URL:** https://linear.app/northern-sauce/project/cnc-training-centre-website-ec6281752867

### Phase issues
- NOR-49 Strategy — Done
- NOR-50 Design Brief — Done
- NOR-51 Copy — In Progress (Home complete; 11 pages outstanding)
- NOR-52 Wireframes — **Canceled** (skip this phase, do not reactivate)
- NOR-53 Design — Backlog → move to In Progress when next session starts
- NOR-54 Build — Backlog
- NOR-55 Launch — Backlog

### Active sub-issues
- NOR-153 Copy: Home — In Progress (waiting on Dave's final sign-off before marking Done)

### Sub-issues yet to create
- Copy: Onsite Training (overview)
- Copy: Onsite detail-page template
- Copy: Classroom Training (overview)
- Copy: Classroom course detail-page template
- Copy: Courses (coming soon)
- Copy: Programming Services (overview)
- Copy: Programming detail-page template
- Copy: Learning Hub (index)
- Copy: Hub category page template
- Copy: About
- Copy: Contact
- Design: Home (kicks off first under NOR-53)

---

## Open gaps for Dave

These need answers before specific sections can lock. Surface them at the right moment, don't ambush Dave with all four at once.

1. **Testimonials.** Need 3 specific Google review quotes with reviewer attribution (preferably 1 company decision-maker + 1 classroom student + 1 long-form before/after). Home page has placeholders. Hub + About pages will reuse the same quotes.
2. **Founding year.** Home eyebrow currently reads "Independent CNC training · since 1994" (30 years backwards from 2024). Dave to confirm.
3. **YouTube subs stat.** Home Authority section rounded 8,930 → "8,900+". Dave OK'd implicitly, confirm at next sign-off.
4. **Do-nothing cost in David's words.** Strategy flagged this. Useful on Onsite / Classroom overview pages and About.
5. **Photography.** No usable people / classroom / teaching photography at brief sign-off. Workshop fragment shots planned at launch; David-teaching shoot deferred post-launch.
6. **Logo SVG.** PNG carried through (`assets/logos/cnc-training-centre-logo.png`). SVG version preferred — to be requested from Dave at next handoff.

---

## Action plan for next session — exact steps

### Step 1 — Read state (don't skip)
Read every file in the "Read these first" list above. Especially `learnings.md` and `PRODUCT.md`. Confirm to Dave you've absorbed the voice rule (first person singular).

### Step 2 — Move Linear
- NOR-53 Design → `In Progress`
- Create sub-issue `Design: Home` under NOR-53, status `In Progress`

### Step 3 — Dispatch the designer
Run `/ns-website-designer` with:
- Slug: `cnc-training-centre`
- Inputs: `copy/home.md`, `brief/tokens.css`, `brief/components.css`, `brief/style-guide.html`, `DESIGN.md`, `DESIGN.json`, `PRODUCT.md`
- Note: this is a **Dave-collaborative phase**. Designer doesn't work in isolation. Dave reviews iterations.
- Critical voice flag for the designer: copy is **first person singular**. Any drift to "we" is a fail.
- Wireframes are skipped — designer goes straight from copy to high-fidelity HTML/CSS.

### Step 4 — Run copy in parallel
While the designer is working on Homepage with Dave, dispatch `/ns-website-copywriter` to write the remaining 11 pages. The copywriter has:
- Voice locked from PRODUCT.md + learnings.md (first person)
- Home page as the gold-standard reference for tone
- Sitemap from `strategy/cnctc-proposed-sitemap.md`
- All open gaps documented above

Pages to write (in roughly this order):
1. Onsite Training (overview) — Buyer A's primary landing
2. Classroom Training (overview) — Buyer B's primary landing
3. Programming Services (overview)
4. About
5. Contact
6. Learning Hub (index)
7. Courses (coming soon placeholder)
8. Onsite detail-page template (per machine brand / control)
9. Classroom course detail-page template
10. Programming detail-page template
11. Hub category page template

### Step 5 — Reconcile + handoff to build
Once homepage design is signed off AND all copy is signed off, the designer produces the remaining page designs. Then NOR-53 → Done, dispatch `/ns-acf-block-builder` (Sonnet 4.6) for Phase 5 Build.

---

## Skills you'll use, in order

| Phase | Skill | Mode |
|---|---|---|
| Design (Homepage first) | `/ns-website-designer` | Dave-collaborative |
| Copy (remaining pages) | `/ns-website-copywriter` | Then runs `/ns-humaniser` + self-critique per page |
| Build | `/ns-acf-block-builder` | Sonnet 4.6 (set `model: "sonnet"`) |

The brief skill is done — do not re-run.

---

## Things NOT to do

- **Don't re-run intake** (`/start-project`). Project is mid-flight.
- **Don't re-pitch direction.** Direction A is locked.
- **Don't write wireframes.** Phase 3b is cancelled.
- **Don't propose alternative type pairs.** Tanker + Synonym is locked.
- **Don't suggest "we" anywhere in copy.** First person, always.
- **Don't invent facts.** Every claim comes from `strategy/strategy.md`, `PRODUCT.md`, or Dave. If a fact isn't sourced, flag a `[GAP]` and ask.
- **Don't skip the humaniser pass.** Every page goes through `/ns-humaniser` before Dave sees it.
- **Don't burn time on critique loops past 38/40.** The bar is met; ship.

---

## Communication shape with Dave (caveman by default for PM, full voice for copy)

- PM conversational output: caveman mode (concise, fragments OK, no filler).
- Copy you write: full natural prose, David's voice.
- Status updates: terse — point at Linear, not paragraphs of recap.
- Sign-off gates: present the artefact, ask one specific question, wait.

---

## Last commit state

Working directory is a git repo. Last commit: brief phase complete, logo wired into G.29, learnings logged. `copy/home.md` is committed at the previous Home-draft state. The first-person voice swap is in the working tree but not yet committed — commit it as part of the next session's first action.

GitHub URL: TBC — Dave will create the remote repo and provide the URL.

---

## Final note

Dave is sharp, has good taste, and trusts the process. He'll tell you when something's off. He'll also tell you when he's happy — short and clear. Don't overthink the language; mirror his energy. He works fast, expects you to keep up, but flags collaborative phases (Design Brief, Design) where he wants to be in the room.

Good luck. The foundation is solid — visual system, voice, strategy, Home page copy. Phase 4 is where the project starts looking like a real site.
