<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Kindergarten School
 */

get_header(); ?>
  
<div id="content">
   <?php if( get_theme_mod('kindergarten_school_slider') != ''){ ?>
    <section id="slider-cat">
      <div class="container">
        <div class="owl-carousel m-0">
          <?php 
          $kindergarten_school_catData = get_theme_mod('kindergarten_school_slider');
          if($kindergarten_school_catData){
          $page_query = new WP_Query(
              array( 
                'cat' => esc_attr(get_theme_mod('kindergarten_school_slider',true)),
                'posts_per_page' => esc_attr(get_theme_mod('kindergarten_school_slider_count',true))
              )
            );
          while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="row">
              <div class="col-box-6">
                <div class="text-content">
                  <h3><a href="<?php the_permalink(); ?>"><?php esc_html(the_title()); ?></a></h3>
                  <p><?php the_excerpt(); ?></p>
                </div>
              </div>
              <div class="col-box-7">
                <div class="imagebox">
                  <?php the_post_thumbnail(); ?>
                </div>
              </div>
            </div>
            <?php endwhile; 
            wp_reset_postdata();
          }
          ?>
        </div>
      </div>
    </section>
  <?php }?>

  <?php
    $kindergarten_school_hidepageboxes = get_theme_mod('kindergarten_school_disabled_pgboxes', '1');
    if( $kindergarten_school_hidepageboxes == ''){
  ?>
  <div id="ourservices" <?php if( get_theme_mod( 'kindergarten_school_disabled_slides' ) == '1') { echo 'style="margin-top:10px"'; } ?>>
    <div class="container">
      <h3><?php echo esc_html(get_theme_mod('kindergarten_school_pgboxes_title',''));?></h3>
      <hr>
      <?php for($p=1; $p<5; $p++) { ?>
      <?php if( get_theme_mod('kindergarten_school_pageboxes'.$p,false)) { ?>
      <?php $kindergarten_school_querymed = new WP_query('page_id='.esc_attr(get_theme_mod('kindergarten_school_pageboxes'.$p,true)) ); ?>
        <?php while( $kindergarten_school_querymed->have_posts() ) : $kindergarten_school_querymed->the_post(); ?>
          <div class="page4box <?php if($p % 4 == 0) { echo "last_column"; } ?>">
            <?php if (has_post_thumbnail() ){ ?>
              <div class="thumbbx"> <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?> </a></div>
            <?php } ?>
            <div class="pagecontent <?php if($p % 2 == 0) { echo "even-box"; } else if($p % 2 == 1) { echo "odd-box"; } ?>">
              <h4><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h4> 
              <p><?php echo esc_html( wp_trim_words( get_the_content(), 20, '...' ) );  ?></p>
              <a class="pagemore" href="<?php the_permalink(); ?>">
                <?php esc_html_e('Read More','kindergarten-school'); ?>
              </a>
            </div>
          </div>
        <?php endwhile; wp_reset_postdata(); ?>
      <?php } } ?>
      <div class="clear"></div>
    </div>
  </div>
  <?php }?>
</div>

<?php get_footer(); ?>