<?php
/*Slider Options*/
$GLOBALS['puskar_theme_options'] = puskar_get_options_value();

$wp_customize->add_section( 'puskar_slider_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Slider Settings', 'puskar' ),
   'panel' 		 => 'puskar_panel',
) );

/*callback functions slider*/
if ( !function_exists('puskar_slider_active_callback') ) :
  function puskar_slider_active_callback(){
      global $puskar_theme_options;
      $enable_slider = absint($puskar_theme_options['puskar_enable_slider']);
      if( 1 == $enable_slider ){
          return true;
      }
      else{
          return false;
      }
  }
endif;


/*Slider Enable Option*/
$wp_customize->add_setting( 'puskar_options[puskar_enable_slider]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['puskar_enable_slider'],
   'sanitize_callback' => 'puskar_sanitize_checkbox'
) );

$wp_customize->add_control(
    'puskar_options[puskar_enable_slider]', 
    array(
       'label'     => __( 'Enable Slider', 'puskar' ),
       'description' => __('You can select the category for the slider below. More Options are available on premium version.', 'puskar'),
       'section'   => 'puskar_slider_section',
       'settings'  => 'puskar_options[puskar_enable_slider]',
        'type'      => 'checkbox',
       'priority'  => 15,
   )
 );        
/*Slider Type*/
$wp_customize->add_setting( 'puskar_options[puskar_slider_type_option]', array(
  'capability'        => 'edit_theme_options',
  'transport' => 'refresh',
  'default'           => $default['puskar_slider_type_option'],
  'sanitize_callback' => 'puskar_sanitize_select'
) );
$wp_customize->add_control( 'puskar_options[puskar_slider_type_option]', array(
  'choices' => array(
    'slider-style-one' => __('Slider Style One', 'puskar'),
    'slider-style-two' => __('Slider Style Two', 'puskar'),
),
 'label'     => __( 'Slider Type', 'puskar' ),
 'description' => __('Chose your slider style.', 'puskar'),
 'section'   => 'puskar_slider_section',
 'settings'  => 'puskar_options[puskar_slider_type_option]',
 'type'      => 'select',
 'priority'  => 15,
 'active_callback'=> 'puskar_slider_active_callback',
) );

/*Slider Category Selection*/
$wp_customize->add_setting( 'puskar_options[puskar-select-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['puskar-select-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new Puskar_Customize_Category_Dropdown_Control(
        $wp_customize,
        'puskar_options[puskar-select-category]',
        array(
            'label'     => __( 'Select Category For Slider', 'puskar' ),
            'description' => __('Choose one category to show the slider. More settings are in pro version.', 'puskar'),
            'section'   => 'puskar_slider_section',
            'settings'  => 'puskar_options[puskar-select-category]',
            'type'      => 'category_dropdown',
            'priority'  => 15,
            'active_callback'=> 'puskar_slider_active_callback',
        )
    )
);



