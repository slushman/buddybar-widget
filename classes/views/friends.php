<?php

/**
 * Provides the markup for the friends links.
 */

 ?><ul id="bbw-friends" class="bbw-module">
 	<li class="bbw-module-title"><?php

 		esc_html_e( 'Friends', 'buddybar-widget' );

 	?></li>
 	<li id="bbw-my-friends" class="bbw-module-link">
 		<a href="<?php echo esc_url( trailingslashit( $friends_link . 'my-friends' ) ); ?>"><?php

 			esc_html_e( 'My Friends', 'buddybar-widget' );

 		?></a>
 	</li>
 	<li id="bbw-requests" class="bbw-module-link">
 		<a href="<?php echo esc_url( trailingslashit( $friends_link . 'requests' ) ); ?>"><?php

 			esc_html_e( 'Requests', 'buddybar-widget' );

 		?></a>
 	</li>
 </ul>
