<?php
/**
 * Custom CSS setting.
 * 
 * @package    Theme_Junkie_Custom_CSS
 * @since      0.1.0
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2014, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 */

/* Add the custom css menu. */
add_action( 'admin_menu', 'tjcc_custom_css_menu', 20 );

/* Register setting. */
add_action( 'admin_init', 'tjcc_register_setting' );

/**
 * Add the custom css menu to the admin menu.
 *
 * @since  0.1.0
 * @access public
 * @link   http://codex.wordpress.org/Function_Reference/add_theme_page
 */
function tjcc_custom_css_menu() {

	/* Add Custom CSS menu under the Appearance. */
	$setting = add_theme_page(
		__( 'Theme Junkie Custom CSS', 'tjcc' ),
		__( 'Custom CSS', 'tjcc' ),
		'edit_theme_options',
		'tj-custom-css',
		'tjcc_custom_css_page'
	);

	if ( ! $setting )
		return;

	/* Provided hook_suffix that's returned to add scripts only on custom css page. */
    add_action( 'load-' . $setting, 'tjcc_scripts' );

}

/**
 * Load scripts and styles for the custom css page.
 * 
 * @since  0.1.0
 * @access public
 * @link   http://codex.wordpress.org/Function_Reference/wp_enqueue_script
 * @link   http://codex.wordpress.org/Function_Reference/wp_enqueue_style
 */
function tjcc_scripts() {

	/* Load the javascript file. */
	wp_enqueue_script( 'codemirror-js', trailingslashit( TJCC_ASSETS ) . 'js/codemirror.js', array( 'jquery' ), null );

	/* Load the custom javascript file. */
	wp_enqueue_script( 'tjcc-js', trailingslashit( TJCC_ASSETS ) . 'js/tjcc.js', array( 'jquery' ), null );

	/* Load the css file. */
	wp_enqueue_style( 'codemirror-css', trailingslashit( TJCC_ASSETS ) . 'css/codemirror.css', null, null );
	wp_enqueue_style( 'tjcc-css', trailingslashit( TJCC_ASSETS ) . 'css/tjcc.css', null, null );

}

/**
 * Register the custom css setting.
 *
 * @since  0.1.0
 * @access public
 * @link   http://codex.wordpress.org/Function_Reference/register_setting
 */
function tjcc_register_setting() {

	register_setting(
		'tj_custom_css',                 // Option group
		'tj_custom_css',                 // Option name
		'tj_custom_css_setting_validate' // Sanitize callback
	);

}

/**
 * Render the custom CSS page
 *
 * @since  0.1.0
 * @access public
 */
function tjcc_custom_css_page() {
	$options    = get_option( 'tj_custom_css' );
	$custom_css = isset( $options['custom_css'] ) ? $options['custom_css'] : '';
	?>

	<div class="wrap">

		<h2><?php _e( 'Theme Junkie Custom CSS', 'tjcc' ) ?></h2>
		<p><?php printf( __( 'Hi There, thanks for using our plugin we hope you will enjoy it. Check out our %1$sPremium WordPress Themes%2$s.', 'scrolltop' ), '<a href="http://www.theme-junkie.com/" target="_blank"><strong>', '</strong></a>' ); ?></p>

		<?php settings_errors(); ?>
		
		<div id="post-body" class="tjcc-custom-css metabox-holder columns-2">
			
			<div id="post-body-content">

				<form action="options.php" method="post">
			
					<?php settings_fields( 'tj_custom_css' ); ?>

					<div class="tjcc-custom-css-container">
						<textarea name="tj_custom_css[custom_css]" id="tjcc-custom-css-textarea"><?php echo wp_filter_nohtml_kses( $custom_css ) ?></textarea>
					</div>

					<p class="description">
						<?php printf( __( '%1$sGetting started with CSS%2$s.', 'tjcc' ), '<a href="https://developer.mozilla.org/en-US/docs/Web/Guide/CSS/Getting_started" target="_blank">', '</a>' ); ?>
					</p>
					
					<?php submit_button( esc_attr__( 'Save', 'tjcc' ), 'primary large' ); ?>
			
				</form>

			</div><!-- .post-body-content -->

			<div id="postbox-container-1" class="postbox-container">
				<div>

					<div class="postbox">
						<h3 class="hndle"><span><?php _e( 'Live Preview', 'tjcc' ); ?></span></h3>
						<div class="inside">
							<p><?php printf( __( 'If you want to add custom css and see the live preview, please go to the %1$sCustomize%2$s page and open the Custom CSS section.', 'tjcc' ), '<a href="' . esc_url( admin_url( 'customize.php' ) ) . '">', '</a>' ); ?></p>
						</div>
					</div>

				</div>
			</div><!-- .postbox-container -->

		</div><!-- .tjcc-custom-css -->

	</div>
	<?php
}

/**
 * Sanitize and validate form input.
 *
 * @since  0.1.0
 * @access public
 */
function tj_custom_css_setting_validate( $input ) {
	$input['custom_css'] = wp_filter_nohtml_kses( $input['custom_css'] );
	return $input;
}