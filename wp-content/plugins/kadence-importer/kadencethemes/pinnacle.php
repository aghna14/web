<?php

// Block direct access to the main plugin file.
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Demo sites
function kadence_import_pinnacle_files() {
	$virtue_toolkit = array(
		'base'         => 'virtue_toolkit',
		'slug'         => 'virtue-toolkit',
		'activate_url' => self_admin_url( 'plugins.php?_wpnonce=' . wp_create_nonce( 'activate-plugin_virtue-toolkit/virtue_toolkit.php' ) . '&action=activate&plugin=virtue-toolkit%2Fvirtue_toolkit.php' ),
		'install_url'  => $install_link = wp_nonce_url( add_query_arg( array( 'action' => 'install-plugin', 'plugin' => 'virtue-toolkit', ), network_admin_url( 'update.php' ) ), 'install-plugin_virtue-toolkit' ),
		'title'        => 'Kadence Toolkit',
		'bundled'      => '0',
		'state'        => Kadence_Importer_Plugin_Check::active_check( 'virtue-toolkit/virtue_toolkit.php' ),
	);
	$woocommerce = array(
		'base' => 'woocommerce',
		'slug' => 'woocommerce',
		'activate_url' => self_admin_url( 'plugins.php?_wpnonce=' . wp_create_nonce( 'activate-plugin_woocommerce/woocommerce.php' ) . '&action=activate&plugin=woocommerce%2Fwoocommerce.php' ),
		'install_url'  => $install_link = wp_nonce_url( add_query_arg( array( 'action' => 'install-plugin', 'plugin' => 'woocommerce', ), network_admin_url( 'update.php' ) ), 'install-plugin_woocommerce' ),
		'title' => 'Woocommerce',
		'bundled'      => '0',
		'state' => Kadence_Importer_Plugin_Check::active_check( 'woocommerce/woocommerce.php' ),
	);
	return array(
		array(
			'import_file_name'           => 'Style 01',
			'categories'                 => array( ),
			'import_file_url'            => 'https://s3.amazonaws.com/ktdemocontent/pinnacle/site_style_01/demo_content.xml',
			'import_widget_file_url'     => 'https://s3.amazonaws.com/ktdemocontent/pinnacle/site_style_01/widget_data.json',
			'import_customizer_file_url' => '',
			'import_redux'               => array(
				array(
					'file_url'    => 'https://s3.amazonaws.com/ktdemocontent/pinnacle/site_style_01/theme_options.json',
					'option_name' => 'pinnacle',
				),
			),
			'import_preview_image_url'   => 'https://s3.amazonaws.com/ktdemocontent/pinnacle/site_style_01/preview-image.jpg',
			'import_notice'              => '',
			'preview_url'                => 'http://themes.kadencethemes.com/pinnacle/',
			'plugins'                    => array(
				$virtue_toolkit,
				$woocommerce,
			),
		),
	);
}
// after Import
function kadence_pinnacle_after_import( $selected_import ) {
	if ( 'Style 01' === $selected_import['import_file_name'] ) {
			// Assign Woo Pages.
			if( class_exists('Woocommerce') ) {
				kadence_import_demo_woocommerce();
			}

			// Assign menus to their locations.
			$main_menu = get_term_by( 'name', 'Main1', 'nav_menu' );
			$top_menu = get_term_by( 'name', 'Top1', 'nav_menu' );

			set_theme_mod( 'nav_menu_locations', array(
					'primary_navigation' => $main_menu->term_id,
					'topbar_navigation' => $top_menu->term_id,
				)
			);

			// Assign front page.			
			$homepage = get_page_by_title( 'Home' );
			if(isset( $homepage ) && $homepage->ID) {
				update_option('show_on_front', 'page');
				update_option('page_on_front', $homepage->ID); // Front Page
			}
	} 
}
