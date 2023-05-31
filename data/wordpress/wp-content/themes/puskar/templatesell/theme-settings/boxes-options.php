<?php
/*Promo Section Options*/
$GLOBALS['puskar_theme_options'] = puskar_get_options_value();

$wp_customize->add_section( 'puskar_promo_section', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Boxes Below Slider Settings', 'puskar' ),
    'panel'          => 'puskar_panel',
) );

/*callback functions slider*/
if ( !function_exists('puskar_promo_active_callback') ) :
    function puskar_promo_active_callback(){
        global $puskar_theme_options;
        $enable_promo = absint($puskar_theme_options['puskar_enable_promo']);
        if( 1 == $enable_promo ){
            return true;
        }
        else{
            return false;
        }
    }
endif;

/*Boxes Enable Option*/
$wp_customize->add_setting( 'puskar_options[puskar_enable_promo]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['puskar_enable_promo'],
    'sanitize_callback' => 'puskar_sanitize_checkbox'
) );

$wp_customize->add_control( 'puskar_options[puskar_enable_promo]', array(
    'label'     => __( 'Enable Boxes', 'puskar' ),
    'description' => __('Enable and select the category to show the boxes below slider.', 'puskar'),
    'section'   => 'puskar_promo_section',
    'settings'  => 'puskar_options[puskar_enable_promo]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );

/*Promo Category Selection*/
$wp_customize->add_setting( 'puskar_options[puskar-promo-select-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['puskar-promo-select-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new Puskar_Customize_Category_Dropdown_Control(
        $wp_customize,
        'puskar_options[puskar-promo-select-category]',
        array(
            'label'     => __( 'Category For Boxes', 'puskar' ),
            'description' => __('From the dropdown select the category for the boxes. Category having post will display in below boxes section.', 'puskar'),
            'section'   => 'puskar_promo_section',
            'settings'  => 'puskar_options[puskar-promo-select-category]',
            'type'      => 'category_dropdown',
            'priority'  => 5,
            'active_callback'=>'puskar_promo_active_callback'
        )
    )
);