<?php
/**
 * Strip target attributes from all <a> tags in post + cnc-course content,
 * and drop rel attributes left holding only noopener/noreferrer.
 * Idempotent. Usage: wp eval-file target-strip.php [--live]
 */

$live = in_array( 'live', $args ?? [], true );

global $wpdb;
$rows = $wpdb->get_results( "SELECT ID, post_content FROM {$wpdb->posts} WHERE post_status='publish' AND post_type IN ('post','cnc-course') AND post_content LIKE '%target=%'" );

$posts_changed = 0;
$tags_fixed    = 0;

foreach ( $rows as $r ) {
	$c = preg_replace_callback(
		'/<a\b[^>]*>/i',
		function ( $m ) use ( &$tags_fixed ) {
			$tag = $m[0];
			if ( stripos( $tag, 'target=' ) === false ) {
				return $tag;
			}
			$new = preg_replace( '/\s+target=("[^"]*"|\'[^\']*\'|[^\s>]+)/i', '', $tag );
			// Remove rel attrs that only carried noopener/noreferrer (with or without other spacing).
			$new = preg_replace_callback(
				'/\s+rel=("([^"]*)"|\'([^\']*)\')/i',
				function ( $rm ) {
					$val    = $rm[2] !== '' ? $rm[2] : ( $rm[3] ?? '' );
					$tokens = array_filter( preg_split( '/\s+/', trim( $val ) ), function ( $t ) {
						return ! in_array( strtolower( $t ), [ 'noopener', 'noreferrer' ], true );
					} );
					return $tokens ? ' rel="' . esc_attr( implode( ' ', $tokens ) ) . '"' : '';
				},
				$new
			);
			if ( $new !== $tag ) {
				$tags_fixed++;
			}
			return $new;
		},
		$r->post_content
	);

	if ( $c !== $r->post_content ) {
		$posts_changed++;
		if ( $live ) {
			$wpdb->update( $wpdb->posts, [ 'post_content' => $c ], [ 'ID' => $r->ID ] );
			clean_post_cache( $r->ID );
		}
	}
}

WP_CLI::log( sprintf( 'anchor tags fixed: %d, posts touched: %d (mode: %s)', $tags_fixed, $posts_changed, $live ? 'LIVE' : 'dry-run' ) );
