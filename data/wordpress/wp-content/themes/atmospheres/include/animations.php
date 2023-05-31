<?php if( ! defined( 'ABSPATH' ) ) exit;


function atmospheres_animations_customize_register( $wp_customize ) {

/************************************   Animations  ***********************************************/

function atmospheres_animations(){
	$array = array(
				'' => esc_attr__( 'Deactivate Animation', 'atmospheres' ),			
				'fadeIn' => esc_attr__( 'fadeIn', 'atmospheres' ),
				'flipInX' => esc_attr__( 'flipInX', 'atmospheres' ),
				'flip' => esc_attr__( 'flip', 'atmospheres' ),
				'flipInY' => esc_attr__( 'flipInY', 'atmospheres' ),			
				'bounce' => esc_attr__( 'bounce', 'atmospheres' ),
				'bounceIn' => esc_attr__( 'bounceIn', 'atmospheres' ),
				'bounceInDown' => esc_attr__( 'bounceInDown', 'atmospheres' ),
				'bounceInLeft' => esc_attr__( 'bounceInLeft', 'atmospheres' ),
				'bounceInRight' => esc_attr__( 'bounceInRight', 'atmospheres' ),
				'bounceInUp' => esc_attr__( 'bounceInUp', 'atmospheres' ),
				'fadeInDownBig' => esc_attr__( 'fadeInDownBig', 'atmospheres' ),
				'fadeInLeft' => esc_attr__( 'fadeInLeft', 'atmospheres' ),
				'fadeInLeftBig' => esc_attr__( 'fadeInLeftBig', 'atmospheres' ),
				'fadeInRight' => esc_attr__( 'fadeInRight', 'atmospheres' ),
				'fadeInRightBig' => esc_attr__( 'fadeInRightBig', 'atmospheres' ),
				'fadeInUp' => esc_attr__( 'fadeInUp', 'atmospheres' ),
				'fadeInUpBig' => esc_attr__( 'fadeInUpBig', 'atmospheres' ),
				'flash' => esc_attr__( 'flash', 'atmospheres' ),
				'headShake' => esc_attr__( 'headShake', 'atmospheres' ),
				'hinge' => esc_attr__( 'hinge', 'atmospheres' ),
				'jello' => esc_attr__( 'jello', 'atmospheres' ),
				'lightSpeedIn' => esc_attr__( 'lightSpeedIn', 'atmospheres' ),
				'pulse' => esc_attr__( 'pulse', 'atmospheres' ),
				'rollIn' => esc_attr__( 'rollIn', 'atmospheres' ),
				'rotateIn' => esc_attr__( 'rotateIn', 'atmospheres' ),
				'rotateInDownLeft' => esc_attr__( 'rotateInDownLeft', 'atmospheres' ),
				'rotateInDownRight' => esc_attr__( 'rotateInDownRight', 'atmospheres' ),
				'rotateInUpLeft' => esc_attr__( 'rotateInUpLeft', 'atmospheres' ),
				'rotateInUpRight' => esc_attr__( 'rotateInUpRight', 'atmospheres' ),
				'shake' => esc_attr__( 'shake', 'atmospheres' ),
				'slideInDown' => esc_attr__( 'slideInDown', 'atmospheres' ),
				'slideInLeft' => esc_attr__( 'slideInLeft', 'atmospheres' ),
				'slideInRight' => esc_attr__( 'slideInRight', 'atmospheres' ),
				'slideInUp' => esc_attr__( 'slideInUp', 'atmospheres' ),
				'swing' => esc_attr__( 'swing', 'atmospheres' ),
				'tada' => esc_attr__( 'tada', 'atmospheres' ),
				'wobble' => esc_attr__( 'wobble', 'atmospheres' ),
				'zoomIn' => esc_attr__( 'zoomIn', 'atmospheres' ),
				'zoomInDown' => esc_attr__( 'zoomInDown', 'atmospheres' ),
				'zoomInLeft' => esc_attr__( 'zoomInLeft', 'atmospheres' ),
				'zoomInRight' => esc_attr__( 'zoomInRight', 'atmospheres' ),
				'zoomInUp' => esc_attr__( 'zoomInUp', 'atmospheres' ),
				);
	return $array;
}	
		function atmospheres_sanitize_animations( $input ) {

			$valid = atmospheres_animations();

			if ( array_key_exists( $input, $valid ) ) {
				return $input;
			} else {
				return '';
			}
		}
		

/************************************** Site Title Animation ******************************************/	

		$wp_customize->add_panel( 'atmospheres_animations' , array(
			'title'       => __( 'Animations', 'atmospheres' ),
			'priority'   => 4,
		) );

	
/************************************** Article Animation ******************************************/	

		$wp_customize->add_section( 'atmospheres_content_animations' , array(
			'title'       => __( 'Article Scroll Animation', 'atmospheres' ),
			'panel'       => 'atmospheres_animations',
			'priority'   => 4,
		) );
		
		$wp_customize->add_setting( 'atmospheres_animation_content', array (
			'sanitize_callback' => 'atmospheres_sanitize_animations',
			'default' => 'zoomIn',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'atmospheres_animation_content', array(
			'label'    => __( 'Article Animation', 'atmospheres' ),
			'section'  => 'atmospheres_content_animations',
			'settings' => 'atmospheres_animation_content',
			'type'     =>  'select',
            'choices'  => atmospheres_animations(),
		) ) );
		
		$wp_customize->add_setting( 'atmospheres_animation_content_speed', array(
		    'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new WP_Customize_Range_Control( $wp_customize, 'atmospheres_animation_content_speed', array(
			'type' => 'range',
			'section' => 'atmospheres_content_animations',
			'label'       => __( 'Animation Speed / millisecond ', 'atmospheres' ),
			'input_attrs' => array(
				'min'  => 0.1,
				'max'  => 3,
				'step' => 0.1,
			),
		) ) );


}
add_action( 'customize_register', 'atmospheres_animations_customize_register' );
