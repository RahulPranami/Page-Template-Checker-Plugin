<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://rahulpranami.co
 * @since      1.0.0
 *
 * @package    Page_Template_Checker
 * @subpackage Page_Template_Checker/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Page_Template_Checker
 * @subpackage Page_Template_Checker/includes
 * @author     Rahul Pranami <rahulpranami101@gmail.com>
 */
class Page_Template_Checker_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'page-template-checker',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
