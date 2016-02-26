<?php
/**
 * Customizer setting.
 *
 * @package    Theme_Junkie_Custom_CSS
 * @since      0.1.0
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2014 - 2016, Theme Junkie
 * @link       https://codex.wordpress.org/Theme_Customization_API
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Load textarea function for customizer.
 *
 * @since  0.1.0
 * @access public
 */
function tjcc_textarea_customize_control() {
	require_once( TJCC_ADMIN . 'customize-control-textarea.php' );
}
add_action( 'customize_register', 'tjcc_textarea_customize_control', 1 );

/**
 * Register customizer.
 *
 * @since  0.1.0
 * @access public
 */
function tjcc_register_customize( $wp_customize ) {

	$wp_customize->add_section( 'tj_custom_css_section',
		array(
			'title'       => esc_html__( 'Custom CSS', 'theme-junkie-custom-css' ),
			'description' => esc_html__( 'Add your custom css code below.', 'theme-junkie-custom-css' ),
			'priority'    => 150,
		)
	);

	$wp_customize->add_setting( 'tj_custom_css[custom_css]' ,
		array(
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'wp_kses',
		)
	);

	$wp_customize->add_control( new Tj_Customize_Control_Textarea( $wp_customize, 'tj_custom_css',
		array(
			'label'    => '',
			'section'  => 'tj_custom_css_section',
			'settings' => 'tj_custom_css[custom_css]'
		)
	) );

}
add_action( 'customize_register', 'tjcc_register_customize' );
