<?php if( ! defined( 'ABSPATH' ) ) exit;
	
function atmospheres_cat_customize_register( $wp_customize ) {
		
		
	/***************** Slider General *********************/
	
	$wp_customize->add_section( 'atmospheres_cat_section' , array(
	    'title'       => __( 'Categories Page Options', 'atmospheres' ),
	    'priority'   => 25,
	) );
	
	$wp_customize->add_setting( 'atmospheres_cat_more', array (
		'sanitize_callback' => 'sanitize_text_field',
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'atmospheres_cat_more', array(
		'label'    => __( 'Read More Text', 'atmospheres' ),		
		'section'  => 'atmospheres_cat_section',
		'settings' => 'atmospheres_cat_more',
		'type'     =>  'text'				
	) ) );		

	$wp_customize->add_setting( 'atmospheres_cat_gallery', array (
		'sanitize_callback' => 'sanitize_text_field',
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'atmospheres_cat_gallery', array(
		'label'    => __( 'Gallery Text', 'atmospheres' ),		
		'section'  => 'atmospheres_cat_section',
		'settings' => 'atmospheres_cat_gallery',
		'type'     =>  'text'				
	) ) );	
	
	$wp_customize->add_setting( 'atmospheres_cat_video', array (
		'sanitize_callback' => 'sanitize_text_field',
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'atmospheres_cat_video', array(
		'label'    => __( 'Video Text', 'atmospheres' ),		
		'section'  => 'atmospheres_cat_section',
		'settings' => 'atmospheres_cat_video',
		'type'     =>  'text'				
	) ) );
	
	$wp_customize->add_setting( 'atmospheres_cat_video_icon', array (
           'default' => "1",		
		'sanitize_callback' => 'atmospheres__sanitize_checkbox',
	) );
		
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'atmospheres_cat_video_icon', array(
		'label'    => __( 'Activate Video Icons', 'atmospheres' ),
		'section'  => 'atmospheres_cat_section',
		'priority'    => 3,				
		'settings' => 'atmospheres_cat_video_icon',
		'type' => 'checkbox',
	) ) );

	$wp_customize->add_setting( 'atmospheres_cat_gallery_icon', array (
           'default' => "1",		
		'sanitize_callback' => 'atmospheres__sanitize_checkbox',
	) );
		
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'atmospheres_cat_gallery_icon', array(
		'label'    => __( 'Activate Gallery Icons', 'atmospheres' ),
		'section'  => 'atmospheres_cat_section',
		'priority'    => 3,				
		'settings' => 'atmospheres_cat_gallery_icon',
		'type' => 'checkbox',
	) ) );

	$wp_customize->add_setting( 'atmospheres_read_more_icon', array (
           'default' => "1",		
		'sanitize_callback' => 'atmospheres__sanitize_checkbox',
	) );
		
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'atmospheres_read_more_icon', array(
		'label'    => __( 'Activate Read More Icons', 'atmospheres' ),
		'section'  => 'atmospheres_cat_section',
		'priority'    => 3,				
		'settings' => 'atmospheres_read_more_icon',
		'type' => 'checkbox',
	) ) );	
	
}
add_action( 'customize_register', 'atmospheres_cat_customize_register' );



	
	function atmospheres_cat_styles () {
		
        $atmospheres_read_more_icon = esc_html(get_theme_mod( 'atmospheres_read_more_icon','1' ) );
        $atmospheres_cat_gallery_icon = esc_html(get_theme_mod( 'atmospheres_cat_gallery_icon','1' ) );
        $atmospheres_cat_video_icon = esc_html(get_theme_mod( 'atmospheres_cat_video_icon','1' ) );

		
		if( !$atmospheres_cat_gallery_icon ) { $menu_color_image_no_style = ".mp-details .mp-2 .show-desc { margin-top: 5px; }";} else {$menu_color_image_no_style ="";}
		if( !$atmospheres_cat_video_icon ) { $atmospheres_cat_video_icon_style = ".mp-details .mp-1 .show-desc { margin-top: 5px; }";} else {$atmospheres_cat_video_icon_style ="";}
		if( !$atmospheres_read_more_icon ) { $atmospheres_cat_gallery_icon_style = ".mp-details .mp-3 .show-desc { margin-top: 5px; }";} else {$atmospheres_cat_gallery_icon_style ="";}
			
	wp_add_inline_style( 'custom-style-css', 
		$menu_color_image_no_style.$atmospheres_cat_video_icon_style.$atmospheres_cat_gallery_icon_style
		);	


	}
add_action( 'wp_enqueue_scripts', 'atmospheres_cat_styles' );