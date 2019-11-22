<?php if ( ! defined( 'ABSPATH' ) ) exit;
	
	add_action( 'wp_enqueue_scripts', 'wow_scripts_styles_bmp' );
	
	function wow_scripts_styles_bmp() {
		wp_enqueue_style( 'font-awesome', WOW_BMP_URL . 'asset/font-awesome/css/font-awesome.min.css', array(), '4.7.0' );
	}
	
	
	//* Include on page and posts
	add_action( 'wp_footer', 'wow_display_bmp' );
	function wow_display_bmp() {
		global $wpdb;
		$table = $wpdb->prefix . "wow_bmp";		
		$arrresult = $wpdb->get_results("select * from $table"); 	
		if (count($arrresult) > 0) {
			foreach ($arrresult as $key => $val) {
				$param = unserialize($val->param);
				ob_start();
				include( 'partials/public.php' );
				$menu = ob_get_contents();
				ob_end_clean();				
				echo $menu;
				wp_enqueue_style( WOW_BMP_BASENAME.'-style', plugin_dir_url( __FILE__ ). 'css/style.css', null, WOW_BMP_VERSION);	
			}
			
		}
	}
	
	
	add_filter( 'nav_menu_css_class', 'wow_nav_menu_css_class_bmp');
	function wow_nav_menu_css_class_bmp( $classes ){
        if( is_array( $classes ) ){
            $tmp_classes = preg_grep( '/^(fa)(-\S+)?$/i', $classes );
            if( !empty( $tmp_classes ) ){
                $classes = array_values( array_diff( $classes, $tmp_classes ) );
			}
		}
        return $classes;
	}
	
	add_filter( 'walker_nav_menu_start_el', 'wow_walker_nav_menu_start_el_bmp', 10, 4 );
	
	function wow_walker_nav_menu_start_el_bmp( $item_output, $item, $depth, $args ){
        if( is_array( $item->classes ) ){
            $classes = preg_grep( '/^(fa)(-\S+)?$/i', $item->classes );
            if( !empty( $classes ) ){
                $item_output = wow_replace_item_bmp( $item_output, $classes );
			}
		}
        return $item_output;
	}
	
	function wow_replace_item_bmp( $item_output, $classes ){
        
		
        if( !in_array( 'fa', $classes ) ){
            array_unshift( $classes, 'fa' );
		}
		
        $before = true;
        if( in_array( 'fa-after', $classes ) ){
            $classes = array_values( array_diff( $classes, array( 'fa-after' ) ) );
            $before = false;
		}
		
        $icon = '<i class="' . implode( ' ', $classes ) . '"></i>';
		
        preg_match( '/(<a.+>)(.+)(<\/a>)/i', $item_output, $matches );
        if( 4 === count( $matches ) ){
            $item_output = $matches[1];
            if( $before ){
                $item_output .= $icon . ' <span class="wow-bmp-text">'  . $matches[2] . '</span>';
				} else {
                $item_output .= '<span class="wow-bmp-text">' . $matches[2] . '</span> ' . $icon;
			}
            $item_output .= $matches[3];
		}
        return $item_output;
	}
	
