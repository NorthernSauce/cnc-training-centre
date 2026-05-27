<?php
/**
 * Compose: Classroom Training page
 * Run: wp eval-file wp-content/themes/cnc-training-centre/build/compose-classroom-training.php
 */

require '/Users/davidmerton/Local Sites/cnctrainingcentre/app/public/wp-content/themes/cnc-training-centre/build/lib/compose.php';

$content = '';

// ── 1. HERO ──────────────────────────────────────────────────────────────────
$content .= ns_block( 'block-hero', [
	'variant'       => 'service',
	'eyebrow'       => 'Classroom CNC training. Barwell, Leicestershire.',
	'heading'       => 'Two days. Real controls. Walk out able to set a machine.',
	'heading_em'    => '',
	'lede'          => 'You can press cycle-start. You can\'t write the cycle yet. Two days in Leicestershire and that changes.',
	'primary_cta'   => [ 'url' => '/courses/', 'title' => 'See all courses', 'target' => '' ],
	'secondary_cta' => [ 'url' => 'tel:07834858407', 'title' => 'Call 07834 858 407', 'target' => '' ],
	'show_reviews'  => '0',
] );

// ── 2. WHO ────────────────────────────────────────────────────────────────────
$content .= ns_block( 'block-who', [
	'heading'         => 'If you\'ve finished your apprenticeship and the interesting stuff stopped',
	'body_left'       => '<p>You\'re in your 20s, 30s, 40s. Already on a CNC, stuck at operator level and wanting to move into programming. Or a manual machinist, fabricator, setter on a different process, looking to break into CNC properly. Or finished an apprenticeship that stopped before the programming bit started.</p><p>I also get companies sending one or two people on a scheduled course rather than booking me onsite. Usually because the team is small, the budget is tight, or the operator needs lifting from beginner to setter and a structured course fits better than me arriving for two days.</p>',
	'body_right'      => '<p>Either way, the classroom works the same way. Small group, real simulators, the same teaching approach I use onsite. No fixed agenda, no syllabus you could\'ve downloaded for free, no PowerPoint. You learn by doing.</p>',
	'show_pullquote'  => '0',
	'pullquote_text'  => '',
	'pullquote_cite'  => '',
	'show_coda'       => '0',
	'coda'            => '',
] );

// ── 3. COURSE-SHEET ───────────────────────────────────────────────────────────
$content .= ns_block( 'block-course-sheet', [
	'pretitle'    => 'Courses',
	'heading'     => 'Eight courses. Pick the one that meets you where you are.',
	'lede'        => 'Each course runs scheduled or on-demand if you\'ve got two or more. Application is per course.',
	'meta_string' => '08 / 08 listed · Apply per course',
	'rows'        => [
		[
			'index' => '01',
			'name'  => 'Beginners: Milling',
			'rate'  => '2 days · <strong>£600</strong> + VAT',
			'lede'  => 'New to CNC milling. Reading a programme, setting tools, work offsets, basic G-code. Walk out able to set up a job from scratch and run it.',
			'url'   => '',
		],
		[
			'index' => '02',
			'name'  => 'Beginners: Turning',
			'rate'  => '2 days · <strong>£600</strong> + VAT',
			'lede'  => 'Same shape as the milling beginners course, on lathe simulators. Tool turret setup, work offsets, basic turning cycles, common lathe G-codes.',
			'url'   => '',
		],
		[
			'index' => '03',
			'name'  => 'Setter / Operator: Milling',
			'rate'  => '2 days · <strong>£600</strong> + VAT',
			'lede'  => 'For operators who can press cycle-start but want to set the machine themselves. Tool length offsets, work coordinate systems, edge-finding, first-off inspection, dealing with a crash without panicking.',
			'url'   => '',
		],
		[
			'index' => '04',
			'name'  => 'Setter / Operator: Turning',
			'rate'  => '2 days · <strong>£600</strong> + VAT',
			'lede'  => 'Lathe equivalent. Setting the turret, work offsets, dealing with bar feed, common turning problems on the shop floor.',
			'url'   => '',
		],
		[
			'index' => '05',
			'name'  => 'Learn to Program: Milling',
			'rate'  => '2 days · <strong>£600</strong> + VAT',
			'lede'  => 'Beyond running someone else\'s programme. Writing G-code by hand for milling work, canned cycles, cutter compensation, sub-routines. You leave able to write a programme from a drawing.',
			'url'   => '',
		],
		[
			'index' => '06',
			'name'  => 'Learn to Program: Turning',
			'rate'  => '2 days · <strong>£600</strong> + VAT',
			'lede'  => 'Lathe programming from scratch. Roughing and finishing cycles, threading, grooving, parting. You finish able to programme a typical turned part hand-coded.',
			'url'   => '',
		],
		[
			'index' => '07',
			'name'  => 'Macro Programming',
			'rate'  => '[GAP — confirm] days · price on course page',
			'lede'  => 'For programmers who want to move past basic G-code into parametric programming. Macro variables, IF/THEN/GOTO logic, custom canned cycles, talking to the control properly. Separates programmers from people who copy programmes.',
			'url'   => '',
		],
		[
			'index' => '08',
			'name'  => 'Edgecam',
			'rate'  => '[GAP — confirm] days · price on course page',
			'lede'  => 'CAD/CAM training in Edgecam, using my professional licence in the classroom. Cover the workflow from importing a model to posting tested G-code. Suits programmers moving from hand-code to CAM, or companies adopting Edgecam in-house.',
			'url'   => '',
		],
	],
	'surface' => 's-paper',
] );

// ── 4. OFFER-LIST (What's included / Six simulators) ─────────────────────────
$content .= ns_block( 'block-offer-list', [
	'pretitle' => 'What to expect',
	'heading'  => 'Six simulators. One to six of you.',
	'lede'     => '',
	'items'    => [
		[ 'text' => '<strong>Group size.</strong> One to six students. Even with one applicant the course runs. You get a more intensive week.' ],
		[ 'text' => '<strong>Length.</strong> Most courses run two or three days. Macro programming and Edgecam usually run longer.' ],
		[ 'text' => '<strong>Format.</strong> I teach, you do. Worked examples, then your attempt, then the next problem. No long lectures.' ],
		[ 'text' => '<strong>Pace.</strong> I adapt to the room. If you\'re flying, I cover more ground. If something\'s not clicking, I stay with it until it does.' ],
		[ 'text' => '<strong>Certificate.</strong> Issued on completion, per student. Useful for your CV, your employer\'s records, your own evidence of competence.' ],
		[ 'text' => '<strong>Where.</strong> Barwell, Leicestershire. Postcode and directions sent on application.' ],
	],
	'surface' => 's-paper-tint',
] );

// ── 5. PRICING-GRID ───────────────────────────────────────────────────────────
$content .= ns_block( 'block-pricing-grid', [
	'pretitle'      => 'Pricing',
	'heading'       => '£300 per student per day. Plus VAT.',
	'lede'          => '<p>Classroom rate is £300 per student per day. Two-day course is £600 plus VAT. Three-day course is £900. Macro programming and Edgecam run longer and are priced on the course page.</p><p>Companies sponsoring an individual on a scheduled course pay the same per-student rate. If you\'re a company sending three or more people, an onsite engagement at £700/day for the whole team is usually the better number. Happy to scope it either way on the enquiry call.</p>',
	'alt_link'      => [ 'url' => '/onsite-training/', 'title' => 'See onsite training instead', 'target' => '' ],
	'list_a_heading' => 'What that gets you',
	'list_a_style'   => 'ns-list-plus',
	'list_a_items'   => [
		[ 'text' => 'Place on the course at the Barwell facility' ],
		[ 'text' => 'A simulator station for the duration' ],
		[ 'text' => 'All the teaching, in person, by me' ],
		[ 'text' => 'Certificate on completion' ],
	],
	'list_b_heading' => 'What\'s not included',
	'list_b_style'   => 'ns-list-bullet',
	'list_b_items'   => [
		[ 'text' => 'Travel to Barwell (you make your own way)' ],
		[ 'text' => 'Accommodation if you\'re staying over (recommendations sent with confirmation)' ],
		[ 'text' => 'Lunch (most days the group walks to the local at midday, or bring your own)' ],
	],
	'surface' => 's-paper',
] );

// ── 6. OUTCOME ────────────────────────────────────────────────────────────────
$content .= ns_block( 'block-outcome', [
	'pretitle' => 'What changes',
	'heading'  => 'What does your CV look like three months from now?',
	'body'     => '<p>You walk in on day one of the new job and you\'re not bluffing. You know what offsets are. You know what to do when the cycle stops. You\'re not the person everyone wishes had been trained properly before they got handed the keys.</p><p>If you\'re already employed, you go back to work the Monday after the course and apply something specific. Your manager notices. The next time programming work comes up, your name\'s in the conversation.</p>',
	'layout'   => 'single',
	'surface'  => 's-paper-tint',
] );

// ── 7. OSM-MAP ────────────────────────────────────────────────────────────────
// Barwell, Leicestershire placeholder coordinates. Real address from Customizer field.
$content .= ns_block( 'block-osm-map', [
	'heading_pretitle' => 'Location',
	'heading'          => 'Barwell, Leicestershire.',
	'body'             => 'The training facility is in Barwell, Leicestershire. Postcode and directions are sent with your booking confirmation.',
	'address_lines'    => [
		[ 'label' => 'Town',   'value' => 'Barwell, Leicestershire' ],
		[ 'label' => 'Directions', 'value' => 'Sent with booking confirmation' ],
	],
	'parking_note'  => '',
	'iframe_src'    => 'https://www.openstreetmap.org/export/embed.html?bbox=-1.3803%2C52.5590%2C-1.3403%2C52.5790&layer=mapnik&marker=52.5690%2C-1.3603',
	'map_caption'   => 'Barwell, Leicestershire',
	'map_link_url'  => 'https://www.openstreetmap.org/?mlat=52.5690&mlon=-1.3603#map=14/52.5690/-1.3603',
	'map_link_text' => 'View larger map',
	'surface'       => 's-paper',
] );

// ── 8. DISQUALIFIER ───────────────────────────────────────────────────────────
$content .= ns_block( 'block-disqualifier', [
	'pretitle' => 'Not for everyone',
	'heading'  => 'If any of these are you, save your £300 and don\'t book.',
	'lede'     => '',
	'items'    => [
		[
			'index' => 'A',
			'name'  => 'You want a degree.',
			'body'  => 'Practical training, not academic. The certificate evidences competence on the course content. Doesn\'t replace an HNC, an engineering degree, or a formal apprenticeship.',
		],
		[
			'index' => 'B',
			'name'  => 'You can\'t travel to Barwell.',
			'body'  => 'Online courses are coming but aren\'t live yet. The Learning Hub is the best free starting point until self-paced courses launch.',
		],
		[
			'index' => 'C',
			'name'  => 'You\'re a complete beginner who hasn\'t seen a CNC.',
			'body'  => 'The beginners courses assume you\'ve at least been near a machine and understand the basics of metal cutting. If you\'re starting from zero, the Hub has months of reading that\'ll get you to a useful starting point.',
		],
		[
			'index' => 'D',
			'name'  => 'You\'re sending five people from one company.',
			'body'  => 'At that group size, onsite training on your own machines is almost always the better economic and practical choice. Call me. I\'ll scope it that way instead.',
		],
	],
	'footer_note' => '',
	'surface'     => 's-paper-tint',
] );

// ── 9. AUTHORITY ─────────────────────────────────────────────────────────────
$content .= ns_block( 'block-authority', [
	'variant'      => 'standard',
	'heading'      => 'Same hands teaching now as in 1996.',
	'lede'         => 'Same instructor on every course. Not a rotating bench of trainers. Not a franchise model. Me. You can watch hundreds of hours of my teaching style on the YouTube channel before you ever fill in an application form.',
	'spec_items'   => [
		[ 'label' => 'Training on CNC machines',   'value' => '30',    'note' => 'years', 'wide' => '0' ],
		[ 'label' => 'Five-star reviews on Google', 'value' => '30',   'note' => '',      'wide' => '0' ],
		[ 'label' => 'CNC simulators in classroom', 'value' => '6',    'note' => '',      'wide' => '0' ],
		[ 'label' => 'YouTube subscribers',         'value' => '8,930','note' => '',      'wide' => '0' ],
		[ 'label' => 'LinkedIn followers',          'value' => '27,000','note' => '',     'wide' => '0' ],
	],
	'show_reviews' => '1',
] );

// ── 10. HUB-PREVIEW ──────────────────────────────────────────────────────────
$content .= ns_block( 'block-hub-preview', [
	'heading'         => 'Free reading before you apply.',
	'lede'            => 'The Learning Hub has hundreds of articles on G-code, machine setup, and CNC programming. Good starting point if you\'re not sure which course fits, or if you want to arrive on day one already ahead.',
	'cta'             => [ 'url' => '/learning-hub/', 'title' => 'Go to the Learning Hub', 'target' => '' ],
	'secondary_items' => [
		[
			'title'     => '[GAP — confirm]',
			'dek'       => '[GAP — confirm]',
			'url'       => '/learning-hub/',
			'control'   => 'Fanuc',
			'skill'     => 'G-code',
			'type'      => 'Article',
			'read_time' => '5 min',
		],
		[
			'title'     => '[GAP — confirm]',
			'dek'       => '[GAP — confirm]',
			'url'       => '/learning-hub/',
			'control'   => '',
			'skill'     => 'Setup',
			'type'      => 'Article',
			'read_time' => '4 min',
		],
	],
] );

// ── 11. FAQ ───────────────────────────────────────────────────────────────────
$content .= ns_block( 'block-faq', [
	'heading' => 'What gets asked before someone applies?',
	'items'   => [
		[
			'question' => 'Will this course get me a job?',
			'answer'   => '<p>Honest answer: a certificate alone won\'t. A certificate plus the skills you\'ll actually use on the floor, plus the willingness to start somewhere and learn, will. I\'ve had students go from a beginners course to an operator job within a month. I\'ve had others struggle because they wanted the qualification more than they wanted the work. The course is part of the answer, not the whole answer.</p>',
		],
		[
			'question' => 'Which course do I need?',
			'answer'   => '<p>If you\'ve never run a CNC, beginners. If you can press cycle-start but can\'t set the machine, setter/operator. If you can set it but you\'ve never written a programme from scratch, Learn to Program. If you\'re an experienced programmer who\'s never touched parametric code, macro programming. If you\'re not sure, call me. Five minutes on the phone usually settles it.</p>',
		],
		[
			'question' => 'How many people are on each course?',
			'answer'   => '<p>One to six. The course runs even with one applicant. You just get a much more intensive week of one-to-one time.</p>',
		],
		[
			'question' => 'Can my employer pay for me?',
			'answer'   => '<p>Yes, lots do. I\'ll invoice the company direct, or you can pay and reclaim. Either works. Happy to talk to your manager if it helps the conversation.</p>',
		],
		[
			'question' => 'Are the simulators the same as real machines?',
			'answer'   => '<p>The simulators run real controls. Same Fanuc, Heidenhain, Siemens, Mazak interfaces you\'ll see on the shop floor. The G-code you write in the classroom runs on a real machine without rewriting. The only thing missing is the swarf.</p>',
		],
		[
			'question' => 'Do you offer accommodation?',
			'answer'   => '<p>No. Barwell has half a dozen hotels and B&Bs within ten minutes. I\'ll send a few recommendations with the booking confirmation.</p>',
		],
		[
			'question' => 'Is there a weekend option?',
			'answer'   => '<p>[GAP — Dave to confirm definitive answer. Existing copy says some courses have weekend variants.]</p>',
		],
	],
] );

// ── 12. DECISIVENESS ─────────────────────────────────────────────────────────
$content .= ns_block( 'block-decisiveness', [
	'heading'       => 'Five minutes on the phone. Quickest way to pick.',
	'lede'          => 'Call me direct on 07834 858 407 if you\'d rather talk it through than fill in a form. Quickest way to work out which course fits.',
	'primary_cta'   => [ 'url' => '/courses/', 'title' => 'See all courses', 'target' => '' ],
	'secondary_cta' => [ 'url' => 'tel:07834858407', 'title' => 'Call 07834 858 407', 'target' => '' ],
	'phone'         => '07834 858 407',
	'email'         => 'david@cnctrainingcentre.com',
] );

// ── UPSERT ────────────────────────────────────────────────────────────────────
ns_upsert_page( 'classroom-training', 'Classroom Training', $content );

WP_CLI::success( 'classroom-training composed.' );
