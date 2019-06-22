<?php
/**
 * MT Blog functions and definitions
 *
 * @link https://mightythemes.com
 *
 * @package Mighty Themes
 * @subpackage MT_Blog
 * @since 1.0.0
 */


/**
 * Theme's Constants
 */

define ( 'MTBLOG_THEME_DIR', trailingslashit( get_template_directory() ) );

if (version_compare($GLOBALS['wp_version'], '4.7', '<')) {
    die("You're running the old version of WordPress. Please Update.");
    return;
}

//
// ─── ADVERTISMENT MANAGER ───────────────────────────────────────────────────────
//
require_once MTBLOG_THEME_DIR . 'inc/customizer/ad-manager.php';

//
// ─── CUSTOMIZER MENU OPTIONS ────────────────────────────────────────────────────
//
require_once MTBLOG_THEME_DIR . 'inc/customizer/controls.php';

//
// ─── STYLES FOR LIVE-PREVIEW ────────────────────────────────────────────────────
//
require_once MTBLOG_THEME_DIR . 'inc/customizer/live-preview-css.php';

/*
 * Admin Level Scripts
 */
if ( is_admin() ) {
    //
    // ─── CUSTOM METABOXES FOR POST LEVEL EDITOR ─────────────────────────────────────
    //
    require_once MTBLOG_THEME_DIR . 'inc/guten/custom-meta-boxes.php';
}
    

//
// ─── SCRIPTS AND STYLES FOR THE THEME ───────────────────────────────────────────
//
function mtblog_add_styles()
{
    // Styles
    wp_enqueue_style('bootstrap-css', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome', '//use.fontawesome.com/releases/v5.8.1/css/all.css');
    wp_enqueue_style('custom-styles', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style('animate-css', '//cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css');
    wp_enqueue_style('body-font', '//fonts.googleapis.com/css?family=Rubik');

    // Scripts
	wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), null, true);
    wp_enqueue_script('popper-js', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js');
    wp_enqueue_script('bootstrap-js', '//stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array('jquery'));
    wp_enqueue_script('index-js', get_template_directory_uri() . '/js/index.js', array('jquery'), '3.3', true);
}
add_action('wp_enqueue_scripts', 'mtblog_add_styles');

//
// ─── THEME DEFAULTS ─────────────────────────────────────────────────────────────
//
if ( ! function_exists( 'mtblog_theme_setup' ) ) :
    function mtblog_theme_setup() {       
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );
        
        /*
        * Enable support for custom logo.
        *
        */
        add_theme_support( 'custom-logo', array(
            'height'      => 96,
            'width'       => 278,
            'flex-width'  => true,
        ) );

        // Register WordPress Custom Menus
	    add_theme_support( 'menus' );
        
        /* Registering Primary Navigation menu */
        register_nav_menus(array(
            'primary-menu' => __('Primary Menu', 'mtblog'),
        ));
        
        // Register Post Thumbnails
        add_theme_support( 'post-thumbnails' );
        // set_post_thumbnail_size( 350, 350, true );
        // add_image_size( 'mtblog-featured', 875, 430, true );

        // Post formats
        add_theme_support(
            'post-formats',
            array(
                'gallery',
                'quote',
                'video',
                'audio',                
                'review',
            )
        );

        //
        // ─── ADD THEME SUPPORT FOR INFINITE SCROLL ──────────────────────────────────────
        // ─── See: https://jetpack.me/support/infinite-scroll/ ───────────────────────────
        //
        if( get_theme_mod('default_sidebar', 'none') == 'none') {
            add_theme_support( 'infinite-scroll', array(
                'container' => 'main-posts-section',
                'render'    => 'mtblog_infinite_scroll_render',
            ) );
        }
    }
endif; // mtblog_theme_setup
add_action( 'after_setup_theme', 'mtblog_theme_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function mtblog_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
        get_template_part( 'template-parts/content/content' );
	}
}