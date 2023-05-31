<?php if( ! defined( 'ABSPATH' ) ) { exit; } 
	add_action('mp_search_query','atmospheres_search_query');
	function atmospheres_search_query () {	
	?>
	<div class="search-category">		
		<article>
			<div id="iframe-overlay"></div>
			<div class="cont-artist">
				<header class="entry-header">
					<?php
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					?>
				</header>
				<?php if ( has_post_thumbnail() ) { ?>
					<a class="app-img-effect" href="<?php the_permalink(); ?>">	
						<div class="app-first">
							<div class="app-sub">
								<div class="fig"><?php the_post_thumbnail( 'post-thumbnail', array( 'itemprop' => 'image' ) ); ?></div>
							</div>
						</div>
					</a> 
					<?php } else { ?>
					<a class="app-img-effect" href="<?php the_permalink(); ?>">	
						<div class="app-first">
							<div class="app-sub">
								<div class="fig"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/cat-img.jpg"/></div>
							</div>
						</div>
					</a>
				<?php } ?>
				<div class="mp-details">
					<div class="mp-3">
						<a class="dash-a" href="<?php echo esc_url( get_permalink() ); ?>">
							<?php if( get_theme_mod( 'atmospheres_read_more_icon', '1' ) ) {  ?>
								<span class="dashicons dashicons-id"></span>
							<?php } ?>
							<p class="show-desc">
								<?php if(get_theme_mod( 'atmospheres_cat_more' ) ) {
									echo esc_html( get_theme_mod( 'atmospheres_cat_more' ) );
									} else { 
									esc_html_e( 'READ MORE', 'atmospheres' );; 
								} ?>
							</p>
						</a>
					</div>
				</div>
			</div>
		</article>
	</div>
<?php
}																			