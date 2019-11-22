<?php if ( ! defined( 'ABSPATH' ) ) exit;
	add_action( 'wp_enqueue_scripts', 'wow_scripts_styles_sbmp' );
	function wow_scripts_styles_sbmp() {
		wp_enqueue_style( 'font-awesome', WOW_SBMP_URL . 'asset/font-awesome/css/font-awesome.min.css', array(), '4.7.0' );
	}
	//* shortcode
	add_shortcode('Slide-Menu', 'wow_shortcode_sbmp');
	function wow_shortcode_sbmp($atts) {
		extract(shortcode_atts(array('id' => ""), $atts));		
		global $wpdb;
		$table = $wpdb->prefix . "wow_sbmp";    
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
				wp_enqueue_style( WOW_SBMP_BASENAME.'-style', plugin_dir_url( __FILE__ ). 'css/style.css', null, WOW_SBMP_VERSION);					
				wp_enqueue_script( WOW_SBMP_BASENAME.'-slideMenu', plugin_dir_url( __FILE__ ). 'js/slideMenu.js', array( 'jquery' ), WOW_SBMP_VERSION );
				
				
			}
		}
		else {		
		echo "<p><strong>No Records</strong></p>";        
	}  
	return ;
}
//* Include on page and posts
add_action( 'wp_footer', 'wow_display_sbmp' );
function wow_display_sbmp() {
	global $wpdb;    
	$table = $wpdb->prefix . "wow_sbmp";   
	$arrresult = $wpdb->get_results("SELECT * FROM " . $table . " order by id asc");
	if (count($arrresult) > 0) {		
		foreach ($arrresult as $key => $val) {
			$param = unserialize($val->param);			
			echo do_shortcode('[Slide-Menu id='.$val->id.']');
			
		}
	}
}