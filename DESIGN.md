# DESIGN — CNC Training Centre

Canonical visual specification for the project. Google Stitch 6-section format. Read alongside `PRODUCT.md` for strategic context, `brief/style-guide.html` for the rendered system, and `brief/tokens.css` + `brief/components.css` for the source.

Phase 4 (Designer) and Phase 5 (Block Builder) read this file as the visual contract. Anything not here is decided by the Designer with Dave; anything contradicting this file goes back through the PM.

## 1. Overview

**Direction:** **A — The Engineering Manual.** The site reads as a thoughtful engineering reference book reinterpreted for the web — technical-drawing motifs, dimension callouts, section numbering, asymmetric editorial layouts, marginalia carrying machine / control / spec callouts. Closer in spirit to a 1970s high-end machine-tool catalogue or Ogilvy-era industrial advertising than to a 2026 SaaS landing page.

**Theme:** Light only at launch. No dark mode. Generous whitespace; cool-tinted neutrals (hue 250, toward brand-blue) — precise, not cozy.

**Voice in chrome:** Neutral. Voice lives in long-form copy (Hub articles, service-page paragraphs) only. Nav labels, footer microcopy, error pages stay clean and professional.

**Photography:** Non-load-bearing. Type + technical-drawing motifs do the visual work. When photography is used, tightly cropped fragments of real equipment only — never generic stock, never people-with-laptop.

**The two visual signatures** that make Direction A recognisable across the site:

1. **The marginalia rail** — sidebar callouts on service pages and long Hub articles carrying machine / control / spec / quick-fact information. The page edge does work. Reads as the margin of a technical paper.
2. **The dimension-callout rule-cap** — thin rule with end-ticks and a small uppercase label, marking section openings and closings. Mimics the dimension annotations on a workshop drawing. Sparing use — section breaks only.

**Supporting motifs:** numbered section headers (§02.04), tabular figures on spec readouts, em-dash bullets, decimal-leading-zero numbered lists.

**Anti-references — must not resemble:**
- Corporate SaaS landers (Vercel / Stripe / Linear style)
- OEM training brand pages (Mazak / Fanuc / Haas / Siemens corporate training)
- The current site's existing AI-generated SEO pages (Doosan, Hurco — the negative voice + visual reference)
- Generic AI-design tells: gradient text, side-stripe borders, glassmorphism, hero metric template, identical 3-card icon grids, centred-everything compositions

## 2. Colors

Colour system is OKLCH throughout. Neutrals are tinted toward brand-blue (hue 250) at a chroma of 0.005–0.030 to create subconscious cohesion. Pure black and pure white are banned. Green is reserved for video-content tagging only.

### Surfaces — paper

| Token | Value | Usage |
|---|---|---|
| `--ns-color-paper` | `oklch(98% 0.005 250)` | Primary page background |
| `--ns-color-paper-tint` | `oklch(96% 0.010 250)` | Secondary surfaces, alternate sections, marginalia |
| `--ns-color-paper-deep` | `oklch(93% 0.015 250)` | Insets, prominent panels (enquiry form) |

### Surfaces — anchor

| Token | Value | Usage |
|---|---|---|
| `--ns-color-anchor` | `oklch(22% 0.030 250)` | Footer surface, deep panels, primary button background |
| `--ns-color-anchor-soft` | `oklch(28% 0.030 250)` | Hover on anchor surfaces |

### Type

| Token | Value | Usage |
|---|---|---|
| `--ns-color-ink` | `oklch(20% 0.025 250)` | Primary text |
| `--ns-color-ink-soft` | `oklch(38% 0.020 250)` | Secondary text, body emphasis |
| `--ns-color-ink-muted` | `oklch(55% 0.015 250)` | Meta, captions, eyebrows |
| `--ns-color-ink-faint` | `oklch(70% 0.012 250)` | Placeholder, disabled |
| `--ns-color-ink-inverse` | `oklch(98% 0.005 250)` | Text on anchor / on primary |

### Rules / borders

| Token | Value | Usage |
|---|---|---|
| `--ns-color-rule-faint` | `oklch(94% 0.010 250)` | Subtle dividers |
| `--ns-color-rule` | `oklch(88% 0.012 250)` | Default border / hairline rule |
| `--ns-color-rule-strong` | `oklch(75% 0.018 250)` | Emphasised rule, input border on forms |

### Brand primary — refined CNC blue

| Token | Value | Usage |
|---|---|---|
| `--ns-color-primary` | `oklch(48% 0.16 250)` | Links, tags, secondary buttons, focus |
| `--ns-color-primary-hover` | `oklch(42% 0.18 250)` | Hover |
| `--ns-color-primary-active` | `oklch(36% 0.18 250)` | Pressed |
| `--ns-color-primary-soft` | `oklch(94% 0.04 250)` | Tinted background, selected filter chip |

### Mark · video · status

| Token | Value | Usage |
|---|---|---|
| `--ns-color-mark` | `oklch(94% 0.025 90)` | Marginalia tint, open-item flags (warm) |
| `--ns-color-video` | `oklch(58% 0.14 155)` | **Video-content tags only.** Never a second brand. |
| `--ns-color-video-soft` | `oklch(94% 0.05 155)` | Video-tag background tint |
| `--ns-color-success` | `oklch(55% 0.12 155)` | Confirmations. Sparing. |
| `--ns-color-warning` | `oklch(68% 0.13 72)` | Course-filling, alerts |
| `--ns-color-danger` | `oklch(55% 0.18 28)` | Form validation errors |
| `--ns-color-focus` | `oklch(56% 0.20 250)` | Focus rings |

### Weight rule (60-30-10)
60 % paper/tint surfaces · 30 % ink + ink-soft text · 10 % primary (links, tags, focus). Brand accents are sparing — that's what gives them weight.

## 3. Typography

**Two typefaces only. No monospace family** — tabular figures handled via `font-variant-numeric: tabular-nums`.

| Role | Face | Weights | Source | Token |
|---|---|---|---|---|
| Display | **Tanker** | 400 | Fontshare CDN (free commercial) | `--ns-font-display` |
| Body | **Synonym** | 400 / 500 / 600 / 700 | Fontshare CDN (free commercial) | `--ns-font-body` |

Fonts are loaded via `@import url("https://api.fontshare.com/v2/css?...&display=swap")` in `tokens.css`. `<link rel="preconnect" href="https://api.fontshare.com">` is recommended in document head for faster paint.

**Reflex fonts rejected** (banned across the project): Inter, Roboto, DM Sans / Serif, Plus Jakarta Sans, Fraunces, Newsreader, Lora, Crimson family, Playfair Display, Cormorant family, IBM Plex family, Space Mono, Space Grotesk, Outfit, Instrument Sans / Serif, Syne.

### Heading ramp (clamp 375 → 1440 px)

| Token | Tag | Face | Range | Weight | Notes |
|---|---|---|---|---|---|
| `--ns-heading-h1` | h1 | Tanker | 36 → 64 px | 400 | Hero scale; line-height 1.05; track -0.01 em |
| `--ns-heading-h2` | h2 | Tanker | 28 → 48 px | 400 | Section heads |
| `--ns-heading-h3` | h3 | Tanker | 24 → 32 px | 400 | Subsection heads |
| `--ns-heading-h4` | h4 | Synonym | 20 → 24 px | 600 | UI subsection (semibold body face) |
| `--ns-heading-h5` | h5 | Synonym | 18 → 20 px | 600 | UI minor subsection |
| `--ns-heading-h6` | h6 | Synonym | 16 → 18 px | 500 | Uppercase eyebrow (track 0.08 em) |

### Body ramp

| Token | Range | Usage |
|---|---|---|
| `--ns-text-large` | 18 → 20 px | Lead paragraphs |
| `--ns-text-medium` | 16 → 18 px | Body emphasis |
| `--ns-text-regular` | 16 px | Default body |
| `--ns-text-small` | 14 px | Meta, captions, UI |
| `--ns-text-tiny` | 12 px | Tags, eyebrows |

### Line heights

| Token | Value | Usage |
|---|---|---|
| `--ns-leading-tight` | 1.05 | Display headings |
| `--ns-leading-snug` | 1.2 | h3 / h4 |
| `--ns-leading-base` | 1.55 | Body |
| `--ns-leading-relaxed` | 1.7 | Long-form Hub article body |

### Letter spacing

| Token | Value | Usage |
|---|---|---|
| `--ns-track-tight` | -0.01 em | Display |
| `--ns-track-normal` | 0 | Body |
| `--ns-track-wide` | 0.08 em | Uppercase eyebrows |
| `--ns-track-extrawide` | 0.14 em | Section labels, tagline |

### Tagline + eyebrow utilities

- **`.tagline`** — 16 px, semibold, uppercase, track 0.14 em, ink-muted. Used above key section headings ("Learning Hub", "Services").
- **`.eyebrow`** — 12 px, semibold, uppercase, track 0.14 em, with leading 24 × 1 px rule. Pattern: `§02.04 Onsite training`.

### Body line length

Cap long-form prose at **65 ch** via `.prose { max-width: var(--ns-max-prose); }`. Anything wider is fatiguing.

## 4. Elevation

**No drop shadows.** Direction A defines depth via rules, borders, surface alternation, and hover-lift micro-interaction only. Decorative drop shadows are an AI-design fingerprint and are banned project-wide.

### Depth language

| Mechanism | Where |
|---|---|
| 1 px hairline rule (`--ns-color-rule`) | Default row / cell divider, card border |
| 2 px ink rule (`--ns-color-ink`) | Panel opening (e.g. enquiry form top border, table top border) |
| Surface tier change | Paper → Paper-tint → Paper-deep → Anchor creates implicit depth without shadow |
| 1 px hover translate-Y | Card lift, primary-button press feedback. The single permitted motion-as-depth signal. |
| 3 px focus box-shadow (focus colour, 18 % alpha) | Accessibility focus ring only — functional, not decorative |

### Radius scale

| Token | Value | Usage |
|---|---|---|
| `--ns-radius-none` | 0 | Buttons, callouts, headers, marginalia headers |
| `--ns-radius-tight` | 2 px | **Default.** Cards, panels, form inputs, alerts |
| `--ns-radius-soft` | 4 px | Occasional softening, badges, secondary chips |
| `--ns-radius-pill` | 999 px | **Tags + filter chips only.** Nothing else uses pill. |

## 5. Components

System primitives. The Designer assembles these into pages in Phase 4; the Block Builder converts them into SCF blocks in Phase 5. Source: `brief/components.css`. Rendered: `brief/style-guide.html`.

### Buttons

Three classes — `.btn-primary`, `.btn-secondary`, `.btn-outline`. Sizes: default / `.btn-sm` / `.btn-lg`. Modifier: `.btn-flat` (no arrow). Touch targets: 44 / 36 / 52 px min-height respectively.

- **Primary** — ink background, paper text. Anchor on hover. Forward-arrow `→` after label that nudges 2 px on hover.
- **Secondary** — refined brand-blue. Used when primary is reserved for the conversion CTA elsewhere on the page.
- **Outline** — transparent with ink border. Used as the read-more / browse secondary on homepage hero.

Never write button styles inline. Three classes only.

### Cards

`.card` — sparingly used. Bordered container, 2 px radius. Hover: 1 px lift + title underline. Internal hierarchy: meta row (tags) → title → excerpt → link-arrow. Direction A favours rules + whitespace + typography over containerised cards — reach for the article-row pattern first.

### Article rows

`.article-row` — typographic Hub listing replacement for card grids. Pattern: number (mono) / title + meta / arrow. Used for long lists (Hub index, category pages). Reads like a contents page in a technical manual.

### Spec / stat blocks

`.spec-block` — grid of numeric readouts (years, videos, day-rate, etc.). Tabular figures via `font-variant-numeric: tabular-nums`. Bordered grid, ink dividers. Used for proof points and service specs.

### Tables

`.ns-table` — bold 2 px ink top + bottom rule, hairline row dividers, hover-highlight rows. Tick marks (●) use brand-primary; em-dash (—) for no/empty. Used for capability + comparison tables.

### Form fields

`.form-input`, `.form-textarea`, `.form-select` — strong default border (`--ns-color-rule-strong`), 2 px radius, paper background, generous padding for touch targets. Focus: focus colour border + 3 px soft ring. Error: `aria-invalid="true"` switches border to danger colour.

`.form-stack` is the canonical enquiry-form layout — paper-deep surface, 2 px ink top rule, 32 px gap between field blocks, internal `.form-head` with `§ Enquire` eyebrow + display headline + sub-line. Single enquiry form is the only assembled form in the build.

Fluent Forms submit button uses `!important` overrides to beat plugin inline styles. See `components.css` `.frm-fluent-form button[type="submit"]`.

### Tags

`.tag` — intrinsic-width chip, pill radius (the only system element with pill). 12 px uppercase + track 0.08 em. Variants:

- **Default** — brand-primary-soft background, primary-active text. Active state inverts to ink.
- **`.tag-video`** — green soft-background, green-on-ink text. **Video content only.**
- **`.tag-meta`** — transparent with rule border, lowercase, no tracking. For meta like "6 min read".

### Links

- **Inline** — brand-primary, restrained underline that strengthens on hover.
- **`.link-arrow`** — "Read on" cross-link pattern with nudging arrow.
- **`.nav-link`** — horizontal nav with animated underline. Underline shows on hover and on `[aria-current="page"]`.

### Lists

`.ns-list` with three modifiers:

- **`.ns-list-bullet`** — em-dash bullet (—) before each item. Default content list.
- **`.ns-list-num`** — decimal-leading-zero monospace number (01, 02, 03…). For numbered steps. Matches the engineering-manual section-numbering aesthetic.
- **`.ns-list-plus`** — brand-primary plus mark (+) for highlight / positive lists.

### Quote / pull-quote

`.pull-quote` — display-font, 1 px ink left rule, padded left. Used for testimonials and high-impact lines in Hub articles. **No quote-mark glyphs** — typography carries it.

### Breadcrumb

`.breadcrumb` — uppercase 12 px, track 0.08 em, soft `/` separators, ink-muted with current page in ink-semibold. Used on pages two-or-more levels deep.

### Pagination

`.pagination` — square buttons (40 × 40 px min), 2 px radius, monospace numbers (tabular figures). Current page inverted (ink fill, paper text). Prev / next as text arrow links. Used on Hub list pages.

### Alerts / notices

Four variants — `.alert-info`, `.alert-success`, `.alert-warning`, `.alert-danger`. Bordered (never background-filled — restraint over loudness). Used in-flow on pages, never as floating toasts. Icons inside `.alert-icon` carry `aria-hidden="true"`.

### Marginalia

`.marginalia` — bordered side panel for spec / control / quick-fact callouts. Header `.marginalia-head` carries uppercase label. Body is a `<dl>` of dt/dd pairs. **Direction-A signature pattern.** Used on service pages and long Hub article spreads.

### Rule-cap (technical-drawing divider)

`.rule-cap` — thin rule with end-ticks (●) and optional centred label, mimicking a workshop drawing's dimension callout. **Direction-A signature pattern.** Sparing use — section openings + closings, never as a divider within a single section.

### Section heading pattern

`.section-head` + `.section-num` — every major section opens with a 4-rem rail bearing the section number (uppercase mono, 12 px, 1 px top rule). Then the section title and description on the right column.

### Eyebrow utilities

`.tagline` (16 px uppercase) for major section headings; `.eyebrow` (12 px uppercase with leading 24 × 1 px rule) for sub-sections and panel openings.

### State patterns

- **Empty filter result** — `.state-blank` eyebrow + display title + body line + actions. Stays in voice for the chrome rule (neutral, not sweary).
- **Loading list** — skeleton rectangles in paper-tint, varying widths. No spinner.
- **Form submit pending / success / error** — submit button stays in place (`aria-disabled`, label "Sending…"), success replaces form with alert-success, error pairs `aria-invalid` per field with summary alert-danger above the form.

### Microcopy rules

- Buttons use specific verbs ("Contact David", not "Submit").
- Form labels are sentence-case, no colon ("Your name", "Which machines or controls?").
- Placeholders give real-world examples ("Mazak Integrex i200 + Hurco VM10", not "Enter model").
- Error messages tell the user what went wrong AND what to do.
- Numbers always digits in UI ("5 working days"). £ prefix, no decimal on whole pounds.
- Banned phrases: "Submit your enquiry today!", "Click here", "Learn more", "Get started", "Read more".

### Iconography

**Library:** Lucide (MIT). 1.5 px stroke, rounded line-caps, 24 px native (scales 16 / 20 / 32 without redraw). Single-tone via `currentColor`. Used sparingly: arrows for direction, marks for status. Never as decoration above headings.

Inline icons carry `aria-hidden="true"` when adjacent text already describes the action.

### Spacing scale (4 pt)

| Token | px | Usage |
|---|---|---|
| `--ns-space-2xs` | 4 | Component-internal nudge |
| `--ns-space-xs` | 8 | Tag padding, button gap, label → input |
| `--ns-space-sm` | 12 | Small component gaps |
| `--ns-space-md` | 16 | Default sibling gap |
| `--ns-space-lg` | 24 | Paragraph spacing, form two-column gap |
| `--ns-space-xl` | 32 | Subsection gap, form field stacking |
| `--ns-space-2xl` | 48 | Section gap, section-head margin |
| `--ns-space-3xl` | 64 | Major section gap |
| `--ns-space-4xl` | 96 | Page-block gap |
| `--ns-space-5xl` | 128 | Long-page section break |

Use `gap` for sibling spacing — never margin between siblings.

### Container widths

- **Page edge** — `padding-inline: clamp(1.25rem, 3vw, 2.5rem)`
- **Content** — `max-width: 1280px` (`--ns-max-content`)
- **Prose** — `max-width: 65ch` (`--ns-max-prose`)
- Full-bleed allowed for hero technical-drawing motifs and anchor-tier footer only.

### Section rhythm

Pages alternate surface tier: **paper → paper-tint → paper → anchor**. Never two adjacent sections on the same tier without an explicit rule divider. Anchor tier appears at most once per page (typically the footer).

### Breakpoints

- 375 px — mobile single column
- 700 px — tablet two-column starts (article-row, form-grid-2, spec-block 3-col)
- 900 px — desktop asymmetric splits (hero, marginalia)
- 1280 px — max content width

Component-level responsiveness via container queries (`@container`); page layout via viewport queries.

### Motion

| Token | Value | Usage |
|---|---|---|
| `--ns-dur-fast` | 120 ms | Hover, button-arrow nudge, link underline |
| `--ns-dur-base` | 200 ms | Panel transitions, accordion open/close |
| `--ns-dur-slow` | 320 ms | Page-section reveal, hero entrance |
| `--ns-ease-out` | cubic-bezier(0.16, 1, 0.3, 1) | Default entrances + hovers (out-quart) |
| `--ns-ease-in-out` | cubic-bezier(0.65, 0, 0.35, 1) | Symmetric open/close |

Animate `transform` and `opacity` only. Height changes use `grid-template-rows` transitions. No bounce / elastic easing. `prefers-reduced-motion: reduce` zeros every duration via the tokens cascade.

### Accessibility

- WCAG 2.1 AA across the project.
- Body text contrast passes AAA; secondary passes AA Large.
- 2 px focus outline + 2 px offset on every interactive element.
- Tab order matches reading order. Skip-to-content first nav item.
- Real `<button>` / real `<a href>` — no role-faking.
- Mega menus open on click, never hover-only.
- Form inputs have associated `<label>`. Errors linked via `aria-describedby`. `aria-invalid="true"` on errored fields.
- Decorative icons hidden from screen readers.

### Performance

- Two fonts (Tanker + Synonym) via Fontshare CDN, `display=swap`, `preconnect` to `api.fontshare.com`.
- Images WebP, workshop fragments ≤ 80 KB at 2×, in-article ≤ 60 KB.
- No autoplay video. YouTube embeds lazy-loaded thumbnail-first.
- Zero JS at first paint on static pages.
- `tokens.css` + `components.css` inlined as critical CSS at build time. Tailwind utilities layered for page assembly in Phase 5.
- Forbidden: hero autoplay, heavy JS-driven scroll animation, third-party chat, web-font fallback flash > 100 ms.

## 6. Do's and Don'ts

### Do

- Use tokens for every colour, type size, spacing, radius, motion — no hard-coded values.
- Name actual machines, controls, problems in body copy. Specificity is the proof.
- Use the marginalia rail for spec / control / quick-fact callouts on service pages and long Hub articles.
- Use rule-cap dividers at section openings and closings, sparingly.
- Cap body line length at 65 ch.
- Reach for type, rule, and surface tier before reaching for a card or container.
- Reserve green for video-content tags only.
- Make focus states visible on every surface.
- Use `gap` for sibling spacing, never margin.
- Animate `transform` + `opacity` only. Use ease-out cubics. Honour `prefers-reduced-motion`.

### Don't

- Use the reflex font set (Inter, Roboto, DM Sans, Plus Jakarta, Fraunces, Newsreader, Lora, Crimson, Playfair, Cormorant, IBM Plex, Space Mono, Space Grotesk, Outfit, Instrument *, Syne).
- Use gradient text. Anywhere. Ever.
- Use `border-left` accent stripes wider than 1 px on cards, list items, or callouts.
- Use cyan-on-dark or purple-to-blue palettes.
- Use identical 3-card icon grids stacked section after section.
- Centre everything. Asymmetric editorial layouts are the default.
- Use the hero metric template (big number / small label / supporting stat / gradient accent).
- Use glassmorphism, decorative drop shadows, or neon accents.
- Use generic stock photography. People-with-laptop is an automatic fail.
- Add a second brand colour. Green is reserved for video tags, nothing else.
- Write voice into chrome (nav, footer, error pages). Voice lives in long-form only.
- Animate width, height, padding, or margin. Transform + opacity only.

---

**Version:** 1.0 — 2026-05-15
**Source files:** `brief/tokens.css`, `brief/components.css`, `brief/style-guide.html`
**Related:** `PRODUCT.md`, `brief/design-brief.md`, `strategy/strategy.md`, `strategy/cnctc-proposed-sitemap.md`
