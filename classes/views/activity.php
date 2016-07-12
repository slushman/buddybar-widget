<?php

/**
 * Provides the markup for the activity links.
 */

 ?><ul id="bbw-activity" class="bbw-module">
 	<li class="bbw-module-title"><?php

 		esc_html_e( 'Activity', 'buddybar-widget' );

 	?></li>
 	<li id="bbw-personal" class="bbw-module-link">
 		<a href="<?php echo esc_url( $activity_link ); ?>"><?php

 			esc_html_e( 'Personal', 'buddybar-widget' );

 		?></a>
 	</li>
 	<li id="bbw-favorites" class="bbw-module-link">
 		<a href="<?php echo esc_url( trailingslashit( $activity_link . 'favorites' ) ); ?>"><?php

 			esc_html_e( 'Favorites', 'buddybar-widget' );

 		?></a>
 	</li>
 	<li id="bbw-mentions" class="bbw-module-link">
 		<a href="<?php echo esc_url( trailingslashit( $activity_link . 'mentions' ) ); ?>"><?php

 			esc_html_e( 'Mentions', 'buddybar-widget' );

 		?></a>
 	</li>
 </ul>
