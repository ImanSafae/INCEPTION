<?php
$GLOBALS['puskar_theme_options'] = puskar_get_options_value();

/*Top Header Options*/
$wp_customize->add_section( 'puskar_top_header_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Quick Section', 'puskar' ),
   'panel' 		 => 'puskar_panel',
) );

/*callback functions header section*/
if ( !function_exists('puskar_header_active_callback') ) :
  function puskar_header_active_callback(){
      global $puskar_theme_options;
      $enable_header = absint($puskar_theme_options['puskar_enable_top_header']);
      if( 1 == $enable_header ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Enable Top Header Section*/
$wp_customize->add_setting( 'puskar_options[puskar_enable_top_header]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['puskar_enable_top_header'],
   'sanitize_callback' => 'puskar_sanitize_checkbox'
) );

$wp_customize->add_control( 'puskar_options[puskar_enable_top_header]', array(
   'label'     => __( 'Enable Quick Section', 'puskar' ),
   'description' => __('Checked to show the top header section like search and social icons', 'puskar'),
   'section'   => 'puskar_top_header_section',
   'settings'  => 'puskar_options[puskar_enable_top_header]',
   'type'      => 'checkbox',
   'priority'  => 5,
) );

/*Enable Social Icons In Header*/
$wp_customize->add_setting( 'puskar_options[puskar_enable_top_header_social]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['puskar_enable_top_header_social'],
   'sanitize_callback' => 'puskar_sanitize_checkbox'
) );

$wp_customize->add_control( 'puskar_options[puskar_enable_top_header_social]', array(
   'label'     => __( 'Enable Social Icons', 'puskar' ),
   'description' => __('You can show the social icons here. Manage social icons from Appearance > Menus. Social Menu will display here.', 'puskar'),
   'section'   => 'puskar_top_header_section',
   'settings'  => 'puskar_options[puskar_enable_top_header_social]',
   'type'      => 'checkbox',
   'priority'  => 5,
   'active_callback'=>'puskar_header_active_callback'
) );


/*Header Search Enable Option*/
$wp_customize->add_setting( 'puskar_options[puskar_enable_search]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['puskar_enable_search'],
    'sanitize_callback' => 'puskar_sanitize_checkbox'
) );

$wp_customize->add_control( 'puskar_options[puskar_enable_search]', array(
    'label'     => __( 'Enable Search', 'puskar' ),
    'description' => __('It will help to display the search in Menu.', 'puskar'),
    'section'   => 'puskar_top_header_section',
    'settings'  => 'puskar_options[puskar_enable_search]',
    'type'      => 'checkbox',
    'priority'  => 5,
    'active_callback'=>'puskar_header_active_callback'

) );

/* Header Image Additional Options */
/*Enable Overlay on the Header Image Part*/
$wp_customize->add_setting( 'puskar_options[puskar_enable_header_image_overlay]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['puskar_enable_header_image_overlay'],
   'sanitize_callback' => 'puskar_sanitize_checkbox'
) );

$wp_customize->add_control(
    'puskar_options[puskar_enable_header_image_overlay]', 
    array(
       'label'     => __( 'Enable Header Image Overlay Color Height', 'puskar' ),
       'description' => __('This option will add colors over the header image.', 'puskar'),
       'section'   => 'header_image',
       'settings'  => 'puskar_options[puskar_enable_header_image_overlay]',
        'type'      => 'checkbox',
       'priority'  => 15,
   )
 );

/*callback functions slider getting from post*/
if ( !function_exists('puskar_header_overlay_color_active_callback') ) :
  function puskar_header_overlay_color_active_callback(){
      global $puskar_theme_options;
      $slider_overlay = absint($puskar_theme_options['puskar_enable_header_image_overlay']);
      if( $slider_overlay == 1 ){
          return true;
      }
      else{
          return false;
      }
  }
endif;  

/*Header Image Height*/
$wp_customize->add_setting( 'puskar_options[puskar_header_image_height]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['puskar_header_image_height'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'puskar_options[puskar_header_image_height]', array(
   'label'     => __( 'Header Image Min Height', 'puskar' ),
   'description' => __('Adjust the header image min height height. Minimum is 50px and maximum is 500px.', 'puskar'),
   'section'   => 'header_image',
   'settings'  => 'puskar_options[puskar_header_image_height]',
   'type'      => 'range',
   'priority'  => 15,
   'input_attrs' => array(
          'min' => 50,
          'max' => 500,
        ),
    'active_callback'=> 'puskar_header_overlay_color_active_callback',
) ); 

/* Select the color for the Overlay */
$wp_customize->add_setting( 'puskar_options[puskar_slider_overlay_color]',
    array(
        'default'           => $default['puskar_slider_overlay_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(                 
        $wp_customize,
        'puskar_options[puskar_slider_overlay_color]',
        array(
            'label'       => esc_html__( 'Header Image Overlay Color', 'puskar' ),
            'description' => esc_html__( 'It will add the color overlay of the Header image. To make it transparent, use the below option.', 'puskar' ),
            'section'     => 'header_image', 
            'priority'  => 15, 
            'active_callback'=> 'puskar_header_overlay_color_active_callback',
        )
    )
);

/*Overlay Range for transparent*/
$wp_customize->add_setting( 'puskar_options[puskar_slider_overlay_transparent]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['puskar_slider_overlay_transparent'],
    'sanitize_callback' => 'puskar_sanitize_number'
) );
$wp_customize->add_control( 'puskar_options[puskar_slider_overlay_transparent]', array(
   'label'     => __( 'Header Image Overlay Color Transparent', 'puskar' ),
   'description' => __('You can make the overlay transparent using this option. Add range from 0.1 to 1.', 'puskar'),
   'section'   => 'header_image',
   'settings'  => 'puskar_options[puskar_slider_overlay_transparent]',
   'type'      => 'number',
   'priority'  => 15,
   'input_attrs' => array(
        'min' => '0.1',
        'max' => '1',
        'step' => '0.1',
    ),
   'active_callback' => 'puskar_header_overlay_color_active_callback',
) );


/*Menu Section Options*/
$wp_customize->add_section( 'puskar_main_menu_section', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Menu Section', 'puskar' ),
    'panel' 		 => 'puskar_panel',
 ) );

 /*Header Search Enable Option*/
$wp_customize->add_setting( 'puskar_options[puskar_enable_light_dark]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['puskar_enable_light_dark'],
    'sanitize_callback' => 'puskar_sanitize_checkbox'
) );

$wp_customize->add_control( 'puskar_options[puskar_enable_light_dark]', array(
    'label'     => __( 'Enable Light and Dark Mode', 'puskar' ),
    'description' => __('It helps to enable and disable dark and light mode.', 'puskar'),
    'section'   => 'puskar_main_menu_section',
    'settings'  => 'puskar_options[puskar_enable_light_dark]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );
