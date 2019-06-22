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

$mtblog_footer_columns = get_theme_mod('footer_column', 0);
?>

<?php
	for ( $i = 1; $i <= $mtblog_footer_columns; $i++ ) {
		$footer_widget_id = 'footer-widget-' . $i;

		if ( is_active_sidebar( $footer_widget_id ) ) :
			echo '<div class="footer-widget footer-widget-' . esc_attr( $i ) . esc_attr( $footer_last_class ) . ' col-md-3">';
				dynamic_sidebar( esc_html( $footer_widget_id ) );
			echo '</div>';
		endif;
	}
?>
<!-- footer-widgets -->