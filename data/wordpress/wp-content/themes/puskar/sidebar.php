<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Puskar
 */
global $puskar_theme_options;
$sidebar = $puskar_theme_options['puskar-sidebar-blog-page'];

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

?>
<aside id="secondary" class="col-lg-3 <?php echo esc_attr($sidebar); ?>">
	<div class="sidebar-area">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</aside><!-- #secondary -->
