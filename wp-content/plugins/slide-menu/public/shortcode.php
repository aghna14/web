<?php 
	/**
		* Shortcode
		*
		* @package     Public
		* @subpackage  
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       2.1
	*/
	
	if ( ! defined( 'ABSPATH' ) ) exit;
	
	extract(shortcode_atts(array('id' => ""), $atts));		
	global $wpdb;
	$table = $wpdb->prefix . "wow_".self::PREF;    
	$sSQL = $wpdb->prepare("select * from $table WHERE id = %d", $id);
	$arrresult = $wpdb->get_results($sSQL); 	
	if (count($arrresult) > 0) {
		foreach ($arrresult as $key => $val) {
			$param = unserialize($val->param);				
			ob_start();
			include( 'partials/public.php' );
			$menu = ob_get_contents();
			ob_end_clean();				
			echo $menu;
			wp_enqueue_style( $this->pluginname.'-style', plugin_dir_url( __FILE__ ). 'css/style.css', null, $this->version);
			wp_enqueue_script( $this->pluginname.'-slideMenu', plugin_dir_url( __FILE__ ). 'js/slideMenu.js', array( 'jquery' ), $this->version );
			wp_enqueue_style( $this->pluginname.'-font-awesome', $this->pluginurl . 'asset/font-awesome/css/font-awesome.min.css', array(), '4.7.0' );
		}
	}		
return ;