<?php
/**
 * Compose: About page.
 * Run: wp eval-file wp-content/themes/cnc-training-centre/build/compose-about.php
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
	'lede'          => 'Thirty years walking into workshops. Machines cost six figures. Operators taught by whoever was free on day one.',
	'primary_cta'   => [ 'url' => '/contact/', 'title' => 'Contact David', 'target' => '' ],
	'secondary_cta' => [ 'url' => '/learning-hub/', 'title' => 'Browse the Hub', 'target' => '' ],
	'show_reviews'  => 1,
] );

// 2. ABOUT-TRAINER
$content .= ns_block( 'block-about-trainer', [
	'pretitle'  => 'How I got here',
	'heading'   => 'Manual machines first. Then turning. Then mills. [em]Then everything.[/em]',
	'body_left' => '<p>I started in CNC the way most people did in the early nineties. Running machines, picking up the next control when the next machine came in, getting handed problems nobody else could solve. Manual first. Then turning. Then mills. Then programming. Then macro. Then everything Fanuc could throw at you, and Heidenhain, and Siemens, and Mazak. Sliding head when sliding head started turning up on UK floors.</p>',
	'body_right' => '<p>By the mid-nineties I was the bloke other engineers in the workshop came to when something on the machine didn\'t make sense. That\'s a useful thing to be, but it pays the same as the people not solving anything. So I started training. Then I started training independently. Because the OEM gigs would only ever let me teach their own brand, and I wanted to teach the actual machine in front of the actual operator, whatever logo was on it.</p>',
	'coda'      => 'Thirty years on, that\'s still the only thing I do. Onsite at your workshop, classroom in Leicestershire, programming services when you\'ve got the job and not the time. Same bloke on the call as the bloke on your machine. There\'s no team. It\'s me.',
	'pullquote' => 'I get really pissed off now if I google something to do with CNC machines and I don\'t find my own article. Every time I find something on a machine that I might forget, I write a post about it. Easy. When I google something, it\'s me.',
	'foot'      => 'That\'s how the Learning Hub got to 300+ articles. Same instinct as how I got to thirty years on the controls. Keep going, write it down, share it.',
] );

// 3. KNOWN
$content .= ns_block( 'block-known', [
	'pretitle'  => 'What I\'m known for',
	'heading'   => 'The work, [em]not the marketing.[/em]',
	'lede'      => 'A few things, sourced not invented.',
	'spec_items' => [
		[ 'value' => '30',   'note' => 'yrs', 'label' => 'Training on every major control. Fanuc, Heidenhain, Siemens, Mazak/Mazatrol, Hurco, Brother, Haas, Doosan, XYZ, sliding head. If you\'ve got a machine I haven\'t named, ask.', 'wide' => 0 ],
		[ 'value' => '300+', 'note' => '',    'label' => 'The Learning Hub. 332 YouTube videos and hundreds of articles, all written or filmed by me. Started in 2014 when I realised I was googling the same problems twice and finding nothing useful.', 'wide' => 0 ],
		[ 'value' => '27k',  'note' => '',    'label' => 'LinkedIn followers reading the weekly content. There\'s a piece every week, and most of them name a real machine and a real problem.', 'wide' => 0 ],
		[ 'value' => '8,930','note' => '',    'label' => 'YouTube subscribers. The channel is the same. Actual machines, actual jobs, actual G-code on screen.', 'wide' => 0 ],
		[ 'value' => '30',   'note' => '',    'label' => 'Five-star Google reviews from people who\'ve sat through a course or had me on their floor. And known by the OEMs. Mazak, Fanuc, Heidenhain, Hurco. Some of them send me work when their own training calendar won\'t flex. That\'s the proof. None of it is marketing. It\'s just thirty years of doing the work and writing about it as I go.', 'wide' => 1 ],
	],
] );

// 4. INDEP
$content .= ns_block( 'block-indep', [
	'pretitle'   => 'Why independent, not OEM',
	'heading'    => 'One brand isn\'t your problem.[br][em]Your problem is a mixed shop.[/em]',
	'body_left'  => '<p>Most of the engineering companies I walk into don\'t have one machine. They have five, six, ten. Different brands, different controls, different vintages. The Mazak from 2008 next to the Hurco from last year next to the sliding head that nobody\'s touched in three months because the bloke who knew it left.</p>',
	'body_right' => '<p>OEM training is brand-locked by design. Mazak will train you on Mazak. Fanuc will train you on Fanuc. Both are good at their own kit. Neither will help you with the other four machines on your floor. And both will charge you per person, per day, with the syllabus they\'ve decided you need.</p>',
	'coda'       => 'That\'s the gap I sit in. I\'ve trained on every major control, so when I walk in I\'m useful from the first machine to the last. I don\'t work to a syllabus. I work to what your operators need, on the kit you actually own. And the day rate is for the whole team, not per head, so training four people doesn\'t cost four times what training one would.',
	'pullquote'  => 'The OEMs do good work in their lane. I do good work across every lane.',
] );

// 5. PLAN-STEPS (How I teach)
$content .= ns_block( 'block-plan-steps', [
	'pretitle'  => 'How I teach',
	'heading'   => 'No fixed agenda. [em]I assess as I go.[/em]',
	'lede'      => 'The training works because there\'s no script. Some people pick something up in twenty minutes. Some take half a day. A syllabus says "by 11am we\'ll cover X" which means either you race ahead of half the room or you wait for the slowest. Neither is training. That\'s a presentation.',
	'cta'       => [ 'url' => '/contact/', 'title' => 'Tell David what you need', 'target' => '' ],
	'steps'     => [
		[
			'num'   => '01',
			'title' => 'Start where they actually are.',
			'body'  => 'First morning I walk round the shop with whoever runs production, see what the machines are doing, see what the team\'s level actually is. If they\'re flying, I push further. If they\'re stuck on something basic, we stay on it until it clicks. The day rate is fixed. The scope flexes to fit the people in front of me.',
		],
		[
			'num'   => '02',
			'title' => 'Train on your actual machines.',
			'body'  => 'Simulators are fine for the classroom (I run six of them) but the strongest retention comes from learning the skill the day before you apply it. Train on Monday, run the part on Tuesday. That\'s how it sticks.',
		],
		[
			'num'   => '03',
			'title' => 'Connect it to next week\'s work.',
			'body'  => 'If you\'ve sat through a training course before and forgotten most of it by Friday, that\'s why. The training wasn\'t connected to anything you were going to do next.',
		],
	],
] );

// 6. WHERE
$content .= ns_block( 'block-where', [
	'pretitle'   => 'Where I work from',
	'heading'    => 'Barwell, Leicestershire.[br][em]Or I come to you.[/em]',
	'body_left'  => '<p>The classroom is in Barwell, just outside Hinckley. Six CNC machine simulators on the bench, set up for milling and turning, every major control. Small-group courses. One to six students. Never more.</p>',
	'body_right' => '<p>Onsite work is UK-wide. I\'ve been on floors from Cornwall to Inverness, in everything from a two-machine job shop to a forty-machine production facility. Travel time within the UK is included in the day rate. If you\'re a long way north or south of Leicestershire and I\'m losing a day to the drive, I\'ll flag that on the quote rather than hide it.</p>',
	'coda'       => 'If you want to come and see the classroom before you commit, ask. The kettle\'s on.',
] );

// 7. FAQ
$content .= ns_block( 'block-faq', [
	'heading' => 'What gets asked [em]about me specifically?[/em]',
	'items'   => [
		[
			'question' => 'Who have you trained for?',
			'answer'   => '<p>A mix. SMB engineering companies from five to fifty staff is the bread and butter. Larger production facilities when the OEM training calendar won\'t flex. Individuals paying out of their own pocket to move from operator to programmer. The OEMs themselves on the occasional referral. The common thread is people who\'d rather have a bloke who\'s actually run the kit than a bloke who\'s been reading a manual.</p>',
		],
		[
			'question' => 'What machines have you owned?',
			'answer'   => '<p>Plenty over thirty years. Currently I run six CNC simulators in the classroom covering milling, turning, and the major controls. I\'ve trained on far more than I\'ve owned. That\'s the nature of being independent. If you\'re curious about a specific machine, ask.</p>',
		],
		[
			'question' => 'Are you available for consulting work?',
			'answer'   => '<p>Yes. Onsite training is the main thing, but I also take consulting engagements. Productivity audits, process work, programming efficiency, training audits where someone else has tried to lift a team and it hasn\'t stuck. Same day rate as onsite training. Contact me with the specifics.</p>',
		],
		[
			'question' => 'Do you only do CNC, or other engineering training too?',
			'answer'   => '<p>CNC. That\'s it. Thirty years on the controls is the whole offer. If you need press-tool training or fabrication training, I\'ll point you to someone who does it properly.</p>',
		],
		[
			'question' => 'Why is there no team?',
			'answer'   => '<p>Because I\'m the bloke who turns up on every job. There\'s no junior trainer to hand the engagement off to, no associate I subcontract to, no "we" hiding two people who\'ve never met. When you book me, you get me. That\'s a constraint on capacity. I\'m typically booking four to six weeks out. But it\'s the whole point.</p>',
		],
		[
			'question' => 'Will the swearing be in the training too?',
			'answer'   => '<p>Probably some. I keep it tighter than the articles when I\'m on a shop floor with strangers. I\'m not going to suddenly stop being a bloke from Leicestershire. If that\'s a problem, say so on the enquiry call and we\'ll work it out.</p>',
		],
	],
] );

// 8. CONTACT-BAND
$content .= ns_block( 'block-contact-band', [
	'pretitle'      => 'Contact',
	'heading'       => 'Send me a paragraph. [em]I\'ll come back inside a working day.[/em]',
	'lede'          => 'Call me direct on 07834 858 407, or send a paragraph below. I aim to come back inside a working day with a proper answer, not a templated reply.',
	'primary_cta'   => [ 'url' => '/contact/', 'title' => 'Send enquiry', 'target' => '' ],
	'secondary_cta' => [ 'url' => 'tel:+447834858407', 'title' => '07834 858 407', 'target' => '' ],
] );

ns_upsert_page( 'about', 'About', $content );
WP_CLI::success( 'about composed.' );
