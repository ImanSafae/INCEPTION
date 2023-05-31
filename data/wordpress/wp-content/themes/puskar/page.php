<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
				<?php the_title('<h1 class="page-title">', '</h1>'); ?>
				
				<?php
				// Breadcrumb hook
				do_action('puskar_breadcrumb_options_hook'); ?>
			</div>
		</div>
	</div>
</div>
<section id="content" class="shop-page-area sec-spacer">
    <div class="container">
        <div class="row">
			<div id="primary" class="col-lg-12 content-area">
				<main id="main" class="site-main">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	</div>
</section>
<?php get_footer();
