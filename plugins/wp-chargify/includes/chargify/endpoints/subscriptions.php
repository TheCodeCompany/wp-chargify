<?php
namespace Chargify\Endpoints\Subscription;
use Chargify\Helpers\Options;
use Chargify\Subscription;

function create_subscription( $chargify_data, $wordpress_data ) {
	$subdomain = Options\get_subdomain();
	$request_endpoint = Options\get_subdomain() . '/subscriptions.json';
	$request_headers  = Options\get_headers();

	if ( is_wp_error( $subdomain ) ) {
		/**
		 * A function to log requests send to the Chargify Subscription endpoints.
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
		do_action( 'chargify\log_request', $request_endpoint, '400', $request_headers, 'REST', [], [], $subdomain );
		return $subdomain;
	}

	$data = [
		'headers' => $request_headers['headers'],
		'body'    => $chargify_data,
	];

	$request          = wp_safe_remote_post( $request_endpoint, $data );
	// Grab info from successful responses so we can log requests.
	$response_status  = wp_remote_retrieve_response_code( $request );
	$response_headers = wp_remote_retrieve_headers( $request );
	$response_body    = wp_remote_retrieve_body( $request );

	$chargify_subscription = json_decode( $response_body, true );

	$body = json_decode( $data['body'], true );

	/**
	 * A function to log requests send to the Chargify Subscriptions endpoints.
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
	do_action( 'chargify\log_request', $request_endpoint, $response_status, (array) $response_headers, 'REST', $chargify_subscription, $body );

	# Anything other than a 201 code is an error so let's bail.
	if ( 201 !== $response_status ) {

		if ( isset( $chargify_subscription['errors'] ) ) {
			// Pass all Chargify messages back.
			apply_chargify_form_messages( $chargify_subscription['errors'] );
		} else {
			// Default message.
			apply_chargify_form_messages( wp_remote_retrieve_response_message( $request ) );
		}

		return wp_remote_retrieve_response_message( $request );
	}

	# Create a subscription with the result
	$subscription = Subscription\create_wordpress_subscription( $chargify_subscription, $wordpress_data );

}
