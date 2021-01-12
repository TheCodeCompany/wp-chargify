<?php
namespace Chargify\Logging\Logger;

/**
 * A function to log requests send to the Chargify Product Families endpoints.
 *
 * @param $request_endpoint string     The URL we are sending the request to.
 * @param $response_status  int        The HTTP status code that the endpoint responded with.
 * @param $response_headers array      The headers that the REST API endpoint returned.
 * @param $type             string     The type of request. e.g. 'REST' or 'webhook'.
 * @param $response_body    array      The data that the REST API endpoint returned.
 * @param $payload          array      The data we received in the request.
 * @param $error            mixed      Any errors we received.
 * @param $event			string     The type of event we receieved in the request.
 * @param $event_id         int|string The unique event ID in Chargify.
 */
function logger( $request_endpoint, $response_status, $response_headers, $type, $response_body = [], $payload = [], $error = [], $event = '', $event_id = '') {
	$log_id = wp_insert_post(
		[
			'post_type'   => 'chargify_api_log',
			'post_title'  =>  sanitize_text_field( $type . '-' . date( 'Ymdhis' ) ),
			'post_status' => 'publish',
		]
	);

	update_post_meta( $log_id, '_chargify_endpoint', esc_url_raw( $request_endpoint ) );
	update_post_meta( $log_id, '_chargify_status', absint( $response_status ) );
	update_post_meta( $log_id, '_chargify_response_headers', wp_json_encode( $response_headers, JSON_PRETTY_PRINT ) );
	update_post_meta( $log_id, '_chargify_response_body', wp_json_encode( $response_body, JSON_PRETTY_PRINT ) );
	update_post_meta( $log_id, '_chargify_payload', wp_json_encode( $payload, JSON_PRETTY_PRINT ) );
	update_post_meta( $log_id, '_chargify_event_id', $event_id );
	update_post_meta( $log_id, '_chargify_event', esc_textarea( $event ) );
	update_post_meta( $log_id, '_chargify_error', wp_json_encode( $error, JSON_PRETTY_PRINT ) );

}
