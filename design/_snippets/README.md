# design/_snippets/

Canonical building blocks lifted from already-signed-off pages. Page subagents read these directly and paste-in verbatim. The contract: **markup + classes are byte-identical across pages — content swaps only.**

## hub-block-canonical.html

The Learning Hub preview block. Source of truth lifted from `design/programming-services.html` (originally "§ 08 — Related from the Hub", with the `§ 0X — ` pretitle stripped per the project-wide no-section-numbers constraint).

**Where the CSS lives:** `design/page-home.css` (lines ~1619–end). Every host page-CSS file that uses this block must either `@import "./page-home.css"` for the `.hub*` rules or the page must link `page-home.css` alongside its own `page-*.css`. Do **not** duplicate the CSS into page-specific files.

**What's safe to ship:**
- `.hub-stats` figures (300+ articles, 332 videos, 8,930 subs, since 2014) — confirmed in `copy/learning-hub.md`.
- `.hub-filters` tag list — canonical order, do not re-sort.
- `.hub-cta` label "Browse the Hub" — locked.

**What's a real `[GAP]`:**
- The featured card (eyebrow, tag, title, dek, min-read).
- The two secondary cards (tag, title, meta).
- The h2 `hub-title` and `hub-lede` — these come from each page's `copy/{slug}.md`.

Do not invent content to fill any `[GAP]`. Surface them to the parent NOR-53 summary at handoff.

## Cross-page constraints reaffirmed here (one place to look):

1. **No section numbers anywhere on page bodies.** Kill `<span class="ghost-num">` and `<span class="sec-pretitle">§ 0X — Label</span>` constructs. Where a pretitle is genuinely useful, keep the label only: `<span class="sec-pretitle">Related from the Hub</span>` is allowed; `§ 08 — Related from the Hub` is not.
2. **Drawer nav `§ 00`–`§ 07` numbering STAYS.** That's a navigation ordinal on the locked drawer pattern, not page-internal section numbering. Home is the locked reference and keeps them. Identical drawer across every page.
3. **Marginalia rail removed project-wide.** Home is done — replicate on every other page. Inline asides/TOCs may stay where the layout genuinely needs them (e.g. hub article), but the page-margin decorative rail is dead.
4. **Hero line-art (`.fx-machine-hero`) and the mobile nav-toggle never coexist in the same viewport.** `.fx-machine-hero` is `display: none` below 900px (see `flourishes.css` § 8). `.nav-toggle` is `display: none` at ≥900px (see `page-home.css` line 170). No overlap is structurally possible. Page subagents verify in preview at 375px and ≥900px and note "verified" — no positioning fix required unless a new page introduces line-art outside this contract.
5. **No SaaS-template hover/motion on cards.** Hairline border-colour shifts only. See `learnings.md` 2026-05-17.
6. **Voice:** first-person singular. "David" — never "David Smith". See `learnings.md` 2026-05-16.

— Logged 2026-05-18 by the designer during the Phase 4 revision dispatch prep step.
