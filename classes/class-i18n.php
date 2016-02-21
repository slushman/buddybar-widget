<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://slushman.com
 * @since      0.2
 *
 * @package    Buddybar_Widget
 * @subpackage Buddybar_Widget/classes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      0.2
 * @package    Buddybar_Widget
 * @subpackage Buddybar_Widget/classes
 * @author     Slushman <chris@slushman.com>
 */
class Buddybar_Widget_i18n {

	/**
	 * The domain specified for this plugin.
	 *
	 * @since    0.2
	 * @access   private
	 * @var      string    $domain    The domain identifier for this plugin.
	 */
	private $domain;

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    0.2
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'buddybar-widget',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	} // load_plugin_textdomain()

} // class
