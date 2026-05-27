<?php
/**
 * Compose: Programming Services page.
 * Run: wp eval-file wp-content/themes/cnc-training-centre/build/compose-programming-services.php
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
	'lede'          => 'Job in Friday. Deadline Tuesday. Your programmer\'s on holiday. The part\'s complex enough to tie up two days of someone you haven\'t got.',
	'primary_cta'   => [ 'url' => '/contact/', 'title' => 'Send a drawing', 'target' => '' ],
	'secondary_cta' => [ 'url' => 'tel:+447834858407', 'title' => 'Call 07834 858 407', 'target' => '' ],
	'show_reviews'  => 1,
] );

// 2. WHO (prog-fit — courses variant for who-* classes)
$content .= ns_block( 'block-who', [
	'variant'    => 'courses',
	'heading'    => 'If your one programmer is on holiday [em]and the deadline isn\'t.[/em]',
	'body_left'  => '<p>You\'re an engineering company with the work on the books and the machine on the floor. What you haven\'t got is the time, the headcount, or the in-house programming horsepower to turn the drawing into tested G-code by Friday. Maybe your one programmer is on holiday. Maybe the part is complex enough that hand-coding it would tie someone up for two days. Maybe you\'ve never had a programmer and you\'ve always sub-contracted the trickier work out.</p>',
	'body_right' => '<p>This is the service for that. Not training, not consultancy. Programming. I get the drawing, I write the programme, I send it back with the post applied, the tooling listed, and notes on how it should run. You put it on the machine and make parts.</p>',
	'show_pullquote' => 1,
	'pullquote_text' => 'Worth saying clearly. If what you actually need is to build in-house programming capability so this doesn\'t keep happening, that\'s onsite or classroom training. Different page, different conversation. I\'d rather steer you to the right thing than book you for the wrong one.',
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
			'lede'  => 'You send the drawing, I send back tested G-code. Most common engagement. Suits one-off complex parts, urgent jobs, or steady overflow when your in-house programmer is at capacity.',
		],
		[
			'index' => '02',
			'name'  => 'Edgecam programming',
			'lede'  => 'I run a professional Edgecam licence. If your shop is on Edgecam (or moving to it) I can program in your software, deliver the file in your format, post to your specific machine. Common controls covered: Fanuc, Heidenhain, Siemens, Mazak, Hurco, Haas.',
		],
		[
			'index' => '03',
			'name'  => 'Turnkey solutions',
			'lede'  => 'For companies bringing a new machine or a new process online. I\'ll write the first set of programmes, document the tooling, set up the fixtures conceptually, stay involved while your team gets confident running the work. Halfway between programming and consultancy.',
		],
		[
			'index' => '04',
			'name'  => 'CNC machining services',
			'lede'  => 'Where you\'d rather sub the whole job out. Programme plus parts. I work with a network of trusted machine shops for production runs that need both programming intelligence and physical machining. Quoted per job. [GAP — Dave to confirm this is how production runs are delivered.]',
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
			'title' => 'Send the drawing and tell me what you\'re running it on.',
			'body'  => 'Email or send through the enquiry form. Include the drawing (STEP, IGES, DXF, PDF, whatever you\'ve got), the machine and control, the material, the batch quantity, the deadline. The more honest the brief, the cleaner the quote.',
		],
		[
			'num'   => '02',
			'title' => 'I quote on hours, you decide.',
			'body'  => 'Programming is £60 to £100 per hour plus VAT, depending on complexity. Straightforward 3-axis milling work is at the bottom end. Multi-axis or sliding head with live tooling is at the top. I\'ll come back with an estimate in hours and a fixed-cap if you\'d prefer the certainty. Sub-contract programming is paid upfront before the work starts.',
		],
		[
			'num'   => '03',
			'title' => 'Tested G-code delivered. Phone stays on.',
			'body'  => 'You get the programme with the post applied, a tooling list, and notes on how it should run. If something kicks back when you load it on the machine (wrong post, fixture clash, anything) get on the phone. I\'d rather sort it in twenty minutes with you on the line than have you fighting it for an afternoon.',
		],
	],
] );

// 5. BUNDLE-LIST
$content .= ns_block( 'block-bundle-list', [
	'pretitle' => 'What\'s bundled',
	'heading'  => 'Six things bundled [em]into the hourly rate.[/em]',
	'items'    => [
		[ 'name' => 'The programming work',                        'body' => 'Drawing in, tested G-code out.' ],
		[ 'name' => 'Posting to your specific machine and control','body' => 'Fanuc, Heidenhain, Siemens, Mazak, Hurco, Haas, Doosan, XYZ, sliding head. All standard posts available, custom posts if needed.' ],
		[ 'name' => 'Tooling list and run notes',                  'body' => 'Not just the code. The context to run it confidently.' ],
		[ 'name' => 'Phone support after delivery',                'body' => 'Until the program runs cleanly on your machine.' ],
		[ 'name' => 'Honest hour estimates up front',              'body' => 'Fixed-cap available on request once I\'ve seen the drawing.' ],
		[ 'name' => 'Routing if it\'s not the right job for me',   'body' => 'If your part is below the threshold for paid programming, or if you\'re better off training your team to do this in-house, I\'ll say so.' ],
	],
	'foot'     => 'Quoted separately: turnkey engagements (new machine commissioning plus first programs), CNC machining services (programming plus parts via my network of trusted shops), onsite programming on your floor.',
	'surface'  => 's-paper',
] );

// 6. GOAL-EDITORIAL
$content .= ns_block( 'block-goal-editorial', [
	'pretitle' => 'The outcome',
	'heading'  => 'What\'s the week look like [em]with programming off your plate?[/em]',
	'body'     => '<p>The job that came in on Friday afternoon doesn\'t sit on a desk until Tuesday. The customer who needed parts by Thursday gets parts by Thursday. Your in-house programmer stops being the bottleneck because the awkward jobs offload to me instead of jumping the queue.</p><p>The work you quietly turned down because the programming horsepower wasn\'t there. Quote those again. The job you sub-contracted out at a margin loss. Bring it back in-house. I do the programming, you do the machining at proper margin. Programming load stops being the thing that caps your shop\'s revenue.</p>',
] );

// 7. PRICING-RATES
$content .= ns_block( 'block-pricing-rates', [
	'pretitle' => 'Pricing',
	'heading'  => '£60 to £100 per hour. [em]Where you sit depends on the work.[/em]',
	'lede'     => 'Programming work is priced by the hour. The rate moves with complexity. You\'ll get an estimate in hours on the quote. If you want a fixed-cap rather than an hourly run, ask. For most jobs I can do that once I\'ve seen the drawing.',
	'foot'     => 'All programming work is paid upfront before the work starts. That\'s how I\'ve run sub-contract programming for the same reason as onsite training. It keeps the relationship clean and means I can prioritise your job properly. [GAP — Dave to confirm the £60 / £75–85 / £100 tier breakdown.]',
	'rows'     => [
		[ 'rate' => '£60/hr',     'tier' => 'Standard 3-axis',         'body' => 'Milling and turning. Familiar controls, conventional cycles, straightforward tooling.',                                               'wide' => 0 ],
		[ 'rate' => '£75–85/hr',  'tier' => 'Multi-axis & complex',    'body' => 'Multi-axis work, complex fixtures, parts with awkward geometry, non-standard posts.',                                                  'wide' => 0 ],
		[ 'rate' => '£100/hr',    'tier' => 'Sliding head & macro',    'body' => 'Swiss-type work, live tooling on multi-axis lathes, parametric programming with macro, anything that requires real depth on a specific control.', 'wide' => 0 ],
		[ 'rate' => 'Per job',    'tier' => 'Turnkey & machining',     'body' => 'Turnkey engagements and CNC machining services are quoted per job. The hourly rate is still the foundation; the day count moves around with the situation.', 'wide' => 1 ],
	],
	'surface'  => 's-paper-tint',
] );

// 8. WARN-LIST
$content .= ns_block( 'block-warn-list', [
	'pretitle' => 'Who shouldn\'t book this',
	'heading'  => 'Three situations [em]where I\'m the wrong call.[/em]',
	'lede'     => 'Programming services work well when you\'ve got a real machining job, a real deadline, and the machine to run the code on. They don\'t work when:',
	'items'    => [
		[
			'num'  => '01',
			'name' => 'You want to learn how to program.',
			'body' => 'That\'s training. Onsite if you\'ve got the machines, classroom if you want simulators and a structured course. I do both. Different page.',
		],
		[
			'num'  => '02',
			'name' => 'You don\'t have a machine to run the programme on.',
			'body' => 'Programming services assume you\'ve got the kit to run the code. If you\'re still at the planning stage, the conversation you need is about machine spec, not G-code.',
		],
		[
			'num'  => '03',
			'name' => 'You\'re hoping for a free programme on a speculative job.',
			'body' => 'All sub-contract programming is paid upfront once I\'ve quoted and you\'ve accepted. If the job doesn\'t materialise after you\'ve accepted the quote, I\'ll hold the deposit for the next one. But I don\'t work on spec.',
		],
	],
	'surface'  => 's-paper',
] );

// 9. AUTHORITY (prog-auth — spec-block + reviews widget)
$content .= ns_block( 'block-authority', [
	'variant'      => 'standard',
	'heading'      => 'Thirty years writing CNC programs [em]for engineering companies.[/em]',
	'lede'         => 'I\'ve been writing CNC programmes for a living since 1996. Every major control — Fanuc, Heidenhain, Siemens, Mazak, Hurco, Brother, Haas, Doosan, XYZ, sliding head — has been on the bench. Edgecam runs on a professional licence in the office with all the common posts. Hand-coding for legacy controls when the situation calls for it.',
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
	'lede'            => 'The Hub is full of programmes I\'ve written, posted, broken down and explained. If you want to see how I think before you trust me with a job, start there.',
	'cta'             => [ 'url' => '/learning-hub/', 'title' => 'Browse the Hub', 'target' => '' ],
	'secondary_items' => [
		[
			'title'     => '[GAP — confirm]',
			'dek'       => '',
			'url'       => '',
			'control'   => 'Fanuc',
			'skill'     => 'Programming',
			'type'      => 'Article',
			'read_time' => '',
		],
		[
			'title'     => '[GAP — confirm]',
			'dek'       => '',
			'url'       => '',
			'control'   => '',
			'skill'     => 'Edgecam',
			'type'      => 'Article',
			'read_time' => '',
		],
	],
] );

// 11. FAQ
$content .= ns_block( 'block-faq', [
	'heading' => 'What gets asked [em]when someone sends me a drawing?[/em]',
	'items'   => [
		[
			'question' => 'How fast can you turn a programme around?',
			'answer'   => '<p>Depends on the job. A standard 3-axis milling part with a clean drawing, often same-day if it lands in office hours. A complex multi-axis or sliding head part with live tooling, typically two to five working days. I\'d rather quote honestly on the brief than promise a turnaround I can\'t keep.</p>',
		],
		[
			'question' => 'Will the G-code run on my machine without modification?',
			'answer'   => '<p>That\'s the goal. I post to your specific machine and control, and the code is tested in Edgecam before it leaves me. Will every programme run perfectly first time on every machine? No. Fixtures, tool wear, controller quirks all exist. That\'s why the phone stays on after delivery.</p>',
		],
		[
			'question' => 'What files do you need?',
			'answer'   => '<p>Ideally a 3D model (STEP or IGES) plus a PDF drawing for dimensions and tolerances. DXF for 2D work. If all you\'ve got is a hand sketch and a phone call, that can still work for simple parts. I\'ll tell you on the enquiry whether the brief is enough or whether I need more.</p>',
		],
		[
			'question' => 'Do you work with Edgecam only, or can you hand-code?',
			'answer'   => '<p>Both. Edgecam is the default for anything substantial. Hand-coding still has its place for short, simple programmes or for legacy controls without modern post support. I\'ll use whichever makes sense for the job and tell you why on the quote.</p>',
		],
		[
			'question' => 'What if my batch is too small to justify the programming cost?',
			'answer'   => '<p>Then say so on the enquiry. Sometimes the right answer is "this part isn\'t worth programming. You should sub-contract the actual machining out." I\'d rather give you that answer than charge you for a programme that doesn\'t pay back.</p>',
		],
		[
			'question' => 'Can you stay involved if the job runs into problems?',
			'answer'   => '<p>Yes. Phone support is included once the programme has been delivered. If you want me onsite to commission a new machine or train the team running the parts, that\'s a separate engagement. Onsite training or a turnkey scope.</p>',
		],
		[
			'question' => 'Do you do production runs as well as programming?',
			'answer'   => '<p>Through the CNC machining services route, yes. I work with a network of trusted machine shops. Quoted per job rather than per hour, because the variables shift.</p>',
		],
	],
] );

// 12. DECISIVENESS
$content .= ns_block( 'block-decisiveness', [
	'heading'       => 'Send the drawing. [em]Tell me the deadline.[/em]',
	'lede'          => 'Email the drawing (STEP, IGES, DXF, PDF, whatever you\'ve got) with two lines: the machine and control it\'s going on, and when you need the parts. I\'ll come back the same day with an hour estimate and dates. If you\'d rather talk before you send anything, call 07834 858 407.',
	'primary_cta'   => [ 'url' => '/contact/', 'title' => 'Send a drawing', 'target' => '' ],
	'secondary_cta' => [ 'url' => 'tel:+447834858407', 'title' => '07834 858 407', 'target' => '' ],
	'phone'         => '',
	'email'         => '',
] );

ns_upsert_page( 'programming-services', 'Programming Services', $content );
WP_CLI::success( 'programming-services composed.' );
