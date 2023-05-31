<?php
/**
 * Added puskar Page.
*/

/**
 * Add a new page under Appearance
 */
function puskar_menu() {
	add_theme_page( __( 'Puskar Options', 'puskar' ), __( 'Puskar Options', 'puskar' ), 'edit_theme_options', 'puskar-theme', 'puskar_page' );
}
add_action( 'admin_menu', 'puskar_menu' );

/**
 * Enqueue styles for the help page.
 */
function puskar_admin_scripts( $hook ) {
	if ( 'appearance_page_puskar-theme' !== $hook ) {
		return;
	}
	wp_enqueue_style( 'puskar-admin-style', get_template_directory_uri() . '/templatesell/about/about.css', array(), '' );
}
add_action( 'admin_enqueue_scripts', 'puskar_admin_scripts' );

/**
 * Add the theme page
 */
function puskar_page() {
	?>
	<div class="das-wrap">
		<div class="puskar-panel">
			<div class="puskar-logo">
				<img class="ts-logo" src="<?php echo esc_url( get_template_directory_uri() . '/templatesell/about/images/puskar-logo.png' ); ?>" alt="Logo">
			</div>
			<a href="https://www.templatesell.com/item/puskar-plus/" target="_blank" class="btn btn-success pull-right"><?php esc_html_e( 'Upgrade Pro $49', 'puskar' ); ?></a>
			<p>
			<?php esc_html_e( 'A perfect theme for blog and magazine site. With masonry layout and multiple blog page layout, this theme is the awesome and minimal theme.', 'puskar' ); ?></p>
			<a class="btn btn-primary" href="<?php echo esc_url (admin_url( '/customize.php?' ));
				?>"><?php esc_html_e( 'Theme Options - Click Here', 'puskar' ); ?></a>
		</div>

		<div class="puskar-panel">
			<div class="puskar-panel-content">
				<div class="theme-title">
					<h3><?php esc_html_e( 'Looking for theme Documentation?', 'puskar' ); ?></h3>
				</div>
				<a href="https://docs.templatesell.net/puskar" target="_blank" class="btn btn-secondary"><?php esc_html_e( 'Documentation - Click Here', 'puskar' ); ?></a>
			</div>
		</div>

		<div class="puskar-panel">
			<div class="puskar-panel-content">
				<div class="theme-title">
					<h3><?php esc_html_e( 'Are you in trouble while using theme?', 'puskar' ); ?></h3>
				</div>
				<a href="https://www.templatesell.com/support/" target="_blank" class="btn btn-secondary"><?php esc_html_e( 'Support - Click Here', 'puskar' ); ?></a>
			</div>
		</div>
		<div class="puskar-panel">
			<div class="puskar-panel-content">
				<div class="theme-title">
					<h3><?php esc_html_e( 'If you like the theme, please leave a review', 'puskar' ); ?></h3>
				</div>
				<a href="https://wordpress.org/support/theme/puskar/reviews/#new-post" target="_blank" class="btn btn-secondary"><?php esc_html_e( 'Rate this theme', 'puskar' ); ?></a>
			</div>
		</div>
	</div>
	<?php
}
