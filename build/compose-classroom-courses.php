<?php
/**
 * Compose: 8 classroom course pages (children of /classroom-training/).
 * Run: wp eval-file wp-content/themes/cnc-training-centre/build/compose-classroom-courses.php
 *
 * Copy: v4, written 2026-07-24. Facts sourced from legacy course pages
 * (durations, prices, syllabus) — see plans/ fact extraction.
 * All courses: 2 days, 9.30am–4pm, £600 + VAT (£720 inc), Barwell.
 *
 * Per-page block order:
 *  1. block-hero (service)
 *  2. block-who
 *  3. block-offer-list      — What you'll learn
 *  4. block-pricing-grid    — Price + what's included
 *  5. block-training-links  — Amelia events calendar (anchor "dates")
 *  6. block-osm-map         — Where
 *  7. block-decisiveness    — CTA band
 */

require __DIR__ . '/lib/compose.php';

$parent = get_page_by_path( 'classroom-training', OBJECT, 'page' );
if ( ! $parent ) {
	WP_CLI::error( 'classroom-training parent page not found.' );
}

$courses = [

	[
		'slug'     => 'beginners-milling-operator',
		'title'    => 'Beginners Milling Operator',
		'order'    => 1,
		'heading'  => 'Beginners [em]Milling Operator.[/em]',
		'lede'     => 'Two days on a virtual CNC mill. Axes, tools, offsets, measuring. You get to crash the machine without a lawsuit.',
		'who_l'    => '<p>You\'ve never run a CNC mill, or you\'ve only ever pressed the buttons someone else told you to press. You understand the basics of cutting metal and you want in properly.</p>',
		'who_r'    => '<p>This is the course to take before the programming one. If you don\'t know how a tool-changer works yet, start here, not there.</p>',
		'learn'    => [
			'The basic principles of CNC milling and how the process hangs together.',
			'Machine axes X, Y and Z.',
			'The tool-changer and how tool changes actually work.',
			'Ways of setting tools and telling the machine about them.',
			'Choosing the right tool for the job.',
			'Measuring kit: digital calipers, DTI clocks, micrometers, plug and ring gauges.',
			'Practice on your own virtual CNC mill, with real examples.',
		],
		'station'  => 'Your own simulator station for both days',
	],

	[
		'slug'     => 'beginners-turning-operator',
		'title'    => 'Beginners Turning Operator',
		'order'    => 2,
		'heading'  => 'Beginners [em]Turning Operator.[/em]',
		'lede'     => 'Two days on a virtual CNC lathe. Turret, chuck, spindle, tool setting, measuring.',
		'who_l'    => '<p>You\'ve never run a CNC lathe. Maybe you\'re on manual machines, maybe you\'re new to cutting metal for a living altogether.</p>',
		'who_r'    => '<p>Take this before the turning programming course. If you can already set tools and swap jaws, skip ahead to Setter Operator: Turning.</p>',
		'learn'    => [
			'The basic principles of CNC turning and an overview of the process.',
			'Machine axes X and Z.',
			'The turret: how tools change as it indexes, tool selection, safety.',
			'Chuck and spindle: soft versus hard jaws, jaw pressures, spindle speeds and what they do to the workpiece.',
			'Soft jaw boring. Why and how.',
			'Setting tools: auto-measure versus cut-and-measure, and adjusting tools after setting to get the part right.',
			'Measuring kit: digital calipers, DTI clocks, micrometers, plug and ring gauges.',
		],
		'station'  => 'Your own simulator station for both days',
	],

	[
		'slug'     => 'setter-operator-milling',
		'title'    => 'Setter Operator: Milling',
		'order'    => 3,
		'heading'  => 'Setter Operator: [em]Milling.[/em]',
		'lede'     => 'You can press cycle-start. After two days you can set the machine yourself.',
		'who_l'    => '<p>You\'re operating a CNC mill but someone else sets it. Every tool change, every new job, every offset, you\'re waiting for the setter.</p>',
		'who_r'    => '<p>Two days on a Fanuc-control simulator and you\'re the one doing the setting. Covers Haas and most other G-code controls too.</p>',
		'learn'    => [
			'Machine modes: Manual, Jog, Edit, MDI, Auto, Zero Return. Each one demonstrated, then you try it.',
			'Setting work offsets G54 to G59 on sample parts.',
			'Setting tool length offsets, manually and using automatic methods.',
			'Proving out and testing a new program on your own virtual machine.',
			'Using MDI to load tools and start the spindle.',
			'Jogging the machine and using the hand-wheel.',
			'The full sequence, from switching the machine on to switching it off.',
		],
		'station'  => 'Your own simulator station, plus 3 months free use of the software at home after the course',
	],

	[
		'slug'     => 'setter-operator-turning',
		'title'    => 'Setter Operator: Turning',
		'order'    => 4,
		'heading'  => 'Setter Operator: [em]Turning.[/em]',
		'lede'     => 'Stop waiting for the setter. Two days and the lathe is yours to set.',
		'who_l'    => '<p>You\'re running a CNC lathe someone else sets up. You want to set the turret, dial the offsets and prove out a new job yourself.</p>',
		'who_r'    => '<p>All on a Fanuc-control lathe simulator. Crash it as often as you need to. Nobody sends you a bill.</p>',
		'learn'    => [
			'Machine modes: Manual, Jog, Edit, MDI, Auto, Zero Return. Demonstrated, then hands-on.',
			'Setting the work shift datum.',
			'Setting tool offsets, manually and using automatic methods.',
			'Proving out and testing a new program on your own virtual machine.',
			'Using MDI to load tools and start the spindle.',
			'Jogging the machine and using the hand-wheel.',
			'The full sequence, from switching the machine on to switching it off.',
		],
		'station'  => 'Your own simulator station for both days',
	],

	[
		'slug'     => 'learn-to-program-milling',
		'title'    => 'Learn to Program: Milling',
		'order'    => 5,
		'heading'  => 'Learn to Program: [em]Milling.[/em]',
		'lede'     => 'Write G-code by hand from a drawing. Two days, no PowerPoint, lots of programming.',
		'who_l'    => '<p>You\'re an operator or setter who wants to write programmes, not just run them. You know how a mill works and what the tools do.</p>',
		'who_r'    => '<p>If you don\'t, do the Beginners Milling Operator course first. This one moves. Fanuc and Haas covered; Heidenhain, Mazak and Hurco ISO options run the same programs.</p>',
		'learn'    => [
			'The Cartesian coordinate system, without the maths lecture.',
			'What a program actually is: starting one, ending one, structuring it so someone else can read it.',
			'Rapid, feed and circular moves.',
			'Drilling and tapping holes with canned cycles.',
			'Milling around shapes and face-milling the top of a component.',
			'How datums transfer from the drawing to the component.',
			'The G codes and M codes you\'ll actually use.',
			'Sub programs, and comments that make programs make sense.',
		],
		'station'  => 'Your own simulator station, plus 3 months free use of the software at home after the course',
	],

	[
		'slug'     => 'learn-to-program-turning',
		'title'    => 'Learn to Program: Turning',
		'order'    => 6,
		'heading'  => 'Learn to Program: [em]Turning.[/em]',
		'lede'     => 'Lathe programming from scratch. Leave able to program a turned part, hand-coded.',
		'who_l'    => '<p>You\'re on the lathes and you want to write the programmes, not just prove out someone else\'s. You know how a lathe works and what the tooling does.</p>',
		'who_r'    => '<p>If you don\'t, do the Beginners Turning Operator course first. Fanuc and Haas covered; Heidenhain, Mazak and Hurco ISO options run the same programs.</p>',
		'learn'    => [
			'The Cartesian coordinate system as it applies to a two-axis lathe.',
			'Program structure, start to finish.',
			'Rapid, feed and circular motion.',
			'Roughing cycles that do the heavy lifting for you.',
			'Turning profiles.',
			'Screw threads in a few basic commands.',
			'Datums from drawing to component.',
			'G codes, M codes, sub programs and comments.',
		],
		'station'  => 'Your own simulator station for both days',
	],

	[
		'slug'     => 'edgecam-milling',
		'title'    => 'Edgecam Milling',
		'order'    => 7,
		'heading'  => 'Edgecam [em]Milling.[/em]',
		'lede'     => 'From solid model to posted, tested code. On my professional Edgecam licence.',
		'who_l'    => '<p>Your shop bought Edgecam and it\'s earning its keep as expensive shelf-ware. Or you\'re a hand-coder moving to CAM and want to do it properly from day one.</p>',
		'who_r'    => '<p>Two days covering the whole milling workflow. Model in, tested code out, posted to your machine.</p>',
		'learn'    => [
			'The Edgecam workflow, start to finish.',
			'Creating a program from lines or from a solid model.',
			'Posting out code that runs on a real milling machine.',
			'Post processors: what they are and how to run more than one per machine.',
			'Associativity: change the model and the toolpath follows. Move the clamps before you hit them.',
			'Proving the part on a virtual CNC machine.',
			'Part Modeler, alongside Edgecam.',
		],
		'station'  => 'A seat on Edgecam under my professional licence',
	],

	[
		'slug'     => 'edgecam-turning',
		'title'    => 'Edgecam Turning',
		'order'    => 8,
		'heading'  => 'Edgecam [em]Turning.[/em]',
		'lede'     => 'The turning side of Edgecam. From solid model to tested code on a real lathe.',
		'who_l'    => '<p>You\'ve got Edgecam and lathes, and the two aren\'t talking to each other yet. Or you\'re an experienced turner moving from hand-code to CAM.</p>',
		'who_r'    => '<p>Two days covering the whole turning workflow. Model in, tested code out, posted to your lathe.</p>',
		'learn'    => [
			'The Edgecam turning workflow, start to finish.',
			'Creating a program from lines or from a solid model.',
			'Posting out code that runs on a real CNC lathe.',
			'Post processors: what they are and how to run more than one per machine.',
			'Associativity: change the model and the toolpath follows.',
			'Proving the part on a virtual CNC machine.',
			'Part Modeler, alongside Edgecam.',
		],
		'station'  => 'A seat on Edgecam under my professional licence',
	],

];

foreach ( $courses as $c ) {

	$content = '';

	// 1. HERO
	$content .= ns_block( 'block-hero', [
		'variant'       => 'service',
		'eyebrow'       => 'Classroom course · Barwell, Leicestershire',
		'heading'       => $c['heading'],
		'lede'          => $c['lede'],
		'primary_cta'   => [ 'url' => '#dates', 'title' => 'See dates & apply', 'target' => '' ],
		'secondary_cta' => [ 'url' => 'tel:07834858407', 'title' => 'Call 07834 858 407', 'target' => '' ],
		'show_reviews'  => '0',
	] );

	// 2. WHO
	$content .= ns_block( 'block-who', [
		'heading'         => 'Who this course [em]is for.[/em]',
		'body_left'       => $c['who_l'],
		'body_right'      => $c['who_r'],
		'show_pullquote'  => '0',
		'pullquote_text'  => '',
		'pullquote_cite'  => '',
		'show_coda'       => '0',
		'coda'            => '',
	] );

	// 3. WHAT YOU'LL LEARN
	$content .= ns_block( 'block-offer-list', [
		'pretitle' => 'The course',
		'heading'  => 'What you\'ll [em]learn.[/em]',
		'lede'     => 'I teach, you do. Worked examples, then your attempt, then the next problem.',
		'items'    => array_map( fn( $t ) => [ 'text' => $t ], $c['learn'] ),
		'surface'  => 's-paper-tint',
	] );

	// 4. PRICING
	$content .= ns_block( 'block-pricing-grid', [
		'pretitle'      => 'Price & details',
		'heading'       => '2 days. £600 plus VAT. [em]£720 all in.[/em]',
		'lede'          => '<p>Two days, 9.30am to 4pm, at Barwell. One to six students; the course runs even with one. Your employer can pay, or you can pay and reclaim.</p>',
		'alt_link'      => [ 'url' => '/classroom-training/', 'title' => 'See all eight courses', 'target' => '' ],
		'list_a_heading' => 'What\'s included',
		'list_a_style'   => 'ns-list-plus',
		'list_a_items'   => [
			[ 'text' => $c['station'] ],
			[ 'text' => 'All the teaching in person, by me' ],
			[ 'text' => 'Course notes to take home' ],
			[ 'text' => 'Lunch, tea and coffee' ],
			[ 'text' => 'Certificate on completion' ],
		],
		'list_b_heading' => 'What\'s not included',
		'list_b_style'   => 'ns-list-bullet',
		'list_b_items'   => [
			[ 'text' => 'Travel to Barwell' ],
			[ 'text' => 'Accommodation (recommendations sent with confirmation)' ],
		],
		'surface' => 's-paper',
	] );

	// 5. DATES CALENDAR (Amelia)
	$content .= ns_block( 'block-training-links', [
		'pretitle' => 'Dates',
		'heading'  => 'Upcoming dates. [em]Book straight in.[/em]',
		'lede'     => 'Pick a date and apply from the calendar. Two or more of you? I\'ll run it on demand: ring me.',
		'embed'    => '[ameliaeventscalendarbooking]',
		'anchor'   => 'dates',
		'surface'  => 's-paper-tint',
	] );

	// 6. WHERE
	$content .= ns_block( 'block-osm-map', [
		'heading_pretitle' => 'Location',
		'heading'          => 'Barwell, Leicestershire.',
		'body'             => 'The classroom is in Barwell, just outside Hinckley. Postcode and directions sent with your booking confirmation. Staying over? Half a dozen hotels and B&Bs within ten minutes.',
		'address_lines'    => [
			[ 'label' => 'Town',       'value' => 'Barwell, Leicestershire' ],
			[ 'label' => 'Directions', 'value' => 'Sent with booking confirmation' ],
		],
		'parking_note'  => '',
		'iframe_src'    => 'https://www.openstreetmap.org/export/embed.html?bbox=-1.3803%2C52.5590%2C-1.3403%2C52.5790&layer=mapnik&marker=52.5690%2C-1.3603',
		'map_caption'   => 'Barwell, Leicestershire',
		'map_link_url'  => 'https://www.openstreetmap.org/?mlat=52.5690&mlon=-1.3603#map=14/52.5690/-1.3603',
		'map_link_text' => 'View larger map',
		'surface'       => 's-paper',
	] );

	// 7. DECISIVENESS
	$content .= ns_block( 'block-decisiveness', [
		'heading'       => 'Not sure it\'s the right course? [em]Ring me.[/em]',
		'lede'          => 'Five minutes on 07834 858 407 settles it. No charge, no hard sell. If a different course fits better, I\'ll say so.',
		'primary_cta'   => [ 'url' => '#dates', 'title' => 'See dates & apply', 'target' => '' ],
		'secondary_cta' => [ 'url' => 'tel:07834858407', 'title' => 'Call 07834 858 407', 'target' => '' ],
		'phone'         => '07834 858 407',
		'email'         => 'david@cnctrainingcentre.com',
	] );

	ns_upsert_page(
		'classroom-training/' . $c['slug'],
		$c['title'],
		$content,
		'',
		[ 'post_parent' => $parent->ID, 'menu_order' => $c['order'] ]
	);
}

WP_CLI::success( 'classroom course pages composed (8).' );
