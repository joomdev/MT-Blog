<?php
//
// ─── STYLES FOR LIVE-PREVIEW ────────────────────────────────────────────────────
//

function mtblog_customizer_css()
{
    ?>
        <style type="text/css">

            :root {
                --preloader-color: <?php echo esc_html(get_theme_mod('color_preloader', '#210048')); ?>;
                --preloader-size: <?php echo (get_theme_mod('preloader_size') ? esc_html(get_theme_mod('preloader_size')) : '40px' ) ?><?php echo (get_theme_mod('preloader_size') ? 'px' : '' ) ?>;
            }

            /* Primary color */
            .block-card-wrap .block-card__social-icons a,
            .bottom-item .bottom-item--menus__ul li a:hover,
            .bottom-item .bottom-item--menus__ul li a:focus,
            section.footer a:hover,
            section.footer a:focus,
            header.horizontal-left .nav-link:hover,
            header.horizontal-left .nav-link:focus,
            header .navbar-nav li.current-menu-item a,
            header .navbar .navbar-brand:hover,
            header .navbar .navbar-brand:focus,
            header .navbar .navbar-brand,
            header .navbar-light .navbar-nav .nav-link:hover,
            header .navbar-light .navbar-nav .nav-link:focus,
            .btn-outline-primary:focus {
                color: <?php echo esc_html(get_theme_mod('color_primary', '#FF4642')); ?>;
            }

            header .navbar .navbar-toggler:focus {
                outline: 5px auto <?php echo esc_html(get_theme_mod('color_primary', '#FF4642')); ?>;
            }

            .btn-primary,
            .btn-outline-primary:hover {
                background-color: <?php echo esc_html(get_theme_mod('color_primary', '#FF4642')); ?>;;
                border-color: <?php echo esc_html(get_theme_mod('color_primary', '#FF4642')); ?>;
            }

            .btn-outline-primary {
                color: <?php echo esc_html(get_theme_mod('color_primary', '#FF4642')); ?>;;
                border-color: <?php echo esc_html(get_theme_mod('color_primary', '#FF4642')); ?>;;
            }

            form .form-control:focus {
                border-color: <?php echo esc_html(get_theme_mod('color_primary', '#FF4642')); ?>;
            }

            .block-card-wrap .block-card:hover .block-card__title,
            .block-card-wrap .block-card:focus .block-card__title {
                border-bottom: 2px solid <?php echo esc_html(get_theme_mod('color_primary', '#FF4642')); ?>;
            }

            .block-card-wrap .block-card__tag {
                border-left: 2px solid <?php echo esc_html(get_theme_mod('color_primary', '#FF4642')); ?>;
            }

            nav.navigation span.current {
                background: <?php echo esc_html(get_theme_mod('color_primary', '#FF4642')); ?>;
            }
            /* Ends Primary color */

            .main-body {
                background: <?php echo esc_html(get_theme_mod('color_background', '#ebeff5')); ?>;
            }

            header,
            header .navbar-light .navbar-nav {
                background-color: <?php echo esc_html(get_theme_mod('color_header_background', '#ffffff')); ?>;
            }

            header .navbar .navbar-tagline {
                color: <?php echo esc_html(get_theme_mod('color_header_text', '#FF4642')); ?>;
            }

            header .navbar .navbar-brand {
                color: <?php echo esc_html(get_theme_mod('color_logo_text', '#FF4642')); ?>;
            }

            header li a {
                color: <?php echo esc_html(get_theme_mod('color_menu', '#000000')); ?>;
            }

            header li a:hover {
                color: <?php echo esc_html(get_theme_mod('color_menu_hover', '#FF4642')); ?>;
            }

            /* Bottom */
            section.bottom {
                background-color: <?php echo esc_html(get_theme_mod('color_footer_background', '#ecf0f1')); ?>;
            }

            section.bottom h2.widget-title {
                color: <?php echo esc_html(get_theme_mod('color_footer_title', '#000000')); ?>;
            }

            section.bottom a {
                color: <?php echo esc_html(get_theme_mod('color_footer_link', '#000000')); ?>;
            }

            section.bottom a:hover {
                color: <?php echo esc_html(get_theme_mod('color_footer_linkhover', '#FF4642')); ?>;
            }

            section.bottom {
                color: <?php echo esc_html(get_theme_mod('color_footer_content', '#000000')); ?>;
            }

            /* Copyright */
            section.footer {
                color: <?php echo esc_html(get_theme_mod('color_copyright', '#222')); ?>;
                background-color: <?php echo esc_html(get_theme_mod('color_copyright_background', '#ecf0f1')); ?>;
            }

            section.footer a {
                color: <?php echo esc_html(get_theme_mod('color_copyright_link', '#222')); ?>;
            }

            section.footer a:hover {
                color: <?php echo esc_html(get_theme_mod('color_copyright_linkhover', '#FF4642')); ?>;
            }

            /* Body Typography */
            body {
                font-family: <?php echo esc_html(get_theme_mod('body_fontfamily', 'Nunito Sans')); ?>, <?php echo esc_html(get_theme_mod('body_alt_fontfamily', 'Arial')); ?>;
                font-size: <?php echo esc_html(get_theme_mod('body_fontsize', '16')); ?><?php echo esc_html(get_theme_mod('body_fontsize_unit', 'px')); ?>;
                text-transform: <?php echo esc_html(get_theme_mod('body_texttransform', 'none')); ?>;
                letter-spacing: <?php echo esc_html(get_theme_mod('body_letterspacing', '1px')); ?><?php echo (get_theme_mod('body_letterspacing') ? 'px' : ''); ?>;
                font-weight: <?php echo esc_html(get_theme_mod('body_fontweight', 'normal')); ?>;
                line-height: <?php echo esc_html(get_theme_mod('body_lineheight', '1.5')); ?>;
            }

            /* Logo Typography */
            header .navbar a.navbar-brand {
                font-family: <?php echo esc_html(get_theme_mod('logo_fontfamily', 'Rubik')); ?>, <?php echo esc_html(get_theme_mod('logo_alt_fontfamily', 'Arial')); ?>;
                font-size: <?php echo esc_html(get_theme_mod('logo_fontsize', '38')); ?><?php echo esc_html(get_theme_mod('logo_fontsize_unit', 'px')); ?>;
                text-transform: <?php echo esc_html(get_theme_mod('logo_texttransform', 'none')); ?>;
                letter-spacing: <?php echo esc_html(get_theme_mod('logo_letterspacing', '1px')); ?><?php echo (get_theme_mod('logo_letterspacing') ? 'px' : ''); ?>;
                font-weight: <?php echo esc_html(get_theme_mod('logo_fontweight', 'normal')); ?>;
                line-height: <?php echo esc_html(get_theme_mod('logo_lineheight', 'normal')); ?>;
            }

            /* Main Menu Typography */
            header .navbar-nav a {
                font-family: <?php echo esc_html(get_theme_mod('mainmenu_fontfamily', 'Rubik')); ?>, <?php echo esc_html(get_theme_mod('mainmenu_alt_fontfamily', 'Arial')); ?>;
                font-size: <?php echo esc_html(get_theme_mod('mainmenu_fontsize', '14')); ?><?php echo esc_html(get_theme_mod('mainmenu_fontsize_unit', 'px')); ?>;
                text-transform: <?php echo esc_html(get_theme_mod('mainmenu_texttransform', 'none')); ?>;
                letter-spacing: <?php echo esc_html(get_theme_mod('mainmenu_letterspacing', '2px')); ?><?php echo (get_theme_mod('mainmenu_letterspacing') ? 'px' : ''); ?>;
                font-weight: <?php echo esc_html(get_theme_mod('mainmenu_fontweight', 'normal')); ?>;
                line-height: <?php echo esc_html(get_theme_mod('mainmenu_lineheight', '1')); ?>;
            }

            /* Entry Title Typography */
            .block-card-wrap .block-card__title {
                font-family: <?php echo esc_html(get_theme_mod('entrytitle_fontfamily', 'Rubik')); ?>, <?php echo esc_html(get_theme_mod('entrytitle_alt_fontfamily', 'Arial')); ?>;
                font-size: <?php echo esc_html(get_theme_mod('entrytitle_fontsize', '18')); ?><?php echo esc_html(get_theme_mod('entrytitle_fontsize_unit', 'px')); ?>;
                text-transform: <?php echo esc_html(get_theme_mod('entrytitle_texttransform', 'none')); ?>;
                letter-spacing: <?php echo esc_html(get_theme_mod('entrytitle_letterspacing', '1px')); ?><?php echo (get_theme_mod('entrytitle_letterspacing') ? 'px' : ''); ?>;
                font-weight: <?php echo esc_html(get_theme_mod('entrytitle_fontweight', '600')); ?>;
                line-height: <?php echo esc_html(get_theme_mod('entrytitle_lineheight', 'normal')); ?>;
            }

            /* Single Post Title Typography */
            .post-content .post-header .entry-title {
                font-family: <?php echo esc_html(get_theme_mod('posttitle_fontfamily', 'Rubik')); ?>, <?php echo esc_html(get_theme_mod('posttitle_alt_fontfamily', 'Arial')); ?>;
                font-size: <?php echo esc_html(get_theme_mod('posttitle_fontsize', '30')); ?><?php echo esc_html(get_theme_mod('posttitle_fontsize_unit', 'px')); ?>;
                text-transform: <?php echo esc_html(get_theme_mod('posttitle_texttransform', 'none')); ?>;
                letter-spacing: <?php echo esc_html(get_theme_mod('posttitle_letterspacing', '1px')); ?><?php echo (get_theme_mod('posttitle_letterspacing') ? 'px' : ''); ?>;
                font-weight: <?php echo esc_html(get_theme_mod('posttitle_fontweight', '600')); ?>;
                line-height: <?php echo esc_html(get_theme_mod('posttitle_lineheight', 'normal')); ?>;
            }

            /* Meta Typography */
            .block-card-wrap .block-card .meta-element {
                font-family: <?php echo esc_html(get_theme_mod('meta_fontfamily', 'Rubik')); ?>, <?php echo esc_html(get_theme_mod('meta_alt_fontfamily', 'Arial')); ?>;
                font-size: <?php echo esc_html(get_theme_mod('meta_fontsize', '12')); ?><?php echo esc_html(get_theme_mod('meta_fontsize_unit', 'px')); ?>;
                text-transform: <?php echo esc_html(get_theme_mod('meta_texttransform', 'none')); ?>;
                letter-spacing: <?php echo esc_html(get_theme_mod('meta_letterspacing', '1px')); ?><?php echo (get_theme_mod('meta_letterspacing') ? 'px' : ''); ?>;
                font-weight: <?php echo esc_html(get_theme_mod('meta_fontweight', 'normal')); ?>;
                line-height: <?php echo esc_html(get_theme_mod('meta_lineheight', '1')); ?>;
            }

            div.meta-info div.meta-info-wrapper ul li {
                font-family: <?php echo esc_html(get_theme_mod('meta_fontfamily', 'Rubik')); ?>, <?php echo esc_html(get_theme_mod('meta_alt_fontfamily', 'Arial')); ?>;
                font-size: <?php echo esc_html(get_theme_mod('meta_fontsize', '12')); ?><?php echo esc_html(get_theme_mod('meta_fontsize_unit', 'px')); ?>;
                text-transform: <?php echo esc_html(get_theme_mod('meta_texttransform', 'none')); ?>;
                letter-spacing: <?php echo esc_html(get_theme_mod('meta_letterspacing', '1px')); ?><?php echo (get_theme_mod('meta_letterspacing') ? 'px' : ''); ?>;
                font-weight: <?php echo esc_html(get_theme_mod('meta_fontweight', 'normal')); ?>;
                line-height: <?php echo esc_html(get_theme_mod('meta_lineheight', '1')); ?>;
            }

            .content .meta-element {
                font-family: <?php echo esc_html(get_theme_mod('meta_fontfamily', 'Rubik')); ?>, <?php echo esc_html(get_theme_mod('meta_alt_fontfamily', 'Arial')); ?>;
                font-size: <?php echo esc_html(get_theme_mod('meta_fontsize', '12')); ?><?php echo esc_html(get_theme_mod('meta_fontsize_unit', 'px')); ?>;
                text-transform: <?php echo esc_html(get_theme_mod('meta_texttransform', 'none')); ?>;
                letter-spacing: <?php echo esc_html(get_theme_mod('meta_letterspacing', '1px')); ?><?php echo (get_theme_mod('meta_letterspacing') ? 'px' : ''); ?>;
                font-weight: <?php echo esc_html(get_theme_mod('meta_fontweight', 'normal')); ?>;
                line-height: <?php echo esc_html(get_theme_mod('meta_lineheight', '1')); ?>;
            }

            /* Footer Title Typography */
            section.bottom h2.widget-title {
                font-family: <?php echo esc_html(get_theme_mod('footertitle_fontfamily', 'Rubik')); ?>, <?php echo esc_html(get_theme_mod('footertitle_alt_fontfamily', 'Arial')); ?>;
                font-size: <?php echo esc_html(get_theme_mod('footertitle_fontsize', '16')); ?><?php echo esc_html(get_theme_mod('footertitle_fontsize_unit', 'px')); ?>;
                text-transform: <?php echo esc_html(get_theme_mod('footertitle_texttransform', 'none')); ?>;
                letter-spacing: <?php echo esc_html(get_theme_mod('footertitle_letterspacing', '1px')); ?><?php echo (get_theme_mod('footertitle_letterspacing') ? 'px' : ''); ?>;
                font-weight: <?php echo esc_html(get_theme_mod('footertitle_fontweight', '600')); ?>;
                line-height: <?php echo esc_html(get_theme_mod('footertitle_lineheight', '1')); ?>;
            }

            /* Copyright Typography */
            section.footer .copyright{
                font-family: <?php echo esc_html(get_theme_mod('copyright_fontfamily', 'Rubik')); ?>, <?php echo esc_html(get_theme_mod('copyright_alt_fontfamily', 'Arial')); ?>;
                font-size: <?php echo esc_html(get_theme_mod('copyright_fontsize', '12')); ?><?php echo esc_html(get_theme_mod('copyright_fontsize_unit', 'px')); ?>;
                text-transform: <?php echo esc_html(get_theme_mod('copyright_texttransform', 'none')); ?>;
                letter-spacing: <?php echo esc_html(get_theme_mod('copyright_letterspacing', '1px')); ?><?php echo (get_theme_mod('copyright_letterspacing') ? 'px' : ''); ?>;
                font-weight: <?php echo esc_html(get_theme_mod('copyright_fontweight', 'normal')); ?>;
                line-height: <?php echo esc_html(get_theme_mod('copyright_lineheight', '1')); ?>;
            }

            /* Widget Typography */
            .widget-title {
                font-family: <?php echo esc_html(get_theme_mod('widgettitle_fontfamily', 'Rubik')); ?>, <?php echo esc_html(get_theme_mod('widgettitle_alt_fontfamily', 'Arial')); ?>;
                font-size: <?php echo esc_html(get_theme_mod('widgettitle_fontsize', '16')); ?><?php echo esc_html(get_theme_mod('widgettitle_fontsize_unit', 'px')); ?>;
                text-transform: <?php echo esc_html(get_theme_mod('widgettitle_texttransform', 'none')); ?>;
                letter-spacing: <?php echo esc_html(get_theme_mod('widgettitle_letterspacing', '1px')); ?><?php echo (get_theme_mod('widgettitle_letterspacing') ? 'px' : ''); ?>;
                font-weight: <?php echo esc_html(get_theme_mod('widgettitle_fontweight', 'normal')); ?>;
                line-height: <?php echo esc_html(get_theme_mod('widgettitle_lineheight', '1')); ?>;
            }

            /* Mega Menu typography */
            .main-navigation ul.sub-menu li a{
                font-family: <?php echo esc_html(get_theme_mod('dropdown_fontfamily', 'Rubik')); ?>, <?php echo esc_html(get_theme_mod('dropdown_alt_fontfamily', 'Arial')); ?>;
                font-size: <?php echo esc_html(get_theme_mod('dropdown_fontsize', '14')); ?><?php echo esc_html(get_theme_mod('dropdown_fontsize_unit', 'px')); ?>;
                text-transform: <?php echo esc_html(get_theme_mod('dropdown_texttransform', 'none')); ?>;
                letter-spacing: <?php echo esc_html(get_theme_mod('dropdown_letterspacing', '1px')); ?><?php echo (get_theme_mod('dropdown_letterspacing') ? 'px' : ''); ?>;
                font-weight: <?php echo esc_html(get_theme_mod('dropdown_fontweight', 'normal')); ?>;
                line-height: <?php echo esc_html(get_theme_mod('dropdown_lineheight', '1')); ?>;
            }

            /* Back to top */
            a#backtotop i {
                font-size: <?php echo esc_html(get_theme_mod('backtotop_fontsize', '20')) . "px" ?>;
                color: <?php echo (get_theme_mod('backtotop_color') ? esc_html(get_theme_mod('backtotop_color')) : '#fff' ) ?>;
                line-height: <?php echo esc_html(get_theme_mod('backtotop_fontsize', '20')) . "px" ?>;
            }
            a#backtotop {
                width: <?php echo esc_html(get_theme_mod('backtotop_fontsize', '20')) . "px" ?>;
                height: <?php echo esc_html(get_theme_mod('backtotop_fontsize', '20')) . "px" ?>;
                background: <?php echo (get_theme_mod('backtotop_bgcolor') ? esc_html(get_theme_mod('backtotop_bgcolor')) : '#A53E4C' ) ?>;
                display: none;
            }

            header .navbar-nav li.current-menu-item a {
                color: <?php echo esc_html(get_theme_mod('color_menu_active', '#FF4642')); ?>;
            }

            .sticky-navbar.sticky {
                background-color: <?php echo (get_theme_mod('color_stickyheader_background') ? esc_html(get_theme_mod('color_stickyheader_background')) : '#fff'); ?>;
            }

            /* Dropdown Colors */
            .main-navigation ul.sub-menu {
                background-color: <?php echo (get_theme_mod('color_dropdown_background') ? esc_html(get_theme_mod('color_dropdown_background')) : '#fff'); ?>;
            }
            .main-navigation ul.sub-menu li a {
                color: <?php echo (get_theme_mod('color_dropdown_link') ? esc_html(get_theme_mod('color_dropdown_link')) : '#000'); ?>;
            }
            .main-navigation ul.sub-menu li.current_page_item a {
                color: <?php echo (get_theme_mod('color_dropdown_activelink') ? esc_html(get_theme_mod('color_dropdown_activelink')) : '#FF4642'); ?>;
            }
            .main-navigation ul.sub-menu li.current-menu-item {
                background-color: <?php echo (get_theme_mod('color_dropdown_activebg') ? esc_html(get_theme_mod('color_dropdown_activebg')) : '#fff'); ?>;
            }
            .main-navigation ul.sub-menu li a:hover {
                color: <?php echo (get_theme_mod('color_link_hover') ? esc_html(get_theme_mod('color_link_hover')) : '#FF4642'); ?>;
            }
            .main-navigation ul.sub-menu li:hover {
                background-color: <?php echo (get_theme_mod('color_hover_bg') ? esc_html(get_theme_mod('color_hover_bg')) : '#fff'); ?>;
            }

            /* Preloader Colors and Size */
            .sk-rotating-plane {
                width: var(--preloader-size);
	            height: var(--preloader-size);
                background-color: var(--preloader-color);
            }
            .sk-fading-circle {
                width: var(--preloader-size);
                height: var(--preloader-size);
            }
            .sk-fading-circle .sk-circle:before {
                background-color: var(--preloader-color);
            }
            .sk-folding-cube .sk-cube:before {
                background-color: var(--preloader-color);
            }
            .sk-folding-cube {
                width: var(--preloader-size);
                height: var(--preloader-size);
            }
            .sk-double-bounce .sk-child {
                background-color: var(--preloader-color);
            }
            .sk-double-bounce {
                width: var(--preloader-size);
                height: var(--preloader-size);
            }
            .sk-wave .sk-rect {
                background-color: var(--preloader-color);
            }
            .sk-wave {
                width: var(--preloader-size);
                height: var(--preloader-size);
            }
            .sk-wandering-cubes .sk-cube {
                background-color: var(--preloader-color);
            }
            .sk-wandering-cubes {
                width: var(--preloader-size);
                height: var(--preloader-size);
            }
            .sk-spinner-pulse {
                background-color: var(--preloader-color);
                width: var(--preloader-size);
	            height: var(--preloader-size);
            }
            .sk-chasing-dots .sk-child {
                background-color: var(--preloader-color);
            }
            .sk-chasing-dots {
                width: var(--preloader-size);
                height: var(--preloader-size);
            }
            .sk-three-bounce .sk-child {
                background-color: var(--preloader-color);
                width: var(--preloader-size);
	            height: var(--preloader-size);
            }
            .sk-circle .sk-child:before {
                background-color: var(--preloader-color);
            }
            .sk-circle {
                width: var(--preloader-size);
                height: var(--preloader-size);
            }
            .sk-cube-grid .sk-cube {
                background-color: var(--preloader-color);
            }
            .sk-cube-grid {
                width: var(--preloader-size);
                height: var(--preloader-size);
            }
            .bouncing-loader>div {
                background: var(--preloader-color);
                width: var(--preloader-size);
	            height: var(--preloader-size);
            }
            .donut {
                border-left-color: var(--preloader-color);
                width: var(--preloader-size);
                height: var(--preloader-size);
            }

            /* Boxed Bg Color */
            body.boxed {
                background: <?php echo (get_theme_mod('color_boxedbackground') ? esc_html(get_theme_mod('color_boxedbackground')) : '#fff'); ?>;
                background-image: url('<?php echo esc_html(get_theme_mod('boxed_bgimage')) ?>');
                background-repeat: <?php echo (get_theme_mod('boxed_bgrepeat') ? esc_html(get_theme_mod('boxed_bgrepeat')) : 'inherit'); ?>;
                background-size: <?php echo (get_theme_mod('boxed_bgsize') ? esc_html(get_theme_mod('boxed_bgsize')) : 'inherit'); ?>;
                background-position: <?php echo (get_theme_mod('boxed_bgposition') ? esc_html(get_theme_mod('boxed_bgposition')) : 'inherit'); ?>;
                background-attachment: <?php echo (get_theme_mod('boxed_bgattachment') ? esc_html(get_theme_mod('boxed_bgattachment')) : 'inherit'); ?>;
            }

            
        </style>
    <?php
}
add_action( 'wp_head', 'mtblog_customizer_css');
