<?php

namespace Chargify\Meta_Boxes\Component;

/**
 * Register all the meta fields so we can map Chargify product information to it.
 */
function component_meta_boxes() {
	$cmb2 = new_cmb2_box(
		[
			'id'           => 'chargify_component_details',
			'title'        => __( 'Component Details', 'chargify' ),
			'object_types' => [ 'chargify_component' ],
			'context'      => 'normal',
			'priority'     => 'high',
			'show_names'   => true,
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Componennt ID', 'chargify' ),
			'desc'       => __( 'The ID of the component in Chargify.', 'chargify' ),
			'id'         => 'chargify_component_id',
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
			'name'       => __( 'Component Handle', 'chargify' ),
			'desc'       => __( 'The handle of the component in Chargify.', 'chargify' ),
			'id'         => 'chargify_component_handle',
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Pricing Scheme', 'chargify' ),
			'desc'       => __( 'The pricing scheme of the component in Chargify.', 'chargify' ),
			'id'         => 'chargify_component_pricing_scheme',
			'type'       => 'select',
			'options'    => [
				'per_unit'  => __( 'Per Unit', 'chargify' ),
				'volume'    => __( 'Volume', 'chargify' ),
				'tiered'    => __( 'Tiered', 'chargify' ),
				'stairstep' => __( 'Stairstep', 'chargify' ),
			],
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'        => __( 'Unit Name', 'chargify' ),
			'description' => __( 'The unit name of the component in Chargify.', 'chargify' ),
			'id'          => 'chargify_component_unit_name',
			'type'        => 'text',
			'attributes'  => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'        => __( 'Unit Price', 'chargify' ),
			'description' => __( 'The unit price of the product in Chargify.', 'chargify' ),
			'id'          => __( 'chargify_component_unit_price' ),
			'type'        => 'text_money',
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

	$cmb2->add_field(
		[
			'name'       => __( 'Kind', 'chargify' ),
			'desc'       => __( 'The kind of the component in Chargify.', 'chargify' ),
			'id'         => 'chargify_component_kind',
			'type'       => 'select',
			'options'    => [
				'on_off_component'         => __( 'On/Off', 'chargify' ),
				'quantity_based_component' => __( 'Quantity', 'chargify' ),
				'metered_component'        => __( 'Metered', 'chargify' ),
			],
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Archived', 'chargify' ),
			'desc'       => __( 'The whether or not the component in Chargify is archived.', 'chargify' ),
			'id'         => 'chargify_component_archived',
			'type'       => 'radio_inline',
			'options'    => [
				'1' => __( 'True', 'chargify' ),
				'0' => __( 'False', 'chargify' ),
			],
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Taxable', 'chargify' ),
			'desc'       => __( 'Whether or not the component in Chargify is taxable.', 'chargify' ),
			'id'         => 'chargify_component_taxable',
			'type'       => 'radio_inline',
			'options'    => [
				'1' => __( 'True', 'chargify' ),
				'0' => __( 'False', 'chargify' ),
			],
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Default Price Point ID', 'chargify' ),
			'desc'       => __( 'The Default Price Point ID of the component in Chargify.', 'chargify' ),
			'id'         => 'chargify_component_default_price_point_id',
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
			'name'       => __( 'Price Point Count', 'chargify' ),
			'desc'       => __( 'The price point count of the component in Chargify.', 'chargify' ),
			'id'         => 'chargify_component_price_point_count',
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
			'name'       => __( 'Price Points URL', 'chargify' ),
			'desc'       => __( 'The price points URL of the component in Chargify.', 'chargify' ),
			'id'         => 'chargify_component_price_points_url',
			'type'       => 'text_url',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Default Price Point Name', 'chargify' ),
			'desc'       => __( 'The default price point name of the component in Chargify.', 'chargify' ),
			'id'         => 'chargify_component_default_price_point_name',
			'type'       => 'text_medium',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Tax Code', 'chargify' ),
			'desc'       => __( 'The tax code of the component in Chargify.', 'chargify' ),
			'id'         => 'chargify_component_tax_code',
			'type'       => 'text_medium',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Recurring', 'chargify' ),
			'desc'       => __( 'Whether or not the component in Chargify is recurring.', 'chargify' ),
			'id'         => 'chargify_component_recurring',
			'type'       => 'radio_inline',
			'options'    => [
				'1' => __( 'True', 'chargify' ),
				'0' => __( 'False', 'chargify' ),
			],
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Upgrade Charge', 'chargify' ),
			'desc'       => __( 'Whether or not the component has an upgrade charge.', 'chargify' ),
			'id'         => 'chargify_component_upgrade_charge',
			'type'       => 'radio_inline',
			'options'    => [
				'none'     => __( 'None', 'chargify' ),
				'prorated' => __( 'Prorated', 'chargify' ),
				'full'     => __( 'Full', 'chargify' ),
			],
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Downgrade Credit', 'chargify' ),
			'desc'       => __( 'Whether or not the component has a downgrade credit.', 'chargify' ),
			'id'         => 'chargify_component_downgrade_credit',
			'type'       => 'radio_inline',
			'options'    => [
				'none'     => __( 'None', 'chargify' ),
				'prorated' => __( 'Prorated', 'chargify' ),
				'full'     => __( 'Full', 'chargify' ),
			],
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Allow Fractional Quantities', 'chargify' ),
			'desc'       => __( 'The whether or not the component in Chargify has fractional quantities.', 'chargify' ),
			'id'         => 'chargify_component_fractional_quantities',
			'type'       => 'radio_inline',
			'options'    => [
				'1' => __( 'True', 'chargify' ),
				'0' => __( 'False', 'chargify' ),
			],
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

}

/**
 * Remove the Publish meta box for our Components.
 */
function remove_publish_meta_box() {
	remove_meta_box( 'metabox_id', 'chargify_component', 'default_position' );
	remove_meta_box( 'submitdiv', 'chargify_component', 'side' );
}
