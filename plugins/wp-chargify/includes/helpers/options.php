<?php

namespace Chargify\Helpers\Options;

function get_production_api_key() {
	# The Chargify PHP constants will take precedence over the stored options to assist in development.
	if ( defined( 'CHARGIFY_PRODUCTION_API_KEY' ) ) {
		return CHARGIFY_PRODUCTION_API_KEY;
	}

	$production_key = cmb2_get_option( 'settings','chargify_production_API_key' );

	return $production_key;
}

function get_production_subdomain() {

}

function get_test_api_key() {

}

function get_test_subdomain() {

}

function get_mode(){

}
