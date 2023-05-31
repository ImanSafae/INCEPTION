<?php
/**
 * Upgrade to pro options
 */
function kindergarten_school_upgrade_pro_options( $wp_customize ) {

	$wp_customize->add_section(
		'upgrade_premium',
		array(
			'title'    => esc_html( KINDERGARTEN_SCHOOL_PRO_NAME ),
			'pro_text' => esc_html__( 'About Kindergarten School','kindergarten-school'),
			'priority' => 1,
		)
	);

	class Kindergarten_School_Pro_Button_Customize_Control extends WP_Customize_Control {
		public $type = 'upgrade_premium';

		function render_content() {
			?>
			<div class="pro_info">
				<ul>
					<li><a class="upgrade-to-pro" href="<?php echo esc_url( 'https://www.theclassictemplates.com/wp-themes/kindergarten-preschool-wordpress-theme/' ); ?>" target="_blank"><i class="dashicons dashicons-cart"></i><?php esc_html_e( 'Upgrade Pro', 'kindergarten-school' ); ?> </a></li>

					<li><a class="free-pro" href="<?php echo esc_url( 'https://theclassictemplates.com/documentation/kindergarten-school/' ); ?>" target="_blank"><i class="dashicons dashicons-visibility"></i><?php esc_html_e( 'Theme Documentation', 'kindergarten-school' ); ?> </a></li>

					<li><a class="free-pro" href="<?php echo esc_url( 'https://theclassictemplates.com/demo/kindergarten-school/' ); ?>" target="_blank"><i class="dashicons dashicons-awards"></i><?php esc_html_e( 'Premium Demo', 'kindergarten-school' ); ?> </a></li>

					<li><a class="support" href="<?php echo esc_url( KINDERGARTEN_SCHOOL_SUPPORT ); ?>" target="_blank"><i class="dashicons dashicons-lightbulb"></i><?php esc_html_e( 'Support Forum', 'kindergarten-school' ); ?></a></li>

					<li><a class="rate-us" href="<?php echo esc_url( KINDERGARTEN_SCHOOL_REVIEW ); ?>" target="_blank"><i class="dashicons dashicons-star-filled"></i><?php esc_html_e( 'Rate Us', 'kindergarten-school' ); ?></a></li>
				</ul>
			</div>
			<?php
		}
	}

	$wp_customize->add_setting(
		'pro_info_buttons',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'kindergarten_school_sanitize_text',
		)
	);

	$wp_customize->add_control(
		new Kindergarten_School_Pro_Button_Customize_Control(
			$wp_customize,
			'pro_info_buttons',
			array(
				'section' => 'upgrade_premium',
			)
		)
	);
}
add_action( 'customize_register', 'kindergarten_school_upgrade_pro_options' );
