<?php if( ! defined( 'ABSPATH' ) ) exit;

/*******************************
* Enqueue scripts and styles.
********************************/
 
function atmospheres_anima_scripts() {
	if(!get_theme_mod('atmospheres__header_animation')) {
		wp_enqueue_style( 'atmospheres-anima-css', get_template_directory_uri() . '/include/letters/anime.css');
		wp_enqueue_script( 'atmospheres-anima-js', get_template_directory_uri() . '/include/letters/anime.min.js', array( 'jquery' ), true);
		wp_enqueue_script( 'atmospheres-anime-custom-js', get_template_directory_uri() . '/include/letters/anime-custom.js', array( 'jquery' ), '', true);
	}
		
}

add_action( 'wp_enqueue_scripts', 'atmospheres_anima_scripts' );


