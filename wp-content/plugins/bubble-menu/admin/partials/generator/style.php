/* ========= INFORMATION ============================
- document:  Bubble Menu - easily create a flyouts bubble menu.
- url:       https://wow-estore.com/item/bubble-menu-pro/
- author:    Wow-Company
- profile:   https://wow-estore.com/
- version:   2.0
- email:     support@wow-company.com
==================================================== */

<?php if ( ! defined( 'ABSPATH' ) ) exit;
	
	if($param['menu'] == 'wow-bmp-pos-tl'){
		$count_i = count($param['item_type']);
		switch ($count_i) {
			case 1:
			echo "
			.wow-bmp-pos-tl input:checked ~ ul li:nth-child(1) {
			top: 262.5%;
			left: 262.5%;
			}";
			break;
			case 2:
			echo "
			.wow-bmp-pos-tl input:checked ~ ul li:nth-child(1) {
			top: 165.625%;
			left: 328.125%;
			}
			.wow-bmp-pos-tl input:checked ~ ul li:nth-child(2) {
			top: 328.125%;
			left: 165.625%;
			}			
			";
			break;
			case 3:
			echo "
			.wow-bmp-pos-tl input:checked ~ ul li:nth-child(1) {
			left: 350%;
			}
			.wow-bmp-pos-tl input:checked ~ ul li:nth-child(2) {
			top: 262.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-tl input:checked ~ ul li:nth-child(3) {
			top: 350%;
			left: 50%;
			}
			";
			break;
			case 4:
			echo "
			.wow-bmp-pos-tl input:checked ~ ul li:nth-child(1) {
			left: 350%;
			}
			.wow-bmp-pos-tl input:checked ~ ul li:nth-child(2) {
			top: 165.625%;
			left: 328.125%;
			}
			.wow-bmp-pos-tl input:checked ~ ul li:nth-child(3) {
			top: 262.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-tl input:checked ~ ul li:nth-child(4) {
			top: 328.125%;
			left: 165.625%;
			}
			";
			break;
			case 5:
			echo "
			.wow-bmp-pos-tl input:checked ~ ul li:nth-child(1) {
			left: 350%;
			}
			.wow-bmp-pos-tl input:checked ~ ul li:nth-child(2) {
			top: 165.625%;
			left: 328.125%;
			}
			.wow-bmp-pos-tl input:checked ~ ul li:nth-child(3) {
			top: 262.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-tl input:checked ~ ul li:nth-child(4) {
			top: 328.125%;
			left: 165.625%;
			}
			.wow-bmp-pos-tl input:checked ~ ul li:nth-child(5) {
			top: 350%;
			left: 50%;
			}
			";
			break;
		}		
	}				
	
	elseif($param['menu'] == 'wow-bmp-pos-tr'){
		$count_i = count($param['item_type']);
		switch ($count_i) {
			case 1:
			echo "
			.wow-bmp-pos-tr input:checked ~ ul li:nth-child(1) {
			top: 262.5%;
			left: -162.5%;
			}";
			break;
			case 2:
			echo "
			.wow-bmp-pos-tr input:checked ~ ul li:nth-child(1) {
			top: 328.125%;
			left: -65.625%;
			}
			.wow-bmp-pos-tr input:checked ~ ul li:nth-child(2) {
			top: 165.625%;
			left: -228.125%;
			}			
			";
			break;
			case 3:
			echo "
			.wow-bmp-pos-tr input:checked ~ ul li:nth-child(1) {
			top: 350%;
			left: 50%;
			}
			.wow-bmp-pos-tr input:checked ~ ul li:nth-child(2) {
			top: 262.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-tr input:checked ~ ul li:nth-child(3) {
			left: -250%;
			}
			";
			break;
			case 4:
			echo "
			.wow-bmp-pos-tr input:checked ~ ul li:nth-child(1) {
			top: 350%;
			left: 50%;
			}
			.wow-bmp-pos-tr input:checked ~ ul li:nth-child(2) {
			top: 328.125%;
			left: -65.625%;
			}
			.wow-bmp-pos-tr input:checked ~ ul li:nth-child(3) {
			top: 262.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-tr input:checked ~ ul li:nth-child(4) {
			top: 165.625%;
			left: -228.125%;
			}
			";
			break;
			case 5:
			echo "
			.wow-bmp-pos-tr input:checked ~ ul li:nth-child(1) {
			top: 350%;
			left: 50%;
			}
			.wow-bmp-pos-tr input:checked ~ ul li:nth-child(2) {
			top: 328.125%;
			left: -65.625%;
			}
			.wow-bmp-pos-tr input:checked ~ ul li:nth-child(3) {
			top: 262.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-tr input:checked ~ ul li:nth-child(4) {
			top: 165.625%;
			left: -228.125%;
			}
			.wow-bmp-pos-tr input:checked ~ ul li:nth-child(5) {
			left: -250%;
			}
			";
			break;
		}		
	}	
	elseif($param['menu'] == 'wow-bmp-pos-br'){
		$count_i = count($param['item_type']);
		switch ($count_i) {
			case 1:
			echo "
			.wow-bmp-pos-br input:checked ~ ul li:nth-child(1) {
			top: -162.5%;
			left: -162.5%;
			}";
			break;
			case 2:
			echo "
			.wow-bmp-pos-br input:checked ~ ul li:nth-child(1) {
			top: -65.625%;
			left: -228.125%;
			}
			.wow-bmp-pos-br input:checked ~ ul li:nth-child(2) {
			top: -228.125%;
			left: -65.625%;
			}			
			";
			break;
			case 3:
			echo "
			.wow-bmp-pos-br input:checked ~ ul li:nth-child(1) {
			left: -250%;
			}
			.wow-bmp-pos-br input:checked ~ ul li:nth-child(2) {
			top: -162.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-br input:checked ~ ul li:nth-child(3) {
			top: -250%;
			left: 50%;
			}
			";
			break;
			case 4:
			echo "
			.wow-bmp-pos-br input:checked ~ ul li:nth-child(1) {
			left: -250%;
			}
			.wow-bmp-pos-br input:checked ~ ul li:nth-child(2) {
			top: -65.625%;
			left: -228.125%;
			}
			.wow-bmp-pos-br input:checked ~ ul li:nth-child(3) {
			top: -162.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-br input:checked ~ ul li:nth-child(4) {
			top: -228.125%;
			left: -65.625%;
			}
			";
			break;
			case 5:
			echo "
			.wow-bmp-pos-br input:checked ~ ul li:nth-child(1) {
			left: -250%;
			}
			.wow-bmp-pos-br input:checked ~ ul li:nth-child(2) {
			top: -65.625%;
			left: -228.125%;
			}
			.wow-bmp-pos-br input:checked ~ ul li:nth-child(3) {
			top: -162.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-br input:checked ~ ul li:nth-child(4) {
			top: -228.125%;
			left: -65.625%;
			}
			.wow-bmp-pos-br input:checked ~ ul li:nth-child(5) {
			top: -250%;
			left: 50%;
			}
			";
			break;
		}		
	}		
	elseif($param['menu'] == 'wow-bmp-pos-bl'){
		$count_i = count($param['item_type']);
		switch ($count_i) {
			case 1:
			echo "
			.wow-bmp-pos-bl input:checked ~ ul li:nth-child(1) {
			top: -162.5%;
			left: 262.5%;
			}";
			break;
			case 2:
			echo "
			.wow-bmp-pos-bl input:checked ~ ul li:nth-child(1) {
			top: -228.125%;
			left: 165.625%;
			}
			.wow-bmp-pos-bl input:checked ~ ul li:nth-child(2) {
			top: -65.625%;
			left: 328.125%;
			}			
			";
			break;
			case 3:
			echo "
			.wow-bmp-pos-bl input:checked ~ ul li:nth-child(1) {
			top: -250%;
			left: 50%;
			}
			.wow-bmp-pos-bl input:checked ~ ul li:nth-child(2) {
			top: -162.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-bl input:checked ~ ul li:nth-child(3) {
			left: 350%;
			}
			";
			break;
			case 4:
			echo "
			.wow-bmp-pos-bl input:checked ~ ul li:nth-child(1) {
			top: -250%;
			left: 50%;
			}
			.wow-bmp-pos-bl input:checked ~ ul li:nth-child(2) {
			top: -228.125%;
			left: 165.625%;
			}
			.wow-bmp-pos-bl input:checked ~ ul li:nth-child(3) {
			top: -162.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-bl input:checked ~ ul li:nth-child(4) {
			top: -65.625%;
			left: 328.125%;
			}
			";
			break;
			case 5:
			echo "
			.wow-bmp-pos-bl input:checked ~ ul li:nth-child(1) {
			top: -250%;
			left: 50%;
			}
			.wow-bmp-pos-bl input:checked ~ ul li:nth-child(2) {
			top: -228.125%;
			left: 165.625%;
			}
			.wow-bmp-pos-bl input:checked ~ ul li:nth-child(3) {
			top: -162.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-bl input:checked ~ ul li:nth-child(4) {
			top: -65.625%;
			left: 328.125%;
			}
			.wow-bmp-pos-bl input:checked ~ ul li:nth-child(5) {
			left: 350%;
			}
			";
			break;
		}		
	}	
	elseif($param['menu'] == 'wow-bmp-pos-t'){
		$count_i = count($param['item_type']);
		switch ($count_i) {
			case 1:
			echo "
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(1) {
			top: 350%;
			left: 50%;
			}
			";
			break;
			case 2:
			echo "
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(1) {
			top: 262.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(2) {
			top: 262.5%;
			left: -162.5%;			
			";
			break;
			case 3:
			echo "
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(1) {
			top: 262.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(2) {
			top: 350%;
			left: 50%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(3) {
			top: 262.5%;
			left: -162.5%;
			}
			";
			break;
			case 4:
			echo "
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(1) {
			top: 165.625%;
			left: 328.125%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(2) {
			top: 328.125%;
			left: 165.625%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(3) {
			top: 328.125%;
			left: -65.625%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(4) {
			top: 165.625%;
			left: -228.125%;
			}
			";
			break;
			case 5:
			echo "
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(1) {
			left: 350%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(2) {
			top: 262.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(3) {
			top: 350%;
			left: 50%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(4) {
			top: 262.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(5) {
			left: -250%;
			}
			";
			break;
			case 6:
			echo "
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(1) {
			top: 165.625%;
			left: 328.125%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(2) {
			top: 262.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(3) {
			top: 328.125%;
			left: 165.625%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(4) {
			top: 328.125%;
			left: -65.625%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(5) {
			top: 262.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(6) {
			top: 165.625%;
			left: -228.125%;
			}
			";
			break;
			case 7:
			echo "
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(1) {
			left: 350%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(2) {
			top: 165.625%;
			left: 328.125%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(3) {
			top: 262.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(4) {
			top: 350%;
			left: 50%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(5) {
			top: 262.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(6) {
			top: 165.625%;
			left: -228.125%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(7) {
			left: -250%;
			}
			";
			break;
			case 8:
			echo "
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(1) {
			left: 350%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(2) {
			top: 165.625%;
			left: 328.125%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(3) {
			top: 262.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(4) {
			top: 328.125%;
			left: 165.625%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(5) {
			top: 350%;
			left: 50%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(6) {
			top: 328.125%;
			left: -65.625%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(7) {
			top: 262.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(8) {
			top: 165.625%;
			left: -228.125%;
			}
			";
			break;
			case 9:
			echo "
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(1) {
			left: 350%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(2) {
			top: 165.625%;
			left: 328.125%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(3) {
			top: 262.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(4) {
			top: 328.125%;
			left: 165.625%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(5) {
			top: 350%;
			left: 50%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(6) {
			top: 328.125%;
			left: -65.625%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(7) {
			top: 262.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(8) {
			top: 165.625%;
			left: -228.125%;
			}
			.wow-bmp-pos-t input:checked ~ ul li:nth-child(9) {
			left: -250%;
			}
			";
			break;
		}		
	}	
	
	elseif($param['menu'] == 'wow-bmp-pos-r'){
		$count_i = count($param['item_type']);
		switch ($count_i) {
			case 1:
			echo "
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(1) {
			left: -250%;
			}
			";
			break;
			case 2:
			echo "
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(1) {
			top: 262.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(2) {
			top: -162.5%;
			left: -162.5%;			
			";
			break;
			case 3:
			echo "
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(1) {
			top: 262.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(2) {
			left: -250%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(3) {
			top: -162.5%;
			left: -162.5%;
			}
			";
			break;
			case 4:
			echo "
			
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(1) {
			top: 328.125%;
			left: -65.625%;
			}
			
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(2) {
			top: 165.625%;
			left: -228.125%;
			}
			
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(3) {
			top: -65.625%;
			left: -228.125%;
			}
			
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(4) {
			top: -228.125%;
			left: -65.625%;
			}
			
			";
			break;
			case 5:
			echo "
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(1) {
			top: 350%;
			left: 50%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(2) {
			top: 262.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(3) {
			left: -250%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(4) {
			top: -162.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(5) {
			top: -250%;
			left: 50%;
			}
			";
			break;
			case 6:
			echo "
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(1) {
			top: 328.125%;
			left: -65.625%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(2) {
			top: 262.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(3) {
			top: 165.625%;
			left: -228.125%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(4) {
			top: -65.625%;
			left: -228.125%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(5) {
			top: -162.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(6) {
			top: -228.125%;
			left: -65.625%;
			}
			";
			break;
			case 7:
			echo "
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(1) {
			top: 350%;
			left: 50%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(2) {
			top: 328.125%;
			left: -65.625%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(3) {
			top: 262.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(4) {
			left: -250%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(5) {
			top: -162.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(6) {
			top: -228.125%;
			left: -65.625%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(7) {
			top: -250%;
			left: 50%;
			}
			";
			break;
			case 8:
			echo "
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(1) {
			top: 350%;
			left: 50%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(2) {
			top: 328.125%;
			left: -65.625%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(3) {
			top: 262.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(4) {
			top: 165.625%;
			left: -228.125%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(5) {
			left: -250%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(6) {
			top: -65.625%;
			left: -228.125%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(7) {
			top: -162.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(8) {
			top: -228.125%;
			left: -65.625%;
			}
			";
			break;
			case 9:
			echo "
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(1) {
			top: 350%;
			left: 50%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(2) {
			top: 328.125%;
			left: -65.625%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(3) {
			top: 262.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(4) {
			top: 165.625%;
			left: -228.125%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(5) {
			left: -250%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(6) {
			top: -65.625%;
			left: -228.125%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(7) {
			top: -162.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(8) {
			top: -228.125%;
			left: -65.625%;
			}
			.wow-bmp-pos-r input:checked ~ ul li:nth-child(9) {
			top: -250%;
			left: 50%;
			}
			";
			break;
		}		
	}	
	
	elseif($param['menu'] == 'wow-bmp-pos-b'){
		$count_i = count($param['item_type']);
		switch ($count_i) {
			case 1:
			echo "
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(1) {
			top: -250%;
			left: 50%;
			}
			";
			break;
			case 2:
			echo "
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(1) {
			top: -162.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(2) {
			top: -162.5%;
			left: 262.5%;			
			";
			break;
			case 3:
			echo "
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(1) {
			top: -162.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(2) {
			top: -250%;
			left: 50%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(3) {
			top: -162.5%;
			left: 262.5%;
			}
			";
			break;
			case 4:
			echo "
			
			
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(1) {
			top: -65.625%;
			left: -228.125%;
			}
			
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(2) {
			top: -228.125%;
			left: -65.625%;
			}
			
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(3) {
			top: -228.125%;
			left: 165.625%;
			}
			
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(4) {
			top: -65.625%;
			left: 328.125%;
			}
			
			
			";
			break;
			case 5:
			echo "
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(1) {
			left: -250%;
			}
			
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(2) {
			top: -162.5%;
			left: -162.5%;
			}
			
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(3) {
			top: -250%;
			left: 50%;
			}
			
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(4) {
			top: -162.5%;
			left: 262.5%;
			}
			
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(5) {
			left: 350%;
			}
			";
			break;
			case 6:
			echo "
			
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(1) {
			top: -65.625%;
			left: -228.125%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(2) {
			top: -162.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(3) {
			top: -228.125%;
			left: -65.625%;
			}
			
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(4) {
			top: -228.125%;
			left: 165.625%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(5) {
			top: -162.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(6) {
			top: -65.625%;
			left: 328.125%;
			}
			";
			break;
			case 7:
			echo "
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(1) {
			left: -250%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(2) {
			top: -65.625%;
			left: -228.125%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(3) {
			top: -162.5%;
			left: -162.5%;
			}
			
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(4) {
			top: -250%;
			left: 50%;
			}
			
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(5) {
			top: -162.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(6) {
			top: -65.625%;
			left: 328.125%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(7) {
			left: 350%;
			}
			";
			break;
			case 8:
			echo "
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(1) {
			left: -250%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(2) {
			top: -65.625%;
			left: -228.125%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(3) {
			top: -162.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(4) {
			top: -228.125%;
			left: -65.625%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(5) {
			top: -250%;
			left: 50%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(6) {
			top: -228.125%;
			left: 165.625%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(7) {
			top: -162.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(8) {
			top: -65.625%;
			left: 328.125%;
			}
			
			";
			break;
			case 9:
			echo "
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(1) {
			left: -250%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(2) {
			top: -65.625%;
			left: -228.125%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(3) {
			top: -162.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(4) {
			top: -228.125%;
			left: -65.625%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(5) {
			top: -250%;
			left: 50%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(6) {
			top: -228.125%;
			left: 165.625%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(7) {
			top: -162.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(8) {
			top: -65.625%;
			left: 328.125%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(9) {
			left: 350%;
			}
			";
			break;
		}		
	}	
	elseif($param['menu'] == 'wow-bmp-pos-b'){
		$count_i = count($param['item_type']);
		switch ($count_i) {
			case 1:
			echo "
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(1) {
			top: -250%;
			left: 50%;
			}
			";
			break;
			case 2:
			echo "
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(1) {
			top: -162.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(2) {
			top: -162.5%;
			left: 262.5%;			
			";
			break;
			case 3:
			echo "
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(1) {
			top: -162.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(2) {
			top: -250%;
			left: 50%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(3) {
			top: -162.5%;
			left: 262.5%;
			}
			";
			break;
			case 4:
			echo "
			
			
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(1) {
			top: -65.625%;
			left: -228.125%;
			}
			
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(2) {
			top: -228.125%;
			left: -65.625%;
			}
			
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(3) {
			top: -228.125%;
			left: 165.625%;
			}
			
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(4) {
			top: -65.625%;
			left: 328.125%;
			}
			
			
			";
			break;
			case 5:
			echo "
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(1) {
			left: -250%;
			}
			
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(2) {
			top: -162.5%;
			left: -162.5%;
			}
			
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(3) {
			top: -250%;
			left: 50%;
			}
			
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(4) {
			top: -162.5%;
			left: 262.5%;
			}
			
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(5) {
			left: 350%;
			}
			";
			break;
			case 6:
			echo "
			
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(1) {
			top: -65.625%;
			left: -228.125%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(2) {
			top: -162.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(3) {
			top: -228.125%;
			left: -65.625%;
			}
			
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(4) {
			top: -228.125%;
			left: 165.625%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(5) {
			top: -162.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(6) {
			top: -65.625%;
			left: 328.125%;
			}
			";
			break;
			case 7:
			echo "
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(1) {
			left: -250%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(2) {
			top: -65.625%;
			left: -228.125%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(3) {
			top: -162.5%;
			left: -162.5%;
			}
			
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(4) {
			top: -250%;
			left: 50%;
			}
			
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(5) {
			top: -162.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(6) {
			top: -65.625%;
			left: 328.125%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(7) {
			left: 350%;
			}
			";
			break;
			case 8:
			echo "
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(1) {
			left: -250%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(2) {
			top: -65.625%;
			left: -228.125%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(3) {
			top: -162.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(4) {
			top: -228.125%;
			left: -65.625%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(5) {
			top: -250%;
			left: 50%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(6) {
			top: -228.125%;
			left: 165.625%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(7) {
			top: -162.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(8) {
			top: -65.625%;
			left: 328.125%;
			}
			
			";
			break;
			case 9:
			echo "
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(1) {
			left: -250%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(2) {
			top: -65.625%;
			left: -228.125%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(3) {
			top: -162.5%;
			left: -162.5%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(4) {
			top: -228.125%;
			left: -65.625%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(5) {
			top: -250%;
			left: 50%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(6) {
			top: -228.125%;
			left: 165.625%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(7) {
			top: -162.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(8) {
			top: -65.625%;
			left: 328.125%;
			}
			.wow-bmp-pos-b input:checked ~ ul li:nth-child(9) {
			left: 350%;
			}
			";
			break;
		}		
	}	
	elseif($param['menu'] == 'wow-bmp-pos-l'){
		$count_i = count($param['item_type']);
		switch ($count_i) {
			case 1:
			echo "
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(1) {
			left: 350%;
			}
			";
			break;
			case 2:
			echo "
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(1) {
			top: -162.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(2) {
			top: 262.5%;
			left: 262.5%;			
			";
			break;
			case 3:
			echo "
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(1) {
			top: -162.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(2) {
			left: 350%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(3) {
			top: 262.5%;
			left: 262.5%;
			}
			";
			break;
			case 4:
			echo "
			
			
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(1) {
			top: -228.125%;
			left: 165.625%;
			}
			
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(2) {
			top: -65.625%;
			left: 328.125%;
			}
			
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(3) {
			top: 165.625%;
			left: 328.125%;
			}
			
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(4) {
			top: 328.125%;
			left: 165.625%;
			}
			
			
			
			";
			break;
			case 5:
			echo "
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(1) {
			top: -250%;
			left: 50%;
			}
			
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(2) {
			top: -162.5%;
			left: 262.5%;
			}
			
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(3) {
			left: 350%;
			}
			
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(4) {
			top: 262.5%;
			left: 262.5%;
			}
			
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(5) {
			top: 350%;
			left: 50%;
			}
			";
			break;
			case 6:
			echo "
			
			
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(1) {
			top: -228.125%;
			left: 165.625%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(2) {
			top: -162.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(3) {
			top: -65.625%;
			left: 328.125%;
			}
			
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(4) {
			top: 165.625%;
			left: 328.125%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(5) {
			top: 262.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(6) {
			top: 328.125%;
			left: 165.625%;
			}
			
			";
			break;
			case 7:
			echo "
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(1) {
			top: -250%;
			left: 50%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(2) {
			top: -228.125%;
			left: 165.625%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(3) {
			top: -162.5%;
			left: 262.5%;
			}
			
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(4) {
			left: 350%;
			}
			
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(5) {
			top: 262.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(6) {
			top: 328.125%;
			left: 165.625%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(7) {
			top: 350%;
			left: 50%;
			}
			";
			break;
			case 8:
			echo "
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(1) {
			top: -250%;
			left: 50%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(2) {
			top: -228.125%;
			left: 165.625%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(3) {
			top: -162.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(4) {
			top: -65.625%;
			left: 328.125%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(5) {
			left: 350%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(6) {
			top: 165.625%;
			left: 328.125%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(7) {
			top: 262.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(8) {
			top: 328.125%;
			left: 165.625%;
			}
			
			
			";
			break;
			case 9:
			echo "
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(1) {
			top: -250%;
			left: 50%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(2) {
			top: -228.125%;
			left: 165.625%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(3) {
			top: -162.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(4) {
			top: -65.625%;
			left: 328.125%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(5) {
			left: 350%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(6) {
			top: 165.625%;
			left: 328.125%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(7) {
			top: 262.5%;
			left: 262.5%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(8) {
			top: 328.125%;
			left: 165.625%;
			}
			.wow-bmp-pos-l input:checked ~ ul li:nth-child(9) {
			top: 350%;
			left: 50%;
			}
			";
			break;
		}		
	}	
	
	if(!empty($param['include_mobile'])){ ?>
		@media only screen and (max-width: <?php if(empty($param['screen'])){echo "480";} else {echo $param['screen'];} ?>px){
			.bmp-mobile-<?php echo $val->id;?> {
				display:none;
			}
		}
	<?php	}
	
	if(!empty($param['include_more_screen'])){ ?>
		@media only screen and (min-width: <?php if(empty($param['screen_more'])){echo "1400";} else {echo $param['screen_more'];} ?>px){
			.bmp-mobile-<?php echo $val->id;?> {
				display:none;
			}
		}
	<?php	}
	