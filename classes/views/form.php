<?php

/**
 * Provides the form markup for the BuddyBar widget.
 *
 * @link       http://slushman.com
 * @since      0.2
 *
 * @package    BuddyBar Widget
 * @subpackage BuddyBar Widget/classes/views
 */

?><p>
	<label for="<?php echo esc_attr( $title ); ?>"><?php esc_html_e( 'BuddyBar Widget', 'buddybar-widget' ); ?>:
		<input class="widefat" id="<?php echo esc_attr( $title ); ?>" name="<?php echo esc_attr( $name ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
	</label>
</p>