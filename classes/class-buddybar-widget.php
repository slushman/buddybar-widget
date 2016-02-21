<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://slushman.com
 * @since      0.2
 *
 * @package    Buddybar_Widget
 * @subpackage Buddybar_Widget/classes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      0.2
 * @package    Buddybar_Widget
 * @subpackage Buddybar_Widget/classes
 * @author     Slushman <chris@slushman.com>
 */
class Buddybar_Widget {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    0.2
	 * @access   protected
	 * @var      Buddybar_Widget_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    0.2
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * Sanitizer for cleaning user input
	 *
	 * @since 		0.2
	 * @access 		private
	 * @var 		BuddyBar_Widget_Sanitize    $sanitizer    Sanitizes data
	 */
	private $sanitizer;

	/**
	 * The current version of the plugin.
	 *
	 * @since    0.2
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    0.2
	 */
	public function __construct() {

		$this->plugin_name 	= 'buddybar-widget';
		$this->version 		= '0.22';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_widget_hooks();

	} // __construct()

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Buddybar_Widget_Loader. Orchestrates the hooks of the plugin.
	 * - Buddybar_Widget_i18n. Defines internationalization functionality.
	 * - Slushman_BuddyBar_Widget. The widget.
	 * - BuddyBar_Widget_Sanitize. Sanitizes data.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    0.2
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'classes/class-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'classes/class-i18n.php';

		/**
		 * The class responsible for sanitizing user input
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'classes/class-sanitizer.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'classes/class-widget.php';

		$this->loader 		= new Buddybar_Widget_Loader();
		$this->sanitizer 	= new BuddyBar_Widget_Sanitize();

	} // load_dependencies()

	/**
	 * Register all of the hooks shared between public-facing and admin functionality
	 * of the plugin.
	 *
	 * @since 		0.2
	 * @access		private
	 */
	private function define_widget_hooks() {

		$this->loader->action( 'widgets_init', $this, 'widgets_init' );
		$this->loader->action( 'wp_enqueue_scripts', $this, 'enqueue_styles' );

	} // define_widget_hooks()

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    0.2
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( dirname( __FILE__ ) ) . 'assets/css/widget.css', array(), $this->version, 'all' );

	} // enqueue_styles()

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     0.2
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     0.2
	 * @return    Buddybar_Widget_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     0.2
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    0.2
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Buddybar_Widget_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    0.2
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Buddybar_Widget_i18n();

		$this->loader->action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	} // set_locale()

	/**
	 * Registers widgets with WordPress
	 *
	 * @since		0.2
	 * @access		public
	 */
	public function widgets_init() {

		register_widget( 'Slushman_BuddyBar_Widget' );

	} // widgets_init()

} // class
