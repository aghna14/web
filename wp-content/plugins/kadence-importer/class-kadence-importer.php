<?php
/**
 * Importer class.
 *
 * @package Kadence Importer
 */

/**
 * Block direct access to the main plugin file.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Main plugin class with initialization tasks.
 */
class Kadence_Importer {
	/**
	 * Instance of this class
	 *
	 * @var null
	 */
	private static $instance = null;
	/**
	 * Instance Control
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	/**
	 * Construct function
	 */
	public function __construct() {
		// Set plugin constants.
		$this->set_plugin_constants();
		// Composer autoloader.
		require_once KADENCE_IMPORTER_PATH . 'vendor/autoload.php';
		require_once KADENCE_IMPORTER_PATH . 'kadencethemes/theme-setups.php';

		// Instantiate the main plugin class *Singleton*.
		$pt_one_click_demo_import = OCDI\OneClickDemoImport::get_instance();

		add_filter( 'plugin_action_links_kadence-importer/kadence-importer.php', array( $this, 'add_settings_link' ) );
	}

	/**
	 * Add settings link
	 *
	 * @param array $links holds plugin links.
	 */
	public function add_settings_link( $links ) {
		$settings_link = '<a href="' . admin_url( 'tools.php?page=kadence-importer' ) . '">' . __( 'Importer', 'kadence-importer' ) . '</a>';
		array_push( $links, $settings_link );
		return $links;
	}


	/**
	 * Set plugin constants.
	 *
	 * Path/URL to root of this plugin, with trailing slash and plugin version.
	 */
	private function set_plugin_constants() {
		// Path/URL to root of this plugin, with trailing slash.
		if ( ! defined( 'KADENCE_IMPORTER_PATH' ) ) {
			define( 'KADENCE_IMPORTER_PATH', plugin_dir_path( __FILE__ ) );
		}
		if ( ! defined( 'KADENCE_IMPORTER_URL' ) ) {
			define( 'KADENCE_IMPORTER_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );
		}
		if ( ! defined( 'PT_OCDI_PATH' ) ) {
			define( 'PT_OCDI_PATH', plugin_dir_path( __FILE__ ) );
		}
		if ( ! defined( 'PT_OCDI_URL' ) ) {
			define( 'PT_OCDI_URL', plugin_dir_url( __FILE__ ) );
		}
		// Action hook to set the plugin version constant.
		add_action( 'admin_init', array( $this, 'set_plugin_version_constant' ) );
	}


	/**
	 * Set plugin version constant -> PT_OCDI_VERSION.
	 */
	public function set_plugin_version_constant() {
		if ( ! defined( 'KADENCE_IMPORTER_VERSION' ) ) {
			$plugin_data = get_plugin_data( __FILE__ );
			define( 'KADENCE_IMPORTER_VERSION', $plugin_data['Version'] );
		}
		if ( ! defined( 'PT_OCDI_VERSION' ) ) {
			define( 'PT_OCDI_VERSION', '2.5.1' );
		}
	}
}
Kadence_Importer::get_instance();
