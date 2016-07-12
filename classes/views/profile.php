<?php

/**
 * Provides the markup for the profile links.
 */

?><h3 class="bbw-user-link">
	<a href="<?php echo esc_url( bp_loggedin_user_link() ); ?>"><?php

		bp_loggedin_user_fullname();

	?></a>
</h3>
<div id="bbw-avatar"><?php

	bp_loggedin_user_avatar( 'type=full' );

?></div>
<ul id="bbw-profile" class="bbw-module">
	<li class="bbw-module-link">
		<a href="<?php echo esc_url( trailingslashit( $profile_link . 'edit' ) ); ?>"><?php

			esc_html_e( 'Edit Profile', 'buddybar-widget' );

		?></a>
	</li>
	<li class="bbw-module-link">
		<a href="<?php echo esc_url( trailingslashit( $profile_link . 'change-avatar' ) ); ?>"><?php

			esc_html_e( 'Change Picture', 'buddybar-widget' );

		?></a>
	</li>
	<li class="bbw-module-link">
		<a class="button logout" href="<?php echo esc_url( wp_logout_url( get_permalink() ) ); ?>" rel="nofollow" title="<?php esc_attr_e( 'Log Out', 'buddybar-widget' ); ?>"><?php

			esc_html_e( 'Log Out', 'buddybar-widget' );

		?></a>
	</li>
</ul>
