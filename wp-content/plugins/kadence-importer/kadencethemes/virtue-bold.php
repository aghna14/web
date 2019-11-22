<?php

// Block direct access to the main plugin file.
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Demo sites
function kadence_import_virtue_bold_files() {
	$siteorigin_panels = array(
		'base' => 'siteorigin-panels',
		'slug' => 'siteorigin-panels',
		'activate_url' => self_admin_url( 'plugins.php?_wpnonce=' . wp_create_nonce( 'activate-plugin_siteorigin-panels/siteorigin-panels.php' ) . '&action=activate&plugin=siteorigin-panels%2Fsiteorigin-panels.php' ),
		'install_url'  => $install_link = wp_nonce_url( add_query_arg( array( 'action' => 'install-plugin', 'plugin' => 'siteorigin-panels', ), network_admin_url( 'update.php' ) ), 'install-plugin_siteorigin-panels' ),
		'title' => 'Siteorigin Panels',
		'bundled'      => '0',
		'state' => Kadence_Importer_Plugin_Check::active_check( 'siteorigin-panels/siteorigin-panels.php' ),
	);
	$visual_editor = array(
		'base' => 'black-studio-tinymce-widget',
		'slug' => 'black-studio-tinymce-widget',
		'activate_url' => self_admin_url( 'plugins.php?_wpnonce=' . wp_create_nonce( 'activate-plugin_black-studio-tinymce-widget/black-studio-tinymce-widget.php' ) . '&action=activate&plugin=black-studio-tinymce-widget%2Fblack-studio-tinymce-widget.php' ),
		'install_url'  => $install_link = wp_nonce_url( add_query_arg( array( 'action' => 'install-plugin', 'plugin' => 'black-studio-tinymce-widget', ), network_admin_url( 'update.php' ) ), 'install-plugin_black-studio-tinymce-widget' ),
		'title' => 'Visual Editor Widget',
		'bundled'      => '0',
		'state' => Kadence_Importer_Plugin_Check::active_check( 'black-studio-tinymce-widget/black-studio-tinymce-widget.php' ),
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
	$kadence_slider = array(
		'base' => 'kadence-slider',
		'slug' => 'kadence-slider',
		'activate_url' => self_admin_url( 'plugins.php?_wpnonce=' . wp_create_nonce( 'activate-plugin_kadence-slider/kadence-slider.php' ) . '&action=activate&plugin=kadence-slider%2Fkadence-slider.php' ),
		'install_url'  => $install_link = wp_nonce_url( add_query_arg( array( 'action' => 'install-plugin', 'plugin' => 'kadence-slider', ), network_admin_url( 'update.php' ) ), 'install-plugin_kadence-slider' ),
		'title' => 'Kadence Slider',
		'bundled'      => '1',
		'state' => Kadence_Importer_Plugin_Check::active_check( 'kadence-slider/kadence-slider.php' ),
	);
	return array(
		array(
			'import_file_name'           => 'Style 01',
			'categories'                 => array( ),
			'import_file_url'            => 'https://s3.amazonaws.com/ktdemocontent/virtue_bold/site_style_01/demo_content.xml',
			'import_widget_file_url'     => 'https://s3.amazonaws.com/ktdemocontent/virtue_bold/site_style_01/widget_data.json',
			'import_customizer_file_url' => '',
			'import_redux'               => array(
				array(
					'file_url'    => 'https://s3.amazonaws.com/ktdemocontent/virtue_bold/site_style_01/theme_options.json',
					'option_name' => 'virtue_premium',
				),
			),
			'import_preview_image_url'   => 'https://s3.amazonaws.com/ktdemocontent/virtue_bold/site_style_01/preview-image.jpg',
			'import_notice'              => '',
			'preview_url'                => 'http://themes.kadencethemes.com/virtue-bold/',
			'plugins'                    => array(
				$woocommerce,
				$siteorigin_panels,
				$visual_editor,
				$kadence_slider,
			),
		),
	);
}

// after Import
function kadence_virtue_bold_after_import( $selected_import ) {
	if ( 'Style 01' === $selected_import['import_file_name'] ) {
			// Assign Woo Pages.
			if( class_exists('Woocommerce') ) {
				kadence_import_demo_woocommerce();
			}

			// Assign menus to their locations.
			$main_menu = get_term_by( 'name', 'Main1', 'nav_menu' );

			set_theme_mod( 'nav_menu_locations', array(
					'primary_navigation' => $main_menu->term_id,
					'mobile_navigation' => $main_menu->term_id,
				)
			);

			// Assign front page.			
			$homepage = get_page_by_title( 'Home' );
			if(isset( $homepage ) && $homepage->ID) {
				update_option('show_on_front', 'page');
				update_option('page_on_front', $homepage->ID); // Front Page
			}

			// Import Sliders
			$kspslider_directory = KADENCE_IMPORTER_PATH . 'kadencethemes/virtue_bold/site_style_01/ksp_sliders/';
			if( function_exists('ksp_import_direct')  ){
				foreach( glob( $kspslider_directory . '*.zip' ) as $filename ) {
					$filename = basename($filename);
					$ksp_files[] = $kspslider_directory . $filename;
				}
				ob_start();
				foreach( $ksp_files as $ksp_file ) { 
					$response = ksp_import_direct($ksp_file);
				}
				ob_end_clean();
			}
	} 
}
