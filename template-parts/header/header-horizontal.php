<?php
/**
 * The template for displaying Horizontal Header
 *
 * @package WordPress
 * @subpackage MT_Blog
 * @since 1.0.0
 */
?>

<header itemtype="https://schema.org/WPHeader" itemscope="itemscope" class="horizontal-left">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <?php if(get_theme_mod('sticky_header')) : ?>
                <div class="sticky-navbar">
                    <div class="sticky-navbar-inner">
            <?php endif; ?>
                        <nav itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope" class="navbar navbar-expand-lg navbar-light">
                            <div class="tc-logo">
                                <div class="navbar-brand m-3">
                                    <?php mtblog_the_custom_logo(); ?>
                                </div>
                                <?php if (get_theme_mod('site_identity_status', true)) { ?>
                                    <a itemscope="itemscope" itemtype="https://schema.org/Organization" class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                        <?php echo esc_html(bloginfo('title')); ?>
                                    </a>                                
                                    <?php if (get_bloginfo('description')) { ?>
                                        <h4 class="navbar-tagline"><?php echo esc_html(get_bloginfo( 'description' )); ?></h4>
                                    <?php }
                                } ?>
                            </div>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarToggler" aria-controls="navbarToggler"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse justify-content-end mt-3" id="navbarToggler">
                                <div class="main-nav">
                                                                        
                                    <nav itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope" id="site-navigation" class="main-navigation" role="navigation" >

                                        <?php
                                            wp_nav_menu(
                                                array(
                                                    'theme_location' => 'primary-menu',
                                                    'menu_id'        => 'top-menu',
                                                )
                                            );
                                        ?>

                                    </nav>
                                    
                                </div>                                
                            </div>

                        </nav>
            <?php if(get_theme_mod('sticky_header')) : ?>
                    </div>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
</header>
