<?php
$GLOBALS['puskar_theme_options'] = puskar_get_options_value();

/*Single Page Options*/
$wp_customize->add_section('puskar_single_page_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Single Page Settings', 'puskar'),
    'panel' => 'puskar_panel',
));

/*Featured Image Option*/
$wp_customize->add_setting('puskar_options[puskar-single-page-featured-image]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['puskar-single-page-featured-image'],
    'sanitize_callback' => 'puskar_sanitize_checkbox'
));

$wp_customize->add_control('puskar_options[puskar-single-page-featured-image]', array(
    'label' => __('Enable Featured Image on Single Posts', 'puskar'),
    'description' => __('You can hide images on single post from here.', 'puskar'),
    'section' => 'puskar_single_page_section',
    'settings' => 'puskar_options[puskar-single-page-featured-image]',
    'type' => 'checkbox',
    'priority' => 15,
));

/*Related Post Options*/
$wp_customize->add_setting('puskar_options[puskar-single-page-related-posts]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['puskar-single-page-related-posts'],
    'sanitize_callback' => 'puskar_sanitize_checkbox'
));

$wp_customize->add_control('puskar_options[puskar-single-page-related-posts]', array(
    'label' => __('Related Posts', 'puskar'),
    'description' => __('2 posts of same category will appear.', 'puskar'),
    'section' => 'puskar_single_page_section',
    'settings' => 'puskar_options[puskar-single-page-related-posts]',
    'type' => 'checkbox',
    'priority' => 15,
));


/*callback functions related posts*/
if (!function_exists('puskar_related_post_callback')) :
    function puskar_related_post_callback()
    {
        global $puskar_theme_options;
        $related_posts = absint($puskar_theme_options['puskar-single-page-related-posts']);
        if (1 == $related_posts) {
            return true;
        } else {
            return false;
        }
    }
endif;

/*Related Post Title*/
$wp_customize->add_setting('puskar_options[puskar-single-page-related-posts-title]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['puskar-single-page-related-posts-title'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('puskar_options[puskar-single-page-related-posts-title]', array(
    'label' => __('Related Posts Title', 'puskar'),
    'description' => __('Enter the suitable title.', 'puskar'),
    'section' => 'puskar_single_page_section',
    'settings' => 'puskar_options[puskar-single-page-related-posts-title]',
    'type' => 'text',
    'priority' => 15,
    'active_callback' => 'puskar_related_post_callback'
));

/*Social Share Options*/
$wp_customize->add_setting('puskar_options[puskar-single-social-share]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['puskar-single-social-share'],
    'sanitize_callback' => 'puskar_sanitize_checkbox'
));

$wp_customize->add_control('puskar_options[puskar-single-social-share]', array(
    'label' => __('Social Sharing', 'puskar'),
    'description' => __('Enable Social Sharing on Single Posts.', 'puskar'),
    'section' => 'puskar_single_page_section',
    'settings' => 'puskar_options[puskar-single-social-share]',
    'type' => 'checkbox',
    'priority' => 15,
));
