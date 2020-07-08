<?php
/**
 * Helpers for products.
 *
 * @file wp-chargify/includes/helpers/products.php
 * @package WPCHargify
 */

namespace Chargify\Helpers\products;

/**
 * Given the details provided in the array fetch the product family id.
 *
 * @param array $product_details Array with product attributes.
 * This array can contain.
 * product_id,
 * product_handle,
 * price_point_id,
 * price_point_handle,
 * component_id,
 * component_handle,
 * component_price_point_id,
 * component_price_point_handle.
 *
 * @return string
 */
function get_product_family_id( $product_details ) {

	$product_family_id = false;
	// TODO use product meta and latter switch to the product model.

	// TODO lookup via the database product model to find product family id.
	if ( ! empty( $array['product_id'] ) && is_numeric( $array['product_id'] ) ) {
		$product_id = $array['product_id'];
		// TODO look up by product id.

	} elseif ( ! empty( $array['product_handle'] ) && is_string( $array['product_handle'] ) ) {
		$product_handle = $array['product_handle'];
		// TODO look up by product handle.

	} elseif ( ! empty( $array['price_point_id'] ) && is_numeric( $array['price_point_id'] ) ) {
		$price_point_id = $array['price_point_id'];
		// TODO look up by price point id.

	} elseif ( ! empty( $array['price_point_handle'] ) && is_string( $array['price_point_handle'] ) ) {
		$price_point_handle = $array['price_point_handle'];
		// TODO look up by price point handle.

	} elseif ( ! empty( $array['component_id'] ) && is_numeric( $array['component_id'] ) ) {
		$component_id = $array['component_id'];
		// TODO look up by component id.

	} elseif ( ! empty( $array['component_handle'] ) && is_string( $array['component_handle'] ) ) {
		$component_handle = $array['component_handle'];
		// TODO look up by component handle.

	} elseif ( ! empty( $array['component_price_point_id'] ) && is_numeric( $array['component_price_point_id'] ) ) {
		$component_price_point_id = $array['component_price_point_id'];
		// TODO look up by component price point id.

	} elseif ( ! empty( $array['component_price_point_handle'] ) && is_string( $array['component_price_point_handle'] ) ) {
		$component_price_point_id = $array['component_price_point_handle'];
		// TODO look up by component price point handle.

	}

	// TODO remove overwrite during testing.
	$product_family_id = '1529881';

	return $product_family_id;

}
