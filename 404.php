<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage MT_Blog
 * @since 1.0.0
 */

get_header(); ?>
<section class="main-body">
	<div class="container text-center p-5">
		<div class="error-page-content">
			<div class="error-head">
				<?php echo get_theme_mod('404_page_content') ? esc_html(get_theme_mod('404_page_content')) : esc_html_e('404', 'mtblog'); ?>
			</div>

			
			<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php echo get_theme_mod('calltoaction') ? (get_theme_mod('calltoaction')) : esc_html_e('Back to Home', 'mtblog'); ?>
			</a>
			
		</div>
	</div>
</section>
<!--.main-content-->
<?php get_footer();?>