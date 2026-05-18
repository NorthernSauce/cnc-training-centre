# Copyselling on reading behaviour — and an honest audit of `copy/home.md`

**Date:** 2026-05-17
**Source book:** Joanna Wiebe, *Copyselling* (Markdown copy in Knowledge Base)
**Target file:** `/Users/davidmerton/Documents/Clients/cnc-training-centre/copy/home.md` (commit `9444cba`)

---

## 1. What the book actually says

### On how people read online

The book's central position is that the "people don't read online" line is a misread of the 1997 Nielsen Norman study. The study used dull, irrelevant copy (Nebraska tourism stats) and proved that people don't read *that*.

> "It's not that people don't read online. It's that people don't read boring, irrelevant stuff anywhere — online or off. People will read interesting things." (p.~849)

> "People rarely read Web pages word by word; instead, they scan the page, picking out individual words and sentences." — Wiebe quoting Nielsen, then explicitly rejecting the conclusion drawn from it. (p.~807)

Scanning is real. The book's response is not "therefore write less" — it's "therefore hook hard, stay relevant, and they'll read."

### On copy length — the book's clearest stance

The book argues *against* the modern reflex to keep everything short, and uses the VW "Lemon" ad (165 words of body copy on quality assurance, "more frequently read than the articles" in the same magazines) as the proof case.

> "Not to keep all copy short, but rather to hook people fast and draw them in with copy relevant to them… If you hook them fast, they'll start reading; however, if what they start reading doesn't engage them, they'll stop." (p.~949)

> "You do not have to write big, long sales letters, you also should not resist big, long sales letters… The less you write here, the more you have to write there. A relentless focus on cutting copy is really just an exercise in kicking the can down the road — eventually your customer needs the information they need, presented with the emotion that will move them." (p.~1074)

> "We no longer edit to the shortest form." (Stated as one of three non-negotiable team commitments. p.~1092)

Chapter-recap line: *"A short headline may be great, but that doesn't mean all copy must be short to be great."* (p.~1106)

### The Doodle case study — the book's loudest data point

Wiebe replaced Doodle's 4-email onboarding control with a 16-email flow (four times the volume), most emails longer than control, "written in a narrative style that requires reading from top to bottom, not scanning." Half the client's team thought it would bust.

> "63.9 percent lift in purchases of Doodle's Pro product and an 18.3 percent lift in purchases of Doodle's Starter product." (p.~5613)

The book uses this as proof that long, narrative, scan-resistant copy can outperform short scannable copy *when it's relevant and well-hooked*. It also generated nearly 3× the unsubscribe rate — more people self-selected out, more of those who stayed converted.

### The relationship between hook strength and copy length

The book is unambiguous: long copy is permitted because (and only because) the hook earns it. The hook is the gate.

> "The purpose of a line of copy is to get you to read the next line of copy (true)." (p.~1047, listed as a confirmed truth.)

> "Hook your reader at Beat 4 and… move them to Beat 8." Every framework in the book is hook-first — Attention/Interest/Desire/Action is named explicitly. (p.~6211)

The implication for the writer: if the page is long, the hook had better do work. If the hook is weak, length isn't a virtue, it's an exit signal.

### On "above the fold" / first screen

The book doesn't use "above the fold" terminology much, but its functional equivalent is the hook + first beat. The fictional Claude-AI consultation late in the book (advertorial page redesign) does say this directly:

> "Given how lengthy the new page will be, you consider adding a video sales letter (VSL) to the top of the page for those who will not read it all." (p.~1600)

That's the only direct concession to "some people won't read it all." The book's response is *not* "shorten the page" — it's "add a VSL at the top for skimmers, keep the long copy for readers."

### On scannability mechanics (the Seven Sweeps + Doodle note)

The book has surprisingly little to say about *typographic* scannability (subheads, bullets, white space, pull-quotes). Its editing system — the Seven Sweeps (Clarity, Voice & Tone, So What, Prove It, Specificity, Heightened Emotion, Zero-Risk) — is entirely about message work, not layout.

The one direct comment on visual treatment is about Doodle:

> "The design was stripped way back." (p.~5604) — i.e. when copy is doing the lifting, design recedes; long narrative copy is read top-to-bottom, not skimmed.

And from Sweep #6 (Heightened Emotion):

> "Is the problem section of your page deeply agitating the problem such that I feel it so powerfully I can't imagine not resolving it?"

The book endorses naming things (mechanisms, offers, guarantees) — "Give everything a name!" (p.~7709) — which functions as scannability in practice. Named entities act as visual anchors.

> "Copy typically gets a little longer when you do your sweeps. That's okay. This is intentional editing that focuses on what customers need to hear, not just word count." (p.~7712)

### Modern websites vs. long-form sales letters — does the book distinguish?

Briefly, yes — but the distinction collapses into the same rule. A message matrix "reads, start to finish, like a long-form sales page or video sales letter" (p.~4688). The framework is the same; the channel changes the form but not the principle.

### Summary of the book's position on length

1. Length is not the question. Relevance and hook strength are the questions.
2. People will read long copy if it's about them and the hook earns the read.
3. Cutting copy to please skimmers is "kicking the can down the road" — the buyer still needs the info to convert.
4. The remedy when a page is long isn't "cut" — it's "hook harder, add a VSL for non-readers, and let the design recede."
5. Naming things (mechanisms, offers, guarantees) is the book's preferred scannability tool.

---

## 2. Draft audit — `copy/home.md`

### Word counts by section

| Section | Words |
|---|---|
| Hero | 174 |
| Agitation | 239 |
| Positioning | 182 |
| Solution mechanism (In-Action Training™) | 219 |
| Services | 195 |
| Proof of how | 125 |
| Proof of who (testimonials — placeholders) | 142 |
| Use cases / Hub preview | 176 |
| Decisiveness band | 168 |
| **Total body copy** | **~1,620 words** |
| Full file incl. front-matter + notes | 2,306 words |

### Heaviest sections + what's making them fat

**1. Agitation (239 words).** Three paragraphs doing what could plausibly be done in two. The first two paragraphs both blame "the old way" via slightly different routes (whoever-was-free internal training, then failed external routes — OEMs / YouTube). Then a third paragraph names the mechanism. The first two paragraphs share a lot of emotional territory. Compression target.

**2. Solution mechanism (219 words).** Three paragraphs. Para 1 explains what bad training does. Para 2 explains what In-Action Training does. Para 3 adds an "I assess as I go" caveat. Para 1 is mostly setup-by-contrast — useful but recoverable; Para 3 reads as a footnote that could be a single sentence inside Para 2.

**3. Services (195 words).** Four blocks with descriptions of roughly equal weight. Each block over-explains its own value proposition rather than letting the title + one line + price do the work. The Onsite block is tight; Programming and Classroom carry passenger words.

### Where the draft is *appropriately* heavy

- **Hero (174 words including marginalia bullets):** This is the hook. Per the book, the hook earns the page. It can't be cut without weakening every section beneath it.
- **Proof of how (125 words):** Already lean. Table does most of the work.
- **Use cases (176 words):** Pre-qualification is doing a job — sending the wrong-fit buyer to the Hub. Earns its words.

### What the book says to do when copy is long

Not "cut." The book's repeated prescription is:

1. Make sure the hook is strong enough to pull the reader through.
2. Use named mechanisms as anchors (the draft already does this — `Whoever-Was-Free Training™`, `In-Action Training™`).
3. Let design recede; let copy carry.
4. If genuinely worried about skimmers, add a VSL or summary panel at the top — *not* a shorter page.

The book does *not* prescribe word-count targets, scannability rewrites, or "make it tighter." The closest it comes to a length warning is the Seven Sweeps Clarity pass — *delete what's unclear or unnecessary* — not *delete what's long*.

---

## 3. Verdict

**The draft is fractionally over-written in two sections (Agitation and Solution mechanism) but, by the book's own standards, it is not "too long."** ~1,620 words of body copy on a homepage that has to sell training to engineering decision-makers is well inside the territory the book defends. The Doodle email flow was longer per-email than this homepage is per-section, against industry consensus, and won by 63.9%. Dave's instinct ("seems a hell of a lot of copy") is the same instinct Wiebe spends Chapter 1 dismantling — the conditioned reflex from short-copy orthodoxy. The right response is not to cut the page in half, it's to (a) tighten the two heavy sections via a Sweep pass, and (b) make sure the hero hook is doing enough work to earn the read for the buyer who keeps scrolling.

---

## 4. Recommendation

**Don't slash. Sweep.** Specifically:

### Targeted compressions (Sweep #1: Clarity + Sweep #5: Specificity)

- **Agitation: 239 → ~170.** Merge paragraphs 1 and 2 into a single paragraph that runs internal-failure → external-failure as one beat. Keep paragraph 3 (the mechanism-naming paragraph) intact — that's the payoff. Expected cut: ~70 words.
- **Solution mechanism: 219 → ~160.** Fold the "I assess as I go" paragraph into a single closing line of paragraph 2. Tighten paragraph 1 (the bad-training-by-contrast setup) by removing the "PowerPoint / folder / two days later" tricolon — one example does the same job. Expected cut: ~60 words.
- **Services: 195 → ~150.** Trim each block's body to one sentence + price + link. Let the block titles do more work. Expected cut: ~45 words.

**Total compression target: ~175 words. New body copy: ~1,445.** Still long by modern reflex; still well inside what the book defends.

### Scannability moves (not cuts, presentation)

These should happen at wireframe / design stage, not in the copy:

- **Pull-quote treatment for `Whoever-Was-Free Training™` and `In-Action Training™`.** The named mechanisms are already in the draft — designer treats them as marquee elements so a scanner hits them on the way down.
- **Hero summary line as a visual anchor.** A one-sentence summary directly under the H1 (which the draft already has — "Every week those machines run slow…") functions as the VSL-substitute the book recommends for skimmers. Already in place.
- **Proof-of-how table is the scannable backbone.** The numbers (30 years / 332 videos / 8,930 subs / 27,000 followers / 30 reviews) are the single most scannable element on the page. Designer should give this section visual prominence.

### Order of operations

1. Sweep pass on Agitation, Solution mechanism, Services. (~30 minutes of editing.)
2. Send revised draft back to Dave for a second read.
3. If still feels heavy on second read, *that's* the signal that the hero hook isn't pulling — and the answer at that point is hook surgery, not body-copy slashing.

Do not execute cuts this run.
