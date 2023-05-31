<?php
/**
 * Post Navigation Function
 *
 * @since Puskar 1.0.0
 *
 * @param null
 * @return void
 *
 */
if (!function_exists('puskar_posts_navigation')) :
    function puskar_posts_navigation()
    {
        global $puskar_theme_options;
        $puskar_pagination_option = $puskar_theme_options['puskar-pagination-options'];
        if ('numeric' == $puskar_pagination_option) {
            echo "<div class='pagination-area'><div class='navigation pagination justify-content-center'><div class='nav-links text-center'>";
            global $wp_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'prev_text' => __('<i class="fa fa-angle-left"></i>', 'puskar'),
                'next_text' => __('<i class="fa fa-angle-right"></i>', 'puskar'),
            ));
            echo "<div>";
        } elseif ('ajax' == $puskar_pagination_option) {
            $page_number = get_query_var('paged');
            if ($page_number == 0) {
                $output_page = 2;
            } else {
                $output_page = $page_number + 1;
            }
            if(paginate_links()) {
            echo "<div class='ajax-pagination text-center'>
            <div class='show-more btn btn-dark btn-lg' data-number='$output_page'>
            <i class='fa fa-refresh mr-2'></i>" . __('View More', 'puskar') . "</div><div id='free-temp-post'></div></div>";
            }
        } else {
            return false;
        }
    }
endif;
add_action('puskar_action_navigation', 'puskar_posts_navigation', 10);