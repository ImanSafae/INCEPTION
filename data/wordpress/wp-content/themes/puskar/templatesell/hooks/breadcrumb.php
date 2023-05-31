<?php
/**
 * Functions to manage breadcrumbs
 */
if (!function_exists('puskar_breadcrumb_options')) :
    function puskar_breadcrumb_options()
    {
        global $puskar_theme_options;
        $breadcrumbs = absint($puskar_theme_options['puskar-extra-breadcrumb']);
        $breadcrumb_from = esc_attr($puskar_theme_options['puskar-breadcrumb-selection-option']);        

        if ( $breadcrumbs == 1 && $breadcrumb_from == 'theme' ) {
            puskar_breadcrumbs();
        }elseif($breadcrumbs == 1 &&  $breadcrumb_from == 'yoast' && (function_exists('yoast_breadcrumb'))){
            yoast_breadcrumb();
        }elseif($breadcrumbs == 1 && 'rankmath' == $breadcrumb_from && (function_exists('rank_math_the_breadcrumbs'))) {
          rank_math_the_breadcrumbs();
        }elseif($breadcrumbs == 1 && 'navxt' == $breadcrumb_from && (function_exists('bcn_display'))){
            bcn_display();
        }else{
            //do nothing
        }
    }
endif;
add_action('puskar_breadcrumb_options_hook', 'puskar_breadcrumb_options');

/**
 * BreadCrumb Settings
 */
if (!function_exists('puskar_breadcrumbs')):
    function puskar_breadcrumbs()
    {
        if (!function_exists('puskar_breadcrumb_trail')) {
            require get_template_directory() . '/templatesell/breadcrumbs/breadcrumbs.php';
        }
        $breadcrumb_args = array(
            'container' => 'div',
            'show_browse' => false
        );        
        puskar_breadcrumb_trail($breadcrumb_args);
    }
endif;
add_action('puskar_breadcrumbs_hook', 'puskar_breadcrumbs');