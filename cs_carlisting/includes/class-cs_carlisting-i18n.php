<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       winspire.rs
 * @since      1.0.0
 *
 * @package    Cs_carlisting
 * @subpackage Cs_carlisting/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Cs_carlisting
 * @subpackage Cs_carlisting/includes
 * @author     Aleksandar Vojinovic <winspirers@gmail.com>
 */
class Cs_carlisting_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'cs_carlisting',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
