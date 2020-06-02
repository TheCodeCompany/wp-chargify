<?php

namespace Chargify\Helpers\Options;

function get_production_api_key() {
	# The Chargify PHP constants will take precedence over the stored options to assist in development.
	if ( defined( 'CHARGIFY_PRODUCTION_API_KEY' ) ) {
		return CHARGIFY_PRODUCTION_API_KEY;
	}

	$production_key = cmb2_get_option( 'chargify_settings', 'chargify_production_API_key' );

	return $production_key;
}

function get_production_subdomain() {
	# The Chargify PHP constants will take precedence over the stored options to assist in development.
	if ( defined( 'CHARGIFY_PRODUCTION_SUBDOMAIN' ) ) {
		return CHARGIFY_PRODUCTION_SUBDOMAIN;
	}

	$production_subdomain = cmb2_get_option( 'chargify_settings', 'chargify_production_subdomain' );

	return $production_subdomain;
}

function get_test_api_key() {
	# The Chargify PHP constants will take precedence over the stored options to assist in development.
	if ( defined( 'CHARGIFY_TEST_API_KEY' ) ) {
		return CHARGIFY_TEST_API_KEY;
	}

	$test_key = cmb2_get_option( 'chargify_settings', 'chargify_test_API_key' );

	return $test_key;
}

function get_test_subdomain() {
	# The Chargify PHP constants will take precedence over the stored options to assist in development.
	if ( defined( 'CHARGIFY_TEST_SUBDOMAIN' ) ) {
		return CHARGIFY_TEST_SUBDOMAIN;
	}

	$test_subdomain = cmb2_get_option( 'chargify_settings', 'chargify_test_subdomain' );

	return $test_subdomain;
}

function get_mode(){
	# The Chargify PHP constants will take precedence over the stored options to assist in development.
	if ( defined( 'CHARGIFY_MODE' ) ) {
		return CHARGIFY_MODE;
	}

	$chargify_mode = cmb2_get_option( 'chargify_settings', 'chargify_mode' );

	return $chargify_mode;
}

function get_api_key() {
	if ( 'live' === get_mode() ) {
		return get_production_api_key();
	}

	return get_test_api_key();
}

function get_subdomain() {
	if ( 'live' === get_mode() ) {
		return untrailingslashit( get_production_subdomain() );
	}

	return untrailingslashit( get_test_subdomain() );
}

/**
 * Generate the Basic Authentication headers we need to send to the Chargify API.
 *
 * @return \string[][]
 */
function get_headers() {
	$headers = [
		'headers' => [
			'Authorization' => 'Basic ' . base64_encode( get_api_key() . ':' . 'x' )
		],
	];

	return $headers;
}
