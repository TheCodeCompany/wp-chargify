<?php
namespace Chargify\Chargify\Endpoints\Product_Families;

use Chargify\Helpers\Options;
use Chargify\Post_Types\Helpers;
use WP_Error;

/**
 * A function to request all of the product families that are in Chargify.
 *
 * @return string|array
 */
function get_product_families() {
	$subdomain = Options\get_subdomain();

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
		 * @param $event			string     The type of event we receieved in the request.
		 * @param $event_id         int|string The unique event ID in Chargify.
		 */
		do_action( 'chargify\log_request', '/product_families.json', '400', [], 'REST - get_product_families', [], [], $subdomain );
		return $subdomain;
	}

	$request_endpoint = Options\get_subdomain() . '/product_families.json';
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
	 * @param $event			string     The type of event we receieved in the request.
	 * @param $event_id         int|string The unique event ID in Chargify.
	 */
	do_action( 'chargify\log_request', $request_endpoint, $response_status, (array) $response_headers, 'REST - get_product_families', $response_body );

	# Anything other than a 200 code is an error so let's bail.
	if ( 200 !== $response_status ) {
		return wp_remote_retrieve_response_message( $request );
	}

	$json = json_decode( $response_body, true );

	$product_families = [];

	foreach ( $json as $family ) {
		$product_families[] = $family['product_family'];
	}

	return $product_families;
}

/**
 * A function to loop over the product families and get the products contained in that family.
 *
 * @return array|string
 */
function get_products() {
	$product_families = get_product_families();

	# If we haven't got an array then we have an error to return.
	if ( ! is_array( $product_families ) ) {
		return $product_families;
	}

	$product_ids = wp_list_pluck( $product_families, 'id' );

	$headers  = Options\get_headers();

	$products = [];

	foreach ( $product_ids as $product ) {
		$request_endpoint = Options\get_subdomain() . "/product_families/$product/products.json";
		$request  = wp_safe_remote_get( $request_endpoint, $headers );

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
		 * @param $event			string     The type of event we receieved in the request.
		 * @param $event_id         int|string The unique event ID in Chargify.
		 */
		do_action( 'chargify\log_request', $request_endpoint, $response_status, (array) $response_headers, 'REST - get_products', $response_body );

		# Anything other than a 200 code is an error so let's bail.
		if ( 200 !== wp_remote_retrieve_response_code( $request ) ) {
			return wp_remote_retrieve_response_message( $request );
		}

		$json = json_decode( $response_body, true );

		foreach ( $json as $family ) {
			$products[] = $family['product'];
		}
	}

	Helpers\populate_product_post_types( $products );

	return $products;
}

/**
 * A function to get the product details of a product.
 *
 * @param $id int The Product ID.
 * @return mixed|string
 */
function get_product( $id ) {
		$headers  = Options\get_headers();

		$endpoint = Options\get_subdomain() . "/products/$id.json";
		$request  = wp_safe_remote_get( $endpoint, $headers );
		$body     = wp_remote_retrieve_body( $request );

		# Anything other than a 200 code is an error so let's bail.
		if ( 200 !== wp_remote_retrieve_response_code( $request ) ) {
			return wp_remote_retrieve_response_message( $request );
		}

		$product = json_decode( $body, true );

	return $product;
}
