<?php

namespace Chargify\Post_Types\Helpers;

use Chargify\Chargify\Endpoints\Product_Families;
use Chargify\Model\Chargify_Component;
use Chargify\Model\Chargify_Component_Factory;
use Chargify\Model\Chargify_Component_Price_Point;
use Chargify\Model\Chargify_Component_Price_Point_Factory;
use Chargify\Model\Chargify_Product;
use Chargify\Model\Chargify_Product_Factory;
use Chargify\Model\Chargify_Product_Price_Point;
use Chargify\Model\Chargify_Product_Price_Point_Factory;
use Chargify\Post_Types\Helpers;
use Chargify\Chargify\Endpoints\Components;

/**
 * A function to get the Chargify products so the user can select the ones they want to use in WordPress.
 *
 * @return array
 */
function get_product_values() {
	// See if we have fetched the products from Chargify and stored them in WordPress.
	$products = get_option( 'chargify_products_all' );

	if ( $products ) {
		$values = wp_list_pluck( $products, 'name', 'id' );

		return $values;
	}

	// GET the products from Chargify and store them in WordPress.
	$products = Product_Families\get_products(); // Only retrieves doesnt save.

	// If we don't have an products return an empty array.
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
function resync_chargify() {
	// Delete options.
	delete_option( 'chargify_products_all' );
	delete_option( 'chargify_components_all' );

	// Delete Products CPT's.
	$product_factory = new Chargify_Product_Factory();
	$products        = $product_factory->get_posts( [], 'post' );

	if ( $products ) {
		foreach ( $products as $product ) {
			$product_factory->delete_post( $product, true );
		}
	}

	// Delete Products Price Point CPT's.
	$product_price_point_factory = new Chargify_Product_Price_Point_Factory();
	$product_price_points        = $product_price_point_factory->get_posts( [], 'post' );
	if ( $product_price_points ) {
		foreach ( $product_price_points as $product_price_point ) {
			$product_price_point_factory->delete_post( $product_price_point, true );
		}
	}

	// Delete Component CPT's.
	$component_factory = new Chargify_Component_Factory();
	$components        = $component_factory->get_posts( [], 'post' );
	if ( $components ) {
		foreach ( $components as $component ) {
			$component_factory->delete_post( $component, true );
		}
	}

	// Delete Component Price Point CPT's.
	$component_price_point_factory = new Chargify_Component_Price_Point_Factory();
	$component_price_points        = $component_price_point_factory->get_posts( [], 'post' );
	if ( $component_price_points ) {
		foreach ( $component_price_points as $component_price_point ) {
			$component_price_point_factory->delete_post( $component_price_point, true );
		}
	}

	$product_factory = new Chargify_Product_Factory();
	$products        = $product_factory->get_posts( [], 'post' );

	// We need to tell WP-CLI we successfully deleted posts.
	if ( defined( 'WP_CLI' ) ) {
		return true;
	} else {
		// We never want to save the CMB2 option.
		return false;
	}

}

/**
 * Syncing of products and components.
 *
 * @param $cmb
 * @param $args
 */
function sync_message( $cmb, $args ) {
	if ( ! empty( $args['should_notify'] ) && true === $args['is_updated'] && true === $args['is_options_page'] ) {
		Helpers\resync_chargify();
		Product_Families\save_products();
		Components\save_components();
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
			'post_type'  => 'chargify_product',
			'meta_query' => [
				[
					'key'     => 'chargify_product_id',
					'value'   => $payload['id'],
					'compare' => 'IN'
				]
			]
		]
	);

	// If it's an error then return the error.
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
