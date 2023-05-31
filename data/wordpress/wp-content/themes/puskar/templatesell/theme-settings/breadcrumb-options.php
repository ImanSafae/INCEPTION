<?php 
/*Extra Options*/
$GLOBALS['puskar_theme_options'] = puskar_get_options_value();
$wp_customize->add_section( 'puskar_extra_options', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Breadcrumb Settings', 'puskar' ),
    'panel'          => 'puskar_panel',
) );

/*Breadcrumb Enable*/
$wp_customize->add_setting( 'puskar_options[puskar-extra-breadcrumb]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['puskar-extra-breadcrumb'],
    'sanitize_callback' => 'puskar_sanitize_checkbox'
) );

$wp_customize->add_control( 'puskar_options[puskar-extra-breadcrumb]', array(
    'label'     => __( 'Enable Breadcrumb', 'puskar' ),
    'description' => __( 'Breadcrumb will appear on all pages except home page. More settings will be on the premium version.', 'puskar' ),
    'section'   => 'puskar_extra_options',
    'settings'  => 'puskar_options[puskar-extra-breadcrumb]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

/*callback functions related posts*/
if (!function_exists('puskar_breadcrumb_callback')) :
    function puskar_breadcrumb_callback()
    {
        global $puskar_theme_options;
        $breadcrumb = absint($puskar_theme_options['puskar-extra-breadcrumb']);
        if (1 == $breadcrumb) {
            return true;
        } else {
            return false;
        }
    }
endif;

/*Select Breadcrumb From*/
$wp_customize->add_setting('puskar_options[puskar-breadcrumb-selection-option]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['puskar-breadcrumb-selection-option'],
    'sanitize_callback' => 'puskar_sanitize_select'
));

$wp_customize->add_control('puskar_options[puskar-breadcrumb-selection-option]', array(
    'choices' => array(
        'theme' => __('Theme Default', 'puskar'),
        'yoast' => __('Yoast Plugin', 'puskar'),
        'rankmath' => __('Rank Math Plugin', 'puskar'),
        'navxt' => __('NavXT Plugin', 'puskar'),
    ),
    'label' => __('Select Breadcrumb From', 'puskar'),
    'description' => sprintf('%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
        __( 'You need to install and activate the respected plugin to show their Breadcrumb. Otherwise, your default theme Breadcrumb will appear. If you see error in search console, then we recommend to use plugin Breadcrumb. We recommend', 'puskar' ),
        esc_url('https://rankmath.com/?ref=templatesell'),
        __('Rank Math Plugin' , 'puskar'),
        __('for better SEO and optimization. Here we included an affiliate link to Rank Math Plugin. If you click on the link and buy the product, we’ll receive a small fee. No worries though, you’ll still pay the standard amount without any extra cost to you.' ,'puskar')
    ),
    'section' => 'puskar_extra_options',
    'settings' => 'puskar_options[puskar-breadcrumb-selection-option]',
    'type' => 'select',
    'priority' => 15,
    'active_callback'=>'puskar_breadcrumb_callback',
));