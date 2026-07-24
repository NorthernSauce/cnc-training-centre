<?php
/**
 * Compose: Onsite Training page.
 * Run: wp eval-file wp-content/themes/cnc-training-centre/build/compose-onsite-training.php
 *
 * Copy: v4 rewrite 2026-07-24 — cut hard, straight to the point, David's voice.
 * Note: dead block-training-links (empty embed) dropped from live page by this recompose.
 *
 * Design order (onsite-training.html):
 *  1. .hero.ot-hero         → block-hero
 *  2. .ot-who               → block-who
 *  3. .ot-how-train         → block-how-train
 *  4. .ot-included          → block-included-list
 *  5. .ot-outcome           → block-outcome
 *  6. .ot-pricing           → block-pricing-narrative
 *  7. .ot-dq                → block-disqualifier
 *  8. .authority.ot-auth    → block-authority
 *  9. .hub                  → block-hub-preview
 * 10. .faq                  → block-faq
 * 11. .svc-cta              → block-decisiveness
 */

require __DIR__ . '/lib/compose.php';

$content = '';

// 1. HERO
$content .= ns_block( 'block-hero', [
	'variant'       => 'service',
	'eyebrow'       => 'Onsite CNC training. UK-wide.',
	'heading'       => 'I come to you. Your machines. [em]£700 a day for the team.[/em]',
	'lede'          => 'That Mazak nobody can touch. The Hurco running half its cycle time. The bloke who knew the sliding head left in March.',
	'primary_cta'   => [ 'url' => '/contact/', 'title' => 'Contact David', 'target' => '' ],
	'secondary_cta' => [ 'url' => 'tel:+447834858407', 'title' => '07834 858 407', 'target' => '' ],
	'show_reviews'  => 1,
] );

// 2. WHO
$content .= ns_block( 'block-who', [
	'heading'    => 'If you wince every time [em]your senior operator[/em] books holiday.',
	'body_left'  => '<p>You\'re an MD or production manager. Six-figure machines on the floor, people running them off muscle memory, the complicated jobs going out to a subcontractor.</p>',
	'body_right' => '<p>I come in, work with your team on your kit, and leave them two or three rungs up from where they were on Monday. On your machine, programming your parts.</p>',
] );

// 3. HOW-TRAIN
$content .= ns_block( 'block-how-train', [
	'pretitle' => 'How I train',
	'heading'  => 'What\'s the only training your team applies [em]the next day?[/em]',
	'body'     => '<p>PowerPoint training doesn\'t transfer. Your team sits in a room for two days while the machines stand idle, then forgets most of it by Friday.</p><p>I train on your machines, against your actual jobs. The setter watches offsets dialled in on the part that\'s due Thursday. Train Monday, run it Tuesday. That\'s how it sticks.</p><p>No fixed agenda. If your operators are flying, I push on. If something\'s not clicking, I stay on it until it does.</p>',
] );

// 4. INCLUDED-LIST
$content .= ns_block( 'block-included-list', [
	'pretitle' => 'What\'s included',
	'heading' => 'Whole team, every control, [em]no per-head pricing.[/em]',
	'items'    => [
		[ 'name' => 'Days onsite.',                     'body' => 'Scoped on the enquiry call. Typically 2 to 5.' ],
		[ 'name' => 'Training on your actual machines.','body' => 'Mills, lathes, sliding head, multi-axis. Mixed shops welcome.' ],
		[ 'name' => 'Every major control.',             'body' => 'Fanuc, Heidenhain, Siemens, Mazak, Hurco, Brother, Haas, Doosan, XYZ. If I haven\'t named yours, ask.' ],
		[ 'name' => 'Whole team, flat rate.',           'body' => 'Two operators or six. Same £700/day.' ],
		[ 'name' => 'Adapted as I go.',                 'body' => 'No fixed syllabus. I work to the room.' ],
		[ 'name' => 'Certificate per person trained.',  'body' => 'For your auditors, customers, the operator\'s CV.' ],
		[ 'name' => 'Follow-up support.',               'body' => 'Phone stays on after I leave.' ],
	],
	'surface'  => 's-paper-tint',
] );

// 5. OUTCOME
$content .= ns_block( 'block-outcome', [
	'heading' => 'What your shop looks like six months [em]after I leave[/em]',
	'body'    => '<p>The idle machines are running. The operator who could only press cycle-start is programming jobs. Work you were subbing out is back in-house at proper margin.</p>',
	'layout'  => 'single',
	'surface' => 's-paper-tint',
] );

// 6. PRICING-NARRATIVE
$content .= ns_block( 'block-pricing-narrative', [
	'pretitle' => 'Pricing',
	'heading' => 'What £700 a day [em]actually gets you.[/em]',
	'body'     => '<p>£700 plus VAT per day, for the whole team. Two operators or six, same price. UK travel included. Hotel at cost if I\'m staying over.</p><p>Paid upfront once dates are confirmed. It\'s how I\'ve run it for thirty years and it keeps the relationship clean.</p>',
	'surface'  => 's-paper',
] );

// 7. DISQUALIFIER
$content .= ns_block( 'block-disqualifier', [
	'pretitle'    => 'Not for everyone',
	'heading'     => 'What\'s onsite training [em]the wrong choice for?[/em]',
	'lede'        => '',
	'items'       => [
		[ 'index' => 'A', 'name' => 'You haven\'t got the machines yet.', 'body' => 'Start with classroom training on simulators. Onsite makes sense once the kit\'s in.' ],
		[ 'index' => 'B', 'name' => 'You want an expert in two days.', 'body' => 'Not how skills work. I move people meaningfully up the ladder. Mastery takes the months after.' ],
		[ 'index' => 'C', 'name' => 'You\'re shopping for the cheapest quote.', 'body' => 'I\'m not it. I\'m the one with thirty years on every control you can name.' ],
		[ 'index' => 'D', 'name' => 'You need a fixed syllabus for a compliance box.', 'body' => 'I don\'t work to agenda. The OEM route fits that better.' ],
	],
	'footer_note' => 'If any of those land, say so on the call. I\'ll point you somewhere that fits.',
	'surface'     => 's-paper-tint',
] );

// 8. AUTHORITY
$content .= ns_block( 'block-authority', [
	'variant'      => 'standard',
	'heading' => 'Thirty years. Every major control. [em]Known by the OEMs.[/em]',
	'lede'         => 'The OEMs send me referrals because I cover what their syllabus won\'t.',
	'spec_items'   => [
		[ 'value' => '30',   'note' => 'yrs', 'label' => 'Training on CNC machines, on every major control.',   'wide' => 0 ],
		[ 'value' => '30',   'note' => '',    'label' => 'Five-star reviews on Google. None lower.',             'wide' => 0 ],
		[ 'value' => '27k',  'note' => '',    'label' => 'LinkedIn followers reading my weekly content.',        'wide' => 0 ],
		[ 'value' => '332',  'note' => '',    'label' => 'YouTube videos, 8,930 subscribers.',                  'wide' => 0 ],
		[ 'value' => '300+', 'note' => '',    'label' => 'Published articles on CNC machining, on this site.',  'wide' => 1 ],
	],
	'show_reviews' => 1,
] );

// 9. HUB-PREVIEW
$content .= ns_block( 'block-hub-preview', [
	'heading'         => 'Read before you enquire.',
	'lede'            => 'Most people who book have already read three or four articles. Makes the call short and practical.',
	'cta'             => [ 'url' => '/learning-hub/', 'title' => 'Browse the Hub', 'target' => '' ],
	'secondary_items' => [],
] );

// 10. FAQ
$content .= ns_block( 'block-faq', [
	'heading' => 'What gets asked [em]on every enquiry call?[/em]',
	'items'   => [
		[
			'question' => 'Do you know my machine?',
			'answer'   => '<p>Probably. Tell me what\'s on the floor and I\'ll be straight with you about whether I can add value or whether the OEM is the better call.</p>',
		],
		[
			'question' => 'Is the day rate per person or for the whole team?',
			'answer'   => '<p>Whole team. £700/day covers two operators or six.</p>',
		],
		[
			'question' => 'How long are you onsite?',
			'answer'   => '<p>Two days for a focused engagement, a week to lift a team from operator level to programming. Scoped honestly on the call.</p>',
		],
		[
			'question' => 'Will my team get certificates?',
			'answer'   => '<p>Yes. One per person trained.</p>',
		],
		[
			'question' => 'What if my operators learn faster or slower than expected?',
			'answer'   => '<p>The day rate is fixed. The scope flexes to fit the people in front of me.</p>',
		],
		[
			'question' => 'What happens if my team forgets it the moment you leave?',
			'answer'   => '<p>They apply it the next day on the same machine, which is the strongest retention there is. And the phone stays on.</p>',
		],
		[
			'question' => 'Do you work nationwide?',
			'answer'   => '<p>Yes. Based in Barwell, Leicestershire, travel UK-wide. Long trips get flagged on the quote, not hidden in it.</p>',
		],
	],
] );

// 11. DECISIVENESS
$content .= ns_block( 'block-decisiveness', [
	'heading'       => 'Ring me. [em]I\'ll scope it on the call.[/em]',
	'lede'          => 'Your machines, your team, what you want them able to do. I\'ll come back inside a working day with a proper answer.',
	'primary_cta'   => [ 'url' => '/contact/', 'title' => 'Contact David', 'target' => '' ],
	'secondary_cta' => [ 'url' => 'tel:+447834858407', 'title' => '07834 858 407', 'target' => '' ],
	'phone'         => '',
	'email'         => '',
] );

ns_upsert_page( 'onsite-training', 'Onsite Training', $content );
WP_CLI::success( 'onsite-training composed.' );
