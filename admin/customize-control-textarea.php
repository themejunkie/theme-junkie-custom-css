<?php
/**
 * The textarea customize control extends the WP_Customize_Control class.  This class allows
 * developers to create textarea settings within the WordPress theme customizer.
 *
 * @package    Theme_Junkie_Custom_CSS
 * @since      0.1.0
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2014 - 2016, Theme Junkie
 * @link       http://otto42.com/bj
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Textarea customize control class.
 *
 * @since  0.1.0
 * @access public
 */
class Tj_Customize_Control_Textarea extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since 0.1.0
	 */
	public $type = 'textarea';

	/**
	 * Displays the textarea on the customize screen.
	 *
	 * @since 0.1.0
	 */
	public function render_content() { ?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<div class="customize-control-content">
				<textarea class="widefat" cols="45" rows="5" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</div>
		</label>
	<?php }

}
