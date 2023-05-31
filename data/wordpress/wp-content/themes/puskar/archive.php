<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Puskar
 */

get_header();
?>
<div class="ts-breadcrumbs">
	<div class="ts-breadcrumbs-inner">
		<div class="container">
			<div class="breadcrumbs-inner">
				<?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
				
				<?php
				// Breadcrumb hook
				do_action('puskar_breadcrumb_options_hook'); ?>
			</div>
		</div>
	</div>
</div>
<section id="content" class="ts-blog ts-blog-sec pt-100 pb-100">
	<div class="container">
		<div class="row">
			<div id="primary" class="col-lg-9 content-area">
				<main id="main" class="site-main">
					<?php if ( have_posts() ) : ?>

						<?php

						/* Masonry Start Section */
						do_action('puskar_masonry_start_hook'); 

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

					/* Masonry end Section */
					do_action('puskar_masonry_end_hook');

					/**
		             * puskar_action_navigation hook
		             * @since Puskar 1.0.0
		             *
		             * @hooked puskar_action_navigation -  10
		             */
					do_action( 'puskar_action_navigation');

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
				
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	</div>
</div>
</section>

<?php get_footer();
