<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/nikoz84
 * @since      1.0.0
 *
 * @package    Audaz_Construct
 * @subpackage Audaz_Construct/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Audaz_Construct
 * @subpackage Audaz_Construct/includes
 * @author     Nicolás Romero <nikoz.1984@gmail.com>
 */
class Audaz_Construct_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'audaz-construct',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
