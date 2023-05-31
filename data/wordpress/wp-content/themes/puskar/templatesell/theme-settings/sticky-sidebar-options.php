<?php 
/*Sticky Sidebar*/
$wp_customize->add_section( 'puskar_sticky_sidebar', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Sticky Sidebar Settings', 'puskar' ),
   'panel' 		 => 'puskar_panel',
) );

/*Sticky Sidebar Setting*/
$wp_customize->add_setting( 'puskar_options[puskar-enable-sticky-sidebar]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['puskar-enable-sticky-sidebar'],
    'sanitize_callback' => 'puskar_sanitize_checkbox'
) );

$wp_customize->add_control( 'puskar_options[puskar-enable-sticky-sidebar]', array(
    'label'     => __( 'Enable Sticky Sidebar', 'puskar' ),
    'description' => __('Enable and Disable sticky sidebar from this section.', 'puskar'),
    'section'   => 'puskar_sticky_sidebar',
    'settings'  => 'puskar_options[puskar-enable-sticky-sidebar]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );