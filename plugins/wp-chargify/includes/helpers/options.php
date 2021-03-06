<?php

namespace Chargify\Helpers\Options;

/**
 * Get the production API key. The CHARGIFY_PRODUCTION_API_KEY constant has the highest priority.
 *
 * @return array|string
 */
function get_production_api_key() {
	# The Chargify PHP constants will take precedence over the stored options to assist in development.
	if ( defined( 'CHARGIFY_PRODUCTION_API_KEY' ) ) {
		return CHARGIFY_PRODUCTION_API_KEY;
	}

	$production_key = cmb2_get_option( 'chargify_settings', 'chargify_production_API_key' );

	if ( false === $production_key ) {
		return new \WP_Error( 'chargify_settings_error', __( 'Please enter a Production API Key in the Chargify settings.', 'chargify' ), [ 'status' => '400' ] );
	}

	return $production_key;
}

/**
 * Get the production subdomain. The CHARGIFY_PRODUCTION_SUBDOMAIN constant has the highest priority.
 *
 * @return array|string
 */
function get_production_subdomain() {
	# The Chargify PHP constants will take precedence over the stored options to assist in development.
	if ( defined( 'CHARGIFY_PRODUCTION_SUBDOMAIN' ) ) {
		return CHARGIFY_PRODUCTION_SUBDOMAIN;
	}

	$production_subdomain = cmb2_get_option( 'chargify_settings', 'chargify_production_subdomain' );

	if ( false === $production_subdomain ) {
		return new \WP_Error( 'chargify_settings_error', __( 'Please enter a Production subdomain in the Chargify settings.', 'chargify' ), [ 'status' => '400' ]  );
	}

	return $production_subdomain;
}

/**
 * Get the production shared key. The CHARGIFY_PRODUCTION_SHARED_KEY constant has the highest priority.
 *
 * @return array|string
 */
function get_production_shared_key() {
	# The Chargify PHP constants will take precedence over the stored options to assist in development.
	if ( defined( 'CHARGIFY_PRODUCTION_SHARED_KEY' ) ) {
		return CHARGIFY_PRODUCTION_SHARED_KEY;
	}

	$production_shared_key = cmb2_get_option( 'chargify_settings', 'chargify_production_shared_key' );

	if ( false === $production_shared_key ) {
		return new \WP_Error( 'chargify_settings_error', __( 'Please enter a Production Shared Key in the Chargify settings.', 'chargify' ), [ 'status' => '400' ]  );
	}

	return $production_shared_key;
}

/**
 * Get the test API key. The CHARGIFY_TEST_API_KEY constant has the highest priority.
 *
 * @return array|string
 */
function get_test_api_key() {
	# The Chargify PHP constants will take precedence over the stored options to assist in development.
	if ( defined( 'CHARGIFY_TEST_API_KEY' ) ) {
		return CHARGIFY_TEST_API_KEY;
	}

	$test_key = cmb2_get_option( 'chargify_settings', 'chargify_test_API_key' );

	if ( false === $test_key ) {
		return new \WP_Error( 'chargify_settings_error', __( 'Please enter a Test API Key in the Chargify settings.', 'chargify' ), [ 'status' => '400' ]  );
	}

	return $test_key;
}

/**
 * Get the test subdomain. The CHARGIFY_TEST_SUBDOMAIN constant has the highest priority.
 *
 * @return array|string
 */
function get_test_subdomain() {
	# The Chargify PHP constants will take precedence over the stored options to assist in development.
	if ( defined( 'CHARGIFY_TEST_SUBDOMAIN' ) ) {
		return CHARGIFY_TEST_SUBDOMAIN;
	}

	$test_subdomain = cmb2_get_option( 'chargify_settings', 'chargify_test_subdomain' );

	if ( false === $test_subdomain ) {
		return new \WP_Error( 'chargify_settings_error', __( 'Please enter a test subdomain in the Chargify settings.', 'chargify' ), [ 'status' => '400' ]  );
	}

	return $test_subdomain;
}

/**
 * Get the test shared key. The CHARGIFY_TEST_SHARED_KEY constant has the highest priority.
 *
 * @return array|string
 */
function get_test_shared_key() {
	# The Chargify PHP constants will take precedence over the stored options to assist in development.
	if ( defined( 'CHARGIFY_TEST_SHARED_KEY' ) ) {
		return CHARGIFY_TEST_SHARED_KEY;
	}

	$test_shared_key = cmb2_get_option( 'chargify_settings', 'chargify_test_shared_key' );

	if ( false === $test_shared_key ) {
		return new \WP_Error( 'chargify_settings_error', __( 'Please enter a Test Shared Key in the Chargify settings.', 'chargify' ), [ 'status' => '400' ]  );
	}

	return $test_shared_key;
}

/**
 * Get the Chargify mode. Either 'test' or 'live'.
 *
 * @return array|string
 */
function get_mode(){
	# The Chargify PHP constants will take precedence over the stored options to assist in development.
	if ( defined( 'CHARGIFY_MODE' ) ) {
		return CHARGIFY_MODE;
	}

	$chargify_mode = cmb2_get_option( 'chargify_settings', 'chargify_mode' );

	if ( false === $chargify_mode ) {
		return new \WP_Error( 'chargify_settings_error', __( 'Please enter a Mode in the Chargify settings.', 'chargify' ), [ 'status' => '400' ] );
	}

	return $chargify_mode;
}

/**
 * A function to get the webhook URl.
 *
 * @return string
 */
function get_webhook_url() {
	$suffix = 'wp-json/chargify/v1/webhook';

	if ( defined( 'CHARGIFY_WEBHOOK_URL' ) ) {
		$webhook_endpoint = trailingslashit( CHARGIFY_WEBHOOK_URL ) . $suffix;
	} else {
		$webhook_endpoint = WP_HOME . $suffix;
	}

	return $webhook_endpoint;
}

/**
 * Get the appropriate API key.
 *
 * @return array|string
 */
function get_api_key() {
	if ( 'live' === get_mode() ) {
		return get_production_api_key();
	}

	return get_test_api_key();
}

/**
 * Get the appropriate subdomain.
 *
 * @return string
 */
function get_subdomain() {
	if ( 'live' === get_mode() ) {
		$subdomain = get_production_subdomain();

		if ( is_wp_error( $subdomain ) ) {
			return $subdomain;
		}

		return untrailingslashit( get_production_subdomain() );
	}

	$subdomain = get_test_subdomain();

	if ( is_wp_error( $subdomain ) ) {
		return $subdomain;
	}

	return untrailingslashit( $subdomain );
}

/**
 * Get the appropriate shared key.
 *
 * @return string
 */
function get_shared_key() {
	if ( 'live' === get_mode() ) {
		return untrailingslashit( get_production_shared_key() );
	}

	return untrailingslashit( get_test_shared_key() );
}

/**
 * Generate the Basic Authentication headers we need to send to the Chargify API.
 *
 * @return \string[][]
 */
function get_headers() {
	$headers = [
		'headers' => [
			'Authorization' => 'Basic ' . base64_encode( get_api_key() . ':' . 'x' ),
			'content-type'  => 'application/json',
		],
	];

	return $headers;
}
