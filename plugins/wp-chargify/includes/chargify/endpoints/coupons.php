<?php
/**
 * Chargify coupon methods.
 *
 * @file    wp-chargify/includes/chargify/endpoints/coupons.php
 * @package WPChargify
 */

namespace Chargify\Chargify\Endpoints\Coupons;

use Chargify\Helpers\Options;
use Chargify\Post_Types\Helpers;
use WP_Error;

/**
 * Retrieve the coupon validation result in a formatted array.
 *
 * @param int    $product_family_id the product family id that the code belongs to.
 * @param string $coupon_code       The coupon code it self.
 *
 * @return array
 * [
 * 'success' => bool,
 * 'message' => string,
 * 'message-log' => string,
 * 'result' => mixed,
 * ]
 */
function validate_coupon( $product_family_id, $coupon_code ) {

	// Base response format required by requesting interface.
	$response = [
		'message'     => '',   // Client facing message.
		'message-log' => '',   // Log messages.
		'success'     => true, // Default pass.
		'data'        => [],   // Data to use.
	];

	$subdomain        = Options\get_subdomain();
	$destination_path = '/product_families/' . $product_family_id . '/coupons/validate.json?code=' . $coupon_code;

	if ( is_wp_error( $subdomain ) ) {
		/**
		 * A function to log requests send to the Chargify Product Families endpoints.
		 *
		 * @param $request_endpoint string     The URL we are sending the request to.
		 * @param $response_status  int        The HTTP status code that the endpoint responded with.
		 * @param $response_headers array      The headers that the REST API endpoint returned.
		 * @param $type             string     The type of request. e.g. 'REST' or 'webhook'.
		 * @param $response_body    array      The data that the REST API endpoint returned.
		 * @param $payload          array      The data we received in the request.
		 * @param $event            string     The type of event we receieved in the request.
		 * @param $event_id         int|string The unique event ID in Chargify.
		 */
		do_action( 'chargify\log_request', $destination_path, '400', [], 'REST - validate_coupon', [], [], $subdomain );

		$response['success']     = false;
		$response['message']     = 'Sorry, there has been a error with our connection to the billing system. Please contact us for assistance.';
		$response['message-log'] = $subdomain->get_error_message();

		// Bail early.
		return $response;
	}

	$request_endpoint = Options\get_subdomain() . $destination_path;
	$request_headers  = Options\get_headers();
	$request          = wp_safe_remote_get( $request_endpoint, $request_headers );

	// Grab info from successful responses so we can log requests.
	$response_status  = wp_remote_retrieve_response_code( $request );
	$response_headers = wp_remote_retrieve_headers( $request );
	$response_body    = wp_remote_retrieve_body( $request );

	/**
	 * A function to log requests send to the Chargify Product Families endpoints.
	 *
	 * @param $request_endpoint string     The URL we are sending the request to.
	 * @param $response_status  int        The HTTP status code that the endpoint responded with.
	 * @param $response_headers array      The headers that the REST API endpoint returned.
	 * @param $type             string     The type of request. e.g. 'REST' or 'webhook'.
	 * @param $response_body    array      The data that the REST API endpoint returned.
	 * @param $payload          array      The data we received in the request.
	 * @param $event            string     The type of event we receieved in the request.
	 * @param $event_id         int|string The unique event ID in Chargify.
	 */
	do_action( 'chargify\log_request', $request_endpoint, $response_status, (array) $response_headers, 'REST - get_product_families', $response_body );

	// Determine the type of error, 200 and 201 are pass.
	if ( 400 === $response_status ) {
		$response['success']     = false;
		$response['message']     = 'Sorry, there has been a error validating the coupon. Please check the coupon has no spaces and is in the correct format. Alternatively please refresh and try again.';
		$response['message-log'] = 'Error coupon data not in correct format for Chargify.' . wp_remote_retrieve_response_message( $request );
		$response['data']        = $request; // Add logging data.

	} elseif ( 200 !== $response_status && 201 !== $response_status && 404 !== $response_status ) {
		$response['success']     = false;
		$response['message']     = 'Sorry, there has been a error connecting to the billing system. Please refresh and try again. Alternatively contact us for assistance.';
		$response['message-log'] = 'Error response from connecting to Chargify.' . wp_remote_retrieve_response_message( $request );
		$response['data']        = $request; // Add logging data.

	} elseif ( 404 === $response_status ) {
		// TODO double check.
		$response['message']     = wp_remote_retrieve_response_message( $request );
		$response['message-log'] = wp_remote_retrieve_response_message( $request );
		$response['success']     = false;

	} else {
		// Successfully, format response.
		$response['message']     = 'Your coupon is valid.';
		$response['message-log'] = 'Valid coupon.';

		$json = json_decode( $response_body, true );

		$response['data'] = $json;
	}

	// Return the response in the required format.
	return $response;
}
