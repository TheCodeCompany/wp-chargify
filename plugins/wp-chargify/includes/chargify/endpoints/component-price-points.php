<?php
/**
 * The chargify endpoint calls for component price points.
 *
 * @file    plugins/wp-chargify/includes/chargify/endpoints/component-price-points.php
 * @package WPChargify
 */

namespace Chargify\Chargify\Endpoints\Component_Price_Points;

use Chargify\Helpers\Options;
use Chargify\Post_Types\Helpers;

/**
 * A function to request all of the component price points that are in Chargify.
 *
 * @param int|string $component_id The component id to read price points for.
 *
 * @return string|array
 */
function get_component_price_points( $component_id ) {
	$subdomain = Options\get_subdomain();
	$request_endpoint = Options\get_subdomain() . '/components/' . $component_id . '/price_points.json';

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
		do_action( 'chargify\log_request', $request_endpoint, '400', [], 'REST - get_component_price_points', [], [], $subdomain );
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
	do_action( 'chargify\log_request', $request_endpoint, $response_status, (array) $response_headers, 'REST - get_component_price_points', $response_body );

	# Anything other than a 200 code is an error so let's bail.
	if ( 200 !== $response_status ) {
		return wp_remote_retrieve_response_message( $request );
	}

	$json = json_decode( $response_body, true );

	// TODO Component Price points. return formatted array.

	return null;
}

/**
 * Saves the formatted retrieved component price points to the Database.
 *
 * @param int   $component_id   The component id that the price points belong to.
 * @param array $price_points The price points array.
 */
function save_component_price_points( $component_id, $price_points = [] ) {

	if ( empty( $price_points ) ) {
		$price_points = get_component_price_points( $component_id );
	}

	Helpers\populate_component_price_point_posts( $price_points );
}

function get_component_price_point( $handle ) {
	// TODO Component Price points.
	return null;
}


