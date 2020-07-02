<?php
namespace Chargify\Endpoints\Base;
use Chargify\Customers;
use Chargify\Helpers\Options;
use Chargify\Subscription;
use Chargify\Renewal;
use Chargify\Post_Types\Helpers;

function register_customer_update_webhook() {
	register_rest_route( 'chargify/v1', '/webhook', [
			'methods'  => 'POST',
			'callback' => __NAMESPACE__ . '\\route_request',
	] );
}

function route_request( \WP_REST_Request $request ) {
	$request_body               = $request->get_body();
	$chargify_webhook_signature = $request->get_header( 'x_chargify_webhook_signature_hmac_sha_256' );
	$verification               = verify_request( $request_body, $chargify_webhook_signature );
	$request_endpoint = $request->get_route();
	$response_headers = $request->get_headers();

	# See if the request is authenticate before we go any further.
	if ( false === $verification || is_wp_error( $verification ) ) {
		$error = new \WP_Error( 'chargify_settings_error', __( 'Unauthorised.', 'chargify' ), [ 'status' => '401' ] );
		/**
		 * A function to log requests send to the Chargify Product Families endpoints.
		 *
		 * @param $request_endpoint string The URL we are sending the request to.
		 * @param $response_status  int    The HTTP status code that the endpoint responded with.
		 * @param $response_headers array  The headers that the REST API endpoint returned.
		 * @param $response_body    array  The data that the REST API endpoint returned.
		 * @param $type             string The type of request. e.g. 'REST' or 'webhook'.
		 * @param $payload          array  The data we received in the request.
		 * @param $error          array  The data we received in the request.
		 * @param $event			string The type of event we receieved in the request.
		 * @param $event_id         int    The unique event ID in Chargify.
		 */
		do_action( 'chargify\log_request', $request_endpoint, '400', (array) $response_headers, 'REST - verification failure', $request_body, $payload = '', $error );

		return $error;
	}



	$response_status  = 200;
	$error            = false;

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
	 * @param $error          array  The data we received in the request.
	 * @param $event			string The type of event we receieved in the request.
	 * @param $event_id         int    The unique event ID in Chargify.
	 */
	do_action( 'chargify\log_request', $request_endpoint, $response_status, (array) $response_headers, "Webhook - ${event}", $request_body, $payload, $error, $event, $event_id );

	$active_hooks = cmb2_get_option( 'chargify_webhooks', 'chargify_webhooks_multicheck' );

	# Check if the webhook is activated.
	if ( array_key_exists( $event, $active_hooks ) && $active_hooks !== false ) {
		switch ( $event ) {
			case 'customer_update':
			case 'customer_create':
				Customers\maybe_update_customer( $payload, [] );
				break;
			case 'signup_success':
				Subscription\create_wordpress_subscription( $payload, [] );
				break;
			case 'renewal_success':
			case 'expiration_date_change':
				Renewal\renewal_success( $payload );
				break;
			case 'renewal_failure':
				Renewal\renewal_failure( $payload );
				break;
			case 'subscription_product_change':
				Helpers\update_product( $payload );
				break;
		}
	}

	/**
	 * An action so that developers can add additional webhooks and complex business logic.
	 *
	 * @param $event   string The type of event we received in the request.
	 * @param $payload array  The data we received in the request.
	 */
	do_action( 'chargify\webhook', $event, $payload );
}

/**
 * Check if the Chargify webhook request is authorised.
 *
 * @param $request_body string               The body of the request we received from Chargify.
 * @param $chargify_webhook_signature string The sha256 hash that Chargify calculated for the request.
 * @return bool
 */
function verify_request( $request_body, $chargify_webhook_signature ) {

	$bypass = apply_filters( 'chargify_verify_request', false );

	$shared_key = Options\get_shared_key();

	if ( is_wp_error( $shared_key) ) {
		return $shared_key;
	}

	$signature = hash_hmac( 'sha256', $request_body,  $shared_key );

	if ( ( $signature === $chargify_webhook_signature ) || ( $bypass === true ) ) {
		return true;
	}

	return false;
}
