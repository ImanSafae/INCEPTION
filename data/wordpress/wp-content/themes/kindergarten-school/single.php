<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Kindergarten School
 */

get_header(); ?>

<div class="container">
    <div id="content" class="contentsecwrap">
        <section class="site-main <?php if ( !is_active_sidebar( 'sidebar-1' ) ) { ?>fullwidth<?php } ?>">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'content', 'single' ); ?>
                <?php the_post_navigation(); ?>
                <?php
                // If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || '0' != get_comments_number() )
                	comments_template();
                ?>
            <?php endwhile; // end of the loop. ?>
        </section>
        <?php get_sidebar();?>
        <div class="clear"></div>
    </div>
</div>

<?php get_footer(); ?>