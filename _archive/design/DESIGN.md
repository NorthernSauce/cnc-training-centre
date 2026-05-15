# CNC Training Centre Design System

## Design Position
Industrial premium. The site should feel like a well-run engineering workshop: precise, practical, calm and credible. Avoid SaaS gloss, acid green, decorative glass, huge generic hero type and symmetrical AI card grids.

## Palette
Use OKLCH tokens in CSS.

- Primary blue: brand action, key links, active states.
- Graphite: high-contrast text, footer, deep panels.
- Steel neutrals: backgrounds, surfaces, rules.
- Safety amber: small practical highlight only, never a second brand color.
- No lime or green as a dominant color because it fights the existing logo blue.
- No pure black or pure white. Neutrals should be lightly tinted toward the blue brand hue.

## Typography
Use two font families only: one distinctive sans stack for headings, navigation, tags and buttons, plus one body sans stack for paragraphs, forms and longer reading. Avoid Inter as the named brand font.

- Display: calm, technical, never oversized. Hero H1 must be 2 to 3 lines on desktop.
- Body: 16 to 18px with comfortable line height and line lengths under 70ch.
- Labels: small caps sparingly, with consistent compact geometry.
- Numbers: tabular figures.

## Layout
- Header: sober, legible, sticky, with logo left, navigation center, contact CTA right.
- Navigation: desktop uses click-friendly mega menus for services, controls and Learning Hub. Mobile uses a real menu toggle, stacked panels and large tap targets.
- Hero: split editorial layout, copy left, CNC training image right. No hero metric template.
- Services: asymmetric grid with one larger lead service and smaller secondary services.
- Course routes: compact comparison strip, not a generic 3-card row.
- Learning Hub: search-first editorial resource section. Primary filter axis is machine/control brand (Fanuc, Siemens, Heidenhain, Mazak, Hurco, Haas, Brother, XYZ, Sliding Head, Edgecam, Doosan). Secondary filters: skill level, content type (article/video/guide), topic. Article rows/cards with embedded YouTube where relevant.
- CTA: direct contact band with phone and email.

## Components
- Buttons: rectangular with small radius, directional affordance, strong hover and pressed states.
- Cards: use only when content is a distinct action. No nested cards.
- Tags: small, square-ish labels with intrinsic width. Do not stretch short labels like Fanuc into awkward blocks.
- Images: real CNC-specific visuals with precise crops.
- Focus states: clear blue outline.

## Motion
Keep motion restrained: hover lift, image scale, smooth focus transitions. No perpetual animation or decorative effects unless they serve comprehension.

## Accessibility
High contrast, keyboard-visible focus, semantic sections, skip link, meaningful alt text.
