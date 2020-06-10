<?php
namespace Chargify\Endpoints\Base;

function register_customer_update_webhook() {
	register_rest_route( 'chargify/v1', '/webhook', [
			'methods'  => 'POST',
			'callback' => __NAMESPACE__ . '\\route_request',
	] );
}

function route_request( $request ) {
	$request_endpoint = $request->get_route();
	$response_headers = $request->get_headers();
	$response_status  = '';
	$response_body    = $request->get_body();

	do_action( 'chargify\log_request', $request_endpoint, $response_status, (array) $response_headers, $response_body, 'webhook' );

	$event   = $request->get_param( 'event' );
	$id      = $request->get_param( 'id' );
	$payload = $request->get_param( 'payload' );

	return $event;
}
