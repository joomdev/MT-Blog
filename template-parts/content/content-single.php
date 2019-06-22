<?php
/**
 * Template part for displaying posts
 *
 * @link https://mightythemes.com
 *
 * @package WordPress
 * @subpackage Mighty Themes
 * @since 1.0.0
 */
get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'mtblog' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'mtblog' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	
    <?php get_footer(); ?>

</article><!-- #post-${ID} -->