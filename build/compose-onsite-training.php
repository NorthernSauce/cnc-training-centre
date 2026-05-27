<?php
/**
 * Compose: Onsite Training page.
 * Run: wp eval-file wp-content/themes/cnc-training-centre/build/compose-onsite-training.php
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
	'body_left'  => "<p>You're an MD, production manager, or engineering manager. Six-figure CNC machines on the floor, people running them working off muscle memory. The fast jobs take a day. The complicated jobs go out to a subcontractor because nobody in-house can program them. One person knows the Mazak properly and you wince every time he books holiday.</p>",
	'body_right' => "<p>That's the gap I close. I come in, work with the team you've got, on the kit you've got, and leave with everyone two or three rungs further up than they were on Monday. Not in a classroom on a simulator. On your machine, with your fixtures, programming your parts.</p>",
] );

// 3. HOW-TRAIN
$content .= ns_block( 'block-how-train', [
	'pretitle' => 'How I train',
	'heading'  => 'What\'s the only training your team applies [em]the next day?[/em]',
	'body'     => '<p>Most CNC training sits your team in a room with a PowerPoint, hands them a folder, sends them back two days later to do the job they couldn\'t do before. The kit didn\'t run all week. The customer\'s still waiting. Half of what they learned won\'t transfer because they never touched the machine they\'re supposed to use it on.</p><p>I do it the other way round. I come to your shop. I train on your actual machines, with your actual parts, against your actual jobs. Your operator learns the cycle they\'re going to run on Monday. The setter watches offsets get dialled in on the part that\'s due Thursday. By the time I leave, the job is in spec and the person who couldn\'t do it can.</p><p>I assess as I go. If your operators pick something up fast, I move on. If they\'re struggling, I stay until it clicks. No fixed agenda. Every shop floor is a different fixed agenda already. Yours.</p>',
] );

// 4. INCLUDED-LIST
$content .= ns_block( 'block-included-list', [
	'pretitle' => 'What\'s included',
	'heading' => 'Whole team, every control, [em]no per-head pricing.[/em]',
	'items'    => [
		[ 'name' => 'Days onsite.',                     'body' => 'Scoped on the enquiry call. Typically 2 to 5.' ],
		[ 'name' => 'Training on your actual machines.','body' => 'Mills, lathes, sliding head, multi-axis. Mixed shops welcome.' ],
		[ 'name' => 'Every major control.',             'body' => 'Fanuc, Heidenhain, Siemens, Mazak/Mazatrol, Hurco, Brother, Haas, Doosan, XYZ, sliding head. If I haven\'t named your control, ask.' ],
		[ 'name' => 'Whole team, flat rate.',           'body' => 'Two operators or six. Same £700/day.' ],
		[ 'name' => 'Adapted as I go.',                 'body' => 'No fixed syllabus. I work to the room in front of me.' ],
		[ 'name' => 'Certificate per person trained.',  'body' => 'For your auditors, customers, the operator\'s CV.' ],
		[ 'name' => 'Follow-up support.',               'body' => 'Phone stays on after I leave. If something kicks back the week after, get the call.' ],
	],
	'surface'  => 's-paper-tint',
] );

// 5. OUTCOME
$content .= ns_block( 'block-outcome', [
	'heading' => 'What your shop looks like six months [em]after I leave[/em]',
	'body'    => '<p>The machines that were sitting idle are running. The operator who could only press cycle-start is programming jobs independently. New starters get up to speed in weeks because there\'s a proper structure to how they learn. You stop losing work you should be winning. The skills gap isn\'t a problem any more. It\'s something you used to have.</p>',
	'layout'  => 'single',
	'surface' => 's-paper-tint',
] );

// 6. PRICING-NARRATIVE
$content .= ns_block( 'block-pricing-narrative', [
	'pretitle' => 'Pricing',
	'heading' => 'What £700 a day [em]actually gets you.[/em]',
	'body'     => "<p>Day rate is £700 plus VAT. For the whole team. Two operators or six, same price. Hotel goes on top at cost if I'm staying over. Travel within the UK is included. If you're a long way north or south of Leicestershire and I'm losing a day to the drive, I'll flag that on the quote rather than hide it.</p>\n<p>Onsite engagements are paid upfront once dates are confirmed. I know that's not how every supplier works. It's how I've run it for thirty years and it keeps the relationship clean.</p>",
	'surface'  => 's-paper',
] );

// 7. DISQUALIFIER
$content .= ns_block( 'block-disqualifier', [
	'pretitle'    => 'Disqualifier',
	'heading'     => 'What\'s onsite training [em]the wrong choice for?[/em]',
	'lede'        => 'Onsite training is the right call when you\'ve got machines on the floor, a team that needs lifting, and the work to apply the training to once I\'m gone. It\'s the wrong call in a few situations. I\'d rather say so up front than take the booking.',
	'items'       => [
		[ 'index' => 'A', 'name' => 'You haven\'t got the machines yet.', 'body' => 'Kit on order or you\'re still scoping a purchase? Classroom training on simulators is the better starting point. Onsite makes sense once the machines are in.' ],
		[ 'index' => 'B', 'name' => 'You want one person trained to expert level in two days.', 'body' => 'Not how skills work. I can move someone meaningfully along the ladder in a week. Mastery takes the months after I leave.' ],
		[ 'index' => 'C', 'name' => 'You\'re shopping for the cheapest quote in the market.', 'body' => 'OEMs often charge double my day rate. I\'m not the cheapest independent option either. I\'m the one who\'s been doing this for thirty years on every control you can name. Price-shop if that\'s the priority. Be honest about it.' ],
		[ 'index' => 'D', 'name' => 'You want a fixed syllabus to tick a compliance box.', 'body' => 'I don\'t work to agenda. If your situation needs a rigid, accredited course structure, the OEM route fits better.' ],
	],
	'footer_note' => 'If any of those land, say so on the enquiry call. I\'ll route you somewhere that fits, including a competitor if that\'s the honest answer.',
	'surface'     => 's-paper-tint',
] );

// 8. AUTHORITY
$content .= ns_block( 'block-authority', [
	'variant'      => 'standard',
	'heading' => 'Thirty years. Every major control. [em]Known by the OEMs.[/em]',
	'lede'         => 'The OEMs send me referrals because they know I cover what their syllabus won\'t. Some of them send me work when their own training schedule won\'t flex.',
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
	'lede'            => 'Most of the people who eventually book an onsite engagement have already read three or four articles. The content does the qualifying so the call can be short and practical.',
	'cta'             => [ 'url' => '/learning-hub/', 'title' => 'Browse the Hub', 'target' => '' ],
	'secondary_items' => [
		[
			'title'     => 'Sliding-head pickup tool offset trick that saves a morning',
			'dek'       => '',
			'url'       => '',
			'control'   => 'Sliding head',
			'skill'     => '',
			'type'      => 'Article',
			'read_time' => '6 min',
		],
		[
			'title'     => 'OEM training vs independent: what you\'re actually paying for',
			'dek'       => '',
			'url'       => '',
			'control'   => '',
			'skill'     => '',
			'type'      => 'Article',
			'read_time' => '',
		],
	],
] );

// 10. FAQ
$content .= ns_block( 'block-faq', [
	'heading' => 'What gets asked [em]on every enquiry call?[/em]',
	'items'   => [
		[
			'question' => 'Do you know my machine?',
			'answer'   => '<p>Probably. I\'ve trained on every major control. Tell me what you\'ve got on the floor and I\'ll be straight with you about whether it\'s somewhere I can add value or somewhere you\'d be better off with the OEM.</p>',
		],
		[
			'question' => 'Is your day rate per person or for the whole team?',
			'answer'   => '<p>Whole team. £700/day covers two operators or six. Per-person pricing on onsite training is one of the reasons OEM quotes come in so high. If you\'ve got four people who need bringing up, that\'s four times the bill. Here it\'s a flat rate.</p>',
		],
		[
			'question' => 'How long are you onsite?',
			'answer'   => '<p>Depends on the scope. Two days for a focused engagement (e.g. all your operators up to confident programming of standard parts on the Fanuc). A full week if you\'re lifting a team from operator level to programming on multi-axis. I\'d rather scope it honestly on the enquiry call than oversell the engagement.</p>',
		],
		[
			'question' => 'Will my team get certificates?',
			'answer'   => '<p>Yes. One per person trained. Evidenced for your customers, your auditors, and the operator\'s own record.</p>',
		],
		[
			'question' => 'What if my operators learn faster or slower than expected?',
			'answer'   => '<p>That\'s the whole point of adapting as I go. If they\'re flying, I push further. If they\'re struggling, I stay on it until it sticks. The day rate is fixed. The scope flexes to fit the people in front of me.</p>',
		],
		[
			'question' => 'What happens if my team forgets it the moment I leave?',
			'answer'   => '<p>Two answers. First, training on your actual parts, on your actual machine, means the skills get applied the day after I leave. That\'s the strongest retention there is. Second, the phone stays on. If something kicks back in the weeks after, get in touch.</p>',
		],
		[
			'question' => 'Do you work nationwide?',
			'answer'   => '<p>Yes. I\'m based in Barwell, Leicestershire and travel UK-wide. If you\'re a long way north or south, I\'ll flag the travel impact on the quote rather than hide it.</p>',
		],
	],
] );

// 11. DECISIVENESS
$content .= ns_block( 'block-decisiveness', [
	'heading'       => 'Ring me. [em]I\'ll scope it on the call.[/em]',
	'lede'          => 'Call me direct on 07834 858 407, or send a paragraph describing your machines, your team, and what you want them able to do. I aim to come back inside a working day with a proper answer, not a templated reply.',
	'primary_cta'   => [ 'url' => '/contact/', 'title' => 'Contact David', 'target' => '' ],
	'secondary_cta' => [ 'url' => 'tel:+447834858407', 'title' => '07834 858 407', 'target' => '' ],
	'phone'         => '',
	'email'         => '',
] );

ns_upsert_page( 'onsite-training', 'Onsite Training', $content );
WP_CLI::success( 'onsite-training composed.' );
