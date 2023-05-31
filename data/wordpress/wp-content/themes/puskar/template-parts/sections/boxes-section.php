<?php
/**
 * Puskar Promo Unique
 * @since Puskar 1.0.0
 *
 * @param null
 * @return void
 *
 */
global $puskar_theme_options;
$promo_cat = absint($puskar_theme_options['puskar-promo-select-category']);

if( $promo_cat > 0 )
{ ?>
    <section class="puskar-promo-section">
            <div class="container">
                <div class="row">
                    <?php
                    $args = array(
                        'cat' => $promo_cat ,
                        'posts_per_page' => 4,
                        'order'=> 'DESC'
                    );
                    
                    $query = new WP_Query($args);
                    
                    if($query->have_posts()):                        
                        while($query->have_posts()):
                            $query->the_post();
                            ?>                            
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                
                                <?php if(has_post_thumbnail()) { ?>
                                  <figure>
                                      <?php the_post_thumbnail('puskar-thumbnail-size'); ?>
                                  </figure>
                                <?php } ?>
                                <div class="promo-content">    
                                    <div class="post-category">
                                        <?php
                                           $categories = get_the_category();
                                           if ( ! empty( $categories ) ) {
                                              echo '<a class="s-cat" href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'" title="Lifestyle">'.esc_html( $categories[0]->name ).'</a>';
                                            }                                 
                                        ?>
                                    </div>

                                    <h3 class="post-title entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="post-date">
                                        <div class="entry-meta">
                                            <?php
                                            puskar_posted_on();
                                            ?>
                                        </div><!-- .entry-meta -->
                                    </div>
                                </div>
                            </div>
                        
                        <?php endwhile; endif; wp_reset_postdata(); ?>
                </div>
            </div>
    </section>
<?php   }