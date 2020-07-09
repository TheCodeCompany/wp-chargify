<?php

namespace Chargify\Meta_Boxes\Product;

/**
 * Register all the meta fields so we can map Chargify product information to it.
 */
function product_price_point_meta_boxes() {
	$cmb2 = new_cmb2_box(
		[
			'id'           => 'chargify_product_price_point_details',
			'title'        => __( 'Product Price Point Details', 'chargify' ),
			'object_types' => [ 'chargify_product_price_point' ],
			'context'      => 'normal',
			'priority'     => 'high',
			'show_names'   => true,
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product ID', 'chargify' ),
			'desc'       => __( 'The ID of the product Price Point in Chargify.', 'chargify' ),
			'id'         => 'chargify_product_price_point_id',
			'type'       => 'text_small',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
				'type'     => 'number',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Price Point Handle', 'chargify' ),
			'desc'       => __( 'The handle of the product Price Point in Chargify.', 'chargify' ),
			'id'         => 'chargify_product_price_point_handle',
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product ID', 'chargify' ),
			'desc'       => __( 'The ID of the product that this price point is linked to in Chargify.', 'chargify' ),
			'id'         => 'chargify_product_id',
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Family ID', 'chargify' ),
			'desc'       => __( 'The Product Family ID that the product price point belongs to in Chargify.', 'chargify' ),
			'id'         => 'chargify_product_family_id',
			'type'       => 'text_small',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
				'type'     => 'number',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product ID', 'chargify' ),
			'desc'       => __( 'The Product ID that the product price point belongs to in Chargify.', 'chargify' ),
			'id'         => 'chargify_product_id',
			'type'       => 'text_small',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
				'type'     => 'number',
			],
		]
	);


}

/**
 * Remove the Publish meta box for our Products.
 */
function remove_publish_meta_box() {
	remove_meta_box( 'metabox_id', 'chargify_product', 'default_position' );
	remove_meta_box( 'submitdiv', 'chargify_product', 'side' );
}
