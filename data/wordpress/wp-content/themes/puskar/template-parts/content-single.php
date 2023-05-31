<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Puskar
 */
global $puskar_theme_options;
$social_share = absint($puskar_theme_options['puskar-single-social-share']);
$image = absint($puskar_theme_options['puskar-single-page-featured-image']);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-wrap">
        <?php if($image == 1 ){ ?>
            <div class="bs-img">
                <?php puskar_post_thumbnail(); ?>
            </div>
        <?php } ?>

        <div class="single-content-full">
            <div class="bs-info single-page-info">
                <ul class="bs-meta">
                    <li>
                        <?php
                        if ('post' === get_post_type()) :
                        ?>
                        <ul>
                            <li><i class="fa fa-calendar"></i><?php puskar_posted_on(); ?></li>
                            <li><i class="fa fa-user"></i><?php puskar_posted_by();?> </li>
                        </ul>
                        <?php endif; ?>
                    </li>
                    <li class="category-name">
                        <i class="fa fa-folder-open-o"></i>
                        <?php puskar_entry_meta(); ?>
                    </li>
                </ul>
            </div>
            <?php
            if (is_singular()) :
                the_title('<h1 class="post-title">', '</h1>');
            else :
                the_title('<h2 class="post-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                ?>
            <?php endif; ?>
            

            <div class="bs-desc">
                <?php
                the_content(sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'puskar'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                
                ));
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'puskar'),
                    'after' => '</div>',
                
                ));
                ?>
            </div>
            <footer class="tag-line d-flex align-items-center justify-content-between">
                <div>
                    <?php the_tags(); ?>
                </div>
                <?php 
                if( 1 == $social_share ){
                    do_action( 'puskar_social_sharing' ,get_the_ID() );
                }
                ?>
            </footer><!-- .entry-footer -->
            <?php //the_post_navigation(); ?>
            <div class="post-navigation-wrapper">
                <?php $prevPost = get_previous_post(true);
                if($prevPost) { ?>
                <div class="post-prev-wrapper">
                    <div class="nav-box previous">
                        <?php $prevthumbnail = get_the_post_thumbnail($prevPost->ID, array(100,100) );?>
                        <a href="<?php the_permalink(); ?>">
                            <span class="img-prev"><?php previous_post_link("$prevthumbnail", TRUE); ?></span>
                        </a>
                        <span class="prev-link">
                             <span class="prev-title">
                                <?php previous_post_link('%link',"<p class='m-0'>%title</p>", TRUE); ?>  
                            </span>
                        </span>
                    </div>
                </div>
                <?php } ?>
                <?php $nextPost = get_next_post(true);
                if($nextPost) { ?>
                    <div class="post-next-wrapper">
                        <div class="nav-box next">
                            <?php $nextthumbnail = get_the_post_thumbnail($nextPost->ID, array(100,100) ); ?>
                             <span class="next-link">
                                <span class="next-title">
                                    <?php next_post_link('%link',"<p class='m-0'>%title</p>", TRUE); ?>
                                </span>
                                
                             </span>
                             <a href="<?php the_permalink(); ?>">
                                <span class="img-next"><?php previous_post_link("$nextthumbnail", TRUE); ?></span>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php
                /**
                * puskar_related_posts hook
                * @since Puskar 1.0.0
                *
                * @hooked puskar_related_posts -  10
                */
                do_action( 'puskar_related_posts' ,get_the_ID() );
            ?>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->