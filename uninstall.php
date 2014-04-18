<?php
/**
 * Uninstall procedure for the plugin.
 *
 * @package    Theme_Junkie_Custom_CSS
 * @since      0.1.0
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2014, Theme Junkie
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* If uninstall not called from WordPress exit. */
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) 
	exit();

/* Delete plugin settings. */
delete_option( 'tj_custom_css' );