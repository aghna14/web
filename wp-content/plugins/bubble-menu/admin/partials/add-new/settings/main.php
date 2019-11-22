<?php
/**
 * Main Settings param
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

include_once( 'icons.php' );
$icons_new = array();
foreach ( $icons as $key => $value ) {
  $icons_new[ $value ] = $value;
}

// Position of the menu
$menu = array(
	'id'     => 'position',
	'name'   => 'param[menu]',
	'type'   => 'select',
	'val'    => isset( $param['menu'] ) ? $param['menu'] : 'wow-bmp-pos-t',
	'option' => array(
		'wow-bmp-pos-t'  => __( 'Top (max 9 items)', $this->plugin['text'] ),
		'wow-bmp-pos-r'  => __( 'Right (max 9 items)', $this->plugin['text'] ),
		'wow-bmp-pos-b'  => __( 'Bottom (max 9 items)', $this->plugin['text'] ),
		'wow-bmp-pos-l'  => __( 'Left (max 9 items)', $this->plugin['text'] ),
		'wow-bmp-pos-tl' => __( 'Top-left (max 5 items)', $this->plugin['text'] ),
		'wow-bmp-pos-tr' => __( 'Top-right (max 5 items)', $this->plugin['text'] ),
		'wow-bmp-pos-br' => __( 'Bottom-right (max 5 items)', $this->plugin['text'] ),
		'wow-bmp-pos-bl' => __( 'Bottom-left (max 5 items)', $this->plugin['text'] ),
	),
);

// Menu position help
$menu_help = array(
	'text' => __( 'Specify menu position on screen.', $this->plugin['text'] ),
);

// Button shapes
$shapes = array(
	'name'   => 'param[shapes]',
	'id'     => 'shapes',
	'class'  => '',
	'type'   => 'select',
	'val'    => isset( $param['shapes'] ) ? $param['shapes'] : '',
	'option' => array(
		'' => __( 'Circle', $this->plugin['text'] ),

	),
	'func'   => '',
);


// Button shapes help
$shapes_help = array(
	'text' => __( 'Choose the shape for menu buttons.', $this->plugin['text'] ),
);

// Animation
$animation = array(
	'name'   => 'param[animation]',
	'id'     => 'animation',
	'class'  => '',
	'type'   => 'select',
	'val'    => isset( $param['animation'] ) ? $param['animation'] : '',
	'option' => array(
		'' => __( 'One by one', $this->plugin['text'] ),
	),
);


// Animation help
$animation_help = array(
	'text' => __( 'Set the animation effect for opening menu.', $this->plugin['text'] ),
);


// Icon
$menu_icon = array(
	'name'   => 'param[menu_icon]',
	'class'  => 'icons',
	'type'   => 'select',
	'val'    => isset( $param['menu_icon'] ) ? $param['menu_icon'] : 'fas fa-hand-point-up',
	'option' => $icons_new,
);




// Color
$color = array(
	'name'   => 'param[color]',
	'id'     => 'color',
	'class'  => '',
	'type'   => 'select',
	'val'    => isset( $param['color'] ) ? $param['color'] : '',
	'option' => array(
		'white'  => __( 'White', $this->plugin['text'] ),
	),
	'func'   => '',
);

// Hover color
$hcolor = array(
	'name'   => 'param[hcolor]',
	'id'     => 'hcolor',
	'class'  => '',
	'type'   => 'select',
	'val'    => 'black',
	'option' => array(
		'black'  => __( 'Black', $this->plugin['text'] ),
	),
);

$main_id = array(
	'name' => 'param[main_id]',
	'id'   => 'main_id',
	'type' => 'text',
	'val'  => isset( $param['main_id'] ) ? $param['main_id'] : '',
);

$main_id_help = array(
	'text' => __( 'Set ID for element.', $this->plugin['text'] ),
);

$main_class = array(
	'name' => 'param[main_class]',
	'id'   => 'main_class',
	'type' => 'text',
	'val'  => isset( $param['main_class'] ) ? $param['main_class'] : '',
);

$main_class_help = array(
	'title' => __( 'Set Class for element.', $this->plugin['text'] ),
	'ul'    => array(
		__( 'You may enter several classes separated by a space.', $this->plugin['text'] ),
	)
);

//
$hold_open_help = array(
	'text' => __( 'Hold menu open. The user can hide the menu when the click by the main button', $this->plugin['text'] ),
);