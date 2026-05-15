# Design Brief — CNC Training Centre

Output of `/shape`. Pressure-tested against `PRODUCT.md`. Hands off to the tokens + components + style-guide stage. Read alongside `PRODUCT.md` and `strategy/strategy.md`.

## 1. Feature summary

A full-website rebuild for an independent CNC trainer with 30 years on every major control. The site has two jobs: route two distinct buyers (engineering decision-makers and individuals starting a CNC career) to the right service quickly, and re-home a substantial content archive (~200 articles, 332 videos) into a Learning Hub that drives the existing enquiry flow. Visual register is industrial-premium: type-led, generous whitespace, technical-drawing motifs, **no photography load-bearing**. Plain-spoken, tooled-up, quietly-premium.

## 2. Primary user action

Across the site, the single most important user action is **"Make an enquiry to David"** — phone, form, or email. Every page has a path to this action; the path's prominence varies by context (see CTA architecture below). The Learning Hub's secondary job is qualification: it earns the right enquirer rather than chasing all of them.

## 3. Design direction

Industrial-premium, type-led, photography-light.

The site looks more like a thoughtful editorial publication for engineering professionals than a training-company brochure. Closer in spirit to an old-school engineering reference manual reinterpreted on the web than to a SaaS landing page. Technical-drawing aesthetics (line work, callouts, spec readouts) appear as visual elements in their own right — section dividers, hero treatments, sidebar marginalia, footer ornament. Photography is optional, not load-bearing: when used, it's a tightly-cropped fragment of a machine, a fixture, a control panel — never a smiling engineer with a laptop.

The premium signal comes from restraint: a tight palette, two intentional typefaces, generous spacing, restrained motion. The credibility signal comes from specificity: actual machine names, actual control names, actual problems — surfaced in copy AND as visual elements (spec callouts, control logos as small marks, technical diagrams).

Mood reference (without using a banned font): closer to *Monocle* magazine's tooling section, *Wallpaper*'s engineering features, the documentation of a high-end metrology firm — than anything from the SaaS or training-provider category.

## 4. Layout strategy

- **Asymmetric editorial grid** on marketing pages. Service pages have a clear primary column with sidebar callouts (specs, controls covered, quick FAQ). Never the symmetric 3-card row template.
- **Hero**: split editorial layout, text-led on the left (oversized but calm display type), technical-drawing or machine-fragment element on the right. No hero metric template. No people.
- **Hub index**: search-first. Filter chips for brand/control as the primary axis. Latest content + most-popular strips as secondary. Article cards are text-dominant with small format/length indicators (article • 6 min, video • 12 min).
- **Hub article page**: long-form-friendly. ~65-75ch body width, generous leading. YouTube embeds inline. Right-hand or end-of-article cross-link to the relevant service (the "earn the conversion" piece).
- **Service pages**: hero + "Who this is for / Who this isn't for" panel + What's included + How it works + Pricing transparency + Controls/machines covered (visual: logos as small marks, not oversized) + FAQ + CTA. No card-grid monotony.
- **Service overview pages** (Onsite, Classroom, Programming Services): a list of detail variants surfaced as a clear typographic index, not as icon-card grid. Inspired by a contents page in a technical manual.
- **Navigation**: desktop = clean horizontal bar with click-to-open mega menus for the services that have sub-items (Onsite, Classroom). Mobile = real menu toggle with stacked panels, large tap targets. Always shows "Contact David" CTA at the top right.

## 5. Key states

- **Default** — populated content, calm reading experience.
- **Empty** — only relevant for the Hub when a filter combination has zero results. Show a brief, in-voice note: "Nothing here yet — try {brand} or {control}." No illustration.
- **Loading** — Hub search/filter results need a fast skeleton state (not a spinner). Service pages are mostly static, no loading state.
- **Error** — 404 page stays neutral per the chrome decision: "Page not found. Try the Learning Hub or the homepage." No "Bollocks". The voice lives in articles, not chrome.
- **First-time visitor** — sees both buyer routes on the homepage within 5 seconds (one section for companies, one for individuals).
- **Returning visitor / Hub reader** — has likely arrived from an article via search. The article must clearly cross-link to the relevant service.

## 6. Interaction model

- **Hover**: subtle lift on interactive cards (1-2px translate, no shadow inflation). Underline-on-hover for inline links. Filter chips highlight on hover, commit on click.
- **Click**: nav items open mega menus on click (not hover — kinder on touchpads and accessibility). Filter chips toggle in/out of the active set.
- **Scroll**: subtle parallax on the technical-drawing hero motif (5-10% offset only) — restraint over flash. No scroll-triggered animations on copy.
- **Motion budget**: motion intensity capped per Impeccable at ≤6. Use motion for state change (filter applied, menu open, page load), never for decoration. Reduced-motion users get no motion at all, just the end state.
- **Form**: single enquiry form, fields are name / company (optional for Buyer B) / phone / email / message. Service or course pre-filled by referring page. Submit → "We'll be in touch within a day. Call David direct: 07834 858 407" — direct, no "Thanks for reaching out!"

## 7. Content requirements

- **Display copy** sits in service-page heroes and Hub article headlines. Calm, technical, oversized but not shouting.
- **Body copy** comes from the Copywriter in Phase 3a. Brief inputs assume the voice samples in `strategy/strategy.md` and `PRODUCT.md`.
- **Microcopy** stays neutral per the chrome decision: clear button labels ("Contact David", "Browse the Learning Hub", "Apply for this course"), specific form placeholders ("Which machines or controls?"), direct error messages.
- **Tags / labels** for the Hub: brand names (Fanuc, Heidenhain, Mazak, Hurco, Haas, Brother, Siemens, Sliding Head, Edgecam, Doosan), skill level (Beginner / Setter-Operator / Programmer / Advanced), format (Article / Video / Guide), topic (Programming / Setup / Parameters / Macro / Tips). Tags are tight, intrinsic-width, never stretched.
- **Eyebrows** on sections — small caps, set sparingly above key section headings. ("Services", "Learning Hub", "Who this is for".)

## 8. CTA architecture

Context-dependent, locked:
- **Service pages**: one CTA, repeated — "Contact David". No "Learn more about the Hub" competing for attention.
- **Hub articles**: one CTA at end — cross-link to the relevant service ("Want training on this? Onsite Fanuc Training →"). No site-wide "Contact David" hammer.
- **Homepage**: two visible paths — "Contact David" (for the ready-now buyer) and "Browse the Learning Hub" (for the read-more buyer). Both visually equal at the hero, not one shouting over the other.
- **Hub index**: primary action is filter/search, not contact. Contact stays in the chrome only.

## 9. Recommended references

For the implementer (token + components + style guide build), most-load:
- `impeccable/reference/typography.md` — picking the two non-reflex fonts; the type pairing is the single biggest direction-locking decision.
- `impeccable/reference/color-and-contrast.md` — OKLCH palette construction; tinted-neutrals scheme; 60-30-10 weight; reserving green for video tags only.
- `impeccable/reference/spatial-design.md` — asymmetric editorial layouts; container queries on cards; 4pt scale with semantic tokens.
- `impeccable/reference/motion-design.md` — restraint check; reduced-motion handling.

## 10. Open questions

For the implementer to resolve during tokens + components build (Stage 2), then bring back to Dave:

- **Type pair**: which two non-reflex faces deliver the industrial-premium tone? Will pitch 2-3 candidate pairings with rendered previews. Dave picks.
- **Decorative motif language**: what does the "technical-drawing" element actually look like in practice? Calliper marks? Section-line callouts? G-code fragments as section dividers? A single agreed motif gets used consistently across the site.
- **Brand-blue exact value**: the current site's blue is locked as the anchor, but the OKLCH value needs measuring and tuning for the new palette (the existing logo blue may be too saturated for body text contrast). Will propose a refined value.
- **Green-for-video treatment**: a tag colour only, or a full secondary brand colour for video-related UI surfaces? Defaulting to tag-only unless Dave wants more.
- **Logo treatment**: is the existing CNC Training Centre logo coming through as-is, or does it need a refresh? Affects nav layout and how the wordmark sits next to the new type.

---

## Direction proposals — next step

With this brief locked, three distinct visual directions get pitched (Stage 1 of the brief flow). Each is a different way to interpret "industrial-premium, type-led, photography-light" — different enough that picking one closes off the others. Dave picks one (or a synthesis) before any tokens get written.
