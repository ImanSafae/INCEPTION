<?php
/**
 * Puskar Theme Customizer
 *
 * @package Puskar
 */

if ( !function_exists('puskar_default_theme_options_values') ) :

    function puskar_default_theme_options_values() {

        $default_theme_options = array(

          /*Logo Options*/
          'puskar_logo_width_option' => '300',

            /*Top Header*/
            'puskar_enable_top_header'=> 0, 
            'puskar_enable_top_header_social'=> 0,
            'puskar_enable_top_header_menu'=> 0,
            'puskar_enable_light_dark'=> 0,
            'puskar_dark_light_logo'=> '',

            /*Header Image*/
            'puskar_enable_header_image_overlay'=> 0,
            'puskar_slider_overlay_color'=> '#000000',
            'puskar_slider_overlay_transparent'=> '0.1',
            'puskar_header_image_height'=> '100',

           /*Header Options*/
            'puskar_enable_offcanvas'  => 0,
            'puskar_enable_search'  => 0,

            /*Menu Options*/
            'puskar_mobile_menu_text'  => esc_html__('Menu','puskar'),
            'puskar_mobile_menu_option'=> 'menu-text',

            /*Colors Options*/
            'puskar_primary_color'              => '#d42929',
            'puskar_slider_text_color'=> '#000000',

            /*Slider Options*/
            'puskar_enable_slider'      => 1,
            'puskar-select-category'    => 0,
            'puskar_slider_type_option' => 'slider-style-two',
    
            /*Boxes Section */
            'puskar_enable_promo'       => 1,
            'puskar-promo-select-category'=> 0,
            
            /*Blog Page*/
            'puskar-sidebar-blog-page' => 'right-sidebar',
            'puskar-column-blog-page'  => 'masonry-post',
            'puskar-blog-image-layout' => 'full-image',
            'puskar-content-show-from' => 'excerpt',
            'puskar-excerpt-length'    => 25,
            'puskar-pagination-options'=> 'ajax',
            'puskar-blog-exclude-category'=> '',
            'puskar-read-more-text'    => '',
            'puskar-show-hide-share'   => 0,
            'puskar-show-hide-category'=> 1,
            'puskar-show-hide-date'=> 1,
            'puskar-show-hide-author'=> 1,

            /*Single Page */
            'puskar-single-page-featured-image' => 1,
            'puskar-single-page-related-posts'  => 0,
            'puskar-single-page-related-posts-title' => esc_html__('Related Posts','puskar'),
            'puskar-single-social-share' => 1,


            /*Sticky Sidebar*/
            'puskar-enable-sticky-sidebar' => 0,

            /*Footer Section*/
            'puskar-footer-copyright'  => esc_html__('Copyright All Rights Reserved 2022','puskar'),

            /*Breadcrumb Options*/
            'puskar-extra-breadcrumb' => 1,
            'puskar-breadcrumb-selection-option'=> 'theme',

        );
return apply_filters( 'puskar_default_theme_options_values', $default_theme_options );
}
endif;
/**
 *  Puskar Theme Options and Settings
 *
 * @since Puskar 1.0.0
 *
 * @param null
 * @return array puskar_get_options_value
 *
 */
if ( !function_exists('puskar_get_options_value') ) :
    function puskar_get_options_value() {
        $puskar_default_theme_options_values = puskar_default_theme_options_values();
        $puskar_get_options_value = get_theme_mod( 'puskar_options');
        if( is_array( $puskar_get_options_value )){
            return array_merge( $puskar_default_theme_options_values, $puskar_get_options_value );
        }
        else{
            return $puskar_default_theme_options_values;
        }
    }
endif;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function puskar_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
    if ( isset( $wp_customize->selective_refresh ) ) {
      $wp_customize->selective_refresh->add_partial( 'blogname', array(
         'selector'        => '.site-title a',
         'render_callback' => 'puskar_customize_partial_blogname',
     ) );
      $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
         'selector'        => '.site-description',
         'render_callback' => 'puskar_customize_partial_blogdescription',
     ) );
  }
  $default = puskar_default_theme_options_values();

  require get_template_directory() . '/templatesell/theme-settings/theme-settings.php';

}
add_action( 'customize_register', 'puskar_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function puskar_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function puskar_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function puskar_customize_preview_js() {
	wp_enqueue_script( 'puskar-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20200412', true );
}
add_action( 'customize_preview_init', 'puskar_customize_preview_js' );

/*
** Customizer Styles
*/
function puskar_panels_css() {
     wp_enqueue_style('puskar-customizer-css', get_template_directory_uri() . '/css/customizer-style.css', array(), '4.5.0');
}
add_action( 'customize_controls_enqueue_scripts', 'puskar_panels_css' );