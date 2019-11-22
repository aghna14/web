<?php if ( ! defined( 'ABSPATH' ) ) exit; 	
	$menu = '<nav class="wsm-spmenu wsm-spmenu-vertical wsm-spmenu-left">';	
	$menu .= '<div class="wsm-menu-trigger wsm-menu-trigger-'.$param['button'].'" id="wsm-button"><span>Menu</span></div>';
	
	$count_i = count($param['menu_1']['item_type']);	
	for ($i=0; $i<$count_i; $i++){
		
		$class = 'class="wsm-icon fa '.$param['menu_1']['item_icon'][$i].'"';		
		$name = $param['menu_1']['item_tooltip'][$i];			
		
		$menu .= '<a href="'.$param['menu_1']['item_link'][$i].'" '.$class.'>'.$name.'</a>';
	}	
	$menu .= '</nav>';
	
	echo $menu;
	
	
?>