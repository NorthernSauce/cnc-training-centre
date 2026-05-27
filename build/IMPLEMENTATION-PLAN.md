# CNC Training Centre — WordPress Build Implementation Plan

**Status:** Awaiting Dave sign-off before execution begins  
**Linear build issue:** NOR-54 (Backlog until approved)  
**Prepared by:** ns-acf-block-builder, Plan Mode  
**Date:** 2026-05-27

---

## 1. Project Bindings

| Key | Value |
|---|---|
| Design repo | `~/Documents/Clients/cnc-training-centre/` |
| Local WP slug | `cnctrainingcentre` (no dashes) |
| Local WP path | `~/Local Sites/cnctrainingcentre/app/public/` |
| Theme target | `~/Local Sites/cnctrainingcentre/app/public/wp-content/themes/_ns/` |
| Theme GitHub repo | `NorthernSauce/cnc-training-centre-website` (create on Execute) |
| Base theme | `NorthernSauce/northern-sauce-base-theme` |
| Linear project | `cc4538c6-995d-4156-ac5e-3758d835bfb8` |
| Linear build issue | NOR-54 |

---

## 2. Site Architecture

### Pages and Templates

| Page | URL slug | WP Template | Notes |
|---|---|---|---|
| Home | `/` | `front-page.php` | Static front page |
| Onsite Training | `/onsite-training/` | `page.php` | ACF blocks |
| Classroom Training | `/classroom-training/` | `page.php` | ACF blocks |
| Programming Services | `/programming-services/` | `page.php` | ACF blocks |
| Online Courses | `/courses/` | See OD-05 | Tutor LMS or CPT archive |
| About | `/about/` | `page.php` | ACF blocks |
| Learning Hub | `/learning-hub/` | `home.php` | Native post archive |
| Contact | `/contact/` | `page.php` | ACF blocks |
| Single Article | `/learning-hub/{slug}/` | `single.php` | Native post single |
| Privacy Policy | `/privacy-policy/` | `page.php` | Plain content page |
| Terms | `/terms/` | `page.php` | Plain content page |

### Navigation Menus

Three menus registered in `functions.php`:

1. **Primary** — desktop header + mobile drawer: Services sub-items (Onsite / Classroom / Programming / Courses) + Learning Hub / About / Contact
2. **Footer** — four groups rendered as footer nav columns:
   - Services: Onsite Training / Classroom Training / Programming Services / Online Courses
   - Learning: Learning Hub / About / Contact
   - Legal: Privacy Policy / Terms
3. **Social** — icon links, Customizer-managed

Navigation rendered via custom `Walker_Nav_Menu` subclasses. Nav is always sticky (`is-scrolled` class added by JS on scroll). Drawer open/close handled by inline JS ported to `javascript/script.js`.

### WordPress Menus Setup

```
register_nav_menus( array(
    'primary' => 'Primary Navigation',
    'footer'  => 'Footer Navigation',
    'social'  => 'Social Links',
) );
```

---

## 3. Custom Post Types and Taxonomies

### Learning Hub Articles — Native `post` (locked)

Learning Hub articles use WordPress's native `post` post type. This is a hard constraint: do not register a CPT for articles.

**Categories become:** `category` (native WP taxonomy)  
- Used for the "Type" filter in the Learning Hub (e.g. Guide, Tutorial, Reference)

**Custom taxonomies registered for Learning Hub filters:**

| Taxonomy slug | Label | Used for filter |
|---|---|---|
| `cnc-control` | CNC Control | Control pills (Fanuc, Siemens, Heidenhain, etc.) |
| `cnc-skill` | Skill Level | Skill pills (Beginner, Intermediate, Advanced) |

The Learning Hub design shows three filter axes: Control / Skill / Type. Control and Skill have specific technical values that don't map to native categories, so they become custom taxonomies. Type (Guide, Tutorial, Reference, etc.) maps to native `category` for simpler editorial management.

Taxonomy registration in `functions.php`:

```php
register_taxonomy( 'cnc-control', 'post', array(
    'label'        => 'CNC Control',
    'public'       => true,
    'hierarchical' => false,
    'rewrite'      => array( 'slug' => 'control' ),
    'show_in_rest' => true,
) );

register_taxonomy( 'cnc-skill', 'post', array(
    'label'        => 'Skill Level',
    'public'       => true,
    'hierarchical' => false,
    'rewrite'      => array( 'slug' => 'skill' ),
    'show_in_rest' => true,
) );
```

Cards carry `data-controls`, `data-skill`, `data-type` attributes for client-side JS filtering. Filter state stored in URL query params (`?control=fanuc&skill=beginner`).

### On-Site and Classroom Courses — CPT (open decision)

See **OD-03** and **OD-04** for the open decisions on CPT vs repeater block. If a CPT is registered, the structure is:

**Slug:** `cnc-course` (OD-03)  
**Supports:** `title`, `editor`, `thumbnail`, `excerpt`  
**Has archive:** `true`  
**Archive slug:** `courses`

**Taxonomies:**

| Taxonomy slug | Label | Terms |
|---|---|---|
| `course-type` | Course Type | `onsite`, `classroom`, `online` |
| `course-level` | Course Level | `beginner`, `setter-operator`, `programmer` |
| `course-control` | Machine Control | Fanuc, Siemens, etc. |

ACF field group on `cnc-course`:

- `field_cnc_course_duration` — text — "Duration" (e.g. "2 days")
- `field_cnc_course_price` — text — "Price" (e.g. "£600")
- `field_cnc_course_rate` — text — "Rate label" (e.g. "per delegate")
- `field_cnc_course_lede` — textarea — "Short description"
- `field_cnc_course_ideal_for` — textarea — "Ideal for"
- `field_cnc_course_outcomes` — repeater (`layout: block`, `collapsed: field_cnc_course_outcome_item`) — "Outcomes"
  - `field_cnc_course_outcome_item` — text — "Outcome"
- `field_cnc_course_cta_label` — text — "CTA label" (default: "Enquire")
- `field_cnc_course_cta_url` — text — "CTA URL"

Archive template: `archive-cnc-course.php` — renders the 8-card grid matching `.cs-archive` design markup. Single template: `single-cnc-course.php` or defer to Tutor LMS (OD-05).

---

## 4. Customizer Global Options

All global site settings live in the WordPress Customizer. No ACF Options Page.

### Section: Site Identity (native WP, extend)

- Site title (native)
- Tagline (native, used as footer tagline)
- Site Icon / Favicon (native)

### Section: `ns_branding` — Logos

| Control ID | Label | Type | Sanitize |
|---|---|---|---|
| `ns_logo_nav` | Navigation Logo | `WP_Customize_Image_Control` | `esc_url_raw` |
| `ns_logo_footer` | Footer Logo | `WP_Customize_Image_Control` | `esc_url_raw` |
| `ns_og_image` | Default OG Image | `WP_Customize_Image_Control` | `esc_url_raw` |

### Section: `ns_contact` — Contact Details

| Control ID | Label | Type | Sanitize |
|---|---|---|---|
| `ns_phone` | Phone Number | `WP_Customize_Control` (text) | `sanitize_text_field` |
| `ns_email` | Email Address | `WP_Customize_Control` (text) | `sanitize_email` |
| `ns_address_display` | Display Address | `WP_Customize_Control` (textarea) | `sanitize_textarea_field` |
| `ns_address_registered` | Registered Address | `WP_Customize_Control` (textarea) | `sanitize_textarea_field` |

### Section: `ns_company` — Company Information

| Control ID | Label | Type | Sanitize |
|---|---|---|---|
| `ns_company_number` | Company Number | `WP_Customize_Control` (text) | `sanitize_text_field` |
| `ns_vat_number` | VAT Number | `WP_Customize_Control` (text) | `sanitize_text_field` |
| `ns_ico_number` | ICO Reference Number | `WP_Customize_Control` (text) | `sanitize_text_field` |
| `ns_registration_number` | Registration Number | `WP_Customize_Control` (text) | `sanitize_text_field` |

### Section: `ns_social` — Social Links

| Control ID | Label | Type | Sanitize |
|---|---|---|---|
| `ns_social_linkedin` | LinkedIn URL | `WP_Customize_Control` (url) | `esc_url_raw` |
| `ns_social_youtube` | YouTube URL | `WP_Customize_Control` (url) | `esc_url_raw` |
| `ns_social_facebook` | Facebook URL | `WP_Customize_Control` (url) | `esc_url_raw` |
| `ns_social_instagram` | Instagram URL | `WP_Customize_Control` (url) | `esc_url_raw` |

### Section: `ns_footer` — Footer Content

| Control ID | Label | Type | Sanitize |
|---|---|---|---|
| `ns_footer_tagline` | Footer Tagline | `WP_Customize_Control` (text) | `sanitize_text_field` |
| `ns_footer_intro` | Footer Columns Intro Text | `WP_Customize_Control` (textarea) | `sanitize_textarea_field` |
| `ns_footer_copyright` | Copyright Line | `WP_Customize_Control` (text) | `sanitize_text_field` |

All Customizer sections registered in `inc/customizer.php`. Values retrieved in templates via `get_theme_mod( 'ns_phone', '' )`.

---

## 5. SCF Block Inventory

### Field Group Conventions — Binding

Every SCF field group in this build must have:

```php
'label_placement'       => 'top',   // labels above inputs — full sidebar width
'instruction_placement' => 'field', // help text under label, not right-float
```

Every repeater must have:

```php
'layout'    => 'block',                          // never 'table'
'collapsed' => 'field_{block_name}_primary_key', // primary text sub-field key
```

`'table'` layout is banned in all blocks. `'collapsed'` is required on any repeater expected to hold 3+ rows.

Field key format: `field_{block_name}_{field_name}` — unique across all blocks.

---

### Block List

#### `block-hero`
**Pages:** Home, Onsite Training, Classroom Training, Programming Services, About, Courses  
**Variants:** Standard (with reviews widget) / Compressed (no reviews, no CTAs) / Service (`.hero-title--svc`)

Fields:
- `field_hero_eyebrow` — text — "Eyebrow label"
- `field_hero_heading` — text — "Heading"
- `field_hero_lede` — textarea — "Lede paragraph"
- `field_hero_primary_cta` — link — "Primary CTA"
- `field_hero_secondary_cta` — link — "Secondary CTA"
- `field_hero_show_reviews` — true/false — "Show reviews widget" (default 1)
- `field_hero_reviews_count` — text — "Review count" (e.g. "47")
- `field_hero_reviews_score` — text — "Score" (e.g. "4.9")
- `field_hero_reviews_url` — url — "Google reviews URL"
- `field_hero_variant` — select — "Hero variant" (choices: `standard`, `compressed`, `service`)

Ghost machine lineart (`.fx-machine-hero`) is CSS-only, hidden below 900px — no ACF field required.

---

#### `block-authority`
**Pages:** Home, Onsite, Classroom, Programming, About  
**Variants:** Standard (spec-block) / With reviews widget / About variant (fx-hatch-cell)

Fields:
- `field_authority_heading` — text — "Section heading"
- `field_authority_spec_items` — repeater (`layout: block`, `collapsed: field_authority_spec_label`) — "Spec items"
  - `field_authority_spec_label` — text — "Label"
  - `field_authority_spec_value` — text — "Value"
  - `field_authority_spec_note` — text — "Note (optional)"
- `field_authority_show_reviews` — true/false — "Show reviews widget below"
- `field_authority_reviews_count` — text — "Review count"
- `field_authority_reviews_score` — text — "Score"
- `field_authority_reviews_url` — url — "Google reviews URL"
- `field_authority_variant` — select — "Variant" (choices: `standard`, `hatch`, `expect-dl`)

---

#### `block-hub-preview`
**Pages:** Home, Onsite, Classroom, Programming, Courses, Article (×2 instances: featured + related)  
**Canonical block** — identical markup byte-matched across all placements.

Fields:
- `field_hub_heading` — text — "Section heading"
- `field_hub_lede` — textarea — "Lede text"
- `field_hub_cta` — link — "View all CTA"
- `field_hub_secondary_items` — repeater (`layout: block`, `collapsed: field_hub_item_title`) — "Secondary cards" (max 2)
  - `field_hub_item_title` — text — "Article title"
  - `field_hub_item_dek` — textarea — "Dek"
  - `field_hub_item_image` — image (return: array) — "Thumbnail"
  - `field_hub_item_url` — url — "Link URL"
  - `field_hub_item_control` — text — "Control tag"
  - `field_hub_item_skill` — text — "Skill tag"
  - `field_hub_item_type` — text — "Type tag"

Featured article (primary card) may be a fixed relation field (ACF post object) or hardcoded by latest post. Open decision flagged at OD-06.

---

#### `block-decisiveness`
**Pages:** Home, Onsite, Programming, Classroom  
**Dark surface contact band with CTAs and contact meta.**

Fields:
- `field_decisiveness_heading` — text — "Heading"
- `field_decisiveness_lede` — textarea — "Lede"
- `field_decisiveness_primary_cta` — link — "Primary CTA"
- `field_decisiveness_secondary_cta` — link — "Secondary CTA"
- `field_decisiveness_phone` — text — "Phone (or leave blank to pull from Customizer)"
- `field_decisiveness_email` — text — "Email (or leave blank to pull from Customizer)"

If phone/email fields are blank, render template falls back to `get_theme_mod( 'ns_phone', '' )` and `get_theme_mod( 'ns_email', '' )`.

---

#### `block-faq`
**Pages:** Onsite, Classroom, Programming, About  
**Pattern:** `<details name="faq">` exclusive accordion (locked — do not change to JS accordion).

Fields:
- `field_faq_heading` — text — "Section heading"
- `field_faq_items` — repeater (`layout: block`, `collapsed: field_faq_question`) — "FAQ items"
  - `field_faq_question` — text — "Question"
  - `field_faq_answer` — wysiwyg (`toolbar: basic`, `media_upload: 0`) — "Answer"

---

#### `block-who`
**Pages:** Onsite, Classroom, Programming, About, Courses (variants)  
**2-col editorial with optional pull-quote and optional coda paragraph.**

Fields:
- `field_who_heading` — text — "Section heading"
- `field_who_body_left` — wysiwyg — "Left column content"
- `field_who_body_right` — wysiwyg — "Right column content"
- `field_who_show_pullquote` — true/false — "Show pull-quote"
- `field_who_pullquote_text` — textarea — "Pull-quote text"
- `field_who_pullquote_cite` — text — "Attribution"
- `field_who_show_coda` — true/false — "Show coda paragraph"
- `field_who_coda` — textarea — "Coda paragraph"

---

#### `block-disqualifier`
**Pages:** Onsite, Classroom, Programming  
**Numbered list of disqualifying statements.**

Fields:
- `field_disq_heading` — text — "Section heading"
- `field_disq_lede` — textarea — "Lede"
- `field_disq_items` — repeater (`layout: block`, `collapsed: field_disq_item_title`) — "Items"
  - `field_disq_item_index` — text — "Index label" (e.g. "A", "01")
  - `field_disq_item_title` — text — "Statement"
  - `field_disq_item_body` — textarea — "Explanation"

---

#### `block-svc-cta-form`
**Page:** Onsite Training only  
**Dark contact band with embedded Fluent Form — not the canonical decisiveness block.**

Fields:
- `field_svc_cta_heading` — text — "Heading"
- `field_svc_cta_lede` — textarea — "Lede"
- `field_svc_cta_form_id` — number — "Fluent Form ID"
- `field_svc_cta_phone` — text — "Phone (fallback to Customizer if blank)"
- `field_svc_cta_email` — text — "Email (fallback to Customizer if blank)"

Render template embeds form via `do_shortcode( '[fluentform id="' . esc_attr( $form_id ) . '"]' )`.

---

#### `block-included-list`
**Page:** Onsite Training  
**7-item what's-included list.**

Fields:
- `field_included_heading` — text — "Section heading"
- `field_included_items` — repeater (`layout: block`, `collapsed: field_included_item_name`) — "Items"
  - `field_included_item_name` — text — "Item name"
  - `field_included_item_body` — textarea — "Description"

---

#### `block-outcome`
**Pages:** Onsite, Classroom  
**Single or 2-col editorial outcome section.**

Fields:
- `field_outcome_heading` — text — "Section heading"
- `field_outcome_body` — wysiwyg — "Body content"
- `field_outcome_layout` — select — "Layout" (choices: `single`, `two-col`)
- `field_outcome_body_right` — wysiwyg — "Right column (two-col only)"

---

#### `block-pricing-narrative`
**Page:** Onsite Training  
**2-paragraph narrative pricing, no table.**

Fields:
- `field_pricing_nar_heading` — text — "Section heading"
- `field_pricing_nar_body` — wysiwyg — "Body content"
- `field_pricing_nar_note` — textarea — "Footer note (optional)"

---

#### `block-course-sheet`
**Page:** Classroom Training  
**8-row spec-sheet ordered list — classroom course rows.**

Fields:
- `field_cs_heading` — text — "Section heading"
- `field_cs_rows` — repeater (`layout: block`, `collapsed: field_cs_row_name`) — "Course rows"
  - `field_cs_row_index` — text — "Row index" (e.g. "01")
  - `field_cs_row_name` — text — "Course name"
  - `field_cs_row_rate` — text — "Price" (e.g. "£600")
  - `field_cs_row_lede` — textarea — "Short description"
  - `field_cs_row_url` — url — "Link URL" (defaults to `#apply`)

---

#### `block-offer-list`
**Page:** Classroom Training  
**8-item what's-included list with tick icons.**

Fields:
- `field_offer_heading` — text — "Section heading"
- `field_offer_lede` — textarea — "Lede"
- `field_offer_items` — repeater (`layout: block`, `collapsed: field_offer_item_name`) — "Items"
  - `field_offer_item_name` — text — "Item name"
  - `field_offer_item_body` — textarea — "Description"

---

#### `block-pricing-grid`
**Page:** Classroom Training  
**Pricing breakdown: lede LH + two nested lists RH.**

Fields:
- `field_pg_heading` — text — "Section heading"
- `field_pg_lede` — textarea — "Lede column text"
- `field_pg_list_a_heading` — text — "List A heading"
- `field_pg_list_a_items` — repeater (`layout: block`, `collapsed: field_pg_list_a_item`) — "List A items"
  - `field_pg_list_a_item` — text — "Item"
- `field_pg_list_b_heading` — text — "List B heading"
- `field_pg_list_b_items` — repeater (`layout: block`, `collapsed: field_pg_list_b_item`) — "List B items"
  - `field_pg_list_b_item` — text — "Item"

---

#### `block-osm-map`
**Page:** Classroom Training  
**OpenStreetMap iframe + address dl.**

Fields:
- `field_osm_heading` — text — "Section heading" (e.g. "Find us")
- `field_osm_iframe_src` — url — "OpenStreetMap embed URL"
- `field_osm_address_lines` — repeater (`layout: block`, `collapsed: field_osm_addr_label`) — "Address DL items"
  - `field_osm_addr_label` — text — "Label" (e.g. "Address")
  - `field_osm_addr_value` — text — "Value"
- `field_osm_parking_note` — textarea — "Parking / travel note"

GAP: exact address and OSM embed coordinates are still missing. Client must supply before content entry. See OD-09.

---

#### `block-prog-offer`
**Page:** Programming Services  
**4-card offer grid.**

Fields:
- `field_progoff_heading` — text — "Section heading"
- `field_progoff_cards` — repeater (`layout: block`, `collapsed: field_progoff_card_name`) — "Offer cards"
  - `field_progoff_card_index` — text — "Index"
  - `field_progoff_card_name` — text — "Name"
  - `field_progoff_card_lede` — textarea — "Lede"
  - `field_progoff_card_image` — image (return: array) — "Card image (optional)"

---

#### `block-plan-steps`
**Pages:** Programming Services, About  
**3-step numbered plan grid.**

Fields:
- `field_plan_heading` — text — "Section heading"
- `field_plan_lede` — textarea — "Lede (optional)"
- `field_plan_cta` — link — "Header CTA (optional)"
- `field_plan_steps` — repeater (`layout: block`, `collapsed: field_plan_step_title`) — "Steps"
  - `field_plan_step_num` — text — "Step number"
  - `field_plan_step_line` — text — "Step line / tagline"
  - `field_plan_step_title` — text — "Step title"
  - `field_plan_step_body` — textarea — "Step description"

---

#### `block-bundle-list`
**Page:** Programming Services  
**6-item bundle breakdown grid.**

Fields:
- `field_bundle_heading` — text — "Section heading"
- `field_bundle_lede` — textarea — "Lede (optional)"
- `field_bundle_items` — repeater (`layout: block`, `collapsed: field_bundle_item_name`) — "Items"
  - `field_bundle_item_name` — text — "Item name"
  - `field_bundle_item_body` — textarea — "Description"
- `field_bundle_footnote` — textarea — "Footnote"

---

#### `block-goal-editorial`
**Page:** Programming Services  
**2-paragraph editorial with drop-cap, single column.**

Fields:
- `field_goal_heading` — text — "Section heading"
- `field_goal_body` — wysiwyg — "Body content"

---

#### `block-pricing-rates`
**Page:** Programming Services  
**Rate sheet: 3 tiers + 1 wide row.**

Fields:
- `field_rates_heading` — text — "Section heading"
- `field_rates_lede` — textarea — "Lede"
- `field_rates_tiers` — repeater (`layout: block`, `collapsed: field_rates_tier_name`) — "Rate tiers"
  - `field_rates_tier_name` — text — "Tier name"
  - `field_rates_tier_rate` — text — "Rate" (e.g. "£85/hr")
  - `field_rates_tier_body` — textarea — "Description"
  - `field_rates_tier_wide` — true/false — "Wide row variant"

---

#### `block-warn-list`
**Page:** Programming Services  
**3-item numbered warning/caveat list.**

Fields:
- `field_warn_heading` — text — "Section heading"
- `field_warn_items` — repeater (`layout: block`, `collapsed: field_warn_item_name`) — "Items"
  - `field_warn_item_num` — text — "Number"
  - `field_warn_item_name` — text — "Statement"
  - `field_warn_item_body` — textarea — "Explanation"

---

#### `block-agitation`
**Page:** Home  

Fields:
- `field_agit_heading` — text — "Section heading"
- `field_agit_body_left` — wysiwyg — "Left column"
- `field_agit_body_right` — wysiwyg — "Right column"
- `field_agit_pullquote` — textarea — "Pull-quote (optional)"
- `field_agit_pullquote_cite` — text — "Attribution"

---

#### `block-positioning`
**Page:** Home  

Fields:
- `field_pos_heading` — text — "Section heading"
- `field_pos_body_left` — wysiwyg — "Left column"
- `field_pos_body_right` — wysiwyg — "Right column"

---

#### `block-mechanism`
**Page:** Home  

Fields:
- `field_mech_heading` — text — "Section heading"
- `field_mech_body` — wysiwyg — "Body (left column)"
- `field_mech_dl_items` — repeater (`layout: block`, `collapsed: field_mech_dl_term`) — "Definition list items"
  - `field_mech_dl_term` — text — "Term (dt)"
  - `field_mech_dl_def` — textarea — "Definition (dd)"

---

#### `block-services-grid`
**Page:** Home  
**4-card service link grid.**

Fields:
- `field_svcgrid_heading` — text — "Section heading"
- `field_svcgrid_cards` — repeater (`layout: block`, `collapsed: field_svcgrid_card_name`) — "Service cards"
  - `field_svcgrid_card_name` — text — "Service name"
  - `field_svcgrid_card_rate` — text — "Rate / descriptor"
  - `field_svcgrid_card_lede` — textarea — "Lede"
  - `field_svcgrid_card_url` — url — "Link URL"
  - `field_svcgrid_card_cta` — text — "CTA label"

---

#### `block-about-trainer`
**Page:** About  
**3-col editorial with pull-quote and footer.**

Fields:
- `field_trainer_heading` — text — "Section heading"
- `field_trainer_col_a` — wysiwyg — "Column A"
- `field_trainer_col_b` — wysiwyg — "Column B"
- `field_trainer_col_c` — wysiwyg — "Column C"
- `field_trainer_pullquote` — textarea — "Pull-quote"
- `field_trainer_pullquote_cite` — text — "Attribution"
- `field_trainer_foot` — textarea — "Footer note"

---

#### `block-indep`
**Page:** About  

Fields:
- `field_indep_heading` — text — "Section heading"
- `field_indep_body_left` — wysiwyg — "Left column"
- `field_indep_body_right` — wysiwyg — "Right column"
- `field_indep_coda` — textarea — "Coda paragraph"
- `field_indep_pullquote` — textarea — "Pull-quote"
- `field_indep_pullquote_cite` — text — "Attribution"

---

#### `block-where`
**Page:** About  

Fields:
- `field_where_heading` — text — "Section heading"
- `field_where_body_left` — wysiwyg — "Left column"
- `field_where_body_right` — wysiwyg — "Right column"
- `field_where_coda` — textarea — "Coda paragraph"

---

#### `block-known`
**Page:** About  
**Spec-block with fx-hatch-cell — authority variant.**

Fields:
- `field_known_heading` — text — "Section heading"
- `field_known_spec_items` — repeater (`layout: block`, `collapsed: field_known_spec_label`) — "Spec items"
  - `field_known_spec_label` — text — "Label"
  - `field_known_spec_value` — text — "Value"
  - `field_known_spec_note` — text — "Note"

---

#### `block-contact-band`
**Page:** About (not decisiveness variant — different BEM class)  

Fields:
- `field_cband_heading` — text — "Heading"
- `field_cband_lede` — textarea — "Lede"
- `field_cband_cta` — link — "CTA"

---

#### `block-contact-form`
**Page:** Contact  
**Full Fluent Form + aside.**

Fields:
- `field_ctform_heading` — text — "Form section heading"
- `field_ctform_form_id` — number — "Fluent Form ID"
- `field_ctform_aside_a_heading` — text — "Aside block A heading"
- `field_ctform_aside_a_body` — wysiwyg — "Aside block A body"
- `field_ctform_aside_b_heading` — text — "Aside block B heading"
- `field_ctform_aside_b_body` — wysiwyg — "Aside block B body"

The `data-prefill="need"` on the service select is wired by JS on page load — read `?service=onsite` URL param and pre-select the matching option.

---

#### `block-other-ways`
**Page:** Contact  
**3-col: phone / email / read-first + location strip.**

Fields:
- `field_otherways_phone` — text — "Phone (fallback Customizer)"
- `field_otherways_email` — text — "Email (fallback Customizer)"
- `field_otherways_readfirst_heading` — text — "Read-first heading"
- `field_otherways_readfirst_body` — wysiwyg — "Read-first body"
- `field_otherways_location_label` — text — "Location label"
- `field_otherways_location_value` — text — "Location value"

---

#### `block-trust-strip`
**Page:** Contact  
**4-stat spec block, no header.**

Fields:
- `field_trust_items` — repeater (`layout: block`, `collapsed: field_trust_label`) — "Stat items"
  - `field_trust_label` — text — "Label"
  - `field_trust_value` — text — "Value"
  - `field_trust_note` — text — "Note"

---

#### `block-cs-archive`
**Page:** Courses  
**8-card online course archive grid.**

Fields:
- `field_csarch_heading` — text — "Section heading"
- `field_csarch_lede` — textarea — "Lede"
- `field_csarch_cards` — repeater (`layout: block`, `collapsed: field_csarch_card_name`) — "Course cards"
  - `field_csarch_card_eyebrow` — text — "Eyebrow / index"
  - `field_csarch_card_name` — text — "Course name"
  - `field_csarch_card_dek` — textarea — "Description"
  - `field_csarch_card_duration` — text — "Duration"
  - `field_csarch_card_price` — text — "Price"
  - `field_csarch_card_url` — url — "Link URL"
  - `field_csarch_card_cta` — text — "CTA label"

If Tutor LMS is adopted (OD-05), this block becomes a theme template (`archive-sfwd-courses.php` or equivalent) and the repeater is replaced by a WP_Query loop. If Tutor LMS is not adopted, this remains an editable ACF block.

---

#### `block-how-it-works`
**Page:** Courses  

Fields:
- `field_hiw_heading` — text — "Section heading"
- `field_hiw_items` — repeater (`layout: block`, `collapsed: field_hiw_item_name`) — "Steps"
  - `field_hiw_item_name` — text — "Step name"
  - `field_hiw_item_body` — textarea — "Description"

---

#### `block-anti-positioning`
**Page:** Courses  

Fields:
- `field_anti_heading` — text — "Section heading"
- `field_anti_items` — repeater (`layout: block`, `collapsed: field_anti_item_title`) — "Items"
  - `field_anti_item_index` — text — "Letter index" (A / B / C)
  - `field_anti_item_title` — text — "Statement"
  - `field_anti_item_body` — textarea — "Explanation"

---

### Template-File Sections (Not SCF Blocks)

These sections are rendered by WordPress template files, not SCF blocks:

| Section | Template | Notes |
|---|---|---|
| Learning Hub filter + card grid | `home.php` | Client-side JS filter; WP_Query loop for cards; filter state in URL params |
| Learning Hub pagination | `home.php` | Standard `paginate_links()` |
| Article masthead | `single.php` | Breadcrumb, H1, dek, meta, tags |
| Article body (TOC + prose) | `single.php` | 2-col at ≥1100px; sticky TOC generated from headings |
| Article author footer | `single.php` | Author bio, meta dl, social |
| Article related (hub block) | `single.php` | Hub preview block reused as template-part |
| Article CTA strip | `single.php` | Dark CTA, page-specific copy from post meta |

---

## 6. Google Reviews Integration

### Surface A — Hero Widget (existing design pattern)

Every page that shows `show_reviews: true` in `block-hero` renders the `.reviews-widget` component from `flourishes.css` § 10. This is the canonical inline reviews widget — a small pill showing the star rating and review count, linking to the Google Business profile.

**To make it more prominent:** the current design places the widget below the lede text in the hero. A stronger treatment is to move it above the primary CTAs, or to render it as a `.reviews-widget--featured` variant with a larger star size and a short testimonial excerpt beneath it. This is a CSS-only change once the convention is established in the first hero block.

### Surface B — Full Reviews Section (Dave's requirement)

Design has no dedicated Google reviews section. This is a Dave-requested addition. Plugin options researched:

| Plugin | Method | Pros | Cons |
|---|---|---|---|
| **WP Business Reviews** | Google Places API (self-hosted key) | Clean output, full control over markup, no iframe, filter by rating | Needs Google Places API key setup; £0 plugin cost but API has usage limits |
| **Trustindex** | Third-party embed (their servers) | Zero API setup, auto-updates | Markup not controllable, their branding unless paid plan, external JS dependency |
| **WP Reviews Bundle** | Aggregates Google + other platforms | Good if multi-platform reviews wanted later | Overkill for Google-only; heavier |
| **Direct Google Places API** | Custom PHP/JS in theme | Maximum control, exact markup match to design | Ongoing API key management, caching layer needed |

**Recommendation: WP Business Reviews.** It pulls Google reviews via the Places API with server-side caching, outputs clean markup you can override with CSS, and doesn't insert third-party JS. The Places API key setup is a one-time task. Template overrides let the render match the site's design system exactly.

**Placement:** A dedicated full-reviews section can live on:
- The **About page** (logical home — "What our students say" near the trainer bio)
- A new **`/reviews/` page** (overkill unless the client wants a standalone trust page)

Recommendation: About page, as a new `block-reviews-full` SCF block positioned after `block-about-trainer`. This gives it SEO value on the page most likely to rank for the trainer's name.

**Open decision: OD-01** — Dave confirms plugin choice and placement.

---

## 7. Online Courses (Tutor LMS) Integration

### Design context

`courses.html` shows an 8-card grid (`.cs-archive`) and individual course links currently pointing to `#`. The design is static — no Tutor LMS markup, no course single page design.

### Option A — Tutor LMS

Install Tutor LMS. The `/courses/` page becomes the Tutor LMS course archive. The archive template (`archive-sfwd-courses.php` or the Tutor LMS default) is styled to match the `.cs-archive` card grid from the design. Each card links to a Tutor LMS course single page.

- Pros: Students can purchase and access course content online; progress tracking; certificates.
- Cons: Tutor LMS adds complexity to the theme template layer; single course page design doesn't exist yet; plugin install required.

### Option B — Hand-rolled CPT or ACF Block

Register `cnc-course` CPT (or keep as an ACF repeater block on the Courses page). No LMS functionality — courses link to an enquiry form or a static single page.

- Pros: Simple, full design control, no plugin dependency.
- Cons: No student login, no content gating, no progress tracking.

### Option C — Hybrid

Courses page uses hand-rolled 8-card grid (ACF block or CPT archive) now. Tutor LMS is installed later when course content is ready, at which point the archive template is swapped.

**Open decision: OD-05** — Dave confirms whether Tutor LMS is installed in this build phase, or deferred.

---

## 8. Plugin Stack

| Plugin | Purpose | Required |
|---|---|---|
| Secure Custom Fields (SCF) | All ACF blocks | Yes |
| Fluent Forms | All forms (contact, onsite enquiry) | Yes |
| Tutor LMS | Online course delivery | OD-05 |
| WP Business Reviews | Full Google reviews section | OD-01 |
| Yoast SEO or Rank Math | SEO meta, OG tags, sitemap | Yes — pick one |
| WP Rocket or Perfmatters | Caching / performance | Recommend WP Rocket |
| Imagify or Smush | Image optimisation | One of these |

No other plugins. Every feature not in this list is built in-theme.

---

## 9. Token Setup

All CSS custom properties follow the `--ns-` prefix convention and must match Figma variable names exactly.

### Token file location

`tailwind/custom/tokens.css` — overwrite placeholders from base theme.

### Required tokens (extract from Figma before Execute)

```css
/* Colours */
--ns-color-ink:          /* body text */
--ns-color-ink-muted:    /* secondary text */
--ns-color-canvas:       /* background */
--ns-color-surface:      /* card/panel background */
--ns-color-brand:        /* primary brand colour */
--ns-color-brand-dark:   /* brand hover/active */
--ns-color-rule:         /* borders, dividers */
--ns-color-anchor:       /* dark sections background */

/* Typography */
--ns-heading-h1:         /* clamp() */
--ns-heading-h2:         /* clamp() */
--ns-heading-h3:         /* clamp() */
--ns-heading-h4:         /* clamp() */
--ns-heading-h5:         /* clamp() */
--ns-heading-h6:         /* clamp() */
--ns-text-large:         /* 20px scaled */
--ns-text-medium:        /* 18px scaled */
--ns-text-regular:       /* 16px scaled */
--ns-text-small:         /* 14px scaled */
--ns-text-tiny:          /* 12px scaled */

/* Spacing */
--ns-section-padding-y:  /* vertical section spacing */
--ns-container-max:      /* max-w-wide value */

/* Radius */
--ns-radius-card:
--ns-radius-image:
--ns-radius-button:

/* Opacity */
--ns-opacity-muted:
```

All font sizes use `clamp()` with 375px → 1440px range. Formula: `clamp(min_rem, intercept_rem + slope_vw, max_rem)`.

### Typography

Font family from Figma — to be confirmed from design file. Self-hosting via `@font-face` in `tailwind/custom/base.css` if Google Fonts is not used. **Open decision: OD-08** — Google Fonts CDN vs self-hosted.

---

## 10. CSS Architecture

```
tailwind/
  tailwind.css              ← entry point — @import-glob pulls everything
  custom/
    tokens.css              ← all CSS custom properties
    base.css                ← reset, body, heading sizes, text- classes, btn- classes
    components/
      blocks.css            ← block-level component CSS (ported from design.css)
      layout.css            ← section-padding, max-w-wide, container utilities
      flourishes.css        ← fx-* decorative elements, reviews-widget
      nav.css               ← .nav, .drawer, .nav-scroll
      footer.css            ← .footer, .footer-nav
      forms.css             ← Fluent Forms overrides, input/button styles
```

`design/design.css` and `design/page-*.css` BEM rules are ported into the relevant file above, with hardcoded values swapped for `var(--ns-*)` tokens. Tailwind utilities available in markup for one-offs but primary architecture is BEM + component CSS.

---

## 11. Theme File Structure

```
theme/
  _ns/
    functions.php           ← CPT/taxonomy registration, Customizer, menu registration, block registration
    inc/
      customizer.php        ← All Customizer sections/controls/sanitize
      blocks.php            ← _ns_register_acf_blocks() — every block entry
      post-types.php        ← register_post_type(), register_taxonomy()
      nav-walkers.php       ← custom Walker_Nav_Menu subclasses
    front-page.php          ← Home page template
    page.php                ← Default page template
    home.php                ← Learning Hub archive (blog page)
    single.php              ← Article single
    archive-cnc-course.php  ← Course CPT archive (if OD-03/OD-05 resolves to CPT)
    single-cnc-course.php   ← Course CPT single (if registered)
    template-parts/
      nav.php
      footer.php
      reviews-widget.php    ← reusable reviews widget partial
    blocks/
      block-hero/
        block.json
        render.php
        fields.php
      block-authority/
        ...
      [one directory per block]
    javascript/
      script.js             ← nav scroll + drawer + year + Learning Hub filter
    tailwind/               ← as above
    style.css               ← compiled output
```

---

## 12. Learning Hub Archive (home.php) Architecture

The Learning Hub is the static front page for the blog (`home.php`). The filter UI and card grid are rendered server-side by `home.php` with WP_Query; filtering is handled client-side by JS.

### Filter data attributes

Each `.lh-card` receives:
```html
<article class="lh-card"
  data-title="..."
  data-dek="..."
  data-controls="fanuc siemens"
  data-skill="beginner"
  data-type="guide">
```

`data-controls`, `data-skill`, `data-type` are space-separated term slugs from the post's taxonomies (`cnc-control`, `cnc-skill`, `category`).

### Filter JS behaviour

- Filter pills toggle an `is-active` class.
- Active filters are collected and compared against card data attributes.
- Non-matching cards get `hidden` attribute or `display: none`.
- Filter state is serialised into URL params (`?control=fanuc&skill=beginner`) for shareable links.
- Empty state (`.lh-empty`) shown when no cards match.
- Search input filters on `data-title` and `data-dek` strings.

JS lives in `javascript/script.js` (not a block-scoped file — it's page-level behaviour for a template file).

### Pagination

Standard WordPress pagination via `paginate_links()`. JavaScript filtering operates on the current page's rendered cards only. If full cross-page filtering is needed, this becomes AJAX — flagged as **OD-07**.

---

## 13. Execution Plan — Bounded Segmented Build

Build executes in 9 segments. One agent dispatch per segment. Each segment has a Linear issue (seeded at Execute kickoff, not now).

| Segment | Work | Estimated sessions |
|---|---|---|
| **S1 — Theme Foundation** | Clone base theme, set tokens from Figma, register CPTs/taxonomies, Customizer controls, nav/footer walkers, register block names in functions.php | 1 |
| **S2 — Nav + Footer + Template Parts** | `nav.php`, `footer.php`, `template-parts/reviews-widget.php`, JS (scroll + drawer + year) | 1 |
| **S3 — Home Page Blocks** | `block-hero`, `block-agitation`, `block-positioning`, `block-mechanism`, `block-services-grid` | 1 |
| **S4 — Canonical Shared Blocks** | `block-authority`, `block-hub-preview`, `block-faq`, `block-decisiveness`, `block-who`, `block-disqualifier` | 1 |
| **S5 — Service Page Blocks** | `block-included-list`, `block-outcome`, `block-pricing-narrative`, `block-course-sheet`, `block-offer-list`, `block-pricing-grid`, `block-osm-map`, `block-svc-cta-form` | 1 |
| **S6 — Programming + Courses Blocks** | `block-prog-offer`, `block-plan-steps`, `block-bundle-list`, `block-goal-editorial`, `block-pricing-rates`, `block-warn-list`, `block-cs-archive`, `block-how-it-works`, `block-anti-positioning` | 1 |
| **S7 — About + Contact Blocks** | `block-about-trainer`, `block-known`, `block-indep`, `block-where`, `block-contact-band`, `block-contact-form`, `block-other-ways`, `block-trust-strip` | 1 |
| **S8 — Learning Hub Templates** | `home.php`, filter JS, Learning Hub CSS, `single.php`, article template styles | 1 |
| **S9 — QA + Handover** | Checklist pass on all blocks, content entry with real copy, plugin installs (Fluent Forms, WP Business Reviews, Tutor LMS if OD-05 approved), SEO plugin config, OG image | 1 |

Each segment: Linear issue `Todo → In Progress` before touching a file. Linear issue `Done` immediately on verified completion. Max 15 minutes without a state transition. One workpad comment per issue.

---

## 14. Open Decisions

The following items cannot be fully spec'd without Dave's input. Each must be resolved before the relevant segment begins.

| # | Decision | Options | Must resolve before |
|---|---|---|---|
| **OD-01** | Google reviews full-section plugin | WP Business Reviews (recommended) vs Trustindex vs WP Reviews Bundle vs custom Places API | S7 (About page) |
| **OD-02** | Google reviews full-section placement | About page (recommended) vs new `/reviews/` page | S7 |
| **OD-03** | Classroom courses CPT vs ACF repeater block | CPT with individual course pages gives SEO value and single-course content; ACF repeater block is simpler and matches current design exactly | S5 (Classroom) |
| **OD-04** | Online courses CPT slug | `cnc-course` (recommended) vs `course` | S1 (Theme Foundation) |
| **OD-05** | Tutor LMS install now vs defer | Install Tutor LMS in this build phase vs hand-roll the 8-card grid as an ACF block and defer LMS | S1 / S6 |
| **OD-06** | Hub preview featured article | Fixed relation field (editor picks the featured article) vs always pull latest post dynamically | S4 |
| **OD-07** | Learning Hub pagination scope | JS filter operates on current-page cards only (simpler, standard WP pagination) vs AJAX full-library filter (complex, no standard WP pagination) | S8 |
| **OD-08** | Font loading strategy | Google Fonts CDN vs self-hosted `@font-face` | S1 |
| **OD-09** | Classroom venue address + OSM coordinates | Client must supply exact address, postcode, and OSM embed URL before content entry | S5 / S9 content entry |

---

## Appendix — Design Source Files

All blocks implemented from real design HTML — no assumptions from generic patterns.

| File | Status |
|---|---|
| `design/home.html` | Read — 7 sections mapped |
| `design/onsite-training.html` | Read — 11 sections mapped |
| `design/classroom-training.html` | Read — 12 sections mapped |
| `design/programming-services.html` | Read — 11 sections mapped |
| `design/about.html` | Read — 9 sections mapped |
| `design/learning-hub.html` | Read — 4 sections mapped |
| `design/courses.html` | Read — 6 sections mapped |
| `design/contact.html` | Read — 4 sections mapped |
| `design/learning-hub-article.html` | Read — 5 sections mapped |
| `design/flourishes.css` | Read — all flourish patterns mapped |
| `design/design.css` | Referenced for BEM class vocabulary |

Copy source: `copy/*.md` — all render templates pull content from ACF fields seeded from approved copy. Developer does not invent copy.
