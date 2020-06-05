<?php

namespace Chargify\Post_Types\Helpers;

function populate_post_types( $products ) {
	if ( true === wp_doing_ajax() ) {
		return;
	}

	# Save all the products to an option
	update_option( 'chargify_products_all', $products, false );

	foreach ( $products as $product ) {
		$args = [
			'post_type'    => 'chargify_product',
			'post_title'   => sanitize_text_field( $product['name'] ),
			'post_content' => wp_filter_post_kses( $product['description'] ),
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
