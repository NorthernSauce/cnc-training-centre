<?php
/**
 * Compose: About page.
 * Run: wp eval-file wp-content/themes/cnc-training-centre/build/compose-about.php
 *
 * Copy: v4 rewrite 2026-07-24 — cut hard, straight to the point, David's voice.
 *
 * Design order (about.html):
 *  1. .hero.about-hero          → block-hero
 *  2. .problem.about-trainer    → block-about-trainer
 *  3. .authority.known          → block-known
 *  4. .problem.indep            → block-indep
 *  5. .s-paper.plan.how         → block-plan-steps
 *  6. .problem.where            → block-where
 *  7. .s-paper.faq.about-faq   → block-faq
 *  8. .contact                  → block-contact-band
 */

require __DIR__ . '/lib/compose.php';

$content = '';

// 1. HERO
$content .= ns_block( 'block-hero', [
	'variant'       => 'service',
	'eyebrow'       => 'About David. The bloke behind CNC Training Centre.',
	'heading'       => 'Thirty years on the shop floor. [em]One bloke.[/em] Every major control.',
	'lede'          => 'No team, no franchise, no junior trainer. When you book me, you get me.',
	'primary_cta'   => [ 'url' => '/contact/', 'title' => 'Contact David', 'target' => '' ],
	'secondary_cta' => [ 'url' => '/learning-hub/', 'title' => 'Browse the Hub', 'target' => '' ],
	'show_reviews'  => 1,
] );

// 2. ABOUT-TRAINER
$content .= ns_block( 'block-about-trainer', [
	'pretitle'  => 'How I got here',
	'heading'   => 'Manual machines first. Then turning. Then mills. [em]Then everything.[/em]',
	'body_left' => '<p>I started in CNC in the early nineties. Running machines, picking up each new control as it came in, getting handed the problems nobody else could solve. Fanuc, Heidenhain, Siemens, Mazak. Sliding head when it started turning up on UK floors.</p>',
	'body_right' => '<p>The OEM training gigs would only let me teach their own brand. I wanted to teach the actual machine in front of the actual operator, whatever logo was on it. So I went independent.</p>',
	'coda'      => 'Thirty years on, that\'s still the only thing I do. Onsite at your workshop, classroom in Barwell, programming when you\'ve got the job and not the time.',
	'pullquote' => 'Every time I find something on a machine that I might forget, I write a post about it. When I google something, it\'s me.',
	'foot'      => 'That\'s how the Learning Hub got to 300+ articles.',
] );

// 3. KNOWN
$content .= ns_block( 'block-known', [
	'pretitle'  => 'What I\'m known for',
	'heading'   => 'The work, [em]not the marketing.[/em]',
	'lede'      => '',
	'spec_items' => [
		[ 'value' => '30',   'note' => 'yrs', 'label' => 'Training on every major control. Fanuc, Heidenhain, Siemens, Mazak, Hurco, Brother, Haas, Doosan, XYZ, sliding head.', 'wide' => 0 ],
		[ 'value' => '300+', 'note' => '',    'label' => 'Learning Hub articles, all written by me. Started in 2014 because I kept googling the same problems twice.', 'wide' => 0 ],
		[ 'value' => '27k',  'note' => '',    'label' => 'LinkedIn followers. A piece every week, naming a real machine and a real problem.', 'wide' => 0 ],
		[ 'value' => '8,930','note' => '',    'label' => 'YouTube subscribers. Actual machines, actual jobs, actual G-code on screen.', 'wide' => 0 ],
		[ 'value' => '30',   'note' => '',    'label' => 'Five-star Google reviews. And the OEMs — Mazak, Fanuc, Heidenhain, Hurco — send me work when their own calendar won\'t flex.', 'wide' => 1 ],
	],
] );

// 4. INDEP
$content .= ns_block( 'block-indep', [
	'pretitle'   => 'Why independent, not OEM',
	'heading'    => 'One brand isn\'t your problem.[br][em]Your problem is a mixed shop.[/em]',
	'body_left'  => '<p>Most shops I walk into have five or six machines. Different brands, different controls, different vintages. The Mazak from 2008 next to the Hurco from last year.</p>',
	'body_right' => '<p>OEM training is brand-locked and priced per person. I cover the whole floor at one day rate for the whole team.</p>',
	'coda'       => '',
	'pullquote'  => 'The OEMs do good work in their lane. I do good work across every lane.',
] );

// 5. PLAN-STEPS (How I teach)
$content .= ns_block( 'block-plan-steps', [
	'pretitle'  => 'How I teach',
	'heading'   => 'No fixed agenda. [em]I assess as I go.[/em]',
	'lede'      => 'A syllabus says "by 11am we\'ll cover X". That\'s a presentation, not training.',
	'cta'       => [ 'url' => '/contact/', 'title' => 'Tell David what you need', 'target' => '' ],
	'steps'     => [
		[
			'num'   => '01',
			'title' => 'Start where they actually are.',
			'body'  => 'First morning I walk the shop, see what the machines are doing, see the team\'s real level. Then we work from there.',
		],
		[
			'num'   => '02',
			'title' => 'Train on your actual machines.',
			'body'  => 'Train Monday, run the part Tuesday. That\'s how it sticks.',
		],
		[
			'num'   => '03',
			'title' => 'Connect it to next week\'s work.',
			'body'  => 'Training that isn\'t connected to the next job is forgotten by Friday.',
		],
	],
] );

// 6. WHERE
$content .= ns_block( 'block-where', [
	'pretitle'   => 'Where I work from',
	'heading'    => 'Barwell, Leicestershire.[br][em]Or I come to you.[/em]',
	'body_left'  => '<p>The classroom is in Barwell, just outside Hinckley. Six CNC simulators, milling and turning, every major control. One to six students.</p>',
	'body_right' => '<p>Onsite is UK-wide. Cornwall to Inverness, two-machine job shops to forty-machine facilities. UK travel included in the day rate.</p>',
	'coda'       => 'Want to see the classroom before you commit? Ask. The kettle\'s on.',
] );

// 7. FAQ
$content .= ns_block( 'block-faq', [
	'heading' => 'What gets asked [em]about me specifically?[/em]',
	'items'   => [
		[
			'question' => 'Who have you trained for?',
			'answer'   => '<p>SMB engineering shops mostly, five to fifty staff. Larger facilities when the OEM calendar won\'t flex. Individuals paying their own way from operator to programmer. The OEMs themselves on referral.</p>',
		],
		[
			'question' => 'Are you available for consulting work?',
			'answer'   => '<p>Yes. Productivity audits, process work, programming efficiency. Same day rate as onsite training.</p>',
		],
		[
			'question' => 'Do you only do CNC?',
			'answer'   => '<p>CNC. That\'s it. Thirty years on the controls is the whole offer.</p>',
		],
		[
			'question' => 'Why is there no team?',
			'answer'   => '<p>Because I\'m the bloke who turns up on every job. No junior trainer, no subcontractor. That caps capacity — I\'m typically booking four to six weeks out — but it\'s the whole point.</p>',
		],
		[
			'question' => 'Will the swearing be in the training too?',
			'answer'   => '<p>Probably some. I keep it tighter on a shop floor with strangers. I\'m not going to suddenly stop being a bloke from Leicestershire.</p>',
		],
	],
] );

// 8. CONTACT-BAND
$content .= ns_block( 'block-contact-band', [
	'pretitle'      => 'Contact',
	'heading'       => 'Send me a paragraph. [em]I\'ll come back inside a working day.[/em]',
	'lede'          => 'Call 07834 858 407, or send a paragraph. You\'ll get a proper answer, not a templated reply.',
	'primary_cta'   => [ 'url' => '/contact/', 'title' => 'Send enquiry', 'target' => '' ],
	'secondary_cta' => [ 'url' => 'tel:+447834858407', 'title' => '07834 858 407', 'target' => '' ],
] );

ns_upsert_page( 'about', 'About', $content );
WP_CLI::success( 'about composed.' );
