<?php
/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package Puskar
*/
global $puskar_theme_options;
$sidebar = $puskar_theme_options['puskar-sidebar-blog-page'];
get_header();
?>
<div class="ts-breadcrumbs">
	<div class="ts-breadcrumbs-inner">
		<div class="container">
			<div class="breadcrumbs-inner">
				<?php
				// Breadcrumb hook
				do_action('puskar_breadcrumb_options_hook'); ?>
			</div>
		</div>
	</div>
</div>
<section id="content" class="ts-blog-details pt-100 pb-100">
	<div class="container">
		<div class="row <?php echo esc_attr($sidebar); ?>">
			<div id="primary" class="col-lg-9 content-area">
				<main id="main" class="site-main">
					<?php
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/content', 'single' );
						
						// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
													endif;
					endwhile; // End of the loop.
					?>
				</main><!-- #main -->
			</div><!-- #primary -->
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>

<?php  get_footer();