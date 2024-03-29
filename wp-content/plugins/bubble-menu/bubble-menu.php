<?php
/**
 * Plugin Name:       Bubble Menu Lite
 * Plugin URI:        https://wordpress.org/plugins/bubble-menu
 * Description:       Creating awesome circle menu with icons.
 * Version:           2.0
 * Author:            Wow-Company
 * Author URI:        https://wow-estore.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bubble-menu
 * Domain Path:       /languages
 *
 * PHP version 5.3.0
 *
 * @category    Wordpress_Plugin
 * @package     Wow_Plugin
 * @author      Dmytro Lobov <i@wpbiker.com>
 * @copyright   2019 Wow-Company
 * @license     GNU Public License
 * @version     1.1
 */

// Required set the namespace for plugin.
namespace bubble_menu_lite;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Wow_Plugin' ) ) :

	/**
	 * Main Wow_Plugin Class.
	 *
	 * @since 1.0
	 */
	final class Wow_Plugin {

		private static $_instance;

		// Set the database name.
		const PREF = 'bmp';

		/**
		 * Main Wow_Plugin Instance.
		 *
		 * Insures that only one instance of Wow_Plugin exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @return object|Wow_Plugin The one true Wow_Plugin for Current plugin
		 *
		 * @uses      Wow_Plugin::_includes() Include the required files.
		 * @uses      Wow_Plugin::text_domain() load the language files.
		 * @since     1.0
		 * @static
		 * @staticvar array $instance
		 */
		public static function instance() {

			if ( ! isset( self::$_instance ) && ! ( self::$_instance instanceof Wow_Plugin ) ) {

				$info = array(
					'plugin' => array(
						'name'      => esc_attr__( 'Bubble Menu', 'bubble-menu' ), // Plugin name
						'menu'      => esc_attr__( 'Bubble Menu', 'bubble-menu' ), // Plugin name in menu
						'author'    => 'Wow-Company', // Author
						'prefix'    => self::PREF, // Prefix for database
						'text'      => 'bubble-menu',    // Text domain for translate files
						'version'   => '2.0', // Current version of the plugin
						'file'      => __FILE__, // Main file of the plugin
						'slug'      => dirname( plugin_basename( __FILE__ ) ), // Name of the plugin folder
						'url'       => plugin_dir_url( __FILE__ ), // filesystem directory path for the plugin
						'dir'       => plugin_dir_path( __FILE__ ), // URL directory path for the plugin
						'shortcode' => 'Bubble-Menu',

					),
					'url'    => array(
						'author'   => 'https://wow-estore.com/',
						'home'     => 'https://wordpress.org/plugins/bubble-menu',
						'support'  => 'https://wordpress.org/support/plugin/bubble-menu/',
						'facebook' => 'https://www.facebook.com/wowaffect/',
					),
					'rating' => array(
						'website' => esc_attr__( 'Wow-Estore', 'bubble-menu' ), // Name site for rating plugin
						'url'     => 'https://wordpress.org/support/plugin/bubble-menu/reviews/#new-post',
					),
				);

				self::$_instance = new Wow_Plugin;

				register_activation_hook( __FILE__, array( self::$_instance, 'plugin_activate' ) );
				register_deactivation_hook( __FILE__, array( self::$_instance, 'plugin_deactivate' ) );

				add_action( 'plugins_loaded', array( self::$_instance, 'text_domain' ) );
				add_action( 'admin_init', array( self::$_instance, 'create_field' ) );
				add_action( 'admin_init', array( self::$_instance, 'plugin_updater') );

				self::$_instance->_includes();
				self::$_instance->admin  = new Wow_Plugin_Admin( $info );
				self::$_instance->public = new Wow_Plugin_Public( $info );
			}

			return self::$_instance;
		}

		/**
		 * Throw error on object clone.
		 * The whole idea of the singleton design pattern is that there is a single
		 * object therefore, we don't want the object to be cloned.
		 *
		 * @return void
		 * @since  1.0
		 * @access protected
		 */
		public function __clone() {
			// Cloning instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, esc_attr__( 'Cheatin&#8217; huh?', 'bubble-menu' ), '0.1' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @return void
		 * @since  1.0
		 * @access protected
		 */
		public function __wakeup() {
			// Unserializing instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, esc_attr__( 'Cheatin&#8217; huh?', 'bubble-menu' ), '0.1' );
		}


		/**
		 * Include required files.
		 *
		 * @access private
		 * @return void
		 * @since  1.0
		 */
		private function _includes() {
			if ( ! class_exists( 'Wow_Company' ) ) {
				include_once 'includes/class-wow-company.php';
			}

			include_once 'includes/class-db.php';
			include_once 'admin/class-admin.php';
			include_once 'public/class-public.php';
		}

		/**
		 * Activate the plugin.
		 * create the database
		 * create the folder in wp-upload
		 *
		 * @access public
		 * @return void
		 * @since  1.0
		 */
		public function plugin_activate() {
			update_option( 'wow_' . self::PREF . '_notice_action', 'read' );
			self::create_field();
			include_once 'includes/plugin-activation.php';
		}

		/**
		 * Deactivate the plugin.
		 * delete the plugin folder and files from wp-upload
		 *
		 * @access public
		 * @since  1.0
		 */
		public function plugin_deactivate() {
			include_once 'includes/plugin-deactivation.php';
		}


		/**
		 * Create the plugin field in wp-upload.
		 * Create the folder when the plugin update
		 *
		 * @access public
		 * @return void
		 * @since  1.0
		 */
		public function create_field() {
			$upload  = wp_upload_dir();
			$field   = dirname( plugin_basename( __FILE__ ) );
			$basedir = $upload['basedir'] . '/' . $field . '/';
			if ( ! file_exists( $basedir ) ) {
				wp_mkdir_p( $basedir );
			}
		}

		/*
		 * Update the plugin option to version 3.0
		 */

		public function plugin_updater() {			
			include 'includes/plugin-updater.php';
		}

		/**
		 * Download the folder with languages.
		 *
		 * @access public
		 * @return void
		 * @since  1.0
		 */
		public function text_domain() {
			$languages_folder = dirname( plugin_basename( __FILE__ ) ) . '/languages/';
			load_plugin_textdomain( 'bubble-menu', false, $languages_folder );
		}
	}

endif; // End if class_exists check.

/**
 * The main function for that returns Wow_Plugin
 *
 * @since 1.0
 */
function Wow_Plugin_run() {
	return Wow_Plugin::instance();
}

// Get Running.
Wow_Plugin_run();
