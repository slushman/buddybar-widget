<?php

/**
 * BuddyBar Widget
 *
 * This is a class creating the widget.
 *
 * @package   BuddyBar Widget
 * @author    Slushman <chris@slushman.com>
 * @license   GPL-0.2+
 * @link      http://slushman.com/plugins/buddybar-widget
 * @copyright Copyright (c) 2015, Slushman
 */

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) { die; }

class Slushman_BuddyBar_Widget extends WP_Widget {

	/**
	 * The ID of this plugin.
	 *
	 * @since 		0.2
	 * @access 		private
	 * @var 		string 			$widget_name 		The ID of this plugin.
	 */
	private $widget_name;

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		$this->widget_name 			= 'buddybar_widget';

		$name 					= esc_html__( 'BuddyBar Widget', 'buddybar-widget' );
		$opts['classname'] 		= '';
		$opts['description'] 	= esc_html__( 'Display the BuddyPress Bar in a widget.', 'buddybar-widget' );
		$control				= array( 'width' => '', 'height' => '' );

		parent::__construct( false, $name, $opts, $control );

	} // __construct()

	/**
	 * Back-end widget form.
	 *
	 * @see		WP_Widget::form()
	 *
	 * @param	array	$instance	Previously saved values from database.
	 */
	function form( $instance ) {

		$defaults['title'] 	= 'BuddyPress';
		$instance 			= wp_parse_args( (array) $instance, $defaults );
		$title 				= $this->get_field_id( 'title' );
		$name 				= $this->get_field_name( 'title' );

		include( plugin_dir_path( __FILE__ ) . 'views/form.php' );

	} // form()

	/**
	 * Front-end display of widget.
	 *
	 * @see		WP_Widget::widget()
	 *
	 * @param	array	$args		Widget arguments.
	 * @param 	array	$instance	Saved values from database.
	 */
	function widget( $args, $instance ) {

		global $bp;

		$cache = wp_cache_get( $this->widget_name, 'widget' );

		if ( ! is_array( $cache ) ) {

			$cache = array();

		}

		if ( ! isset ( $args['widget_id'] ) ) {

			$args['widget_id'] = $this->widget_name;

		}

		if ( isset ( $cache[ $args['widget_id'] ] ) ) {

			return print $cache[ $args['widget_id'] ];

		}

		$widget_string 	= '';
		$widget_string .= $args['before_widget'];
		$filtered 		= apply_filters( 'buddybar_widget_title', $instance['title'] );
		$title 			= empty( $instance['title'] ) ? '' : $filtered;

		if ( ! empty( $title ) ) {

			$widget_string .= $args['before_title'] . $title . $args['after_title'];

		}

		ob_start();

		do_action( 'buddybar_widget_wrap_before' );

		if ( is_user_logged_in() ) {

			include( plugin_dir_path( __FILE__ ) . 'views/widget.php' );

		} else {

			include( plugin_dir_path( __FILE__ ) . 'views/login-form.php' );

		}

		do_action( 'buddybar_widget_wrap_after' );

		$widget_string .= ob_get_clean();
		$widget_string .= $args['after_widget'];

		$cache[ $args['widget_id'] ] = $widget_string;

		wp_cache_set( $this->widget_name, $cache, 'widget' );

		print $widget_string;

	} // widget()

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see		WP_Widget::update()
	 *
	 * @param	array	$new_instance	Values just sent to be saved.
	 * @param	array	$old_instance	Previously saved values from database.
	 *
	 * @return 	array	$instance		Updated safe values to be saved.
	 */
	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$fields[] = array( 'title', 'text' );

		foreach ( $fields as $field ) {

			$sanitizer = new BuddyBar_Widget_Sanitize();

			$sanitizer->set_data( $new_instance[$field[0]] );
			$sanitizer->set_type( $field[1] );

			$instance[$field[0]] = $sanitizer->clean();

		} // foreach

		return $instance;

	} // update()

	/**
	 * Reorders the nav array
	 *
	 * @access 	public
	 * @since 	0.2
	 *
	 * @return 	array 		The reordered array
	 */
	private function reorder_array( $array ) {

		$temp = array();
		$keys = array(
			array( 'activity', 	__( 'Activity', 'buddybar-widget' ) ),
			array( 'messages', 	__( 'Messages', 'buddybar-widget' ) ),
			array( 'friends', 	__( 'Friends', 'buddybar-widget' ) ),
			array( 'groups', 	__( 'Groups', 'buddybar-widget' ) )
		);

		foreach ( $keys as $key ) {

			if ( key_exists( $key[0], $array ) ) {

				$temp[$key[0]]		= $array[$key[0]];
				$temp[$key[0]][0] 	= $key[1];

			}

		} // foreach

		return $temp;

	} // reorder_array()

} // class
