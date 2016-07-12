<?php

/**
 * Provides the markup for the groups links.
 */

 ?><ul id="bbw-groups" class="bbw-module">
	 <li class="bbw-module-title"><?php

		 esc_html_e( 'Groups', 'buddybar-widget' );

	 ?></li>
	 <li id="bbw-my-groups" class="bbw-module-link">
		 <a href="<?php echo esc_url( $groups_link ); ?>"><?php

			 esc_html_e( 'My Groups', 'buddybar-widget' );

		 ?></a>
	 </li>
	 <li id="bbw-invites" class="bbw-module-link">
		 <a href="<?php echo esc_url( trailingslashit( $groups_link . 'invites' ) ); ?>"><?php

			 esc_html_e( 'Invites', 'buddybar-widget' );

		 ?></a>
	 </li>
 </ul>
