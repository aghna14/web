<?php
/**
 * Update plugin data to new version
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( get_option( 'wow_' . self::PREF . '_updater_3' ) === false ) {

	global $wpdb;
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	$table  = $wpdb->prefix . 'wow_' . self::PREF;
	$result = $wpdb->get_results( "SELECT * FROM " . $table . " order by id asc" );
	if ( count( $result ) > 0 ) {
		foreach ( $result as $key => $val ) {
			$old               = unserialize( $val->param );
			$new               = array();
			$new['menu']       = !empty($old['menu']) ? $old['menu'] : 'wow-bmp-pos-t';
			$new['shapes']     = '';
			$new['animation']  = '';
			$new['menu_icon']  = 'fas fa-bars';
			$new['color']      = 'white';
			$new['hcolor']     = 'black';
			$new['main_id']    = '';
			$new['main_class'] = '';
			$new['show'] = 'all';

			$count_i = ( ! empty( $old['item_link'] ) ) ? count( $old['item_link'] ) : '0';
			if ( $count_i > 0 ) {
				for ( $i = 1; $i <= $count_i; $i ++ ) {
					$new_i                      = $i - 1;
					$new['item_type'][ $new_i ] = 'link';

					$new['item_icon'][ $new_i ] = 'fas fa-info';

					$new['item_link'][ $new_i ] = ! empty( $old['item_link'][ $i ] ) ? $old['item_link'][ $i ] : '';

					$new['item_tooltip_include'][ $new_i ] = ! empty( $old['item_tooltip_include'][ $i ] )
						? $old['item_tooltip_include'][ $i ] : '';

					$new['item_tooltip'][ $new_i ] = ! empty( $old['item_tooltip'][ $i ] ) ? $old['item_tooltip'][ $i ]
						: '';

					$new['item_tooltip_show'][ $new_i ] = '1';
					$new['open_link'][ $new_i ]         = '_self';
					$new['item_color'][ $new_i ]        = 'white';
					$new['item_hcolor'][ $new_i ]       = 'black';
					$new['button_id'][ $new_i ]         = '';
					$new['button_class'][ $new_i ]      = '';
				}
			}
			$param = serialize( $new );
			$wpdb->update( $table, array('param' => $param),  array( 'id' => $val->id ) );

		}
	}

	update_option( 'wow_' . self::PREF . '_updater_3', '3.0' );
}
