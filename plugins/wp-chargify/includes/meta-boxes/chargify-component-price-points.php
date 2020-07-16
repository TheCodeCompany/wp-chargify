<?php

namespace Chargify\Meta_Boxes\Component_Price_Point;

use Chargify\Model\Chargify_Component_Price_Point;

/**
 * Register all the meta fields so we can map Chargify product information to it.
 */
function component_price_point_meta_boxes() {

	$cmb2 = new_cmb2_box(
		[
			'id'           => 'chargify_component_price_point_details',
			'title'        => __( 'Component Price Point Details', 'chargify' ),
			'object_types' => [ Chargify_Component_Price_Point::POST_TYPE ],
			'context'      => 'normal',
			'priority'     => 'high',
			'show_names'   => true,
			'tabs'         => [
				[
					'id'     => 'tab-general',
					'title'  => __( 'General', 'chargify' ),
					'fields' => [
						Chargify_Component_Price_Point::META_CHARGIFY_ID,
						Chargify_Component_Price_Point::META_CHARGIFY_NAME,
						Chargify_Component_Price_Point::META_CHARGIFY_HANDLE,
					],
				],
				[
					'id'     => 'tab-linked-info',
					'title'  => __( 'Linked Information', 'chargify' ),
					'fields' => [
						Chargify_Component_Price_Point::META_CHARGIFY_COMPONENT_ID,
						Chargify_Component_Price_Point::META_WORDPRESS_COMPONENT_ID,
					],
				],
				[
					'id'     => 'tab-costs',
					'title'  => __( 'Costs', 'chargify' ),
					'fields' => [
						Chargify_Component_Price_Point::META_CHARGIFY_DEFAULT,
						Chargify_Component_Price_Point::META_CHARGIFY_PRICE_SCHEMA,
						Chargify_Component_Price_Point::META_CHARGIFY_PRICES,
					],
				],
				[
					'id'     => 'tab-misc',
					'title'  => __( 'Miscellaneous', 'chargify' ),
					'fields' => [
						Chargify_Component_Price_Point::META_CHARGIFY_ARCHIVED_AT,
						Chargify_Component_Price_Point::META_CHARGIFY_CREATED_AT,
						Chargify_Component_Price_Point::META_CHARGIFY_UPDATED_AT,
					],
				],
			],
		]
	);


	// General.
	$cmb2->add_field(
		[
			'name'       => __( 'Component Price Point Chargify ID', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Component_Price_Point::META_CHARGIFY_ID,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Component Price Point Name', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Component_Price_Point::META_CHARGIFY_NAME,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Component Price Point Handle', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Component_Price_Point::META_CHARGIFY_HANDLE,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	// Linked Information.
	$cmb2->add_field( // TODO Components. Display array of chargify ids using the 'before_field' to get default value.
		[
			'name'       => __( 'Price Point Component Chargify ID\'s', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Component_Price_Point::META_CHARGIFY_COMPONENT_ID,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field( // TODO Components. Display array of chargify ids using the 'before_field' to get default value.
		[
			'name'       => __( 'Price Point Component WordPress ID\'s', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Component_Price_Point::META_WORDPRESS_COMPONENT_ID,
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
			'name'         => __( 'Component Price Point is Default', 'chargify' ),
			'desc'         => '',
			'id'           => Chargify_Component_Price_Point::META_CHARGIFY_DEFAULT,
			'type'         => 'text',
			'attributes'   => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
				'type'     => 'hidden', // Added here because 'before_field' renders visuals.
			],
			'before_field' => 'Chargify\\Meta_Boxes\\Helpers\\maybe_convert_boolean_yes_no',
		]
	);

	$cmb2->add_field( // TODO Components. Verify visually displaying.
		[
			'name'       => __( 'Component Price Schema', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Component_Price_Point::META_CHARGIFY_PRICE_SCHEMA,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field( // TODO Components. Display array using the 'before_field' to get default value.
		[
			'name'       => __( 'Component Price Point Prices', 'chargify' ),
			'desc'       => '',
			'id'         => Chargify_Component_Price_Point::META_CHARGIFY_PRICES,
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);


	// Miscellaneous.
	$cmb2->add_field(
		[
			'name'         => __( 'Component Price Point Archived At', 'chargify' ),
			'desc'         => '',
			'id'           => Chargify_Component_Price_Point::META_CHARGIFY_ARCHIVED_AT,
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
			'name'         => __( 'Component Price Point Created At', 'chargify' ),
			'desc'         => '',
			'id'           => Chargify_Component_Price_Point::META_CHARGIFY_CREATED_AT,
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
			'name'         => __( 'Component Price Point Updated At', 'chargify' ),
			'desc'         => '',
			'id'           => Chargify_Component_Price_Point::META_CHARGIFY_UPDATED_AT,
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

