<?php
/**
 * Kindergarten School functions and definitions
 *
 * @package Kindergarten School
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'kindergarten_school_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function kindergarten_school_setup() {
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 680;

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles');
	add_theme_support( 'align-wide' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header', array(
		'default-text-color' => false,
		'header-text' => false,
	) );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-height' => true,
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'kindergarten-school' ),
		'footer' => __( 'Footer Menu', 'kindergarten-school' ),
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
add_action( 'after_setup_theme', 'kindergarten_school_setup' );

function kindergarten_school_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'kindergarten-school' ),
		'description'   => __( 'Appears on blog page sidebar', 'kindergarten-school' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'kindergarten-school' ),
		'description'   => __( 'Appears on footer', 'kindergarten-school' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-1 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'kindergarten-school' ),
		'description'   => __( 'Appears on footer', 'kindergarten-school' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-2 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'kindergarten-school' ),
		'description'   => __( 'Appears on footer', 'kindergarten-school' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 4', 'kindergarten-school' ),
		'description'   => __( 'Appears on footer', 'kindergarten-school' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-4 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'kindergarten_school_widgets_init' );

function kindergarten_school_add_google_fonts() {
	wp_enqueue_style( 'kindergarten-school-google-fonts', 'https://fonts.googleapis.com/css?family=Pacifico|Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'kindergarten_school_add_google_fonts' );

function kindergarten_school_scripts() {
	wp_enqueue_style( 'kindergarten-school-style', get_stylesheet_uri() );
	wp_style_add_data('kindergarten-school-style', 'rtl', 'replace');
	wp_enqueue_style( 'owl.carousel-css', esc_url(get_template_directory_uri())."/css/owl.carousel.css" );
	wp_enqueue_style( 'kindergarten-school-responsive', esc_url(get_template_directory_uri())."/css/responsive.css" );
	wp_enqueue_style( 'kindergarten-school-default', esc_url(get_template_directory_uri())."/css/default.css" );
	wp_enqueue_script( 'owl.carousel-js', esc_url(get_template_directory_uri()). '/js/owl.carousel.js', array('jquery') );
	wp_enqueue_script( 'kindergarten-school-custom', esc_url(get_template_directory_uri()) . '/js/custom.js' );
	wp_enqueue_script( 'jquery.superfish', esc_url(get_template_directory_uri()) . '/js/jquery.superfish.js' );
	wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri())."/css/font-awesome.css" );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	require get_parent_theme_file_path( '/inc/color-scheme/custom-color-control.php' );
	wp_add_inline_style( 'kindergarten-school-style',$kindergarten_school_color_scheme_css );
}
add_action( 'wp_enqueue_scripts', 'kindergarten_school_scripts' );

function kindergarten_school_custom_excerpt_length( $length ) {
	if ( is_admin() ) {
    	return $length;
  	}
	return 30;
}
add_filter( 'excerpt_length', 'kindergarten_school_custom_excerpt_length', 999 );

function kindergarten_school_sanitize_choices($input, $setting) {
	global $wp_customize;
	$control = $wp_customize->get_control($setting->id);
	if (array_key_exists($input, $control->choices)) {
		return $input;
	} else {
		return $setting->default;
	}
}

// Footer Link
define('KINDERGARTEN_SCHOOL_FOOTER_LINK',__('https://theclassictemplates.com/themes/free-kindergarten-wordpress-theme/','kindergarten-school'));

if ( ! defined( 'KINDERGARTEN_SCHOOL_PRO_NAME' ) ) {
	define( 'KINDERGARTEN_SCHOOL_PRO_NAME', __( 'About Kindergarten School', 'kindergarten-school' ));
}

if ( ! defined( 'KINDERGARTEN_SCHOOL_SUPPORT' ) ) {
define('KINDERGARTEN_SCHOOL_SUPPORT',__('https://wordpress.org/support/theme/kindergarten-school/','kindergarten-school'));
}
if ( ! defined( 'KINDERGARTEN_SCHOOL_REVIEW' ) ) {
define('KINDERGARTEN_SCHOOL',__('https://wordpress.org/support/theme/kindergarten-school/reviews/','kindergarten-school'));
}
/**
 * Implement the Custom Header feature.
 */
require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Theme Info Page.
 */
require get_template_directory() . '/inc/addon.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/upgrade-to-pro.php';

if ( ! function_exists( 'kindergarten_school_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function kindergarten_school_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

//sanitize number field
function kindergarten_school_sanitize_number_absint( $number, $setting ) {
  // Ensure $number is an absolute integer (whole number, zero or greater).
  $number = absint( $number );

  // If the input is an absolute integer, return it; otherwise, return the default
  return ( $number ? $number : $setting->default );
}
