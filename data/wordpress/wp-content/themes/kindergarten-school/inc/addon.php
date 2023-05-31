<?php
/*
 * @package Kindergarten School
 */

function kindergarten_school_admin_enqueue_scripts() {
	wp_enqueue_style( 'kindergarten-school-admin-style', esc_url( get_template_directory_uri() ).'/css/addon.css' );
}
add_action( 'admin_enqueue_scripts', 'kindergarten_school_admin_enqueue_scripts' );

add_action('after_switch_theme', 'kindergarten_school_options');

function kindergarten_school_options () {
	global $pagenow;
	if( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) && current_user_can( 'manage_options' ) ) {
		wp_redirect( admin_url( 'themes.php?page=kindergarten-school' ) );
		exit;
	}
}

if ( ! defined( 'KINDERGARTEN_SCHOOL_SUPPORT' ) ) {
define('KINDERGARTEN_SCHOOL_SUPPORT',__('https://wordpress.org/support/theme/kindergarten-school','kindergarten-school'));
}
if ( ! defined( 'KINDERGARTEN_SCHOOL_REVIEW' ) ) {
define('KINDERGARTEN_SCHOOL_REVIEW',__('https://wordpress.org/support/theme/kindergarten-school/reviews/#new-post','kindergarten-school'));
}
if ( ! defined( 'KINDERGARTEN_SCHOOL_THEME_PAGE' ) ) {
define('KINDERGARTEN_SCHOOL_THEME_PAGE',__('https://www.theclassictemplates.com/themes/','kindergarten-school'));
}

function kindergarten_school_theme_info_menu_link() {

	$theme = wp_get_theme();
	add_theme_page(
		sprintf( esc_html__( 'Welcome to %1$s %2$s', 'kindergarten-school' ), $theme->display( 'Name' ), $theme->display( 'Version' ) ),
		esc_html__( 'Theme Info', 'kindergarten-school' ),'edit_theme_options','kindergarten-school','kindergarten_school_theme_info_page'
	);
}
add_action( 'admin_menu', 'kindergarten_school_theme_info_menu_link' );

function kindergarten_school_theme_info_page() {

	$theme = wp_get_theme();
	?>
<div class="wrap theme-info-wrap">
	<h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'kindergarten-school' ), esc_html($theme->display( 'Name', 'kindergarten-school'  )),esc_html($theme->display( 'Version', 'kindergarten-school' ))); ?>
	</h1>
	<p class="theme-description">
	<?php esc_html_e( 'Do you want to configure this theme? Look no further, our easy-to-follow theme documentation will walk you through it.', 'kindergarten-school' ); ?>
	</p>
	<hr>
	<div class="important-links clearfix">
		<p><strong><?php esc_html_e( 'Theme Links', 'kindergarten-school' ); ?>:</strong>
			<a href="<?php echo esc_url( KINDERGARTEN_SCHOOL_THEME_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'kindergarten-school' ); ?></a>
			<a href="<?php echo esc_url( KINDERGARTEN_SCHOOL_SUPPORT ); ?>" target="_blank"><?php esc_html_e( 'Contact Us', 'kindergarten-school' ); ?></a>
			<a href="<?php echo esc_url( KINDERGARTEN_SCHOOL_REVIEW ); ?>" target="_blank"><?php esc_html_e( 'Rate This Theme', 'kindergarten-school' ); ?></a>
		</p>
	</div>
	<hr>
	<div id="getting-started">
		<h3><?php printf( esc_html__( 'Getting started with %s', 'kindergarten-school' ), 
		esc_html($theme->display( 'Name', 'kindergarten-school' ))); ?></h3>
		<div class="columns-wrapper clearfix">
			<div class="column column-half clearfix">
				<div class="section">
					<h4><?php esc_html_e( 'Theme Description', 'kindergarten-school' ); ?></h4>
					<div class="theme-description-1"><?php echo esc_html($theme->display( 'Description' )); ?></div>
				</div>
			</div>
			<div class="column column-half clearfix">
				<img src="<?php echo esc_url( $theme->get_screenshot() ); ?>" />
				<div class="section">
					<h4><?php esc_html_e( 'Theme Options', 'kindergarten-school' ); ?></h4>
					<p class="about">
					<?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'kindergarten-school' ),esc_html($theme->display( 'Name', 'kindergarten-school' ))); ?></p>
					<p>
					<a href="<?php echo esc_attr(wp_customize_url()); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Customize Theme', 'kindergarten-school' ); ?></a>
					</p>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div id="theme-author">
	  <p><?php
		printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'kindergarten-school' ),
			esc_html($theme->display( 'Name', 'kindergarten-school' )),
			'<a target="_blank" href="' . esc_url( 'https://www.theclassictemplates.com/', 'kindergarten-school' ) . '">classictemplate</a>',
			'<a target="_blank" href="' . esc_url( KINDERGARTEN_SCHOOL_REVIEW ) . '" title="' . esc_attr__( 'Rate it', 'kindergarten-school' ) . '">' . esc_html_x( 'rate it', 'If you like this theme, rate it', 'kindergarten-school' ) . '</a>'
		)
		?></p>
	</div>
</div>
<?php
}
