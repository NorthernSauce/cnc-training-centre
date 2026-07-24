<?php
/**
 * Compose: Programming Services page.
 * Run: wp eval-file wp-content/themes/cnc-training-centre/build/compose-programming-services.php
 *
 * Copy: v4 rewrite 2026-07-24 — cut hard, straight to the point, David's voice.
 *
 * Design order (programming-services.html):
 *  1. .hero.prog-hero       → block-hero
 *  2. .prog-fit             → block-who (variant=courses)
 *  3. .prog-offer           → block-prog-offer
 *  4. .prog-plan            → block-plan-steps
 *  5. .prog-bundle          → block-bundle-list
 *  6. .prog-goal            → block-goal-editorial
 *  7. .prog-price           → block-pricing-rates
 *  8. .prog-warn            → block-warn-list
 *  9. .prog-auth            → block-authority
 * 10. .hub                  → block-hub-preview
 * 11. .faq                  → block-faq
 * 12. .contact.decisiveness → block-decisiveness
 */

require __DIR__ . '/lib/compose.php';

$content = '';

// 1. HERO
$content .= ns_block( 'block-hero', [
	'variant'       => 'service',
	'eyebrow'       => 'Sub-contract CNC programming · Edgecam · UK-wide',
	'heading'       => 'Send me the drawing. [em]I\'ll send back[/em] tested G-code.',
	'lede'          => 'Job in Friday. Deadline Tuesday. Your programmer\'s on holiday. That\'s what this service is for.',
	'primary_cta'   => [ 'url' => '/contact/', 'title' => 'Send a drawing', 'target' => '' ],
	'secondary_cta' => [ 'url' => 'tel:+447834858407', 'title' => 'Call 07834 858 407', 'target' => '' ],
	'show_reviews'  => 1,
] );

// 2. WHO (prog-fit — courses variant for who-* classes)
$content .= ns_block( 'block-who', [
	'variant'    => 'courses',
	'heading'    => 'If your one programmer is on holiday [em]and the deadline isn\'t.[/em]',
	'body_left'  => '<p>You\'ve got the work on the books and the machine on the floor. What you haven\'t got is the programming horsepower to turn the drawing into tested G-code by Friday.</p>',
	'body_right' => '<p>I get the drawing, write the programme, send it back with the post applied, the tooling listed and notes on how it should run. You put it on the machine and make parts.</p>',
	'show_pullquote' => 1,
	'pullquote_text' => 'If what you actually need is in-house programming capability so this stops happening, that\'s training. Different page. I\'d rather steer you right than book you wrong.',
	'pullquote_cite' => '',
	'show_coda'      => 0,
	'coda'           => '',
] );

// 3. PROG-OFFER
$content .= ns_block( 'block-prog-offer', [
	'pretitle'   => 'What I offer',
	'heading'    => 'Four ways to get programming [em]off your plate.[/em]',
	'meta'       => '04 / 04 listed · Off-site programming · UK-wide delivery',
	'items'      => [
		[
			'index' => '01',
			'name'  => 'Sub-contract programming',
			'lede'  => 'Drawing in, tested G-code out. One-off complex parts, urgent jobs, steady overflow.',
		],
		[
			'index' => '02',
			'name'  => 'Edgecam programming',
			'lede'  => 'Professional Edgecam licence. Your software, your file format, posted to your machine.',
		],
		[
			'index' => '03',
			'name'  => 'Turnkey solutions',
			'lede'  => 'New machine or new process? I write the first programmes, document the tooling, stay involved until your team\'s confident.',
		],
		[
			'index' => '04',
			'name'  => 'CNC machining services',
			'lede'  => 'Programme plus parts, through a network of trusted machine shops. Quoted per job.',
		],
	],
	'surface'    => 's-paper',
] );

// 4. PLAN-STEPS (How it works)
$content .= ns_block( 'block-plan-steps', [
	'pretitle' => 'How it works',
	'heading'  => 'Drawing in. [em]Tested G-code out.[/em]',
	'lede'     => '',
	'cta'      => [ 'url' => '/contact/', 'title' => 'Send a drawing', 'target' => '' ],
	'steps'    => [
		[
			'num'   => '01',
			'title' => 'Send the drawing.',
			'body'  => 'STEP, IGES, DXF, PDF, whatever you\'ve got. Tell me the machine and control, the material, the quantity, the deadline.',
		],
		[
			'num'   => '02',
			'title' => 'I quote on hours, you decide.',
			'body'  => '£60 to £100 per hour plus VAT depending on complexity. Fixed-cap available once I\'ve seen the drawing. Paid upfront.',
		],
		[
			'num'   => '03',
			'title' => 'Tested code delivered. Phone stays on.',
			'body'  => 'Post applied, tooling list, run notes. If anything kicks back on the machine, ring me and we\'ll sort it in twenty minutes.',
		],
	],
] );

// 5. BUNDLE-LIST
$content .= ns_block( 'block-bundle-list', [
	'pretitle' => 'What\'s bundled',
	'heading'  => 'Six things bundled [em]into the hourly rate.[/em]',
	'items'    => [
		[ 'name' => 'The programming work',                        'body' => 'Drawing in, tested G-code out.' ],
		[ 'name' => 'Posting to your machine and control',         'body' => 'All standard posts, custom posts if needed.' ],
		[ 'name' => 'Tooling list and run notes',                  'body' => 'Not just the code. The context to run it confidently.' ],
		[ 'name' => 'Phone support after delivery',                'body' => 'Until the program runs cleanly on your machine.' ],
		[ 'name' => 'Honest hour estimates up front',              'body' => 'Fixed-cap on request.' ],
		[ 'name' => 'Routing if it\'s not the right job for me',   'body' => 'If you\'re better off training your team instead, I\'ll say so.' ],
	],
	'foot'     => 'Quoted separately: turnkey engagements, machining services, onsite programming on your floor.',
	'surface'  => 's-paper',
] );

// 6. GOAL-EDITORIAL
$content .= ns_block( 'block-goal-editorial', [
	'pretitle' => 'The outcome',
	'heading'  => 'What\'s the week look like [em]with programming off your plate?[/em]',
	'body'     => '<p>Friday\'s job doesn\'t sit on a desk until Tuesday. The awkward parts offload to me instead of jumping the queue. The work you turned down because the horsepower wasn\'t there? Quote it again.</p>',
] );

// 7. PRICING-RATES
$content .= ns_block( 'block-pricing-rates', [
	'pretitle' => 'Pricing',
	'heading'  => '£60 to £100 per hour. [em]Where you sit depends on the work.[/em]',
	'lede'     => 'You get an estimate in hours on the quote. Want a fixed-cap instead? Ask.',
	'foot'     => 'All programming work is paid upfront. Keeps the relationship clean and your job prioritised.',
	'rows'     => [
		[ 'rate' => '£60/hr',     'tier' => 'Standard 3-axis',         'body' => 'Milling and turning. Familiar controls, conventional cycles.',                                               'wide' => 0 ],
		[ 'rate' => '£75–85/hr',  'tier' => 'Multi-axis & complex',    'body' => 'Multi-axis work, complex fixtures, awkward geometry, non-standard posts.',                                                  'wide' => 0 ],
		[ 'rate' => '£100/hr',    'tier' => 'Sliding head & macro',    'body' => 'Swiss-type work, live tooling, parametric programming with macro.', 'wide' => 0 ],
		[ 'rate' => 'Per job',    'tier' => 'Turnkey & machining',     'body' => 'Quoted per job. The hourly rate is still the foundation.', 'wide' => 1 ],
	],
	'surface'  => 's-paper-tint',
] );

// 8. WARN-LIST
$content .= ns_block( 'block-warn-list', [
	'pretitle' => 'Who shouldn\'t book this',
	'heading'  => 'Three situations [em]where I\'m the wrong call.[/em]',
	'lede'     => '',
	'items'    => [
		[
			'num'  => '01',
			'name' => 'You want to learn how to program.',
			'body' => 'That\'s training. Onsite or classroom. I do both. Different page.',
		],
		[
			'num'  => '02',
			'name' => 'You don\'t have a machine to run it on.',
			'body' => 'The conversation you need is about machine spec, not G-code.',
		],
		[
			'num'  => '03',
			'name' => 'You\'re hoping for a free programme on spec.',
			'body' => 'All work is quoted and paid upfront. I don\'t work on spec.',
		],
	],
	'surface'  => 's-paper',
] );

// 9. AUTHORITY
$content .= ns_block( 'block-authority', [
	'variant'      => 'standard',
	'heading'      => 'Thirty years writing CNC programs [em]for engineering companies.[/em]',
	'lede'         => 'Writing CNC programmes for a living since 1996. Edgecam on a professional licence, all the common posts, hand-coding when the control calls for it.',
	'spec_items'   => [
		[ 'value' => '30',   'note' => 'yrs', 'label' => 'Writing CNC programmes for engineering companies.', 'wide' => 0 ],
		[ 'value' => 'Pro',  'note' => '',    'label' => 'Edgecam licence. All major posts available.',        'wide' => 0 ],
		[ 'value' => '10+',  'note' => '',    'label' => 'Controls programmed: Fanuc, Heidenhain, Siemens, Mazak, Hurco, Brother, Haas, Doosan, XYZ, sliding head.', 'wide' => 0 ],
		[ 'value' => '100s', 'note' => '',    'label' => 'Programmes written, posted, tested, in production.', 'wide' => 0 ],
	],
	'show_reviews' => 1,
] );

// 10. HUB-PREVIEW
$content .= ns_block( 'block-hub-preview', [
	'heading'         => 'See the programming style before you send the drawing.',
	'lede'            => 'The Hub is full of programmes I\'ve written, posted, broken down and explained.',
	'cta'             => [ 'url' => '/learning-hub/', 'title' => 'Browse the Hub', 'target' => '' ],
	'secondary_items' => [],
] );

// 11. FAQ
$content .= ns_block( 'block-faq', [
	'heading' => 'What gets asked [em]when someone sends me a drawing?[/em]',
	'items'   => [
		[
			'question' => 'How fast can you turn a programme around?',
			'answer'   => '<p>A clean 3-axis part, often same-day. Complex multi-axis or sliding head, two to five working days. Quoted honestly on the brief.</p>',
		],
		[
			'question' => 'Will the G-code run on my machine without modification?',
			'answer'   => '<p>That\'s the goal. Posted to your specific machine, tested in Edgecam before it leaves me. If a fixture or controller quirk bites, the phone stays on.</p>',
		],
		[
			'question' => 'What files do you need?',
			'answer'   => '<p>Ideally a STEP or IGES model plus a PDF drawing. DXF for 2D. A hand sketch and a phone call can work for simple parts.</p>',
		],
		[
			'question' => 'Edgecam only, or can you hand-code?',
			'answer'   => '<p>Both. Edgecam for anything substantial, hand-coding for short programmes or legacy controls.</p>',
		],
		[
			'question' => 'What if my batch is too small to justify the cost?',
			'answer'   => '<p>Then I\'ll tell you, and point you at a better route. I\'d rather do that than charge for a programme that doesn\'t pay back.</p>',
		],
		[
			'question' => 'Do you do production runs as well?',
			'answer'   => '<p>Yes, through the machining services route. Programme plus parts, quoted per job.</p>',
		],
	],
] );

// 12. DECISIVENESS
$content .= ns_block( 'block-decisiveness', [
	'heading'       => 'Send the drawing. [em]Tell me the deadline.[/em]',
	'lede'          => 'Two lines: the machine it\'s going on, and when you need the parts. Same-day answer with an hour estimate.',
	'primary_cta'   => [ 'url' => '/contact/', 'title' => 'Send a drawing', 'target' => '' ],
	'secondary_cta' => [ 'url' => 'tel:+447834858407', 'title' => '07834 858 407', 'target' => '' ],
	'phone'         => '',
	'email'         => '',
] );

ns_upsert_page( 'programming-services', 'Programming Services', $content );
WP_CLI::success( 'programming-services composed.' );
