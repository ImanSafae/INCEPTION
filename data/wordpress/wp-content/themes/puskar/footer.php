<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Puskar
 */
global $puskar_theme_options;
$copyright = wp_kses_post($puskar_theme_options['puskar-footer-copyright']);
if ( is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4') ) {
	$count = 0;
	for ( $i = 1; $i <= 4; $i++ )
	{
		if ( is_active_sidebar( 'footer-' . $i ) )
		{
			$count++;
		}
	}
	
	$footer_col= 4;
	if( $count == 4 )
	{
		$footer_col= 4;
	}
	elseif( $count == 3)
	{
		$footer_col= 3;
	}
	elseif( $count == 2)
	{
		$footer_col= 2;
	}
	elseif( $count == 1)
	{
		$footer_col= 1;
	}

?>
 <footer id="ts-footer" class="ts-footer">
 	<div class="footer-top">
	<div class="container">
		<div class="row">
			<?php
			for ( $i = 1; $i <= 4 ; $i++ ){
				if ( is_active_sidebar( 'footer-' . $i ) )
				{
					?>
					<div class="footer-col-<?php echo $footer_col; ?>">
						<div class="footer-top-box wow fadeInUp">
							<?php dynamic_sidebar( 'footer-' . $i ); ?>
						</div>
					</div>
					<?php
				}
			}
			?>
		</div>
	</div>
	</div>
<?php } ?>
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
                    <div class="copyright">
                    	<?php echo $copyright; ?>
						<?php
							/* translators: 1: Theme name, 2: Theme author. */
							printf( esc_html__( 'Theme: %1$s by %2$s.', 'puskar' ), 'Puskar', '<a href="http://www.templatesell.com/">Template Sell</a>' );
						?>
                    </div>
                </div>
				<div class="col-lg-6">
					<?php
					if (has_nav_menu('footer')) {
						wp_nav_menu( array(
							'theme_location' => 'footer',
							'menu_id'        => '',
							'container' => 'ul',
							'menu_class'      => 'footer-menu'
						) );
					} ?>
				</div>
			</div>
		</div>
	</div>
	<?php do_action('puskar_go_to_top_hook'); ?>
</footer>
</div><!-- main container -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>