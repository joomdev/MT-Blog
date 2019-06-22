<?php

class CustomizerHelper
{
    public static function getJSONData($name)
    {
        $fontsJSON = file_get_contents(realpath(__DIR__ . '/..') . '/json/webfonts.json');

        return json_decode($fontsJSON, true);
    }

    public static function getGoogleFonts()
    {
        $fonts = self::getJSONData('webfonts');

        foreach ($fonts['items'] as $font) {
            $googleFonts["$font[family]"] = $font['family'];
        }

        return $googleFonts;
    }
}

// Sanitize Fonts
function custom_sanitize_fonts($input)
{
    global $custom_google_fonts;
    $valid = $custom_google_fonts;

    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

//
// ─── ESTIMATED READ TIME ────────────────────────────────────────────────────────
//
function calculateReadTime($string)
{
    $speed = 170;
    $word = str_word_count(strip_tags($string));
    $m = floor($word / $speed);
    $s = floor($word % $speed / ($speed / 60));

    if ($m < 1) {
        $m = 1;
    } else if ($s > 30) {
        $m = $m;
    } else {
        $m++;
    }

    return $m;
}

//
// ─── BREADCRUMBS ────────────────────────────────────────────────────────────────
//
function get_breadcrumb()
{
    echo '<li itemscope itemtype="http://schema.org/BreadcrumbList" class="breadcrumb-item"><a href="' . home_url() . '" rel="nofollow">Home</a></li>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        the_category(' &bull; ');
        if (is_single()) {
            echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
            the_title();
        }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

//
// ─── RELATED POSTS BY CATEGORIES ────────────────────────────────────────────────
//    
function related_posts_by_categories()
{
    $post_id = get_the_ID();
    $categories_ids = array();
    $categories = get_the_category($post_id);

    if (!empty($categories) && is_wp_error($categories)) :
        foreach ($categories as $category) :
            array_push($categories_ids, $category->term_id);
        endforeach;
    endif;

    $current_post_type = get_post_type($post_id);
    $query_args = array(
        'category__in'   => $categories_ids,
        'post_type'      => $current_post_type,
        'post_not_in'    => array($post_id),
        'posts_per_page'  => esc_html(get_theme_mod('related_post_count', 3)),
        'ignore_sticky_posts' => 1,
    );

    $related_posts_categories = new WP_Query($query_args);
    ?>
    <div class="related-posts">
        <div class="related-posts-heading-wrapper">
            <h2 class="related-posts-heading">Related Posts</h3>
        </div>
        <div class="related-posts-list">
            <div class="row">
                <?php
                if ($related_posts_categories->have_posts()) :
                    while ($related_posts_categories->have_posts()) : $related_posts_categories->the_post(); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="related-posts-wrapper">
                                <a href="<?php the_permalink() ?>" class="block-card__image">
                                    <?php the_post_thumbnail(); ?>
                                </a>
                                <div class="block-card__content">
                                    <h5 class="post-title mt-2">
                                        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    <?php
                endwhile;
                // Restore original Post Data
                wp_reset_postdata();
            endif;
            ?>
            </div>
        </div>
    </div>

<?php
}

//
// ─── RELATED POSTS BY TAGS ──────────────────────────────────────────────────────
//
function related_posts_by_tags()
{
    $orig_post = $post;
    global $post;
    $tags = wp_get_post_tags($post->ID);
    if ($tags) {

        $tag_ids = array();
        foreach ($tags as $individual_tag) {
            $tag_ids[] = $individual_tag->term_id;
        }

        $args = array(
            'tag_in' => $tag_ids,
            'post_not_in' => array($post->ID),
            'posts_per_page' => esc_html(get_theme_mod('related_post_count', 3)), // Number of related posts that will be shown.
            'ignore_sticky_posts' => 1
        );

        $my_query = new wp_query($args);
        if ($my_query->have_posts()) : ?>

            <div class="related-posts">
                <div class="related-posts-heading-wrapper">
                    <h2 class="related-posts-heading">Related Posts</h3>
                </div>
                <div class="related-posts-list">
                    <div class="row">
                        <?php
                        while ($my_query->have_posts()) :
                            $my_query->the_post(); ?>

                            <div class="col-lg-4 col-md-6">
                                <div class="related-posts-wrapper">
                                    <a href="<?php the_permalink() ?>" class="block-card__image">
                                        <?php the_post_thumbnail(); ?>
                                    </a>
                                    <div class="block-card__content">
                                        <h5 class="post-title text-center mt-2">
                                            <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                                        </h5>
                                    </div>
                                </div>
                            </div>

                        <?php endwhile;
                endif; ?>
                </div>
            </div>
        </div>
    <?php
}

$post = $orig_post;
wp_reset_query();
}

//
// ─── CUSTOM LOGO ────────────────────────────────────────────────────────────────
//
function mtblog_the_custom_logo() 
{	
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }                      
}

//
// ─── CUSTOM CONTROL AND SECTIONS ─────────────────────────────────────────────
//
include_once trailingslashit(realpath(__DIR__ . '/..')) . 'custom/separator.php';
