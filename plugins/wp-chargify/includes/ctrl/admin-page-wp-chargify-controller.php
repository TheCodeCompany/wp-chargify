<?php
/**
 * A controller class for the main admin page.
 *
 * @file    wp-chargify/includes/ctrl/admin-page-wp-chargify-controller.php
 * @package WPChargify
 */

namespace Chargify\Controllers;

/**
 * A controller class for the main admin page.
 */
class Admin_Page_WP_Chargify_Controller {
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
			__( 'WP Chargify', 'chargify' ),
			__( 'WP Chargify', 'chargify' ),
			'manage_options',
			'wp-chargify.php'
		);
	}

}
