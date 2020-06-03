<?php
namespace Chargify\Chargify\Endpoints\Product_Families;

use Chargify\Helpers\Options;

/**
 * A function to request all of the product families that are in Chargify.
 *
 * @return array|\WP_Error
 */
function get_product_families() {
	$endpoint = Options\get_subdomain() . '/product_families.json';
	$headers  = Options\get_headers();
	$request  = wp_safe_remote_get( $endpoint, $headers );
	$body     = wp_remote_retrieve_body( $request );
	$json     = json_decode( $body, true );

	foreach ( $json as $family ) {
		$rows[] = $family['product_family'];
	}

	return $rows;
}
