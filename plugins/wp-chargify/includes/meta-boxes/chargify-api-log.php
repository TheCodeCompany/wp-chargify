<?php
namespace Chargify\Meta_Boxes\API_Log;
/**
 * Add our meta boxes for our API Log.
 */
function add_api_log_metaboxes() {
	/**
	 * Initiate the metabox
	 */
	$payload = new_cmb2_box( [
		'id'            => 'chargify_details',
		'title'         => __( 'Payload', 'chargify' ),
		'object_types'  => [ 'chargify_api_log' ],
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	] );

	$payload->add_field( [
		'name'       => __( 'Endpoint', 'chargify' ),
		'id'         => '_chargify_endpoint',
		'type'       => 'text',
		'save_field' => false,
		'attributes' => [
			'readonly' => 'readonly',
			'class'    => 'large-text',
		],
	] );

	$payload->add_field( [
		'name'       => __( 'Status', 'chargify' ),
		'id'         => '_chargify_status',
		'type'       => 'text_small',
		'save_field' => false,
		'attributes' => [
			'readonly' => 'readonly',
		],
	] );

	$payload->add_field( [
		'name'       => __( 'Payload', 'chargify' ),
		'id'         => '_chargify_payload',
		'type'       => 'chargify_code',
		'save_field' => false,
	] );

	$payload->add_field( [
		'name'       => __( 'Response Headers', 'chargify' ),
		'id'         => '_chargify_response_headers',
		'type'       => 'chargify_code',
		'save_field' => false,
	] );

	$payload->add_field( [
		'name'       => __( 'Response Body', 'chargify' ),
		'id'         => '_chargify_response_body',
		'type'       => 'chargify_code',
		'save_field' => false,
	] );

	$payload->add_field( [
		'name'       => __( 'Event ID', 'chargify' ),
		'id'         => '_chargify_event_id',
		'type'       => 'text_small',
		'save_field' => false,
		'attributes' => [
			'readonly' => 'readonly',
		],
	] );

	$payload->add_field( [
		'name'       => __( 'Event', 'chargify' ),
		'id'         => '_chargify_event',
		'type'       => 'text_small',
		'save_field' => false,
		'attributes' => [
			'readonly' => 'readonly',
		],
	] );
}

/**
 * Remove the Publish meta box for our API Logs.
 */
function remove_publish_meta_box() {
	remove_meta_box( 'metabox_id', 'chargify_api_log', 'default_position' );
	remove_meta_box( 'submitdiv', 'chargify_api_log', 'side' );
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
 * Enqueue the style and script for our custom metaboxes.
 */
function cmb2_styles_and_scripts( $page ) {
	if ( 'post.php' !== $page ) {
		return;
	}

	if ( 'chargify_api_log' !== get_post_type() ) {
		return;
	}

	// As CMB2 enqueues their styles on all pages we needed to remove it and add it back on our custom post type.
	wp_enqueue_style( 'cmb2-styles' );

	wp_enqueue_style(
		'chargify-cmb2-api-log-theme',
		plugins_url( 'assets/css/cmb2.css', dirname( __FILE__ ) ),
		[],
		'1.0.0'
	);

	wp_enqueue_script(
		'chargify-cmb2-api-log-highlight-js',
		plugins_url( 'assets/js/highlight.pack.js', dirname( __FILE__ ) ),
		[],
		'10.0.3'
	);

	wp_enqueue_script(
		'chargify-cmb2-api-log-admin-highlight-js',
		plugins_url( 'assets/js/main.js', dirname( __FILE__ ) ),
		[ 'jquery', 'chargify-cmb2-api-log-highlight-js' ],
		'1.0.0'
	);
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
