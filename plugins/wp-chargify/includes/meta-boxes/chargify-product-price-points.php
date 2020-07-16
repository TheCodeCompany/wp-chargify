<?php

namespace Chargify\Meta_Boxes\Product_Price_Point;

use Chargify\Model\Chargify_Product_Price_Point;

/**
 * Register all the meta fields so we can map Chargify product information to it.
 */
function product_price_point_meta_boxes() {

	$cmb2 = new_cmb2_box(
		[
			'id'           => 'chargify_product_price_point_details',
			'title'        => __( 'Product Price Point Details', 'chargify' ),
			'object_types' => [ Chargify_Product_Price_Point::POST_TYPE ],
			'context'      => 'normal',
			'priority'     => 'high',
			'show_names'   => true,
			'tabs'         => [
				[
					'id'     => 'tab-general',
					'title'  => __( 'General', 'chargify' ),
					'fields' => [
						Chargify_Product_Price_Point::META_CHARGIFY_ID,
						Chargify_Product_Price_Point::META_CHARGIFY_NAME,
						Chargify_Product_Price_Point::META_CHARGIFY_HANDLE,
					],
				],

				[
					'id'     => 'tab-linked-info',
					'title'  => __( 'Linked Information', 'chargify' ),
					'fields' => [
						Chargify_Product_Price_Point::META_CHARGIFY_PRODUCT_ID,
						Chargify_Product_Price_Point::META_WORDPRESS_PRODUCT_ID,
						'chargify_product_handle', // TODO, use Product Model.
					],
				],
				[
					'id'     => 'tab-costs',
					'title'  => __( 'Costs', 'chargify' ),
					'fields' => [
						Chargify_Product_Price_Point::META_CHARGIFY_PRICE_IN_CENTS,
						Chargify_Product_Price_Point::META_CHARGIFY_INITIAL_CHARGE_IN_CENTS,
						Chargify_Product_Price_Point::META_CHARGIFY_INTERVAL,
						Chargify_Product_Price_Point::META_CHARGIFY_INTERVAL_UNIT,
						Chargify_Product_Price_Point::META_CHARGIFY_EXPIRATION_INTERVAL,
						Chargify_Product_Price_Point::META_CHARGIFY_EXPIRATION_INTERVAL_UNIT,
						Chargify_Product_Price_Point::META_CHARGIFY_INTRODUCTORY_OFFER,
					],
				],
				[
					'id'     => 'tab-trial',
					'title'  => __( 'Trial', 'chargify' ),
					'fields' => [
						Chargify_Product_Price_Point::META_CHARGIFY_TRIAL_PRICE_IN_CENTS,
						Chargify_Product_Price_Point::META_CHARGIFY_INITIAL_CHARGE_AFTER_TRIAL,
						Chargify_Product_Price_Point::META_CHARGIFY_TRIAL_INTERVAL,
						Chargify_Product_Price_Point::META_CHARGIFY_TRIAL_INTERVAL_UNIT,
						Chargify_Product_Price_Point::META_CHARGIFY_TRIAL_TYPE,
					],
				],
				[
					'id'     => 'tab-misc',
					'title'  => __( 'Miscellaneous', 'chargify' ),
					'fields' => [
						Chargify_Product_Price_Point::META_CHARGIFY_ARCHIVED_AT,
						Chargify_Product_Price_Point::META_CHARGIFY_CREATED_AT,
						Chargify_Product_Price_Point::META_CHARGIFY_UPDATED_AT,
					],
				],
			],
		]
	);


	// General.
	$cmb2->add_field(
		[
			'name'       => __( 'Product Price Point ID', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Product_Price_Point::META_CHARGIFY_ID,
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
			'name'       => __( 'Product Price Point Name', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Product_Price_Point::META_CHARGIFY_NAME,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Price Point Handle', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Product_Price_Point::META_CHARGIFY_HANDLE,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);


	// Linked Info.
	$cmb2->add_field(
		[
			'name'       => __( 'Product Chargify ID', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Product_Price_Point::META_CHARGIFY_PRODUCT_ID,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product WordPress ID', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Product_Price_Point::META_WORDPRESS_PRODUCT_ID,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Handle', 'chargify' ),
			'desc'       => '',
			'id'         => 'chargify_product_handle',
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);


	// Costs.
	$cmb2->add_field(
		[
			'name'         => __( 'Product Price Point Cost', 'chargify' ),
			'desc'         => '',
			'id'           => Chargify_Product_Price_Point::META_CHARGIFY_PRICE_IN_CENTS,
			'type'         => 'text',
			'attributes'   => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
				'type'     => 'hidden', // Added here because 'before_field' renders visuals.
			],
			'before_field' => 'Chargify\\Meta_Boxes\\Helpers\\maybe_convert_cents_to_dollars',
		]
	);

	$cmb2->add_field(
		[
			'name'         => __( 'Product Price Point Initial Charge', 'chargify' ),
			'desc'         => '',
			'id'           => Chargify_Product_Price_Point::META_CHARGIFY_INITIAL_CHARGE_IN_CENTS,
			'type'         => 'text',
			'attributes'   => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
				'type'     => 'hidden', // Added here because 'before_field' renders visuals.
			],
			'before_field' => 'Chargify\\Meta_Boxes\\Helpers\\maybe_convert_cents_to_dollars',
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Price Point Billing Interval', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Product_Price_Point::META_CHARGIFY_INTERVAL,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Price Point Billing Interval Unit', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Product_Price_Point::META_CHARGIFY_INTERVAL_UNIT,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Price Point Billing Expiration Interval', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Product_Price_Point::META_CHARGIFY_EXPIRATION_INTERVAL,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Price Point Billing Expiration Interval Unit', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Product_Price_Point::META_CHARGIFY_EXPIRATION_INTERVAL_UNIT,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'         => __( 'Product Price Point Introductory Offer', 'chargify' ),
			'desc'         => '',
			'id'           => Chargify_Product_Price_Point::META_CHARGIFY_INTRODUCTORY_OFFER,
			'type'         => 'text',
			'attributes'   => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
				'type'     => 'hidden', // Added here because 'before_field' renders visuals.
			],
			'before_field' => 'Chargify\\Meta_Boxes\\Helpers\\maybe_convert_boolean_yes_no',
		]
	);


	// Trial.
	$cmb2->add_field(
		[
			'name'         => __( 'Product Price Point Trial Price', 'chargify' ),
			'desc'         => '',
			'id'           => Chargify_Product_Price_Point::META_CHARGIFY_TRIAL_PRICE_IN_CENTS,
			'type'         => 'text',
			'attributes'   => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
				'type'     => 'hidden', // Added here because 'before_field' renders visuals.
			],
			'before_field' => 'Chargify\\Meta_Boxes\\Helpers\\maybe_convert_cents_to_dollars',
		]
	);

	$cmb2->add_field(
		[
			'name'         => __( 'Product Price Point Initial Charge After Trial', 'chargify' ),
			'desc'         => '',
			'id'           => Chargify_Product_Price_Point::META_CHARGIFY_INITIAL_CHARGE_AFTER_TRIAL,
			'type'         => 'text',
			'attributes'   => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
				'type'     => 'hidden', // Added here because 'before_field' renders visuals.
			],
			'before_field' => 'Chargify\\Meta_Boxes\\Helpers\\maybe_convert_boolean_yes_no',
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Price Point Trial Billing Interval', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Product_Price_Point::META_CHARGIFY_TRIAL_INTERVAL,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Price Point Trial Billing Interval Unit', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Product_Price_Point::META_CHARGIFY_TRIAL_INTERVAL_UNIT,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Price Point Trial Type', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Product_Price_Point::META_CHARGIFY_TRIAL_TYPE,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);


	// Misc.
	$cmb2->add_field(
		[
			'name'         => __( 'Product Price Point Archive At', 'chargify' ),
			'desc'         => '',
			'id'           => Chargify_Product_Price_Point::META_CHARGIFY_ARCHIVED_AT,
			'type'         => 'text',
			'attributes'   => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
				'type'     => 'hidden', // Added here because 'before_field' renders visuals.
			],
			'before_field' => 'Chargify\\Meta_Boxes\\Helpers\\maybe_convert_date',
		]
	);

	$cmb2->add_field(
		[
			'name'         => __( 'Product Price Point Created At', 'chargify' ),
			'desc'         => '',
			'id'           => Chargify_Product_Price_Point::META_CHARGIFY_CREATED_AT,
			'type'         => 'text',
			'attributes'   => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
				'type'     => 'hidden', // Added here because 'before_field' renders visuals.
			],
			'before_field' => 'Chargify\\Meta_Boxes\\Helpers\\maybe_convert_date',
		]
	);

	$cmb2->add_field(
		[
			'name'         => __( 'Product Price Point Updated At', 'chargify' ),
			'desc'         => '',
			'id'           => Chargify_Product_Price_Point::META_CHARGIFY_UPDATED_AT,
			'type'         => 'text',
			'attributes'   => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
				'type'     => 'hidden', // Added here because 'before_field' renders visuals.
			],
			'before_field' => 'Chargify\\Meta_Boxes\\Helpers\\maybe_convert_date',
		]
	);

}
