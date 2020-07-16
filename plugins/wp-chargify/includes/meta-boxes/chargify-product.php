<?php

namespace Chargify\Meta_Boxes\Product;

use Chargify\Model\Chargify_Product;

/**
 * Register all the meta fields so we can map Chargify product information to it.
 */
function product_meta_boxes() {

	$cmb2 = new_cmb2_box(
		[
			'id'           => 'chargify_product_details',
			'title'        => __( 'Product Details', 'chargify' ),
			'object_types' => [ Chargify_Product::POST_TYPE ],
			'context'      => 'normal',
			'priority'     => 'high',
			'show_names'   => true,
			'tabs'         => [
				[
					'id'     => 'tab-general',
					'title'  => __( 'General', 'chargify' ),
					'fields' => [
						Chargify_Product::META_CHARGIFY_ID,
						Chargify_Product::META_CHARGIFY_NAME,
						Chargify_Product::META_CHARGIFY_HANDLE,
						Chargify_Product::META_CHARGIFY_DESCRIPTION,
						Chargify_Product::META_CHARGIFY_FAMILY_ID,
						Chargify_Product::META_CHARGIFY_FAMILY_NAME,
						Chargify_Product::META_CHARGIFY_FAMILY_HANDLE,
					],
				],
				[
					'id'     => 'tab-linked-info',
					'title'  => __( 'Linked Information', 'chargify' ),
					'fields' => [
						Chargify_Product::META_CHARGIFY_DEFAULT_PRICE_POINT_ID,
						Chargify_Product::META_CHARGIFY_PRICE_POINT_ID,
						Chargify_Product::META_WORDPRESS_PRICE_POINT_ID,
						'chargify_price_point_handle', // TODO, use Product Price Point Model.
					],
				],
				[
					'id'     => 'tab-costs',
					'title'  => __( 'Costs', 'chargify' ),
					'fields' => [
						Chargify_Product::META_CHARGIFY_PRICE_IN_CENTS,
						Chargify_Product::META_CHARGIFY_INITIAL_CHARGE_IN_CENTS,
						Chargify_Product::META_CHARGIFY_INTERVAL,
						Chargify_Product::META_CHARGIFY_INTERVAL_UNIT,
						Chargify_Product::META_CHARGIFY_EXPIRATION_INTERVAL,
						Chargify_Product::META_CHARGIFY_EXPIRATION_INTERVAL_UNIT,
						Chargify_Product::META_CHARGIFY_TAXABLE,
						Chargify_Product::META_CHARGIFY_TAX_CODE,
						Chargify_Product::META_CHARGIFY_ACCOUNTING_CODE,
					],
				],
				[
					'id'     => 'tab-trial',
					'title'  => __( 'Trial', 'chargify' ),
					'fields' => [
						Chargify_Product::META_CHARGIFY_TRIAL_PRICE_IN_CENTS,
						Chargify_Product::META_CHARGIFY_INITIAL_CHARGE_AFTER_TRIAL,
						Chargify_Product::META_CHARGIFY_TRIAL_INTERVAL,
						Chargify_Product::META_CHARGIFY_TRIAL_INTERVAL_UNIT,
					],
				],
				[
					'id'     => 'tab-misc',
					'title'  => __( 'Miscellaneous', 'chargify' ),
					'fields' => [
						Chargify_Product::META_CHARGIFY_CREATED_AT,
						Chargify_Product::META_CHARGIFY_UPDATED_AT,
						Chargify_Product::META_CHARGIFY_ARCHIVED_AT,
						Chargify_Product::META_CHARGIFY_REQUIRE_CREDIT_CARD,
						Chargify_Product::META_CHARGIFY_REQUEST_CREDIT_CARD,
						Chargify_Product::META_CHARGIFY_REQUEST_BILLING_ADDRESS,
						Chargify_Product::META_CHARGIFY_REQUIRE_BILLING_ADDRESS,
						Chargify_Product::META_CHARGIFY_REQUIRE_SHIPPING_ADDRESS,
					],
				],
			],
		]
	);

	// General Chargify Meta.
	$cmb2->add_field(
		[
			'name'       => __( 'Product ID', 'chargify' ),
			'id'         => Chargify_Product::META_CHARGIFY_ID,
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
			'name'       => __( 'Product Name', 'chargify' ),
			'id'         => Chargify_Product::META_CHARGIFY_NAME,
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
			'id'         => Chargify_Product::META_CHARGIFY_HANDLE,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Description', 'chargify' ),
			'id'         => Chargify_Product::META_CHARGIFY_DESCRIPTION,
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
			'id'         => Chargify_Product::META_CHARGIFY_FAMILY_ID,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Family Name', 'chargify' ),
			'id'         => Chargify_Product::META_CHARGIFY_FAMILY_NAME,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Family Handle', 'chargify' ),
			'id'         => Chargify_Product::META_CHARGIFY_FAMILY_HANDLE,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	// Linked Information.
	$cmb2->add_field(
		[
			'name'       => __( 'Product Default Price Point ID', 'chargify' ),
			'id'         => Chargify_Product::META_CHARGIFY_DEFAULT_PRICE_POINT_ID,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field( // TODO Products. Display array using the 'before_field' to get default value.
		[
			'name'       => __( 'Connected Price Point Chargify ID\'s', 'chargify' ),
			'id'         => Chargify_Product::META_CHARGIFY_PRICE_POINT_ID,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field( // TODO Products. Display array using the 'before_field' to get default value.
		[
			'name'       => __( 'Connected Price Point WordPress ID\'s', 'chargify' ),
			'id'         => Chargify_Product::META_WORDPRESS_PRICE_POINT_ID,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field( // TODO Products. Display using the 'before_field' to get default value from product model.
		[
			'name'       => __( 'Product Default Price Point Handle', 'chargify' ),
			'id'         => 'chargify_price_point_handle', // Extra.
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
			'name'         => __( 'Product Price', 'chargify' ),
			'id'           => Chargify_Product::META_CHARGIFY_PRICE_IN_CENTS,
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
			'name'         => __( 'Product Billing Initial Charge', 'chargify' ),
			'id'           => Chargify_Product::META_CHARGIFY_INITIAL_CHARGE_IN_CENTS,
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
			'name'       => __( 'Product Billing Interval', 'chargify' ),
			'id'         => Chargify_Product::META_CHARGIFY_INTERVAL,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Billing Interval Unit', 'chargify' ),
			'id'         => Chargify_Product::META_CHARGIFY_INTERVAL_UNIT,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Expiration Interval', 'chargify' ),
			'id'         => Chargify_Product::META_CHARGIFY_EXPIRATION_INTERVAL,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Expiration Interval Unit', 'chargify' ),
			'id'         => Chargify_Product::META_CHARGIFY_EXPIRATION_INTERVAL_UNIT,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'         => __( 'Product Billing is Taxable', 'chargify' ),
			'id'           => Chargify_Product::META_CHARGIFY_TAXABLE,
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
			'name'       => __( 'Product Billing Tax Code', 'chargify' ),
			'id'         => Chargify_Product::META_CHARGIFY_TAX_CODE,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Account Code', 'chargify' ),
			'id'         => Chargify_Product::META_CHARGIFY_ACCOUNTING_CODE,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);


	// TRIAL.
	$cmb2->add_field(
		[
			'name'         => __( 'Product Billing Trial Price', 'chargify' ),
			'id'           => Chargify_Product::META_CHARGIFY_TRIAL_PRICE_IN_CENTS,
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
			'name'         => __( 'Product Billing Initial Charge After Trial', 'chargify' ),
			'id'           => Chargify_Product::META_CHARGIFY_INITIAL_CHARGE_AFTER_TRIAL,
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
			'name'       => __( 'Product Billing Trial Interval', 'chargify' ),
			'id'         => Chargify_Product::META_CHARGIFY_TRIAL_INTERVAL,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Billing Trial Interval Unit', 'chargify' ),
			'id'         => Chargify_Product::META_CHARGIFY_TRIAL_INTERVAL_UNIT,
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
			'name'         => __( 'Product Created At', 'chargify' ),
			'id'           => Chargify_Product::META_CHARGIFY_CREATED_AT,
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
			'name'         => __( 'Product Updated At', 'chargify' ),
			'id'           => Chargify_Product::META_CHARGIFY_UPDATED_AT,
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
			'name'         => __( 'Product Archived At', 'chargify' ),
			'id'           => Chargify_Product::META_CHARGIFY_ARCHIVED_AT,
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
			'name'         => __( 'Product Require Credit Card', 'chargify' ),
			'id'           => Chargify_Product::META_CHARGIFY_REQUIRE_CREDIT_CARD,
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
			'name'         => __( 'Product Request Credit Card', 'chargify' ),
			'id'           => Chargify_Product::META_CHARGIFY_REQUEST_CREDIT_CARD,
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
			'name'         => __( 'Product Request Billing Address', 'chargify' ),
			'id'           => Chargify_Product::META_CHARGIFY_REQUEST_BILLING_ADDRESS,
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
			'name'         => __( 'Product Require Billing Address', 'chargify' ),
			'id'           => Chargify_Product::META_CHARGIFY_REQUIRE_BILLING_ADDRESS,
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
			'name'         => __( 'Product Require Shipping Address', 'chargify' ),
			'id'           => Chargify_Product::META_CHARGIFY_REQUIRE_SHIPPING_ADDRESS,
			'type'         => 'text',
			'attributes'   => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
				'type'     => 'hidden', // Added here because 'before_field' renders visuals.
			],
			'before_field' => 'Chargify\\Meta_Boxes\\Helpers\\maybe_convert_boolean_yes_no',
		]
	);

}
