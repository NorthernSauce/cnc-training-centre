<?php
/**
 * Compose: Contact page.
 * Run: wp eval-file wp-content/themes/cnc-training-centre/build/compose-contact.php
 *
 * Copy: v4 rewrite 2026-07-24 — cut hard, straight to the point, David's voice.
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
	'lede'         => 'The machines, the team, what you want them able to do. One paragraph is plenty. Reply inside a working day.',
	'primary_cta'  => [ 'url' => '', 'title' => '', 'target' => '' ],
	'secondary_cta'=> [ 'url' => '', 'title' => '', 'target' => '' ],
	'show_reviews' => 0,
] );

// 2. SVC-CTA-FORM (contact form centrepiece)
$content .= ns_block( 'block-svc-cta-form', [
	'heading' => 'Send your enquiry here.',
	'lede'    => '<p>Fill in what\'s useful. Everything except your name and email is optional.</p>',
	'form_id' => 1,
] );

// 3. OTHER-WAYS
$content .= ns_block( 'block-other-ways', [
	'heading'  => 'Rather ring? Rather read first?',
	'items'    => [
		[
			'title'          => 'Phone',
			'figure'         => '07834 858 407',
			'figure_is_link' => 1,
			'figure_url'     => 'tel:+447834858407',
			'body'           => 'Direct number, no receptionist. If I\'m teaching, leave a voicemail and I\'ll ring back the same day.',
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
			'body'           => 'Not ready to make contact? The Learning Hub covers every major machine and control.',
			'link_text'      => 'Browse the Hub',
			'link_url'       => '/learning-hub/',
		],
	],
	'location' => 'Barwell, Leicestershire, just outside Hinckley. Want to see the classroom before you commit? Ask. The kettle\'s on.',
] );

// 4. TRUST-STRIP
$content .= ns_block( 'block-trust-strip', [
	'heading'    => 'The proof, in numbers.',
	'spec_items' => [
		[ 'value' => '30',   'note' => 'yrs', 'label' => 'Training on CNC machines, on every major control.' ],
		[ 'value' => '30',   'note' => '',    'label' => 'Five-star reviews on Google.' ],
		[ 'value' => '332',  'note' => '',    'label' => 'YouTube videos. 8,930 subscribers.' ],
		[ 'value' => '27k',  'note' => '',    'label' => 'LinkedIn followers reading my weekly content.' ],
	],
] );

ns_upsert_page( 'contact', 'Contact', $content );
WP_CLI::success( 'contact composed.' );
