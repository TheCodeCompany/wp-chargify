<?php
namespace Chargify\Logging\Logger;

/**
 * A function to log requests send to the Chargify Product Families endpoints.
 *
 * @param $request_endpoint string The URL we are sending the request to.
 * @param $response_status  int    The HTTP status code that the endpoint responded with.
 * @param $response_headers array  The headers that the REST API endpoint returned.
 * @param $response_body    array  The data that the REST API endpoint returned.
 * @param $type             string The type of request. e.g. 'REST' or 'webhook'.
 */
function logger( $request_endpoint, $response_status, $response_headers, $response_body, $type ) {
	$log_id = wp_insert_post(
		[
			'post_type'   => 'chargify_api_log',
			'post_title'  =>  sanitize_text_field( $type ),
			'post_status' => 'publish',
		]
	);

	$data =  json_decode( $response_body );

	update_post_meta( $log_id, '_chargify_endpoint', esc_url_raw( $request_endpoint ) );
	update_post_meta( $log_id, '_chargify_status', absint( $response_status ) );
	update_post_meta( $log_id, '_chargify_response_headers', wp_json_encode( $response_headers, JSON_PRETTY_PRINT ) );
	update_post_meta( $log_id, '_chargify_response_body',  wp_json_encode( $data, JSON_PRETTY_PRINT ) );
}
