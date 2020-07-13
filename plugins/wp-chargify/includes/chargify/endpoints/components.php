<?php
namespace Chargify\Chargify\Endpoints\Components;

use Chargify\Helpers\Options;
use Chargify\Post_Types\Helpers;
use function Chargify\Chargify\Endpoints\Component_Price_Points\get_component_price_points;

/**
 * A function to request all of the components that are in Chargify.
 *
 * @return string|array
 */
function get_components() {
	$subdomain = Options\get_subdomain();
	$request_endpoint = Options\get_subdomain() . '/components.json';

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
		do_action( 'chargify\log_request', $request_endpoint, '400', [], 'REST - get_components', [], [], $subdomain );
		return $subdomain;
	}

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
	do_action( 'chargify\log_request', $request_endpoint, $response_status, (array) $response_headers, 'REST - get_components', $response_body );

	# Anything other than a 200 code is an error so let's bail.
	if ( 200 !== $response_status ) {
		return wp_remote_retrieve_response_message( $request );
	}

	$json = json_decode( $response_body, true );

	$components = [];

	foreach ( $json as $family ) {
		$components[] = $family['component'];
	}

	return $components;
}

/**
 * Saves the component posts.
 *
 * @param array $components The formatted components array.
 */
function save_components( $components = [] ) {

	if ( empty( $components ) ) {
		$components = get_components();
	}

	// Populate the product CPT's.
	Helpers\populate_component_posts( $components );

	// Fetch then populate the Price Point CPT's.
	$component_ids = wp_list_pluck( $components, 'id' );
	foreach ( $component_ids as $product_id ) {

		// TODO Component price points.
		$product_price_points = get_component_price_points( $product_id );

//		save_component_price_points( $product_id, $product_price_points );
	}
}

/**
 * A function to get the details of a component.
 *
 * @param $handle int The component handle.
 * @return mixed|string
 */
function get_component( $handle ) {
	$headers  = Options\get_headers();

	$endpoint = Options\get_subdomain() . "/components/lookup.json?handle=${handle}";
	$request  = wp_safe_remote_get( $endpoint, $headers );
	$body     = wp_remote_retrieve_body( $request );

	# Anything other than a 200 code is an error so let's bail.
	if ( 200 !== wp_remote_retrieve_response_code( $request ) ) {
		return wp_remote_retrieve_response_message( $request );
	}

	$component = json_decode( $body, true );

	return $component;
}
