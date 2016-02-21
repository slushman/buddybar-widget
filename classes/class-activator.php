<?php

/**
 * Fired during plugin activation
 *
 * @link       http://slushman.com
 * @since      0.2
 *
 * @package    Buddybar_Widget
 * @subpackage Buddybar_Widget/classes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      0.2
 * @package    Buddybar_Widget
 * @subpackage Buddybar_Widget/classes
 * @author     Slushman <chris@slushman.com>
 */
class Buddybar_Widget_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    0.2
	 */
	public static function activate() {

		$bpcheck = Buddybar_Widget_Activator::check_for_buddypress();

		if ( ! $bpcheck ) {

			deactivate_plugins( plugin_basename( __FILE__ ), true );

			$url 		= esc_url( admin_url( 'plugin-install.php?tab=search&s=BuddyPress' ) );
			$message 	= sprintf( wp_kses( __( 'Please install and activate BuddyPress before trying to activate BuddyBar Widget. <p><a href="%1$s">Install BuddyPress from the WordPress plugins directory.</a></p>', 'buddybar-widget' ), array( 'a' => array( 'href' => array() ), 'p' => array() ) ), $url );

			wp_die( $message );

		}

	} // activate()

	/**
	 * Checks for the existance of BuddyPress
	 *
	 * @since   0.2
	 * @return 	bool 					FALSE if BuddyPress does not exist, otherwise TRUE
	 */
	public static function check_for_buddypress() {

		if ( ! defined( 'BP_VERSION' ) ) { return FALSE; }

		$plugins = get_option( 'active_plugins' );

		if ( ! in_array( 'buddypress/bp-loader.php', $plugins ) ) { return FALSE; }

		return TRUE;

	} // check_for_buddypress()

} // class
