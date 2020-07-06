<?php
/**
 * The coupon form fields.
 *
 * @file    wp-chargify/includes/forms/coupon-details.php
 * @package WPChargify
 */

namespace Chargify\Forms\Coupon_Details;

use CMB2;

/**
 * Register the coupon details form fields.
 *
 * @param CMB2 $signup_form The CMB2 object holding the form and form fields.
 *
 * @return mixed
 */
function register_coupon_fields( $signup_form ) {

	$signup_form->add_field(
		[
			'name' => __( 'Coupon Details', 'chargify' ),
			'desc' => __( 'Enter any coupon details below.', 'chargify' ),
			'type' => 'title',
			'id'   => 'chargify_coupon_title',
		]
	);

	$signup_form->add_field(
		[
			'name'       => __( 'Coupon Code', 'chargify' ),
			'id'         => 'chargify_coupon_code',
			'type'       => 'text',
			'desc'       => __( 'Enter a coupon code.', 'chargify' ),
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values',
		]
	);

	// Filter the Coupon Details form.
	return apply_filters( 'chargify_coupon_fields', $signup_form );
}
