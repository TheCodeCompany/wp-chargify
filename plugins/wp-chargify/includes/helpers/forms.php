<?php

/**
 * Simple function to update the form messages.
 *
 * @param array|string $messages An array of messages or single message to be added to the POST object returning to
 *                               the client side.
 * @param string       $type     The message type, typicaly 'error' or 'success'.
 */
function apply_chargify_form_messages( $messages, $type = 'error' ) {

	$chargify_form_messages = isset( $_POST['chargify_form_messages'] ) ? $_POST['chargify_form_messages'] : []; // phpcs:ignore

	if ( is_string( $messages ) ) {
		$messages = [ $messages ];
	}

	if ( is_array( $messages ) ) {
		if ( isset( $chargify_form_messages[ $type ] ) ) {
			$chargify_form_messages[ $type ] = array_merge( $chargify_form_messages[ $type ], $messages );
		} else {
			$chargify_form_messages[ $type ] = $messages;
		}
	}

	// Apply the updated messages.
	$_POST['chargify_form_messages'] = $chargify_form_messages; // phpcs:ignore
}
/**
 * Return the form messages.
 */
function get_chargify_form_messages() {
	return isset( $_POST['chargify_form_messages'] ); // phpcs:ignore
}
