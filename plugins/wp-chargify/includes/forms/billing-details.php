<?php
/**
 * The billing form fields.
 *
 * @file    wp-chargify/includes/forms/billing-details.php
 * @package WPChargify
 */

namespace Chargify\Forms\Billing_Details;

use CMB2;

/**
 * Register the billing details form fields.
 *
 * @param CMB2 $signup_form The CMB2 object holding the form and form fields.
 *
 * @return mixed
 */
function register_customer_billing_fields( $signup_form ) {

	$signup_form->add_field(
		[
			'name' => __( 'Billing Details', 'chargify' ),
			'desc' => __( 'Please enter your details below.', 'chargify' ),
			'type' => 'title',
			'id'   => 'chargify_billing_title',
		]
	);

	$signup_form->add_field(
		[
			'name'       => __( 'First Name', 'chargify' ),
			'id'         => 'chargify_billing_first_name',
			'type'       => 'text',
			'desc'       => __( 'Your first name.', 'chargify' ),
			'attributes' => [
				'placeholder' => __( 'First Name', 'chargify' ),
				'required'    => null,
			],
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values',
		]
	);

	$signup_form->add_field(
		[
			'name'       => __( 'Last Name', 'chargify' ),
			'id'         => 'chargify_billing_last_name',
			'type'       => 'text',
			'desc'       => __( 'Your first name.', 'chargify' ),
			'attributes' => [
				'placeholder' => __( 'Last Name', 'chargify' ),
				'required'    => null,
			],
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values',
		]
	);

	$signup_form->add_field(
		[
			'name'       => __( 'Address Line 1', 'chargify' ),
			'id'         => 'chargify_billing_address_1',
			'type'       => 'text',
			'desc'       => __( 'Street address, P.O. Box, Company Name, c/o.', 'chargify' ),
			'attributes' => [
				'placeholder' => __( 'Address Line 1', 'chargify' ),
				'required'    => null,
			],
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values',
		]
	);

	$signup_form->add_field(
		[
			'name'       => __( 'Address Line 2', 'chargify' ),
			'id'         => 'chargify_billing_address_2',
			'type'       => 'text',
			'desc'       => __( 'Apartment, suite , unit, building, floor, etc.', 'chargify' ),
			'attributes' => [
				'placeholder' => __( 'Address Line 2', 'chargify' ),
				'required'    => null,
			],
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values',
		]
	);

	$signup_form->add_field(
		[
			'name'       => __( 'City / Town', 'chargify' ),
			'id'         => 'chargify_billing_city',
			'type'       => 'text',
			'desc'       => __( 'Your city or town.', 'chargify' ),
			'attributes' => [
				'placeholder' => __( 'City / Town', 'chargify' ),
				'required'    => null,
			],
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values',
		]
	);
	$signup_form->add_field(
		[
			'name'       => __( 'Zip / Post Code', 'chargify' ),
			'id'         => 'chargify_billing_zip',
			'type'       => 'text',
			'desc'       => __( 'Your Zip or Post Code.', 'chargify' ),
			'attributes' => [
				'placeholder' => __( 'Zip / Post Code', 'chargify' ),
				'required'    => null,
			],
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values',
		]
	);

	// Country ordered before state for the dropdown pair.
	$signup_form->add_field(
		[
			'name'       => __( 'State / Province / Region', 'chargify' ),
			'id'         => 'chargify_billing_state',
			'type'       => 'select',
			'desc'       => __( 'Your state, province or region.', 'chargify' ),
			'attributes' => [
				'placeholder' => __( 'State / Province / Region', 'chargify' ),
				'required'    => null,
				'style'       => 'width: 100%',
			],
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values',
		]
	);

	// Country ordered before state for the dropdown pair.
	$signup_form->add_field(
		[
			'name'       => __( 'Country', 'chargify' ),
			'id'         => 'chargify_billing_country',
			'type'       => 'select',
			'desc'       => __( 'Your country.', 'chargify' ),
			'attributes' => [
				'placeholder' => __( 'Country', 'chargify' ),
				'required'    => null,
				'style'       => 'width: 100%',
			],
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values',
		]
	);

	// Filter the Billing Details form.
	return apply_filters( 'chargify_customer_billing_fields', $signup_form );
}
