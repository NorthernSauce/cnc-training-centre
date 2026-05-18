<!-- Learning Hub copy - 2026-05-18 - copyseller v3 (browse layer, off assembly line)
     Site-type: multi-product router.
     Role: browse layer. NOT on assembly line. Articles each carry routes.
     NO final CTA band per Hub design (visitor in browse mode).

     Hub is a functional/utility page, not a sell page. Wiebe formulas
     apply only to the visible Hs. Most body content is functional
     microcopy (filter labels, empty states, etc.).

     Hard Rule 11: every visible H labelled.
     Hard Rule 12: em-dash grep = 0.
-->

# Learning Hub

> **Page purpose:** Browse mode. Visitor arrives with a specific machine, control, or problem and needs the right article in front of them fast. The page lets the content speak rather than selling on top of it.
> **Primary CTA:** None. Visitor is in browse mode. Footer carries the global contact route.
> **Awareness:** Mixed. Most readers problem-aware (specific question, hunting answer). Some solution-aware and inside David's content world.
> **Framework:** Functional. No persuasive framework at page level (per Hub design).
> **Last updated:** 2026-05-18

---

## Hero

**Eyebrow:** Learning Hub. 300+ articles and videos since 2014.

<!-- H1: Formula B from Ch. 10 (curiosity gap). Invites filter use immediately. Distinct from home Hub H2 ("If you've got a question, I've probably written about it"). -->
### What machine are you standing in front of?

<!-- Lede: functional. Hub is a tool, not a sell page. Battlefield Principle doesn't apply. -->
Filter by control, machine, or job. Read what you need. No signup, no paywall.

**Marginalia (machine-card sidebar):**
- **Articles:** ~200 written pieces
- **Videos:** 332 on YouTube, embedded throughout the hub
- **Writing since:** 2014. Monthly minimum.
- **Filter by:** control, machine brand, skill level, content type, topic
- **Free:** every piece. No paywall, no signup.

---

## Find the answer to the thing you're standing in front of.

<!-- H2: Bucket A Problem hook. Existing copy. Strong, keep. Frames the filter UI as a problem-solving tool. -->

**Filter heading:** Filter the library

**Filter groups (combinable):**

- **Control**
  Fanuc, Heidenhain, Siemens, Mazak / Mazatrol, Hurco, Haas, Brother, Fagor, XYZ

- **Machine brand**
  Mazak, Hurco, Brother, Haas, Doosan, Matsuura, Miyano, Hardinge, Biglia, Shibaura, Toshiba, Citizen, Star, sliding head (Swiss-type)

- **Skill level**
  Beginner, Setter / operator, Programmer, Advanced

- **Content type**
  Article, Video, Guide

- **Topic**
  G-codes, M-codes, Parameters, Macro programming, Setup, Tooling, Edgecam, Tips & tricks, Cost & pricing

**Search input placeholder:**
*Search 300+ articles…*

**Result count label:**
*Showing [N] of [Total]. Reset filters.*

**Empty state (no results):**
*No articles match those filters. Try fewer filters, or clear them all to see the full library.*

**Loading state:**
*Loading…*

---

## Article card content (designer / developer spec, not rendered as a visible section)

Each article card surfaces:

- **Title.** Full article title, two lines max before truncation.
- **Dek.** One-line description. Typically the article's opening sentence or a summary line.
- **Control tag.** The machine control the article covers (Fanuc, Heidenhain, etc.). Colour-coded per the locked tag palette.
- **Content type tag.** Article / video / guide. Video tag is green per the brand rule. Article and guide tags use the standard tag treatment.
- **Read time.** For articles ("8 min read"). For videos, the video duration ("12:34").
- **Date.** Publish date (relative for recent pieces, full date for anything older than a month).

The CMS pulls all of this. Designer specs the card; copywriter doesn't write per-card content.

---

## If you don't know where to start, start here.

<!-- H2: Formula A from Ch. 10. Invitation. Distinct from all other Hs across the site. -->

**Strip label:** Most read this week

A small strip at the top of the grid surfacing two or three pieces. The most-read in the last week, the latest, or a hand-picked "start here" set for visitors landing cold.

**Card content:** same shape as the regular article cards.

> [GAP. Dave to identify featured articles for the strip. Options: (a) the three most-read in the last 7 days, pulled automatically; (b) a hand-picked rotating set updated quarterly; (c) two "start here" cards for the two buyer faces. One for companies, one for individuals starting a CNC career. Decision affects the CMS spec.]

---

## Next page. Or jump to where you need.

<!-- H2: Bucket E functional broetry. Pagination heading. Distinct from other Hs. -->

**Pagination controls:**
- **Previous page** (disabled on page 1)
- **Page indicator.** "Page 1 of 17"
- **Next page** (disabled on the last page)

**Alternative (designer's call):** a "Show more" button that loads the next batch inline rather than paginating. Either works. The wireframer / designer pick one and apply it consistently.

---

## Notes for designer (internal, not rendered)

### The filters are real, not decorative.

A previous designer learning on this project: pseudo-filters that look real but don't actually filter the cards are banned. Visitors land on this page with a specific question ("show me everything on Fanuc macro programming") and the filters either deliver that or they fail.

Concretely:
- **The filter UI must be real.** Clicking "Fanuc" filters the cards client-side and updates the result count.
- **Multiple filters combine.** "Fanuc" + "Macro programming" + "Article" returns only Fanuc macro programming articles.
- **Search filters cards client-side too.** Typing "G73" in the search input filters cards as you type. No full-page reload.
- **Filter state survives navigation.** Clicking into an article and hitting Back returns the visitor to the same filtered state.
- **Empty state shows the message above.** Not a blank grid.

This is the most-used page on the site once content migration is done. It needs to work like a working tool, not a brochure.

---

## What this page does NOT have (deliberately absent, internal note)

- **No final CTA band.** Visitor is in browse mode. Routing them to the enquiry form here would interrupt the discovery flow, and content does the qualifying anyway. The footer (locked, global) carries the contact route.
- **No services preview / cross-sell band.** Service cross-links sit on individual articles ("Read about Fanuc macro programming. Onsite Fanuc training.") where they're contextual. On the hub index, no cross-sell.
- **No newsletter signup.** Not part of the funnel for this project. Hub content drives enquiries direct.

---

## Notes / open questions

- **[GAP featured strip]** See inline GAP. Three options for Dave to pick from before the CMS spec is locked.
- **[GAP tag taxonomy]** Tag taxonomy sourced from learnings.md (primary axis: machine/control brand; secondary: skill level, content type, topic). Exact list of brands and topics in the filter UI may need pruning once 200-article migration is mapped. Some brands may have only a handful of articles and not warrant a filter chip. Confirm with Dave / developer once migration data is in.
- **[For wireframer]** Hero pairs left-column copy with right-column marginalia (same pattern as home / onsite / about). Then filters band, then card grid, then pagination. No CTA band at the bottom.
- **[For wireframer]** Filters band: filter group labels stack vertically as sticky sidebar on desktop. Horizontal pill row on mobile.
- **[For wireframer]** Card grid uses the canonical Hub preview block from the home page, scaled up. Same card shape, same tag treatment. Don't invent a new card variant.
- **[For designer]** Video content type tag is green per the brand rule (locked in PRODUCT.md: green reserved for video tags only).
- **[For developer]** Search and filter must work client-side without full-page reload. Filter state in URL so a filtered view is shareable and bookmarkable.

---

Built per: The Copyselling System by Joanna Wiebe (BenBella, 2026)
References consulted: 16, 17 (most of Wiebe's system doesn't apply to a browse-mode utility page; Hard Rules 11 + 12 still bind on visible Hs)
NS additions applied: Hub as off-assembly-line browse layer per `references/15-channel-strategy.md`; web-execution constraints; humaniser hard gate
Dave-overrides applied: Hard Rule 8 (web length wins)
Book-fidelity audit: PASS
Humaniser audit: PASS (em-dash count: 0)
