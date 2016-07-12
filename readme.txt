=== BuddyBar Widget ===
Contributors: slushman
Donate link: http://slushman.com
Tags: buddypress, buddybar, widget
Requires at least: 2.9.1
Tested up to: 4.5
Stable tag: 0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-0.2.html

The BuddyBar Widget places all the links on BuddyPress’s BuddyBar in a sidebar widget.



== Description ==

The BuddyBar Widget places all the links on BuddyPress’s BuddyBar in a sidebar widget, so you can hide the BuddyBar without losing all the functionality.

** Requires [BuddyPress](https://wordpress.org/plugins/buddypress/) to be installed and activated. **

Features

* When a user is not logged in, the widget shows a login form (with a link to the registration page at the bottom)
* When a user is logged in, it shows all the links a user would need to manage their account
* The BuddyBar links are based on what BuddyPress components are activated.
* Multiple Instances are possible.



== Installation ==

1. Install and activate BuddyPress (if not already)
2. Upload the BuddyBar Widget folder to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Drag the BuddyBar Widget to a sidebar on the 'Widgets' page under the 'Appearance' menu



== Frequently Asked Questions ==

= What if I don't have certain BuddyPress components turned on? =

The widget only shows links for the components that are turned on.



== Screenshots ==

1. When the user is logged out of BuddyPress
2. When the user is logged into BuddyPress and only the Extended Profiles component turned on
3. With all the BuddyPress components on



== Changelog ==

= 0.3 =
* Fixed missing links issue.
* Manually building each link since BuddyPress has deprecated the use of the globals.
* Added buddybar-widget-component-menus action hook and hooked functions for each links view there.
* Added class-public.php file for each links functions.
* Removed reorder_array function. No longer needed.
* Removed widget.php view file. No longer needed.

= 0.22 =
* Restructured plugin to my custom WPPB structure.
* Found and added additional text for translation.
* Generated a POT file for translations.

= 0.21 =
* I hate subversion.

= 0.2 =
* Restructured plugin using WordPress Plugin Boilerplate.
* Ensured compatibility with WordPress 4.3 and BuddyPress 2.3.
* Better escaping and translatability.
* Removed floats from module styling.

= 0.15 =
Added support for Buddypress 1.5.
Updated deprecated function for user profile link.

= 0.1 =
Plugin created.



== Upgrade Notice ==

= 0.3 =
Fixed missing links issue.

= 0.22 =
Added all text and a POT file for translation.

= 0.21 =
Fully compatible with WordPress 4.3 and BuddyPress 2.3!

= 0.15 =
Added support for Buddypress 1.5 and updated user profile link from deprecated code.

= 0.1 =
Plugin released.
