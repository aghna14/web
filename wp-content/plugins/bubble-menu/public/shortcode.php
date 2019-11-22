<?php
/**
 * Plugin shortcode
 *
 * @package     Wow_Plugin
 * @subpackage  Public/Shortcode
 * @author      Dmytro Lobov <i@wpbiker.com>
 * @copyright   2019 Wow-Company
 * @license     GNU Public License
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

extract( shortcode_atts( array( 'id' => "" ), $atts ) );

global $wpdb;
$table  = $wpdb->prefix . 'wow_' . $this->plugin['prefix'];
$sSQL   = $wpdb->prepare( "select * from $table WHERE id = %d", $id );
$result = $wpdb->get_results( $sSQL );

if ( count( $result ) > 0 ) {

	foreach ( $result as $key => $val ) {
		$param = unserialize( $val->param );
		ob_start();
		include( 'partials/public.php' );
		$content = ob_get_contents();
		ob_end_clean();
		$path_style  = $this->basedir . 'style-' . $val->id . '.css';
		$path_script = $this->basedir . 'script-' . $val->id . '.js';
		$file_style  = $this->plugin['dir'] . 'admin/partials/generator/style.php';
		$file_script = $this->plugin['dir'] . 'admin/partials/generator/script.php';
		if ( file_exists( $file_style ) && ! file_exists( $path_style ) ) {
			ob_start();
			include( $file_style );
			$content_style = ob_get_contents();
			ob_end_clean();
			file_put_contents( $path_style, $content_style );
		}
		if ( file_exists( $file_script ) && ! file_exists( $path_script ) ) {
			ob_start();
			include( $file_script );
			$content_script = ob_get_contents();
			ob_end_clean();
			file_put_contents( $path_script, $content_script );
		}


		echo $content;
		$time = ! empty( $param['time'] ) ? $param['time'] : '';

		$slug    = $this->plugin['slug'];
		$version = $this->plugin['version'];

		$url_style = $this->plugin['url'] . 'assets/css/style.min.css';
		wp_enqueue_style( $slug, $url_style, null, $version );


		if ( empty( $param['disable_fontawesome'] ) ) {
			$url_icons = $this->plugin['url'] . 'assets/vendors/fontawesome/css/fontawesome-all.min.css';
			wp_enqueue_style( $slug . '-fontawesome', $url_icons, null, '5.6.3' );
		}


		if ( file_exists( $path_style ) ) {
			$url_css = $this->baseurl . 'style-' . $val->id . '.css';
			wp_enqueue_style( $slug . '-' . $val->id, $url_css, array(), $time );
		}

	}

}
