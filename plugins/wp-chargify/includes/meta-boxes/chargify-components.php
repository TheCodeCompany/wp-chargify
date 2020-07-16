<?php

namespace Chargify\Meta_Boxes\Component;

use Chargify\Model\Chargify_Component;

/**
 * Register all the meta fields so we can map Chargify product information to it.
 */
function component_meta_boxes() {

	$cmb2 = new_cmb2_box(
		[
			'id'           => 'chargify_component_details',
			'title'        => __( 'Component Details', 'chargify' ),
			'object_types' => [ Chargify_Component::POST_TYPE ],
			'context'      => 'normal',
			'priority'     => 'high',
			'show_names'   => true,
			'tabs'         => [
				[
					'id'     => 'tab-general',
					'title'  => __( 'General', 'chargify' ),
					'fields' => [
						Chargify_Component::META_CHARGIFY_ID,
						Chargify_Component::META_CHARGIFY_NAME,
						Chargify_Component::META_CHARGIFY_HANDLE,
						Chargify_Component::META_CHARGIFY_DESCRIPTION,
						Chargify_Component::META_CHARGIFY_FAMILY_ID,
						Chargify_Component::META_CHARGIFY_FAMILY_NAME,
					],
				],
				[
					'id'     => 'tab-linked-info',
					'title'  => __( 'Linked Information', 'chargify' ),
					'fields' => [
						Chargify_Component::META_CHARGIFY_PRICE_POINT_ID,
						Chargify_Component::META_WORDPRESS_PRICE_POINT_ID,
						Chargify_Component::META_CHARGIFY_DEFAULT_PRICE_POINT_ID,
						Chargify_Component::META_CHARGIFY_DEFAULT_PRICE_POINT_NAME,
						Chargify_Component::META_CHARGIFY_PRICE_POINT_COUNT,
					],
				],
				[
					'id'     => 'tab-costs',
					'title'  => __( 'Costs', 'chargify' ),
					'fields' => [
						Chargify_Component::META_CHARGIFY_PRICE_SCHEMA,
						Chargify_Component::META_CHARGIFY_UNIT_NAME,
						Chargify_Component::META_CHARGIFY_UNIT_PRICE,
						Chargify_Component::META_CHARGIFY_PRICE_PER_UNIT_IN_CENTS,
						Chargify_Component::META_CHARGIFY_TAXABLE,
						Chargify_Component::META_CHARGIFY_TAX_CODE,
						Chargify_Component::META_CHARGIFY_UPGRADE_CHARGE,
						Chargify_Component::META_CHARGIFY_DOWNGRADE_CREDIT,
						Chargify_Component::META_CHARGIFY_RECURRING,
						Chargify_Component::META_CHARGIFY_PRICES,
					],
				],
				[
					'id'     => 'tab-misc',
					'title'  => __( 'Miscellaneous', 'chargify' ),
					'fields' => [
						Chargify_Component::META_CHARGIFY_KIND,
						Chargify_Component::META_CHARGIFY_ARCHIVED,
						Chargify_Component::META_CHARGIFY_CREATED_AT,
					],
				],
			],
		]
	);


	// General.
	$cmb2->add_field(
		[
			'name'       => __( 'Component Chargify ID', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Component::META_CHARGIFY_ID,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Component Name', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Component::META_CHARGIFY_NAME,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Component Handle', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Component::META_CHARGIFY_HANDLE,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Component Description', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Component::META_CHARGIFY_DESCRIPTION,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Component Family ID', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Component::META_CHARGIFY_FAMILY_ID,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Component Family Name', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Component::META_CHARGIFY_FAMILY_NAME,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);


	// Linked Information.
	$cmb2->add_field( // TODO Components. Display array using the 'before_field' to get default value.
		[
			'name'       => __( 'Component Price Point Chargify IDs', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Component::META_CHARGIFY_PRICE_POINT_ID,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field( // TODO Components. Display array using the 'before_field' to get default value.
		[
			'name'       => __( 'Component Price Point WordPress IDs', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Component::META_WORDPRESS_PRICE_POINT_ID,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Component Default Price Point ID', 'chargify' ),
			'desc'       => '',
			'id'         =>
				Chargify_Component::META_CHARGIFY_DEFAULT_PRICE_POINT_ID,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Component Default Price Point Name', 'chargify' ),
			'desc'       => '',
			'id'         =>
				Chargify_Component::META_CHARGIFY_DEFAULT_PRICE_POINT_NAME,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Component Price Points Count', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Component::META_CHARGIFY_PRICE_POINT_COUNT,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);


	// Costs.
	$cmb2->add_field( // TODO Components. Verify visually displaying.
		[
			'name'       => __( 'Component Price Schema', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Component::META_CHARGIFY_PRICE_SCHEMA,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Component Unit Name', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Component::META_CHARGIFY_UNIT_NAME,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'         => __( 'Component Unit Price', 'chargify' ),
			'desc'         => '',
			'id'           => Chargify_Component::META_CHARGIFY_UNIT_PRICE,
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
			'name'         => __( 'Component Price Per Unit', 'chargify' ),
			'desc'         => '',
			'id'           => Chargify_Component::META_CHARGIFY_PRICE_PER_UNIT_IN_CENTS,
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
			'name'         => __( 'Component Taxable', 'chargify' ),
			'desc'         => '',
			'id'           => Chargify_Component::META_CHARGIFY_TAXABLE,
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
			'name'       => __( 'Component Tax Code', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Component::META_CHARGIFY_TAX_CODE,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field( // TODO Components. Verify visually displaying.
		[
			'name'       => __( 'Component Upgrade Charge', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Component::META_CHARGIFY_UPGRADE_CHARGE,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field( // TODO Components. Verify visually displaying.
		[
			'name'       => __( 'Component Downgrade Credit', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Component::META_CHARGIFY_DOWNGRADE_CREDIT,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field( // TODO Components. Verify visually displaying.
		[
			'name'       => __( 'Component Recurring', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Component::META_CHARGIFY_RECURRING,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field( // TODO Components. Display array using the 'before_field' to get default value.
		[
			'name'       => __( 'Component Prices', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Component::META_CHARGIFY_PRICES,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);


	// Miscellaneous.
	$cmb2->add_field( // TODO Components. Verify visually displaying.
		[
			'name'       => __( 'Component Kind', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Component::META_CHARGIFY_KIND,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'         => __( 'Component Archived', 'chargify' ),
			'desc'         => '',
			'id'           => Chargify_Component::META_CHARGIFY_ARCHIVED,
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
			'name'         => __( 'Component Created At', 'chargify' ),
			'desc'         => '',
			'id'           => Chargify_Component::META_CHARGIFY_CREATED_AT,
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
