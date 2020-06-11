<?php
namespace Chargify\Endpoints\Base;

function register_customer_update_webhook() {
	register_rest_route( 'chargify/v1', '/webhook', [
			'methods'  => 'POST',
			'callback' => __NAMESPACE__ . '\\route_request',
	] );
}

function route_request( \WP_REST_Request $request ) {
	$request_endpoint = $request->get_route();
	$response_headers = $request->get_headers();
	$response_status  = 200;
	$response_body    = $request->get_body();
	$event            = $request->get_param( 'event' );
	$event_id         = $request->get_param( 'id' );
	$payload          = $request->get_param( 'payload' );


	/**
	 * A function to log requests send to the Chargify Product Families endpoints.
	 *
	 * @param $request_endpoint string The URL we are sending the request to.
	 * @param $response_status  int    The HTTP status code that the endpoint responded with.
	 * @param $response_headers array  The headers that the REST API endpoint returned.
	 * @param $response_body    array  The data that the REST API endpoint returned.
	 * @param $type             string The type of request. e.g. 'REST' or 'webhook'.
	 * @param $payload          array  The data we received in the request.
	 * @param $event			string The type of event we receieved in the request.
	 * @param $event_id         int    The unique event ID in Chargify.
	 */
	do_action( 'chargify\log_request', $request_endpoint, $response_status, (array) $response_headers, "Webhook - ${event}", $response_body, $payload, $event, $event_id );


	return $event;
}
