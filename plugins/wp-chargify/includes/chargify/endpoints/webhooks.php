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

/**
 * A function to send the webhooks we want to use for the site.
 *
 * @param $webhooks
 * @return array|string|\WP_Error
 */
function set_webhooks( $webhooks ) {
	$subdomain        = Options\get_subdomain();
	$request_endpoint = Options\get_subdomain() . '/endpoints.json';

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
		do_action( 'chargify\log_request', $request_endpoint, '400', [], 'REST - set_webhooks', [], [], $subdomain );
		return $subdomain;
	}

	$headers  = Options\get_headers();

	$data = [
		'endpoint' => [
			'url'                   => home_url( '/wp-json/chargify/v1/webhook' ),
			'webhook_subscriptions' => $webhooks
		]
	];

	$payload = wp_json_encode( $data );

	$request_args = [
		'headers' => $headers['headers'],
		'body'    => $payload,
	];

	$request = wp_safe_remote_post( $request_endpoint, $request_args );

	// Grab info from successful responses so we can log requests.
	$response_status  = wp_remote_retrieve_response_code( $request );
	$response_headers = wp_remote_retrieve_headers( $request );
	$response_body    = wp_remote_retrieve_body( $request );

	$json = json_decode( $response_body, true );

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
	do_action( 'chargify\log_request', $request_endpoint, $response_status, $response_headers, 'REST - set_webhooks', $json, $data );

}

/**
 * A function to enable or disabled the webhooks for the site.
 *
 * @param $status
 * @return array|string|\WP_Error
 */
function toggle_webhooks( $value ) {
	$subdomain        = Options\get_subdomain();
	$request_endpoint = Options\get_subdomain() . '/webhooks/settings.json';

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
		do_action( 'chargify\log_request', $request_endpoint, '400', [], 'REST - toggle_webhooks', [], [], $subdomain );
		return $subdomain;
	}

	$headers  = Options\get_headers();

	if ( 'true' === $value ) {
		$status = true;
	} else {
		$status = false;
	}

	$data = [
		'webhooks_enabled' => $status
	];

	$payload = wp_json_encode( $data );

	$request_args = [
		'headers' => $headers['headers'],
		'body'    => $payload,
		'method'  => 'PUT',
	];

	$request = wp_safe_remote_post( $request_endpoint, $request_args );

	// Grab info from successful responses so we can log requests.
	$response_status  = wp_remote_retrieve_response_code( $request );
	$response_headers = wp_remote_retrieve_headers( $request );
	$response_body    = wp_remote_retrieve_body( $request );

	$json = json_decode( $response_body, true );

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
	do_action( 'chargify\log_request', $request_endpoint, $response_status, $response_headers, 'REST - toggle_webhooks', $json, $data );

}

/**
 * A function to activate the endpoints we want to use on our site.
 *
 * @param $field_id
 * @param $updated
 * @param $action
 * @param $field
 */
function maybe_update_webhook( $field_id, $updated, $action, $field ) {
	if ( 'chargify_webhooks_multicheck' === $field_id && true === $updated ) {
		# Update the webhooks
		set_webhooks( $field->value );
	}
}

/**
 * A function to toggle whether or not we are using the endpoints.
 *
 * @param $field_id
 * @param $updated
 * @param $action
 * @param $field
 */
function maybe_toggle_webhooks( $field_id, $updated, $action, $field ) {
	if ( 'chargify_webhook_status' === $field_id && true === $updated ) {
		toggle_webhooks( $field->value );
	}
}
