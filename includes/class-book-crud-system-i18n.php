<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://webdesign-ninjas.com
 * @since      1.0.0
 *
 * @package    Book_Crud_System
 * @subpackage Book_Crud_System/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Book_Crud_System
 * @subpackage Book_Crud_System/includes
 * @author     Shiv Srivastava <ninjatech.design@gmail.com>
 */
class Book_Crud_System_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'book-crud-system',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
