<?php
/**
 * Compose: Contact page.
 * Run: wp eval-file wp-content/themes/cnc-training-centre/build/compose-contact.php
 *
 * Design order (contact.html):
 *  1. .hero.ct-hero         → block-hero
 *  2. .ct-form-section      → block-svc-cta-form
 *  3. .ct-other             → block-other-ways
 *  4. .ct-trust             → block-trust-strip
 */

require __DIR__ . '/lib/compose.php';

$content = '';

// 1. HERO
$content .= ns_block( 'block-hero', [
	'variant'      => 'compressed',
	'eyebrow'      => 'Contact. I read every enquiry myself.',
	'heading'      => 'Tell me what you need.',
	'lede'         => 'Describe the machines, the team, what you want them able to do. One paragraph is plenty. I aim to come back inside a working day.',
	'primary_cta'  => [ 'url' => '', 'title' => '', 'target' => '' ],
	'secondary_cta'=> [ 'url' => '', 'title' => '', 'target' => '' ],
	'show_reviews' => 0,
] );

// 2. SVC-CTA-FORM (contact form centrepiece)
// form_id=0 until Fluent Forms contact form is created (NOR-395).
$content .= ns_block( 'block-svc-cta-form', [
	'heading' => 'One form. [em]The thing you need at the top.[/em]',
	'lede'    => '<p>Fill in what\'s useful. Required fields are marked. Everything else is optional.</p>',
	'form_id' => 0,
] );

// 3. OTHER-WAYS
$content .= ns_block( 'block-other-ways', [
	'heading'  => 'Some buyers want a call. Some want to lurk and read first.',
	'items'    => [
		[
			'title'          => 'Phone',
			'figure'         => '07834 858 407',
			'figure_is_link' => 1,
			'figure_url'     => 'tel:+447834858407',
			'body'           => 'Direct number. No receptionist. If I\'m in a classroom or on a shop floor, leave a voicemail and I\'ll come back the same day.',
			'link_text'      => '',
			'link_url'       => '',
		],
		[
			'title'          => 'Email',
			'figure'         => 'david@cnctrainingcentre.com',
			'figure_is_link' => 1,
			'figure_url'     => 'mailto:david@cnctrainingcentre.com',
			'body'           => 'If a paragraph in your own email beats a form, go that route. Same response time.',
			'link_text'      => '',
			'link_url'       => '',
		],
		[
			'title'          => 'Or read first, enquire later',
			'figure'         => '300+ articles & videos',
			'figure_is_link' => 0,
			'figure_url'     => '',
			'body'           => 'If you\'re not ready to make contact, the Learning Hub covers every major machine and control. Most of the people who eventually book have read three or four on the way in.',
			'link_text'      => 'Browse the Hub',
			'link_url'       => '/learning-hub/',
		],
	],
	'location' => 'Barwell, Leicestershire. The classroom\'s in Barwell, just outside Hinckley. If you want to come and see it before you commit, ask. The kettle\'s on.',
] );

// 4. TRUST-STRIP
$content .= ns_block( 'block-trust-strip', [
	'heading'    => 'Thirty years of doing this. Worth two lines before you hit send.',
	'spec_items' => [
		[ 'value' => '30',   'note' => 'yrs', 'label' => 'Training on CNC machines, on every major control.' ],
		[ 'value' => '30',   'note' => '',    'label' => 'Five-star reviews on Google.' ],
		[ 'value' => '332',  'note' => '',    'label' => 'YouTube videos. 8,930 subscribers.' ],
		[ 'value' => '27k',  'note' => '',    'label' => 'LinkedIn followers reading my weekly content.' ],
	],
] );

ns_upsert_page( 'contact', 'Contact', $content );
WP_CLI::success( 'contact composed.' );
