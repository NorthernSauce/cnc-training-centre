# CNC Training Centre

Facts for any agent working in this folder. Keep this file current; log changes in `decisions.md`.

## The client
- Business: independent CNC trainer with 30 years' experience. Four services: onsite training, classroom training, programming services, online courses. Learning Hub of about 300 articles, 332 YouTube videos, 27k LinkedIn followers.
- Contact: David, trainer and sole decision-maker (david@cnctrainingcentre.com). First name only; see rules.
- What Northern Sauce does for them: full website rebuild from a 965-URL WordPress sprawl — Status: in build (Phase 5; content-migration clone build marked ship-ready for client review 2026-06-07; last commit 2026-07-30)

## Where everything is
- This folder: `~/Documents/Northern Sauce OS/clients/cnc-training-centre/`
- GitHub: design repo `git@github.com:NorthernSauce/cnc-training-centre.git`; WordPress repo `NorthernSauce/cnc-training-centre-website`. Pages preview https://northernsauce.github.io/cnc-training-centre/
- Local WordPress site: `~/Local Sites/cnctrainingcentre/` → http://cnctrainingcentre.local — theme `cnc-training-centre`. The deliverable clone holding the real 290-post archive is `~/Local Sites/cnctrainingcentre-old/`.
- Staging: [GAP]
- Live: [GAP] (the client's email domain is cnctrainingcentre.com; the live URL is not written down)
- Linear project: https://linear.app/northern-sauce/project/cnc-training-centre-website-ec6281752867 (Build is NOR-54)
- Basecamp / comms: [GAP]
- Key folders here:
  - `brief/` — tokens.css, components.css, style guide, design-brief.md, references
  - `strategy/` — strategy.md, market-intelligence.md, proposed sitemap
  - `copy/` — one `.md` per page; `REWRITE-V4-2026-07-24.md` is the latest rewrite
  - `design/` — high-fi HTML/CSS for every page (signed-off design artefact)
  - `build/` — composers, implementation plan, phase logs, link-fix scripts
  - `plans/` — content migration plan and `EXECUTION-STATUS.md`
  - `PROJECT.md`, `HANDOVER.md`, `PRODUCT.md`, `DESIGN.md`, `learnings.md` — project history; `wireframes/` empty (cancelled 2026-05-15)

## Rules for this client
- Voice is the hardest constraint: David's organic articles are the gold standard, the AI-written Doosan and Hurco pages are the negative reference. Sweary, direct, no-BS; never sanitised (2026-05-15).
- First person singular always: "I", "me", "my", never "we", "us", "our". Exception: "Contact David" and "Tell David what you need" as CTAs.
- Never write a surname for David. The site says "David" only (2026-05-16; an agent once invented one and Dave caught it).
- No SaaS-template hover or motion on cards: no lifts, scale, coloured-bar reveals, glows or arrow shifts. Hairline border shifts, ink colour shifts and underline reveals only (2026-05-17). Visual world is paper, draftsman, engineering.
- No index numbers on cards, rows or lists; numbers only on real process steps. No decorative rule lines above eyebrows, no footer-heading underlines (Dave, 2026-07-24).
- Hub taxonomy: primary filter is machine or control brand (Fanuc, Siemens, Heidenhain, Mazak, Hurco, Haas, Brother, XYZ, Sliding Head, Edgecam, Doosan); then skill level, content type, topic. The hub is an archive and discovery layer, not a new content programme.
- Permalinks `/learning-hub/%postname%/` on the new build; the clone uses `/%postname%/` (2026-06-07). Trainings are `cnc-course` entries at `/training/<slug>/`; online courses stay on Tutor LMS at `/courses/`. Events use Amelia.
- Edit the theme in `~/Local Sites/cnctrainingcentre/.../cnc-training-centre/`, run `npm run production`, then rsync `theme/` to the clone (2026-07-24). JS source is `javascript/`, not `theme/javascript/`.
- Every composer and wp-cli write needs the isolated DB socket in wp-config; a bare `localhost` once wrote into Fuelled's database (2026-05-27).
- A designer may revise autonomously only when applying refreshed copy to an already-locked visual vocabulary (2026-05-18).

## Open items
- `[GAP]` items from the design pass: worked examples, programming pricing tiers, "network of trusted machine shops" wording, two testimonials, hub featured articles.
- Reviews plugin: WP Business Reviews is not on WP.org; Dave to supply a zip or confirm Site Reviews.
- No usable teaching photography; David-teaching shoot deferred to post-launch. Logo is PNG only; SVG to request.
- NOR-440: fix compiled-asset `.gitignore` before any pure-git deploy. Mobile eyeball pass on the clone. Apply and enquiry pages currently redirect.
- Per-course Amelia calendars need per-course events set up client-side.
- Deploy is over SSH with wp-cli (database and theme files) from the clone to staging or live, per `standards/wordpress.md` rule 29. Not WP Migrate DB Pro (Dave, Oct 2026).
