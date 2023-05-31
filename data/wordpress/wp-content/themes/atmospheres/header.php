<?php
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * The header for our theme
 *
 */
?>
<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/WebPage" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
		<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } else { do_action( 'wp_body_open' ); } ?>
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'atmospheres' ); ?></a>
		<?php
		atmospheres__header ();
		
		if ( is_active_sidebar( 'top' ) ) {	
			dynamic_sidebar( 'top' ); 
		}
?>      <div id="wrap-query"></div>
		<div id="content" class="site-content<?php if(is_page_template('templeat-page-bilder.php')) {echo "bilder-template"; }?>">