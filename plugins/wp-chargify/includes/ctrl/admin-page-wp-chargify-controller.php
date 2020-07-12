<?php
/**
 * A controller class for the main admin page.
 *
 * @file    wp-chargify/includes/ctrl/admin-page-wp-chargify-controller.php
 * @package WPChargify
 */

namespace Chargify\Controllers;

use function Chargify\Libraries\wp_enqueue_script_auto_ver;
use function Chargify\Libraries\wp_enqueue_style_auto_ver;
use function Chargify\Libraries\wp_localize_script_auto_ver;
use function Chargify\Libraries\wp_register_script_auto_ver;

/**
 * A controller class for the main admin page.
 */
class Admin_Page_WPChargify_Controller {
	/**
	 * Setup the controller.
	 */
	public function __construct() {
		$this->setup();
	}

	/**
	 * Register all actions, filters and routes
	 */
	public function setup() {
		add_action('admin_menu', [ $this, 'add_main_wp_menu' ] );
	}

	public function add_main_wp_menu() {
		add_menu_page(
			'WP Chargify',
			'WP Chargify',
			'manage_options',
			'wp-chargify.php'
		);
	}

}
