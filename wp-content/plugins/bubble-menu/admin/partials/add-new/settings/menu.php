<?php
/**
 * Settings
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */


$count_i = ( ! empty( $param['item_type'] ) ) ? count( $param['item_type'] ) : '0';
if ( $count_i > 0 ) {
	for ( $i = 0; $i < $count_i; $i ++ ) {

		// Order of the menu
//    $item_order_[ $i ] = array (
//    	'name' => 'param[item_order][]',
//    	'id'   => 'item_order',
//    	'type' => 'hidden',
//    	'val'  => isset( $param['item_order'][ $i ] ) ? $param['item_order'][ $i ] : '',
//    );

		// Icon
		$item_icon_[ $i ] = array(
			'name'   => 'param[item_icon][]',
			'class'  => 'icons',
			'type'   => 'select',
			'val'    => isset( $param['item_icon'][ $i ] ) ? $param['item_icon'][ $i ] : 'fas fa-hand-point-up',
			'option' => $icons_new,
		);

		$item_tooltip_include_[ $i ] = array(
			'name'  => 'param[item_tooltip_include][]',
			'type'  => 'checkbox',
			'class' => 'tooltip-include',
			'val'   => isset( $param['item_tooltip_include'][ $i ] ) ? $param['item_tooltip_include'][ $i ] : 0,
			'func'  => 'checkboxchecked(this); itemtooltip(this);',
		);

		// Label for item
		$item_tooltip_[ $i ] = array(
			'name'  => 'param[item_tooltip][]',
			'class' => 'item-tooltip',
			'type'  => 'text',
			'val'   => isset( $param['item_tooltip'][ $i ] ) ? $param['item_tooltip'][ $i ] : '',
		);

		$item_tooltip_show_[ $i ] = array(
			'name'   => 'param[item_tooltip_show][]',
			'class'  => '',
			'type'   => 'select',
			'val'    => isset( $param['item_tooltip_show'][ $i ] ) ? $param['item_tooltip_show'][ $i ] : '',
			'option' => array(
				'1' => __( 'On hover', $this->plugin['text'] ),
			),
			'func'   => '',
		);


//    $smooth = isset( $param[ 'menu_1' ][ 'scroll' ][ $i ] ) ? $param[ 'menu_1' ][ 'scroll' ][ $i ] : '';

		// Type of the item
		$item_type_[ $i ] = array(
			'name'   => 'param[item_type][]',
			'type'   => 'select',
			'class'  => 'item-type',
			'val'    => isset( $param['item_type'][ $i ] ) ? $param['item_type'][ $i ] : '',
			'option' => array(
				'link'         => __( 'Link', $this->plugin['text'] ),
			),
			'func'   => 'itemtype(this);',
		);


		// Link URL
		$item_link_[ $i ] = array(
			'name' => 'param[item_link][]',
			'type' => 'text',
			'val'  => isset( $param['item_link'][ $i ] ) ? $param['item_link'][ $i ] : '',
		);


		$open_link_[ $i ] = array(
			'name'   => 'param[open_link][]',
			'id'     => 'open_link',
			'class'  => '',
			'type'   => 'select',
			'val'    => isset( $param['open_link'][ $i ] ) ? $param['open_link'][ $i ] : '',
			'option' => array(
				'_self'  => __( 'Same window', $this->plugin['text'] ),
			),
			'func'   => '',
		);

		// Smooth scroll
//    $scroll_[ $i ] = array(
//      'name'  => 'param[menu_1][scroll][]',
//      'class' => '',
//      'type'  => 'checkbox',
//      'val'   => isset( $param[ 'menu_1' ][ 'scroll' ][ $i ] ) ? $param[ 'menu_1' ][ 'scroll' ][ $i ] : 0,
//      'func'  => '',
//      'sep'   => '',
//    );

		$item_color_[ $i ] = array(
			'name'   => 'param[item_color][]',
			'id'     => 'item_color',
			'class'  => '',
			'type'   => 'select',
			'val'    => 'white',
			'option' => array(
				'white'  => __( 'White', $this->plugin['text'] ),
			),
			'func'   => '',
		);

		$item_hcolor_[ $i ] = array(
			'name'   => 'param[item_hcolor][]',
			'id'     => 'item_color',
			'class'  => '',
			'type'   => 'select',
			'val'    => 'black',
			'option' => array(
				'black'  => __( 'Black', $this->plugin['text'] ),
			),
			'func'   => '',
		);

		$button_id_[ $i ] = array(
			'name' => 'param[button_id][]',
			'type' => 'text',
			'val'  => isset( $param['button_id'][ $i ] ) ? $param['button_id'][ $i ] : '',
		);

		$button_class_[ $i ] = array(
			'name' => 'param[button_class][]',
			'type' => 'text',
			'val'  => isset( $param['button_class'][ $i ] ) ? $param['button_class'][ $i ] : '',
		);



	}

}


$item_icon_help = array(
	'title' => __( 'Set the icon for menu item. If you want use the custom item:', $this->plugin['text'] ),
	'ul'    => array(
		__( '1. Check the box on "custom"', $this->plugin['text'] ),
		__( '2. Upload the icon in Media Library', $this->plugin['text'] ),
		__( '3. Copy the URL to icon', $this->plugin['text'] ),
		__( '4. Paste the icon URL to field', $this->plugin['text'] ),
	),
);

$item_tooltip_help = array(
	'text' => __( 'Set the text for menu item.', $this->plugin['text'] ),
);

$item_type_help = array(
	'text' => __( 'Select the type of menu item. Explanation of some types:', $this->plugin['text'] ),
	'ul'   => array(
		__( '<strong>Smooth Scroll</strong> - Smooth scrolling of the page to the specified anchors on the page.',
			$this->plugin['text'] ),
		__( '<strong>ShiftNav Menu</strong> - open the menu, wich create via the plugin ShiftNav.',
			$this->plugin['text'] ),
	),
);

$hold_open_help = array(
	'text' => __( 'When the page loads, the menu item will open.', $this->plugin['text'] ),
);

$button_id_help = array(
	'text' => __( 'Set the attribute ID for the menu item or left empty.', $this->plugin['text'] ),
);

$button_class_help = array(
	'text' => __( 'Set the attribute CLASS for the menu item or left empty.', $this->plugin['text'] ),
);