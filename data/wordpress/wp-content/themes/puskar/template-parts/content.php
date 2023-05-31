<?php
/**
* Template part for displaying posts
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
$date = absint($puskar_theme_options['puskar-show-hide-date']);
$category = absint($puskar_theme_options['puskar-show-hide-category']);
$author = absint($puskar_theme_options['puskar-show-hide-author']);
#
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($masonry); ?>>
    <div class="blog-item <?php echo esc_attr($image_location); ?>">
        <?php if(has_post_thumbnail()) { ?>
        <div class="blog-img">
            <?php puskar_post_thumbnail(); ?>
            <?php
            if ('post' === get_post_type()) :
            ?>
            <div class="date">
                <?php
                    if($date == 1 ){
                    puskar_posted_on();
                    }
                    if($author == 1 ){
                    puskar_posted_by();
                    }
                ?>
            </div>
            <?php endif; ?>
            <div class="blog-img-content">
                <div class="display-table-cell">
                    <a class="blog-link" href="<?php the_permalink(); ?>">
                        <i class="fa fa-link"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="full-blog-content">
            <div class="blog-meta">
                <?php
                if (is_singular()) :
                the_title('<h1 class="post-title entry-title">', '</h1>');
                else :
                the_title('<h3 class="blog-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
                ?>
                <?php endif; ?>
            </div>
            <div class="blog-desc">
                <?php
                if (is_singular()) {
                the_content();
                } else {
                if ($show_content_from == 'excerpt') {
                the_excerpt();
                } else {
                the_content();
                }
                }
                wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'puskar'),
                'after' => '</div>',
                ));
                ?>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="blog-button">
                    <?php if (!empty($read_more) && $show_content_from == 'excerpt'): ?>
                        <a class="more-link" href="<?php the_permalink(); ?>"><?php echo esc_html($read_more); ?> <i class="fa fa-angle-right"></i>
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
</article><!-- #post- -->