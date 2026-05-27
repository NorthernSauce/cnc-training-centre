<?php
/**
 * Compose: Home page.
 * Run: wp eval-file wp-content/themes/cnc-training-centre/build/compose-home.php
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
	'lede'          => 'The machines cost more than most people\'s houses. The people running them learned from whoever was free on their first day.',
	'primary_cta'   => [ 'url' => '/contact/', 'title' => 'Contact David', 'target' => '' ],
	'secondary_cta' => [ 'url' => 'tel:+447834858407', 'title' => '07834 858 407', 'target' => '' ],
	'show_reviews'  => 1,
] );

// 2. AGITATION
$content .= ns_block( 'block-agitation', [
	'heading'    => 'I know we should have sorted this [em]ages ago.[/em]',
	'body_left'  => '<p>Every week those machines run slow or sit idle is money you\'re quietly losing. Work goes out the door that should be done in-house. Staff stay stuck at operator level. Programming gets bottlenecked through one person who learned it fifteen years ago. New starters take months to become useful because nobody has time to train them properly. "We\'ll sort it next quarter" becomes next year, becomes never.</p>',
	'body_right' => '<p>You\'ve thought about training before. The OEMs will do it. They charge double what you\'d expect, locked to their brand only, following a rigid syllabus that doesn\'t match your actual jobs. Or there\'s the internet route: hours of free content, no structure, no one to ask when something doesn\'t make sense. Neither option fits. So it stays on the list. Another quarter goes by. The machines keep running slow.</p><p>Meanwhile, training feels like a hassle. It\'s expensive. You\'re not sure it\'ll actually stick. Every quarter, the same gap.</p>',
] );

// 3. POSITIONING
$content .= ns_block( 'block-positioning', [
	'pretitle'   => 'What I do',
	'heading'    => 'The [em]independent CNC trainer[/em] for British engineering shops.',
	'body_left'  => '<p>OEM trainers cover their own kit. University courses produce graduates who\'ve never set a tool offset under pressure. YouTube doesn\'t show up when the spindle won\'t move. I\'ve spent thirty years doing one thing: closing the gap between the machine you own and the skills your people have. Every major control. Onsite, or classroom on simulators if you\'d rather your people came to me.</p>',
	'body_right' => '<p>The OEMs keep sending me referrals because they know I cover what their syllabus won\'t. The 8,930 people on my YouTube channel watch me work through real problems on real machines. The 30 Google reviews are five stars because the work is the work. None of that proves I\'m good on its own. It proves I\'ve been doing it in public for thirty years.</p>',
] );

// 4. MECHANISM
$content .= ns_block( 'block-mechanism', [
	'pretitle'  => 'How it works',
	'heading'   => 'What\'s the only training that [em]doesn\'t stop the line?[/em]',
	'body'      => '<p class="mechanism-lede">Most training pulls your team off the floor, sits them in a room with a PowerPoint, hands them a folder, sends them back two days later. The kit didn\'t run all week. The customer\'s still waiting. Half of what they learned won\'t transfer because they never touched the machine.</p><p>I do it the other way round. I come to your shop. I train on your actual machines, with your actual parts. Your operator learns the cycle they\'re going to run on Monday. The setter watches offsets get dialled in on the part that\'s due Thursday. By the time I leave, the job is in spec and the person who couldn\'t do it can.</p><p>I assess as I go. If your operators pick something up fast, I move on. If they\'re struggling, I stay until it clicks. No fixed agenda. Every shop floor is a different fixed agenda already. Yours.</p>',
	'dl_items'  => [
		[ 'term' => 'On your machines',  'definition' => 'I train on your actual machines.' ],
		[ 'term' => 'Your parts',        'definition' => 'Against your real jobs.' ],
		[ 'term' => 'As production runs','definition' => 'The setter watches offsets get dialled in on the part that\'s due Thursday.' ],
		[ 'term' => 'No fixed agenda',   'definition' => 'Every shop floor is a different fixed agenda already. Yours.' ],
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
			'lede'  => 'I come to you. Your machines, your parts, your pace. Every major control. £700/day for the whole team, not per person.',
			'url'   => '/onsite-training/',
			'cta'   => 'Onsite training',
			'soon'  => 0,
			'pill'  => '',
		],
		[
			'name'  => 'Classroom training',
			'rate'  => '£300 / student / day',
			'lede'  => 'Small groups in Leicestershire. One to six students on six CNC simulators. Beginners through advanced. £300/student/day. Certificate on completion.',
			'url'   => '/classroom-training/',
			'cta'   => 'Classroom training',
			'soon'  => 0,
			'pill'  => '',
		],
		[
			'name'  => 'Programming services',
			'rate'  => '£60 to £100 / hr',
			'lede'  => 'Send the drawing. I\'ll program it in Edgecam on a professional licence and deliver tested G-code. £60 to £100 per hour.',
			'url'   => '/programming-services/',
			'cta'   => 'Programming services',
			'soon'  => 0,
			'pill'  => '',
		],
		[
			'name'  => 'Online courses',
			'rate'  => 'In development',
			'lede'  => 'Self-paced, built on the same approach as the classroom. No filler. Sign up to know when it opens.',
			'url'   => '/courses/',
			'cta'   => 'Notify me',
			'soon'  => 1,
			'pill'  => 'notify me',
		],
	],
] );

// 6. AUTHORITY
$content .= ns_block( 'block-authority', [
	'variant'      => 'standard',
	'pretitle'     => 'Proof',
	'heading'      => 'If I haven\'t trained on your control, [em]it doesn\'t exist.[/em]',
	'lede'         => 'You\'ll have read a few of my articles before you reach the form. That\'s how it tends to work. The content does the qualifying, the call does the rest.',
	'spec_items'   => [
		[ 'value' => '30',  'note' => 'yrs', 'label' => 'Training on CNC machines across every major control.',                                    'wide' => 0 ],
		[ 'value' => '332', 'note' => '',    'label' => 'YouTube videos. 8,930 subscribers. Beginner to advanced.',                               'wide' => 0 ],
		[ 'value' => '27k', 'note' => '',    'label' => 'LinkedIn followers reading weekly posts about CNC work.',                                 'wide' => 0 ],
		[ 'value' => '30',  'note' => '',    'label' => 'Five-star Google reviews. No three-star, no two-star, no one-star.',                     'wide' => 0 ],
		[ 'value' => '8+',  'note' => '',    'label' => 'OEM controls covered: Fanuc, Siemens, Heidenhain, Mazak, Hurco, Brother, Haas, Doosan, XYZ, Edgecam, sliding head.', 'wide' => 1 ],
	],
	'show_reviews' => 1,
] );

// 7. HUB-PREVIEW
$content .= ns_block( 'block-hub-preview', [
	'heading'         => 'If you\'ve got a question, [em]I\'ve probably written about it.[/em]',
	'lede'            => 'Filter by control, by machine, by job. Read what you need. No signup, no paywall.',
	'cta'             => [ 'url' => '/learning-hub/', 'title' => 'Browse the Hub', 'target' => '' ],
	'secondary_items' => [
		[
			'title'     => '[GAP — confirm article]',
			'dek'       => '',
			'url'       => '',
			'control'   => 'Fanuc',
			'skill'     => '',
			'type'      => 'Article',
			'read_time' => '',
		],
		[
			'title'     => '[GAP — confirm article]',
			'dek'       => '',
			'url'       => '',
			'control'   => '',
			'skill'     => '',
			'type'      => 'Article',
			'read_time' => '',
		],
	],
] );

// 8. DECISIVENESS
$content .= ns_block( 'block-decisiveness', [
	'pretitle'      => 'The offer',
	'heading'       => 'Tell me the machines. [em]I\'ll come back with a price.[/em]',
	'lede'          => 'Ring me. Tell me what machines you\'ve got, what level your team\'s at, what you need them able to do.',
	'primary_cta'   => [ 'url' => '/contact/', 'title' => 'Send enquiry', 'target' => '' ],
	'secondary_cta' => [ 'url' => 'tel:+447834858407', 'title' => '07834 858 407', 'target' => '' ],
	'phone'         => '',
	'email'         => '',
] );

ns_upsert_page( 'home', 'Home', $content );
WP_CLI::success( 'home composed.' );
