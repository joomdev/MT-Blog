<?php
/**
 * Template part for displaying posts
 *
 * @link https://mightythemes.com
 *
 * @package Mighty Themes
 * @subpackage mt_blog
 * @since 1.0.0
 */
?>
<div role="main" itemprop="mainContentOfPage" itemtype="http://schema.org/Blog" itemscope="itemscope" class="post block-card-wrap<?php echo (get_theme_mod('default_sidebar') == 'none' ? ' col-lg-4 col-md-6' : ''); ?><?php echo (get_theme_mod('default_sidebar') == false ? ' col-lg-4 col-md-6' : ''); ?>" >
    <article itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost" <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <div class="block-card shadow-sm">
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
                </div>
                <h2>
                    <a href="<?php the_permalink(); ?>" class="block-card__title">
                        <?php the_title(); ?>
                    </a>
                </h2>
                <?php if(get_theme_mod('show_date_archive', 1) || get_theme_mod('show_author_archive', 1) ) : ?>
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
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </article>
</div>
