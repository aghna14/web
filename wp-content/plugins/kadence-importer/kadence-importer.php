<?php
/**
 * Plugin Name: Kadence Importer
 * Description: Choose the demo and click import. Easy Kadence Themes demo site Imports.
 * Version: 2.0.5
 * Author: Kadence Themes
 * Author URI: http://kadencethemes.com/
 * License: GPLv2 or later
 * Text Domain: kadence-importer
 *
 * @package Kadence Importer
 */

// Block direct access to the main plugin file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! version_compare( PHP_VERSION, '5.4', '>=' ) ) {
	add_action( 'admin_notices', 'kadence_importer_old_php_admin_error_notice' );
} else {
	require_once 'class-kadence-importer.php';
}
/**
 * Display an admin error notice when PHP is older the version 5.3.2.
 * Hook it to the 'admin_notices' action.
 */
function kadence_importer_old_php_admin_error_notice() {
	$message = __( 'The Kadence Importer plugin requires at least PHP 5.4 to run properly. Please contact your hosting company and ask them to update the PHP version of your site to at least PHP 5.4. We strongly encourge you to update to 7.2', 'kadence-importer' );

	printf( '<div class="notice notice-error"><p>%1$s</p></div>', wp_kses_post( $message ) );
}

require_once 'wp-updates-plugin.php';

$kad_importer_updater = new PluginUpdateChecker_2_0( 'https://kernl.us/api/v1/updates/56f44151700cab945bcca01d/', __FILE__, 'kadence-importer', 1 );
