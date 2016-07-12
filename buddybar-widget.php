<?php

/**
 * The plugin bootstrap file
 *
 * @link              http://slushman.com
 * @since             0.21
 * @package           Buddybar_Widget
 *
 * @wordpress-plugin
 * Plugin Name:       BuddyBar Widget
 * Plugin URI:        http://slushman.com/plugins/buddybar-widget
 * Description:       The BuddyBar Widget places all the links on BuddyPress’s BuddyBar in a sidebar widget.
 * Version:           0.3
 * Author:            Slushman
 * Author URI:        http://slushman.com
 * License:           GPL-0.2+
 * License URI:       http://www.gnu.org/licenses/gpl-0.2.txt
 * Text Domain:       buddybar-widget
 * Domain Path:       /assets/languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in classes/class-buddybar-widget-activator.php
 */
function activate_buddybar_widget() {
	require_once plugin_dir_path( __FILE__ ) . 'classes/class-activator.php';
	Buddybar_Widget_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in classes/class-buddybar-widget-deactivator.php
 */
function deactivate_buddybar_widget() {
	require_once plugin_dir_path( __FILE__ ) . 'classes/class-deactivator.php';
	Buddybar_Widget_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_buddybar_widget' );
register_deactivation_hook( __FILE__, 'deactivate_buddybar_widget' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'classes/class-buddybar-widget.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.2
 */
function run_buddybar_widget() {

	$plugin = new Buddybar_Widget();
	$plugin->run();

}
run_buddybar_widget();
