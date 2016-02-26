<?php
/**
 * Plugin Name:  TJ Custom CSS
 * Plugin URI:   https://www.theme-junkie.com/plugins/theme-junkie-custom-css/
 * Description:  Easily to add custom css code to your site.
 * Version:      0.1.6
 * Author:       Theme Junkie
 * Author URI:   https://www.theme-junkie.com/
 * Author Email: support@theme-junkie.com
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License as published by the Free Software Foundation; either version 2 of the License,
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 *
 * @package    Theme_Junkie_Custom_CSS
 * @since      0.1.0
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2014 - 2016, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class Tj_Custom_CSS {

	/**
	 * PHP5 constructor method.
	 *
	 * @since  0.1.0
	 */
	public function __construct() {

		/* Set constant path to the plugin directory. */
		add_action( 'plugins_loaded', array( &$this, 'constants' ), 1 );

		/* Internationalize the text strings used. */
		add_action( 'plugins_loaded', array( &$this, 'i18n' ), 2 );

		/* Load the admin functions files. */
		add_action( 'plugins_loaded', array( &$this, 'admin' ), 3 );

		/* Load the admin functions files. */
		add_action( 'plugins_loaded', array( &$this, 'includes' ), 4 );

	}

	/**
	 * Defines constants used by the plugin.
	 *
	 * @since  0.1.0
	 */
	public function constants() {

		/* Set constant path to the plugin directory. */
		define( 'TJCC_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );

		/* Set the constant path to the plugin directory URI. */
		define( 'TJCC_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );

		/* Set the constant path to the admin directory. */
		define( 'TJCC_ADMIN', TJCC_DIR . trailingslashit( 'admin' ) );

		/* Set the constant path to the inc directory. */
		define( 'TJCC_INC', TJCC_DIR . trailingslashit( 'inc' ) );

		/* Set the constant path to the assets directory. */
		define( 'TJCC_ASSETS', TJCC_URI . trailingslashit( 'assets' ) );

	}

	/**
	 * Loads the translation files.
	 *
	 * @since  0.1.0
	 */
	public function i18n() {
		load_plugin_textdomain( 'theme-junkie-custom-css', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Loads the initial files needed by the plugin.
	 * Loads the admin functions.
	 *
	 * @since  0.1.0
	 */
	public function admin() {
		require_once( TJCC_ADMIN . 'admin.php' );
		require_once( TJCC_ADMIN . 'customize.php' );
	}

	/**
	 * Loads the initial files needed by the plugin.
	 *
	 * @since  0.1.0
	 */
	public function includes() {
		require_once( TJCC_INC . 'functions.php' );
	}

}

new Tj_Custom_CSS;
