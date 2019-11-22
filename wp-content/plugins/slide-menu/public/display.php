<?php 
	/**
		* Display
		*
		* @package     Public
		* @subpackage  
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       2.0
	*/
	
	if ( ! defined( 'ABSPATH' ) ) exit;
	
	global $wpdb;    
	$table = $wpdb->prefix . "wow_".self::PREF;   
	$arrresult = $wpdb->get_results("SELECT * FROM " . $table . " order by id asc");
	if (count($arrresult) > 0) {		
		foreach ($arrresult as $key => $val) {
			$param = unserialize($val->param);			
			echo do_shortcode('['.$this->shortcode.' id='.$val->id.']');			
		}
	}
	
	
