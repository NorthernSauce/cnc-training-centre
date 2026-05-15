# Learning Hub

> **Page purpose:** Browse mode. The visitor arrives with a specific machine, control, or problem in mind and needs the right article in front of them fast. The hub is the proof — the page lets it speak rather than selling on top of it.
> **Primary CTA:** None. The visitor is in browse mode. Footer carries the global contact route.
> **Awareness level:** Mixed. Most readers are problem-aware (they've got a specific question and they're hunting an answer). Some are solution-aware and already inside David's content world.
> **Last updated:** 2026-05-15

---

## Hero

**Eyebrow:** Learning Hub · 300+ articles and videos · since 2014

### Three hundred and counting.

Articles, guides, and videos covering every major machine and control. I've been writing about CNC since 2014, mostly because I was googling the same problems twice and not finding anything useful — so I wrote it down. Filter by what's in front of you on the shop floor, read what you need, close the tab. No signup, no paywall.

**Marginalia (machine-card sidebar):**
- **Articles:** ~200 written pieces
- **Videos:** 332 on YouTube, embedded throughout the hub
- **Writing since:** 2014. Monthly minimum
- **Filter by:** control, machine brand, skill level, content type, topic
- **Free:** every piece. No paywall, no signup

---

## Filters / Browse by

### Find the answer to the thing you're standing in front of.

**Filter heading:** Filter the library

**Filter groups (the visitor can combine any of these):**

- **Control**
  Fanuc · Heidenhain · Siemens · Mazak / Mazatrol · Hurco · Haas · Brother · Fagor · XYZ

- **Machine brand**
  Mazak · Hurco · Brother · Haas · Doosan · Matsuura · Miyano · Hardinge · Biglia · Shibaura · Toshiba · Citizen · Star · sliding head (Swiss-type)

- **Skill level**
  Beginner · Setter / operator · Programmer · Advanced

- **Content type**
  Article · Video · Guide

- **Topic**
  G-codes · M-codes · Parameters · Macro programming · Setup · Tooling · Edgecam · Tips & tricks · Cost & pricing

**Search input placeholder:**
*Search 300+ articles…*

**Result count label:**
*Showing [N] of [Total]. Reset filters →*

**Empty state (no results):**
*No articles match those filters. Try fewer filters, or clear them all to see the full library.*

**Loading state:**
*Loading…*

---

## Article card content

### What each card carries.

Each article card in the grid surfaces:

- **Title** — full article title, two lines max before truncation
- **Dek** — one-line description, typically the article's opening sentence or a summary line
- **Control tag** — the machine control the article covers (Fanuc, Heidenhain, etc.) — colour-coded per the locked tag palette
- **Content type tag** — article / video / guide. Video tag is green per the brand rule. Article and guide tags use the standard tag treatment
- **Read time** — for articles ("8 min read"). For videos, the video duration ("12:34")
- **Date** — publish date (relative for recent pieces — "last week" — full date for anything older than a month)

The CMS pulls all of this. Designer specs the card; copywriter doesn't write per-card content.

---

## Featured strip

### Editor's picks.

A small strip at the top of the grid surfacing two or three pieces — the most-read in the last week, the latest, or a hand-picked "start here" set for visitors landing cold.

**Strip label:** Most read this week

**Card content:** same shape as the regular article cards (title, dek, control tag, content type tag, read time, date).

> [GAP — Dave to identify featured articles for the strip. Options: (a) the three most-read in the last 7 days, pulled automatically; (b) a hand-picked rotating set updated quarterly; (c) two "start here" cards for the two buyer faces — one for companies, one for individuals starting a CNC career. Decision affects the CMS spec.]

---

## Pagination

### Browse the full library.

**Pagination controls:**
- **Previous page** (disabled on page 1)
- **Page indicator** — "Page 1 of 17"
- **Next page** (disabled on the last page)

**Alternative (designer's call):** a "Show more" button that loads the next batch inline rather than paginating. Either works. The wireframer / designer pick one and apply it consistently.

---

## Notes for designer

### The filters are real, not decorative.

A previous designer learning on this project: pseudo-filters that look real but don't actually filter the cards are banned. Visitors land on this page with a specific question — "show me everything on Fanuc macro programming" — and the filters either deliver that or they fail.

Concretely:
- **The filter UI must be real.** Clicking "Fanuc" filters the cards client-side and updates the result count.
- **Multiple filters combine.** "Fanuc" + "Macro programming" + "Article" should return only Fanuc macro programming articles.
- **Search filters cards client-side too.** Typing "G73" in the search input filters cards as you type. No full-page reload.
- **Filter state survives navigation.** Clicking into an article and hitting Back returns the visitor to the same filtered state.
- **Empty state shows the message above.** Not a blank grid.

This is the most-used page on the site once content migration is done. It needs to work like a working tool, not a brochure.

---

## What this page does NOT have

### Deliberately absent.

- **No final CTA band.** The visitor is in browse mode. Routing them to the enquiry form here would interrupt the discovery flow — and content does the qualifying anyway. The footer (locked, global) carries the contact route.
- **No services preview / cross-sell band.** Service cross-links sit on individual articles ("Read about Fanuc macro programming → Onsite Fanuc training"), where they're contextual. On the hub index, no cross-sell.
- **No newsletter signup.** Not part of the funnel for this project. Hub content drives enquiries direct.

---

## Notes / open questions

- **[GAP]** Featured strip — see inline GAP. Three options for Dave to pick from before the CMS spec is locked.
- **[GAP]** Tag taxonomy is sourced from learnings.md (primary axis: machine/control brand; secondary: skill level, content type, topic). The exact list of brands and topics in the filter UI may need pruning once the 200-article migration is mapped — some brands listed in strategy may have only a handful of articles and not warrant a filter chip. Confirm with Dave / developer once migration data is in.
- **[For wireframer]** Hero pairs left-column copy with right-column marginalia (same pattern as home / onsite / about). Then filters band, then card grid, then pagination. No CTA band at the bottom.
- **[For wireframer]** Filters band is the biggest layout decision on this page. Suggested: filter group labels stack vertically as sticky sidebar on desktop (so the visitor can adjust filters as they scroll the grid), horizontal pill row on mobile.
- **[For wireframer]** The card grid uses the canonical Hub preview block from the home page, scaled up. Same card shape, same tag treatment. Don't invent a new card variant.
- **[For designer]** Video content type tag is green per the brand rule (locked in PRODUCT.md: green reserved for video tags only). All other content type tags use the standard tag treatment.
- **[For developer]** Search and filter must work client-side without a full-page reload. Filter state in URL so a filtered view is shareable and bookmarkable.
