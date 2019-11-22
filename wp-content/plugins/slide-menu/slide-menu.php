<?php
/**
 * Plugin Name:       Slide Menu
 * Plugin URI:        https://wordpress.org/plugins/slide-menu/
 * Description:       Create the bright slide-out menu.
 * Version:           2.1
 * Author:            Wow-Company
 * Author URI:        http://wow-company.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
  */
if ( ! defined( 'WPINC' ) ) {die;}

if ( ! defined( 'WPINC' ) ) {die;}
	// Declaration Wow-Company class
	if( !class_exists( 'Wow_Company' )) {
		require_once plugin_dir_path( __FILE__ ) . 'asset/class-wow-company.php';				
	}	
	if( !class_exists( 'WOW_DATA' )) {
		require_once plugin_dir_path( __FILE__ ) . 'include/class/data.php';
	}
	if( !class_exists( 'JavaScriptPacker' )) {
		require_once plugin_dir_path( __FILE__ ) . 'include/class/packer.php';
	}	
	
	// Declaration of the plugin class
	if( !class_exists( 'Slide_Menu_Class' ) ) {
		class Slide_Menu_Class
		{	
			const PREF = 'sbmp';
			
			function __construct() {
				$this->name = 'Slide Menu';
				$this->menuname = 'Slide Menu';
				$this->version = '2.1';				
				$this->pluginname = dirname(plugin_basename(__FILE__));
				$this->plugindir = plugin_dir_path( __FILE__ );
				$this->pluginurl = plugin_dir_url( __FILE__ );	
				$this->plugin_url = 'slide-menu';		
				$this->shortcode = 'Slide-Menu';
				
				// activate & diactivate
				register_activation_hook( __FILE__, array($this, 'plugin_activate' ) );
				register_deactivation_hook( __FILE__, array($this, 'plugin_deactivate') );
				
				// admin pages
				add_action( 'admin_menu', array($this, 'add_menu_page') );
				
				// show on front end
				add_shortcode('Slide-Menu', array($this, 'shortcode') );
				add_action( 'wp_footer', array($this, 'display') );
				
				add_filter( 'plugin_row_meta', array($this, 'row_meta'), 10, 4 );
				add_filter( 'plugin_action_links', array($this, 'action_links'), 10, 2 );				
				
			}				
			
			// Activate & diactivate
			function plugin_activate() {
				require_once plugin_dir_path( __FILE__ ) . 'include/activator.php';	
			}
			function plugin_deactivate() {	
				require_once plugin_dir_path( __FILE__ ) . 'include/deactivator.php';
			}
			
			// AdminPanel
			function add_menu_page() {
				add_submenu_page('wow-company', $this->name.' version '.$this->version, $this->menuname, 'manage_options', $this->pluginname, array( $this, 'plugin_admin' ));
			}
			function plugin_admin() {
				require_once plugin_dir_path( __FILE__ ) . 'admin/index.php';			
			}		
			
			// Show on Front end
			function shortcode($atts) {
				require plugin_dir_path( __FILE__ ) . 'public/shortcode.php';
			}
			function display() {
				require plugin_dir_path( __FILE__ ) . 'public/display.php';
			}
			
			// Admin links
			function row_meta( $meta, $plugin_file ){
				if( false === strpos( $plugin_file, basename(__FILE__) ) )
				return $meta;
				$meta[] = '<a href="https://wow-estore.com/item/slide-menu-pro/" target="_blank">Pro version</a>';
				return $meta;
			}
			function action_links( $actions, $plugin_file ){
				if( false === strpos( $plugin_file, basename(__FILE__) ) )
				return $actions;
				$settings_link = '<a href="admin.php?page='. $this->pluginname .'">Settings</a>'; 
				array_unshift( $actions, $settings_link ); 
				return $actions; 
			}			
		}
		$plugin = new Slide_Menu_Class();		
	}