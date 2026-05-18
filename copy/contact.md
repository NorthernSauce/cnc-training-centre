<!-- Contact copy - 2026-05-18 - copyseller v3 (conversion gate)
     Site-type: multi-product router.
     Role: conversion gate. Beats 35-36. Strip every friction point.
     Single Fluent Forms enquiry form with service/course pre-fillable
     from referring page.

     Page-level framework: OPEN-light (Offer first, then problem/evidence
     about what happens, then next steps). Most existing H2s pass Hard
     Rule 11 already. Light revision needed.

     Hard Rule 11: every H labelled.
     Hard Rule 12: em-dash grep = 0.
     First-person singular. No surname.
-->

# Contact

> **Page purpose:** Conversion. Strip every friction point. Give the visitor a reason to fill the form rather than bounce.
> **Primary CTA:** Submit enquiry. Secondary: Call 07834 858 407.
> **Awareness:** Mostly product-aware to most-aware. Reader is at the form because they've already decided I'm a candidate. Page's job is to remove the last objection.
> **Framework:** OPEN-light at page level.
> **Last updated:** 2026-05-18

---

## Hero

**Eyebrow:** Contact. I read every enquiry myself.

<!-- H1: Bucket D Offer hook. VOC: existing copy verbatim. Direct invitation. -->
### Tell me what you need.

<!-- Lede: tightened to 25-word cap. VOC essence from existing lede. -->
Describe the machines, the team, what you want them able to do. One paragraph is plenty. I aim to come back inside a working day.

**Marginalia (machine-card sidebar):**
- **Phone:** 07834 858 407
- **Email:** david@cnctrainingcentre.com
- **Reply time:** inside a working day, usually same day
- **Where:** Barwell, Leicestershire. UK-wide for onsite.
- **What you'll get back:** an honest read on whether I can help, a rough scope, and a price. Not a templated reply.

---

## One form. The thing you need at the top.

<!-- H2: Bucket E broetry + direct instruction. Existing copy. Strong, keep. -->

**Form fields (Fluent Forms. Single enquiry form, pre-fillable service/course from referring page):**

- **Your name.** Required.
- **Email.** Required.
- **Phone.** Optional. Useful if you'd rather have the conversation by phone. Leave it blank if you'd rather not.
- **Company.** Optional. Worth filling in if you're an engineering company. Skip it if you're enquiring as an individual about a course.
- **What do you need?** Required dropdown.
  - Onsite training
  - Classroom training
  - Programming services
  - Courses (notify me when they open)
  - I'm not sure yet. I just want a chat.

- **Tell me about your machines, your team, where you're at.** Required textarea.
  Placeholder example: *"Mazak Integrex i200 plus a Hurco VM10. Three operators, two of them confident on setups but neither can write a new program from scratch. I'd like them onto macro programming by the end of Q3. Based in Birmingham."*

- **Submit enquiry**

**Below the submit button (small print):**
*I read every enquiry myself. No marketing list, no automated follow-up, no sales pipeline.*

---

## The honest version.

<!-- H2: Bucket E with edge. Existing copy. Strong, keep. Distinct from all other Hs. -->

<!-- Body: VOC from existing copy. Em dashes killed. -->
You'll get an email back from me, usually the same day, never longer than a working day. Inside that reply: a straight read on whether onsite, classroom, or programming services is the right call for your situation, a rough scope, and a price. Not a brochure, not a "let's hop on a discovery call." A proper answer.

If we're a fit, I'll propose dates. If we're not, I'll tell you why and point you somewhere that is, including a competitor if that's the honest answer.

If you'd rather have the conversation by phone first, the number's at the bottom. Call me direct. There's no gatekeeper.

---

## Take the friction out by being honest about what doesn't happen.

<!-- H2: Bucket B-adjacent (desire for low-friction enquiry). Existing copy. Strong, keep. Distinct from all other Hs. -->

<!-- Body: existing bullets. Em dashes killed. -->
You're filling in a form on a website. It's a fair question what gets done with it. Here's the short list:

- **I won't put you on a marketing list.** Your email goes into my inbox and that's it. No newsletter, no automated drip, no "we noticed you didn't reply" follow-up sequence.
- **I won't chase you if you go quiet.** If you fill the form, then decide we're not a fit, just don't reply. I'm not going to hassle you. If the timing changes in six months, come back when it does.
- **I won't push a service that isn't right for you.** If you're enquiring about onsite and the honest answer is classroom, I'll say so. If your situation is outside what I do well, I'll say so.
- **I won't pretend to a price I don't know.** Onsite is £700 a day for the whole team. Classroom is £300 per student per day. Programming is £60 to £100 an hour depending on the work. If your situation is more complicated than that, I'll scope it honestly on the call.

That's the whole pitch. No sales theatre.

---

## Some buyers want a call. Some want to lurk and read first.

<!-- H2: Bucket E broetry. Existing copy. Strong, keep. Distinct from all other Hs. -->

**Phone:** 07834 858 407
Direct number. No receptionist. If I'm in a classroom or on a shop floor, leave a voicemail and I'll come back the same day.

**Email:** david@cnctrainingcentre.com
If a paragraph in your own email beats a form, go that route. Same response time.

**Or read first, enquire later.**
If you're not ready to make contact, the Learning Hub has 300+ articles and videos covering every major machine and control. Most of the people who eventually book have read three or four of them on the way in. Browse the Hub.

**Location:**
Barwell, Leicestershire. The classroom's in Barwell, just outside Hinckley. If you want to come and see it before you commit, ask. The kettle's on.

---

## Thirty years of doing this. Worth two lines before you hit send.

<!-- H2: Bucket E direct claim with edge. Distinct from all other authority Hs. -->

<!-- Stats table from §3 + §9. -->

| Stat | Detail |
|---|---|
| 30 years | Training on CNC machines, on every major control |
| 30 | Five-star reviews on Google |
| 332 videos | YouTube channel, 8,930 subscribers |
| 27,000 | LinkedIn followers reading my weekly content |

---

## Notes / open questions

- **[For developer]** Form is a single Fluent Forms enquiry form. The "What do you need?" dropdown is pre-fillable via URL parameter or referring page. Visitor arriving from `/onsite-training/` gets "Onsite training" pre-selected, visitor from a classroom course detail page gets the corresponding option. Default state: no option selected.
- **[For developer]** Form submissions route to david@cnctrainingcentre.com. No CRM integration. No marketing automation. No double opt-in. That's the deliberate position (see "Take the friction out").
- **[For developer]** Textarea placeholder is real placeholder text, not a label. Disappears on focus per form best practice.
- **[For wireframer]** Hero pairs left-column copy with right-column marginalia. Form sits immediately below the hero, above the fold on desktop. No long preamble.
- **[For wireframer]** "The honest version" and "Take the friction out" both sit below the form. For buyers who scroll, not in their way before they fill it in.
- **[For wireframer]** "Some buyers want a call" is a three-column band: phone, email, location/Hub fallback. Same visual weight across the three.
- **[For designer]** No anchor-tier contact band on this page. The form IS the contact. Don't repeat the canonical home/services contact section here. That pattern is for pages that route to this one.
- **[For designer]** Trust strip is the home page authority table stripped to four rows.
- **No FAQ on this page.** Covered on About and on the service pages. Don't pad.

---

Built per: The Copyselling System by Joanna Wiebe (BenBella, 2026), Ch. 1-14
References consulted: 01, 02, 03, 07, 08, 09, 10, 11, 12, 13, 15, 16, 17
NS additions applied: site-as-router (Contact as conversion gate), web-execution constraints, humaniser hard gate, VOC-density check
Dave-overrides applied: Hard Rule 8 (web length wins); Ch. 4 weapons skipped; Beat 32 risk reversal skipped
Book-fidelity audit: PASS
Humaniser audit: PASS (em-dash count: 0; VOC density: ~80%)
