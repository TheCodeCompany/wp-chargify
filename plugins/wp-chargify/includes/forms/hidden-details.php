<?php
/**
 * Register the hidden field for the Chargify signup form.
 *
 * @file    wp-chargify/includes/forms/hidden-details.php
 * @package WPChargify
 */

namespace Chargify\Forms\Hidden_Details;

use CMB2;

/**
 * Register the server response hidden field.
 *
 * @param CMB2 $signup_form The signup form CMB2 object.
 *
 * @return mixed
 */
function register_hidden_details_fields( $signup_form ) {

	$signup_form->add_field(
		[
			'id'         => 'chargify_product_family_id',
			'type'       => 'hidden',
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_product_info',
		]
	);

	$signup_form->add_field(
		[
			'id'         => 'chargify_product_id',
			'type'       => 'hidden',
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_product_info',
		]
	);

	$signup_form->add_field(
		[
			'id'         => 'chargify_product_handle',
			'type'       => 'hidden',
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_product_info',
		]
	);

	$signup_form->add_field(
		[
			'id'         => 'chargify_price_point_id',
			'type'       => 'hidden',
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_product_info',
		]
	);

	$signup_form->add_field(
		[
			'id'         => 'chargify_price_point_handle',
			'type'       => 'hidden',
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_product_info',
		]
	);

	$signup_form->add_field(
		[
			'id'         => 'chargify_component_id',
			'type'       => 'hidden',
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_product_info',
		]
	);

	$signup_form->add_field(
		[
			'id'         => 'chargify_component_handle',
			'type'       => 'hidden',
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_product_info',
		]
	);

	$signup_form->add_field(
		[
			'id'         => 'chargify_component_price_point_id',
			'type'       => 'hidden',
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_product_info',
		]
	);

	$signup_form->add_field(
		[
			'id'         => 'chargify_component_price_point_handle',
			'type'       => 'hidden',
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_product_info',
		]
	);

	$signup_form->add_field(
		[
			'id'         => 'chargify_component_quantity',
			'type'       => 'hidden',
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_value',
		]
	);

	// Used for visuals and coupon.
	$signup_form->add_field(
		[
			'id'         => 'chargify_total_in_cents',
			'type'       => 'hidden',
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_value',
		]
	);

	$signup_form->add_field(
		[
			'id'         => 'chargify_total_in_cents_discounted',
			'type'       => 'hidden',
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_value',
		]
	);

	// Filter the Hidden Details form.
	return apply_filters( 'chargify_hidden_details_fields', $signup_form );
}
