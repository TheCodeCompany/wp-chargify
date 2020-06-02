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
			'name'        => __( 'Active', 'chargify' ),
			'description' => __( 'Is the product able to be used in WordPress?', 'chargify' ),
			'id'          => 'chargify_active_status',
			'type'        => 'radio_inline',
			'options'     => [
				'yes' => __( 'Yes', 'chargify' ),
				'no'  => __( 'No', 'chargify' ),
			],
			'default'     => 'no',
		]
	);

}
