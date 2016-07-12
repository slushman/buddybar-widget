<?php

/**
 * Handles all the public-facing functionality.
 *
 * @link       http://slushman.com
 * @since      0.3
 *
 * @package    Buddybar_Widget
 * @subpackage Buddybar_Widget/classes
 * @author     Slushman <chris@slushman.com>
 */
class Buddybar_Widget_Public {

	/**
	 * Constructor
	 */
	public function __construct() {} // __construct()

	/**
	 * Adds profile component links.
	 *
	 * @hooked 		buddybar-widget-component-menus
	 * @exits 		If component is not active.
	 */
	public function add_component_menu_profile() {

		$profile_link = trailingslashit( bp_loggedin_user_domain() . bp_get_profile_slug() );

		include( plugin_dir_path( __FILE__ ) . 'views/profile.php' );

	} // add_component_menu_profile()

	/**
	 * Adds activity component links.
	 *
	 * @hooked 		buddybar-widget-component-menus
	 * @exits 		If component is not active.
	 */
	public function add_component_menu_activity() {

		if ( ! bp_is_active( 'activity' ) ) { return; }

		$activity_link = trailingslashit( bp_loggedin_user_domain() . bp_get_activity_slug() );

		include( plugin_dir_path( __FILE__ ) . 'views/activity.php' );

	} // add_component_menu_activity()

	/**
	 * Adds messages component links.
	 *
	 * @hooked 		buddybar-widget-component-menus
	 * @exits 		If component is not active.
	 */
	public function add_component_menu_messages() {

		if ( ! bp_is_active( 'messages' ) ) { return; }

		$messages_link = trailingslashit( bp_loggedin_user_domain() . bp_get_messages_slug() );

		include( plugin_dir_path( __FILE__ ) . 'views/messages.php' );

	} // add_component_menu_messages()

	/**
	 * Adds friends component links.
	 *
	 * @hooked 		buddybar-widget-component-menus
	 * @exits 		If component is not active.
	 */
	public function add_component_menu_friends() {

		if ( ! bp_is_active( 'friends' ) ) { return; }

		$friends_link = trailingslashit( bp_loggedin_user_domain() . bp_get_friends_slug() );

		include( plugin_dir_path( __FILE__ ) . 'views/friends.php' );

	} // add_component_menu_friends()

	/**
	 * Adds groups component links.
	 *
	 * @hooked 		buddybar-widget-component-menus
	 * @exits 		If component is not active.
	 */
	public function add_component_menu_groups() {

		if ( ! bp_is_active( 'groups' ) ) { return; }

		$groups_link = trailingslashit( bp_loggedin_user_domain() . bp_get_groups_slug() );

		include( plugin_dir_path( __FILE__ ) . 'views/groups.php' );

	} // add_component_menu_groups()

} // class
