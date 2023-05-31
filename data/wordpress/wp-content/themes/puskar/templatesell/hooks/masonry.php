<?php
/**
 * Masonry Start Class and Id functions
 *
 * @since Puskar 1.0.0
 *
 */
if (!function_exists('puskar_masonry_start')) :
    function puskar_masonry_start()
    {
        global $puskar_theme_options;
        $is_masonry =  esc_attr($puskar_theme_options['puskar-column-blog-page']);
            if($is_masonry == 'masonry-post'){
            ?>
                <div class="masonry-start"><div id="masonry-loop">
            
            <?php
        }
    }
endif;
add_action('puskar_masonry_start_hook', 'puskar_masonry_start', 10, 1);

/**
 * Masonry end Div
 *
 * @since Puskar 1.0.0
 *
 */
if (!function_exists('puskar_masonry_end')) :
    function puskar_masonry_end()
    { 
        global $puskar_theme_options;
            $is_masonry =  esc_attr($puskar_theme_options['puskar-column-blog-page']);
                if($is_masonry == 'masonry-post'){
            ?>
                </div>
                </div>
            
            <?php
        }
    }
endif;
add_action('puskar_masonry_end_hook', 'puskar_masonry_end', 10, 1);