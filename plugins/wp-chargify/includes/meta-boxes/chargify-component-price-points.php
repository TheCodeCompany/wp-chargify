<?php

namespace Chargify\Meta_Boxes\Component_Price_Point;

/**
 * Register all the meta fields so we can map Chargify product information to it.
 */
function component_price_point_meta_boxes() {
	$cmb2 = new_cmb2_box(
		[
			'id'           => 'chargify_component_price_point_details',
			'title'        => __( 'Component Price Point Details', 'chargify' ),
			'object_types' => [ 'chargify_component_price_point' ],
			'context'      => 'normal',
			'priority'     => 'high',
			'show_names'   => true,
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Component ID', 'chargify' ),
			'desc'       => __( 'The ID of the component Price Point in Chargify.', 'chargify' ),
			'id'         => 'chargify_component_price_point_id',
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
			'name'       => __( 'Component Price Point Handle', 'chargify' ),
			'desc'       => __( 'The handle of the component Price Point in Chargify.', 'chargify' ),
			'id'         => 'chargify_component_price_point_handle',
			'type'       => 'text',
			'attributes' => [
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			],
		]
	);

	$cmb2->add_field(
		[
			'name'       => __( 'Component ID', 'chargify' ),
			'desc'       => __( 'The ID of the component that this price point is linked to in Chargify.', 'chargify' ),
			'id'         => 'chargify_component_id',
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
			'desc'       => __( 'The Product Family ID that the component price point belongs to in Chargify.', 'chargify' ),
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
			'desc'       => __( 'The Product ID that the component price point belongs to in Chargify.', 'chargify' ),
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
 * Remove the Publish meta box for our Components.
 */
function remove_publish_meta_box() {
	remove_meta_box( 'metabox_id', 'chargify_component', 'default_position' );
	remove_meta_box( 'submitdiv', 'chargify_component', 'side' );
}
