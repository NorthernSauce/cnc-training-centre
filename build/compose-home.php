<?php
/**
 * Compose: Home page.
 * Run: wp eval-file wp-content/themes/cnc-training-centre/build/compose-home.php
 *
 * Copy: v4 rewrite 2026-07-24 — cut hard, straight to the point, David's voice.
 *
 * Design order (home.html):
 *  1. .hero              → block-hero
 *  2. .agitation         → block-agitation
 *  3. .positioning       → block-positioning
 *  4. .mechanism         → block-mechanism
 *  5. .services          → block-services-grid
 *  6. .authority         → block-authority
 *  7. .hub               → block-hub-preview
 *  8. .contact.decisiv.  → block-decisiveness
 */

require __DIR__ . '/lib/compose.php';

$content = '';

// 1. HERO
$content .= ns_block( 'block-hero', [
	'variant'       => 'standard',
	'eyebrow'       => 'Independent CNC training, since 1996',
	'heading'       => 'You\'ve got the machines.[br][em]You just haven\'t got anyone[/em] who can use them properly.',
	'lede'          => 'I fix that. On your machines or in my classroom. Thirty years, every major control.',
	'primary_cta'   => [ 'url' => '/contact/', 'title' => 'Contact David', 'target' => '' ],
	'secondary_cta' => [ 'url' => 'tel:+447834858407', 'title' => '07834 858 407', 'target' => '' ],
	'show_reviews'  => 1,
] );

// 2. AGITATION
$content .= ns_block( 'block-agitation', [
	'heading'    => 'I know we should have sorted this [em]ages ago.[/em]',
	'body_left'  => '<p>Machines running slow. Work subbed out that should be done in-house. One bloke who knows the Mazak, and you wince every time he books holiday.</p>',
	'body_right' => '<p>You\'ve looked at training before. The OEMs charge double and only teach their own brand. YouTube doesn\'t answer back. So it stays on the list, and another quarter goes by.</p>',
] );

// 3. POSITIONING
$content .= ns_block( 'block-positioning', [
	'pretitle'   => 'What I do',
	'heading'    => 'The [em]independent CNC trainer[/em] for British engineering shops.',
	'body_left'  => '<p>One thing, thirty years: closing the gap between the machine you own and the skills your people have. Every major control. Onsite on your kit, or classroom on my simulators.</p>',
	'body_right' => '<p>The OEMs send me referrals because I cover what their syllabus won\'t. 8,930 people watch me solve real problems on YouTube. 30 Google reviews, all five stars.</p>',
] );

// 4. MECHANISM
$content .= ns_block( 'block-mechanism', [
	'pretitle'  => 'How it works',
	'heading'   => 'What\'s the only training that [em]doesn\'t stop the line?[/em]',
	'body'      => '<p class="mechanism-lede">Most training sits your team in a room with a PowerPoint while the machines stand idle. Half of it never transfers.</p><p>I do it the other way round. Your shop, your machines, your parts. The setter watches offsets dialled in on the job that\'s due Thursday. When I leave, the part\'s in spec and the person who couldn\'t do it can.</p>',
	'dl_items'  => [
		[ 'term' => 'On your machines',  'definition' => 'Not a classroom mock-up.' ],
		[ 'term' => 'Your parts',        'definition' => 'Against your real jobs.' ],
		[ 'term' => 'As production runs','definition' => 'The line doesn\'t stop for training.' ],
		[ 'term' => 'No fixed agenda',   'definition' => 'I work to the room, not a syllabus.' ],
	],
] );

// 5. SERVICES-GRID
$content .= ns_block( 'block-services-grid', [
	'pretitle' => 'Services',
	'heading'  => 'Onsite. Classroom. Programming. [em]Pick what fits.[/em]',
	'cards'    => [
		[
			'name'  => 'Onsite training',
			'rate'  => '£700 / day · whole team',
			'lede'  => 'I come to you. Your machines, your parts, every major control. One rate for the whole team.',
			'url'   => '/onsite-training/',
			'cta'   => 'Onsite training',
			'soon'  => 0,
			'pill'  => '',
		],
		[
			'name'  => 'Classroom training',
			'rate'  => '£300 / student / day',
			'lede'  => 'One to six students on six CNC simulators in Barwell. Beginners to advanced. Certificate on completion.',
			'url'   => '/classroom-training/',
			'cta'   => 'Classroom training',
			'soon'  => 0,
			'pill'  => '',
		],
		[
			'name'  => 'Programming services',
			'rate'  => '£60 to £100 / hr',
			'lede'  => 'Send the drawing. I\'ll send back tested G-code, posted to your machine.',
			'url'   => '/programming-services/',
			'cta'   => 'Programming services',
			'soon'  => 0,
			'pill'  => '',
		],
		[
			'name'  => 'Online courses',
			'rate'  => 'Self-paced',
			'lede'  => 'The classroom approach, broken into evening-sized pieces you do on your own time.',
			'url'   => '/courses/',
			'cta'   => 'Browse online courses',
			'soon'  => 0,
			'pill'  => '',
		],
	],
] );

// 6. AUTHORITY
$content .= ns_block( 'block-authority', [
	'variant'      => 'standard',
	'pretitle'     => 'Proof',
	'heading'      => 'If I haven\'t trained on your control, [em]it doesn\'t exist.[/em]',
	'lede'         => 'You\'ll probably read a few of my articles before you ring. That\'s how it usually goes.',
	'spec_items'   => [
		[ 'value' => '30',  'note' => 'yrs', 'label' => 'Training on CNC machines across every major control.',                                    'wide' => 0 ],
		[ 'value' => '332', 'note' => '',    'label' => 'YouTube videos. 8,930 subscribers.',                                                      'wide' => 0 ],
		[ 'value' => '27k', 'note' => '',    'label' => 'LinkedIn followers reading weekly posts.',                                                'wide' => 0 ],
		[ 'value' => '30',  'note' => '',    'label' => 'Five-star Google reviews. None lower.',                                                   'wide' => 0 ],
		[ 'value' => '8+',  'note' => '',    'label' => 'Controls covered: Fanuc, Siemens, Heidenhain, Mazak, Hurco, Brother, Haas, Doosan, XYZ, Edgecam, sliding head.', 'wide' => 1 ],
	],
	'show_reviews' => 1,
] );

// 7. HUB-PREVIEW
$content .= ns_block( 'block-hub-preview', [
	'heading'         => 'If you\'ve got a question, [em]I\'ve probably written about it.[/em]',
	'lede'            => '300+ articles, 332 videos. Filter by control, machine or job. No signup, no paywall.',
	'cta'             => [ 'url' => '/learning-hub/', 'title' => 'Browse the Hub', 'target' => '' ],
	'secondary_items' => [],
] );

// 8. DECISIVENESS
$content .= ns_block( 'block-decisiveness', [
	'pretitle'      => 'The offer',
	'heading'       => 'Tell me the machines. [em]I\'ll come back with a price.[/em]',
	'lede'          => 'What machines, what level your team\'s at, what you need them able to do. One paragraph or one phone call.',
	'primary_cta'   => [ 'url' => '/contact/', 'title' => 'Send enquiry', 'target' => '' ],
	'secondary_cta' => [ 'url' => 'tel:+447834858407', 'title' => '07834 858 407', 'target' => '' ],
	'phone'         => '',
	'email'         => '',
] );

ns_upsert_page( 'home', 'Home', $content );
WP_CLI::success( 'home composed.' );
