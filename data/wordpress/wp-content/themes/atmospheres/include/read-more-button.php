<?php if( ! defined( 'ABSPATH' ) ) exit;
/**
 * Read More Button
 */
	function atmospheres__excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}
        return '<p class="link-more"><a class="myButt " href="'. esc_url(get_permalink( get_the_ID() ) ) . '">' . atmospheres__return_read_more_text (). '</a></p>';
	}
	add_filter( 'excerpt_more', 'atmospheres__excerpt_more' );
	
	function atmospheres__excerpt_length( $length ) {
			if ( is_admin() ) {
				return $length;
			}
			return 22;
	}
	add_filter( 'excerpt_length', 'atmospheres__excerpt_length', 999 );
	
	function atmospheres__return_read_more_text () {
		if( get_theme_mod( 'atmospheres__return_read_more_text' ) ) {
			return esc_html( get_theme_mod( 'atmospheres__return_read_more_text' ) );
		} else {
		return __( 'Read More','atmospheres');
		}
	}

add_action( 'customize_register', 'atmospheres_read_more_customize_register' );
function atmospheres_read_more_customize_register( $wp_customize ) {
/***********************************************************************************
 * Back to top button Options
***********************************************************************************/

		$wp_customize->selective_refresh->add_partial( 'atmospheres__return_read_more_text', array(
			'selector'        => '.myButt',
			'render_callback' => 'atmospheres__customize_partial_atmospheres__return_read_more_text',
		) );
		
		$wp_customize->add_section( 'atmospheres_read_more' , array(
			'title'       => __( 'Read More Button - Custom Text', 'atmospheres' ),
			'priority'   => 34,
		) );
		$wp_customize->add_setting( 'atmospheres__return_read_more_text', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'atmospheres__return_read_more_text', array(
			'priority'    => 1,
			'label'    => __( 'Read More Text', 'atmospheres' ),
			'section'  => 'atmospheres_read_more',
			'settings' => 'atmospheres__return_read_more_text',
			'type' => 'text',
		) ) );
}