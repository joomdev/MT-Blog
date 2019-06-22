<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://mightythemes.com
 *
 * @package WordPress
 * @subpackage MT_Blog
 * @since 1.0.0
 */
?>

<!DOCTYPE html>
<html lang="en">

<head itemscope itemtype="http://schema.org/WebSite">
    <!-- Required meta tags -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php wp_head(); ?>

    <?php if (get_theme_mod('space_before_head') ) : ?>
        <?php echo get_theme_mod('space_before_head'); ?>
    <?php endif; ?>
</head>

<body itemtype="http://schema.org/WebPage" itemscope="itemscope" class="<?php echo (get_theme_mod('main_layout') == 'boxed') ? 'boxed' : '' ?>">
<!-- Preloader -->
<?php
if (get_theme_mod('preloader_status', 0)) :
    get_template_part('template-parts/preloader');
endif;
?>

<!-- Back To Top -->
<?php if (get_theme_mod('backtotop_status', 0) ) { ?>
    <a id="backtotop" class="<?php echo esc_html(get_theme_mod('backtotop_shape', 'square')); ?><?php echo get_theme_mod('backtotop_mobile', 0) ? ' d-none d-sm-block' : ''; ?>" href="javascript:void(0)" >
        <i class="<?php echo esc_html(get_theme_mod('backtotop_icon', 'fas fa-arrow-up')); ?>"></i>
    </a>
<?php } ?>

<!-- Header -->

<?php
switch(get_theme_mod('header_style', 'horizontal')):
    case 'horizontal':
        get_template_part( 'template-parts/header/header', 'horizontal');
    break;
    default:
        get_template_part( 'template-parts/header/header', 'stacked' );
endswitch ?>
