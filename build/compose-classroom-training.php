<?php
/**
 * Compose: Classroom Training page
 * Run: wp eval-file wp-content/themes/cnc-training-centre/build/compose-classroom-training.php
 *
 * Copy: v4 rewrite 2026-07-24 — cut hard, straight to the point, David's voice.
 * Changes vs live: Amelia events calendar REMOVED from this page (now on each
 * course page); course-sheet rows link to the 8 new /classroom-training/ child pages.
 *
 * Section order:
 *  1. .hero.ct-hero             → block-hero
 *  2. .problem.who              → block-who
 *  3. .services.courses         → block-course-sheet   (links to 8 course pages)
 *  4. .authority.expect         → block-offer-list     (what to expect)
 *  5. .offer                    → block-offer-list     (what's included)
 *  6. .outcome                  → block-outcome
 *  7. .pricing                  → block-pricing-grid
 *  8. .disq                     → block-disqualifier
 *  9. .authority.auth           → block-authority
 * 10. .faq                      → block-faq
 * 11. .find                     → block-osm-map
 * 12. .hub                      → block-hub-preview
 * 13. .contact.decisiveness     → block-decisiveness
 */

require __DIR__ . '/lib/compose.php';

$content = '';

// ── 1. HERO ──────────────────────────────────────────────────────────────────
$content .= ns_block( 'block-hero', [
	'variant'       => 'service',
	'eyebrow'       => 'Classroom CNC training. Barwell, Leicestershire.',
	'heading'       => 'Two days. Real controls. [em]Walk out able to set a machine.[/em]',
	'lede'          => 'You can press cycle-start. You can\'t write the cycle yet. Two days in Barwell and that changes.',
	'primary_cta'   => [ 'url' => '#courses', 'title' => 'Pick your course', 'target' => '' ],
	'secondary_cta' => [ 'url' => 'tel:07834858407', 'title' => 'Call 07834 858 407', 'target' => '' ],
	'show_reviews'  => '0',
] );

// ── 2. WHO ────────────────────────────────────────────────────────────────────
$content .= ns_block( 'block-who', [
	'heading'         => 'If you\'ve finished your apprenticeship and [em]the interesting stuff stopped.[/em]',
	'body_left'       => '<p>You\'re on a CNC, stuck at operator level, wanting to move into programming. Or a manual machinist breaking into CNC properly. Or a company sending one or two people rather than booking me onsite.</p>',
	'body_right'      => '<p>Small group, real simulators, the same teaching I do onsite. No syllabus you could\'ve downloaded for free. You learn by doing.</p>',
	'show_pullquote'  => '0',
	'pullquote_text'  => '',
	'pullquote_cite'  => '',
	'show_coda'       => '0',
	'coda'            => '',
] );

// ── 3. COURSE-SHEET (links to the 8 course pages) ─────────────────────────────
$content .= ns_block( 'block-course-sheet', [
	'pretitle'    => 'Courses',
	'heading'     => 'Eight courses. [em]Pick the one that meets you where you are.[/em]',
	'lede'        => 'Every course runs at Barwell on real-control simulators. Dates and applications are on each course page.',
	'meta_string' => '08 / 08 listed · Apply per course',
	'rows'        => [
		[
			'index' => '01',
			'name'  => 'Beginners Milling Operator',
			'rate'  => '2 days · <strong>£600</strong> + VAT',
			'lede'  => 'New to CNC milling. Axes, tooling, tool setting, measuring. The course to take before the programming one.',
			'url'   => '/classroom-training/beginners-milling-operator/',
		],
		[
			'index' => '02',
			'name'  => 'Beginners Turning Operator',
			'rate'  => '2 days · <strong>£600</strong> + VAT',
			'lede'  => 'Same shape as the milling course, on lathes. Turret, chuck, spindle, tool setting, measuring.',
			'url'   => '/classroom-training/beginners-turning-operator/',
		],
		[
			'index' => '03',
			'name'  => 'Setter Operator: Milling',
			'rate'  => '2 days · <strong>£600</strong> + VAT',
			'lede'  => 'You can press cycle-start. Now set the machine yourself. Offsets, datums, proving out a new program.',
			'url'   => '/classroom-training/setter-operator-milling/',
		],
		[
			'index' => '04',
			'name'  => 'Setter Operator: Turning',
			'rate'  => '2 days · <strong>£600</strong> + VAT',
			'lede'  => 'The lathe equivalent. Turret setup, work shift datum, tool offsets, proving out.',
			'url'   => '/classroom-training/setter-operator-turning/',
		],
		[
			'index' => '05',
			'name'  => 'Learn to Program: Milling',
			'rate'  => '2 days · <strong>£600</strong> + VAT',
			'lede'  => 'Write G-code by hand for milling. Canned cycles, datums, sub programs. Leave able to program from a drawing.',
			'url'   => '/classroom-training/learn-to-program-milling/',
		],
		[
			'index' => '06',
			'name'  => 'Learn to Program: Turning',
			'rate'  => '2 days · <strong>£600</strong> + VAT',
			'lede'  => 'Lathe programming from scratch. Roughing cycles, profiles, threading. Leave able to program a turned part.',
			'url'   => '/classroom-training/learn-to-program-turning/',
		],
		[
			'index' => '07',
			'name'  => 'Edgecam Milling',
			'rate'  => '2 days · <strong>£600</strong> + VAT',
			'lede'  => 'CAD/CAM for milling in Edgecam. Model in, posted code out, on my professional licence.',
			'url'   => '/classroom-training/edgecam-milling/',
		],
		[
			'index' => '08',
			'name'  => 'Edgecam Turning',
			'rate'  => '2 days · <strong>£600</strong> + VAT',
			'lede'  => 'The turning side of Edgecam. From solid model to tested code on a real lathe.',
			'url'   => '/classroom-training/edgecam-turning/',
		],
	],
	'surface' => 's-paper',
] );

// ── 4. OFFER-LIST — What to expect ───────────────────────────────────────────
$content .= ns_block( 'block-offer-list', [
	'pretitle' => 'What to expect',
	'heading'  => 'Six simulators. [em]One to six of you.[/em]',
	'lede'     => '',
	'items'    => [
		[ 'text' => '<strong>Group size.</strong> One to six students. The course runs even with one.' ],
		[ 'text' => '<strong>Length.</strong> Two days. 9.30am to 4pm.' ],
		[ 'text' => '<strong>Format.</strong> I teach, you do. Worked examples, then your attempt. No long lectures.' ],
		[ 'text' => '<strong>Pace.</strong> I adapt to the room. If something\'s not clicking, I stay with it.' ],
		[ 'text' => '<strong>Certificate.</strong> Issued on completion, per student.' ],
		[ 'text' => '<strong>Where.</strong> Barwell, Leicestershire. Directions sent on application.' ],
	],
	'surface' => 's-paper-tint',
] );

// ── 5. OFFER-LIST — What's included ──────────────────────────────────────────
$content .= ns_block( 'block-offer-list', [
	'pretitle' => 'What\'s included',
	'heading'  => 'Real simulators, real instructor, [em]real certificate.[/em]',
	'lede'     => '',
	'items'    => [
		[ 'text' => 'Your own simulator station. Real control, real G-code, the same interfaces as the shop floor.' ],
		[ 'text' => 'All the teaching in person, by me. Not a junior trainer, not a video.' ],
		[ 'text' => 'Certificate per student on completion.' ],
		[ 'text' => 'Course notes to take home.' ],
		[ 'text' => 'Free course-selection call before you book. Five minutes, no charge.' ],
		[ 'text' => 'Lunch, tea and coffee thrown in. Accommodation list sent with confirmation.' ],
	],
	'surface' => 's-paper',
] );

// ── 6. OUTCOME ────────────────────────────────────────────────────────────────
$content .= ns_block( 'block-outcome', [
	'pretitle' => 'After the course',
	'heading'  => 'What does your CV look like [em]three months from now?[/em]',
	'body'     => '<p>You walk into the new job and you\'re not bluffing. You know what offsets are. You know what to do when the cycle stops. Or you go back to work on Monday, apply something specific, and your manager notices.</p>',
	'layout'   => 'single',
	'surface'  => 's-paper-tint',
] );

// ── 7. PRICING-GRID ───────────────────────────────────────────────────────────
$content .= ns_block( 'block-pricing-grid', [
	'pretitle'      => 'Pricing',
	'heading'       => '£300 per student per day. [em]Plus VAT.[/em]',
	'lede'          => '<p>Every course is two days: £600 plus VAT per student, £720 all in. Companies sponsoring someone pay the same rate. Sending three or more people? Onsite at £700/day for the whole team is usually the better number.</p>',
	'alt_link'      => [ 'url' => '/onsite-training/', 'title' => 'See onsite training instead', 'target' => '' ],
	'list_a_heading' => 'What that gets you',
	'list_a_style'   => 'ns-list-plus',
	'list_a_items'   => [
		[ 'text' => 'Place on the course at Barwell' ],
		[ 'text' => 'A simulator station for the duration' ],
		[ 'text' => 'All the teaching, in person, by me' ],
		[ 'text' => 'Certificate on completion' ],
	],
	'list_b_heading' => 'What\'s not included',
	'list_b_style'   => 'ns-list-bullet',
	'list_b_items'   => [
		[ 'text' => 'Travel to Barwell' ],
		[ 'text' => 'Accommodation (recommendations sent with confirmation)' ],
	],
	'surface' => 's-paper',
] );

// ── 8. DISQUALIFIER ───────────────────────────────────────────────────────────
$content .= ns_block( 'block-disqualifier', [
	'pretitle' => 'Not for everyone',
	'heading'  => 'If any of these are you, [em]save your £300 and don\'t book.[/em]',
	'lede'     => '',
	'items'    => [
		[
			'index' => 'A',
			'name'  => 'You want a degree.',
			'body'  => 'This is practical training. The certificate evidences competence, it doesn\'t replace an HNC or an apprenticeship.',
		],
		[
			'index' => 'B',
			'name'  => 'You can\'t travel to Barwell.',
			'body'  => 'Start with the online courses or the Learning Hub instead.',
		],
		[
			'index' => 'C',
			'name'  => 'You\'ve never been near a machine.',
			'body'  => 'The beginners courses assume you understand the basics of metal cutting. The Hub will get you to a useful starting point first.',
		],
		[
			'index' => 'D',
			'name'  => 'You\'re sending five people from one company.',
			'body'  => 'At that size, onsite on your own machines is the better call. Ring me and I\'ll scope it that way.',
		],
	],
	'footer_note' => '',
	'surface'     => 's-paper-tint',
] );

// ── 9. AUTHORITY ─────────────────────────────────────────────────────────────
$content .= ns_block( 'block-authority', [
	'variant'      => 'standard',
	'heading'      => 'Same hands teaching now [em]as in 1996.[/em]',
	'lede'         => 'Same instructor on every course. Not a franchise, not a rotating bench of trainers. Me. Watch hundreds of hours of my teaching on YouTube before you apply.',
	'spec_items'   => [
		[ 'label' => 'Training on CNC machines',   'value' => '30',    'note' => 'years', 'wide' => '0' ],
		[ 'label' => 'Five-star reviews on Google', 'value' => '30',   'note' => '',      'wide' => '0' ],
		[ 'label' => 'CNC simulators in classroom', 'value' => '6',    'note' => '',      'wide' => '0' ],
		[ 'label' => 'YouTube subscribers',         'value' => '8,930','note' => '',      'wide' => '0' ],
		[ 'label' => 'LinkedIn followers',          'value' => '27,000','note' => '',     'wide' => '0' ],
	],
	'show_reviews' => '1',
] );

// ── 10. FAQ ───────────────────────────────────────────────────────────────────
$content .= ns_block( 'block-faq', [
	'heading' => 'What gets asked [em]before someone applies?[/em]',
	'items'   => [
		[
			'question' => 'Will this course get me a job?',
			'answer'   => '<p>A certificate alone won\'t. The certificate plus skills you\'ll actually use on the floor will. I\'ve had students go from a beginners course to an operator job within a month.</p>',
		],
		[
			'question' => 'Which course do I need?',
			'answer'   => '<p>Never run a CNC: beginners. Can press cycle-start but can\'t set the machine: setter operator. Can set it but can\'t program: Learn to Program. Not sure: ring me, five minutes settles it.</p>',
		],
		[
			'question' => 'How many people are on each course?',
			'answer'   => '<p>One to six. The course runs even with one applicant. You just get more one-to-one time.</p>',
		],
		[
			'question' => 'Can my employer pay for me?',
			'answer'   => '<p>Yes, lots do. I\'ll invoice the company direct, or you pay and reclaim.</p>',
		],
		[
			'question' => 'Are the simulators the same as real machines?',
			'answer'   => '<p>They run real controls. Same Fanuc interfaces you\'ll see on the floor. The G-code you write here runs on a real machine without rewriting. The only thing missing is the swarf.</p>',
		],
		[
			'question' => 'Do you offer accommodation?',
			'answer'   => '<p>No, but Barwell has half a dozen hotels and B&Bs within ten minutes. Recommendations sent with your confirmation.</p>',
		],
	],
] );

// ── 11. OSM-MAP ───────────────────────────────────────────────────────────────
$content .= ns_block( 'block-osm-map', [
	'heading_pretitle' => 'Location',
	'heading'          => 'Barwell, Leicestershire.',
	'body'             => 'The training facility is in Barwell, just outside Hinckley. Postcode and directions sent with your booking confirmation.',
	'address_lines'    => [
		[ 'label' => 'Town',       'value' => 'Barwell, Leicestershire' ],
		[ 'label' => 'Directions', 'value' => 'Sent with booking confirmation' ],
	],
	'parking_note'  => '',
	'iframe_src'    => 'https://www.openstreetmap.org/export/embed.html?bbox=-1.3803%2C52.5590%2C-1.3403%2C52.5790&layer=mapnik&marker=52.5690%2C-1.3603',
	'map_caption'   => 'Barwell, Leicestershire',
	'map_link_url'  => 'https://www.openstreetmap.org/?mlat=52.5690&mlon=-1.3603#map=14/52.5690/-1.3603',
	'map_link_text' => 'View larger map',
	'surface'       => 's-paper',
] );

// ── 12. HUB-PREVIEW ──────────────────────────────────────────────────────────
$content .= ns_block( 'block-hub-preview', [
	'heading'         => 'Free reading before you apply.',
	'lede'            => 'Hundreds of articles on G-code, setup and programming. Arrive on day one already ahead.',
	'cta'             => [ 'url' => '/learning-hub/', 'title' => 'Go to the Learning Hub', 'target' => '' ],
	'secondary_items' => [],
] );

// ── 13. DECISIVENESS ─────────────────────────────────────────────────────────
$content .= ns_block( 'block-decisiveness', [
	'heading'       => 'Five minutes on the phone. [em]Quickest way to pick.[/em]',
	'lede'          => 'Ring me on 07834 858 407 if you\'d rather talk it through than fill in a form.',
	'primary_cta'   => [ 'url' => '#courses', 'title' => 'Pick your course', 'target' => '' ],
	'secondary_cta' => [ 'url' => 'tel:07834858407', 'title' => 'Call 07834 858 407', 'target' => '' ],
	'phone'         => '07834 858 407',
	'email'         => 'david@cnctrainingcentre.com',
] );

// ── UPSERT ────────────────────────────────────────────────────────────────────
ns_upsert_page( 'classroom-training', 'Classroom Training', $content );

WP_CLI::success( 'classroom-training composed.' );
