<?php
/**
 * Server-side rendering of the `wpm/latest-posts` block.
 *
 * @package wpm_blocks
 */

/**
 * Renders the `wpm/latest-posts` block on server.
 *
 * @param   array $attributes  The block attributes.
 * @return  string             Returns the post content with latest posts added.
 */
function wpm_render_block_f_latest_posts( $attributes ) {
	global $wp_query, $wpm_latest_attributes;

	$wpm_latest_attributes = $attributes;

	$attributes['className'] = isset( $attributes['className'] ) ? $attributes['className'] : null;

	// Load which style we want to have.
	preg_match( '/is-style-(\w+)/', $attributes['className'], $matches );

	$style = 'default';
	if ( is_array( $matches ) && count( $matches ) && is_string( $matches[1] ) ) {
		$style = $matches[1];
	}

	// Build the classname array.
	$attributes['className'] = class_names(
		$attributes['className'],
		array(
			'wp-block-wpm-latest-posts',
		)
	);

	// Build the query.
	$args = array(
		'ignore_sticky_posts' => true,
		'posts_per_page'      => $attributes['postsToShow'],
		'post_status'         => 'publish',
		'order'               => $attributes['order'],
		'orderby'             => $attributes['orderBy'],
	);

	if ( isset( $attributes['categories'] ) ) {
		$args['cat'] = $attributes['categories'];
	}

	// Set the excerpt length.
	add_filter(
		'excerpt_length',
		'wpm_latest_posts_excerpt_length',
		999
	);

	// Set the read more link.
	if ( $attributes['overrideReadmore'] ) {
		add_filter(
			'excerpt_more',
			'wpm_latest_post_except_more',
			999
		);
	}

	// Save the old post.
	$temp_query = $wp_query;

	$wp_query = new WP_Query( $args ); // WPCS: override ok.

	// Start the output buffer to catch the generated HTML code.
	ob_start();

		// Load the wanted template part.
		include apply_filters( 'wpm_latest_posts_template', wpm_return_template_part( 'blocks/f-latest-posts/template', $style ), $attributes );

	$content = ob_get_contents();
	ob_end_clean();
	$wp_query = $temp_query; // WPCS: override ok.

	// Remove end of line characters so the html doesnt fuck around.
	$content = str_replace( PHP_EOL, '', $content );
	$content = trim( preg_replace( '/\s+/', ' ', $content ) );

	// Clean up our excerpt length.
	remove_filter( 'excerpt_length', 'wpm_latest_posts_excerpt_length' );
	remove_filter( 'excerpt_more', 'wpm_latest_post_except_more' );

	return $content;
}

/**
 * Override the default length of the read more link.
 *
 * @return string The number of words for the excerpt length.
 */
function wpm_latest_posts_excerpt_length() {
	global $wpm_latest_attributes;
	return $wpm_latest_attributes['excerptLength'];
}

/**
 * [wpm_latest_post_except_more description]
 *
 * @return [type] [description]
 */
function wpm_latest_post_except_more() {
	global $post, $wpm_latest_attributes;
	return ' <a class="moretag" href="' . get_permalink( $post->ID ) . '">' . $wpm_latest_attributes['readmore'] . '</a>';
}
