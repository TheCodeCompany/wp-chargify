<?php
/**
 * Register the product fields for the Chargify signup form.
 *
 * @file    wp-chargify/includes/forms/product-details.php
 * @package WPChargify
 */

namespace Chargify\Forms\Product_Details;

use Chargify\Libraries\Requests;
use CMB2;

/**
 * Register the product and cost hidden fields used for visuals, coupon and cost calculations.
 *
 * @param CMB2 $signup_form The signup form CMB2 object.
 *
 * @return mixed
 */
function register_product_details_costs_fields( $signup_form ) {

	$signup_form->add_field(
		[
			'id'         => 'product_id',
			'type'       => 'hidden',
			'default_cb' => 'Chargify\\Helpers\\Forms_Products\\maybe_set_default_product_value',
		]
	);

	$signup_form->add_field(
		[
			'id'         => 'product_handle',
			'type'       => 'hidden',
			'default_cb' => 'Chargify\\Helpers\\Forms_Products\\maybe_set_default_product_value',
		]
	);

	$signup_form->add_field(
		[
			'id'         => 'product_price_point_id',
			'type'       => 'hidden',
			'default_cb' => 'Chargify\\Helpers\\Forms_Products\\maybe_set_default_product_value',
		]
	);

	$signup_form->add_field(
		[
			'id'         => 'product_price_point_handle',
			'type'       => 'hidden',
			'default_cb' => 'Chargify\\Helpers\\Forms_Products\\maybe_set_default_product_value',
		]
	);

	$signup_form->add_field(
		[
			'id'         => 'product_price_in_cents',
			'type'       => 'hidden',
			'default_cb' => 'Chargify\\Helpers\\Forms_Products\\maybe_set_default_product_value',
		]
	);

	$signup_form->add_field(
		[
			'id'         => 'product_price_in_cents_discounted',
			'type'       => 'hidden',
			'default_cb' => 'Chargify\\Helpers\\Forms_Products\\maybe_set_default_product_value',
		]
	);

	$signup_form->add_field(
		[
			'id'         => 'product_price_in_dollars',
			'type'       => 'hidden',
			'default_cb' => 'Chargify\\Helpers\\Forms_Products\\maybe_set_default_product_value',
		]
	);

	$signup_form->add_field(
		[
			'id'         => 'product_price_in_dollars_discounted',
			'type'       => 'hidden',
			'default_cb' => 'Chargify\\Helpers\\Forms_Products\\maybe_set_default_product_value',
		]
	);

	$signup_form->add_field(
		[
			'id'         => 'product_interval',
			'type'       => 'hidden',
			'default_cb' => 'Chargify\\Helpers\\Forms_Products\\maybe_set_default_product_value',
		]
	);

	$signup_form->add_field(
		[
			'id'         => 'product_interval_unit',
			'type'       => 'hidden',
			'default_cb' => 'Chargify\\Helpers\\Forms_Products\\maybe_set_default_product_value',
		]
	);

	$signup_form->add_field(
		[
			'id'         => 'product_taxable',
			'type'       => 'hidden',
			'default_cb' => 'Chargify\\Helpers\\Forms_Products\\maybe_set_default_product_value',
		]
	);

	// TODO discount fields.

	// Filter the Customer Details form.
	return apply_filters( 'chargify_product_details_top_fields', $signup_form );
}

/**
 * Register the product and cost(top) fields.
 *
 * @param CMB2 $signup_form The signup form CMB2 object.
 *
 * @return mixed
 */
function register_product_costs_details_top_fields( $signup_form ) {

	$signup_form->add_field(
		[
			'name'         => '',
			'id'           => 'chargify_costs_top',
			'type'         => 'title',
			'before_field' => 'Chargify\\Helpers\\Forms_Products\\costs_top_html',
			'attributes'   => [
				'style' => 'display:none;',
			],
		]
	);

	// Filter the Customer Details form.
	return apply_filters( 'chargify_product_details_top_fields', $signup_form );
}

/**
 * Register the product and cost(bottom) fields.
 *
 * @param CMB2 $signup_form The signup form CMB2 object.
 *
 * @return mixed
 */
function register_product_costs_details_bottom_fields( $signup_form ) {

	$signup_form->add_field(
		[
			'name'         => '',
			'id'           => 'chargify_costs_bottom',
			'type'         => 'title',
			'before_field' => 'Chargify\\Helpers\\Forms_Products\\costs_bottom_html',
			'attributes'   => [
				'style' => 'display:none;',
			],
		]
	);

	// Filter the Customer Details form.
	return apply_filters( 'chargify_product_details_bottom_fields', $signup_form );
}
