<?php
// Do not allow direct access to the file.
if(  ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Theme Customizer
 *
 */
	/******************************
		* Shadows Sanitize
	******************************/
	function atmospheres_array_shadows() {
		$array = array(
		'' => esc_attr__( 'None', 'atmospheres' ),		
		'back' => esc_attr__( 'Default', 'atmospheres' ),		
		'back1' => esc_attr__( 'Shadow 1', 'atmospheres' ),
		'back2' => esc_attr__( 'Shadow 2', 'atmospheres' ),
		'back3' => esc_attr__( 'Shadow 3', 'atmospheres' ),
		'back4' => esc_attr__( 'Shadow 4', 'atmospheres' ),
		'back5' => esc_attr__( 'Shadow 5', 'atmospheres' ),
		'back6' => esc_attr__( 'Shadow 6', 'atmospheres' ),
		'back7' => esc_attr__( 'Shadow 7', 'atmospheres' ),
		'back8' => esc_attr__( 'Shadow 8', 'atmospheres' ),
		'back9' => esc_attr__( 'Shadow 9', 'atmospheres' ),
		'back10' => esc_attr__( 'Shadow 10', 'atmospheres' ),
		'back11' => esc_attr__( 'Shadow 11', 'atmospheres' ),
		'back12' => esc_attr__( 'Shadow 12', 'atmospheres' ),
		'back13' => esc_attr__( 'Shadow 13', 'atmospheres' ),
		'back14' => esc_attr__( 'Shadow 14', 'atmospheres' ),
		'back15' => esc_attr__( 'Shadow 15', 'atmospheres' ),
		'back16' => esc_attr__( 'Shadow 16', 'atmospheres' ),
		'back17' => esc_attr__( 'Shadow 17', 'atmospheres' )
		);
		return $array;
	}
	function atmospheres_sanitize_shadows( $input ) {
		$valid = atmospheres_array_shadows();
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
			} else {
			return '';
		}
	}
	
	function atmospheres_array_header_shadows() {
		$array = array(
		'' => esc_attr__( 'None', 'atmospheres' ),		
		'0.1' => esc_attr__( 'Shadow 1', 'atmospheres' ),
		'0.2' => esc_attr__( 'Shadow 2', 'atmospheres' ),
		'0.3' => esc_attr__( 'Shadow 3', 'atmospheres' ),
		'0.4' => esc_attr__( 'Shadow 4', 'atmospheres' ),
		'0.5' => esc_attr__( 'Shadow 5', 'atmospheres' ),
		'0.6' => esc_attr__( 'Shadow 6', 'atmospheres' ),
		'0.7' => esc_attr__( 'Shadow 7', 'atmospheres' ),
		'0.8' => esc_attr__( 'Shadow 8', 'atmospheres' ),
		'0.9' => esc_attr__( 'Shadow 9', 'atmospheres' ),
		);
		return $array;
	}
	function atmospheres_sanitize_header_shadows( $input ) {
		$valid = atmospheres_array_header_shadows();
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
			} else {
			return '';
		}
	}		

 
add_action( 'customize_register', 'atmospheres__customize_register' );
function atmospheres__customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'atmospheres__customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'atmospheres__customize_partial_blogdescription',
		) );
	}
  	    $wp_customize->add_setting( 'background_color', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
			'label'    => __( 'Background Color ', 'atmospheres' ),
			'section'  => 'atmospheres',
			'settings' => 'background_color',
		) ) );
/**
 * Sanitize Functions
 */
	function atmospheres__sanitize_checkbox( $input ) {
		if ( $input ) {
			return 1;
		}
		return 0;
	}
	function atmospheres__header_sanitize_position( $input ) {
		$valid = array(
			'center' => esc_attr__( 'center center', 'atmospheres' ),
			'real' => esc_attr__( 'Real Size (Deactivate the image height.)', 'atmospheres' ),
		);
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}
	function atmospheres__header_sanitize_show( $input ) {
		$valid = array(
				'home' => esc_attr__( 'Home Page', 'atmospheres' ),
				'all' => esc_attr__( 'All Pages', 'atmospheres' ),
		);
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}	
/**
 * Header Image
 */
   	    $wp_customize->add_setting( 'body_background', array (
			'sanitize_callback' => 'sanitize_hex_color',
			) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_background', array(
			'label'    => __( 'Body Background Color', 'atmospheres' ),
			'priority' => 14,
			'section'  => 'colors',
			'settings' => 'body_background',
		) ) );
 		$wp_customize->add_setting( 'header_image_show', array (
			'sanitize_callback' => 'atmospheres__header_sanitize_show',
			'default' => 'home'
			) );
			
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_image_show', array(
			'label'    => __( 'Activate Header Image', 'atmospheres' ),
			'section'  => 'header_image',		
			'settings' => 'header_image_show',
			'type'     =>  'select',
			'priority'    => 1,			
            'choices'  => array(
				'home' => esc_attr__( 'Home Page', 'atmospheres' ),
				'all' => esc_attr__( 'All Pages', 'atmospheres' ),
            ),
			'default'  => 'home'	
		) ) );
		
		$wp_customize->add_setting( 'atmospheres__header_zoom', array (		
			'sanitize_callback' => 'atmospheres__sanitize_checkbox',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'atmospheres__header_zoom', array(
			'label'    => __( 'Dectivate Image Zoom:', 'atmospheres' ),
			'section'  => 'header_image',
			'priority'    => 3,				
			'settings' => 'atmospheres__header_zoom',
			'type' => 'checkbox',
		) ) );

		$wp_customize->add_setting( 'atmospheres_text_shadow', array (
            'default' => "",		
			'sanitize_callback' => 'atmospheres__sanitize_checkbox',
		) );
		$wp_customize->add_setting( 'atmospheres_header_single', array (		
			'sanitize_callback' => 'atmospheres__sanitize_checkbox',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'atmospheres_header_single', array(
			'label'    => __( 'Activate Single Page Title like Site Title', 'atmospheres' ),
			'section'  => 'header_image',
			'priority'    => 3,				
			'settings' => 'atmospheres_header_single',
			'type' => 'checkbox',
		) ) );		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'atmospheres_text_shadow', array(
			'label'    => __( 'Activate Header Text Shadow:', 'atmospheres' ),
			'section'  => 'header_image',
			'priority'    => 3,				
			'settings' => 'atmospheres_text_shadow',
			'type' => 'checkbox',
		) ) );
		
		$wp_customize->add_setting( 'atmospheres__header_animation', array (
            'default' => '',		
			'sanitize_callback' => 'atmospheres__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'atmospheres__header_animation', array(
			'label'    => __( 'Dectivate Text Animation:', 'atmospheres' ),
			'section'  => 'header_image',
			'priority'    => 3,				
			'settings' => 'atmospheres__header_animation',
			'type' => 'checkbox',
		) ) );
		
		
		$wp_customize->add_setting( 'video_upload', array (	
			'transport' => 'refresh',
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'video_upload', array(
			'label'    => __( 'Upload MP4 Video in Header:', 'atmospheres' ),
			'description'    => __( 'If you upload a video instead of a header image, all header image options will be disabled. Also the video will take priority and if you have a header image it will not be visible. The video size is be default and video is muted.', 'atmospheres' ),
			'section'  => 'header_image',
			'priority'    => 3,				
			'settings' => 'video_upload',
			'mime_type' => 'video',
			
		) ) );		
		
		$wp_customize->add_setting( 'atmospheres_loop', array (
            'default' => true,		
			'sanitize_callback' => 'atmospheres__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'atmospheres_loop', array(
			'label'    => __( 'Activate Video Loop', 'atmospheres' ),
			'section'  => 'header_image',
			'priority'    => 3,				
			'settings' => 'atmospheres_loop',
			'type' => 'checkbox',
		) ) );
		
		$wp_customize->add_setting( 'header_image_height', array (
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_image_height', array(
			'section'  => 'header_image',
			'priority'    => 1,
			'settings' => 'header_image_height',
			'label'       => __( 'Image Height', 'atmospheres' ),			
			'type'     =>  'number',
			'input_attrs'     => array(
				'min'  => 350,
				'max'  => 1000,
				'step' => 1,
			),
		) ) );
		$wp_customize->add_setting( 'header_image_position', array (
			'sanitize_callback' => 'atmospheres__header_sanitize_position',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_image_position', array(
			'label'    => __( 'Image Position', 'atmospheres' ),
			'section'  => 'header_image',		
			'settings' => 'header_image_position',
			'type'     =>  'select',
			'priority'    => 2,			
            'choices'  => array(
				'center' => esc_attr__( 'Background Cover (center center)', 'atmospheres' ),
				'real' => esc_attr__( 'Real Size (Deactivate the image height.)', 'atmospheres' ),
            ),
			'default'  => 'real'	
		) ) );
		
		$wp_customize->add_setting( 'atmospheres_header_squares', array (
		'sanitize_callback' => 'atmospheres_sanitize_shadows',
		'default' => '',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'atmospheres_header_squares', array(
		'label'    => __( 'Header Image Overlay', 'atmospheres' ),
		'settings' => 'atmospheres_header_squares',
		'section'  => 'header_image',
		'priority'    => 3,
		'type'     =>  'select',
		'choices'  => atmospheres_array_shadows(),		
		) ) );		

		$wp_customize->add_setting( 'atmospheres_header_shadow', array (
		'sanitize_callback' => 'atmospheres_sanitize_header_shadows',
		'default' => '0.5',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'atmospheres_header_shadow', array(
		'label'    => __( 'Header Image Shadow', 'atmospheres' ),
		'settings' => 'atmospheres_header_shadow',
		'section'  => 'header_image',
		'priority'    => 3,
		'type'     =>  'select',
		'choices'  => atmospheres_array_header_shadows(),		
		) ) );		


		$wp_customize->selective_refresh->add_partial( 'description_1', array(
			'selector' => '.des_1',
			'render_callback' => 'atmospheres_customize_partial_atmospheres_description_1',
	    ) );	

		$wp_customize->selective_refresh->add_partial( 'description_2', array(
			'selector' => '.des_2',
			'render_callback' => 'atmospheres_customize_partial_atmospheres_description_2',
	    ) );	
		
		$wp_customize->selective_refresh->add_partial( 'description_3', array(
			'selector' => '.des_3',
			'render_callback' => 'atmospheres_customize_partial_atmospheres_description_3',
	    ) );	

		$wp_customize->add_setting( 'logo_width', array(
		    'sanitize_callback' => 'absint',
			'default' => 200
		) );
		$wp_customize->add_control( new WP_Customize_Range_Control( $wp_customize, 'logo_width', array(
			'type' => 'range',
			'priority' => 9,
			'section' => 'title_tagline',
			'label'       => __( 'Logo Custom Width in px ', 'atmospheres' ),
			'input_attrs' => array(
				'min'  => 20,
				'max'  => 300,
				'step' => 1,
			),
		) ) );
		
		$wp_customize->add_setting( 'site_branding_center', array (
            'default' => '',		
			'sanitize_callback' => 'atmospheres__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'site_branding_center', array(
			'label'    => __( 'Site Title and Tagline Align Center', 'atmospheres' ),
			'section'  => 'title_tagline',
			'priority'    => 13,				
			'settings' => 'site_branding_center',
			'type' => 'checkbox',
		) ) );
		
		$wp_customize->add_setting( 'title_margin', array (
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_margin', array(
			'section'  => 'title_tagline',
			'priority'    => 10,
			'settings' => 'title_margin',
			'label'       => __( 'Site Title and Tagline - Margin Top in %', 'atmospheres' ),			
			'type'     =>  'number',
			'input_attrs'     => array(
				'min'  => 30,
				'max'  => 90,
				'step' => 1,
			),
		) ) );		
		
		
}
/**
 * Custom Font Size Styles
 */ 	
add_action( 'wp_enqueue_scripts', 'atmospheres__header_position' );	
function atmospheres__header_position() {
        $header_image_height = esc_html(get_theme_mod( 'header_image_height' ) );
        $header_image_position = esc_html(get_theme_mod( 'header_image_position' ) );
        $atmospheres_parralax = esc_html(get_theme_mod( 'atmospheres_parralax' ) );
        $atmospheres_header_squares = esc_html(get_theme_mod( 'atmospheres_header_squares' ) );
        $logo_width = esc_html(get_theme_mod( 'logo_width', 200 ) );
        $site_branding_center = esc_html(get_theme_mod( 'site_branding_center' ) );
        $title_margin = esc_html(get_theme_mod( 'title_margin' ) );
        $atmospheres_header_shadow = esc_html(get_theme_mod( 'atmospheres_header_shadow','0.5' ) );
		
		

		if($atmospheres_header_squares) {
			$square_style = ".dotted{background-image: url(".get_template_directory_uri()."/images/".$atmospheres_header_squares.".png) !important;}";
		} else {
		    $square_style ="";
		}
		
		if( $title_margin ) { $title_margin_style = "body .site-branding {top: {$title_margin}%;}";} else {$title_margin_style ="";}
		if( $atmospheres_header_shadow ) { $header_shadow_style = ".s-shadow {background: rgba(0,0,0,{$atmospheres_header_shadow});}";} else {$header_shadow_style ="";}
		if( $atmospheres_parralax ) { $parralax_style = ".header-image {background-attachment: inherit;}";} else {$parralax_style ="";}
		if( $header_image_height and $header_image_position != 'real' ) { $header_height = ".header-image {height: {$header_image_height}px !important;}";} else {$header_height ="";}
		if( $header_image_position == 'center' ) { $header_position = ".header-image {background-position: center center !important;}";} else {$header_position ="";}
		if( $header_image_position == '50' ) { $header_position = ".header-image {background-position: 50% 50% !important;}";} else {$header_position ="";}
		if( $header_image_position == 'real' ) { $header_position = ".header-image {background-position: no !important; height: auto;} .site-branding {display:block;}";} else {$header_position ="";}
		if( $logo_width) { $logo_width_style = ".header-right img {width: {$logo_width}px;}"; } else {$logo_width_style ="";}
		if( $site_branding_center) { $site_branding_center_style = ".site-branding {text-align: center;} "; } else {$site_branding_center_style ="";}
        wp_add_inline_style( 'custom-style-css', 
		$header_height.$header_position.$parralax_style.$square_style.$logo_width_style.$site_branding_center_style.$title_margin_style.$header_shadow_style
		);
}
/**
 * Render the site title for the selective refresh partial.
 */
function atmospheres__customize_partial_blogname() {
	bloginfo( 'name' );
}
/**
 * Render the site tagline for the selective refresh partial.
 */
function atmospheres__customize_partial_blogdescription() {
	bloginfo( 'description' );
}
/**
 * Custom Styles
 */ 	
function atmospheres__customizing_styles() {
        $header_tagline_hide = esc_attr(get_theme_mod( 'header_tagline_hide' ) );
        $atmospheres__top_menu_sub_font_size = esc_attr(get_theme_mod( 'atmospheres__top_menu_sub_font_size' ) );
        $atmospheres__top_menu_font_size = esc_attr(get_theme_mod( 'atmospheres__top_menu_font_size' ) );
        $sidebar_position = esc_attr(get_theme_mod( 'sidebar_position' ) );
        $atmospheres__menu_background_color = esc_attr(get_theme_mod( 'atmospheres__menu_background_color' ) );
        $atmospheres__menu_color = esc_attr(get_theme_mod( 'atmospheres__menu_color' ) );
        $atmospheres__menu_background_hover_color = esc_attr(get_theme_mod( 'atmospheres__menu_background_hover_color' ) );
        $before_background_color = esc_attr(get_theme_mod( 'before_background_color' ) );
        $before_border_color = esc_attr(get_theme_mod( 'before_border_color' ) );
        $atmospheres__link_color = esc_attr(get_theme_mod( 'atmospheres__link_color' ) );
        $atmospheres__link_hover_color = esc_attr(get_theme_mod( 'atmospheres__link_hover_color' ) );
        $body_background = esc_attr(get_theme_mod( 'body_background' ) );
        $atmospheres__header_search = esc_attr(get_theme_mod( 'atmospheres__header_search' ) );	
        $atmospheres_text_shadow = esc_attr(get_theme_mod( 'atmospheres_text_shadow' ) );	

		
		
## Header Styles
	
		if( !$atmospheres_text_shadow) { $text_shadow_hide = "body .site-branding .site-title a, body .site-title, body .site-description { text-shadow: none;}";} else {$text_shadow_hide ="";}
		if( $atmospheres__header_search) { $search_hide = ".s-search-top-mobile { display: none !important;}";} else {$search_hide ="";}
		if( $header_tagline_hide) { $style9 = ".site-branding .site-description {display: none !important;}";} else {$style9 ="";}
		if( $atmospheres__top_menu_sub_font_size) { $style10 = ".main-navigation ul ul li a {font-size: {$atmospheres__top_menu_sub_font_size}px !important;}";} else {$style10 ="";}
		if( $atmospheres__top_menu_font_size) { $style29 = ".main-navigation ul li a {font-size: {$atmospheres__top_menu_font_size}px !important;}";} else {$style29 ="";}
		if( $before_background_color) { $style17 = ".before-header {background: {$before_background_color} !important;}";} else {$style17 ="";}
		if( $before_border_color) { $style19 = ".before-header {border-bottom: 1px solid {$before_border_color} !important;}";} else {$style19 ="";}
		if( $body_background) { $body_background = "body {background: {$body_background} !important;}";} else {$body_background ="";}			
## Sidebar Styles
		if( $sidebar_position == 'no' ) { $style12 = "#content #secondary {display: none !important;}";} else {$style12 ="";}
## Menu Styles		
		if( $atmospheres__menu_background_color) { $style15 = ".grid-top, .main-navigation ul ul, .slicknav_menu {background: {$atmospheres__menu_background_color} !important; box-shadow: none !important;}";} else {$style15 ="";}
		if( $atmospheres__menu_color) { $style16 = ".main-navigation ul li a, .main-navigation ul ul li a, .main-navigation ul ul li a:hover, .main-navigation ul ul li > a:after, .main-navigation ul ul ul li > a:after, .slicknav_nav a {color: {$atmospheres__menu_color} !important; }";} else {$style16 ="";}
		if( $atmospheres__menu_background_hover_color) { $style18 = ".main-navigation ul li a:hover, .slicknav_nav a:hover {background: {$atmospheres__menu_background_hover_color} !important; box-shadow: none !important;}";} else {$style18 ="";}
## Colors Styles
		if( $atmospheres__link_color) { $style22 = "a {color: {$atmospheres__link_color};}";} else {$style22 ="";}
		if( $atmospheres__link_hover_color ) { $style23 = "a:hover {color: {$atmospheres__link_hover_color};}";} else {$style23 ="";}
        wp_add_inline_style( 'custom-style-css', 
		$style9.$style10.$style12.$style15.$style16.$style17.$style18.$style19.$style22.$style23.$style29.$body_background.$search_hide.$text_shadow_hide
		);
}
add_action( 'wp_enqueue_scripts', 'atmospheres__customizing_styles' );