<?php

namespace Chargify\Meta_Boxes\API_Log;

use Chargify\Endpoints\ValidateCouponController;
use function Chargify\Libraries\wp_enqueue_script_auto_ver;
use function Chargify\Libraries\wp_enqueue_style_auto_ver;
use function Chargify\Libraries\wp_localize_script_auto_ver;
use function Chargify\Libraries\wp_register_script_auto_ver;

/**
 * Add our meta boxes for our API Log.
 */
function add_api_log_metaboxes() {
	/**
	 * Initiate the metabox
	 */
	$payload = new_cmb2_box(
		[
			'id'           => 'chargify_details',
			'title'        => __( 'Payload', 'chargify' ),
			'object_types' => [ 'chargify_api_log' ],
			'context'      => 'normal',
			'priority'     => 'high',
			'show_names'   => true,
		]
	);

	$payload->add_field(
		[
			'name'       => __( 'Endpoint', 'chargify' ),
			'id'         => '_chargify_endpoint',
			'type'       => 'text',
			'save_field' => false,
			'attributes' => [
				'readonly' => 'readonly',
				'class'    => 'large-text',
			],
		]
	);

	$payload->add_field(
		[
			'name'       => __( 'Status', 'chargify' ),
			'id'         => '_chargify_status',
			'type'       => 'text_small',
			'save_field' => false,
			'attributes' => [
				'readonly' => 'readonly',
			],
			'show_on_cb' => __NAMESPACE__ . '\\maybe_show_status',
		]
	);

	$payload->add_field(
		[
			'name'       => __( 'Response Headers', 'chargify' ),
			'id'         => '_chargify_response_headers',
			'type'       => 'chargify_code',
			'save_field' => false,
			'show_on_cb' => __NAMESPACE__ . '\\maybe_show_response_headers',
		]
	);

	$payload->add_field(
		[
			'name'       => __( 'Request Headers', 'chargify' ),
			'id'         => '_chargify_request_headers',
			'type'       => 'chargify_code',
			'save_field' => false,
			'show_on_cb' => __NAMESPACE__ . '\\maybe_show_request_headers',
		]
	);

	$payload->add_field(
		[
			'name'       => __( 'Response Body', 'chargify' ),
			'id'         => '_chargify_response_body',
			'type'       => 'chargify_code',
			'save_field' => false,
			'show_on_cb' => __NAMESPACE__ . '\\maybe_show_response_body',
		]
	);

	$payload->add_field( [
		'name'       => __( 'Request Body', 'chargify' ),
		'id'         => '_chargify_request_body',
		'type'       => 'chargify_code',
		'save_field' => false,
		'show_on_cb' => __NAMESPACE__ . '\\maybe_show_request_body',
	] );

	$payload->add_field(
		[
			'name'       => __( 'Error', 'chargify' ),
			'id'         => '_chargify_error',
			'type'       => 'chargify_code',
			'save_field' => false,
			'show_on_cb' => __NAMESPACE__ . '\\maybe_show_error',
		]
	);

	$payload->add_field(
		[
			'name'       => __( 'Payload', 'chargify' ),
			'id'         => '_chargify_payload',
			'type'       => 'chargify_code',
			'save_field' => false,
			'show_on_cb' => __NAMESPACE__ . '\\maybe_show_payload',
		]
	);


	$payload->add_field( [
		'name'       => __( 'Event ID', 'chargify' ),
		'id'         => '_chargify_event_id',
		'type'       => 'text_small',
		'save_field' => false,
		'attributes' => [
			'readonly' => 'readonly',
		],
		'show_on_cb' => __NAMESPACE__ . '\\maybe_show_event_id',
	] );

	$payload->add_field(
		[
			'name'       => __( 'Event', 'chargify' ),
			'id'         => '_chargify_event',
			'type'       => 'text_small',
			'save_field' => false,
			'attributes' => [
				'readonly' => 'readonly',
			],
			'show_on_cb' => __NAMESPACE__ . '\\maybe_show_event',
		]
	);
}

/**
 * Disable autosaving of our API Log custom post type as we don't need that functionality.
 */
function remove_autosave() {
	if ( 'chargify_api_log' === get_post_type() ) {
		wp_dequeue_script( 'autosave' );
	}
}

/**
 * Render our custom code field.
 *
 * @param object $field          Field properties.
 * @param mixed  $selected_value Current value of field.
 * @param string $obj_id         Post ID of current object.
 * @param string $obj_type       Type of current object, post.
 * @param object $field_type     CMB2 instance.
 */
function render_chargify_code( $field, $selected_value, $obj_id, $obj_type, $field_type ) {
	// Get our field ID.
	$field_id = isset( $field->id ) ? $field->id : 'ffx_code';

	printf(
		'<pre name="%s" id="%s"><code>%s</code></pre>',
		esc_attr( $field_id ),
		esc_attr( $field_id ),
		esc_html( $selected_value )
	);
}

/**
 * Determine if we should show the Event ID.
 *
 * @param $field
 *
 * @return bool
 */
function maybe_show_event_id( $field ) {
	$meta = get_post_meta( $field->object_id, '_chargify_event_id', true );

	if ( empty( $meta ) ) {
		return false;
	}

	return true;
}

/**
 * Determine if we should show the event.
 *
 * @param $field
 *
 * @return bool
 */
function maybe_show_event( $field ) {
	$meta = get_post_meta( $field->object_id, '_chargify_event', true );

	if ( empty( $meta ) ) {
		return false;
	}

	return true;
}

/**
 * Determine if we should show the status.
 *
 * @param $field
 *
 * @return bool
 */
function maybe_show_status( $field ) {
	$meta = get_post_meta( $field->object_id, '_chargify_status', true );

	if ( empty( $meta ) ) {
		return false;
	}

	return true;
}

/**
 * Determine if we should show the payload.
 *
 * @param $field
 *
 * @return bool
 */
function maybe_show_payload( $field ) {
	$meta = get_post_meta( $field->object_id, '_chargify_payload', true );

	if ( empty( $meta ) || '[]' === $meta ) {
		return false;
	}

	return true;
}

/**
 * Determine if we should show the response headers.
 *
 * @param $field
 *
 * @return bool
 */
function maybe_show_response_headers( $field ) {
	$meta = get_post_meta( $field->object_id, '_chargify_response_headers', true );

	if ( empty( $meta ) || '[]' === $meta ) {
		return false;
	}

	return true;
}

/**
 * Determine if we should show the response body.
 *
 * @param $field
 *
 * @return bool
 */
function maybe_show_response_body( $field ) {
	$meta = get_post_meta( $field->object_id, '_chargify_response_body', true );

	if ( empty( $meta ) || '[]' === $meta ) {
		return false;
	}

	return true;
}

/**
 * Determine if we should show the request body.
 *
 * @param $field
 *
 * @return bool
 */
function maybe_show_request_body( $field ) {
	$meta = get_post_meta( $field->object_id, '_chargify_request_body', true );

	if ( empty( $meta ) || '[]' === $meta ) {
		return false;
	}

	return true;
}

/**
 * Determine if we should show the request headers.
 *
 * @param $field
 *
 * @return bool
 */
function maybe_show_request_headers( $field ) {
	$meta = get_post_meta( $field->object_id, '_chargify_request_headers', true );

	if ( empty( $meta ) || '[]' === $meta ) {
		return false;
	}

	return true;
}

/**
 * Determine if we should show the error.
 *
 * @param $field
 *
 * @return bool
 */
function maybe_show_error( $field ) {
	$meta = get_post_meta( $field->object_id, '_chargify_error', true );

	if ( empty( $meta ) || '[]' === $meta ) {
		return false;
	}

	return true;
}
