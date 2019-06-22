<?php
/**
 * Template part for displaying posts
 *
 * @link https://mightythemes.com
 *
 * @package MT Blog
 * @subpackage mt_blog
 * @since 1.0.0
 */

get_header();

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
 
$socialLink = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$blogTitle = get_the_title();
$twitterUrl = $blogTitle." ".$socialLink;
$encodedTitle = rawurlencode($blogTitle);
$encodedUrl = rawurlencode("http://".$_SERVER['SERVER_NAME']);

// Metabox Sidebar Status
$metabox_sidebar_status = get_post_meta($post->ID, 'mtblog-sidebar-status', true) ? get_post_meta($post->ID, 'mtblog-sidebar-status', true) : "default";
$sidebarGrid = $metabox_sidebar_status == 'none' ? 'none' : '';
?>

<?php wp_link_pages(); ?>

<section class="main-body">
    <div class="<?php echo (get_theme_mod('main_layout') == 'container-fluid') ? 'container-fluid' : 'container'; ?>">
        <div class="row">
            <!-- Left Sidebar -->
            <?php
                if( $metabox_sidebar_status == "default" ) {
                    if ( get_theme_mod('singlepost_sidebar') == 'default' ) {
                        if ( get_theme_mod('default_sidebar') == 'left' ) {
                            get_template_part( 'template-parts/sidebar/sidebar', 'left' );
                        }
                    } elseif ( get_theme_mod('singlepost_sidebar') == 'left') {
                        get_template_part( 'template-parts/sidebar/sidebar', 'left' );
                    }
                }
                elseif( $metabox_sidebar_status == "left" ) {
                    get_template_part( 'template-parts/sidebar/sidebar', 'left' );
                }
            ?>
            
            <?php
                if( $metabox_sidebar_status == "default" ) {
                    if ( get_theme_mod('singlepost_sidebar', 'right') === 'default' ) {
                        if ( get_theme_mod('default_sidebar', 'none') == 'none' ) {
                            $sidebarGrid = 'none';
                        }
                    }
                }

                switch($sidebarGrid) :
                    case 'none': $grid = 'col-12';
                    break;
                    default:
                        $grid = 'col-lg-9';
                endswitch;

            ?>
            <section class="<?php echo $grid; ?> component-area">
            
            <?php if ( have_posts() ) : 
                while ( have_posts() ) : the_post(); ?>
                <article itemtype="https://schema.org/CreativeWork" itemscope="itemscope" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="post-content">

                        <?php if (get_theme_mod('show_breadcrumbs', 1) ) { ?>
                            <div class="meta-element breadcrumb"><?php get_breadcrumb(); ?></div>
                        <?php } ?>                    

                        <div class="post-header">
                            <?php if ( function_exists( 'add_theme_support' ) ) the_post_thumbnail(); ?>
                                <h1 class="entry-title mt-3 mb-3"><?php the_title(); ?></h1>
                            <?php
                            /* Assigning Ad in the Beginning of Post */
                            if (get_theme_mod('ads_posts')) {
                                if (get_theme_mod('ad_code_post_begin')) {
                                ?>
                                <div class="ad-post-begin">
                                    <?php echo get_theme_mod('ad_code_post_begin'); ?>
                                </div>
                            <?php } } ?>
                            
                            <div class="meta-info header-meta-info">
                                <div class="meta-info-wrapper">
                                    <ul>
                                        <li class="post-published-date">
                                            <span>
                                                <i class="far fa-calendar-alt"></i> 
                                                <?php the_time( 'M j, y' ); ?>
                                            </span>
                                        </li>
                                        
                                        <?php if(get_theme_mod('show_category', 1) ) { ?>
                                            <li> | </li>
                                            <li class="post-category">
                                                <span><i class="fas fa-folder"></i> </span>
                                                <?php the_category( ', ' ); ?>
                                            </li>
                                        <?php } ?>

                                        <?php if (get_theme_mod('show_author', 1) ) { ?>
                                            <li> | </li>
                                            <li class="meta-element author">
                                                <i class="fas fa-user"></i> <a href="<?php get_the_author_link(); ?>"><?php the_author(); ?></a>
                                            </li>
                                        <?php } ?>

                                        <?php if (get_theme_mod('show_comments', 1)) { ?>
                                            <li> | </li>
                                            <li class="post-comments">
                                                <div class="comments">
                                                    <?php comments_popup_link( 'Leave a Comment', '<i class="far fa-comments"></i> 1 Comment', '% Comments' ); ?>
                                                </div>
                                            </li>
                                        <?php } ?>

                                        <?php if (get_theme_mod('show_readtime', 1)) { ?>
                                            <li> | </li>
                                            <li class="meta-element read-time">
                                                <i class="fas fa-book-reader"></i> <?php echo calculateReadTime(get_post_field( 'post_content', $post->ID )); ?>
                                                <?php echo calculateReadTime(get_post_field( 'post_content', $post->ID )) == 1 ? ' minute' : ' minutes'?> read.
                                            </li>
                                        <?php } ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <?php the_content(); ?>

                        <?php
                        /* Assigning Ad in the End of Post */
                        if (get_theme_mod('ads_posts')) {
                            if (get_theme_mod('ad_code_post_end')) {
                            ?>
                                <div class="ad-post-end">
                                    <?php echo get_theme_mod('ad_code_post_end'); ?>
                                </div>
                        <?php } } ?>
                        
                        <?php wp_link_pages(); ?>
                    </div>
                    
                    <?php if( get_theme_mod('show_tags', 1) || get_theme_mod('social_share_enable', 1) ) : ?>
                        <div class="meta-info footer-meta-info d-flex justify-content-between">
                            <div class="meta-info-wrapper">
                                <ul>
                                    <?php if (get_theme_mod('show_tags', 1) ) { ?>
                                        <li class="post-tags">
                                            <i class="fas fa-tags"></i>
                                            <?php the_tags(); ?>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>

                            <?php if( get_theme_mod('social_share_enable', 1) ) : ?>
                            <div class="social-share-container">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="http://www.facebook.com/sharer.php?u=<?php echo $socialLink; ?>" target="_blank" class="btn-social btn-facebook">
                                            <span class="fa-stack fa-sm">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fab fa-facebook-f fa-stack-1x fa-inverse fb-icon"></i>
                                            </span>
                                        </a>
                                        
                                        <a href="https://twitter.com/home?status=<?php echo $twitterUrl; ?>" target="_blank" class="btn-social btn-twitter">
                                            <span class="fa-stack fa-sm">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fab fa-twitter fa-stack-1x fa-inverse twitter-icon"></i>
                                            </span>
                                        </a>
                                        
                                        <a href="<?php echo "http://pinterest.com/pin/create/button/?url=$encodedUrl&description=$encodedTitle" ?>" target="_blank" class="btn-social btn-pinterest">
                                            <span class="fa-stack fa-sm">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fab fa-pinterest-p fa-stack-1x fa-inverse pinterest-icon"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>                        
                        </div>
                    <?php endif; ?>
                    
                    <?php endwhile; endif;/* rewind or continue if all posts have been fetched */ ?>
                    
                    <nav itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope" class="post-navigation">
                        <div class="nav-links">
                            <div class="nav-previous">             
                                <?php previous_post_link( '%link', '<span class="nav-icon"><i class="fas fa-chevron-left"></i></span> Previous' ) ?>
                            </div>
                            <div class="nav-next">
                                <?php next_post_link( '%link', 'Next <span class="nav-icon"><i class="fas fa-chevron-right"></i></span>' ) ?>
                            </div>
                        </div>
                    </nav>
                
                    
                    <!-- Start Author -->
                    <?php if(get_theme_mod('show_authorinfobox', 1)) : ?>
                    <div class="author-wrap">
                        <div class="author-thumb">
                            <?php echo get_avatar(get_the_author_meta('id')); ?>
                        </div>
                        <div class="author-info">
                            <h6 class="author-name"><?php echo esc_html(get_the_author_meta('first_name')) ?></h6>
                            <?php if(get_the_author_meta('description')): ?>
                                <p class="author-bio"><?php echo esc_html(get_the_author_meta('description')) ?></p>
                            <?php endif; ?>
                            <?php if(get_the_author_meta('email')):?>
                                <div class="author-email">
                                    <i class="far fa-envelope"></i>
                                    <?php echo esc_html(get_the_author_meta('email')) ?>
                                </div>
                            <?php endif; ?>
                            <?php if(get_the_author_meta('user_url')): ?>
                                <div class="website">
                                    <a href="<?php echo get_the_author_meta('user_url') ?>" target="_blank">
                                        <i class="fas fa-globe"></i> Website
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- End Author -->

                    <?php
                        if(get_theme_mod('related_post_enable', 0)) {
                            switch(get_theme_mod('related_post_by', 'categories')) :
                                case 'categories' : related_posts_by_categories();
                                break;
                                case 'tags' : related_posts_by_tags();
                                break;
                            endswitch;
                        }
                    ?>
                </article>

                <!-- Comments -->
                <?php if (get_theme_mod('show_comments', 1)) {
                        comments_template();
                } ?>
            
            </section>
            
            <!-- Right Sidebar -->            
            <?php
                if( $metabox_sidebar_status == "default" ) {
                    if ( get_theme_mod('singlepost_sidebar', 'default') == 'default' ) {
                        if ( get_theme_mod('default_sidebar', 'right') == 'right' ) {
                            get_template_part( 'template-parts/sidebar/sidebar', 'right' );
                        }
                    } elseif ( get_theme_mod('singlepost_sidebar', 'right') == 'right') {
                        get_template_part( 'template-parts/sidebar/sidebar', 'right' );
                    }
                }
                elseif( $metabox_sidebar_status == "right" ) {
                    get_template_part( 'template-parts/sidebar/sidebar', 'right' );
                }

            ?>

        </div>
    </div>
</section>
<?php get_footer(); ?>