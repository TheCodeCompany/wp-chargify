<?php

namespace Chargify\Meta_Boxes\Product;

use Chargify\Model\ChargifyProduct;

/**
 * Register all the meta fields so we can map Chargify product information to it.
 */
function product_meta_boxes() {

	$cmb2 = new_cmb2_box(
		[
			'id'           => 'chargify_product_details',
			'title'        => __( 'Product Details', 'chargify' ),
			'object_types' => [ ChargifyProduct::POST_TYPE ],
			'context'      => 'normal',
			'priority'     => 'high',
			'show_names'   => true,
			'tabs'         => [
				[
					'id'     => 'tab-general',
					'title'  => 'General',
					'fields' => [
						ChargifyProduct::META_CHARGIFY_ID,
						ChargifyProduct::META_CHARGIFY_NAME,
						ChargifyProduct::META_CHARGIFY_HANDLE,
						ChargifyProduct::META_CHARGIFY_DESCRIPTION,
						ChargifyProduct::META_CHARGIFY_FAMILY_ID,
						ChargifyProduct::META_CHARGIFY_FAMILY_NAME,
						ChargifyProduct::META_CHARGIFY_FAMILY_HANDLE,
					],
				],
				[
					'id'     => 'tab-linked-info',
					'title'  => 'Linked Information',
					'fields' => [
						ChargifyProduct::META_CHARGIFY_DEFAULT_PRICE_POINT_ID,
						ChargifyProduct::META_CHARGIFY_PRICE_POINT_ID,
						ChargifyProduct::META_WORDPRESS_PRICE_POINT_ID,
						'chargify_price_point_handle', // TODO, use Product Price Point Model.
					],
				],
				[
					'id'     => 'tab-costs',
					'title'  => 'Costs',
					'fields' => [
						ChargifyProduct::META_CHARGIFY_PRICE_IN_CENTS,
						ChargifyProduct::META_CHARGIFY_INITIAL_CHARGE_IN_CENTS,
						ChargifyProduct::META_CHARGIFY_INTERVAL,
						ChargifyProduct::META_CHARGIFY_INTERVAL_UNIT,
						ChargifyProduct::META_CHARGIFY_EXPIRATION_INTERVAL,
						ChargifyProduct::META_CHARGIFY_EXPIRATION_INTERVAL_UNIT,
						ChargifyProduct::META_CHARGIFY_TAXABLE,
						ChargifyProduct::META_CHARGIFY_TAX_CODE,
						ChargifyProduct::META_CHARGIFY_ACCOUNTING_CODE,
					],
				],
				[
					'id'     => 'tab-trial',
					'title'  => 'Trial',
					'fields' => [
						ChargifyProduct::META_CHARGIFY_TRIAL_PRICE_IN_CENTS,
						ChargifyProduct::META_CHARGIFY_INITIAL_CHARGE_AFTER_TRIAL,
						ChargifyProduct::META_CHARGIFY_TRIAL_INTERVAL,
						ChargifyProduct::META_CHARGIFY_TRIAL_INTERVAL_UNIT,
					],
				],
				[
					'id'     => 'tab-misc',
					'title'  => 'Miscellaneous',
					'fields' => [
						ChargifyProduct::META_CHARGIFY_CREATED_AT,
						ChargifyProduct::META_CHARGIFY_UPDATED_AT,
						ChargifyProduct::META_CHARGIFY_ARCHIVED_AT,
						ChargifyProduct::META_CHARGIFY_REQUIRE_CREDIT_CARD,
						ChargifyProduct::META_CHARGIFY_REQUEST_CREDIT_CARD,
						ChargifyProduct::META_CHARGIFY_REQUEST_BILLING_ADDRESS,
						ChargifyProduct::META_CHARGIFY_REQUIRE_BILLING_ADDRESS,
						ChargifyProduct::META_CHARGIFY_REQUIRE_SHIPPING_ADDRESS,
					],
				],
			],
		]
	);

	// General Chargify Meta.
	$cmb2->add_field(
		[
			'name'       => __( 'Product ID', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_ID,
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
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_NAME,
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
			'id'         => ChargifyProduct::META_CHARGIFY_HANDLE,
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
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_DESCRIPTION,
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
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_FAMILY_ID,
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
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_FAMILY_NAME,
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
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_FAMILY_HANDLE,
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
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_DEFAULT_PRICE_POINT_ID,
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
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_PRICE_POINT_ID,
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
			'desc'       => '',
			'id'         => ChargifyProduct::META_WORDPRESS_PRICE_POINT_ID,
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
			'desc'       => '',
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
			'desc'         => '',
			'id'           => ChargifyProduct::META_CHARGIFY_PRICE_IN_CENTS,
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
			'name'       => __( 'Product Billing Initial Charge', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_INITIAL_CHARGE_IN_CENTS,
			'type'       => 'text',
			'attributes' => [
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
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_INTERVAL,
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
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_INTERVAL_UNIT,
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
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_EXPIRATION_INTERVAL,
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
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_EXPIRATION_INTERVAL_UNIT,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Billing is Taxable', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_TAXABLE,
			'type'       => 'text',
			'attributes' => [
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
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_TAX_CODE,
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
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_ACCOUNTING_CODE,
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
			'name'       => __( 'Product Billing Trial Price', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_TRIAL_PRICE_IN_CENTS,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
				'type'     => 'hidden', // Added here because 'before_field' renders visuals.
			],
			'before_field' => 'Chargify\\Meta_Boxes\\Helpers\\maybe_convert_cents_to_dollars',
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Billing Initial Charge After Trial', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_INITIAL_CHARGE_AFTER_TRIAL,
			'type'       => 'text',
			'attributes' => [
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
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_TRIAL_INTERVAL,
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
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_TRIAL_INTERVAL_UNIT,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);


	// Misc.
	$cmb2->add_field( // TODO Date. Display readable format using the 'before_field' to get default value. From ISO 8601 format.
		[
			'name'       => __( 'Product Created At', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_CREATED_AT,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field( // TODO Date. Display readable format using the 'before_field' to get default value. From ISO 8601 format.
		[
			'name'       => __( 'Product Updated At', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_UPDATED_AT,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field( // TODO Date. Display readable format using the 'before_field' to get default value. From ISO 8601 format.
		[
			'name'       => __( 'Product Archived At', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_ARCHIVED_AT,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Require Credit Card', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_REQUIRE_CREDIT_CARD,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
				'type'     => 'hidden', // Added here because 'before_field' renders visuals.
			],
			'before_field' => 'Chargify\\Meta_Boxes\\Helpers\\maybe_convert_boolean_yes_no',
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Request Credit Card', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_REQUEST_CREDIT_CARD,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
				'type'     => 'hidden', // Added here because 'before_field' renders visuals.
			],
			'before_field' => 'Chargify\\Meta_Boxes\\Helpers\\maybe_convert_boolean_yes_no',
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Request Billing Address', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_REQUEST_BILLING_ADDRESS,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
				'type'     => 'hidden', // Added here because 'before_field' renders visuals.
			],
			'before_field' => 'Chargify\\Meta_Boxes\\Helpers\\maybe_convert_boolean_yes_no',
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Product Require Billing Address', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_REQUIRE_BILLING_ADDRESS,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
				'type'     => 'hidden', // Added here because 'before_field' renders visuals.
			],
			'before_field' => 'Chargify\\Meta_Boxes\\Helpers\\maybe_convert_boolean_yes_no',
		]
	);


	$cmb2->add_field(
		[
			'name'       => __( 'Product Require Shipping Address', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProduct::META_CHARGIFY_REQUIRE_SHIPPING_ADDRESS,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
				'type'     => 'hidden', // Added here because 'before_field' renders visuals.
			],
			'before_field' => 'Chargify\\Meta_Boxes\\Helpers\\maybe_convert_boolean_yes_no',
		]
	);

}
