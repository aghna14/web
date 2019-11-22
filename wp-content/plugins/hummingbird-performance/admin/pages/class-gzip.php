<?php
/**
 * Gzip compression admin page.
 *
 * @package Hummingbird\Admin\Pages
 */

namespace Hummingbird\Admin\Pages;

use Hummingbird\Admin\Page;
use Hummingbird\Core\Module_Server;
use Hummingbird\Core\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Gzip extends Page.
 */
class Gzip extends Page {

	/**
	 * Overwrites parent class render_header method.
	 *
	 * Renders the template header that is repeated on every page.
	 * From WPMU DEV Dashboard
	 */
	public function render_header() {
		if ( isset( $_GET['htaccess-error'] ) ) { // Input var ok.
			$this->admin_notices->show( 'error', __( 'Hummingbird could not update or write your .htaccess file. Please, make .htaccess writable or paste the code yourself.', 'wphb' ), 'error' );
		}

		if ( isset( $_GET['gzip-enabled'] ) ) { // Input var ok.
			$this->admin_notices->show( 'updated', __( 'Gzip enabled. Your .htaccess file has been updated', 'wphb' ), 'success' );
		}

		if ( isset( $_GET['gzip-disabled'] ) ) { // Input var ok.
			$this->admin_notices->show( 'updated', __( 'Gzip disabled. Your .htaccess file has been updated', 'wphb' ), 'success' );
		}
	}

	/**
	 * Check if Gzip has been already activated in server by user, not by Hummingbird
	 *
	 * @return bool
	 */
	private function _gzip_already_activated_in_server() {
		$result = false;
		if ( 3 === array_sum( $this->status ) && ! $this->htaccess_written ) {
			// Server had already gzip activated, Hummingbird did nothing.
			$result = true;
		}

		return $result;
	}

	/**
	 * Render gzip configure metabox.
	 */
	public function gzip_configure_metabox() {
		$show_enable_button = ! $this->_gzip_already_activated_in_server();

		$full_enabled = array_sum( $this->status ) === 3;

		$this->view(
			'gzip/configure-meta-box',
			array(
				'show_enable_button' => $show_enable_button,
				'full_enabled'       => $full_enabled,
			)
		);
	}

}
