<?php
/**
* Puskar Slider Function
* @since Puskar 1.0.0
*
* @param null
* @return void
*
*/
global $puskar_theme_options;
$slide_id = absint($puskar_theme_options['puskar-select-category']);
$slider_type = esc_attr($puskar_theme_options['puskar_slider_type_option']);
$slick_args = array(
'slidesToShow'      => 1,
'slidesToScroll'    => 1,
'dots'              => false,
'arrows'            => false,
);
$args = array(
'posts_per_page' => 3,
'paged' => 1,
'cat' => $slide_id,
'post_type' => 'post'
);
$slider_query = new WP_Query($args);
if ($slider_query->have_posts()): ?>
<?php if($slider_type == 'slider-style-one'){ ?>
<div class="ts-slider">
    <div class="ts-slider-carousel" data-slick='<?php echo isset( $slick_args_encoded ) ? $slick_args_encoded : ''; ?>'>
        <?php while ($slider_query->have_posts()) : $slider_query->the_post();
        if(has_post_thumbnail()){
        $image_id = get_post_thumbnail_id();
        $image_url = wp_get_attachment_image_src( $image_id,'',true );
        ?>
        <div class="slider-item slider-title-square-effect light px-5" style="background-image: url(<?php echo esc_url($image_url[0]);?>)">
            <div class="slide-content">
                <ul class="meta">
                    <li>
                        <?php
                    $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                        echo '<a class="" href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'">'.esc_html( $categories[0]->name ).'</a>';
                        }
                    ?>
                    </li>
                    <li><?php puskar_posted_on(); ?></li>
                </ul>
                <h2 class="slide-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                
                <div class="slide-description">
                    <?php the_excerpt(); ?>
                </div>
                <div class="slider-button">
                    <a class="readon smoothPortfolio"href="<?php the_permalink(); ?>"><?php _e('Read More', 'puskar'); ?></a>
                </div>
            </div>
        </div>
        <?php } endwhile;
        wp_reset_postdata(); ?>
    </div>
</div>
<?php } else { ?>
<div class="ts-slider slider-style-two mt-4">
    <div class="container">
        <div class="ts-slider-carousel" data-slick='<?php echo isset( $slick_args_encoded ) ? $slick_args_encoded : ''; ?>'>

            <?php while ($slider_query->have_posts()) : $slider_query->the_post();
            if(has_post_thumbnail()){
                $image_id = get_post_thumbnail_id();
                $image_url = wp_get_attachment_image_src( $image_id,'',true );
            ?>
            <div class="slider-item td-md-table">
                <div class="slide-content td-table-cell">
                    <ul class="meta">
                        <li>
                            <?php
                        $categories = get_the_category();
                            if ( ! empty( $categories ) ) {
                            echo '<a class="" href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'">'.esc_html( $categories[0]->name ).'</a>';
                            }
                        ?>
                        </li>
                        <li><?php puskar_posted_on(); ?></li>
                    </ul>
                    <h2 class="slide-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    
                    <div class="slide-description">
                        <?php the_excerpt(); ?>
                    </div>
                    <div class="slider-button">
                        <a class="readon smoothPortfolio"href="<?php the_permalink(); ?>"><?php _e('Read More', 'puskar'); ?></a>
                    </div>
                </div>
                <div class="slide-image td-table-cell">
                    <?php the_post_thumbnail('puskar-promo-post'); ?>
                </div>
            </div>
            <?php } endwhile;
            wp_reset_postdata(); ?>
        </div>
    </div>
</div>
<?php } ?>
<?php endif; ?>
