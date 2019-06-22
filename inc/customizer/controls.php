<?php

//
// ─── HELPER FOR CUSTOM CONTROLS & SECTIONS ─────────────────────────────────────────
//
include_once trailingslashit(dirname(__FILE__)) . 'custom/helper.php';

//
// ─── CUSTOMIZER CONTROLS ────────────────────────────────────────────────────────
//
function mtblog_customize_register($wp_customize)
{
    // Google Web Fonts
    $googleFonts = CustomizerHelper::getGoogleFonts();
    
    //
    // ─── CHECKING FOR CUSTOM SECTION AND CONTROLS STATUS ────────────────────────────
    //
    if ( method_exists( $wp_customize, 'register_section_type' ) ) {
        $wp_customize->register_section_type( 'Horizontal_Separator' );
    }

    $altFontFamily = array(
        "Arial" => "Arial",
        "Arial Black" => "Arial Black",
        "Bookman Old Style" => "Bookman Old Style",
        "Comic Sans MS" => "Comic Sans MS",
        "Courier" => "Courier",
        "Garamond" => "Garamond",
        "Georgia" => "Georgia",
        "Impact" => "Impact",
        "Lucida Console" => "Lucida Console",
        "Lucida Sans Unicode" => "Lucida Sans Unicode",
        "MS Sans Serif" => "MS Sans Serif",
        "MS Serif" => "MS Serif",
        "Palatino Linotype" => "Palatino Linotype",
        "Tahoma" => "Tahoma",
        "Times New Roman" => "Times New Roman",
        "Trebuchet MS" => "Trebuchet MS",
        "Verdana" => "Verdana"
    );


    //
    // ─── SEPARATOR FOR MIGHTYTHEMES OPTIONS ─────────────────────────────────────────
    //
    $wp_customize->add_section(
        new Horizontal_Separator( $wp_customize, 'Horizontal_Separator-MT_options',
            array(
                'pro_text' => __( 'MT Blog Options', 'mtblog' ),
                'type' => 'horizontal-separator',
                'priority' => 120,
            )
        )
    );

    // Enable/Disable Title and tagline fron site identity
    $wp_customize->add_setting('site_identity_status', array (
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(
        'site_identity_status',
        array (
            'label' => __('Display Site Title and Tagline', 'mtblog'),
            'section' => 'title_tagline',
            'type' => 'checkbox',
        )
    );

    //
    // ─── BASIC SETTINGS ─────────────────────────────────────────────────────────────
    //
    $wp_customize->add_panel('basic_settings', array (
        'title' => __( 'Basic Settings', 'mtblog' ),
    ));
    
    //──── Preloader ───────────────────────────────────────────────────────────────────
    $wp_customize->add_section('preloader', array (
        'title' => __('Preloader', 'mtblog'),
        'description' => '',
        'panel' => 'basic_settings',
    ));
    // Preloader Enable/Disable
    $wp_customize->add_setting('preloader_status', array (
        'default' => false,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(
        'preloader_status',
        array (
            'label' => __('Enable Preloader', 'mtblog'),
            'section' => 'preloader',
            'type' => 'checkbox',
        )
    );
    // Types of preloader
    $wp_customize->add_setting('preloader_type', array (
        'default' => 'rotating-plane',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control( 'preloader_type', array (
        'label' => __('Choose Preloader', 'mtblog'),
        'section' => 'preloader',
        'type' => 'radio',
        'choices' => array (
            'rotating-plane' => 'Rotating Plane',
            'fading-circle' => 'Fading Circle',
            'folding-cube' => 'Folding Cube',
            'double-bounce' => 'Double Bounce',
            'wave' => 'Wave',
            'wandering-cubes' => 'Wandering Cubes',
            'pulse' => 'Pulse',
            'chasing-dots' => 'Chasing Dots',
            'three-bounce' => 'Three Bounce',
            'circle' => 'Circle',
            'cube-grid' => 'Cube Grid',
            'bouncing-loader' => 'Bouncing Loader',
            'donut' => 'Donut',
        ),
    ));
    // Preloader Color
    $wp_customize->add_setting('color_preloader', array (
        'default' => '#210048',
        'transport'   => 'refresh',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_preloader',
        array(
            'label'      => __( 'Preloader Color', 'mtblog' ),
            'section'    => 'preloader',
        ) )
    );
    // Preloader size
    $wp_customize->add_setting('preloader_size', array (
        'default' => '40',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'preloader_size', array(
        'type' => 'number',
        'section' => 'preloader',
        'label' => __( 'Preloader Size', 'mtblog'),
        'description' => __( 'Set Preloader Size', 'mtblog' ),
        'input_attrs' => array(
            'min' => 1,
            'max' => 500,
            'step' => 1,
        ),
    ));
    //──── Back to top ───────────────────────────────────────────────────────────────────────
    $wp_customize->add_section('backtotop', array (
        'title' => __('Back To Top', 'mtblog'),
        'description' => '',
        'panel' => 'basic_settings',
    ));
    // Back to top (Enable/Disable)
    $wp_customize->add_setting('backtotop_status', array (
        'default' => false,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'backtotop_status', array(
        'label' => __('Enable Back To Top', 'mtblog'),
        'section' => 'backtotop',
        'type' => 'checkbox',
    ));
    // Icons for Back to top
    $wp_customize->add_setting('backtotop_icon', array (
        'default' => 'fas fa-arrow-up',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'backtotop_icon', array(
        'label' => __('Choose Icon for button', 'mtblog'),
        'section' => 'backtotop',
        'type' => 'select',
        'choices' => array(
            'fas fa-long-arrow-alt-up' => "Alternate Long Arrow Up",
            'fas fa-arrow-up' => 'Arrow Up',
            'fas fa-arrow-circle-up' => 'Arrow Cicle Up',
            'fas fa-arrow-alt-circle-up' => 'Alternate Arrow Circle Up',
            'fas fa-angle-double-up' => 'Angle Double Up',
            'fas fa-sort-up' => 'Sort Up (Ascending)',
            'fas fa-level-up-alt' => 'Level Up Alternate',
            'fas fa-cloud-upload-alt' => 'Cloud Upload Alternate',
            'fas fa-chevron-up' => 'Chevron Up',
            'fas fa-chevron-circle-up' => 'Chevron Circle Up',
            'fas fa-hand-point-up' => 'Hand Pointing Up (Solid)',
            'far fa-hand-point-up' => 'Hand Pointing Up (Regular)',
            'fas fa-caret-square-up' => 'Caret Square Up (Solid)',
            'far fa-caret-square-up' => 'Caret Square Up (Regular)',
        ),
    ));
    // Back to top font size
    $wp_customize->add_setting('backtotop_fontsize', array (
        'default' => '20',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'backtotop_fontsize', array(
        'type' => 'number',
        'section' => 'backtotop',
        'label' => __( 'Back To Top Size', 'mtblog'),
        'description' => __( 'Set Font Size', 'mtblog' ),
        'input_attrs' => array(
            'min' => 0,
            'max' => 200,
            'step' => 1,
        ),
    ));
    // Back to top font color
    $wp_customize->add_setting('backtotop_color', array (
        'default' => '#fff',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'backtotop_color',
        array(
            'label' => __( 'Back To Top Color', 'mtblog' ),
            'section' => 'backtotop',
        ) )
    );
    // Back to top Background color
    $wp_customize->add_setting('backtotop_bgcolor', array (
        'default' => '#A23E4C',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'backtotop_bgcolor',
        array(
            'label' => __( 'Back To Top Background Color', 'mtblog' ),
            'section' => 'backtotop',
        ) )
    );
    // Back to top shape
    $wp_customize->add_setting('backtotop_shape', array (
        'default' => 'square',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('backtotop_shape', array (
        'label' => __('Shape', 'mtblog'),
        'description' => __('Shape of Back To Top', 'mtblog'),
        'type' => 'select',
        'section' => 'backtotop',
        'choices' => array(
            'square' => 'Square',
            'rounded' => 'Rounded',
            'circle' => 'Circle',
        ),
    ));
    // Enable Back to top on mobile
    $wp_customize->add_setting('backtotop_mobile', array (
        'default' => false,
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('backtotop_mobile', array (
        'label' => __('Hide on Mobile', 'mtblog'),
        'description' => __('Show/Hide the button on mobile view.', 'mtblog'),
        'type' => 'checkbox',
        'section' => 'backtotop',
    ));

    //
    // ─── COLORS MANAGEMENT ──────────────────────────────────────────────────────────
    //
    $wp_customize->add_panel('colors_mgt', array (
        'title' => __( 'Colors Management', 'mtblog'),
    ));

    $wp_customize->add_section('main_colors', array (
        'title' => __('Colors', 'mtblog'),
        'panel' => 'colors_mgt',
    ));
    // Color controls
    $wp_customize->add_setting('color_primary', array (
        'default' => '#222',
        'transport'   => 'refresh',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_primary',
        array(
            'label'      => __( 'Primary Color', 'mtblog' ),
            'section'    => 'main_colors',
        ) )
    );

    // Header Colors
    $wp_customize->add_section('header_colors', array (
        'title' => __('Header Color', 'mtblog'),
        'panel' => 'colors_mgt',
    ));
    $wp_customize->add_setting('color_header_text', array (
        'default' => '#FF4642',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_header_text',
        array(
            'label'      => __( 'Header Text Color', 'mtblog' ),
            'section'    => 'header_colors',
        ) )
    );

    $wp_customize->add_setting('color_header_background', array (
        'default' => '#ffffff',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_header_background',
        array(
            'label'      => __( 'Header Background Color', 'mtblog' ),
            'section'    => 'header_colors',
        ) )
    );

    $wp_customize->add_setting('color_stickyheader_background', array (
        'default' => '#ffffff',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_stickyheader_background',
        array(
            'label'      => __( 'Sticky Header Background Color', 'mtblog' ),
            'section'    => 'header_colors',
        ) )
    );

    // Background Color
    $wp_customize->add_section('background_colors', array (
        'title' => __('Background Color', 'mtblog'),
        'panel' => 'colors_mgt',
    ));
    $wp_customize->add_setting('color_background', array (
        'default' => '#eee',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_background',
        array(
            'label'      => __( 'Background Color', 'mtblog' ),
            'section'    => 'background_colors',
        ) )
    );

    // Logo Color
    $wp_customize->add_section('logo_colors', array (
        'title' => __('Logo Color', 'mtblog'),
        'panel' => 'colors_mgt',
    ));
    $wp_customize->add_setting('color_logo_text', array (
        'default' => '#FF4642',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_logo_text',
        array(
            'label'      => __( 'Logo Text Color', 'mtblog' ),
            'section'    => 'logo_colors',
        ) )
    );

    // Menu Colors
    $wp_customize->add_section('menu_colors', array (
        'title' => __('Menu Color', 'mtblog'),
        'panel' => 'colors_mgt',
    ));
    $wp_customize->add_setting('color_menu', array (
        'default' => '#000000',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_menu',
        array(
            'label'      => __( 'Menu Color', 'mtblog' ),
            'section'    => 'menu_colors',
        ) )
    );
    $wp_customize->add_setting('color_menu_hover', array (
        'default' => '#FF4642',
        'transport'   => 'refresh',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_menu_hover',
        array(
            'label'      => __( 'Menu Hover Color', 'mtblog' ),
            'section'    => 'menu_colors',
        ) )
    );
    $wp_customize->add_setting('color_menu_active', array (
        'default' => '#FF4642',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_menu_active',
        array(
            'label'      => __( 'Menu Active Color', 'mtblog' ),
            'section'    => 'menu_colors',
        ) )
    );

    // Dropdown Colors
    $wp_customize->add_setting('color_dropdown_background', array (
        'default' => '#fff',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_dropdown_background',
        array(
            'label'      => __( 'Dropdown Background Color', 'mtblog' ),
            'section'    => 'menu_colors',
        ) )
    );
    $wp_customize->add_setting('color_dropdown_link', array (
        'default' => '#000',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_dropdown_link',
        array(
            'label'      => __( 'Dropdown Link Color', 'mtblog' ),
            'section'    => 'menu_colors',
        ) )
    );
    $wp_customize->add_setting('color_dropdown_activelink', array (
        'default' => '#FF4642',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_dropdown_activelink',
        array(
            'label'      => __( 'Dropdown Active Link Color', 'mtblog' ),
            'section'    => 'menu_colors',
        ) )
    );
    $wp_customize->add_setting('color_dropdown_activebg', array (
        'default' => '#fff',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_dropdown_activebg',
        array(
            'label'      => __( 'Dropdown Active Background Color', 'mtblog' ),
            'section'    => 'menu_colors',
        ) )
    );
    $wp_customize->add_setting('color_link_hover', array (
        'default' => '#FF4642',
        'transport'   => 'refresh',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_link_hover',
        array(
            'label'      => __( 'Dropdown Hover Link Color', 'mtblog' ),
            'section'    => 'menu_colors',
        ) )
    );
    $wp_customize->add_setting('color_hover_bg', array (
        'default' => '#fff',
        'transport'   => 'refresh',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_hover_bg',
        array(
            'label'      => __( 'Dropdown Hover Background Color', 'mtblog' ),
            'section'    => 'menu_colors',
        ) )
    );

    // Footer Colors
    $wp_customize->add_section('footer_colors', array (
        'title' => __('Footer Color', 'mtblog'),
        'panel' => 'colors_mgt',
    ));
    $wp_customize->add_setting('color_footer_background', array (
        'default' => '#ecf0f1',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_footer_background',
        array(
            'label'      => __( 'Footer Background Color', 'mtblog' ),
            'section'    => 'footer_colors',
        ) )
    );
    $wp_customize->add_setting('color_footer_title', array (
        'default' => '#000000',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_footer_title',
        array(
            'label'      => __( 'Footer Title Color', 'mtblog' ),
            'section'    => 'footer_colors',
        ) )
    );

    $wp_customize->add_setting('color_footer_link', array (
        'default' => '#000000',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_footer_link',
        array(
            'label'      => __( 'Footer Link Color', 'mtblog' ),
            'section'    => 'footer_colors',
        ) )
    );

    $wp_customize->add_setting('color_footer_linkhover', array (
        'default' => '#FF4642',
        'transport'   => 'refresh',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_footer_linkhover',
        array(
            'label'      => __( 'Footer Link Hover Color', 'mtblog' ),
            'section'    => 'footer_colors',
        ) )
    );

    $wp_customize->add_setting('color_footer_content', array (
        'default' => '#000000',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_footer_content',
        array(
            'label'      => __( 'Footer Content Color', 'mtblog' ),
            'section'    => 'footer_colors',
        ) )
    );

    // Copyright's Colors
    $wp_customize->add_section('copyright_colors', array (
        'title' => __('Copyright Color', 'mtblog'),
        'panel' => 'colors_mgt',
    ));
    $wp_customize->add_setting('color_copyright', array (
        'default' => '#222',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_copyright',
        array(
            'label'      => __( 'Copyright Color', 'mtblog' ),
            'section'    => 'copyright_colors',
        ) )
    );

    // Link Color
    $wp_customize->add_setting('color_copyright_link', array (
        'default' => '#222',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_copyright_link',
        array(
            'label'      => __( 'Copyright Link Color', 'mtblog' ),
            'section'    => 'copyright_colors',
        ) )
    );
    // Link hover
    $wp_customize->add_setting('color_copyright_linkhover', array (
        'default' => '#FF4642',
        'transport'   => 'refresh',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_copyright_linkhover',
        array(
            'label'      => __( 'Copyright Link Hover Color', 'mtblog' ),
            'section'    => 'copyright_colors',
        ) )
    );
    // Copyright Background Color
    $wp_customize->add_setting('color_copyright_background', array (
        'default' => '#ecf0f1',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_copyright_background',
        array(
            'label'      => __( 'Copyright Background Color', 'mtblog' ),
            'section'    => 'copyright_colors',
        ) )
    );


    //
    // ─── TYPOGRAPHY MANAGEMENT ──────────────────────────────────────────────────────
    //
    $wp_customize->add_panel('typography_mgt', array (
        'title' => __( 'Typography Management', 'mtblog' ),
    ));

    // Body Typography Management
    $wp_customize->add_section('body_typography', array (
        'title' => __('Body', 'mtblog'),
        'description' => 'Manage fonts for your website\'s Body',
        'panel' => 'typography_mgt',
    ));

    $wp_customize->add_setting('body_fontfamily', array (
        'transport' => 'refresh',
        'default' => 'Rubik',
        'sanitize' => 'custom_sanitize_fonts',
    ));
    $wp_customize->add_control( 'body_fontfamily', array (
        'label' => __('Font Family', 'mtblog'),
        'section' => 'body_typography',
        'type' => 'select',
        'choices' => $googleFonts,
    ));

    $wp_customize->add_setting('body_fontsize', array (
        'default' => '16',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'body_fontsize', array(
        'type' => 'number',
        'section' => 'body_typography',
        'label' => __( 'Font Size', 'mtblog'),
        'description' => __( 'Set Font Size', 'mtblog' ),
        'input_attrs' => array(
            'min' => 0,
            'max' => 100,
            'step' => 1,
        ),
    ));

    $wp_customize->add_setting('body_fontsize_unit', array (
        'default' => 'px',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'body_fontsize_unit', array(
        'section' => 'body_typography',
        'type' => 'radio',
        'choices' => array(
            'px' => 'px',
            'em' => 'em',
        ),
    ));

    $wp_customize->add_setting('body_texttransform', array (
        'default' => 'none',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'body_texttransform', array (
        'label' => __('Text Transform', 'mtblog'),
        'section' => 'body_typography',
        'type' => 'select',
        'choices' => array (
            'none' => 'None',
            'uppercase' => 'UPPERCASE',
            'lowercase' => 'lowercase',
            'capitalize' => 'Capitalize'
        ),
    ));

    $wp_customize->add_setting('body_alt_fontfamily', array (
        'transport' => 'refresh',
        'default' => 'Arial',
        'sanitize' => 'custom_sanitize_fonts',
    ));
    $wp_customize->add_control( 'body_alt_fontfamily', array (
        'label' => __('Alt Font Family', 'mtblog'),
        'section' => 'body_typography',
        'type' => 'select',
        'choices' => $altFontFamily,
    ));

    $wp_customize->add_setting('body_letterspacing', array (
        'default' => '1',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'body_letterspacing', array(
        'type' => 'number',
        'section' => 'body_typography',
        'label' => __( 'Letter Spacing', 'mtblog'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 30,
            'step' => 1,
        ),
    ));

    $wp_customize->add_setting('body_fontweight', array (
        'default' => 'normal',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'body_fontweight', array (
        'label' => __('Font Weight', 'mtblog'),
        'section' => 'body_typography',
        'type' => 'select',
        'choices' => array (
            'normal' => 'normal',
            '100' => '100',
            '200' => '200',
            '300' => '300',
            '400' => '400',
            '500' => '500',
            '600' => '600',
            '700' => '700',
            '800' => '800',
            '900' => '900',
        ),
    ));

    $wp_customize->add_setting('body_lineheight', array (
        'default' => '1.5',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'body_lineheight', array(
        'type' => 'number',
        'section' => 'body_typography',
        'label' => __( 'Line Height', 'mtblog'),
        'description' => __( 'Set Line Height', 'mtblog' ),
        'input_attrs' => array(
            'min' => 0,
            'max' => 30,
            'step' => 1,
        ),
    ));

    // Logo Typography Management
    $wp_customize->add_section('logo_typography', array (
        'title' => __('Logo', 'mtblog'),
        'description' => 'Typography Management for your website\'s Logo',
        'panel' => 'typography_mgt',
    ));

    $wp_customize->add_setting('logo_fontfamily', array (
        'transport' => 'refresh',
        'default' => 'Rubik',
        'sanitize' => 'custom_sanitize_fonts',
    ));
    $wp_customize->add_control( 'logo_fontfamily', array (
        'label' => __('Font Family', 'mtblog'),
        'section' => 'logo_typography',
        'type' => 'select',
        'choices' => $googleFonts,
    ));

    $wp_customize->add_setting('logo_fontsize', array (
        'default' => '38',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'logo_fontsize', array(
        'type' => 'number',
        'section' => 'logo_typography',
        'label' => __( 'Font Size', 'mtblog'),
        'description' => __( 'Set Font Size', 'mtblog' ),
        'input_attrs' => array(
            'min' => 0,
            'max' => 100,
            'step' => 1,
        ),
    ));

    $wp_customize->add_setting('logo_fontsize_unit', array (
        'default' => 'px',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'logo_fontsize_unit', array (
        'section' => 'logo_typography',
        'type' => 'radio',
        'choices' => array(
            'px' => 'px',
            'em' => 'em',
        ),
    ));

    $wp_customize->add_setting('logo_texttransform', array (
        'default' => 'none',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'logo_texttransform', array (
        'label' => __('Text Transform', 'mtblog'),
        'section' => 'logo_typography',
        'type' => 'select',
        'choices' => array (
            'none' => 'None',
            'uppercase' => 'UPPERCASE',
            'lowercase' => 'lowercase',
            'capitalize' => 'Capitalize'
        ),
    ));

    $wp_customize->add_setting('logo_alt_fontfamily', array (
        'default' => 'Arial',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'logo_alt_fontfamily', array (
        'label' => __('Alt Font Family', 'mtblog'),
        'section' => 'logo_typography',
        'type' => 'select',
        'choices' => $altFontFamily,
    ));

    $wp_customize->add_setting('logo_letterspacing', array (
        'default' => '1',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'logo_letterspacing', array(
        'type' => 'number',
        'section' => 'logo_typography',
        'label' => __( 'Letter Spacing', 'mtblog'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 30,
            'step' => 1,
        ),
    ));

    $wp_customize->add_setting('logo_fontweight', array (
        'default' => 'normal',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'logo_fontweight', array (
        'label' => __('Font Weight', 'mtblog'),
        'section' => 'logo_typography',
        'type' => 'select',
        'choices' => array (
            'normal' => 'normal',
            '100' => '100',
            '200' => '200',
            '300' => '300',
            '400' => '400',
            '500' => '500',
            '600' => '600',
            '700' => '700',
            '800' => '800',
            '900' => '900',
        ),
    ));

    $wp_customize->add_setting('logo_lineheight', array (
        'default' => 'normal',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'logo_lineheight', array(
        'type' => 'number',
        'section' => 'logo_typography',
        'label' => __( 'Line Height', 'mtblog'),
        'description' => __( 'Set Line Height', 'mtblog' ),
        'input_attrs' => array(
            'min' => 0,
            'max' => 30,
            'step' => 1,
        ),
    ));

    // Main Menu Typography Management
    $wp_customize->add_section('mainmenu_typography', array (
        'title' => __('Main Menu', 'mtblog'),
        'description' => 'Manage fonts for your website\'s Main Menu',
        'panel' => 'typography_mgt',
    ));

    $wp_customize->add_setting('mainmenu_fontfamily', array (
        'transport' => 'refresh',
        'default' => 'Rubik',
        'sanitize' => 'custom_sanitize_fonts',
    ));
    $wp_customize->add_control( 'mainmenu_fontfamily', array (
        'label' => __('Font Family', 'mtblog'),
        'section' => 'mainmenu_typography',
        'type' => 'select',
        'choices' => $googleFonts,
    ));

    $wp_customize->add_setting('mainmenu_fontsize', array (
        'default' => '14',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'mainmenu_fontsize', array(
        'type' => 'number',
        'section' => 'mainmenu_typography',
        'label' => __( 'Font Size', 'mtblog'),
        'description' => __( 'Set Font Size', 'mtblog' ),
        'input_attrs' => array(
            'min' => 0,
            'max' => 100,
            'step' => 1,
        ),
    ));

    $wp_customize->add_setting('mainmenu_fontsize_unit', array (
        'default' => 'px',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'mainmenu_fontsize_unit', array(
        'section' => 'mainmenu_typography',
        'type' => 'radio',
        'choices' => array(
            'px' => 'px',
            'em' => 'em',
        ),
    ));

    $wp_customize->add_setting('mainmenu_texttransform', array (
        'default' => 'none',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'mainmenu_texttransform', array (
        'label' => __('Text Transform', 'mtblog'),
        'section' => 'mainmenu_typography',
        'type' => 'select',
        'choices' => array (
            'none' => 'None',
            'uppercase' => 'UPPERCASE',
            'lowercase' => 'lowercase',
            'capitalize' => 'Capitalize'
        ),
    ));

    $wp_customize->add_setting('mainmenu_alt_fontfamily', array (
        'default' => 'Arial',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'mainmenu_alt_fontfamily', array (
        'label' => __('Alt Font Family', 'mtblog'),
        'section' => 'mainmenu_typography',
        'type' => 'select',
        'choices' => $altFontFamily,
    ));

    $wp_customize->add_setting('mainmenu_letterspacing', array (
        'default' => '2',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'mainmenu_letterspacing', array(
        'type' => 'number',
        'section' => 'mainmenu_typography',
        'label' => __( 'Letter Spacing', 'mtblog'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 30,
            'step' => 1,
        ),
    ));

    $wp_customize->add_setting('mainmenu_fontweight', array (
        'default' => 'normal',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'mainmenu_fontweight', array (
        'label' => __('Font Weight', 'mtblog'),
        'section' => 'mainmenu_typography',
        'type' => 'select',
        'choices' => array (
            'normal' => 'normal',
            '100' => '100',
            '200' => '200',
            '300' => '300',
            '400' => '400',
            '500' => '500',
            '600' => '600',
            '700' => '700',
            '800' => '800',
            '900' => '900',
        ),
    ));

    $wp_customize->add_setting('mainmenu_lineheight', array (
        'default' => '1',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'mainmenu_lineheight', array(
        'type' => 'number',
        'section' => 'mainmenu_typography',
        'label' => __( 'Line Height', 'mtblog'),
        'description' => __( 'Set Line Height', 'mtblog' ),
        'input_attrs' => array(
            'min' => 0,
            'max' => 30,
            'step' => 1,
        ),
    ));

    // Dropdown Menu Typography Management
    $wp_customize->add_section('dropdown_typography', array (
        'title' => __('Dropdown Menu', 'mtblog'),
        'description' => 'Manage fonts for your website\'s Dropdown Menus',
        'panel' => 'typography_mgt',
    ));
    $wp_customize->add_setting('dropdown_fontfamily', array (
        'default' => 'Rubik',
        'transport' => 'refresh',
        'sanitize' => 'custom_sanitize_fonts',
    ));
    $wp_customize->add_control( 'dropdown_fontfamily', array (
        'label' => __('Font Family', 'mtblog'),
        'section' => 'dropdown_typography',
        'type' => 'select',
        'choices' => $googleFonts,
    ));

    $wp_customize->add_setting('dropdown_fontsize', array (
        'default' => '14',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'dropdown_fontsize', array(
        'type' => 'number',
        'section' => 'dropdown_typography',
        'label' => __( 'Font Size', 'mtblog'),
        'description' => __( 'Set Font Size', 'mtblog' ),
        'input_attrs' => array(
            'min' => 0,
            'max' => 100,
            'step' => 1,
        ),
    ));

    $wp_customize->add_setting('dropdown_fontsize_unit', array (
        'default' => 'px',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'dropdown_fontsize_unit', array(
        'section' => 'dropdown_typography',
        'type' => 'radio',
        'choices' => array(
            'px' => 'px',
            'em' => 'em',
        ),
    ));

    $wp_customize->add_setting('dropdown_texttransform', array (
        'default' => 'none',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'dropdown_texttransform', array (
        'label' => __('Text Transform', 'mtblog'),
        'section' => 'dropdown_typography',
        'type' => 'select',
        'choices' => array (
            'none' => 'None',
            'uppercase' => 'UPPERCASE',
            'lowercase' => 'lowercase',
            'capitalize' => 'Capitalize'
        ),
    ));

    $wp_customize->add_setting('dropdown_alt_fontfamily', array (
        'default' => 'Arial',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'dropdown_alt_fontfamily', array (
        'label' => __('Alt Font Family', 'mtblog'),
        'section' => 'dropdown_typography',
        'type' => 'select',
        'choices' => $altFontFamily,
    ));

    $wp_customize->add_setting('dropdown_letterspacing', array (
        'default' => '2',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'dropdown_letterspacing', array(
        'type' => 'number',
        'section' => 'dropdown_typography',
        'label' => __( 'Letter Spacing', 'mtblog'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 30,
            'step' => 1,
        ),
    ));

    $wp_customize->add_setting('dropdown_fontweight', array (
        'default' => 'normal',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'dropdown_fontweight', array (
        'label' => __('Font Weight', 'mtblog'),
        'section' => 'dropdown_typography',
        'type' => 'select',
        'choices' => array (
            'normal' => 'Normal',
            '100' => '100',
            '200' => '200',
            '300' => '300',
            '400' => '400',
            '500' => '500',
            '600' => '600',
            '700' => '700',
            '800' => '800',
            '900' => '900',
        ),
    ));

    $wp_customize->add_setting('dropdown_lineheight', array (
        'default' => '1',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'dropdown_lineheight', array(
        'type' => 'number',
        'section' => 'dropdown_typography',
        'label' => __( 'Line Height', 'mtblog'),
        'description' => __( 'Set Line Height', 'mtblog' ),
        'input_attrs' => array(
            'min' => 0,
            'max' => 30,
            'step' => 1,
        ),
    ));

    // Entry Title Typography Management
    $wp_customize->add_section('entrytitle_typography', array (
        'title' => __('Entry Title', 'mtblog'),
        'description' => 'Manage fonts for your website\'s Body',
        'panel' => 'typography_mgt',
    ));
    $wp_customize->add_setting('entrytitle_fontfamily', array (
        'transport' => 'refresh',
        'default' => 'Rubik',
        'sanitize' => 'custom_sanitize_fonts',
    ));
    $wp_customize->add_control( 'entrytitle_fontfamily', array (
        'label' => __('Font Family', 'mtblog'),
        'section' => 'entrytitle_typography',
        'type' => 'select',
        'choices' => $googleFonts
    ));

    $wp_customize->add_setting('entrytitle_fontsize', array (
        'default' => '18',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'entrytitle_fontsize', array(
        'type' => 'number',
        'section' => 'entrytitle_typography',
        'label' => __( 'Font Size', 'mtblog'),
        'description' => __( 'Set Font Size', 'mtblog' ),
        'input_attrs' => array(
            'min' => 0,
            'max' => 100,
            'step' => 1,
        ),
    ));

    $wp_customize->add_setting('entrytitle_fontsize_unit', array (
        'default' => 'px',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'entrytitle_fontsize_unit', array(
        'section' => 'entrytitle_typography',
        'type' => 'radio',
        'choices' => array(
            'px' => 'px',
            'em' => 'em',
        ),
    ));

    $wp_customize->add_setting('entrytitle_texttransform', array (
        'default' => 'none',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'entrytitle_texttransform', array (
        'label' => __('Text Transform', 'mtblog'),
        'section' => 'entrytitle_typography',
        'type' => 'select',
        'choices' => array (
            'none' => 'None',
            'uppercase' => 'UPPERCASE',
            'lowercase' => 'lowercase',
            'capitalize' => 'Capitalize'
        ),
    ));

    $wp_customize->add_setting('entrytitle_alt_fontfamily', array (
        'default' => 'Arial',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'entrytitle_alt_fontfamily', array (
        'label' => __('Alt Font Family', 'mtblog'),
        'section' => 'entrytitle_typography',
        'type' => 'select',
        'choices' => $altFontFamily,
    ));

    $wp_customize->add_setting('entrytitle_letterspacing', array (
        'default' => '1',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'entrytitle_letterspacing', array(
        'type' => 'number',
        'section' => 'entrytitle_typography',
        'label' => __( 'Letter Spacing', 'mtblog'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 30,
            'step' => 1,
        ),
    ));

    $wp_customize->add_setting('entrytitle_fontweight', array (
        'default' => '600',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'entrytitle_fontweight', array (
        'label' => __('Font Weight', 'mtblog'),
        'section' => 'entrytitle_typography',
        'type' => 'select',
        'choices' => array (
            'normal' => 'normal',
            '100' => '100',
            '200' => '200',
            '300' => '300',
            '400' => '400',
            '500' => '500',
            '600' => '600',
            '700' => '700',
            '800' => '800',
            '900' => '900',
        ),
    ));

    $wp_customize->add_setting('entrytitle_lineheight', array (
        'default' => 'normal',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'entrytitle_lineheight', array(
        'type' => 'number',
        'section' => 'entrytitle_typography',
        'label' => __( 'Line Height', 'mtblog'),
        'description' => __( 'Set Line Height', 'mtblog' ),
        'input_attrs' => array(
            'min' => 0,
            'max' => 30,
            'step' => 1,
        ),
    ));

    // Single Post Title Typography Management
    $wp_customize->add_section('posttitle_typography', array (
        'title' => __('Single Post Title', 'mtblog'),
        'description' => 'Manage fonts for your website\'s Body',
        'panel' => 'typography_mgt',
    ));
    $wp_customize->add_setting('posttitle_fontfamily', array (
        'transport' => 'refresh',
        'default' => 'Rubik',
        'sanitize' => 'custom_sanitize_fonts',
    ));
    $wp_customize->add_control( 'posttitle_fontfamily', array (
        'label' => __('Font Family', 'mtblog'),
        'section' => 'posttitle_typography',
        'type' => 'select',
        'choices' => $googleFonts
    ));

    $wp_customize->add_setting('posttitle_fontsize', array (
        'default' => '30',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'posttitle_fontsize', array(
        'type' => 'number',
        'section' => 'posttitle_typography',
        'label' => __( 'Font Size', 'mtblog'),
        'description' => __( 'Set Font Size', 'mtblog' ),
        'input_attrs' => array(
            'min' => 0,
            'max' => 100,
            'step' => 1,
        ),
    ));

    $wp_customize->add_setting('posttitle_fontsize_unit', array (
        'default' => 'px',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'posttitle_fontsize_unit', array(
        'section' => 'posttitle_typography',
        'type' => 'radio',
        'choices' => array(
            'px' => 'px',
            'em' => 'em',
        ),
    ));

    $wp_customize->add_setting('posttitle_texttransform', array (
        'default' => 'none',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'posttitle_texttransform', array (
        'label' => __('Text Transform', 'mtblog'),
        'section' => 'posttitle_typography',
        'type' => 'select',
        'choices' => array (
            'none' => 'None',
            'uppercase' => 'UPPERCASE',
            'lowercase' => 'lowercase',
            'capitalize' => 'Capitalize'
        ),
    ));

    $wp_customize->add_setting('posttitle_alt_fontfamily', array (
        'default' => 'Arial',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'posttitle_alt_fontfamily', array (
        'label' => __('Alt Font Family', 'mtblog'),
        'section' => 'posttitle_typography',
        'type' => 'select',
        'choices' => $altFontFamily,
    ));

    $wp_customize->add_setting('posttitle_letterspacing', array (
        'default' => '1',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'posttitle_letterspacing', array(
        'type' => 'number',
        'section' => 'posttitle_typography',
        'label' => __( 'Letter Spacing', 'mtblog'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 30,
            'step' => 1,
        ),
    ));

    $wp_customize->add_setting('posttitle_fontweight', array (
        'default' => '600',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'posttitle_fontweight', array (
        'label' => __('Font Weight', 'mtblog'),
        'section' => 'posttitle_typography',
        'type' => 'select',
        'choices' => array (
            'Normal' => 'Normal',
            '100' => '100',
            '200' => '200',
            '300' => '300',
            '400' => '400',
            '500' => '500',
            '600' => '600',
            '700' => '700',
            '800' => '800',
            '900' => '900',
        ),
    ));

    $wp_customize->add_setting('posttitle_lineheight', array (
        'default' => 'normal',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'posttitle_lineheight', array(
        'type' => 'number',
        'section' => 'posttitle_typography',
        'label' => __( 'Line Height', 'mtblog'),
        'description' => __( 'Set Line Height', 'mtblog' ),
        'input_attrs' => array(
            'min' => 0,
            'max' => 30,
            'step' => 1,
        ),
    ));

    // Meta Typography Management
    $wp_customize->add_section('meta_typography', array (
        'title' => __('Meta', 'mtblog'),
        'description' => 'Manage fonts for your website\'s Body',
        'panel' => 'typography_mgt',
    ));
    $wp_customize->add_setting('meta_fontfamily', array (
        'transport' => 'refresh',
        'default' => 'Rubik',
        'sanitize' => 'custom_sanitize_fonts',
    ));
    $wp_customize->add_control( 'meta_fontfamily', array (
        'label' => __('Font Family', 'mtblog'),
        'section' => 'meta_typography',
        'type' => 'select',
        'choices' => $googleFonts
    ));

    $wp_customize->add_setting('meta_fontsize', array (
        'default' => '12',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'meta_fontsize', array(
        'type' => 'number',
        'section' => 'meta_typography',
        'label' => __( 'Font Size', 'mtblog'),
        'description' => __( 'Set Font Size', 'mtblog' ),
        'input_attrs' => array(
            'min' => 0,
            'max' => 100,
            'step' => 1,
        ),
    ));

    $wp_customize->add_setting('meta_fontsize_unit', array (
        'default' => 'px',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'meta_fontsize_unit', array(
        'section' => 'meta_typography',
        'type' => 'radio',
        'choices' => array(
            'px' => 'px',
            'em' => 'em',
        ),
    ));

    $wp_customize->add_setting('meta_texttransform', array (
        'default' => 'none',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'meta_texttransform', array (
        'label' => __('Text Transform', 'mtblog'),
        'section' => 'meta_typography',
        'type' => 'select',
        'choices' => array (
            'none' => 'None',
            'uppercase' => 'UPPERCASE',
            'lowercase' => 'lowercase',
            'capitalize' => 'Capitalize'
        ),
    ));

    $wp_customize->add_setting('meta_alt_fontfamily', array (
        'default' => 'Arial',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'meta_alt_fontfamily', array (
        'label' => __('Alt Font Family', 'mtblog'),
        'section' => 'meta_typography',
        'type' => 'select',
        'choices' => $altFontFamily,
    ));

    $wp_customize->add_setting('meta_letterspacing', array (
        'default' => '1',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'meta_letterspacing', array(
        'type' => 'number',
        'section' => 'meta_typography',
        'label' => __( 'Letter Spacing', 'mtblog'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 30,
            'step' => 1,
        ),
    ));


    $wp_customize->add_setting('meta_fontweight', array (
        'default' => 'normal',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'meta_fontweight', array (
        'label' => __('Font Weight', 'mtblog'),
        'section' => 'meta_typography',
        'type' => 'select',
        'choices' => array (
            'normal' => 'normal',
            '100' => '100',
            '200' => '200',
            '300' => '300',
            '400' => '400',
            '500' => '500',
            '600' => '600',
            '700' => '700',
            '800' => '800',
            '900' => '900',
        ),
    ));

    $wp_customize->add_setting('meta_lineheight', array (
        'default' => '1',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'meta_lineheight', array(
        'type' => 'number',
        'section' => 'meta_typography',
        'label' => __( 'Line Height', 'mtblog'),
        'description' => __( 'Set Line Height', 'mtblog' ),
        'input_attrs' => array(
            'min' => 0,
            'max' => 30,
            'step' => 1,
        ),
    ));

    // Widget Title Typography Management
    $wp_customize->add_section('widgettitle_typography', array (
        'title' => __('Widget Title', 'mtblog'),
        'description' => 'Manage fonts for your website\'s Body',
        'panel' => 'typography_mgt',
    ));
    $wp_customize->add_setting('widgettitle_fontfamily', array (
        'transport' => 'refresh',
        'default' => 'Rubik',
        'sanitize' => 'custom_sanitize_fonts',
    ));
    $wp_customize->add_control( 'widgettitle_fontfamily', array (
        'label' => __('Font Family', 'mtblog'),
        'section' => 'widgettitle_typography',
        'type' => 'select',
        'choices' => $googleFonts
    ));

    $wp_customize->add_setting('widgettitle_fontsize', array (
        'default' => '16',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'widgettitle_fontsize', array(
        'type' => 'number',
        'section' => 'widgettitle_typography',
        'label' => __( 'Font Size', 'mtblog'),
        'description' => __( 'Set Font Size', 'mtblog' ),
        'input_attrs' => array(
            'min' => 0,
            'max' => 100,
            'step' => 1,
        ),
    ));

    $wp_customize->add_setting('widgettitle_fontsize_unit', array (
        'default' => 'px',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'widgettitle_fontsize_unit', array(
        'section' => 'widgettitle_typography',
        'type' => 'radio',
        'choices' => array(
            'px' => 'px',
            'em' => 'em',
        ),
    ));

    $wp_customize->add_setting('widgettitle_texttransform', array (
        'default' => 'none',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'widgettitle_texttransform', array (
        'label' => __('Text Transform', 'mtblog'),
        'section' => 'widgettitle_typography',
        'type' => 'select',
        'choices' => array (
            'none' => 'None',
            'uppercase' => 'UPPERCASE',
            'lowercase' => 'lowercase',
            'capitalize' => 'Capitalize'
        ),
    ));

    $wp_customize->add_setting('widgettitle_alt_fontfamily', array (
        'default' => 'Arial',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'widgettitle_alt_fontfamily', array (
        'label' => __('Alt Font Family', 'mtblog'),
        'section' => 'widgettitle_typography',
        'type' => 'select',
        'choices' => $altFontFamily,
    ));

    $wp_customize->add_setting('widgettitle_letterspacing', array (
        'default' => '1',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'widgettitle_letterspacing', array(
        'type' => 'number',
        'section' => 'widgettitle_typography',
        'label' => __( 'Letter Spacing', 'mtblog'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 30,
            'step' => 1,
        ),
    ));

    $wp_customize->add_setting('widgettitle_fontweight', array (
        'default' => 'normal',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'widgettitle_fontweight', array (
        'label' => __('Font Weight', 'mtblog'),
        'section' => 'widgettitle_typography',
        'type' => 'select',
        'choices' => array (
            'normal' => 'normal',
            '100' => '100',
            '200' => '200',
            '300' => '300',
            '400' => '400',
            '500' => '500',
            '600' => '600',
            '700' => '700',
            '800' => '800',
            '900' => '900',
        ),
    ));

    $wp_customize->add_setting('widgettitle_lineheight', array (
        'default' => '1',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'widgettitle_lineheight', array(
        'type' => 'number',
        'section' => 'widgettitle_typography',
        'label' => __( 'Line Height', 'mtblog'),
        'description' => __( 'Set Line Height', 'mtblog' ),
        'input_attrs' => array(
            'min' => 0,
            'max' => 30,
            'step' => 1,
        ),
    ));

    // Footer Title Typography Management
    $wp_customize->add_section('footertitle_typography', array (
        'title' => __('Footer Title', 'mtblog'),
        'description' => 'Manage fonts for your website\'s Body',
        'panel' => 'typography_mgt',
    ));
    $wp_customize->add_setting('footertitle_fontfamily', array (
        'transport' => 'refresh',
        'default' => 'Rubik',
        'sanitize' => 'custom_sanitize_fonts',
    ));
    $wp_customize->add_control( 'footertitle_fontfamily', array (
        'label' => __('Font Family', 'mtblog'),
        'section' => 'footertitle_typography',
        'type' => 'select',
        'choices' => $googleFonts
    ));

    $wp_customize->add_setting('footertitle_fontsize', array (
        'default' => '16',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'footertitle_fontsize', array(
        'type' => 'number',
        'section' => 'footertitle_typography',
        'label' => __( 'Font Size', 'mtblog'),
        'description' => __( 'Set Font Size', 'mtblog' ),
        'input_attrs' => array(
            'min' => 0,
            'max' => 100,
            'step' => 1,
        ),
    ));

    $wp_customize->add_setting('footertitle_fontsize_unit', array (
        'default' => 'px',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'footertitle_fontsize_unit', array(
        'section' => 'footertitle_typography',
        'type' => 'radio',
        'choices' => array(
            'px' => 'px',
            'em' => 'em',
        ),
    ));

    $wp_customize->add_setting('footertitle_texttransform', array (
        'default' => 'none',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'footertitle_texttransform', array (
        'label' => __('Text Transform', 'mtblog'),
        'section' => 'footertitle_typography',
        'type' => 'select',
        'choices' => array (
            'none' => 'None',
            'uppercase' => 'UPPERCASE',
            'lowercase' => 'lowercase',
            'capitalize' => 'Capitalize'
        ),
    ));

    $wp_customize->add_setting('footertitle_alt_fontfamily', array (
        'default' => 'Arial',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'footertitle_alt_fontfamily', array (
        'label' => __('Alt Font Family', 'mtblog'),
        'section' => 'footertitle_typography',
        'type' => 'select',
        'choices' => $altFontFamily,
    ));

    $wp_customize->add_setting('footertitle_letterspacing', array (
        'default' => '1',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'footertitle_letterspacing', array(
        'type' => 'number',
        'section' => 'footertitle_typography',
        'label' => __( 'Letter Spacing', 'mtblog'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 30,
            'step' => 1,
        ),
    ));

    $wp_customize->add_setting('footertitle_fontweight', array (
        'default' => '600',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'footertitle_fontweight', array (
        'label' => __('Font Weight', 'mtblog'),
        'section' => 'footertitle_typography',
        'type' => 'select',
        'choices' => array (
            'Normal' => 'Normal',
            '100' => '100',
            '200' => '200',
            '300' => '300',
            '400' => '400',
            '500' => '500',
            '600' => '600',
            '700' => '700',
            '800' => '800',
            '900' => '900',
        ),
    ));

    $wp_customize->add_setting('footertitle_lineheight', array (
        'default' => '1',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'footertitle_lineheight', array(
        'type' => 'number',
        'section' => 'footertitle_typography',
        'label' => __( 'Line Height', 'mtblog'),
        'description' => __( 'Set Line Height', 'mtblog' ),
        'input_attrs' => array(
            'min' => 0,
            'max' => 30,
            'step' => 1,
        ),
    ));

    // Copyright Typography Management
    $wp_customize->add_section('copyright_typography', array (
        'title' => __('Copyright', 'mtblog'),
        'description' => 'Manage fonts for your website\'s Body',
        'panel' => 'typography_mgt',
    ));
    $wp_customize->add_setting('copyright_fontfamily', array (
        'transport' => 'refresh',
        'default' => 'Rubik',
        'sanitize' => 'custom_sanitize_fonts',
    ));
    $wp_customize->add_control( 'copyright_fontfamily', array (
        'label' => __('Font Family', 'mtblog'),
        'section' => 'copyright_typography',
        'type' => 'select',
        'choices' => $googleFonts
    ));

    $wp_customize->add_setting('copyright_fontsize', array (
        'default' => '12',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'copyright_fontsize', array(
        'type' => 'number',
        'section' => 'copyright_typography',
        'label' => __( 'Font Size', 'mtblog'),
        'description' => __( 'Set Font Size', 'mtblog' ),
        'input_attrs' => array(
            'min' => 0,
            'max' => 100,
            'step' => 1,
        ),
    ));

    $wp_customize->add_setting('copyright_fontsize_unit', array (
        'default' => 'px',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'copyright_fontsize_unit', array(
        'section' => 'copyright_typography',
        'type' => 'radio',
        'choices' => array(
            'px' => 'px',
            'em' => 'em',
        ),
    ));

    $wp_customize->add_setting('copyright_texttransform', array (
        'default' => 'none',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'copyright_texttransform', array (
        'label' => __('Text Transform', 'mtblog'),
        'section' => 'copyright_typography',
        'type' => 'select',
        'choices' => array (
            'none' => 'None',
            'uppercase' => 'UPPERCASE',
            'lowercase' => 'lowercase',
            'capitalize' => 'Capitalize'
        ),
    ));

    $wp_customize->add_setting('copyright_alt_fontfamily', array (
        'default' => 'Arial',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'copyright_alt_fontfamily', array (
        'label' => __('Alt Font Family', 'mtblog'),
        'section' => 'copyright_typography',
        'type' => 'select',
        'choices' => $altFontFamily,
    ));

    $wp_customize->add_setting('copyright_letterspacing', array (
        'default' => '1',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'copyright_letterspacing', array(
        'type' => 'number',
        'section' => 'copyright_typography',
        'label' => __( 'Letter Spacing', 'mtblog'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 30,
            'step' => 1,
        ),
    ));

    $wp_customize->add_setting('copyright_fontweight', array (
        'default' => 'normal',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'copyright_fontweight', array (
        'label' => __('Font Weight', 'mtblog'),
        'section' => 'copyright_typography',
        'type' => 'select',
        'choices' => array (
            'normal' => 'normal',
            '100' => '100',
            '200' => '200',
            '300' => '300',
            '400' => '400',
            '500' => '500',
            '600' => '600',
            '700' => '700',
            '800' => '800',
            '900' => '900',
        ),
    ));

    $wp_customize->add_setting('copyright_lineheight', array (
        'default' => '1',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'copyright_lineheight', array(
        'type' => 'number',
        'section' => 'copyright_typography',
        'label' => __( 'Line Height', 'mtblog'),
        'description' => __( 'Set Line Height', 'mtblog' ),
        'input_attrs' => array(
            'min' => 0,
            'max' => 30,
            'step' => 1,
        ),
    ));

    //
    // ─── LAYOUT MANAGEMENT ──────────────────────────────────────────────────────────
    //
    $wp_customize->add_panel('layout_mgt', array(
        'title' => __( 'Layout Management', 'mtblog' ),
    ));

    // Main Layout
    $wp_customize->add_section('main_layout', array (
        'title' => __('Main Layout', 'mtblog'),
        'description' => 'Manage Layout for your site.',
        'panel' => 'layout_mgt',
    ));

    $wp_customize->add_setting('main_layout', array (
        'default' => 'container',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'main_layout', array (
        'label' => __('Select Layout', 'mtblog'),
        'section' => 'main_layout',
        'type' => 'select',
        'choices' => array (
            'boxed' => 'Boxed',
            'container' => 'Full Width/Contained',
            'container-fluid' => 'Full Width/Stretched',
        ),
    ));
    // Boxed Background Color
    $wp_customize->add_setting('color_boxedbackground', array (
        'default' => '#fff',
        'transport'   => 'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'color_boxedbackground',
        array(
            'label'      => __( 'Background Color', 'mtblog' ),
            'section'    => 'main_layout',
        ) )
    );
    // Boxed Background Image
    $wp_customize->add_setting('boxed_bgimage', array (
        'default' => '',
        'transport'   => 'refresh',
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'boxed_bgimage',
            array(
                'label'      => __( 'Upload image', 'mtblog' ),
                'section'    => 'main_layout',
            )
        )
    );
    // Background Repeat
    $wp_customize->add_setting('boxed_bgrepeat', array (
        'default' => 'inherit',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'boxed_bgrepeat', array(
        'label' => __('Background Repeat', 'mtblog'),
        'section' => 'main_layout',
        'type' => 'select',
        'choices' => array(
            "inherit" => "Inherit",
            "no-repeat" => "No Repeat",
            "repeat" => "Repeat",
            "repeat-x" => "Repeat Horizontally",
            "repeat-y" => "Repeat Vertially",
        ),
    ));
    // Background Size
    $wp_customize->add_setting('boxed_bgsize', array (
        'default' => 'inherit',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'boxed_bgsize', array(
        'label' => __('Background Size', 'mtblog'),
        'section' => 'main_layout',
        'type' => 'select',
        'choices' => array(
            "inherit" => "Inherit",
            "cover" => "Cover",
            "contain" => "Contain",
        ),
    ));
    // Background Position
    $wp_customize->add_setting('boxed_bgposition', array (
        'default' => 'inherit',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'boxed_bgposition', array(
        'label' => __('Background Position', 'mtblog'),
        'section' => 'main_layout',
        'type' => 'select',
        'choices' => array(
            "inherit" => "Inherit",
            "cover" => "Left Top",
            "contain" => "Left Center",
            "left bottom" => "Left Bottom",
            "right top" => "Right Top",
            "right center" => "Right Center",
            "right bottom" => "Right Bottom",
            "center top" => "Center Top",
            "center center" => "Center Center",
            "center bottom" => "Center Bottom",
        ),
    ));
    // Background Attachment
    $wp_customize->add_setting('boxed_bgattachment', array (
        'default' => 'inherit',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'boxed_bgattachment', array(
        'label' => __('Background Attachement', 'mtblog'),
        'section' => 'main_layout',
        'type' => 'select',
        'choices' => array(
            "inherit" => "Inherit",
            "scroll" => "Scroll",
            "fixed" => "Fixed",
        ),
    ));

    // Sidebar Position
    $wp_customize->add_section('sidebar_position', array (
        'title' => __('Sidebar Position', 'mtblog'),
        'description' => 'Manage Sidebar Position for your site.',
        'panel' => 'layout_mgt',
    ));
    // Homepage Sidebar
    $wp_customize->add_setting('default_sidebar', array (
        'default' => 'none',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'default_sidebar', array (
        'label' => __('Default Sidebar Position', 'mtblog'),
        'section' => 'sidebar_position',
        'type' => 'select',
        'choices' => array (
            'right' => 'Right Sidebar',
            'left' => 'Left Sidebar',
            'none' => 'No Sidebar',
        ),
    ));

    // Single post sidebar
    $wp_customize->add_setting('singlepost_sidebar', array (
        'default' => 'right',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'singlepost_sidebar', array (
        'label' => __('Single Post Sidebar', 'mtblog'),
        'section' => 'sidebar_position',
        'type' => 'select',
        'choices' => array (
            'right' => 'Right Sidebar',
            'left' => 'Left Sidebar',
            'default' => 'Default',
        ),
    ));

    // Single page sidebar
    $wp_customize->add_setting('singlepage_sidebar', array (
        'default' => 'right',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'singlepage_sidebar', array (
        'label' => __('Single Page Sidebar', 'mtblog'),
        'section' => 'sidebar_position',
        'type' => 'select',
        'choices' => array (
            'right' => 'Right Sidebar',
            'left' => 'Left Sidebar',
            'default' => 'Default',
        ),
    ));

    // Archive sidebar
    $wp_customize->add_setting('archive_sidebar', array (
        'default' => 'default',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'archive_sidebar', array (
        'label' => __('Archive Sidebar', 'mtblog'),
        'section' => 'sidebar_position',
        'type' => 'select',
        'choices' => array (
            'right' => 'Right Sidebar',
            'left' => 'Left Sidebar',
            'default' => 'Default',
        ),
    ));

    /* Footer Options */
    $wp_customize->add_section('footer_options', array (
        'title' => __('Footer', 'mtblog'),
        'description' => 'Manage Footer Options for your site.',
        'panel' => 'layout_mgt',
    ));
    // Enable Footer
    $wp_customize->add_setting('enable_footer', array (
        'default' => false,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'enable_footer', array(
        'label' => __('Enable Footer', 'mtblog'),
        'section' => 'footer_options',
        'type' => 'checkbox',
    ));
    // Footer Layout
    $wp_customize->add_setting('footer_column', array (
        'default' => '3',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'footer_column', array (
        'label' => __('Footer Columns', 'mtblog'),
        'section' => 'footer_options',
        'type' => 'select',
        'choices' => array (
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
        ),
    ));

    
    // Footer Layout
    $wp_customize->add_setting('copyright_text', array (
        'default' => 'Copyright © 2019, MT Blog. by <a href="https://www.mightythemes.com" target="_blank">Mighty Themes</a>',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'copyright_text', array (
        'label' => __('Copyright Text', 'mtblog'),
        'section' => 'footer_options',
        'type' => 'textarea',
    ));

    //
    // ─── HEADER MANAGEMENT ──────────────────────────────────────────────────────────
    //
    $wp_customize->add_panel('header_mgt', array(
        'title' => __( 'Header Management', 'mtblog' ),
    ));

    // Header Style
    $wp_customize->add_section('header_style', array (
        'title' => __('Header Style', 'mtblog'),
        'description' => 'Manage Header Styles for your site.',
        'panel' => 'header_mgt',
    ));
    $wp_customize->add_setting('header_style', array (
        'default' => 'horizontal',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'header_style', array(
        'label' => __('Choose Header Style', 'mtblog'),
        'section' => 'header_style',
        'type' => 'radio',
        'choices' => array(
            'stacked' => 'Stacked Header',
            'horizontal' => 'Horizontal Header',
        ),
    ));
    // Header Tagline
    $wp_customize->add_setting('header_tagline', array (
        'default' => false,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'enable_header_tagline', array(
        'label' => __('Enable Tagline', 'mtblog'),
        'section' => 'header_style',
        'type' => 'checkbox',
    ));
    // Sticky Header
    $wp_customize->add_setting('sticky_header', array (
        'default' => false,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'sticky_header', array(
        'label' => __('Enable Sticky Header', 'mtblog'),
        'section' => 'header_style',
        'type' => 'checkbox',
    ));

    //
    // ─── AD MANAGEMENT ──────────────────────────────────────────────────────────────
    //
    $wp_customize->add_panel('ad_mgt', array(
        'title' => __( 'Advertisement Management', 'mtblog' ),
    ));

    // Enable/Disable Adverts
    $wp_customize->add_section('ad_appearance', array (
        'title' => __('Appearance', 'mtblog'),
        'description' => 'Enable/Disable Ads on your site.',
        'panel' => 'ad_mgt',
    ));

    $wp_customize->add_setting('ads_posts', array (
        'default' => false,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'ads_posts', array(
        'label' => __('Posts', 'mtblog'),
        'section' => 'ad_appearance',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('ads_pages', array (
        'default' => false,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'ads_pages', array(
        'label' => __('Pages', 'mtblog'),
        'section' => 'ad_appearance',
        'type' => 'checkbox',
    ));

    // Adverts on position
    $wp_customize->add_section('adverts_position', array (
        'title' => __('Assign Position', 'mtblog'),
        'description' => 'Code for showing ad in the specified position.',
        'panel' => 'ad_mgt',
    ));
    // Adverts on Beginning of Post/Page
    $wp_customize->add_setting('ad_code_post_begin', array (
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'ad_code_post_begin', array(
        'label' => __('Code of advert at the Beginning of Post/Page.', 'mtblog'),
        'section' => 'adverts_position',
        'type' => 'textarea',
    ));
    // Adverts on Middle of Post/Page
    $wp_customize->add_setting('ad_code_post_middle', array (
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'ad_code_post_middle', array(
        'label' => __('Code of advert at the Middle of Post/Page.', 'mtblog'),
        'section' => 'adverts_position',
        'type' => 'textarea',
    ));
    // Adverts on End of Post/Page
    $wp_customize->add_setting('ad_code_post_end', array (
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'ad_code_post_end', array(
        'label' => __('Code of advert at the End of Post/Page.', 'mtblog'),
        'section' => 'adverts_position',
        'type' => 'textarea',
    ));
    // Adverts on Right before the last paragraph
    $wp_customize->add_setting('ad_before_last_paragraph', array (
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'ad_before_last_paragraph', array(
        'label' => __('Code of advert before the last paragraph.', 'mtblog'),
        'section' => 'adverts_position',
        'type' => 'textarea',
    ));
    // Adverts on [number] paragraph
    $wp_customize->add_setting('paragraph_number', array (
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'paragraph_number', array(
        'label' => __('Paragraph Number', 'mtblog'),
        'section' => 'adverts_position',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 200,
            'step' => 1,
        ),
    ));

    $wp_customize->add_setting('ad_after_numbered_paragraph', array (
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'ad_after_numbered_paragraph', array(
        'label' => __('Code of advert after the [number] paragraph.', 'mtblog'),
        'section' => 'adverts_position',
        'type' => 'textarea',
    ));

    //
    // ─── MISCELLANEOUS ──────────────────────────────────────────────────────────────
    //
    $wp_customize->add_panel('misc', array(
        'title' => __( 'Miscellaneous', 'mtblog' ),
    ));

    /* Pagination */
    $wp_customize->add_section('pagination', array (
        'title' => __('Pagination', 'mtblog'),
        'panel' => 'misc',
    ));
    $wp_customize->add_setting('pagination_type', array (
        'default' => 'numbered',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'pagination_type', array(
        'label' => __('Pagination Type', 'mtblog'),
        'section' => 'pagination',
        'description' => 'Enable Pagination type (Infinite Scroll requires Jetpack Integration)',
        'type' => 'select',
        'choices' => array(
            'prev-next' => 'Prev/Next',
            'infinite-scroll' => 'Infinite Scroll',
            'numbered' => 'Numbered'
        )
    ));

    /* Single Post */
    $wp_customize->add_section('single_post', array (
        'title' => __('Single Post', 'mtblog'),
        'panel' => 'misc',
    ));
    // Enable/Disable Single Post
    $wp_customize->add_setting('related_post_enable', array (
        'default' => false,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'related_post_enable', array(
        'label' => __('Enable Related Posts', 'mtblog'),
        'section' => 'single_post',
        'type' => 'checkbox',
    ));
    
    // Related posts by control
    $wp_customize->add_setting('related_post_by', array (
        'default' => 'categories',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'related_post_by', array(
        'label' => __('Related Posts By', 'mtblog'),
        'section' => 'single_post',
        'type' => 'select',
        'choices' => array(
            'categories' => 'Categories',
            'tags' => 'Tags',
        )
    ));
    // Related posts count control
    $wp_customize->add_setting('related_post_count', array (
        'default' => '3',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'related_post_count', array(
        'label' => __('Related Posts Count', 'mtblog'),
        'section' => 'single_post',
        'type' => 'number',
    ));

    // Enable/Disable Social Share Icon
    $wp_customize->add_setting('social_share_enable', array (
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'social_share_enable', array(
        'label' => __('Enable Social Share Icons', 'mtblog'),
        'section' => 'single_post',
        'type' => 'checkbox',
    ));
    
    // Post-meta options
    $wp_customize->add_setting('show_author', array (
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'show_author', array(
        'label' => __('Show Author', 'mtblog'),
        'section' => 'single_post',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('show_tags', array (
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'show_tags', array(
        'label' => __('Show Tags', 'mtblog'),
        'section' => 'single_post',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('show_category', array (
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'show_category', array(
        'label' => __('Show Categories', 'mtblog'),
        'section' => 'single_post',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('show_comments', array (
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'show_comments', array(
        'label' => __('Show Comments', 'mtblog'),
        'section' => 'single_post',
        'type' => 'checkbox',
    ));

    // Breadcrumbs
    $wp_customize->add_setting('show_breadcrumbs', array (
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'show_breadcrumbs', array(
        'label' => __('Enable Breadcrumbs', 'mtblog'),
        'section' => 'single_post',
        'type' => 'checkbox'
    ));

    $wp_customize->add_setting('show_readtime', array (
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'show_readtime', array(
        'label' => __('Enable Estimated Read Time', 'mtblog'),
        'section' => 'single_post',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('show_authorinfobox', array (
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'show_authorinfobox', array(
        'label' => __('Enable Author Info Box', 'mtblog'),
        'section' => 'single_post',
        'type' => 'checkbox',
    ));

    /* Archive */
    $wp_customize->add_section('archive', array (
        'title' => __('Archive', 'mtblog'),
        'description' => '',
        'panel' => 'misc',
    ));

    $wp_customize->add_setting('estimated_read_time_archive', array (
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'estimated_read_time_archive', array(
        'label' => __('Show Read Time', 'mtblog'),
        'section' => 'archive',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('show_author_archive', array (
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'show_author_archive', array(
        'label' => __('Show Author', 'mtblog'),
        'section' => 'archive',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('show_category_archive', array (
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'show_category_archive', array(
        'label' => __('Show Categories', 'mtblog'),
        'section' => 'archive',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('show_date_archive', array (
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'show_date_archive', array(
        'label' => __('Show Date', 'mtblog'),
        'section' => 'archive',
        'type' => 'checkbox',
    ));

    // Home Content
    /*$wp_customize->add_setting('home_content', array (
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'home_content', array(
        'label' => __('Home Content', 'mtblog'),
        'section' => 'archive',
        'type' => 'radio',
        'choices' => array(
            'excerpt' => 'Excerpt',
            'full_content' => 'Full Content',
        )
    ));
    // Excerpt length (when enabled)
    $wp_customize->add_setting('excerpt_length', array (
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'excerpt_length', array(
        'label' => __('Excerpt Length', 'mtblog'),
        'section' => 'archive',
        'type' => 'text',
    ));

    // Enable Read more
    $wp_customize->add_setting('enable_read_more', array (
        'default' => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'enable_read_more', array(
        'label' => __('Enable Read More', 'mtblog'),
        'section' => 'archive',
        'type' => 'checkbox',
    ));
    // Read more text
    $wp_customize->add_setting('read_more_text', array (
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'read_more_text', array(
        'label' => __('Read More Text', 'mtblog'),
        'section' => 'archive',
        'type' => 'text',
    ));
    */
    /* 404 Error Page */
    $wp_customize->add_section('404_error_page', array (
        'title' => __('404 Error Page', 'mtblog'),
        'description' => '',
        'panel' => 'misc',
    ));

    $wp_customize->add_setting('404_page_content', array (
        'default' => '404',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( '404_page_content', array(
        'label' => __('404 Page Content', 'mtblog'),
        'section' => '404_error_page',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('calltoaction', array (
        'default' => 'Back to Home',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'calltoaction', array(
        'label' => __('Call To Action', 'mtblog'),
        'section' => '404_error_page',
        'type' => 'text'
    ));

    //
    // ─── SOCIAL PROFILES ────────────────────────────────────────────────────────────
    //

    // Social Profiles Section
    $wp_customize->add_section( 'social_profiles', array(
        'title' => __('Social Profiles', 'mtblog'),
        'description' => '',
    ));

    // Social Profiles Controls
    $wp_customize->add_setting('facebook', array (
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'facebook', array(
        'label' => __('Facebook', 'mtblog'),
        'section' => 'social_profiles',
        'type' => 'text'
    ));
    $wp_customize->add_setting('twitter', array (
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'twitter', array(
        'label' => __('Twitter', 'mtblog'),
        'section' => 'social_profiles',
        'type' => 'text'
    ));
    $wp_customize->add_setting('instagram', array (
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'instagram', array(
        'label' => __('Instagram', 'mtblog'),
        'section' => 'social_profiles',
        'type' => 'text'
    ));
    $wp_customize->add_setting('youtube', array (
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'youtube', array(
        'label' => __('YouTube', 'mtblog'),
        'section' => 'social_profiles',
        'type' => 'text'
    ));
    $wp_customize->add_setting('linkedin', array (
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'linkedin', array(
        'label' => __('LinkedIn', 'mtblog'),
        'section' => 'social_profiles',
        'type' => 'text'
    ));
    $wp_customize->add_setting('spotify', array (
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'spotify', array(
        'label' => __('Spotify', 'mtblog'),
        'section' => 'social_profiles',
        'type' => 'text'
    ));
    $wp_customize->add_setting('messenger', array (
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'messenger', array(
        'label' => __('Messenger', 'mtblog'),
        'section' => 'social_profiles',
        'type' => 'text'
    ));
    $wp_customize->add_setting('github', array (
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'github', array(
        'label' => __('GitHub', 'mtblog'),
        'section' => 'social_profiles',
        'type' => 'text'
    ));
    $wp_customize->add_setting('whatsapp', array (
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'whatsapp', array(
        'label' => __('WhatsApp', 'mtblog'),
        'section' => 'social_profiles',
        'type' => 'text'
    ));
    $wp_customize->add_setting('telegram', array (
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'telegram', array(
        'label' => __('Telegram', 'mtblog'),
        'section' => 'social_profiles',
        'type' => 'text'
    ));

    //
    // ─── CUSTOM CODE ────────────────────────────────────────────────────────────
    //
    // Custom Code Section
    $wp_customize->add_section( 'custom_code', array(
        'title' => __('Custom Code', 'mtblog'),
        'description' => '',
    ));

    // Custom Code Controls
    $wp_customize->add_setting('tracking_code', array (
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'tracking_code', array(
        'label' => __('Tracking Code', 'mtblog'),
        'section' => 'custom_code',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('space_before_head', array (
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'space_before_head', array(
        'label' => __('Space Before </head>', 'mtblog'),
        'section' => 'custom_code',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('space_before_body', array (
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( 'space_before_body', array(
        'label' => __('Space Before </body>', 'mtblog'),
        'section' => 'custom_code',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'mtblog_customize_register');

//
// ─── WIDGET CONTROLS ────────────────────────────────────────────────────────────
//
/* Register widget area for footer. */
function mtblog_widgets_init() {
    // Widgets for footer area
    $mtblog_footer_columns = get_theme_mod('footer_column', '4');
    for ( $i = 1; $i <= $mtblog_footer_columns; $i++ ) {
        register_sidebar(
            array(
                'name'          => sprintf( esc_html__('Footer %s', 'mtblog'), $i ),
                'id'            => 'footer-widget-' . $i,
                'description'   => __( 'Add widgets here to display in footer.', 'mtblog' ),
                'before_widget' => '<div class="">',
                'after_widget'  => '</div>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );
    }
    
    // Widgets for right sidebar
    register_sidebar(
		array(
			'name'          => __( 'Sidebar Right', 'mtblog' ),
			'id'            => 'sidebar-right',
			'description'   => __( 'Add widgets here to appear in right sidebar.', 'mtblog' ),
			'before_widget' => '<section class="widget"><div class="widget-content"><div class="widget-content-inner">',
			'after_widget'  => '</div></div></section>',
			'before_title'  => '<div class="sidebar-heading-wrapper"><h4 class="widget-title sidebar-heading">',
			'after_title'   => '</h4></div>',
		)
    );
    
    // Widgets for left sidebar
    register_sidebar(
		array(
			'name'          => __( 'Sidebar Left', 'mtblog' ),
			'id'            => 'sidebar-left',
			'description'   => __( 'Add widgets here to appear in right sidebar.', 'mtblog' ),
			'before_widget' => '<section class="widget"><div class="widget-content"><div class="widget-content-inner">',
			'after_widget'  => '</div></div></section>',
			'before_title'  => '<div class="sidebar-heading-wrapper"><h4 class="widget-title sidebar-heading">',
			'after_title'   => '</h4></div>',
		)
	);
}
add_action( 'widgets_init', 'mtblog_widgets_init' );


//
// ─── LIVE PREVIEW WITH INSTANTNEOUS CHANGES ─────────────────────────────────────
//
function mtblog_preview_customizer() {
	wp_enqueue_script('mtblog_preview_customizer', get_template_directory_uri() . '/inc/customizer/js/customizer.js', array( 'jquery','customize-preview' ), '', true	);
}
add_action( 'customize_preview_init', 'mtblog_preview_customizer' );

//
// ─── CONTROLS MANIPULATION ON CONDITIONS ────────────────────────────────────────
//
function mtblog_panels_js() {
	wp_enqueue_script( 'mtblog-customize-controls', get_theme_file_uri( '/inc/customizer/js/customize-controls.js' ), array(), '20181231', true );
}
add_action( 'customize_controls_enqueue_scripts', 'mtblog_panels_js' );

//
// ─── FONT FAMILY OF ELEMENTS ────────────────────────────────────────────────────
//
function add_font_styles()
{
    /* Body Font */
    $body_font = esc_html( get_theme_mod( 'body_fontfamily' ) );
    if ( $body_font ) {
        wp_enqueue_style( 'body-font', '//fonts.googleapis.com/css?family=' . $body_font );
    }

    /* Logo Font */
    $logo_font = esc_html( get_theme_mod( 'logo_fontfamily' ) );
    if ( $logo_font ) {
        wp_enqueue_style( 'logo-font', '//fonts.googleapis.com/css?family=' . $logo_font );
    }

    /* MainMenu Font */
    $mainmenu_font = esc_html( get_theme_mod( 'mainmenu_fontfamily' ) );
    if ( $mainmenu_font ) {
        wp_enqueue_style( 'mainmenu-font', '//fonts.googleapis.com/css?family=' . $mainmenu_font );
    }

    /* Entry Title Font */
    $entrytitle_font = esc_html( get_theme_mod( 'entrytitle_fontfamily' ) );
    if ( $entrytitle_font ) {
        wp_enqueue_style( 'entrytitle-font', '//fonts.googleapis.com/css?family=' . $entrytitle_font );
    }

    /* Single Post Title Font */
    $posttitle_font = esc_html( get_theme_mod( 'posttitle_fontfamily' ) );
    if ( $posttitle_font ) {
        wp_enqueue_style( 'posttitle-font', '//fonts.googleapis.com/css?family=' . $posttitle_font );
    }

    /* Meta Font */
    $meta_font = esc_html( get_theme_mod( 'meta_fontfamily' ) );
    if ( $meta_font ) {
        wp_enqueue_style( 'meta-font', '//fonts.googleapis.com/css?family=' . $meta_font );
    }

    /* Footer Font */
    $footertitle_font = esc_html( get_theme_mod( 'footertitle_fontfamily' ) );
    if ( $footertitle_font ) {
        wp_enqueue_style( 'footertitle-font', '//fonts.googleapis.com/css?family=' . $footertitle_font );
    }

    /* Copyright Font */
    $copyright_font = esc_html( get_theme_mod( 'copyright_fontfamily' ) );
    if ( $copyright_font ) {
        wp_enqueue_style( 'copyright-font', '//fonts.googleapis.com/css?family=' . $copyright_font );
    }

    /* Widget Title Font */
    $widgettitle_font = esc_html( get_theme_mod( 'widgettitle_fontfamily' ) );
    if ( $widgettitle_font ) {
        wp_enqueue_style( 'widgettitle-font', '//fonts.googleapis.com/css?family=' . $widgettitle_font );
    }

    /* Dropdown Font */
    $dropdown_font = esc_html( get_theme_mod( 'dropdown_fontfamily' ) );
    if ( $dropdown_font ) {
        wp_enqueue_style( 'dropdown-font', '//fonts.googleapis.com/css?family=' . $dropdown_font );
    }

}
add_action('wp_enqueue_scripts', 'add_font_styles');

//
// ─── PAGINATION ─────────────────────────────────────────────────────────────────
//
if (get_theme_mod('pagination_type', 'numbered') == 'prev-next') {
    function my_post_queries( $query ) {
        // do not alter the query on wp-admin pages and only alter it if it's the main query
        if (!is_admin() && $query->is_main_query()){

            // alter the query for the home and category pages
            if(is_home()){
                $query->set('posts_per_page', 7);
            }

            if(is_category()){
                $query->set('posts_per_page', 7);
            }
        }
    }
    add_action( 'pre_get_posts', 'my_post_queries' );
}

if ( ! function_exists( 'mtblog_pagination' ) ) :
    /**
     * Display navigation to next/previous set of posts when applicable.
     *
     */
    function mtblog_pagination() {
        
        if ( get_theme_mod( 'pagination_type', 'numbered' ) == 'numbered') {
            ?>
            <div class="d-flex justify-content-center">
                <?php
                if ( is_rtl() ) {
                    the_posts_pagination( array(
                        'mid_size'  => 1,
                        'prev_text' => '< ' . esc_html__( 'Previous', 'mtblog' ),
                        'next_text' => esc_html__( 'Next', 'mtblog' ).' >',
                    ) );
                } else {
                    the_posts_pagination( array(
                        'mid_size'  => 1,
                        'prev_text' => '< ' . esc_html__( 'Previous', 'mtblog' ),
                        'next_text' => esc_html__( 'Next', 'mtblog' ).' >',
                    ) );
                }
                ?>
            </div>
        <?php
        }
        elseif( get_theme_mod('pagination_type', 'numbered') == 'prev-next' ) {
        
            if ( have_posts() ) { ?>
                <div class="col-12">
                    <div class="d-flex justify-content-between">                        
                        <?php
                            previous_posts_link("< Previous Posts");
                            next_posts_link("More Posts >");
                        ?>
                    </div>
                </div>
    <?php
            }
        }        
    }
endif;
?>
