<?php

/**
 * Provides the public-facing markup for the BuddyBar widget.
 *
 * @link       http://slushman.com
 * @since      0.2
 *
 * @package    BuddyBar Widget
 * @subpackage BuddyBar Widget/classes/views
 */

do_action( 'bp_before_sidebar_login_form' );

?><p id="login-text"><?php

	esc_html_e( 'To edit your profile, please log in.', 'buddybar-widget' );

?></p><?php

wp_login_form();

if ( bp_get_signup_allowed() ) {

	printf( wp_kses( __( '<a href="%s" title="Create an account">Create an account</a> to log in.', 'buddybar-widget' ), array( 'a' => array( 'href' => array(), 'title' => array() ) ) ), bp_get_signup_page() );

} // End of bp_get_signup_allowed check

do_action( 'bp_after_sidebar_login_form' );