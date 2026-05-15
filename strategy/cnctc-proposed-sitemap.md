# CNC Training Centre — Proposed Sitemap

**Prepared by:** Northern Sauce
**Date:** May 2026
**Status:** Draft for client review

---

## The problem we're solving

The current site has 965 URLs. They've been added over years with no consistent structure, so service pages, course pages, tutorial articles, application forms, and duplicates all sit at the same root level. From a URL alone, it's impossible to tell what's a service, what's a course, and what's a blog post.

The rebuild keeps every piece of existing content (nothing gets deleted) but reorganises it into a structure that's clear to visitors, scalable for the future, and easy to add to without breaking anything.

---

## The structure at a glance

```
HOME

├── ONSITE TRAINING                /onsite-training/
├── CLASSROOM TRAINING             /classroom-training/
├── COURSES (coming soon)          /courses/
├── PROGRAMMING SERVICES           /programming-services/

├── LEARNING HUB                   /learning-hub/

├── ABOUT                          /about/
└── CONTACT                        /contact/
```

Four service overview pages. One Learning Hub. Two utility pages. That's the whole site at the top level.

---

## How it works under the hood

Two types of content live on the site:

**1. Sales pages** (a new `service` content type)
Each is a structured lander with the same shape — who it's for, what's covered, what's included, pricing, testimonials, booking form. One template, one consistent experience, easy to add new ones.

**2. Articles** (Learning Hub posts)
Tutorials, tips, parameter guides, g-code/m-code explainers. The encyclopaedia of CNC knowledge the site has built up over the years. Standard article layout.

A visitor never has to know the difference — but the site does, which is what makes it possible to surface the right content in the right place automatically.

---

## The four service sections

Each section has an **overview page** (the sales pitch) and **detail pages** (the specifics).

### 1. Onsite Training — `/onsite-training/`

Training delivered at the client's facility, on their machines.

**Overview page:** pitches the service, lists who it suits, links to every brand/control variant available.

**Detail pages** (auto-listed on the overview):
- By machine brand: Brother, Haas, Hurco, Mazak, Doosan, Matsuura, Miyano, Hardinge, Biglia, Shibaura, Toshiba, Citizen, Star, sliding head, and any others.
- By control: Fanuc, Siemens, Heidenhain, Fagor, XYZ, Mazatrol.

Example URLs:
- `/onsite-training/brother/`
- `/onsite-training/haas/`
- `/onsite-training/fanuc/`
- `/onsite-training/sliding-head/`

### 2. Classroom Training — `/classroom-training/`

Training delivered at the CNC Training Centre's own facility.

**Overview page:** what classroom is, who it suits, location and logistics, list of every course.

**Detail pages:**
- Beginners — Milling
- Beginners — Turning
- Setter / Operator — Milling
- Setter / Operator — Turning
- Learn to Program — Milling
- Learn to Program — Turning
- Macro Programming
- Edgecam / CAD/CAM

Example URLs:
- `/classroom-training/beginners-milling/`
- `/classroom-training/macro-programming/`

### 3. Courses (coming soon) — `/courses/`

Self-paced online courses. Not live at launch — the page exists as a placeholder with a "coming soon" message and an email-capture so interested visitors can be notified when it opens.

**Overview page:** what's coming, who it's for, notify-me form.

**Detail pages:** none at launch. Added when courses are ready to publish.

### 4. Programming Services — `/programming-services/`

Sub-contract CNC programming work — Edgecam, turnkey solutions, CNC machining services. A separate offer from training.

**Overview page:** what's offered, typical projects, how it works.

**Detail pages:**
- Sub-contract programming
- Edgecam programming
- Turnkey solutions
- CNC machining services

---

## The Learning Hub — `/learning-hub/`

Every tutorial, tip, parameter guide, g-code reference, and how-to article — around 200 posts after pruning duplicates — moves here.

**Visitors browse by:**
- Machine brand (Fanuc, Haas, Siemens, Heidenhain, Mazak, Hurco, etc.)
- Control type
- Topic (G-codes, M-codes, Parameters, Macro, Edgecam, Tips & Tricks)
- Or just the full feed

**Each article** links to the relevant service at the bottom. Someone reading a Fanuc G73 tutorial sees a card for Onsite Fanuc Training. The content earns the conversion instead of fighting it.

Example URLs:
- `/learning-hub/`
- `/learning-hub/fanuc-g73/`
- `/learning-hub/category/fanuc/`

---

## Utility pages

- **`/about/`** — about CNC Training Centre, the instructor team, case studies, careers in CNC
- **`/contact/`** — single enquiry form, with service/course as a field

---

## What gets cleaned up in the rebuild

Nothing valuable gets deleted — but a lot of mess gets tidied:

| What's there now | What happens to it |
|---|---|
| 41 separate `apply-*` pages | Consolidated into 1 enquiry form, with the course/service pre-filled depending on which page the visitor came from. |
| 31 duplicate pages with `-2` in the URL | 301-redirected to the original canonical version. Search engines pass on the SEO value, visitors get the right page. |
| 262 WordPress tags accumulated over years | Pruned to a tight, defined set of 15–20 tags that match the new structure. |
| 75 service landing pages scattered at root | Reorganised under their parent service (Onsite / Classroom / Programming Services). Old URLs 301-redirect to new ones — no lost rankings. |
| 231 tutorial articles scattered at root | Moved to `/learning-hub/[slug]/`. Old URLs 301-redirect. |

Every existing URL gets a redirect to its new home. No traffic lost, no SEO lost, no broken links.

---

## Why this works

**For visitors:**
A first-time visitor lands on the homepage, sees four clear services, picks the one that matches them, and gets to a focused sales page with one CTA. They don't trip over tutorial articles or duplicate pages on the way.

**For SEO:**
The Learning Hub keeps the 200+ tutorial articles that bring search traffic. Now they sit in a clean `/learning-hub/` namespace that search engines understand. Each article funnels readers toward a relevant service.

**For the long term:**
Adding a new onsite brand, a new course, or a new article takes about 5 minutes. Pick the right type ("Service" or "Post"), fill in the fields, tick the right category, publish. The right pages and overviews update themselves. No more building a new page from scratch every time a new offer appears.

---

## Open questions before we finalise

A few things to confirm with the client before the structure is locked in:

1. **Are weekend courses a distinct product or a scheduling option for existing classroom courses?** Currently there are weekend variants of every classroom course — worth confirming whether they need their own pages.
2. **Where does Edgecam training belong — Classroom, Onsite, or both?** Probably both — needs a primary home.
3. **What's the single most important action a visitor should take?** Onsite enquiry? Classroom booking? The whole site needs to lean toward one primary CTA.

---

## Next steps

1. Client reviews this sitemap and confirms or flags changes.
2. Client fills in the gaps in the discovery questionnaire — especially the five services, ideal client, tone of voice, and primary success metric.
3. We move to strategy (BrandScript + messaging) and wireframes.
4. Design direction.
5. Build.

Anything unclear, anything to push back on, anything missing — say the word.
