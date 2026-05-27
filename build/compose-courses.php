<?php
/**
 * Compose: Courses page.
 * Run: wp eval-file wp-content/themes/cnc-training-centre/build/compose-courses.php
 *
 * Design order (courses.html):
 *  1. .hero.cs-hero      → block-hero
 *  2. .cs-archive        → block-cs-archive
 *  3. .cs-first          → block-how-it-works
 *  4. .cs-who            → block-who (variant=courses)
 *  5. .cs-anti           → block-anti-positioning
 *  6. .cs-hub            → block-hub-preview
 *
 * Note: /courses/ URL is served by archive-cnc-course.php (CPT conflict).
 * Composed page at slug "courses" exists but may not be live at that URL.
 * See B3-LOG item 2 for resolution options.
 */

require __DIR__ . '/lib/compose.php';

$content = '';

// 1. HERO
$content .= ns_block( 'block-hero', [
	'variant'       => 'service',
	'eyebrow'       => 'Online courses. Self-paced.',
	'heading'       => 'The classroom course, broken up so you can do it [em]at the kitchen table.[/em]',
	'lede'          => 'You finish your shift. You want to learn the programming side. The classroom courses are in Leicestershire and you live in Glasgow. These are the same courses, broken into evening-sized pieces you can do on your own time.',
	'primary_cta'   => [ 'url' => '#archive', 'title' => 'Browse courses', 'target' => '' ],
	'secondary_cta' => [ 'url' => '/learning-hub/', 'title' => 'Browse the Hub', 'target' => '' ],
	'show_reviews'  => 0,
] );

// 2. CS-ARCHIVE
$content .= ns_block( 'block-cs-archive', [
	'pretitle' => 'The catalogue',
	'heading'  => 'Eight courses. [em]Self-paced.[/em] Enrol when you\'re ready.',
	'lede'     => 'Pick the one that matches where you are. Each course is self-contained — finish it, get the certificate, move on to the next.',
	'courses'  => [
		[ 'num' => '01', 'level' => 'Beginner',      'name' => 'Beginners — Milling',            'dek' => 'Start from cold metal. Tool setting, work offsets, your first programme, on a real Fanuc control simulator.',           'format' => 'Self-paced', 'length' => '~6 hours',  'price' => 'From £[GAP — Dave to confirm price]', 'url' => '' ],
		[ 'num' => '02', 'level' => 'Beginner',      'name' => 'Beginners — Turning',            'dek' => 'Lathe equivalent. Tool turret, offsets, basic turning G-code. Works alongside the milling beginners course.',            'format' => 'Self-paced', 'length' => '~6 hours',  'price' => 'From £[GAP — Dave to confirm price]', 'url' => '' ],
		[ 'num' => '03', 'level' => 'Intermediate',  'name' => 'Setter / Operator — Milling',    'dek' => 'Move from pressing cycle-start to setting jobs yourself. Offsets, edge-finding, first-off inspection.',                  'format' => 'Self-paced', 'length' => '~8 hours',  'price' => 'From £[GAP — Dave to confirm price]', 'url' => '' ],
		[ 'num' => '04', 'level' => 'Intermediate',  'name' => 'Setter / Operator — Turning',    'dek' => 'Lathe equivalent. Setting the turret, bar feed, common turning problems. Practical focus throughout.',                  'format' => 'Self-paced', 'length' => '~8 hours',  'price' => 'From £[GAP — Dave to confirm price]', 'url' => '' ],
		[ 'num' => '05', 'level' => 'Intermediate',  'name' => 'Learn to Program — Milling',     'dek' => 'Write G-code by hand. Canned cycles, cutter compensation, subroutines. You leave the course able to write a programme from a drawing.', 'format' => 'Self-paced', 'length' => '~10 hours', 'price' => 'From £[GAP — Dave to confirm price]', 'url' => '' ],
		[ 'num' => '06', 'level' => 'Intermediate',  'name' => 'Learn to Program — Turning',     'dek' => 'Lathe programming from scratch. Roughing and finishing cycles, threading, grooving, parting.',                          'format' => 'Self-paced', 'length' => '~10 hours', 'price' => 'From £[GAP — Dave to confirm price]', 'url' => '' ],
		[ 'num' => '07', 'level' => 'Advanced',      'name' => 'Macro Programming',              'dek' => 'Parametric programming. Variables, IF/THEN/GOTO, custom cycles. Separates programmers from people who copy programmes.', 'format' => 'Self-paced', 'length' => '~12 hours', 'price' => 'From £[GAP — Dave to confirm price]', 'url' => '' ],
		[ 'num' => '08', 'level' => 'Advanced',      'name' => 'Edgecam',                        'dek' => 'CAD/CAM workflow: import, toolpath, post. Covers the whole chain from model to tested G-code.',                         'format' => 'Self-paced', 'length' => '~12 hours', 'price' => 'From £[GAP — Dave to confirm price]', 'url' => '' ],
	],
	'surface'  => 's-paper',
] );

// 3. HOW-IT-WORKS
$content .= ns_block( 'block-how-it-works', [
	'pretitle' => 'How it works',
	'heading'  => 'No fixed schedule. [em]No classroom.[/em] Just the course.',
	'items'    => [
		[ 'name' => 'Enrol and get immediate access.', 'body' => 'Pay for the course, log in, start the first module. No waiting for cohort dates. No scheduling around your employer.' ],
		[ 'name' => 'Work through it at your own pace.', 'body' => 'Each course is broken into modules you can do in an evening. Pause, rewatch, redo any section. The course doesn\'t expire.' ],
		[ 'name' => 'Submit work, get a certificate.', 'body' => 'Each course ends with a practical assessment. Submit it, I mark it, you get a certificate that says you can do the thing the course covers. [GAP — Dave to confirm assessment format.]' ],
		[ 'name' => 'Ask questions in the course forum.', 'body' => 'Every course has a Q&A section. I check it. If something doesn\'t make sense, ask. [GAP — Dave to confirm support model.]' ],
	],
	'surface'  => 's-paper-tint',
] );

// 4. WHO (cs-who — courses variant)
$content .= ns_block( 'block-who', [
	'variant'        => 'courses',
	'heading'        => 'If the classroom course is in Leicestershire [em]and you\'re in Glasgow.[/em]',
	'body_left'      => '<p>Operators who finished their apprenticeship and want to move into programming. Manual machinists making the switch. People who\'ve been watching my YouTube videos for six months and want the structured version. Individuals paying out of pocket because their employer won\'t fund training and they\'re doing it themselves.</p>',
	'body_right'     => '<p>The classroom courses are small-group, intensive, in person. If you\'re anywhere in the UK except Leicestershire, that means travel. These are the same material, restructured for self-paced online. Same controls, same programming approach, same certificate.</p>',
	'show_pullquote' => 0,
	'pullquote_text' => '',
	'pullquote_cite' => '',
	'show_coda'      => 0,
	'coda'           => '',
] );

// 5. ANTI-POSITIONING
$content .= ns_block( 'block-anti-positioning', [
	'pretitle' => 'Three things these aren\'t',
	'heading'  => 'What these courses [em]are not.[/em]',
	'items'    => [
		[ 'num' => '01', 'name' => 'A YouTube playlist.',          'body' => 'The Hub has 332 free videos. These courses are structured, assessed, and certificated. Different thing.' ],
		[ 'num' => '02', 'name' => 'An academic qualification.',   'body' => 'The certificate evidences you can do the thing the course covers. It doesn\'t replace an HNC or an engineering degree. It\'s a practical credential, not an academic one.' ],
		[ 'num' => '03', 'name' => 'A replacement for onsite.',    'body' => 'If you\'ve got machines and a team that needs lifting, onsite training is still the better option. These are for individuals who can\'t make the classroom work geographically or financially.' ],
	],
	'surface'  => 's-paper-tint',
] );

// 6. HUB-PREVIEW
$content .= ns_block( 'block-hub-preview', [
	'heading'         => 'Start here before you enrol.',
	'lede'            => 'The Learning Hub has hundreds of free articles covering the same ground as the courses. Good way to check whether the course level fits before you pay.',
	'cta'             => [ 'url' => '/learning-hub/', 'title' => 'Browse the Hub', 'target' => '' ],
	'secondary_items' => [
		[
			'title'     => '[GAP — confirm article]',
			'dek'       => '',
			'url'       => '',
			'control'   => 'Fanuc',
			'skill'     => 'G-code',
			'type'      => 'Article',
			'read_time' => '',
		],
		[
			'title'     => '[GAP — confirm article]',
			'dek'       => '',
			'url'       => '',
			'control'   => '',
			'skill'     => 'Setup',
			'type'      => 'Article',
			'read_time' => '',
		],
	],
] );

ns_upsert_page( 'courses', 'Courses', $content );
WP_CLI::success( 'courses composed.' );
