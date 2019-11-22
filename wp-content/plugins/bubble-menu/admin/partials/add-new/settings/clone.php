<?php
/**
 * Clone Elements Settings
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

// Elements for clone Menu 1
$menu_1_item_icon        = array(
	'name'   => 'param[item_icon][]',
	'class'  => 'icons',
	'type'   => 'select',
	'val'    => 'fas fa-hand-point-up',
	'option' => $icons_new,
);
$menu_1_item_custom      = array(
	'name'  => 'param[item_custom][]',
	'type'  => 'checkbox',
	'class' => 'custom-icon',
	'val'   => 0,
	'func'  => 'customicon(this); checkboxchecked(this);',
);
$menu_1_item_custom_link = array(
	'name'   => 'param[item_custom_link][]',
	'type'   => 'text',
	'class'  => 'custom-icon-url',
	'val'    => '',
	'option' => array(
		'placeholder' => __( 'Enter Icon URL', $this->plugin['text'] ),
	),
);

$menu_1_item_tooltip_include = array(
	'name'  => 'param[item_tooltip_include][]',
	'type'  => 'checkbox',
	'class' => 'tooltip-include',
	'val'   => 0,
	'func'  => 'checkboxchecked(this); itemtooltip(this);',
);

$menu_1_item_tooltip = array(
	'name'  => 'param[item_tooltip][]',
	'class' => 'item-tooltip',
	'type'  => 'text',
	'val'   => '',
);

$menu_1_item_tooltip_show = array(
	'name'   => 'param[item_tooltip_show][]',
	'id'     => 'item_tooltip_show',
	'class'  => '',
	'type'   => 'select',
	'val'    => '1',
	'option' => array(
		'1' => __( 'On hover', $this->plugin['text'] ),
	),
	'func'   => '',
);


$menu_1_item_type = array(
	'name'   => 'param[item_type][]',
	'type'   => 'select',
	'val'    => 'link',
	'class'  => 'item-type',
	'option' => array(
		'link'         => __( 'Link', $this->plugin['text'] ),
	),
	'func'   => 'itemtype(this);',
);

$menu_1_item_link = array(
	'name' => 'param[item_link][]',
	'type' => 'text',
	'val'  => '',
);

$menu_1_open_link = array(
	'name'   => 'param[open_link][]',
	'id'     => 'open_link',
	'class'  => '',
	'type'   => 'select',
	'val' => '_self',
	'option' => array(
		'_self'  => __( 'Same window', $this->plugin['text'] ),
	),
	'func'   => '',
);




$menu_1_item_color = array(
	'name'   => 'param[item_color][]',
	'id'     => 'item_color',
	'class'  => '',
	'val'    => 'white',
	'type'   => 'select',
	'option' => array(
		'white'  => __( 'White', $this->plugin['text'] ),
	),
	'func'   => '',
);

$menu_1_item_hcolor = array(
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



$menu_1_button_id = array(
	'name' => 'param[button_id][]',
	'type' => 'text',
	'val'  => '',
);

$menu_1_button_id_help = array(
	'text' => __( 'Set ID for element.', $this->plugin['text'] ),
);

$menu_1_button_class = array(
	'name' => 'param[button_class][]',
	'type' => 'text',
	'val'  => '',
);

$menu_1_button_class_help = array(
	'title' => __( 'Set Class for element.', $this->plugin['text'] ),
	'ul'    => array(
		__( 'You may enter several classes separated by a space.', $this->plugin['text'] ),
	),
);


$menu_1_item_icon_help = array(
	'title' => __( 'Set the icon for menu item. If you want use the custom item:', $this->plugin['text'] ),
	'ul'    => array(
		__( '1. Check the box on "custom"', $this->plugin['text'] ),
		__( '2. Upload the icon in Media Library', $this->plugin['text'] ),
		__( '3. Copy the URL to icon', $this->plugin['text'] ),
		__( '4. Paste the icon URL to field', $this->plugin['text'] ),
	),
);

$menu_1_item_tooltip_help = array(
	'text' => __( 'Set the text for menu item.', $this->plugin['text'] ),
);

$menu_1_item_type_help = array(
	'text' => __( 'Select the type of menu item. Explanation of some types:', $this->plugin['text'] ),
	'ul'   => array(
		__( '<strong>Smooth Scroll</strong> - Smooth scrolling of the page to the specified anchors on the page. Enter Link like #anchor',
			$this->plugin['text'] ),

	),
);

$menu_1_hold_open_help = array(
	'text' => __( 'When the page loads, the menu item will open.', $this->plugin['text'] ),
);