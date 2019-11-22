<?php
/**
 * GPL Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since   1.0.0
 * @package gpl
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
if( !class_exists('GPL_Core') ){
	class GPL_Core{

		/**
		 * Member Variable
		 *
		 * @var instance
		 */
		private static $instance;

		/**
		 *  Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			$this->load_plugin();
		}
		
		/**
		 * Load Plugin
		 *
		 */
		public function load_plugin(){
			add_action( 'plugins_loaded', array( $this, 'includes' ) );
		}

		/**
		 * Includes.
		 *
		 */
		public function includes() {
			require( GUTEN_POST_LAYOUT_DIR_PATH . 'classes/class-gpl-init.php' );
			require_once GUTEN_POST_LAYOUT_DIR_PATH.'src/blocks/post-grid/index.php';
			if( !defined('GUTEN_POST_LAYOUT_PRO_VERSION')){
				require_once GUTEN_POST_LAYOUT_DIR_PATH .'admin/gpl-options.php';
			}
			
		}
	}
}
GPL_Core::get_instance();
