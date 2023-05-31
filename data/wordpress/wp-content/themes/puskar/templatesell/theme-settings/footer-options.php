<?php
/*Footer Options*/
$wp_customize->add_section('puskar_footer_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Footer Settings', 'puskar'),
    'panel' => 'puskar_panel',
));


/*Copyright Setting*/
$wp_customize->add_setting('puskar_options[puskar-footer-copyright]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['puskar-footer-copyright'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('puskar_options[puskar-footer-copyright]', array(
    'label' => __('Copyright Text', 'puskar'),
    'description' => __('Enter your own copyright text.', 'puskar'),
    'section' => 'puskar_footer_section',
    'settings' => 'puskar_options[puskar-footer-copyright]',
    'type' => 'text',
    'priority' => 15,
));
