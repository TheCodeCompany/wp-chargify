<?php
namespace Chargify\Post_Types\Helpers;
use Chargify\Chargify\Endpoints\Product_Families;
use Chargify\Post_Types\Helpers;

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

		update_post_meta( $chargify_product, 'chargify_product_id', absint( $product['id'] ) );
		update_post_meta( $chargify_product, 'chargify_price', sanitize_text_field( $product['price_in_cents'] / 100 ) );
		update_post_meta( $chargify_product, 'chargify_initial_cost', sanitize_text_field( $product['initial_charge_in_cents'] / 100 ) );
		update_post_meta( $chargify_product, 'chargify_interval_unit', sanitize_text_field( $product['interval_unit'] ) );
		update_post_meta( $chargify_product, 'chargify_interval', absint( $product['interval'] ) );
		update_post_meta( $chargify_product, 'chargify_product_family_id', absint( $product['product_family']['id'] ) );
		update_post_meta( $chargify_product, 'chargify_product_family', sanitize_text_field( $product['product_family']['name'] ) );
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

	# If we don't have an products return an empty array.
	if ( is_wp_error( $products ) ) {
		return [];
	}
	$values = wp_list_pluck( $products, 'name', 'id' );
	return $values;
}

/**
 * A function to clear all the Chargify Products in WordPress and pull them in again from Chargify.
 *
 * @return bool
 */
function resync_products() {
	# Delete options
	delete_option('chargify_products_all');

	# Delete Products CPT's
	$products = new \WP_Query( [ 'post_type' => 'chargify_product' ] );

	if ( $products->have_posts() ) {
		while ( $products->have_posts() ) {
			$products->the_post();
			wp_delete_post( get_the_ID(), true );
		}
		# We need to tell WP-CLI we successfully deleted posts.
		if ( defined( 'WP_CLI' ) ) {
			return true;
		} else {
		# We never want to save the CMB2 option.
			return false;
		}
	}

}

function sync_message( $cmb, $args ) {
	if ( ! empty( $args['should_notify'] ) && true === $args['is_updated'] && true === $args['is_options_page'] ) {
		Helpers\resync_products();
		Product_Families\get_products();
		// Modify the updated message.
		$args['message'] = __( 'The Chargify products have been resynced.', 'chargify' );

		add_settings_error( $args['setting'], $args['code'], $args['message'], $args['type'] );
	} elseif ( true === $args['is_options_page'] ) {
		// Modify the updated message.
		$args['message'] = __( 'Nothing to update.', 'chargify' );

		add_settings_error( $args['setting'], $args['code'], $args['message'], $args['type'] );
	}
}

function update_product( $payload ) {

	$wp_product = new \WP_Query(
		[
			'post_type' => 'chargify_product',
			'meta_query' => [
				[
					'key'     => 'chargify_product_id',
					'value'   => $payload['id'],
					'compare' => 'IN'
				]
			]
		]
	);

	# If it's an error then return the error.
	if ( is_wp_error( $wp_product ) ) {
		return $wp_product;
	}

	$args = [
		'ID'           => $wp_product->post->ID,
		'post_type'    => 'chargify_product',
		'post_title'   => sanitize_text_field( $payload['name'] ),
		'post_content' => wp_filter_post_kses( $payload['description'] )
	];

	$product_id = wp_update_post( $args );

	$product_meta = [
		'chargify_price'             => sanitize_text_field( (int) $payload['price_in_cents'] / 100 ),
		'chargify_initial_cost'      => sanitize_text_field( (int) $payload['initial_charge_in_cents'] / 100 ),
		'chargify_interval_unit'     => sanitize_text_field( $payload['interval_unit'] ),
		'chargify_interval'          => absint( $payload['interval'] ),
		'chargify_product_family_id' => absint( $payload['product_family']['id'] ),
		'chargify_product_family'    => sanitize_text_field( $payload['product_family']['name'] )
	];

	foreach ( $product_meta as $key => $value ) {
		update_post_meta( $product_id, $key, $value );
	}

	return $product_id;

}
