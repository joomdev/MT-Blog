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

<?php
// For Showing all published posts
if (get_theme_mod('pagination_type', 'numbered') == 'infinite-scroll') {
    $count_posts = wp_count_posts();
    $totalPosts = $count_posts->publish;
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
        'posts_per_page' => $totalPosts,
        'paged' => $paged,
    );
    query_posts($args);
}
?>

<section class="main-body">
    <div class="<?php echo (get_theme_mod('main_layout') == 'container-fluid') ? 'container-fluid' : 'container'; ?>">
        <div class="row" id="main-posts-section">
            
            <?php
                // Left Sidebar
                if( get_theme_mod('default_sidebar') == 'left' ) { ?>
                    <?php get_template_part( 'template-parts/sidebar/sidebar', 'left' ); ?>
                <?php } 
            ?>            

            <?php
                switch(get_theme_mod('default_sidebar')) :
                    case 'none': $grid = 'col-lg-4 col-md-6';
                    break;
                    default:
                        $grid = 'col-lg-9';
                endswitch;
            ?>
            
            <?php if (get_theme_mod('default_sidebar') !== 'none' && get_theme_mod('default_sidebar') !== false) { ?>
                <div class="col-lg-9">
            <?php } ?>
                <?php
                    if ( have_posts() ) {
                        // Load posts loop.
                        while( have_posts() ) :
                            the_post();
                            get_template_part( 'template-parts/content/content' );
                        endwhile;
                    } else {
                        // If no content, include the "No posts found" template.
                        get_template_part( 'template-parts/content/content', 'none' );
                    }
                ?>
            
            <?php if (get_theme_mod('default_sidebar') !== 'none') { ?>
                </div>
            <?php } ?>
            
            <?php
                // Right Sidebar
                if( get_theme_mod('default_sidebar') == 'right' ) { ?>
                    <?php get_template_part( 'template-parts/sidebar/sidebar', 'right' ); ?>
                <?php } 
            ?>
            
        </div>
        <!-- Pagination for posts -->
        <?php mtblog_pagination(); ?>
        
    </div>
</section>

<?php get_footer(); ?>
