<?php

/**
 * Provides the markup for the messages links.
 */

?><ul id="bbw-messages" class="bbw-module">
	 <li class="bbw-module-title"><?php

		 esc_html_e( 'Messages', 'buddybar-widget' );

	 ?></li>
	 <li id="bbw-inbox" class="bbw-module-link">
		 <a href="<?php echo esc_url( trailingslashit( $messages_link . 'inbox' ) ); ?>"><?php

			 esc_html_e( 'Inbox', 'buddybar-widget' );

			 if ( bp_message_thread_has_unread() ) {

				 echo ' (' . bp_get_message_thread_unread_count() . ')';

			 }

		 ?></a>
	 </li>
	 <li id="bbw-sent" class="bbw-module-link">
		 <a href="<?php echo esc_url( trailingslashit( $messages_link . 'sentbox' ) ); ?>"><?php

			 esc_html_e( 'Sent', 'buddybar-widget' );

		 ?></a>
	 </li>
	 <li id="bbw-compose" class="bbw-module-link">
		 <a href="<?php echo esc_url( trailingslashit( $messages_link . 'compose' ) ); ?>"><?php

			 esc_html_e( 'Compose', 'buddybar-widget' );

		 ?></a>
	 </li>
	 <li id="bbw-notices" class="bbw-module-link">
		 <a href="<?php echo esc_url( trailingslashit( $messages_link . 'notices' ) ); ?>"><?php

			 esc_html_e( 'Notices', 'buddybar-widget' );

		 ?></a>
	 </li>
</ul>
