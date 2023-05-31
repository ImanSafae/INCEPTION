<?php
/**
 * Display related posts from same category
 *
 * @since Puskar 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if (!function_exists('puskar_related_post')) :
    
    function puskar_related_post($post_id)
    {
        
        global $puskar_theme_options;
        $title = esc_html($puskar_theme_options['puskar-single-page-related-posts-title']);
        if (0 == $puskar_theme_options['puskar-single-page-related-posts']) {
            return;
        }
        $categories = get_the_category($post_id);
        if ($categories) {
            $category_ids = array();
            $category = get_category($category_ids);
            $categories = get_the_category($post_id);
            foreach ($categories as $category) {
                $category_ids[] = $category->term_id;
            }
            $count = $category->category_count;
            if ($count > 1) {
                ?>
                <div class="related-posts ts-blog">
                    <h2 class="widget-title">
                        <?php echo $title; ?>
                    </h2>
                    <div class="blog-item">
                        <div class="row">
                        <?php
                        $puskar_cat_post_args = array(
                            'category__in' => $category_ids,
                            'post__not_in' => array($post_id),
                            'post_type' => 'post',
                            'posts_per_page' => 3,
                            'post_status' => 'publish',
                            'ignore_sticky_posts' => true
                        );
                        $puskar_featured_query = new WP_Query($puskar_cat_post_args);
                        
                        while ($puskar_featured_query->have_posts()) : $puskar_featured_query->the_post();
                            ?>
                            <div class="show-2-related-posts col-md-4">
                                <div class="blog-img">
                                    <?php
                                    if (has_post_thumbnail() ):
                                        ?>
                                        <figure class="post-media">
                                            <a href="<?php the_permalink() ?>">
                                                <?php the_post_thumbnail('puskar-related-post-thumbnails'); ?>
                                            </a>
                                        </figure>
                                        <?php
                                    endif;
                                    ?>
                                    <div class="full-blog-content">
                                        <h3 class="blog-title entry-title">
                                            <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                        </h3>                                      
                                        <div class="post-date">
                                            <?php echo get_the_date(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                    </div>
                </div> <!-- .related-post-block -->
                <?php
            }
        }
    }
endif;
add_action('puskar_related_posts', 'puskar_related_post', 10, 1);