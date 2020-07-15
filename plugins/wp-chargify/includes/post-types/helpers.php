<?php
namespace Chargify\Post_Types\Helpers;
use Chargify\Chargify\Endpoints\Product_Families;
use Chargify\Post_Types\Helpers;
use Chargify\Chargify\Endpoints\Components;

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

		// Product details.
		update_post_meta( $chargify_product, 'chargify_product_id', absint( $product['id'] ) );
		update_post_meta( $chargify_product, 'chargify_product_handle', sanitize_text_field( $product['handle'] ) );

		// Product price points.
		$price_point_id         = absint( $product['product_price_point_id'] );
		$default_price_point_id = absint( $product['default_product_price_point_id'] );
		update_post_meta( $chargify_product, 'chargify_product_price_point_id', $price_point_id );
		update_post_meta( $chargify_product, 'chargify_product_price_point_handle', sanitize_text_field( $product['product_price_point_handle'] ) );
		update_post_meta( $chargify_product, 'chargify_product_price_point_is_default', intval( $price_point_id === $default_price_point_id ) );

		update_post_meta( $chargify_product, 'chargify_price', sanitize_text_field( $product['price_in_cents'] / 100 ) );
		update_post_meta( $chargify_product, 'chargify_initial_cost', sanitize_text_field( $product['initial_charge_in_cents'] / 100 ) );
		update_post_meta( $chargify_product, 'chargify_interval_unit', sanitize_text_field( $product['interval_unit'] ) );
		update_post_meta( $chargify_product, 'chargify_interval', absint( $product['interval'] ) );

		// Product family.
		update_post_meta( $chargify_product, 'chargify_product_family_id', absint( $product['product_family']['id'] ) );
		update_post_meta( $chargify_product, 'chargify_product_family_handle', sanitize_text_field( $product['product_family']['handle'] ) );
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

function populate_component_post_types( $components ) {
	# Save all the components to an option
	update_option( 'chargify_components_all', $components, false );

	# Map the component data to our Component Custom Post type.
	foreach ( $components as $component ) {
		$args = [
			'post_type'    => 'chargify_component',
			'post_title'   => sanitize_text_field( $component['name'] ),
			'post_content' => wp_filter_post_kses( $component['description'] ),
			'post_status'  => 'publish',
		];

		$chargify_component = wp_insert_post( $args );

		update_post_meta( $chargify_component, 'chargify_component_id', absint( $component['id'] ) );
		update_post_meta( $chargify_component, 'chargify_component_handle', sanitize_text_field( $component['handle'] ) );
		update_post_meta( $chargify_component, 'chargify_component_pricing_scheme', sanitize_text_field( $component['pricing_scheme'] ) );
		update_post_meta( $chargify_component, 'chargify_component_unit_name', sanitize_text_field( $component['unit_name'] ) );
		update_post_meta( $chargify_component, 'chargify_component_unit_price', sanitize_text_field( $component['unit_price'] ) );
		update_post_meta( $chargify_component, 'chargify_product_family', sanitize_text_field( $component['product_family_name'] ) );
		update_post_meta( $chargify_component, 'chargify_product_family_id', absint( $component['product_family_id'] ) );
		update_post_meta( $chargify_component, 'chargify_component_kind', sanitize_text_field( $component['kind'] ) );
		update_post_meta( $chargify_component, 'chargify_component_archived', sanitize_text_field( $component['archived'] ) );
		update_post_meta( $chargify_component, 'chargify_component_taxable', sanitize_text_field( $component['taxable'] ) );
		update_post_meta( $chargify_component, 'chargify_component_default_price_point_id', sanitize_text_field( $component['default_price_point_id'] ) );
		update_post_meta( $chargify_component, 'chargify_component_price_point_count', absint( $component['price_point_count'] ) );
		update_post_meta( $chargify_component, 'chargify_component_price_points_url', esc_url_raw( $component['price_points_url'] ) );
		update_post_meta( $chargify_component, 'chargify_component_default_price_point_name', sanitize_text_field( $component['default_price_point_name'] ) );
		update_post_meta( $chargify_component, 'chargify_component_tax_code', sanitize_text_field( $component['tax_code'] ) );
		update_post_meta( $chargify_component, 'chargify_component_recurring', sanitize_text_field( $component['recurring'] ) );
		update_post_meta( $chargify_component, 'chargify_component_upgrade_charge', sanitize_text_field( $component['upgrade_charge'] ) );
		update_post_meta( $chargify_component, 'chargify_component_downgrade_credit', sanitize_text_field( $component['downgrade_credit'] ) );
		update_post_meta( $chargify_component, 'chargify_component_fractional_quantities', sanitize_text_field( $component['allow_fractional_quantities'] ) );

	}
}

/**
 * A function to clear all the Chargify Products in WordPress and pull them in again from Chargify.
 *
 * @return bool
 */
function resync_chargify() {
	# Delete options
	delete_option('chargify_products_all' );
	delete_option('chargify_components_all' );

	# Delete Products CPT's
	$products = new \WP_Query( [ 'post_type' => 'chargify_product' ] );

	if ( $products->have_posts() ) {
		while ( $products->have_posts() ) {
			$products->the_post();
			wp_delete_post( get_the_ID(), true );
		}
	}

	# Delete Components CPT's
	$components = new \WP_Query( [ 'post_type' => 'chargify_component' ] );

	if ( $components->have_posts() ) {
		while ( $components->have_posts() ) {
			$components->the_post();
			wp_delete_post( get_the_ID(), true );
		}
	}

	# We need to tell WP-CLI we successfully deleted posts.
	if ( defined( 'WP_CLI' ) ) {
		return true;
	} else {
		# We never want to save the CMB2 option.
		return false;
	}

}

function sync_message( $cmb, $args ) {
	if ( ! empty( $args['should_notify'] ) && true === $args['is_updated'] && true === $args['is_options_page'] ) {
		Helpers\resync_chargify();
		Product_Families\get_products();
		Components\get_components();
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
