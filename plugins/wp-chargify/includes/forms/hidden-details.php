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
			'id'         => 'family_id',
			'type'       => 'hidden',
			'default_cb' => 'Chargify\\Helpers\\Forms_Products\\maybe_set_default_product_value',
		]
	);

	$signup_form->add_field(
		[
			'id'         => 'family_handle',
			'type'       => 'hidden',
			'default_cb' => 'Chargify\\Helpers\\Forms_Products\\maybe_set_default_product_value',
		]
	);

	// Filter the Hidden Details form.
	return apply_filters( 'chargify_hidden_details_fields', $signup_form );
}
