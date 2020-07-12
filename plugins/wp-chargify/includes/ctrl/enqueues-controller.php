<?php
/**
 * A controller class for site enqueues.
 *
 * @file    wp-chargify/includes/ctrl/enqueues-controller.php
 * @package WPChargify
 */

namespace Chargify\Controllers;

use function Chargify\Libraries\wp_enqueue_script_auto_ver;
use function Chargify\Libraries\wp_enqueue_style_auto_ver;
use function Chargify\Libraries\wp_localize_script_auto_ver;
use function Chargify\Libraries\wp_register_script_auto_ver;

/**
 * A controller class for site enqueues.
 */
class Enqueues_Controller {

	const IDENTIFIER = 'wp-chargify';

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
		// Main enqueues.
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueues' ] );

		// Admin enqueues.
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_styles_and_scripts' ] );
	}

	/**
	 * Main enqueues for the front end of the site.
	 */
	public function enqueues() {

		// TODO look at ways to enqueue on specific pages.
		// TODO Possibly build form specific JS into a separate file and inject inline below form.

		$assets_handle = self::IDENTIFIER . '-main';

		wp_enqueue_style_auto_ver(
			$assets_handle,
			WP_CHARGIFY_PLUGIN_URL . 'includes/assets/css/' . $assets_handle . '.css'
		);

		wp_register_script_auto_ver(
			$assets_handle,
			WP_CHARGIFY_PLUGIN_URL . 'includes/assets/js/' . $assets_handle . '.js',
			[ 'jquery' ],
			true,
			true,
			true
		);

		wp_localize_script_auto_ver(
			$assets_handle,
			'wpChargifyMainConfig',
			$this->get_main_script_config()
		);

		wp_enqueue_script_auto_ver( $assets_handle );
	}

	/**
	 * Admin enqueues for the WP admin area of the site.
	 *
	 * @param int $hook Hook suffix for the current admin page.
	 */
	public function admin_styles_and_scripts( $hook ) {

		// Checks to ensure these enqueues are on specific pages.
		if ( is_admin() && 'post.php' !== $hook &&
			'chargify_api_log' !== get_post_type() ) {
			return;
		}

		// As CMB2 enqueues their styles on all pages we needed to remove it and add it back on our custom post type.
		wp_enqueue_style( 'cmb2-styles' );

		$assets_handle = self::IDENTIFIER . '-admin';

		wp_enqueue_style_auto_ver(
			$assets_handle,
			WP_CHARGIFY_PLUGIN_URL . 'includes/assets/css/' . $assets_handle . '.css'
		);

		wp_register_script_auto_ver(
			$assets_handle,
			WP_CHARGIFY_PLUGIN_URL . 'includes/assets/js/' . $assets_handle . '.js',
			[ 'jquery' ],
			true,
			true,
			true
		);

		wp_localize_script_auto_ver(
			$assets_handle,
			'wpChargifyAdminConfig',
			$this->get_admin_script_config()
		);

		wp_enqueue_script_auto_ver( $assets_handle );
	}

	/**
	 * Any JS config params to pass from php to the JS build file.
	 *
	 * @return array
	 */
	protected function get_main_script_config() {

		$base_config = [
			'ajaxURL'              => admin_url( 'admin-ajax.php' ),
			'validateCouponAction' => ValidateCouponController::action(),
			'validateCouponNonce'  => ValidateCouponController::nonce(),
		];

		// Defaults, can be filtered by the theme.
		$chargify_signup_country_and_states = [
			'signupDefaultCountry'   => 'AU', // Australia is the default country for select dropdowns in the signup form.
			'signupCountriesPopular' => [
				'AU',
				'NZ',
				'US',
				'GB',
				'ZA',
				'SG',
				'CA',
				'FR',
				'IN',
				'DE',
			],
			'signupCountries'        => [],
		];

		$chargify_signup_country_and_states = apply_filters( 'chargify_signup_country_and_states', $chargify_signup_country_and_states );

		if ( ! empty( $chargify_signup_country_and_states ) &&
			is_array( $chargify_signup_country_and_states ) ) {
			$base_config = array_merge( $base_config, $chargify_signup_country_and_states );
		}

		$base_config = apply_filters( 'chargify_base_js_config', $base_config );

		return $base_config;
	}

	/**
	 * Any JS config params to pass from php to the JS build file.
	 *
	 * @return array
	 */
	protected function get_admin_script_config() {
		return [];
	}

}
