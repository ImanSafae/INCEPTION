<?php 
/*Logo Section*/
$wp_customize->add_setting( 'puskar_options[puskar_logo_width_option]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['puskar_logo_width_option'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'puskar_options[puskar_logo_width_option]', array(
   'label'     => __( 'Logo Width', 'puskar' ),
   'description' => __('Adjust the logo width. Minimum is 100px and maximum is 600px.', 'puskar'),
   'section'   => 'title_tagline',
   'settings'  => 'puskar_options[puskar_logo_width_option]',
   'type'      => 'range',
   'priority'  => 15,
   'input_attrs' => array(
          'min' => 100,
          'max' => 600,
        ),
) );


 /*Dark Mode Logo*/
 $wp_customize->add_setting( 'puskar_options[puskar_dark_light_logo]', array(
  'capability'        => 'edit_theme_options',
  'transport' => 'refresh',
  'default'           => $default['puskar_dark_light_logo'],
  'sanitize_callback' => 'puskar_sanitize_image'
) );

$wp_customize->add_control( 
  new WP_Customize_Image_Control(
  $wp_customize,
  'puskar_options[puskar_dark_light_logo]', array(
  'label'     => __( 'Dark Mode Logo', 'puskar' ),
  'description' => __('You can upload a different logo for the dark mode.', 'puskar'),
  'section'   => 'title_tagline',
  'settings'  => 'puskar_options[puskar_dark_light_logo]',
  'type'      => 'image',
  'priority'  => 6,
    )
) );