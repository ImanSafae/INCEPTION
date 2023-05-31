<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Puskar
 */
global $puskar_theme_options;
$show_content_from = esc_attr($puskar_theme_options['puskar-content-show-from']);
$read_more = esc_html($puskar_theme_options['puskar-read-more-text']);
$masonry = esc_attr($puskar_theme_options['puskar-column-blog-page']);
$image_location = esc_attr($puskar_theme_options['puskar-blog-image-layout']);
$social_share = absint($puskar_theme_options['puskar-show-hide-share']);
$grid = array($masonry, 'col-lg-12' )
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($grid); ?>>
    <div class="blog-item <?php echo esc_attr($image_location); ?>">
        <div class="full-blog-content">
            <div class="blog-meta">
                <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
            </div>
            <div class="blog-desc">
                <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->
            <div class="d-flex justify-content-between align-items-center">
                <div class="blog-button">
                    <?php if (!empty($read_more) && $show_content_from == 'excerpt'): ?>
                        <a class="more-link" href="<?php the_permalink(); ?>">
                            <?php echo esc_html($read_more); ?> 
                            <i class="fa fa-angle-right"></i>
                        </a>
                    <?php endif; ?>
                </div>
                <?php
                    if( 1 == $social_share ){
                        do_action( 'puskar_social_sharing' ,get_the_ID() );
                    }
                ?>
            </div>
        </div>
    </div>
</article><!-- #post-->

