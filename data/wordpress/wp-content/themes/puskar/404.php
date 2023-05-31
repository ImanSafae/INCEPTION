<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Puskar
 */

get_header();
?>
<div class="ts-breadcrumbs">
    <div class="ts-breadcrumbs-inner">
        <div class="container">
            <div class="breadcrumbs-inner">
            	<h1 class="page-title">
            		<?php esc_html_e( '404', 'puskar' ); ?>
        		</h1>
            	<?php 
					// breadcrumb hook
					do_action('puskar_breadcrumb_options_hook'); 
				?>
        	</div>
    	</div>
	</div>
</div>
<section id="content" class="site-content posts-container">
	<div class="container">
		<div class="row">
			<div id="primary" class="col-md-12 page-404-container">
				<main id="main" class="site-main">
					<div class="page-404-content py-5 text-center">
						<h3 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'puskar' ); ?></h3>
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'puskar' ); ?></p>
						<?php get_search_form(); ?>
						<div class="back_home">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html_e( 'Back to Home', 'puskar' ); ?></a>
						</div>
					</div><!-- .error-404 -->
				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	</div>
</section>
<?php
get_footer();
