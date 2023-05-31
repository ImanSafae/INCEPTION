<?php if( ! defined( 'ABSPATH' ) ) exit;
	function atmospheres_animation() { 
		$article_speed = get_theme_mod( 'atmospheres_animation_content_speed' );		
	?>
	<style>
		<?php if (get_theme_mod( 'atmospheres_animation_content'  )) { ?>			
			article {
			-webkit-animation-duration: <?php if ($article_speed ) { echo esc_html( $article_speed ); } else echo "0.3"; ?>s !important;
			animation-duration: <?php if ($article_speed ) { echo esc_html( $article_speed ); } else echo "0.3"; ?>s !important;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
			-webkit-transition: all 0.1s ease-in-out;
			-moz-transition: all 0.1s ease-in-out;
			-o-transition: all 0.1s ease-in-out;
			-ms-transition: all 0.1s ease-in-out;
			transition: all 0.1s ease-in-out;
			}
		<?php } ?>
	</style>
	<?php }
	
add_action('wp_footer', 'atmospheres_animation');