<?php
// Do not allow direct access to the file.
if(  ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'atmospheres_customize_register_colors' );
function atmospheres_customize_register_colors( $wp_customize ) {
	
	
   	    $wp_customize->add_setting( 'article_color_background', array (
			'sanitize_callback' => 'sanitize_hex_color',
		) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'article_color_background', array(
			'label'    => __( 'Article Background', 'atmospheres' ),
			'priority' => 14,
			'section'  => 'colors',
			'settings' => 'article_color_background',
		) ) );
		
   	    $wp_customize->add_setting( 'sidebar_color_background', array (
			'sanitize_callback' => 'sanitize_hex_color',
		) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_color_background', array(
			'label'    => __( 'Sidebar Background', 'atmospheres' ),
			'priority' => 14,
			'section'  => 'colors',
			'settings' => 'sidebar_color_background',
		) ) );

   	    $wp_customize->add_setting( 'header_top_background', array (
			'sanitize_callback' => 'sanitize_hex_color',
		) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_top_background', array(
			'label'    => __( 'Header Top Background', 'atmospheres' ),
			'priority' => 14,
			'section'  => 'colors',
			'settings' => 'header_top_background',
		) ) );

   	    $wp_customize->add_setting( 'header_top_text', array (
			'sanitize_callback' => 'sanitize_hex_color',
		) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_top_text', array(
			'label'    => __( 'Header Top Text Color', 'atmospheres' ),
			'priority' => 14,
			'section'  => 'colors',
			'settings' => 'header_top_text',
		) ) );

   	    $wp_customize->add_setting( 'header_top_text_hover', array (
			'sanitize_callback' => 'sanitize_hex_color',
		) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_top_text_hover', array(
			'label'    => __( 'Header Top Text Hover Color', 'atmospheres' ),
			'priority' => 14,
			'section'  => 'colors',
			'settings' => 'header_top_text_hover',
		) ) );
		
		$wp_customize->add_setting( 'sticky_color_background', array (
			'sanitize_callback' => 'sanitize_hex_color',
		) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sticky_color_background', array(
			'label'    => __( 'Sticky Post Background', 'atmospheres' ),
			'priority' => 14,
			'section'  => 'colors',
			'settings' => 'sticky_color_background',
		) ) );		
		
		$wp_customize->add_setting( 'footer_color_background', array (
			'sanitize_callback' => 'sanitize_hex_color',
		) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_color_background', array(
			'label'    => __( 'Footer Background', 'atmospheres' ),
			'priority' => 14,
			'section'  => 'colors',
			'settings' => 'footer_color_background',
		) ) );
}

/********************************************
* Breadcrumb Styles
*********************************************/ 	
add_action( 'wp_enqueue_scripts', 'atmospheres_colors_styles' );	
function atmospheres_colors_styles() {

	
        $article_color_background = esc_html( get_theme_mod( 'article_color_background' ) );
        $sidebar_color_background = esc_html( get_theme_mod( 'sidebar_color_background' ) );
        $header_top_text = esc_html( get_theme_mod( 'header_top_text' ) );
        $header_top_background = esc_html( get_theme_mod( 'header_top_background' ) );
        $footer_color_background = esc_html( get_theme_mod( 'footer_color_background' ) );
        $sticky_color_background = esc_html( get_theme_mod( 'sticky_color_background' ) );
        $header_top_text_hover = esc_html( get_theme_mod( 'header_top_text_hover' ) );


		if( $article_color_background ) { $bg_article = "body #primary main article {background-color: {$article_color_background};}";} else {$bg_article ="";}
		if( $sticky_color_background ) { $bg_sticky = "body #primary main .sticky, .sticky {background-color: {$sticky_color_background} !important;}";} else {$bg_sticky ="";}
		if( $sidebar_color_background ) { $bg_sidebar = " #secondary section, body .dark-mode #secondary section, body #secondary section, .dark-mode #secondary section {background-color: {$sidebar_color_background} !important;}";} else {$bg_sidebar ="";}
		if( $header_top_background ) { $bg_header_top = ".before-header {background-color: {$header_top_background};}";} else {$bg_header_top ="";}
		if( $header_top_text ) { $header_top_color = "#top-contacts a,#top-contacts i, #top-contacts .dashicons, .before-header .h-email, .before-header .h-phone, .before-header .h-address {color: {$header_top_text};}";} else {$header_top_color ="";}
		if( $header_top_text_hover ) { $header_top_color_hover = "#top-contacts a:hover,#top-contacts i:hover, #top-contacts .dashicons:hover, .before-header .h-email:hover, .before-header .h-phone:hover, .before-header .h-address:hover {color: {$header_top_text_hover};}";} else {$header_top_color_hover ="";}
		if( $footer_color_background ) { $bg_footer = "footer .footer-center {background-color: {$footer_color_background};}";} else {$bg_footer ="";}
        wp_add_inline_style( 'custom-style-css', 
		$bg_article.$bg_sidebar.$bg_header_top.$bg_footer.$bg_sticky.$header_top_color.$header_top_color_hover
		);
}