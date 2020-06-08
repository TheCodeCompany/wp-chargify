<?php
namespace Chargify\Post_Types\Helpers;
use Chargify\Chargify\Endpoints\Product_Families;

function populate_product_post_types( $products ) {
	# Save all the products to an option
	update_option( 'chargify_products_all', $products, false );

	# Map the product data to our Product Custom Post type.
	foreach ( $products as $product ) {
		$args = [
			'post_type'    => 'chargify_product',
			'post_title'   => sanitize_text_field( $product['name'] ),
			'post_content' => wp_filter_post_kses( $product['description'] ),
			'post_status'  => 'publish',
		];

		$chargify_product = wp_insert_post( $args );

		update_post_meta( $chargify_product, 'chargify_product_id', $product['id'] );
		update_post_meta( $chargify_product, 'chargify_price', $product['price_in_cents'] / 100 );
		update_post_meta( $chargify_product, 'chargify_initial_cost', $product['initial_charge_in_cents'] / 100 );
		update_post_meta( $chargify_product, 'chargify_interval_unit', $product['interval_unit'] );
		update_post_meta( $chargify_product, 'chargify_interval', $product['interval'] );
		update_post_meta( $chargify_product, 'chargify_product_family_id', $product['product_family']['id'] );
		update_post_meta( $chargify_product, 'chargify_product_family', $product['product_family']['name'] );
	}
}

/**
 * A function to get the Chargify products so the user can select the ones they want to use in WordPress.
 *
 * @return array
 */
function get_product_values() {
	# See if we have fetched the products from Chargify and stored them in WordPress.
	$products = get_option( 'chargify_products_all' );

	if ( $products ) {
		$values = wp_list_pluck( $products, 'name', 'id' );
		return $values;
	}

	# GET the products from Chargify and store them in WordPress.
	$products = Product_Families\get_products();
	$values   = wp_list_pluck( $products, 'name', 'id' );
	return $values;
}

/**
 * A function to clear all the Chargify Products in WordPress and pull them in again from Chargify.
 */
function resync_products() {
	# Delete options
	delete_option( 'chargify_products_all' );

	# Delete Products CPT's
	$products = new \WP_Query([ 'post_type' => 'chargify_product' ] );

	foreach ( $products as $product ) {
		wp_delete_post( $product->post->ID, true );
	}
}
