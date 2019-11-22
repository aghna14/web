<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


$position  = ' ' . $param['menu'];
$shapes    = ' ' . $param['shapes'];
$animation = ' ' . $param['animation'];

$menu = '<div class="wow-bmp bmp-mobile-' . $id . $position . $shapes . $animation . '">';

$menu .= '<input type="checkbox">';

$color_class    = 'color-white hcolor-black';
$add_main_class = ! empty( $param['main_class'] ) ? ' ' . $param['main_class'] : '';

$add_main_id = ! empty( $param['main_id'] ) ? ' id="' . $param['main_id'] . '""' : '';

$menu .= '<a href="#" class="' . $color_class . $add_main_class . '"' . $add_main_id . '>';

if ( ! empty( $param['main_icon_custom'] ) ) {
	$menu .= '<img src="' . $param['main_item_custom_link'] . '">';
} else {
	$icon_color = 'color-black hcolor-white';
	$menu       .= '<i class="' . $icon_color . ' ' . $param['menu_icon'] . '"></i>';
}

$menu .= '</a>';

$menu .= '<ul>';
if ( $param['menu'] == 'wow-bmp-pos-t'
     || $param['menu'] == 'wow-bmp-pos-r'
     || $param['menu'] == 'wow-bmp-pos-b'
     || $param['menu'] == 'wow-bmp-pos-l'
) {
	$items = 9;
} else {
	$items = 5;
}

switch ( $param['menu'] ) {
	case 'wow-bmp-pos-tl':
		$tooltip_position = array( 'br', 'br', 'br', 'br', 'br', 'br' );
		break;
	case 'wow-bmp-pos-tr':
		$tooltip_position = array( 'bl', 'bl', 'bl', 'bl', 'bl', 'bl' );
		break;
	case 'wow-bmp-pos-br':
		$tooltip_position = array( 'tl', 'tl', 'tl', 'tl', 'tl', 'tl' );
		break;
	case 'wow-bmp-pos-bl':
		$tooltip_position = array( 'tr', 'tr', 'tr', 'tr', 'tr', 'tr' );
		break;
	case 'wow-bmp-pos-t':
		$tooltip_position = array( 'br', 'br', 'br', 'br', 'br', 'br', 'bl', 'bl', 'bl', 'bl' );
		break;
	case 'wow-bmp-pos-r':
		$tooltip_position = array( 'bl', 'bl', 'bl', 'bl', 'l', 'l', 'l', 'tl', 'tl', 'tl' );
		break;
	case 'wow-bmp-pos-b':
		$tooltip_position = array( 'tl', 'tl', 'tl', 'tl', 'tl', 'tr', 'tr', 'tr', 'tr', 'tr' );
		break;
	case 'wow-bmp-pos-l':
		$tooltip_position = array( 'tr', 'tr', 'tr', 'tr', 'r', 'r', 'r', 'br', 'br', 'br' );
		break;
}


$count_i = count( $param['item_type'] );

for ( $i = 0; $i < $count_i; $i ++ ) {

	$menu .= '<li>';

	$item_color = 'color-white hcolor-black';
	$add_class  = ! empty( $param['button_class'][ $i ] ) ? ' ' . $param['button_class'][ $i ] : '';

	$item_class = 'class="' . $item_color . $add_class . '"';

	$item_id = ! empty( $param['button_id'][ $i ] ) ? ' id="' . $param['button_id'][ $i ] . '""' : '';

	$item_param = $item_class . $item_id;


	$item_icon_color = 'color-black hcolor-white';
	$icon            = '<i class="' . $item_icon_color . ' ' . $param['item_icon'][ $i ] . '"></i>';


	if ( ! empty( $param['item_tooltip_include'][ $i ] ) ) {

		if ( $param['item_tooltip_show'][ $i ] == 2 ) {
			$tooltip_class = $tooltip_position[ $i ] . 'em';
		} else {
			$tooltip_class = $tooltip_position[ $i ];
		}
		$tooltip = '<em class="' . $tooltip_class . '" >' . $param['item_tooltip'][ $i ] . '</em>';
	} else {
		$tooltip = '';
	}

	$target = ! empty( $param['open_link'][ $i ] ) ? $param['open_link'][ $i ] : '_self';
	$link   = $param['item_link'][ $i ];
	$menu   .= '<a href="' . $link . '" ' . $item_param . ' target="' . $target . '">' . $icon . '</a>' . $tooltip;

	$menu .= '</li>';

}
$menu .= '</ul>';
$menu .= '</div>';
echo $menu;
