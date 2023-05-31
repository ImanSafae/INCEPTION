<?php
/*Blog Page Options*/
$wp_customize->add_section('puskar_blog_page_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Blog Settings', 'puskar'),
    'panel' => 'puskar_panel',
));
/*Blog Page Sidebar Layout*/

$wp_customize->add_setting('puskar_options[puskar-sidebar-blog-page]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['puskar-sidebar-blog-page'],
    'sanitize_callback' => 'puskar_sanitize_select'
));

$wp_customize->add_control( new Puskar_Radio_Image_Control(
        $wp_customize,
    'puskar_options[puskar-sidebar-blog-page]', array(
    'choices' => puskar_blog_sidebar_position_array(),
    'label' => __('Blog and Archive Sidebar', 'puskar'),
    'description' => __('This sidebar will work blog and archive pages.', 'puskar'),
    'section' => 'puskar_blog_page_section',
    'settings' => 'puskar_options[puskar-sidebar-blog-page]',
    'type' => 'select',
    'priority' => 15,
)));


/*Blog Page column number*/
$wp_customize->add_setting('puskar_options[puskar-column-blog-page]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['puskar-column-blog-page'],
    'sanitize_callback' => 'puskar_sanitize_select'
));

$wp_customize->add_control('puskar_options[puskar-column-blog-page]', array(
    'choices' => array(
        'one-column' => __('Single Layout', 'puskar'),
        'masonry-post' => __('Masonry Layout', 'puskar'),
    
    ),
    'label' => __('Blog Layout Options', 'puskar'),
    'description' => __('Change your blog or archive page layout.', 'puskar'),
    'section' => 'puskar_blog_page_section',
    'settings' => 'puskar_options[puskar-column-blog-page]',
    'type' => 'select',
    'priority' => 15,
));


/*Image Layout Options For Blog Page*/
$wp_customize->add_setting('puskar_options[puskar-blog-image-layout]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['puskar-blog-image-layout'],
    'sanitize_callback' => 'puskar_sanitize_select'
));

$wp_customize->add_control('puskar_options[puskar-blog-image-layout]', array(
    'choices' => array(
        'full-image' => __('Full Layout', 'puskar'),
        'left-image' => __('Grid Layout', 'puskar'),
    
    ),
    'label' => __('Blog Page Layout', 'puskar'),
    'description' => __('This will work only on Full layout Option', 'puskar'),
    'section' => 'puskar_blog_page_section',
    'settings' => 'puskar_options[puskar-blog-image-layout]',
    'type' => 'select',
    'priority' => 15,
));

/*Blog Page Show content from*/
$wp_customize->add_setting('puskar_options[puskar-content-show-from]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['puskar-content-show-from'],
    'sanitize_callback' => 'puskar_sanitize_select'
));

$wp_customize->add_control('puskar_options[puskar-content-show-from]', array(
    'choices' => array(
        'excerpt' => __('Show from Excerpt', 'puskar'),
        'content' => __('Show from Content', 'puskar'),
    ),
    'label' => __('Select Content Display From', 'puskar'),
    'description' => __('You can enable excerpt from Screen Options inside post section of dashboard', 'puskar'),
    'section' => 'puskar_blog_page_section',
    'settings' => 'puskar_options[puskar-content-show-from]',
    'type' => 'select',
    'priority' => 15,
));


/*Blog Page excerpt length*/
$wp_customize->add_setting('puskar_options[puskar-excerpt-length]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['puskar-excerpt-length'],
    'sanitize_callback' => 'absint'

));

$wp_customize->add_control('puskar_options[puskar-excerpt-length]', array(
    'label' => __('Excerpt Length', 'puskar'),
    'description' => __('Enter the number per Words to show the content in blog page.', 'puskar'),
    'section' => 'puskar_blog_page_section',
    'settings' => 'puskar_options[puskar-excerpt-length]',
    'type' => 'number',
    'priority' => 15,
));

/*Exclude Category in Blog Page*/
$wp_customize->add_setting('puskar_options[puskar-blog-exclude-category]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['puskar-blog-exclude-category'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('puskar_options[puskar-blog-exclude-category]', array(
    'label' => __('Exclude categories in Blog Listing', 'puskar'),
    'description' => __('Enter categories ids with comma separated eg: 2,7,14,47.', 'puskar'),
    'section' => 'puskar_blog_page_section',
    'settings' => 'puskar_options[puskar-blog-exclude-category]',
    'type' => 'text',
    'priority' => 15,
));

/*Blog Page Pagination Options*/
$wp_customize->add_setting('puskar_options[puskar-pagination-options]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['puskar-pagination-options'],
    'sanitize_callback' => 'puskar_sanitize_select'

));

$wp_customize->add_control('puskar_options[puskar-pagination-options]', array(
    'choices' => array(
        'numeric' => __('Numeric Pagination', 'puskar'),
        'ajax' => __('Ajax Pagination', 'puskar'),
    ),
    'label' => __('Pagination Types', 'puskar'),
    'description' => __('Choose Required Pagination Type', 'puskar'),
    'section' => 'puskar_blog_page_section',
    'settings' => 'puskar_options[puskar-pagination-options]',
    'type' => 'select',
    'priority' => 15,
));

/*Blog Page read more text*/
$wp_customize->add_setting('puskar_options[puskar-read-more-text]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['puskar-read-more-text'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('puskar_options[puskar-read-more-text]', array(
    'label' => __('Read More Text', 'puskar'),
    'description' => __('Read more text for blog and archive page.', 'puskar'),
    'section' => 'puskar_blog_page_section',
    'settings' => 'puskar_options[puskar-read-more-text]',
    'type' => 'text',
    'priority' => 15,
));


/*Social Share in blog page*/
$wp_customize->add_setting('puskar_options[puskar-show-hide-share]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['puskar-show-hide-share'],
    'sanitize_callback' => 'puskar_sanitize_checkbox'
));

$wp_customize->add_control('puskar_options[puskar-show-hide-share]', array(
    'label' => __('Show Social Share', 'puskar'),
    'description' => __('Options to Enable Social Share in blog and archive page.', 'puskar'),
    'section' => 'puskar_blog_page_section',
    'settings' => 'puskar_options[puskar-show-hide-share]',
    'type' => 'checkbox',
    'priority' => 15,
));

/*Category Show hide*/
$wp_customize->add_setting('puskar_options[puskar-show-hide-category]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['puskar-show-hide-category'],
    'sanitize_callback' => 'puskar_sanitize_checkbox'
));

$wp_customize->add_control('puskar_options[puskar-show-hide-category]', array(
    'label' => __('Show Category', 'puskar'),
    'description' => __('Option to hide the category on the blog page.', 'puskar'),
    'section' => 'puskar_blog_page_section',
    'settings' => 'puskar_options[puskar-show-hide-category]',
    'type' => 'checkbox',
    'priority' => 15,
));
/*Date Show hide*/
$wp_customize->add_setting('puskar_options[puskar-show-hide-date]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['puskar-show-hide-date'],
    'sanitize_callback' => 'puskar_sanitize_checkbox'
));

$wp_customize->add_control('puskar_options[puskar-show-hide-date]', array(
    'label' => __('Show Date', 'puskar'),
    'description' => __('Option to hide the date on the blog page.', 'puskar'),
    'section' => 'puskar_blog_page_section',
    'settings' => 'puskar_options[puskar-show-hide-date]',
    'type' => 'checkbox',
    'priority' => 15,
));
/*Author Show hide*/
$wp_customize->add_setting('puskar_options[puskar-show-hide-author]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['puskar-show-hide-author'],
    'sanitize_callback' => 'puskar_sanitize_checkbox'
));

$wp_customize->add_control('puskar_options[puskar-show-hide-author]', array(
    'label' => __('Show Author', 'puskar'),
    'description' => __('Option to hide the author on the blog page.', 'puskar'),
    'section' => 'puskar_blog_page_section',
    'settings' => 'puskar_options[puskar-show-hide-author]',
    'type' => 'checkbox',
    'priority' => 15,
));

