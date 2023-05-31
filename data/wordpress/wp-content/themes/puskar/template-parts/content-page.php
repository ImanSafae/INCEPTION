<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Puskar
 */
global $puskar_theme_options;
$image_option = absint($puskar_theme_options['puskar-single-page-featured-image']);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-wrap">
        <div class="post-media">
            <?php
                if ($image_option == 1) {
                    puskar_post_thumbnail();
                }
            ?>
        </div>
        <div class="post-content">
            <div class="post-excerpt entry-content">
                <?php
                the_content();
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'puskar'),
                    'after' => '</div>',
                ));
                ?>
                <!-- read more -->
                <?php if (!empty($read_more)): ?>
                    <a class="more-link" href="<?php the_permalink(); ?>"><?php echo esc_html($read_more); ?> <i
                                class="fa fa-long-arrow-right"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</article><!-- #post-->

