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

function get_products() {
	$product_families = get_product_families();

	$product_ids = wp_list_pluck( $product_families, 'id' );

	$headers  = Options\get_headers();

	foreach ( $product_ids as $product ) {
		$endpoint = Options\get_subdomain() . "/product_families/$product/products.json";
		$request  = wp_safe_remote_get( $endpoint, $headers );
		$body     = wp_remote_retrieve_body( $request );
		$json     = json_decode( $body, true );
		foreach ( $json as $family ) {
			$rows[] = $family['product'];
		}
	}

	return $rows;
}
