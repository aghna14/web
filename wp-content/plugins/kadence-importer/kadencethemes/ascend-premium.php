<?php

// Block direct access to the main plugin file.
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Ascend Premium
function kadence_import_ascend_premium_files() {
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
	$kadence_blocks = array(
		'base' => 'kadence-blocks',
		'slug' => 'kadence-blocks',
		'activate_url' => self_admin_url( 'plugins.php?_wpnonce=' . wp_create_nonce( 'activate-plugin_kadence-blocks/kadence-blocks.php' ) . '&action=activate&plugin=kadence-blocks%2Fkadence-blocks.php' ),
		'install_url'  => $install_link = wp_nonce_url( add_query_arg( array( 'action' => 'install-plugin', 'plugin' => 'kadence-blocks', ), network_admin_url( 'update.php' ) ), 'install-plugin_kadence-blocks' ),
		'title' => 'Kadence Blocks',
		'bundled'      => '0',
		'state' => Kadence_Importer_Plugin_Check::active_check( 'kadence-blocks/kadence-blocks.php' ),
	);
	$mailchimp = array(
		'base' => 'mailchimp-for-wp',
		'slug' => 'mailchimp-for-wp',
		'activate_url' => self_admin_url( 'plugins.php?_wpnonce=' . wp_create_nonce( 'activate-plugin_mailchimp-for-wp/mailchimp-for-wp.php' ) . '&action=activate&plugin=mailchimp-for-wp%2Fmailchimp-for-wp.php' ),
		'install_url'  => $install_link = wp_nonce_url( add_query_arg( array( 'action' => 'install-plugin', 'plugin' => 'mailchimp-for-wp', ), network_admin_url( 'update.php' ) ), 'install-plugin_mailchimp-for-wp' ),
		'title' => 'MailChimp-for WP',
		'bundled'      => '0',
		'state' => Kadence_Importer_Plugin_Check::active_check( 'mailchimp-for-wp/mailchimp-for-wp.php' ),
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
	$kadence_blocks_pro = array(
		'base' => 'kadence-blocks-pro',
		'slug' => 'kadence-blocks-pro',
		'activate_url' => self_admin_url( 'plugins.php?_wpnonce=' . wp_create_nonce( 'activate-plugin_kadence-blocks-pro/kadence-blocks-pro.php' ) . '&action=activate&plugin=kadence-blocks-pro%2Fkadence-blocks-pro.php' ),
		'install_url'  => $install_link = wp_nonce_url( add_query_arg( array( 'action' => 'install-plugin', 'plugin' => 'kadence-blocks-pro', ), network_admin_url( 'update.php' ) ), 'install-plugin_kadence-blocks-pro' ),
		'title' => 'Kadence Block Pro',
		'bundled'      => '1',
		'state' => Kadence_Importer_Plugin_Check::active_check( 'kadence-blocks-pro/kadence-blocks-pro.php' ),
	);
	$event_organiser = array(
		'base' => 'event-organiser',
		'slug' => 'event-organiser',
		'activate_url' => self_admin_url( 'plugins.php?_wpnonce=' . wp_create_nonce( 'activate-plugin_event-organiser/event-organiser.php' ) . '&action=activate&plugin=event-organiser%2Fevent-organiser.php' ),
		'install_url'  => $install_link = wp_nonce_url( add_query_arg( array( 'action' => 'install-plugin', 'plugin' => 'event-organiser', ), network_admin_url( 'update.php' ) ), 'install-plugin_event-organiser' ),
		'title' => 'Event Organiser',
		'bundled'      => '0',
		'state' => Kadence_Importer_Plugin_Check::active_check( 'event-organiser/event-organiser.php' ),
	);
	$sspodcasting = array(
		'base' => 'seriously-simple-podcasting',
		'slug' => 'seriously-simple-podcasting',
		'activate_url' => self_admin_url( 'plugins.php?_wpnonce=' . wp_create_nonce( 'activate-plugin_seriously-simple-podcasting/seriously-simple-podcasting.php' ) . '&action=activate&plugin=seriously-simple-podcasting%2Fseriously-simple-podcasting.php' ),
		'install_url'  => $install_link = wp_nonce_url( add_query_arg( array( 'action' => 'install-plugin', 'plugin' => 'seriously-simple-podcasting', ), network_admin_url( 'update.php' ) ), 'install-plugin_seriously-simple-podcasting' ),
		'title' => 'Seriously Simple Podcasting',
		'bundled'      => '0',
		'state' => Kadence_Importer_Plugin_Check::active_check( 'seriously-simple-podcasting/seriously-simple-podcasting.php' ),
	);
	$ssspeakers = array(
		'base' => 'seriously-simple-speakers',
		'slug' => 'seriously-simple-speakers',
		'activate_url' => self_admin_url( 'plugins.php?_wpnonce=' . wp_create_nonce( 'activate-plugin_seriously-simple-speakers/seriously-simple-speakers.php' ) . '&action=activate&plugin=seriously-simple-speakers%2Fseriously-simple-speakers.php' ),
		'install_url'  => $install_link = wp_nonce_url( add_query_arg( array( 'action' => 'install-plugin', 'plugin' => 'seriously-simple-speakers', ), network_admin_url( 'update.php' ) ), 'install-plugin_seriously-simple-speakers' ),
		'title' => 'Seriously Simple Speakers',
		'bundled'      => '0',
		'state' => Kadence_Importer_Plugin_Check::active_check( 'seriously-simple-speakers/seriously-simple-speakers.php' ),
	);
	$give = array(
		'base' => 'give',
		'slug' => 'give',
		'activate_url' => self_admin_url( 'plugins.php?_wpnonce=' . wp_create_nonce( 'activate-plugin_give/give.php' ) . '&action=activate&plugin=give%2Fgive.php' ),
		'install_url'  => $install_link = wp_nonce_url( add_query_arg( array( 'action' => 'install-plugin', 'plugin' => 'give', ), network_admin_url( 'update.php' ) ), 'install-plugin_give' ),
		'title' => 'Give',
		'bundled'      => '0',
		'state' => Kadence_Importer_Plugin_Check::active_check( 'give/give.php' ),
	);
	return array(
		array(
			'import_file_name'           => 'Base Site',
			'categories'                 => array( 'Woocommerce', 'Kadence Slider' ),
			'import_file_url'            => 'https://kadence.design/importer/ascend-premium/base_site/demo_content.xml',
			'import_widget_file_url'     => 'https://kadence.design/importer/ascend-premium/base_site/widget_data.json',
			'import_customizer_file_url' => '',
			'import_redux'               => array(
				array(
					'file_url'    => 'https://kadence.design/importer/ascend-premium/base_site/theme_options.json',
					'option_name' => 'ascend',
				),
			),
			'preview_url'                => 'http://themes.kadencethemes.com/ascend-premium/',
			'import_preview_image_url'   => 'https://kadence.design/importer/ascend-premium/base_site/preview-image.jpg',
			'import_notice'              => '',
			'plugins'                    => array(
				$kadence_slider,
				$siteorigin_panels,
				$woocommerce,
				$visual_editor,
			),
		),
		array(
			'import_file_name'           => 'Travel Site',
			'categories'                 => array( 'Woocommerce', 'Kadence Slider' ),
			'import_file_url'            => 'https://kadence.design/importer/ascend-premium/travel_site/demo_content.xml',
			'import_widget_file_url'     => 'https://kadence.design/importer/ascend-premium/travel_site/widget_data.json',
			'import_customizer_file_url' => '',
			'import_redux'               => array(
				array(
					'file_url'    => 'https://kadence.design/importer/ascend-premium/travel_site/theme_options.json',
					'option_name' => 'ascend',
				),
			),
			'preview_url'                => 'http://themes.kadencethemes.com/ascend-premium-2/',
			'import_preview_image_url'   => 'https://kadence.design/importer/ascend-premium/travel_site/preview-image.jpg',
			'import_notice'              => '',
			'plugins'                    => array(
				$kadence_slider,
				$siteorigin_panels,
				$woocommerce,
				$visual_editor,
			),
		),
		array(
			'import_file_name'           => 'Shopping Site',
			'categories'                 => array( 'Woocommerce', 'Kadence Slider' ),
			'import_file_url'            => 'https://kadence.design/importer/ascend-premium/shopping_site/demo_content.xml',
			'import_widget_file_url'     => 'https://kadence.design/importer/ascend-premium/shopping_site/widget_data.json',
			'import_customizer_file_url' => '',
			'import_redux'               => array(
				array(
					'file_url'    => 'https://kadence.design/importer/ascend-premium/shopping_site/theme_options.json',
					'option_name' => 'ascend',
				),
			),
			'preview_url'                => 'http://themes.kadencethemes.com/ascend-premium-3/',
			'import_preview_image_url'   => 'https://kadence.design/importer/ascend-premium/shopping_site/preview-image.jpg',
			'import_notice'              => '',
			'plugins'                    => array(
				$kadence_slider,
				$siteorigin_panels,
				$woocommerce,
				$visual_editor,
			),
		),
		array(
			'import_file_name'           => 'Agency Site',
			'categories'                 => array('Portfolio'),
			'import_file_url'            => 'https://kadence.design/importer/ascend-premium/agency_site/demo_content.xml',
			'import_widget_file_url'     => 'https://kadence.design/importer/ascend-premium/agency_site/widget_data.json',
			'import_customizer_file_url' => '',
			'import_redux'               => array(
				array(
					'file_url'    => 'https://kadence.design/importer/ascend-premium/agency_site/theme_options.json',
					'option_name' => 'ascend',
				),
			),
			'preview_url'                => 'http://themes.kadencethemes.com/ascend-premium-4/',
			'import_preview_image_url'   => 'https://kadence.design/importer/ascend-premium/agency_site/preview-image.jpg',
			'import_notice'              => '',
			'plugins'                    => array(
				$siteorigin_panels,
				$visual_editor,
			),
		),
		array(
			'import_file_name'           => 'Video Portfolio Site',
			'categories'                 => array('Kadence Slider', 'Portfolio' ),
			'import_file_url'            => 'https://kadence.design/importer/ascend-premium/video_site/demo_content.xml',
			'import_widget_file_url'     => 'https://kadence.design/importer/ascend-premium/video_site/widget_data.json',
			'import_customizer_file_url' => '',
			'import_redux'               => array(
				array(
					'file_url'    => 'https://kadence.design/importer/ascend-premium/video_site/theme_options.json',
					'option_name' => 'ascend',
				),
			),
			'preview_url'              => 'http://themes.kadencethemes.com/ascend-premium-5/',
			'import_preview_image_url'   => 'https://kadence.design/importer/ascend-premium/video_site/preview-image.jpg',
			'import_notice'              => __( 'Due to the size of video files this importer only imports a very low quality 3 sec video for the slider.' ),
			'plugins'                    => array(
				$kadence_slider,
				$siteorigin_panels,
				$visual_editor,
			),
		),
		array(
			'import_file_name'           => 'Magazine Site',
			'categories'                 => array(),
			'import_file_url'            => 'https://kadence.design/importer/ascend-premium/mag_site/demo_content.xml',
			'import_widget_file_url'     => 'https://kadence.design/importer/ascend-premium/mag_site/widget_data.json',
			'import_customizer_file_url' => '',
			'import_redux'               => array(
				array(
					'file_url'    => 'https://kadence.design/importer/ascend-premium/mag_site/theme_options.json',
					'option_name' => 'ascend',
				),
			),
			'preview_url'                => 'http://themes.kadencethemes.com/ascend-premium-6/',
			'import_preview_image_url'   => 'https://kadence.design/importer/ascend-premium/mag_site/preview-image.jpg',
			'import_notice'              => '',
			'plugins'                    => array(
				$siteorigin_panels,
				$visual_editor,
			),
		),
		array(
			'import_file_name'           => 'Photographer Site',
			'categories'                 => array('Portfolio'),
			'import_file_url'            => 'https://kadence.design/importer/ascend-premium/photo_site/demo_content.xml',
			'import_widget_file_url'     => 'https://kadence.design/importer/ascend-premium/photo_site/widget_data.json',
			'import_customizer_file_url' => '',
			'import_redux'               => array(
				array(
					'file_url'    => 'https://kadence.design/importer/ascend-premium/photo_site/theme_options.json',
					'option_name' => 'ascend',
				),
			),
			'preview_url'                => 'http://themes.kadencethemes.com/ascend-premium-7/',
			'import_preview_image_url'   => 'https://kadence.design/importer/ascend-premium/photo_site/preview-image.jpg',
			'import_notice'              => '',
			'plugins'                    => array(
				$siteorigin_panels,
				$visual_editor,
			),
		),
		array(
			'import_file_name'           => 'Church Site',
			'categories'                 => array( 'Kadence Slider' ),
			'import_file_url'            => 'https://kadence.design/importer/ascend-premium/church_site/demo_content.xml',
			'import_widget_file_url'     => 'https://kadence.design/importer/ascend-premium/church_site/widget_data.json',
			'import_customizer_file_url' => '',
			'import_redux'               => array(
				array(
					'file_url'    => 'https://kadence.design/importer/ascend-premium/church_site/theme_options.json',
					'option_name' => 'ascend',
				),
			),
			'preview_url'                => 'http://themes.kadencethemes.com/ascend-premium-8/',
			'import_preview_image_url'   => 'https://kadence.design/importer/ascend-premium/church_site/preview-image.jpg',
			'import_notice'              => 'IMPORTANT, this demo includes content from these free plugins: <a target="blank" href="https://wordpress.org/plugins/event-organiser/">Event Organiser</a>, <a href="https://wordpress.org/plugins/seriously-simple-podcasting/" target="blank">Seriously Simple Podcasting</a> and <a href="https://wordpress.org/plugins/give/" target="blank">Give - Donation Plugin</a>. Without these plugins installed the entire demo will not be able to fully install. BEFORE YOU IMPORT go and install those plugins.',
			'plugins'                    => array(
				$siteorigin_panels,
				$visual_editor,
				$give,
				$sspodcasting,
				$ssspeakers,
				$event_organiser,
				$kadence_slider,
			),
		),
		array(
			'import_file_name'           => 'Resturant Site',
			'categories'                 => array( 'Kadence Slider' ),
			'import_file_url'            => 'https://kadence.design/importer/ascend-premium/restaurant_site/demo_content.xml',
			'import_widget_file_url'     => 'https://kadence.design/importer/ascend-premium/restaurant_site/widget_data.json',
			'import_customizer_file_url' => '',
			'import_redux'               => array(
				array(
					'file_url'    => 'https://kadence.design/importer/ascend-premium/restaurant_site/theme_options.json',
					'option_name' => 'ascend',
				),
			),
			'preview_url'                => 'http://themes.kadencethemes.com/ascend-premium-9/',
			'import_preview_image_url'   => 'https://kadence.design/importer/ascend-premium/restaurant_site/preview-image.jpg',
			'import_notice'              => '',
			'plugins'                    => array(
				$siteorigin_panels,
				$visual_editor,
				$kadence_slider,
			),
		),
		array(
			'import_file_name'           => 'Agency Blocks Site',
			'categories'                 => array( 'Gutenberg' ),
			'import_file_url'            => 'https://kadence.design/importer/ascend-premium/guten_agency/demo_content.xml',
			'import_widget_file_url'     => 'https://kadence.design/importer/ascend-premium/guten_agency/widget_data.json',
			'import_customizer_file_url' => '',
			'import_redux'               => array(
				array(
					'file_url'    => 'https://kadence.design/importer/ascend-premium/guten_agency/theme_options.json',
					'option_name' => 'ascend',
				),
			),
			'preview_url'                => 'http://themes.kadencethemes.com/ascend-premium-10/',
			'import_preview_image_url'   => 'https://kadence.design/importer/ascend-premium/guten_agency/preview-image.jpg',
			'import_notice'              => '',
			'plugins'                    => array(
				$kadence_blocks,
				$kadence_blocks_pro,
				$mailchimp,
			),
		),
		array(
			'import_file_name'           => 'Free Demo Site',
			'categories'                 => array('Woocommerce', 'Portfolio'),
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
				$woocommerce,
			),
		),
		array(
			'import_file_name'           => 'Free Demo Gutenberg Site',
			'categories'                 => array('Gutenberg'),
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
				$kadence_blocks,
			),
		),
		array(
			'import_file_name'           => 'Free Demo Gallery Site',
			'categories'                 => array('Woocommerce', 'Portfolio'),
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
				$woocommerce,
			),
		),
		array(
			'import_file_name'           => 'Free Demo Shop Site',
			'categories'                 => array('Woocommerce', 'Portfolio'),
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
				$woocommerce,
			),
		),
		array(
			'import_file_name'           => 'Free Demo Blogger Site',
			'categories'                 => array('Woocommerce', 'Portfolio'),
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
			'plugins'                    => array(),
		),
	);
}
function kadence_before_widgets_ascend_premium_import_action($selected_import) {
	if ( 'Free Demo Site' === $selected_import['import_file_name'] || 'Free Demo Gallery Site' === $selected_import['import_file_name'] || 'Free Demo Shop Site' === $selected_import['import_file_name'] || 'Shopping Site' === $selected_import['import_file_name'] ) {
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
}
function kadence_ascend_premium_after_import( $selected_import ) {
	// ASCEND PREMIUM
	if ( 'Base Site' === $selected_import['import_file_name'] ) {

			// Assign menus to their locations.
			$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

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

	} else  if ( 'Travel Site' === $selected_import['import_file_name'] ) {
			// Assign Woo Pages.
			if( class_exists('Woocommerce') ) {
				kadence_import_demo_woocommerce('Travel Gear');
			}

			// Assign menus to their locations.
			$main_menu = get_term_by( 'name', 'Travel Menu', 'nav_menu' );

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
			$kspslider_directory = KADENCE_IMPORTER_PATH . 'kadencethemes/ascend_premium/travel_site/ksp_sliders/';
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
	} elseif ( 'Shopping Site' === $selected_import['import_file_name'] ) {
		// Assign Woo Pages.
			if( class_exists('Woocommerce') ) {
				kadence_import_demo_woocommerce();
			}

			// Assign menus to their locations.
			$main_menu = get_term_by( 'name', 'Main Shopping', 'nav_menu' );
			$top = get_term_by( 'name', 'Resources Shopping', 'nav_menu' );

			set_theme_mod( 'nav_menu_locations', array(
					'secondary_navigation' => $main_menu->term_id,
					'mobile_navigation' => $main_menu->term_id,
					'topbar_navigation' => $top->term_id,
				)
			);

			// Assign front page.			
			$homepage = get_page_by_title( 'Home' );
			if(isset( $homepage ) && $homepage->ID) {
				update_option('show_on_front', 'page');
				update_option('page_on_front', $homepage->ID); // Front Page
			}

			// Import Sliders
			$kspslider_directory = KADENCE_IMPORTER_PATH . 'kadencethemes/ascend_premium/shopping_site/ksp_sliders/';
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
	} elseif ( 'Agency Site' === $selected_import['import_file_name'] ) {

			// Assign menus to their locations.
			$main_menu = get_term_by( 'name', 'Agency Menu', 'nav_menu' );
			$footer = get_term_by( 'name', 'Agency Footer', 'nav_menu' );

			set_theme_mod( 'nav_menu_locations', array(
					'primary_navigation' => $main_menu->term_id,
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

	} elseif ( 'Video Portfolio Site' === $selected_import['import_file_name'] ) {

			// Assign menus to their locations.
			$main_menu = get_term_by( 'name', 'Video Menu', 'nav_menu' );

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
			$kspslider_directory = KADENCE_IMPORTER_PATH . 'kadencethemes/ascend_premium/video_site/ksp_sliders/';
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

	} elseif ( 'Magazine Site' === $selected_import['import_file_name'] ) {

			// Assign menus to their locations.
			$main_menu = get_term_by( 'name', 'Magazine Menu', 'nav_menu' );
			$top = get_term_by( 'name', 'Magazine Topbar', 'nav_menu' );

			set_theme_mod( 'nav_menu_locations', array(
					'secondary_navigation' => $main_menu->term_id,
					'mobile_navigation' => $main_menu->term_id,
					'topbar_navigation' => $top->term_id,
				)
			);

			// Assign front page.			
			$homepage = get_page_by_title( 'Home' );
			if(isset( $homepage ) && $homepage->ID) {
				update_option('show_on_front', 'page');
				update_option('page_on_front', $homepage->ID); // Front Page
			}

	} elseif ( 'Photographer Site' === $selected_import['import_file_name'] ) {

			// Assign menus to their locations.
			$main_menu = get_term_by( 'name', 'Photography Menu', 'nav_menu' );
			$footer = get_term_by( 'name', 'Photography Footer', 'nav_menu' );

			set_theme_mod( 'nav_menu_locations', array(
					'primary_navigation' => $main_menu->term_id,
					'mobile_navigation' => $main_menu->term_id,
					'footer_navigation' => $top->term_id,
				)
			);

			// Assign front page.			
			$homepage = get_page_by_title( 'Home' );
			if(isset( $homepage ) && $homepage->ID) {
				update_option('show_on_front', 'page');
				update_option('page_on_front', $homepage->ID); // Front Page
			}

	} elseif ( 'Church Site' === $selected_import['import_file_name'] ) {

			// Assign menus to their locations.
			$main_menu = get_term_by( 'name', 'Church Main', 'nav_menu' );
			$footer = get_term_by( 'name', 'Church Resources', 'nav_menu' );

			set_theme_mod( 'nav_menu_locations', array(
					'primary_navigation' => $main_menu->term_id,
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

			// Import Sliders
			$kspslider_directory = KADENCE_IMPORTER_PATH . 'kadencethemes/ascend_premium/church_site/ksp_sliders/';
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
	} elseif ( 'Resturant Site' === $selected_import['import_file_name'] ) {

			// Assign menus to their locations.
			$right_menu = get_term_by( 'name', 'R Right Menu', 'nav_menu' );
			$left_menu = get_term_by( 'name', 'R Left Main', 'nav_menu' );
			$full = get_term_by( 'name', 'Mobile Nav', 'nav_menu' );

			set_theme_mod( 'nav_menu_locations', array(
					'left_navigation' => $left_menu ->term_id,
					'right_navigation' => $right_menu->term_id,
					'mobile_navigation' => $full->term_id,
					'footer_navigation' => $full->term_id,
				)
			);

			// Assign front page.			
			$homepage = get_page_by_title( 'Home' );
			if(isset( $homepage ) && $homepage->ID) {
				update_option('show_on_front', 'page');
				update_option('page_on_front', $homepage->ID); // Front Page
			}

			// Import Sliders
			$kspslider_directory = KADENCE_IMPORTER_PATH . 'kadencethemes/ascend_premium/restaurant_site/ksp_sliders/';
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
	} elseif ( 'Agency Blocks Site' === $selected_import['import_file_name'] ) {

			// Assign menus to their locations.
			$main = get_term_by( 'name', 'Primary', 'nav_menu' );

			set_theme_mod( 'nav_menu_locations', array(
					'primary_navigation' => $main->term_id,
					'mobile_navigation' => $main->term_id,
				)
			);

			// Assign front page.			
			$homepage = get_page_by_title( 'Home' );
			if(isset( $homepage ) && $homepage->ID) {
				update_option('show_on_front', 'page');
				update_option('page_on_front', $homepage->ID); // Front Page
			}

	} else if ( 'Free Demo Site' === $selected_import['import_file_name'] ) {
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
	} elseif ( 'Free Demo Gallery Site' === $selected_import['import_file_name'] ) {
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
	} elseif ( 'Free Demo Shop Site' === $selected_import['import_file_name'] ) {
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
	} elseif ( 'Free Demo Blogger Site' === $selected_import['import_file_name'] ) {
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
	} elseif ( 'Free Demo Gutenberg Site' === $selected_import['import_file_name'] ) {
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
