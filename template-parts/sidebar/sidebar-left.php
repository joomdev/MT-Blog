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

?>

<aside class="col-lg-3 sidebar" itemtype="https://schema.org/WPSideBar" itemscope="itemscope">              
    <?php
    if ( is_active_sidebar( 'sidebar-left' ) ) {
        dynamic_sidebar( 'sidebar-left' );
    }
    ?>        
</aside>