<?php
/**
 * A controller class to validate coupons.
 *
 * @file    wp-chargify/includes/ctrl/validate-coupon-controller.php
 * @package WPChargify
 */

namespace Chargify\Controllers;

use Chargify\Libraries\Requests;
use function wp_create_nonce;
use function wp_verify_nonce;
use function Chargify\Chargify\Endpoints\Coupons\validate_coupon;

/**
 * A controller class to validate coupons.
 */
class ValidateCouponController {

	const ACTION    = 'validate-coupon';
	const NONCE_KEY = 'validate-coupon';

	/**
	 * Hold the current request variables for ease of use.
	 *
	 * @var null|Requests
	 */
	protected $request = null;

	/**
	 * Setup the controller.
	 */
	public function __construct() {
		$this->register_ajax_endpoints();
	}

	/**
	 * Register all admin AJAX endpoints for this controller.
	 */
	public function register_ajax_endpoints() {
		add_action( 'wp_ajax_' . self::action(), [ $this, 'validate_coupon' ] );
		add_action( 'wp_ajax_nopriv_' . self::action(), [ $this, 'validate_coupon' ] );
	}

	/**
	 * The validate coupon method.
	 * Processes the request using chargify endpoint function and returns the required formatted response.
	 */
	public function validate_coupon() {

		$this->request = new Requests();

		// Base response format required by requesting interface.
		$response = [
			'message'     => '',   // Client facing message.
			'message-log' => '',   // Log messages.
			'success'     => false, // Default pass.
			'data'        => [],   // Data to use.
		];

		$wp_nonce = $this->request->post_variables( 'wp_nonce' );

		if ( wp_verify_nonce( $wp_nonce, self::NONCE_KEY ) ) {

			$product_family_id = $this->request->post_variables( 'product_family_id' );
			$coupon_code       = $this->request->post_variables( 'coupon_code' );

			if ( is_numeric( $product_family_id ) && ! empty( $coupon_code ) ) {
				$response = validate_coupon( $product_family_id, $coupon_code );
			} else {
				$response['success']     = false;
				$response['message']     = 'Sorry, required data was missing. Please refresh and try again. Alternatively contact us for assistance.';
				$response['message-log'] = 'Error with product family id or coupon code.';
			}
		} else {
			$response['success']     = false;
			$response['message']     = 'Sorry, the nonce validation failed. Please refresh and try again. Alternatively contact us for assistance.';
			$response['message-log'] = 'Error with nonce verification.';
		}

		// Return the response.
		header( 'Content-Type: application/json' );
		die( wp_json_encode( $response ) );
	}

	/**
	 * Return the action key, used by WP and front end scripts.
	 *
	 * @return string
	 */
	public static function action() {
		return self::ACTION;
	}

	/**
	 * Build the nonce used to validate this admin ajax endpoint.
	 *
	 * @return bool|string
	 */
	public static function nonce() {
		return wp_create_nonce( self::NONCE_KEY );
	}

}
