<?php
namespace Chargify\Webhooks;
use Chargify\Helpers\Options;

/**
 * A function to request all of the webhooks that are in Chargify.
 *
 * @return string|array
 */
function get_webhooks() {
	$subdomain        = Options\get_subdomain();
	$request_endpoint = Options\get_subdomain() . '/webhooks.json';

	if ( is_wp_error( $subdomain ) ) {
		/**
		 * A function to log requests send to the Chargify webhooks endpoints.
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
		do_action( 'chargify\log_request', $request_endpoint, '400', [], 'REST - get_webhooks', [], [], $subdomain );
		return $subdomain;
	}

	$request_headers  = Options\get_headers();
	$request          = wp_safe_remote_get( $request_endpoint, $request_headers );
	// Grab info from successful responses so we can log requests.
	$response_status  = wp_remote_retrieve_response_code( $request );
	$response_headers = wp_remote_retrieve_headers( $request );
	$response_body    = wp_remote_retrieve_body( $request );
	$json             = json_decode( $response_body, true );

	/**
	 * A function to log requests send to the Chargify webhooks endpoints.
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
	do_action( 'chargify\log_request', $request_endpoint, $response_status, (array) $response_headers, 'REST - get_webhooks', $json );

	# Anything other than a 200 code is an error so let's bail.
	if ( 200 !== $response_status ) {
		return wp_remote_retrieve_response_message( $request );
	}

	$webhooks = [];

	foreach ( $json as $webhook ) {
		$webhooks[] = [
			'event'         => $webhook['webhook']['event'],
			'id'            => $webhook['webhook']['id'],
			'last_error'    => isset( $webhook['webhook']['last_error'] ) ? $webhook['webhook']['last_error'] : null,
			'last_error_at' => isset( $webhook['webhook']['last_error_at'] ) ? $webhook['webhook']['last_error_at'] : null,
			'accepted_at'   => isset( $webhook['webhook']['accepted_at'] ) ? $webhook['webhook']['accepted_at'] : null,
			'last_sent_at'  => isset( $webhook['webhook']['last_sent_at'] ) ? $webhook['webhook']['last_sent_at'] : null,
			'last_sent_url' => isset( $webhook['webhook']['last_sent_url'] ) ? $webhook['webhook']['last_sent_url'] : null,
			'created_at'    => $webhook['webhook']['created_at'],
			'successful'    => $webhook['webhook']['successful'],
		];
	}

	return $webhooks;
}
