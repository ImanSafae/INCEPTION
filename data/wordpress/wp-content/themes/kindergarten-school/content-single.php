<?php
/**
 * @package Kindergarten School
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
    <?php if (has_post_thumbnail() ){ ?>
        <div class="post-thumb">
           <?php the_post_thumbnail(); ?>
        </div>
    <?php } ?>
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header>    
    <div class="postmeta">
        <div class="post-date"><i class="fa fa-clock-o"></i> &nbsp; <?php the_date(); ?></div>
        <div class="post-comment"> &nbsp; &nbsp; <i class="fa fa-comment"></i> &nbsp;  <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></div>
    </div>
    <div class="entry-content">
        <?php the_content(); ?>
        <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'kindergarten-school' ),
            'after'  => '</div>',
        ) );
        ?>
        <div class="postmeta">
            <div class="post-tags"><?php the_tags(); ?> </div>
            <div class="clear"></div>
        </div>
    </div>   
    <footer class="entry-meta">
        <?php edit_post_link( __( 'Edit', 'kindergarten-school' ), '<span class="edit-link">', '</span>' ); ?>
    </footer>
</article>