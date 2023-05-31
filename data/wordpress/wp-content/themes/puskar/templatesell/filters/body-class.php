<?php
/**
 * Add sidebar class in body
 *
 * @since Puskar 1.0.0
 *
 */

add_filter('body_class', 'puskar_body_class');
function puskar_body_class($classes)
{
    $classes[] = 'at-sticky-sidebar';
    global $puskar_theme_options;
    
    $sidebar = $puskar_theme_options['puskar-sidebar-blog-page'];
    if ($sidebar == 'no-sidebar') {
        $classes[] = 'no-sidebar';
    } elseif ($sidebar == 'left-sidebar') {
        $classes[] = 'left-sidebar';
    } elseif ($sidebar == 'middle-column') {
        $classes[] = 'middle-column';
    } else {
        $classes[] = 'right-sidebar';
    }
    return $classes;
}

/**
 * Add layout class in body
 *
 * @since Puskar 1.0.0
 *
 */

add_filter('body_class', 'puskar_layout_body_class');
function puskar_layout_body_class($classes)
{
    global $puskar_theme_options;
    $layout = $puskar_theme_options['puskar-column-blog-page'];
    if ($layout == 'masonry-post') {
        $classes[] = 'masonry-post';
    } else{
        $classes[] = 'one-column';
    } 
    return $classes;
}


/**
 * Filter to hide text Category from category page
 *
 * @since Puskar 1.0.9
 *
 */
add_filter( 'get_the_archive_title', function ( $title ) {
    if( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
});