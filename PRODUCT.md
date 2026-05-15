# PRODUCT — CNC Training Centre

This is the strategic foundation every design and copy decision is pressure-tested against. Written at the start of the Design Brief phase. The Designer (phase 4) and the Copywriter (phase 3a) both read it as canonical. If the answer to a design question isn't here, surface to Dave — don't guess.

## Register

**Brand.** For NS websites, design IS the product. The visual layer is what closes (or loses) the sale. Every token, type pair, image crop, and motion choice carries brand load. Production-grade aesthetics, not utility UI.

## Users

Two faces of one buyer — both arrive at the site looking to close a CNC skills gap.

### Buyer A — engineering company decision-maker
MD, production manager, or engineering manager at an SMB engineering company (typically 5-50 staff). Owns CNC machines worth £50k–£500k. The machines aren't producing what they should because the people running them lack the skills.

- **Context of use**: at a desk between shop-floor visits, on a phone during a coffee break, occasionally late at night when "we really need to sort this" hits.
- **Job to be done**: find a trainer who knows their specific machine + control, costs less than the OEM, and can actually deliver. Wants to feel confident before they pick up the phone — not pitched at.
- **Emotional state**: mildly guilty (should've sorted it earlier), mildly suspicious (OEMs gouge; YouTube is a mess), pragmatic. Allergic to marketing fluff.
- **What they want from the site**: "Does he know my machine? Roughly what's it cost? Can I trust him?" In that order.

### Buyer B — individual wanting a CNC career
20s–40s. Either stuck at operator level wanting to move to programming, or breaking into CNC from a related trade (manual machinist, fabricator, apprenticeship). Pays out of their own pocket or gets the employer to sponsor.

- **Context of use**: phone, evening, kitchen table. Comparing CNC Training Centre against college courses and OEM open courses.
- **Job to be done**: find a course that's hands-on, certificated, and gets them employable on real-world kit.
- **Emotional state**: ambitious, careful with money, wary of being sold to.
- **What they want from the site**: "Will this course actually get me a job? When is it? How much? Is it the right level?"

### Common ground
Both audiences are technical, suspicious of marketing copy, and trust people who clearly know their craft. Both will read a long article if it answers their actual question. Neither will tolerate a hero with a stock photo of someone in a hard hat smiling at a laptop.

## Voice

Three words: **plain-spoken, tooled-up, quietly-premium.**

- **Plain-spoken** — David's voice. No corporate hedge. Contractions. Short sentences when a short sentence is enough. Will swear in long-form content (Hub articles) where it lands; tighter in service-page copy where the buyer is closer to enquiry.
- **Tooled-up** — every paragraph carries technical weight. Names actual controls (Fanuc, Heidenhain, Siemens, Mazatrol), actual machines (sliding head, Brother Speedio, Mazak Integrex), actual problems (G73 cycles, cutter compensation, macro variables). Specificity is the proof of authority.
- **Quietly-premium** — the design carries the premium signal, the copy doesn't have to. We do not write "premium". We write tightly, lay it out generously, and let the reader feel it. Premium without "premium".

### Voice signatures (gold standard)
From David's existing articles — the writing should sound like this, not like a sanitised version:

> "I get really pissed off now if I google something to do with CNC machines and I don't find my own article."

> "You know that feeling when you're stood in the middle isle at Aldi holding a 40mm drill that's about a meter long and you're trying to convince yourself that you need it cos it's only £4.99? Well that sums up my relationship with this NOMURA CNC sliding head machine. I fuckin want one."

> "My advise if you have the work and the bollocks for it then get one, just call me in and we'll have some fun together getting it up and running."

The new site keeps that energy on Hub articles. Service pages tone it down a touch but never sanitise — they still sound like David, not like David's marketing department wrote them.

## Anti-references

What this site MUST NOT resemble. If a draft starts drifting toward any of these, stop and re-route.

### 1. Corporate SaaS landers
Vercel-clone heroes, gradient text, identical 3-card icon grids, "Trusted by 10,000+ teams" badges, hero metric template (big number / small label / supporting stat), centred-everything layouts, generic Unsplash photography. **Reason**: this site is the opposite of SaaS — physical, tooled, human, regional. Looking like Linear or Stripe destroys the differentiation.

### 2. OEM training brand pages
Mazak, Fanuc, Haas, Siemens, Heidenhain corporate training pages. Cool blue gradients, oversized brand logos, glossy product photography, "world-class training solutions" copy, course-brochure layouts. **Reason**: CNC Training Centre's whole positioning is "the independent alternative to the OEMs". Looking like an OEM erases the position.

### 3. The site's own existing AI-generated SEO pages
The Doosan and Hurco pages on the current cnctrainingcentre.com — clearly AI-written, corporate-flat, keyword-stuffed, no voice. **Reason**: literally what we're rebuilding away from. The voice samples above are the standard; anything that drifts toward the Doosan/Hurco register is a fail.

### 4. AI-design fingerprints (Impeccable absolute bans)
- No gradient text
- No cyan-on-dark or purple-to-blue palettes
- No identical 3-card icon grids stacked section after section
- No `border-left` accent stripes >1px on cards or callouts
- No glassmorphism, no glowing accents, no decorative drop-shadows
- No centred-everything compositions
- No hero metric template
- No stock photography of generic engineers
- No monospace as shorthand for "technical"
- No Inter, Roboto, DM Sans, Plus Jakarta, Fraunces, Newsreader, Lora, Crimson, Playfair, Cormorant, IBM Plex, Space Mono, Space Grotesk, Outfit, Instrument anything, Syne. The reflex fonts. Look further.

## Aesthetic direction

**Locked direction: A — The Engineering Manual.** (Chosen 2026-05-15 from three pitched directions.)

The site reads as a thoughtful engineering reference book reinterpreted for the web. Technical-drawing motifs do load-bearing visual work — section dividers as dimension callouts, sidebar marginalia carrying machine specs and quick facts, section numbering as a structural device. Generous left-rail whitespace. The site feels closer to Ogilvy-era industrial advertising and high-end documentation than to a 2026 SaaS landing page or a training-provider brochure.

What this means in practice:

- **Hero treatments**: type-led with a technical-drawing element on the right (calliper marks, dimensional callouts, schematic line work). No photography load-bearing.
- **Section dividers**: dimension annotations + section numbers + thin rules. Not blocks of negative space.
- **Sidebar pattern**: marginalia carrying machine names, control logos, spec readouts. The page edge does work.
- **Hub article pages**: long-form-friendly with marginalia for related machines / controls / linked articles. Reads like a technical paper, not a blog post.
- **Service pages**: structured manual-style — controls covered as a small mark grid, "what's included" as a tight specified list, pricing transparent in a dedicated panel.
- **Decorative motifs**: dimension annotations, section numbering, thin rules, technical-drawing-style line marks. Used sparingly, with intent. Not as ornament.

Dave's hard constraints (locked):
- **Theme**: light. No dark mode at launch. Generous breathing space.
- **Content density**: must scale to 200+ articles + 332 videos in the Hub without oppressive density at the index level or sparse-feeling service pages.
- **Navigation**: simple, fast, content-findable. Both buyers reach the right page in two clicks.
- **Brand blue stays as primary**. Green reserved for video tags only — never a second brand colour.
- **Risk to manage**: Engineering-Manual direction can read cold if not warmed. Body copy in David's voice does the warming; visual restraint stays.

## Design principles

Five rules every later design decision tests itself against. If a decision violates one of these without a written reason, it goes back.

1. **Specificity is the proof.** Every page names actual machines, actual controls, actual problems. Generic = corporate = fail. The site looks more credible the more specific it gets.

2. **Restraint is the premium signal.** Generous whitespace, narrow accent palette, restrained motion. The buyer feels "this is well-run" without reading the word "premium". Quietly-premium > loudly-luxurious.

3. **Content earns the conversion.** Service pages do not oversell. The Hub does the qualifying. By the time a Buyer A reaches the enquiry form, they've already read three articles and decided. Design supports that funnel — clear cross-links from articles back to relevant services, never the other way round.

4. **Both buyers, one site.** Layouts surface routes for both audiences without splitting the site in two. A company decision-maker and a self-funded learner should both see themselves on the homepage within five seconds.

5. **Designed for the workshop, not the boardroom.** High contrast, large touch targets, scannable on a phone in a noisy environment. The site looks elevated but reads functional. WCAG 2.1 AA minimum.

## Accessibility

WCAG 2.1 AA across the board. Standard NS bar. No special workshop-context concessions unless raised later.
