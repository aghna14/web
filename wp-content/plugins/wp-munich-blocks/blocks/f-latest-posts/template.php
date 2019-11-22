<?php
/**
 * The default template for the latest-posts block#
 *
 * @package wpm_blocks
 */

$feed_class_names = class_names(
	$attributes['className'],
	array(
		'align' . $attributes['align'] => ( 'none' === $attributes['align'] ? false : $attributes['align'] ), // Don't set align if none is given.
	)
);

?>
<div class="<?php echo esc_attr( $feed_class_names ); ?>" role="feed">

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();

		$headline_tag = 'h3';

		$class_names = class_names(
			array(
				'entry'               => true,
				'hide-post-thumbnail' => ! $attributes['displayThumbnail'],
			)
		);
		?>

		<article <?php post_class( $class_names ); ?>>
			<<?php echo esc_attr( $headline_tag ); ?> class="the-post-title entry-title">
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</<?php echo esc_attr( $headline_tag ); ?>>
			<?php
			if ( has_post_thumbnail() && $attributes['displayThumbnail'] ) :
				?>
				<figure class="post-thumbnail">
					<a href="<?php the_permalink(); ?>" class="post-thumbnail-inner" aria-hidden="true" tabindex="-1">
						<?php the_post_thumbnail(); ?>
					</a>
				</figure>
				<?php
			endif;
			?>
			<div class="entry-summary"><?php the_excerpt(); ?></div>
			<footer class="entry-meta">
				<?php
				if ( $attributes['displayAuthor'] ) {
					printf(
						/* translators: 1: SVG icon. 2: post author, only visible to screen readers. 3: author link. */
						'<span class="byline"><span class="screen-reader-text">%1$s</span><span class="author vcard"><a class="url fn n" href="%2$s">%3$s</a></span></span>',
						esc_attr__( 'Posted by', 'wp-munich-blocks' ),
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						esc_html( get_the_author() )
					);
				}

				if ( $attributes['displayPostDate'] ) {
					$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
					if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
						$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
					}

					$time_string = sprintf(
						$time_string,
						esc_attr( get_the_date( DATE_W3C ) ),
						esc_html( get_the_date() ),
						esc_attr( get_the_modified_date( DATE_W3C ) ),
						esc_html( get_the_modified_date() )
					);

					printf(
						'<span class="posted-on"><a href="%1$s" rel="bookmark">%2$s</a></span>',
						esc_url( get_permalink() ),
						$time_string // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					);
				}

				if ( $attributes['displayCategories'] ) {
					/* translators: used between list items, there is a space after the comma. */
					$categories_list = get_the_category_list( __( ', ', 'wp-munich-blocks' ) );
					if ( $categories_list ) {
						printf(
							/* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of categories. */
							'<span class="cat-links"><span class="screen-reader-text">%1$s</span>%2$s</span>',
							__( 'Posted in', 'wp-munich-blocks' ),
							$categories_list
						); // WPCS: XSS OK.
					}
				}

				if ( $attributes['displayTags'] ) {
					/* translators: used between list items, there is a space after the comma. */
					$tags_list = get_the_tag_list( '', __( ', ', 'wp-munich-blocks' ) );
					if ( $tags_list ) {
						printf(
							/* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of tags. */
							'<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
							__( 'Tags:', 'wp-munich-blocks' ),
							$tags_list
						); // WPCS: XSS OK.
					}
				}
				?>
			</footer>
		</article>

		<?php
	endwhile;
else :
	?>
		<p>
			<?php esc_html_e( 'There are no posts in this query.', 'wp-munich-blocks' ); ?>
		</p>
	<?php
endif;
?>

</div>
