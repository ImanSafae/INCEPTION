<?php
/**
 * Enqueue scripts and styles.
 */
function puskar_scripts() {

	/*google font  */
	global $puskar_theme_options;
    /*body  */
    wp_enqueue_style('puskar-body', '//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700', array(), null);

    /*Author signature google font  */
    wp_enqueue_style('puskar-sign', '//fonts.googleapis.com/css?family=Monsieur+La+Doulaise&display=swap', array(), null);

    wp_enqueue_style( 'bootstrp-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.5.0' );
	//*Font-Awesome-master*/
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.5.0' );

    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css', array(), '4.5.0' );

    wp_enqueue_style( 'lineicons', get_template_directory_uri() . '/css/themify-icons.css', array(), '4.5.0' );
    /*Slick CSS*/
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick.css', array(), '4.5.0' );

	
    /*mmenu CSS*/

   /*Main CSS*/
    wp_enqueue_style( 'puskar-style', get_stylesheet_uri() );
    wp_enqueue_style( 'dark-and-light', get_template_directory_uri() . '/css/main.css', array(), '4.5.0' );
    wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css', array(), '4.5.0' );
	/*RTL CSS*/
	wp_style_add_data( 'puskar-style', 'rtl', 'replace' );


    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20200412', true );
    $puskar_pagination_option =  esc_attr($puskar_theme_options['puskar-pagination-options']);
    
    if( 'ajax' == $puskar_pagination_option )  {
    	
    	wp_enqueue_script( 'puskar-custom-pagination', get_template_directory_uri() . '/js/custom-infinte-pagination.js', array('jquery'), '4.6.0', true );
    }

    wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/js/imagesloaded.js', array(), '20200412', true );

    $masonry =  esc_attr($puskar_theme_options['puskar-column-blog-page']);
    if( 'masonry-post' == $masonry || 'one-column' == $masonry)  {
        wp_enqueue_script( 'masonry' );
        wp_enqueue_script( 'puskar-custom-masonry', get_template_directory_uri() . '/js/custom-masonry.js', array('jquery'), '4.6.0', true );
   }

	wp_enqueue_script( 'puskar-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20200412', true );

	/*Slick JS*/
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.js', array('jquery'), '4.6.0', true  );
    

    
	/*Custom Scripts*/
	wp_enqueue_script( 'puskar-custom', get_template_directory_uri() . '/js/custom.js', array(), '', true );
    
	global $wp_query;
    $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    $max_num_pages = $wp_query->max_num_pages;

    wp_localize_script( 'puskar-custom', 'puskar_ajax', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'paged'     => absint($paged),
        'max_num_pages'      => absint($max_num_pages),
        'next_posts'      => next_posts( absint($max_num_pages), false ),
        'show_more'      => __( 'View More', 'puskar' ),
        'no_more_posts'        => __( 'No More', 'puskar' ),
    ));

	wp_enqueue_script( 'puskar-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20200412', true );

	/*Sticky Sidebar*/
	global $puskar_theme_options;
	if( 1 == absint($puskar_theme_options['puskar-enable-sticky-sidebar'])) {
		wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/js/theia-sticky-sidebar.js', array(), '20200412', true );
        wp_enqueue_script( 'puskar-sticky-sidebar', get_template_directory_uri() . '/js/custom-sticky-sidebar.js', array(), '20200412', true );
	}
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_enqueue_scripts', 'puskar_scripts' );

/**
 * Enqueue fonts for the editor style
 */
function puskar_block_styles() {
    wp_enqueue_style( 'puskar-editor-styles', get_theme_file_uri( 'css/editor-styles.css' ) );

    wp_enqueue_style('puskar-editor-body', '//fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&display=swap', array(), null);
    /*heading  */
    wp_enqueue_style('puskar-editor-heading', '//fonts.googleapis.com/css?family=Prata&display=swap', array(), null);

    $puskar_custom_css = '
    .edit-post-visual-editor.editor-styles-wrapper{ font-family: Poppins;}

    .editor-post-title__block .editor-post-title__input,
    .editor-styles-wrapper h1,
    .editor-styles-wrapper h2,
    .editor-styles-wrapper h3,
    .editor-styles-wrapper h4,
    .editor-styles-wrapper h5,
    .editor-styles-wrapper h6{font-family:Poppins;} 
    ';

    wp_add_inline_style( 'puskar-editor-styles', $puskar_custom_css );
}

add_action( 'enqueue_block_editor_assets', 'puskar_block_styles' );

