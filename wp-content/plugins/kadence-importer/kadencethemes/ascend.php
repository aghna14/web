<?php

// Block direct access to the main plugin file.
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Ascend Premium
function kadence_import_ascend_files() {
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
	$kadenceblocks = array(
		'base' => 'kadence-blocks',
		'slug' => 'kadence-blocks',
		'activate_url' => self_admin_url( 'plugins.php?_wpnonce=' . wp_create_nonce( 'activate-plugin_kadence-blocks/kadence-blocks.php' ) . '&action=activate&plugin=kadence-blocks%2Fkadence-blocks.php' ),
		'install_url'  => $install_link = wp_nonce_url( add_query_arg( array( 'action' => 'install-plugin', 'plugin' => 'kadence-blocks', ), network_admin_url( 'update.php' ) ), 'install-plugin_kadence-blocks' ),
		'title' => 'Kadence Blocks',
		'bundled'      => '0',
		'state' => Kadence_Importer_Plugin_Check::active_check( 'kadence-blocks/kadence-blocks.php' ),
	);
	return array(
		array(
			'import_file_name'           => 'Base Demo',
			'categories'                 => array(),
			'import_file_url'            => 'https://kadence.design/importer/ascend/base/demo_content.xml',
			'import_widget_file_url'     => 'https://kadence.design/importer/ascend/base/widget_data.json',
			'import_customizer_file_url' => '',

			'import_redux'               => array(
				array(
					'file_url'    => 'https://kadence.design/importer/ascend/base/theme_options.json',
					'option_name' => 'ascend',
				),
			),
			'import_preview_image_url'   => 'https://kadence.design/importer/ascend/base/preview-image-min.jpg',
			'preview_url'                => 'http://themes.kadencethemes.com/ascend/',
			'import_notice'              => '',
			'plugins'                    => array(
				$virtue_toolkit,
				$woocommerce,
			),
		),
		array(
			'import_file_name'           => 'Gutenberg Demo',
			'categories'                 => array(),
			'import_file_url'            => 'https://kadence.design/importer/ascend/guten/demo_content.xml',
			'import_widget_file_url'     => 'https://kadence.design/importer/ascend/guten/widget_data.json',
			'import_customizer_file_url' => '',
			'import_redux'               => array(
				array(
					'file_url'    => 'https://kadence.design/importer/ascend/guten/theme_options.json',
					'option_name' => 'ascend',
				),
			),
			'import_preview_image_url'   => 'https://kadence.design/importer/ascend/guten/preview-image.jpg',
			'import_notice'              => '',
			'preview_url'                => 'http://themes.kadencethemes.com/ascend-5/',
			'plugins'                    => array(
				$virtue_toolkit,
				$kadenceblocks,
			),
		),
		array(
			'import_file_name'           => 'Gallery Demo',
			'categories'                 => array(),
			'import_file_url'            => 'https://kadence.design/importer/ascend/gallery/demo_content.xml',
			'import_widget_file_url'     => 'https://kadence.design/importer/ascend/gallery/widget_data.json',
			'import_customizer_file_url' => '',
			'import_redux'               => array(
				array(
					'file_url'    => 'https://kadence.design/importer/ascend/gallery/theme_options.json',
					'option_name' => 'ascend',
				),
			),
			'import_preview_image_url'   => 'https://kadence.design/importer/ascend/gallery/preview-image.jpg',
			'import_notice'              => '',
			'preview_url'                => 'http://themes.kadencethemes.com/ascend-2/',
			'plugins'                    => array(
				$virtue_toolkit,
				$woocommerce,
			),
		),
		array(
			'import_file_name'           => 'Shop Demo',
			'categories'                 => array(),
			'import_file_url'            => 'https://kadence.design/importer/ascend/shop/demo_content.xml',
			'import_widget_file_url'     => 'https://kadence.design/importer/ascend/shop/widget_data.json',
			'import_customizer_file_url' => '',
			'import_redux'               => array(
				array(
					'file_url'    => 'https://kadence.design/importer/ascend/shop/theme_options.json',
					'option_name' => 'ascend',
				),
			),
			'import_preview_image_url'   => 'https://kadence.design/importer/ascend/shop/preview-image-min.jpg',
			'import_notice'              => '',
			'preview_url'                => 'http://themes.kadencethemes.com/ascend-3/',
			'plugins'                    => array(
				$virtue_toolkit,
				$woocommerce,
			),
		),
		array(
			'import_file_name'           => 'Blogger Demo',
			'categories'                 => array(),
			'import_file_url'            => 'https://kadence.design/importer/ascend/blogger/demo_content.xml',
			'import_widget_file_url'     => 'https://kadence.design/importer/ascend/blogger/widget_data.json',
			'import_customizer_file_url' => '',
			'import_redux'               => array(
				array(
					'file_url'    => 'https://kadence.design/importer/ascend/blogger/theme_options.json',
					'option_name' => 'ascend',
				),
			),
			'import_preview_image_url'   => 'https://kadence.design/importer/ascend/blogger/preview-image-min.jpg',
			'import_notice'              => '',
			'preview_url'                => 'http://themes.kadencethemes.com/ascend-4/',
			'plugins'                    => array(
				$virtue_toolkit,
			),
		),

	);
}

function kadence_before_widgets_ascend_import_action($selected_import) {
		$sidebars = $GLOBALS['wp_registered_sidebars'];
		if(!in_array('sidebar1', $sidebars) ){
			$sidebars['sidebar1'] = array(
			    'name' =>'Shop Sidebar',
			    'id' => 'sidebar1',
			    'description' => '',
			    'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '',
				'after_title'   => '',
		    );
		}
		$GLOBALS['wp_registered_sidebars'] = $sidebars;
}

function kadence_ascend_after_import( $selected_import ) {
	// ASCEND PREMIUM
	if ( 'Base Demo' === $selected_import['import_file_name'] ) {
			// Assign Woo Pages.
			if( class_exists('Woocommerce') ) {
				kadence_import_demo_woocommerce();
			}

			// Assign menus to their locations.
			$main_menu = get_term_by( 'name', 'Main Shopping', 'nav_menu' );

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
	} elseif ( 'Gallery Demo' === $selected_import['import_file_name'] ) {
			// Assign Woo Pages.
			if( class_exists('Woocommerce') ) {
				kadence_import_demo_woocommerce();
			}

			// Assign menus to their locations.
			$main_menu = get_term_by( 'name', 'Main2', 'nav_menu' );

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
	}elseif ( 'Shop Demo' === $selected_import['import_file_name'] ) {
			// Assign Woo Pages.
			if( class_exists('Woocommerce') ) {
				kadence_import_demo_woocommerce();
			}

			// Assign menus to their locations.
			$main_menu = get_term_by( 'name', 'Main Shopping', 'nav_menu' );
			$footer = get_term_by( 'name', 'Customer Service', 'nav_menu' );

			set_theme_mod( 'nav_menu_locations', array(
					'left_navigation' => $main_menu->term_id,
					'mobile_navigation' => $main_menu->term_id,
					'footer_navigation' => $footer->term_id,
				)
			);

			// Assign front page.			
			$homepage = get_page_by_title( 'Home' );
			if(isset( $homepage ) && $homepage->ID) {
				update_option('show_on_front', 'page');
				update_option('page_on_front', $homepage->ID); // Front Page
			}
	} elseif ( 'Blogger Demo' === $selected_import['import_file_name'] ) {
			// Assign Woo Pages.

			// Assign menus to their locations.
			$main_menu = get_term_by( 'name', 'Photography Menu', 'nav_menu' );
			$second = get_term_by( 'name', 'Blogger Second', 'nav_menu' );
			$footer = get_term_by( 'name', 'PhotoBlogger Footer', 'nav_menu' );

			set_theme_mod( 'nav_menu_locations', array(
					'primary_navigation' => $main_menu->term_id,
					'mobile_navigation' => $main_menu->term_id,
					'secondary_navigation' => $second->term_id,
					'footer_navigation' => $footer->term_id,
				)
			);

			wp_delete_post(1);
	} elseif ( 'Gutenberg Demo' === $selected_import['import_file_name'] ) {
			// Assign Woo Pages.

			// Assign menus to their locations.
			$main_menu = get_term_by( 'name', 'Menu Main', 'nav_menu' );
			$second = get_term_by( 'name', 'Blogger Second', 'nav_menu' );
			$footer = get_term_by( 'name', 'PhotoBlogger Footer', 'nav_menu' );

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

			wp_delete_post(1);
	}
}
