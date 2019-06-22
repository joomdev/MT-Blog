<?php
/**
 * The Posts section
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://mightythemes.com
 *
 * @package WordPress
 * @subpackage MT_Blog
 * @since 1.0.0
 */

get_header(); 
?>

<section class="main-body <?php echo (get_theme_mod('main_layout') == 'boxed') ? 'boxed' : '' ?>">
	<div class="<?php echo (get_theme_mod('main_layout') == 'container-fluid') ? 'container-fluid' : 'container'; ?>">
	<div class="row">
			<?php
                // Left Sidebar
                if ( get_theme_mod('archive_sidebar', 'none') == 'default' ) {
                    if ( get_theme_mod('default_sidebar', 'none') == 'left' ) {
                        get_template_part( 'template-parts/sidebar/sidebar', 'left' );
                    }
                } elseif ( get_theme_mod('archive_sidebar') == 'left') {
                    get_template_part( 'template-parts/sidebar/sidebar', 'left' );
                }
            ?>      

			<?php
				if ( get_theme_mod('archive_sidebar', 'default') == 'default' ) {
                    if ( get_theme_mod('default_sidebar' , 'none') == 'none' ) {
                        $sidebarGrid = 'none';
                    }
				}

            ?>

<?php if ($sidebarGrid !== 'none') { ?>
	<div class="col-lg-9">
<?php } ?>

		<?php
		// Start the Loop.
		while (have_posts()) : the_post();

		?>
			<div class="post block-card-wrap <?php echo (get_theme_mod('default_sidebar') == 'none' ? 'col-lg-4 col-md-6' : ''); ?> >
				<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<div class="block-card">
						<?php
							if ( has_post_thumbnail() ) { ?>
								<div class="block-card__media">
									<a href="<?php the_permalink(); ?>" class="block-card__image" title="<?php the_title_attribute(); ?>">
										<?php the_post_thumbnail( ); ?>
									</a>
								</div>
								<?php
							}
						?>
						
						<div class="block-card__content">
							<div class="block-card__tag-social">
								<?php if(get_theme_mod('show_category_archive', 1) ) { ?>
									<div class="meta-element block-card__tag">
										<?php the_category(', '); ?>
									</div>
								<?php } ?>
								<div class="social-icons block-card__social-icons">
									<?php get_template_part( 'template-parts/social', 'profiles' ); ?>
								</div>
							</div>
							<h2>
								<a href="<?php the_permalink(); ?>" class="block-card__title">
									<?php the_title(); ?>
								</a>
							</h2>
							<div class="block-card__info">
								
								<?php if( get_theme_mod('show_date_archive', 1) ) { ?>
									<div class="meta-element block-card__info-item block-card__item--date-time">
										<small><?php the_date(); ?></small>
									</div>
								<?php } ?>

								<?php if(get_theme_mod('show_author_archive', 1) ) { ?>
									<div class="meta-element block-card__info-item block-card__item--author">
										<a href="#" itemtype="https://schema.org/Person" itemscope="itemscope" itemprop="author">
											<small><?php the_author(); ?></small>
										</a>
									</div>
								<?php } ?>
								
								<?php if( get_theme_mod('estimated_read_time_archive', 1) ) { ?>
									<div class="meta-element block-card__info-item block-card__item--date-time">
										<small><?php echo calculateReadTime(get_post_field( 'post_content', $post->ID )); ?> min read.</small>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</article>
			</div>


		<?php

		endwhile;
		?>
		
		<?php if (get_theme_mod('archive_sidebar') !== 'none') { ?>
			</div>
		<?php } ?>                
		
		<?php
			// Right Sidebar
			if ( get_theme_mod('archive_sidebar') == 'default' ) {
				if ( get_theme_mod('default_sidebar') == 'right' ) {
					get_template_part( 'template-parts/sidebar/sidebar', 'right' );
				}
			} elseif ( get_theme_mod('archive_sidebar') == 'right') {
				get_template_part( 'template-parts/sidebar/sidebar', 'right' );
			}
		?>

	</div>
</div>
</section>

<?php
get_footer();
