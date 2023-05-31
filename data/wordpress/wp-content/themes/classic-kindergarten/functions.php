<?php
/**
 * Classic Kindergarten functions and definitions
 *
 * @package Classic Kindergarten
 */

if ( ! function_exists( 'classic_kindergarten_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function classic_kindergarten_setup() {
	global $classic_kindergarten_content_width;
	if ( ! isset( $classic_kindergarten_content_width ) )
		$classic_kindergarten_content_width = 680;

	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles');
	add_theme_support( 'align-wide' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-height' => true,
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	add_editor_style( 'editor-style.css' );
}
endif; // kindergarten_school_setup
add_action( 'after_setup_theme', 'classic_kindergarten_setup' );

function classic_kindergarten_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'classic-kindergarten' ),
		'description'   => __( 'Appears on blog page sidebar', 'classic-kindergarten' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'classic-kindergarten' ),
		'description'   => __( 'Appears on footer', 'classic-kindergarten' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-1 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'classic-kindergarten' ),
		'description'   => __( 'Appears on footer', 'classic-kindergarten' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-2 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'classic-kindergarten' ),
		'description'   => __( 'Appears on footer', 'classic-kindergarten' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 4', 'classic-kindergarten' ),
		'description'   => __( 'Appears on footer', 'classic-kindergarten' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-4 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'classic_kindergarten_widgets_init' );

add_action( 'wp_enqueue_scripts', 'classic_kindergarten_enqueue_styles' );
function classic_kindergarten_enqueue_styles() {
    $parenthandle = 'classic-kindergarten-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, esc_url(get_template_directory_uri()) . '/style.css',
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'classic-kindergarten-child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}

// customizer css
function classic_kindergarten_enqueue_customizer_css() {
    wp_enqueue_style( 'classic_kindergarten-customizer-css', get_stylesheet_directory_uri() . '/css/customize-controls.css' );
}
add_action( 'customize_controls_print_styles', 'classic_kindergarten_enqueue_customizer_css' );

function classic_kindergarten_scripts() {

	wp_enqueue_style( 'classic-kindergarten-responsive', esc_url(get_theme_file_uri())."/css/responsive.css" );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'classic_kindergarten_scripts' );

add_action( 'customize_register', 'classic_kindergarten_customize_register', 11 );
function classic_kindergarten_customize_register() {
	global $wp_customize;

	$wp_customize->remove_setting( 'kindergarten_school_stickyheader' );
	$wp_customize->remove_control( 'kindergarten_school_stickyheader' );
	$wp_customize->remove_section( 'upgrade_premium' );
}

function classic_kindergarten_remove_my_action() {
    remove_action( 'admin_menu','kindergarten_school_theme_info_menu_link' );
    remove_action( 'after_switch_theme','kindergarten_school_options' );
}
add_action( 'init', 'classic_kindergarten_remove_my_action');