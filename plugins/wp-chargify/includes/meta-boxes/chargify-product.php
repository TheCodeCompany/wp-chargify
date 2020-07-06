<?php

namespace Chargify\Meta_Boxes\Product;

/**
 * Register all the meta fields so we can map Chargify product information to it.
 */
function product_meta_boxes() {
	$cmb2 = new_cmb2_box(
		[
			'id'           => 'chargify_product_details',
			'title'        => __( 'Product Details', 'chargify' ),
			'object_types' => [ 'chargify_product' ],
			'context'      => 'normal',
			'priority'     => 'high',
			'show_names'   => true,
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product ID', 'chargify' ),
			'desc'       => __( 'The ID of the product in Chargify.', 'chargify' ),
			'id'         => 'chargify_product_id',
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
			'name'       => __( 'Product Handle', 'chargify' ),
			'desc'       => __( 'The handle of the product in Chargify.', 'chargify' ),
			'id'         => 'chargify_product_handle',
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Price Point ID', 'chargify' ),
			'desc'       => __( 'The price point id of the product in Chargify.', 'chargify' ),
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
			'name'       => __( 'Price Point Handle', 'chargify' ),
			'desc'       => __( 'The price point handle of the product in Chargify.', 'chargify' ),
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
			'name'       => __( 'Is default Price Point', 'chargify' ),
			'desc'       => __( 'Is this the default price point of the product in Chargify.', 'chargify' ),
			'id'         => 'chargify_product_price_point_is_default',
			'type'       => 'checkbox',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'        => __( 'Price', 'chargify' ),
			'description' => __( 'The price of the product in Chargify.', 'chargify' ),
			'id'          => __( 'chargify_price' ),
			'type'        => 'text_money',
			'attributes'  => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'        => __( 'Initial Cost', 'chargify' ),
			'description' => __( 'The initial cost of the product in Chargify.', 'chargify' ),
			'id'          => __( 'chargify_initial_cost' ),
			'type'        => 'text_money',
			'attributes'  => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'        => __( 'Interval Unit', 'chargify' ),
			'description' => __( 'The interval unit that a subscription is renewed in Chargify.', 'chargify' ),
			'id'          => 'chargify_interval_unit',
			'type'        => 'radio_inline',
			'options'     => [
				'day'   => __( 'Day', 'chargify' ),
				'month' => __( 'Month', 'chargify' ),
			],
			'default'     => 'day',
			'attributes'  => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'        => __( 'Interval', 'chargify' ),
			'description' => __( 'The interval that a subscription is renewed in Chargify.', 'chargify' ),
			'id'          => 'chargify_interval',
			'type'        => 'text_small',
			'attributes'  => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Family', 'chargify' ),
			'desc'       => __( 'The family that the product belongs to in Chargify.', 'chargify' ),
			'id'         => 'chargify_product_family',
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
			'desc'       => __( 'The Product Family ID that the product belongs to in Chargify.', 'chargify' ),
			'id'         => 'chargify_product_family_id',
			'type'       => 'text_small',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
				'type'     => 'number',
			],
		]
	);

}
