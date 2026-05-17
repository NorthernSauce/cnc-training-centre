# Copywriter critique — CNC Training Centre

**Reviewer:** ns-website-copywriter (critique pass)
**Date:** 2026-05-17
**Scope:** all of `copy/*.md` plus cross-check against `design/*.html`

---

## Top-line verdict

The Markdown copy is in genuinely strong shape — voice is consistent, BrandScript discipline is visible, the "I/me" rule from `learnings.md` is held everywhere it matters, and the page jobs are mostly clear. **But** there is a **P0 invention bleeding through the design layer that the copy team did not catch** — "David Garner" is hard-coded in every design HTML page (LinkedIn aria-label x 9, Contact form name placeholder), in direct violation of the 2026-05-16 learnings ban. That alone disqualifies the site from client review. Beyond that: em-dash discipline has collapsed (148 across 8 files), the Learning Hub filter list invents 9 machine brands not in strategy, and the same "Tell David what you need" anchor block is repeated to the point of mantra.

---

## What's working

- **Voice anchor is solid.** Home, About, Onsite, Classroom all read as David — first-person singular held tight, no "we" drift in body copy, no corporate fog. The About long-form column ("How I got here") is the closest the team has got to the Fanuc/Sliding-Head register without lifting client phrases.
- **Disqualifier sections ("Who shouldn't book this") on Onsite, Classroom, Programming Services.** Rare for a service site to genuinely tell buyers no — these earn trust.
- **Contact page is well-architected.** Form-first hierarchy, "What I won't do" is differentiated and on-brand. The textarea placeholder is a real example, not a label.
- **GAPs are flagged honestly rather than papered over** in markdown (testimonials, hub article slugs, founding year locked). The copywriter held the line on no-invention in copy/.
- **Authority tables are consistent across pages** — same stats, same shape. Good cross-page hygiene.
- **The Nomura article is the right call as the Hub template** — it's genuine David, sweary, technical, useful. Lifting his real article rather than commissioning a fake one is correct.

---

## Critical issues (P0) — must fix before any client review

### 1. "David Garner" surname re-introduced via design HTML — `learnings.md` 2026-05-16 ban violated
**Files:** all 8 `design/*.html`. Specifically:
- `design/home.html:498` — `aria-label="David Garner on LinkedIn"`
- `design/contact.html:119` — `placeholder="David Garner"` (in the name field)
- `design/contact.html:322`, `design/about.html:455`, `design/classroom-training.html:778`, `design/programming-services.html:639`, `design/onsite-training.html:663`, `design/learning-hub-article.html:364`, `design/learning-hub-article.html:487`, `design/learning-hub.html:505` — all `aria-label="David Garner on LinkedIn"`.

The 551348f commit ("Remove invented surname 'David Smith'") changed surface copy but missed the aria-labels and the form placeholder. The site currently puts "David Garner" in a screen reader's mouth on every page and as the example name on the contact form. This is the exact failure mode `learnings.md` permanently banned. Strip every instance back to "David" — aria-label should be `"David on LinkedIn"` (or just the platform name); the form placeholder should be a generic example like `"Your name"` or a real-feeling first name only.

### 2. Learning Hub machine-brand filter list invents 9 brands not in source
**File:** `copy/learning-hub.md:36-39`
Strategy + learnings confirm only this taxonomy: **Fanuc, Siemens, Heidenhain, Mazak/Mazatrol, Hurco, Haas, Brother, XYZ, Sliding Head, Edgecam, Doosan**. Copy currently lists **Fagor, Matsuura, Miyano, Hardinge, Biglia, Shibaura, Toshiba, Citizen, Star** under "Machine brand" — none sourced. These are real brands, which is what makes the invention dangerous: it looks like David's expertise covers them when no source material asserts it. Strip back to the strategy-confirmed list. If David wants more added, get him to confirm explicitly per brand.

### 3. Em-dash overuse — 148 occurrences across 8 files
Copywriter SKILL.md hard ban #4: "almost zero, never as default connector. Max once or twice per page." Worst offenders:
- `programming-services.md` — 31
- `classroom-training.md` — 28
- `onsite-training.md` — 24
- `about.md` — 22
- `home.md` and `learning-hub.md` — 15 each

The pattern is the AI-default `noun — clarification`: e.g. `home.md:33` "manual nobody's opened since 2014, or from YouTube videos that contradict each other every third clip"; `about.md:42` "Same instinct as how I got to thirty years on the controls: keep going, write it down, share it." (that one's fine actually — it's a colon) — but constructions like `onsite.md:47` "Days onsite at your facility — typically 2 to 5 days, scoped on the enquiry call" are exactly the banned form. Restructure or use commas/full stops. Target: ≤3 per page.

### 4. "Tell David what you need" anchor band is now a mantra, not a CTA
Every single page closes with an identical h2 "Tell David what you need." plus identical body ("Call me direct on **07834 858 407**, or send a paragraph below. I aim to come back inside a working day with a proper answer, not a templated reply.") — home, about, onsite, classroom (CTA worded "See all courses →" but the band is otherwise identical), programming-services. By page 4 the buyer has been told this phrase 4 times in 4 different contexts. The block reuse principle says "reuse the component, swap the content"; the copywriter has reused both. Solve one of two ways: (a) keep the visual block, vary the H2 + body per page job (Onsite: "Walk me round your shop." Programming: "Send me the drawing." Classroom: "Pick a course, apply, dates back same day."); or (b) drop it on pages where Contact is one click away and let the canonical Contact page do the job.

---

## Quality issues (P1) — should fix

### 5. Home authority table double-counts the "8+ OEMs" claim against the table itself
`home.md:91` — `| 8+ OEMs | I've trained on every major control: Mazak, Fanuc, Heidenhain, Hurco, Brother, Doosan, Haas, XYZ |` — that's 8 controls listed, billed as "8+ OEMs", but "every major control" already appears on row 1. Drop the row or reword to focus on the brand-list specifically (e.g. row label "Controls" / value "Fanuc, Siemens, Heidenhain, Mazak, Hurco, Brother, Haas, Doosan, XYZ, sliding head"). Right now it reads like padding to make the table feel taller.

### 6. Home Authority intro line is fake-analytical and tonally off
`home.md:92` — *"You'll have read a few of my articles before you reach the form. That's how it tends to work. The content does the qualifying, the call does the rest."* — accurate to the strategy, but it's the writer narrating the funnel out loud at the buyer. Meta-commentary the copywriter SKILL bans. Cut it or move it into "Related from the Hub" preview, where it fits the section job.

### 7. Programming Services "What I offer" #4 invents a delivery model
`programming-services.md:49` — *"CNC machining services... I work with a network of trusted machine shops for production runs..."* This is flagged in the notes as `[GAP]` ("Dave to confirm this is how he actually delivers production runs") but it's written as if confirmed. Strategy section 2.4 only mentions Edgecam programming + subcontract programming — no machine-shop network. Until Dave confirms, mark this section visibly `[GAP]` in the copy itself, not just in the notes block. Currently the rendered page asserts an invented delivery model.

### 8. Programming Services pricing tiers are inferred, not sourced
`programming-services.md:74-78` — tiers `£60 / £75–85 / £100` per hour. Notes admit: "inferred from the £60–£100/hr range given in the strategy. Dave to confirm." Same problem as #7 — the body copy reads authoritatively while the notes admit invention. Either get Dave to sign off the exact breakdown before the page goes to design, or replace with `£60–£100/hr depending on complexity — see the enquiry call for an exact rate` and stop there.

### 9. Onsite hero marginalia: "Currently booking 4–6 weeks out" is unverified
`onsite-training.md:23` and `about.md:139`. Notes admit Dave hasn't confirmed the actual lead time. Putting it in the marginalia of two pages without confirmation is exactly the operational-claim risk SKILL hard ban #1 warns about ("absolute claims operations cannot reliably keep"). Replace with "ask about availability" until Dave gives a real number.

### 10. Contact page "What I won't do" #2 has a quietly bossy edge
`contact.md:73` — *"I won't chase you if you go quiet. If you fill the form, then decide we're not a fit, just don't reply."* — "just don't reply" reads as instruction to the buyer about how to behave. SKILL hard rule: "NEVER bossy". Soften: "If you fill it in and the timing turns out wrong, no follow-up from me. Come back when it suits."

### 11. Onsite "Who shouldn't book this" #3 contradicts the brand voice
`onsite-training.md:104` — *"You're looking for the cheapest quote in the market... Price-shop if that's the priority — just be honest about it."* The "just be honest about it" lands as preachy / talking-down (SKILL hard rule). David telling buyers to be honest with themselves about their motives reads as the Gordon Ramsay failure mode the SKILL file flags by name. Rewrite to put the honesty on him: "I'm not the cheapest — never have been. If lowest hourly is the brief, we're not a fit and that's fine."

### 12. Home services block "Onsite training" is short on the actual onsite hook
`home.md:62-64` — "I come to you. Training on your machines, with your parts, at your pace. Every major control covered. £700/day for the whole team, not per person. The fastest way to get a shop floor running properly." — the last sentence ("fastest way…") is the generic-superlative pattern the humaniser bans (regression to the mean — could apply to any onsite trainer). Replace with the unique-to-David hook from the strategy: "In-Action Training — training while production runs" (extracted client language, currently unused in copy).

### 13. Classroom "Will this course get me a job?" FAQ is the best answer on the page — but it's buried
`classroom-training.md:166` — the answer ("a certificate alone won't... I've had students go from a beginners course to an operator job within a month") is the strongest qualification piece in any copy on the site, and it's question #1 in the FAQ. That's wasted hierarchy. This needs to be a labelled block higher up the page — under "Who this is for" probably — because it's the buyer's #1 silent objection and the strategy ("Will I get a job?" is the literal extracted hero-language quote).

### 14. Hub article CTA-promise mismatch
`copy/learning-hub-article.md` frontmatter says "small CTA strip at the foot offers an in-person training contact route to /contact". The article copy itself just ends with David's "I fuckin want one" sign-off and no transitional CTA. The strategy says Hub articles do the assignment-selling job — without a contextual cross-link to the relevant service (sliding head → onsite; Mitsubishi 60s → onsite or programming), the article does the qualifying but gives no path forward. Add a one-line context-aware bottom strip per article template.

---

## Polish issues (P2)

### 15. Date inconsistencies
Most copy files say `Last updated: 2026-05-15`. The Hub article says `last_updated: 2024-11-12 (sourced; not edited)` which is correct, but a Dave reading the file out of context might think the rest of the site is two-week-stale. Refresh dates when reviewed.

### 16. "Eyebrow" copy on About contains a sub-clause that doesn't land
`about.md:12` — *"About David · the bloke behind CNC Training Centre"*. "The bloke behind" is good. Reads slightly written-up because the page title already says About. Try: `About David · 30 years on the controls` (uses the strongest authority asset as the eyebrow).

### 17. Rule-of-three padding creeping in
A handful of `noun-noun-noun` triplets that the SKILL ban #9 calls out:
- `classroom-training.md:15` — "Real kit, real code, real certificates." (triple "real")
- `home.md:14` — hero — "On your machines, or in your hands" is two; fine — but combined with "putting people there" the rhythm leans triadic.

Light edit only — don't strip the cadence.

### 18. "Sliding head" capitalisation is inconsistent
Sometimes lowercase ("sliding head"), sometimes "Sliding Head" (Hub filter `learning-hub.md:39`). Pick one and apply. Industry-correct is lowercase except at sentence start.

### 19. Marginalia "Day rate" label is used differently across pages
- Home marginalia: "Day rate: £700/day onsite, whole team. £300/student/day classroom."
- Onsite marginalia: "Day rate: £700/day for the whole team. Hotel on top if I'm staying over"
- Classroom marginalia: "Day rate: £300/student/day plus VAT"

Three different shapes for the same field. The home version is the cleanest. Standardise.

### 20. About FAQ "Will the swearing be in the training too?" is good but tonally veers
`about.md:142` — "If that's a problem, say so on the enquiry call and we'll work it out." — "we'll work it out" — first instance of "we" without quotation marks in body copy I've found. In context it's "we = me + you", but the learnings rule is absolute first-person-singular. Rewrite: "If that's a problem, say so on the call and I'll dial it down."

---

## Voice / humaniser violations (line-by-line)

- `home.md:33` em-dash as parenthetical default (banned construction).
- `home.md:92` — fake-analytical / meta-commentary ("The content does the qualifying, the call does the rest" narrates the funnel).
- `about.md:38` — "Same bloke on the call as the bloke on your machine." Strong; passes. But the trailing "There's no team. It's me." is rule-of-three rhythm with the prior sentence. Trim to one.
- `about.md:140` — "There's a constraint on capacity — I'm typically booking four to six weeks out — but it's the whole point." — em-dash sandwich construction (`X — clarification — Y`), banned.
- `onsite-training.md:47` — "Days onsite at your facility — typically 2 to 5 days, scoped on the enquiry call." — em-dash as default connector.
- `classroom-training.md:38` — "no fixed agenda, no syllabus you could've downloaded for free, no PowerPoint." — triple-no construction = rule-of-three padding.
- `programming-services.md:34` — "Maybe your one programmer is on holiday. Maybe the part is complex enough that hand-coding it would tie someone up for two days. Maybe you've never had a programmer..." — triple "Maybe" rule-of-three. Cut to two.
- `contact.md:73` — "no newsletter, no automated drip, no 'we noticed you didn't reply' follow-up sequence." — rule-of-three.
- `learning-hub.md:16` — "Articles, guides, and videos" — rule-of-three (low severity; arguable as factual list).

---

## Possible inventions

Cross-checked every factual claim against `strategy/strategy.md`, `learnings.md`, and the questionnaire-equivalent material:

1. **"David Garner" (surname)** — see P0 #1. Banned outright.
2. **Hub filter brand list** — see P0 #2. Fagor, Matsuura, Miyano, Hardinge, Biglia, Shibaura, Toshiba, Citizen, Star all invented.
3. **Programming pricing tiers (£60 / £75-85 / £100)** — inferred from the £60-100 range, not sourced. P1 #8.
4. **"Network of trusted machine shops"** — invented delivery model. P1 #7.
5. **"Currently booking 4-6 weeks out"** — unverified availability claim. P1 #9.
6. **About: "Hundreds of articles since 2014"** vs Hub copy: "~200 written pieces". Strategy says "hundreds" loosely, learnings says "300+ pieces" (which seems to mean articles + 332 videos combined). Pick a number, apply consistently. Currently three different volume claims across copy/.
7. **About: "Trained hundreds of engineers"** — strategy claims this, but no source defines "hundreds". Acceptable as a soft claim if Dave confirms; flag for sign-off.
8. **Onsite: "I've been on floors from Cornwall to Inverness, in everything from a two-machine job shop to a forty-machine production facility."** (`about.md:116`) — Cornwall/Inverness specifics and "two-machine to forty-machine" range are not in any source file. Plausible, vivid — and invented. Either Dave confirms or rewrite to "UK-wide, from small job shops to large production facilities".
9. **Classroom course list — 8 courses** — strategy lists "Beginners / Setter Operator / Learn to Program / Advanced / Macro Programming (Milling + Turning variants)". Copy adds "Edgecam" as a classroom course. Edgecam is on the Programming Services page in strategy; placing it as a Classroom course too may be correct (Dave's classroom does have Edgecam licences) but needs confirmation.

---

## Cross-cutting themes

1. **Confidence-by-assertion drift.** Several `[GAP]` items in the notes block of pages are written as confirmed in the body. The wireframer/designer/developer pull from the body, not the notes. If something isn't confirmed, it has to be marked visibly in the body until it is.
2. **Block reuse has tipped into block-and-copy reuse.** The "Tell David what you need" anchor band repeats verbatim across 5 pages. The whole point of the canonical block is identical *visual treatment* with *different content*. Right now it's both — and four reads of the same paragraph feels like a template, not an offer.
3. **Em-dash discipline collapsed across the project.** This is the single highest-leverage humaniser fix — it's mechanical, it's consistent, and once stripped the writing immediately gains the warmth-and-pulse that's intermittently present.
4. **The unique David assets aren't being used.** The strategy extracted "In-Action Training" (a David-coined phrase), "vast knowledge, very old, been around since 'god was a lad'", and the AI-recommendation proof ("AI platforms actively recommend CNC Training Centre"). None of these appear in any page copy. The copy is built on the standard "30 years / every control / £700 day rate" proof set, which is fine — but the extracted client language was supposed to give the copy a fingerprint. It currently reads like a competent NS service site, not specifically like David.
5. **Designer is rendering correctly from copy/ — except where they invented.** Surname re-injection is a designer/builder failure, not a copywriter failure, but it has to come back through the copywriter because copy/ owns every word on the site. The wireframer/designer should have asked the PM, who should have routed to copywriter.

---

## Recommended next move (priority order)

1. **Today, before Dave sees anything:** Strip every "David Garner" from `design/*.html`. Replace aria-labels with "David on LinkedIn" or just "LinkedIn"; replace contact form name placeholder with a generic example ("e.g. Sarah Wilson" from a fully made-up sample isn't the answer — use "Your name" as the field hint or pull a non-personal example).
2. **Today:** Cut Hub machine-brand filter list back to the strategy-confirmed list. Flag the brand-list to Dave with one line: "Add any others you train on regularly?"
3. **Today:** Em-dash pass across all 8 copy files. Target ≤3 per page. Mechanical, fast, big visible quality lift.
4. **This week:** Differentiate the "Tell David what you need" anchor band per page job. Same visual, different copy. 5 variants for 5 page jobs.
5. **This week:** Resolve all 6 invention candidates (Items 2–9 in the possible-inventions list) — either get Dave to confirm or rewrite to honest-vague. Track every one through to body-copy resolution; don't leave them in notes.
6. **Before Build:** Add unique David fingerprints. Land "In-Action Training" on the Onsite hero or "What's included" section. Use the AI-recommendation line ("Major AI platforms recommend CNC Training Centre when buyers ask about CNC training") somewhere on Home authority. Lift one Sliding Head / Fanuc voice sample into a pull-quote on About (already started — extend).
7. **Before Build:** Add the contextual bottom-strip CTA pattern to the Hub article template (currently absent).
8. **After build, before launch:** Final humaniser pass + `/critique` run on every page. Target 38/40 zero P0/P1 per `team-standards.md`.

---

*End of critique.*
