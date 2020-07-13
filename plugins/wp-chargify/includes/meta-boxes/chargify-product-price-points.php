<?php

namespace Chargify\Meta_Boxes\Product_Price_Point;

use Chargify\Model\ChargifyProductPricePoint;

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
			'tabs'         => [
				[
					'id'     => 'tab-general',
					'title'  => 'General',
					'fields' => [
						ChargifyProductPricePoint::META_CHARGIFY_ID,
						ChargifyProductPricePoint::META_CHARGIFY_NAME,
						ChargifyProductPricePoint::META_CHARGIFY_HANDLE,
					],
				],

				[
					'id'     => 'tab-linked-info',
					'title'  => 'Linked Information',
					'fields' => [
						ChargifyProductPricePoint::META_CHARGIFY_PRODUCT_ID,
						ChargifyProductPricePoint::META_WORDPRESS_PRODUCT_ID,
						'chargify_product_handle', // TODO, use Product Model.
					],
				],
				[
					'id'     => 'tab-costs',
					'title'  => 'Costs',
					'fields' => [
						ChargifyProductPricePoint::META_CHARGIFY_PRICE_IN_CENTS,
						ChargifyProductPricePoint::META_CHARGIFY_INITIAL_CHARGE_IN_CENTS,
						ChargifyProductPricePoint::META_CHARGIFY_INTERVAL,
						ChargifyProductPricePoint::META_CHARGIFY_INTERVAL_UNIT,
						ChargifyProductPricePoint::META_CHARGIFY_EXPIRATION_INTERVAL,
						ChargifyProductPricePoint::META_CHARGIFY_EXPIRATION_INTERVAL_UNIT,
						ChargifyProductPricePoint::META_CHARGIFY_INTRODUCTORY_OFFER,
					],
				],
				[
					'id'     => 'tab-trial',
					'title'  => 'Trial',
					'fields' => [
						ChargifyProductPricePoint::META_CHARGIFY_TRIAL_PRICE_IN_CENTS,
						ChargifyProductPricePoint::META_CHARGIFY_INITIAL_CHARGE_AFTER_TRIAL,
						ChargifyProductPricePoint::META_CHARGIFY_TRIAL_INTERVAL,
						ChargifyProductPricePoint::META_CHARGIFY_TRIAL_INTERVAL_UNIT,
						ChargifyProductPricePoint::META_CHARGIFY_TRIAL_TYPE,
					],
				],
				[
					'id'     => 'tab-misc',
					'title'  => 'Miscellaneous',
					'fields' => [
						ChargifyProductPricePoint::META_CHARGIFY_ARCHIVED_AT,
						ChargifyProductPricePoint::META_CHARGIFY_CREATED_AT,
						ChargifyProductPricePoint::META_CHARGIFY_UPDATED_AT,
					],
				],
			],
		]
	);

	// General.
	$cmb2->add_field(
		[
			'name'       => __( 'Price Point ID', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProductPricePoint::META_CHARGIFY_ID,
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
			'name'       => __( 'Price Point Name', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProductPricePoint::META_CHARGIFY_NAME,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Price Point Handle', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProductPricePoint::META_CHARGIFY_HANDLE,
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
			'id'         => ChargifyProductPricePoint::META_CHARGIFY_PRODUCT_ID,
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
			'id'         => ChargifyProductPricePoint::META_WORDPRESS_PRODUCT_ID,
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
			'name'       => __( 'Price Point Cost in Cents', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProductPricePoint::META_CHARGIFY_PRICE_IN_CENTS,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Price Point Initial Charge in Cents', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProductPricePoint::META_CHARGIFY_INITIAL_CHARGE_IN_CENTS,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Price Point Billing Interval', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProductPricePoint::META_CHARGIFY_INTERVAL,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Price Point Billing Interval Unit', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProductPricePoint::META_CHARGIFY_INTERVAL_UNIT,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Price Point Billing Expiration Interval', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProductPricePoint::META_CHARGIFY_EXPIRATION_INTERVAL,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Price Point Billing Expiration Interval Unit', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProductPricePoint::META_CHARGIFY_EXPIRATION_INTERVAL_UNIT,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Price Point Introductory Offer', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProductPricePoint::META_CHARGIFY_INTRODUCTORY_OFFER,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	// Trial.
	$cmb2->add_field(
		[
			'name'       => __( 'Price Point Trial Price in Cents', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProductPricePoint::META_CHARGIFY_TRIAL_PRICE_IN_CENTS,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Price Point Initial Charge After Trial', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProductPricePoint::META_CHARGIFY_INITIAL_CHARGE_AFTER_TRIAL,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Price Point Trial Billing Interval', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProductPricePoint::META_CHARGIFY_TRIAL_INTERVAL,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Price Point Trial Billing Interval Unit', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProductPricePoint::META_CHARGIFY_TRIAL_INTERVAL_UNIT,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Price Point Trial Type', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProductPricePoint::META_CHARGIFY_TRIAL_TYPE,
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
			'name'       => __( 'Price Point Archive At', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProductPricePoint::META_CHARGIFY_ARCHIVED_AT,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Price Point Created At', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProductPricePoint::META_CHARGIFY_CREATED_AT,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Price Point Updated At', 'chargify' ),
			'desc'       => '',
			'id'         => ChargifyProductPricePoint::META_CHARGIFY_UPDATED_AT,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
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
