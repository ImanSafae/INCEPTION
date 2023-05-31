<?php
/**
 * @package Kindergarten School
 * Setup the WordPress core custom header feature.
 *
 * @uses kindergarten_school_header_style()
 */
function kindergarten_school_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'kindergarten_school_custom_header_args', array(		
		'default-text-color'     => 'fff',
		'width'                  => 1400,
		'height'                 => 280,
		'wp-head-callback'       => 'kindergarten_school_header_style',		
	) ) );
}
add_action( 'after_setup_theme', 'kindergarten_school_custom_header_setup' );

if ( ! function_exists( 'kindergarten_school_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see kindergarten_school_custom_header_setup().
 */
function kindergarten_school_header_style() {
	$header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() || get_header_textcolor() ) :
	?>
		.header {
			background: url(<?php echo esc_url( get_header_image() ); ?>) no-repeat;
			background-position: center top;
		}
	<?php endif; ?>	

	h1.site-title a {
		color: <?php echo esc_attr(get_theme_mod('kinder_garten_sitetitle_col')); ?> !important;
	}

	.site-branding-text span {
		color: <?php echo esc_attr(get_theme_mod('kinder_garten_sitetagline_col')); ?> !important;
	}

	</style>
	<?php 
}
endif; // kindergarten_school_header_style