<?php
/**
 * Link-integrity migration 2026-07-24 — posts + cnc-course content.
 * Rewrites in-content hrefs: classroom-course links → new /classroom-training/ pages,
 * 301 flattens, 404 fixes. Idempotent (exact string replace; re-run = 0 changes).
 * Usage: wp eval-file link-fix.php [--live]  (default = dry run, prints counts)
 */

$live = in_array( 'live', $args ?? [], true );
$D    = 'http://cnctrainingcentre-old.local';

$map = [
	// ── Classroom course links → new course pages ──────────────────────────
	'/training/beginners-cnc-milling/'            => '/classroom-training/beginners-milling-operator/',
	'/training/beginners-cnc-turning/'            => '/classroom-training/beginners-turning-operator/',
	'/beginners-cnc-turning/'                     => '/classroom-training/beginners-turning-operator/',
	'/training/cnc-setter-operator-milling/'      => '/classroom-training/setter-operator-milling/',
	'/training/cnc-setter-operator-turning/'      => '/classroom-training/setter-operator-turning/',
	'/turning-basics-cnc-programming/'            => '/classroom-training/beginners-turning-operator/',
	'/milling-basics-cnc-programming/'            => '/classroom-training/beginners-milling-operator/',
	'/milling-basics-for-cnc-programming-learn-the-basics-of-a-cnc-lathe-types-of-tooling-how-and-when-to-use-and-basic-measuring-equipment/' => '/classroom-training/beginners-milling-operator/',
	'/course-details-beginners-cnc-lathe-operator/'   => '/classroom-training/beginners-turning-operator/',
	'/course-details-beginners-cnc-milling-operator/' => '/classroom-training/beginners-milling-operator/',
	'/course-details-cnc-milling-setter-operator/'    => '/classroom-training/setter-operator-milling/',
	'/course-details-cnc-milling-setter-operator"'    => '/classroom-training/setter-operator-milling/"', // no-slash variant
	'/cnc-turn-setter-operator-course-details/'       => '/classroom-training/setter-operator-turning/',
	'/course-details-learn-to-program-milling/'       => '/classroom-training/learn-to-program-milling/',
	'/course-details-learn-to-program-turning/'       => '/classroom-training/learn-to-program-turning/',
	'/apply-now-setter-operator-turning/'             => '/classroom-training/setter-operator-turning/#dates',
	'/apply-now-setter-operator/'                     => '/classroom-training/setter-operator-milling/#dates',
	'/apply-now-beginners-milling/'                   => '/classroom-training/beginners-milling-operator/#dates',
	'/apply-beginners-turn/'                          => '/classroom-training/beginners-turning-operator/#dates',
	'/apply-now-for-learn-to-program-cnc-milling/'    => '/classroom-training/learn-to-program-milling/#dates',
	'/apply-for-learn-to-program-cnc-turn/'           => '/classroom-training/learn-to-program-turning/#dates',
	'/apply-edgecam-milling/'                         => '/classroom-training/edgecam-milling/#dates',
	'/apply-edgecam-turning/'                         => '/classroom-training/edgecam-turning/#dates',

	// ── Generic classroom links → classroom page ──────────────────────────
	'/training-courses/cnc-training-classes-classroom-training-cnc-training-centre/' => '/classroom-training/',
	'/cnc-training-classes-classroom-training-cnc-training-centre/' => '/classroom-training/',
	'/cnc-classroom-training/'                    => '/classroom-training/',
	'/course-details/'                            => '/classroom-training/',
	'/apply-beginners/'                           => '/classroom-training/',
	'/apply-now/'                                 => '/classroom-training/',
	'/training-2/'                                => '/classroom-training/',
	'/training/edgecam-training/'                 => '/classroom-training/',
	'/edgecam-training/'                          => '/classroom-training/',
	'/training/cnc-programmer-training/'          => '/classroom-training/',
	'/cnc-programmer-training/'                   => '/classroom-training/',

	// ── Macro / online course ─────────────────────────────────────────────
	'/apply-now-learn-macro-programming/'         => '/product/macro-programming-for-cnc-machines/',
	'/macro-programming-course-details/'          => '/product/macro-programming-for-cnc-machines/',
	'/macro-programming/'                         => '/product/macro-programming-for-cnc-machines/',
	'/courses/macro-programming-for-cnc-machines/lesson/check-if-you-have-macro/' => '/product/macro-programming-for-cnc-machines/',
	'/courses/macro-programming-for-cnc-machines/lesson/my-first-simple-macro/'   => '/product/macro-programming-for-cnc-machines/',
	'/courses/macro-programming-for-cnc-machines/tutor_quiz/macro-uses/'          => '/product/macro-programming-for-cnc-machines/',

	// ── Advanced mill-turn ────────────────────────────────────────────────
	'/apply-advanced-mill-turn/'                  => '/training/advanced-mill-turn/',
	'/apply-advanced-turn-mill-turn/'             => '/training/advanced-mill-turn/',
	'/advanced-mill-turn-training/'               => '/training/advanced-mill-turn/',

	// ── Onsite / services / hub ───────────────────────────────────────────
	'/onsite-training-enquiry/'                   => '/contact/',
	'/onsite-training-payment/'                   => '/onsite-training/',
	'/cnc-turnkey-solutions/'                     => '/programming-services/',
	'/programming-services/edgecam-3/'            => '/programming-services/',
	'/edgecam-3/'                                 => '/programming-services/',
	'/all-tips-n-tricks/'                         => '/learning-hub/',
	'/tips-n-tricks/'                             => '/learning-hub/',
	'/the-video-tutorials/'                       => '/learning-hub/',
	'/operator-training/'                         => '/training/operator-training-all-machines/',

	// ── 301 flattens: prefixed article URLs → root ────────────────────────
	'/acramatic/acramatic-2100-cincinnati-cnc-past-blast/' => '/acramatic-2100-cincinnati-cnc-past-blast/',
	'/cnc-mill/adding-a-fourth-axis-or-indexer-to-your-cnc/' => '/adding-a-fourth-axis-or-indexer-to-your-cnc/',
	'/cnc-turn/g76-threading-cycle-many-passes/'  => '/g76-threading-cycle-many-passes/',
	'/fanuc-turn/g84-rigid-tapping-program-example/' => '/g84-rigid-tapping-program-example/',
	'/haas-settings/fanuc-haas-l0-k0-to-get-round-corners/' => '/fanuc-haas-l0-k0-to-get-round-corners/',
	'/haas-settings/tool-offset-measure-button-haas-useful-or-relic/' => '/tool-offset-measure-button-haas-useful-or-relic/',
	'/macro/cnc-macro-programming-course-half-price/' => '/cnc-macro-programming-course-half-price/',
	'/macro/g-code-alias-m-code-alias-how-to-use-them/' => '/g-code-alias-m-code-alias-how-to-use-them/',
	'/macro/macro-for-over-18-using-alias-in-a-macro/' => '/macro-for-over-18-using-alias-in-a-macro/',
	'/macro/macro-system-variables/'              => '/macro-system-variables/',
	'/siemens/siemens-cnc-mixing-mm-with-inches/' => '/siemens-cnc-mixing-mm-with-inches/',
	'/siemens/siemens-program-training-cool-siemens-stuff/' => '/siemens-program-training-cool-siemens-stuff/',
	'/siemens/sinumerik-training-sub-programs/'   => '/sinumerik-training-sub-programs/',
	'/useful-stuff/cnc-crashes-think-unthinkable/' => '/cnc-crashes-think-unthinkable/',
	'/useful-stuff/copy-paste-fanuc-cnc-control/' => '/copy-paste-fanuc-cnc-control/',
	'/useful-stuff/driven-tools-cnc-lathe/'       => '/driven-tools-cnc-lathe/',
	'/useful-stuff/programme-copy-fanuc-oi/'      => '/programme-copy-fanuc-oi/',
	'/programming-services/programming/'          => '/programming-a-full-circle-on-a-cnc-milling-machine/',
	'/programming-services/training/'             => '/training-course-fanuc-haas-macro-programming/',

	// ── 404s under /training/ that are root posts ─────────────────────────
	'/training/absolute-or-incremental/'          => '/absolute-or-incremental/',
	'/training/cnc-help-beginners-tool-length-offsets/' => '/cnc-help-beginners-tool-length-offsets/',
	'/training/edgecam-support-cnc-training-centre/' => '/edgecam-support-cnc-training-centre/',
	'/training/haas-training-milling-turning/'    => '/haas-training-milling-turning/',

	// ── Old-slug flattens ────────────────────────────────────────────────
	'/modal-non-modal-g-codes/'                   => '/modal-nonmodal-g-codes/',
	'/modal-none-modal-g-codes/'                  => '/modal-nonmodal-g-codes/',
	'/never-clock-up-a-machine-vice/'             => '/clocking-machine-vice/',
	'/order-or-cnc-code/'                         => '/cnc-for-beginners/',
	'/partxplore-new-addition-to-the-edgecam-toolbox/' => '/part-xplore-new-edgecam-toolbox/',
	'/setting-103-on-a-haas-machine/'             => '/haas-setting-103/',
	'/well-set-code/'                             => '/well-set-cnc-code-cnc-programming/',
	'/well-set-out-cnc-code/'                     => '/well-set-cnc-code-cnc-programming/',
];

// Longest-first so specific paths beat their prefixes (e.g. /training/edgecam-training/
// must run before any shorter overlapping key).
uksort( $map, fn( $a, $b ) => strlen( $b ) <=> strlen( $a ) );

// Non-path one-offs (exact string → exact string).
$literal = [
	'href="' . $D . '/wp-admin/post.php?post=329&amp;action=edit"' => 'href="' . $D . '/tool-nose-radius-compensation/"',
	'href="contact@cnctrainingcentre.com"'  => 'href="mailto:contact@cnctrainingcentre.com"',
	'href="mailto:"'                         => 'href="mailto:contact@cnctrainingcentre.com"',
];

global $wpdb;
$rows = $wpdb->get_results( "SELECT ID, post_content FROM {$wpdb->posts} WHERE post_status='publish' AND post_type IN ('post','cnc-course')" );

$totals = [];
$posts_changed = 0;

foreach ( $rows as $r ) {
	$c = $r->post_content;

	foreach ( $map as $old => $new ) {
		// Absolute local-domain form (covers every observed link).
		$needle = $D . $old;
		$n = substr_count( $c, $needle );
		if ( $n ) {
			$c = str_replace( $needle, $D . $new, $c );
			$totals[ $old ] = ( $totals[ $old ] ?? 0 ) + $n;
		}
		// Root-relative form.
		$needle2 = 'href="' . $old . '"';
		$n2 = substr_count( $c, $needle2 );
		if ( $n2 ) {
			$c = str_replace( $needle2, 'href="' . $new . '"', $c );
			$totals[ $old ] = ( $totals[ $old ] ?? 0 ) + $n2;
		}
	}

	foreach ( $literal as $old => $new ) {
		$n = substr_count( $c, $old );
		if ( $n ) {
			$c = str_replace( $old, $new, $c );
			$totals[ $old ] = ( $totals[ $old ] ?? 0 ) + $n;
		}
	}

	if ( $c !== $r->post_content ) {
		$posts_changed++;
		if ( $live ) {
			$wpdb->update( $wpdb->posts, [ 'post_content' => $c ], [ 'ID' => $r->ID ] );
			clean_post_cache( $r->ID );
		}
	}
}

ksort( $totals );
foreach ( $totals as $k => $n ) {
	WP_CLI::log( sprintf( '%4d  %s', $n, $k ) );
}
WP_CLI::log( sprintf( 'posts touched: %d  (mode: %s)', $posts_changed, $live ? 'LIVE' : 'dry-run' ) );
