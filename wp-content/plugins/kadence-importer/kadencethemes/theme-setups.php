<?php

// Block direct access to the main plugin file.
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

require_once KADENCE_IMPORTER_PATH . 'kadencethemes/class-kadence-importer-plugin-check.php';
require_once KADENCE_IMPORTER_PATH . 'kadencethemes/virtue-premium.php';
require_once KADENCE_IMPORTER_PATH . 'kadencethemes/pinnacle-premium.php';
require_once KADENCE_IMPORTER_PATH . 'kadencethemes/ascend-premium.php';
require_once KADENCE_IMPORTER_PATH . 'kadencethemes/virtue-bold.php';
require_once KADENCE_IMPORTER_PATH . 'kadencethemes/pinnacle.php';
require_once KADENCE_IMPORTER_PATH . 'kadencethemes/virtue.php';
require_once KADENCE_IMPORTER_PATH . 'kadencethemes/ascend.php';

function kadence_init_importer() {

	if ( isset ( $_GET['page'] ) && $_GET['page'] == "kadence-importer" ) {
		 	add_action( 'admin_head', 'kadence_importer_admin_styles' );
	}
	$theme = kadence_themename();
    	if('Virtue - Premium' == $theme) {
                     add_filter( 'pt-ocdi/import_files', 'kadence_import_virtue_premium_files' );
                     add_filter( 'kadence_importer_data_array', 'kadence_import_virtue_premium_files' );
                     add_action( 'pt-ocdi/before_widgets_import', 'kadence_before_widgets_virtue_premium_import_action', 3 );
                     add_action( 'pt-ocdi/after_import', 'kadence_virtue_premium_after_import' );
        } elseif('Pinnacle Premium' == $theme) {
                    add_filter( 'pt-ocdi/import_files', 'kadence_import_pinnacle_premium_files' );
                    add_action( 'pt-ocdi/before_widgets_import', 'kadence_before_widgets_pinnacle_premium_import_action', 3 );
                    add_action( 'pt-ocdi/after_import', 'kadence_pinnacle_premium_after_import' );
    	} elseif('Virtue' == $theme) {
                	add_filter( 'pt-ocdi/import_files', 'kadence_import_virtue_files' );
                	add_filter( 'kadence_importer_data_array', 'kadence_import_virtue_files' );
                	add_action( 'pt-ocdi/after_import', 'kadence_virtue_after_import' );
    	} elseif('Pinnacle' == $theme) {
                	add_filter( 'pt-ocdi/import_files', 'kadence_import_pinnacle_files' );
                	add_action( 'pt-ocdi/after_import', 'kadence_pinnacle_after_import' );
        } elseif('Virtue Premium - Bold' == $theme) {
                    add_filter( 'pt-ocdi/import_files', 'kadence_import_virtue_bold_files' );
                    add_action( 'pt-ocdi/after_import', 'kadence_virtue_bold_after_import' );
        } elseif('Ascend - Premium' == $theme) {     
                     add_filter( 'pt-ocdi/import_files', 'kadence_import_ascend_premium_files' );
                     add_action( 'pt-ocdi/before_widgets_import', 'kadence_before_widgets_ascend_premium_import_action', 3 );
                     add_action( 'pt-ocdi/after_import', 'kadence_ascend_premium_after_import' );
        } elseif('Ascend' == $theme) { 
                     add_filter( 'pt-ocdi/import_files', 'kadence_import_ascend_files' );
                     add_action( 'pt-ocdi/before_widgets_import', 'kadence_before_widgets_ascend_import_action', 3 );
                     add_action( 'pt-ocdi/after_import', 'kadence_ascend_after_import' );
		}
}
add_action('plugins_loaded','kadence_init_importer');
function kadence_importer_admin_styles() {
	?>
    <link rel='stylesheet' id='importer-css' href='<?php echo KADENCE_IMPORTER_URL ?>kadencethemes/styles.css' type='text/css' media='all'/>
   <?php
}
function kadence_themename() {
	$the_theme = wp_get_theme();
	$child = $the_theme->get('template');
	if( isset( $child ) && !empty( $child ) ) {
		if($the_theme->get('template') == 'virtue') {
			return "Virtue";
		} else if ($the_theme->get('template') == 'virtue_premium'){
			return "Virtue - Premium";
		} else if ($the_theme->get('template') == 'ascend_premium'){
			return "Ascend - Premium";
		} else if ($the_theme->get('template') == 'ascend'){
			return "Ascend";
		} else if ($the_theme->get('template') == 'pinnacle'){
			return "Pinnacle";
		} else if ($the_theme->get('template') == 'pinnacle_premium'){
			return "Pinnacle Premium";
		} else {
			return "notkadence";
		}
	} else {
		return $the_theme->get('Name');
	}
}
function kt_check_woocommerce() {
	if ( class_exists('woocommerce') )  {
		return true;
	}
	return false;
}
function kt_check_kadenceslider() {
	if ( is_plugin_active('kadence-slider/kadence-slider.php') )  {
		return true;
	}
	return false;
}
function kt_check_pagebuilder() {
	if ( is_plugin_active('siteorigin-panels/siteorigin-panels.php') )  {
		return true;
	}
	return false;
}
function kt_check_visualeditor() {
	if ( is_plugin_active('black-studio-tinymce-widget/black-studio-tinymce-widget.php') )  {
		return true;
	}
	return false;
}
function kt_check_virtuetoolkit() {
	if ( is_plugin_active('virtue-toolkit/virtue_toolkit.php') )  {
		return true;
	}
	return false;
}
function kadence_importer_page_setup( $default_settings ) {
	$default_settings['parent_slug'] = 'tools.php';
	$default_settings['page_title']  = esc_html__( 'Kadence Themes Importer' , 'kadence-importer' );
	$default_settings['menu_title']  = esc_html__( 'Kadence Importer' , 'kadence-importer' );
	$default_settings['capability']  = 'import';
	$default_settings['menu_slug']   = 'kadence-importer';

	return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'kadence_importer_page_setup' );
function kadence_importer_page_title() {
	echo '<h1>Kadence Themes Importer</h1>';
}
add_filter( 'pt-ocdi/plugin_page_title', 'kadence_importer_page_title' );

function kadence_importer_page_content() {
	?>
	<div class="kadence-importer-wrap">
	<div class="importer-notice">
	<h3>Notice</h3>
	<h4 class="kt-subhead"><?php echo __( '*Using this importer will override all your theme options settings.', 'kadence-importer' ); ?></h4>
	<h4 class="kt-subhead"><?php echo __( '*This importer is designed for new/empty sites with no content.', 'kadence-importer' ); ?></h4>
	<h4 class="kt-subhead"><?php echo __( '*If you want to reset your site after testing out the demo content you can use this plugin:', 'kadence-importer'); 
	echo '<a href="https://wordpress.org/plugins/wordpress-reset/">'.__("WordPress Reset", "kadence-importer").'</a>'; ?></h4>
	</div>
	<!-- <div class="kadence-site-preview theme-install-overlay wp-full-overlay expanded" style="display:none;">
		<div class="wp-full-overlay-sidebar">
			<div class="wp-full-overlay-header">
				<button class="close-full-overlay"><span class="screen-reader-text">Close</span></button>
				<a class="button hide-if-no-customize kadence-demo-import" href="#" data-import="disabled">Install Plugins</a>
			</div>
			<div class="wp-full-overlay-sidebar-content">
				<div class="install-theme-info">
					<h3 class="theme-name">Undifined</h3>			
						<img class="theme-screenshot" src="#" alt="">
					

					<div class="theme-details">
					</div>

					<div class="required-plugins-wrap">
						<h4>Required Plugins</h4>
						<div class="required-plugins">
						</div>
					</div>
				</div>
			</div>
			<div class="wp-full-overlay-footer">
				<div class="footer-import-button-wrap">
					<a class="button button-hero hide-if-no-customize kadence-demo-import" href="#" data-import="disabled">Install Plugins</a>
				</div>
			</div>
		</div>
		<div class="wp-full-overlay-main">
			
		</div>
	</div> -->
	<div class="plugin-theme-notice">
    <?php 
    	$theme = kadence_themename();
    	switch($theme) {
    			case 'Virtue - Premium' :
    				if ( 'Activated' !== get_option( 'kt_api_manager_virtue_premium_activated' ) ) {
						$theme_data = array(
							'activation' => true,
						);
					} else {
						$theme_data = array(
							'activation' => false,
						);
					}
    			
    			break;
    			case 'Pinnacle Premium' : 

                    if ( 'Activated' !== get_option( 'kt_api_manager_pinnacle_premium_activated' ) ) {
						$theme_data = array(
							'activation' => true,
						);
					} else {
						$theme_data = array(
							'activation' => false,
						);
					}
    			
    			break;
    			case 'Virtue' : 

                 	$theme_data = array(
                        'activation' => false,
                    );

    			break;
    			case 'Pinnacle' : 

                	$theme_data = array(
                        'activation' => false,
                    );

    			break;
                case 'Virtue Premium - Bold' :
                   if ( 'Activated' !== get_option( 'kt_api_manager_virtue_premium_activated' ) ) {
						$theme_data = array(
							'activation' => true,
						);
					} else {
						$theme_data = array(
							'activation' => false,
						);
					}
                
                break;
                case 'Ascend - Premium' :
                   if ( 'Activated' !== get_option( 'kt_api_manager_ascend_premium_activated' ) ) {
						$theme_data = array(
							'activation' => true,
						);
					} else {
						$theme_data = array(
							'activation' => false,
						);
					}
                
                break;
                case 'Ascend' :
                    $theme_data = array(
                        'activation' => false,
                    );
                
                break;
				default:
				 	 $theme_data = array(
                        'activation' => false,
                    );
					echo '<div class="not-kadence-notice">'.__('No Kadence Theme activated. If you are using a child theme please activate the Parent Theme to import demo content.', 'kadence-importer').'</div>';

		}
		if ( $theme_data['activation'] ) {
			add_filter( 'kt_importer_show_demos_for_import', '__return_false' );
			echo '<h2>' . __( 'Please activate the theme', 'kadence-importer' ) . '</h2>';
			echo '<h5>' . /* translators: %1$s and %2$s refer to an internal link markup */ sprintf( __( '%1$sClick here%2$s to activate the theme license.', 'ascend' ), '<a href="' . esc_url( admin_url( 'themes.php?page=kt_api_manager_dashboard' ) ) . '">', '</a>' ) . '</h5>';
		}
		?>
		</div>
</div>
<?php
}
add_filter( 'pt-ocdi/plugin_intro_text', 'kadence_importer_page_content' );
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );

function kadence_import_demo_woocommerce($shop = 'Shop', $cart = 'Cart', $checkout = 'Checkout', $myaccount = 'My Account') {

		$woopages = array(
			'woocommerce_shop_page_id' => $shop,
			'woocommerce_cart_page_id' => $cart ,
			'woocommerce_checkout_page_id' => $checkout,
			'woocommerce_myaccount_page_id' => $myaccount,
		);
		foreach($woopages as $woo_page_name => $woo_page_title) {
			$woopage = get_page_by_title( $woo_page_title );
			if(isset( $woopage ) && $woopage->ID) {
				update_option($woo_page_name, $woopage->ID); // Front Page
			}
		}

		// We no longer need to install pages
		delete_option( '_wc_needs_pages' );
		delete_transient( '_wc_activation_redirect' );

		// Flush rules after install
		flush_rewrite_rules();

}

// Get preview data
class Kadence_Importer_Preview_Import {
	/**
	 * Instance of this class
	 *
	 * @var null
	 */
	private static $instance = null;

	private static $data;

	/**
	 * Instance Control
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	/**
	 * Construct function
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'on_init' ) );
	}

	/**
	 * Construct function
	 */
	public function on_init() {
		self::$data = apply_filters( 'kadence_importer_data_array', array() );
		add_action( 'wp_ajax_kadence_import_preview', array( $this, 'kadence_importer_preview_data_ajax' ), 10, 0 );
	}

	public function kadence_importer_preview_data_ajax() {
		if ( ! isset( $_POST['demo'] ) ) {
			return wp_send_json_error();
		}
		$demo = sanitize_text_field( wp_unslash( $_POST['demo'] ) );

		$data = self::$data[$demo];
		//error_log(print_r($data, true));
		$output = '';
		$output .= '<div class="wp-full-overlay-sidebar">';
			$output .= '<div class="wp-full-overlay-header">';
				$output .= '<button class="close-full-overlay"><span class="screen-reader-text">Close</span></button>';
				$output .= '<a class="button hide-if-no-customize kadence-demo-import" href="#" data-import="disabled">Install Plugins</a>';
			$output .= '</div>';
			$output .= '<div class="wp-full-overlay-sidebar-content">';
				$output .= '<div class="install-theme-info">';
					$output .= '<h3 class="theme-name">' . esc_html( $data['import_file_name'] ) . '</h3>';			
						$output .= '<img class="theme-screenshot" src="' . esc_url( $data['import_preview_image_url'] ) . '" alt="">';
					

					$output .= '<div class="theme-details">';
					$output .= '</div>';

					$output .= '<div class="required-plugins-wrap">';
						$output .= '<h4>Required Plugins </h4>';
						$output .= '<div class="required-plugins">';
						foreach ( $data['plugins'] as $key => $value) {
							$data['is_active'] = Kadence_Importer_Plugin_Check::active_check($value['base']);
							$output .= '<div class="plugin-card plugin-card-' . $value['slug'] . '" data-slug="' . $value['slug'] . '" data-base="' . $value['base'] . '">	<span class="title">' . $value['title'] . '</span>	<button class="button install-now" data-base="' . $value['base'] . '" data-slug="' . $value['slug'] . '" data-name="' . $value['title'] . '">Install Now</button></div>';
						}
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';

			$output .= '<div class="wp-full-overlay-footer">';
				$output .= '<div class="footer-import-button-wrap">
					<a class="button button-hero hide-if-no-customize kadence-demo-import" href="#" data-import="disabled">Install Plugins</a>';
				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div>';
		$output .= '<div class="wp-full-overlay-main">
			<iframe src="' . esc_url( $data['preview_url'] ) . '" title="Preview"></iframe>
		</div>';
		return wp_send_json( $data );
	}
}
//Kadence_Importer_Preview_Import::get_instance();

add_action( 'wp_ajax_kadence_importer_install_plugins', 'kadence_import__ajax_plugins', 10, 0 );
/**
 * Do plugins' AJAX
 *
 * @internal    Used as a calback.
 */
function kadence_import__ajax_plugins() {
	if ( ! check_ajax_referer( 'ocdi-ajax-verification', 'security' ) || empty( $_POST['slug'] ) || ! class_exists( 'TGM_Plugin_Activation' ) ) {
		exit( 0 );
	}
	$slug      = sanitize_text_field( wp_unslash( $_POST['slug'] ) );
	$json      = array(
		'url'           => admin_url( 'themes.php?page=install-recommended-plugins' ),
		'plugin'        => array( $slug ),
		'tgmpa-page'    => 'install-recommended-plugins',
		'plugin_status' => 'all',
		'_wpnonce'      => wp_create_nonce( 'bulk-plugins' ),
		'action'        => 'tgmpa-bulk-install',
		'action2'       => - 1,
		'message'       => esc_html__( 'Installing', 'kadence-importer' ),
	);
	wp_send_json( $json );
}
