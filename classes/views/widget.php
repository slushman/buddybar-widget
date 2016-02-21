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

?><h3 class="bbw-user-link">
	<a href="<?php esc_url( bp_loggedin_user_link() ); ?>"><?php bp_loggedin_user_fullname(); ?></a>
</h3>
<div id="bbw-avatar"><?php

	bp_loggedin_user_avatar( 'type=full' );

?></div>
<ul id="bbw-profile" class="bbw-module">
	<li class="bbw-module-link">
		<a href="<?php echo esc_url( $bp->bp_options_nav['profile'][20]['link'] ); ?>"><?php

			esc_html_e( 'Edit Profile', 'buddybar-widget' );

		?></a>
	</li>
	<li class="bbw-module-link">
		<a href="<?php echo esc_url( $bp->bp_options_nav['profile'][30]['link'] ); ?>"><?php

			esc_html_e( 'Change Picture', 'buddybar-widget' );

		?></a>
	</li>
	<li class="bbw-module-link">
		<a class="button logout" href="<?php echo esc_url( wp_logout_url( get_permalink() ) ); ?>" rel="nofollow" title="<?php echo esc_attr( esc_html_e( 'Log Out', 'buddybar-widget' ) ); ?>"><?php

			esc_html_e( 'Log Out', 'buddybar-widget' );

		?></a>
	</li>
</ul><?php

$bp_array = $this->reorder_array( $bp->bp_options_nav );

foreach ( $bp_array as $key => $nav_item ) {

	if ( bp_is_active( $key ) ) {

		?><ul id="bbw-<?php echo $key; ?>" class="bbw-module">
			<li class="bbw-module-title"><?php esc_html_e( $nav_item[0], 'buddybar-widget' ); ?></li><?php

			unset( $nav_item[0] );

			foreach ( $nav_item as $opt ) {

				?><li id="bbw-<?php echo esc_attr( $opt['css_id'] ); ?>" class="bbw-module-link">
					<a href="<?php echo esc_url( $opt['link'] ); ?>"><?php

						echo $opt['name'];

					?></a>
				</li><?php

				if ( 'Inbox' == $opt['name'] && bp_message_thread_has_unread() ) {

					echo ' (' . bp_get_message_thread_unread_count() . ')';

				}

			} // End of foreach loop

		?></ul><?php

	} // End of groups active check

} // foreach