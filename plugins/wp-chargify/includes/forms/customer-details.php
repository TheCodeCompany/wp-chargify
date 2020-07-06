<?php
/**
 * The customer form fields.
 *
 * @file    wp-chargify/includes/forms/customer-details.php
 * @package WPChargify
 */

namespace Chargify\Forms\Customer_Details;

use CMB2;

/**
 * Register the customer details form fields.
 *
 * @param CMB2 $signup_form The CMB2 object holding the form and form fields.
 *
 * @return mixed
 */
function register_customer_details_fields( $signup_form ) {

	$signup_form->add_field(
		[
			'name' => __( 'Customer Details', 'chargify' ),
			'desc' => __( 'Please enter your details below.', 'chargify' ),
			'type' => 'title',
			'id'   => 'chargify_customer_details_title',
		]
	);

	$signup_form->add_field(
		[
			'name'       => __( 'First Name', 'chargify' ),
			'id'         => 'chargify_first_name',
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
			'id'         => 'chargify_last_name',
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
			'name'       => __( 'Email Address', 'chargify' ),
			'id'         => 'chargify_email_address',
			'type'       => 'text_email',
			'desc'       => __( 'Your email address.', 'chargify' ),
			'attributes' => [
				'placeholder' => __( 'you@yourcompany.com', 'chargify' ),
				'required'    => null,
			],
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values',
		]
	);

	$signup_form->add_field(
		[
			'name'       => __( 'CC Emails', 'chargify' ),
			'id'         => 'chargify_cc_emails',
			'type'       => 'text_email',
			'desc'       => __( 'Comma separated.', 'chargify' ),
			'attributes' => [
				'placeholder' => __( 'accounting@yourcompany.com', 'chargify' ),
				'required'    => null,
			],
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values',
		]
	);

	$signup_form->add_field(
		[
			'name'       => __( 'Organisation', 'chargify' ),
			'id'         => 'chargify_organisation',
			'type'       => 'text_medium',
			'desc'       => __( 'Your organisation name.', 'chargify' ),
			'attributes' => [
				'placeholder' => __( 'Organisation', 'chargify' ),
			],
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values',
		]
	);

	$signup_form->add_field(
		[
			'name'       => __( 'Reference', 'chargify' ),
			'id'         => 'chargify_billing_reference',
			'type'       => 'text_medium',
			'desc'       => __( 'Your billing reference.', 'chargify' ),
			'attributes' => [
				'placeholder' => __( 'Reference', 'chargify' ),
			],
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values',
		]
	);

	$signup_form->add_field(
		[
			'name'       => __( 'Address Line 1', 'chargify' ),
			'id'         => 'chargify_address_1',
			'type'       => 'text',
			'desc'       => __( 'Street address, P.O. Box, Company Name, c/o.', 'chargify' ),
			'attributes' => [
				'placeholder' => __( 'Address Line 1', 'chargify' ),
			],
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values',
		]
	);

	$signup_form->add_field(
		[
			'name'       => __( 'Address Line 2', 'chargify' ),
			'id'         => 'chargify_address_2',
			'type'       => 'text',
			'desc'       => __( 'Apartment, suite , unit, building, floor, etc.', 'chargify' ),
			'attributes' => [
				'placeholder' => __( 'Address Line 2', 'chargify' ),
			],
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values',
		]
	);

	$signup_form->add_field(
		[
			'name'       => __( 'City / Town', 'chargify' ),
			'id'         => 'chargify_city',
			'type'       => 'text',
			'desc'       => __( 'Your city or town.', 'chargify' ),
			'attributes' => [
				'placeholder' => __( 'City / Town', 'chargify' ),
			],
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values',
		]
	);

	$signup_form->add_field(
		[
			'name'       => __( 'State / Province / Region', 'chargify' ),
			'id'         => 'chargify_state',
			'type'       => 'select',
			'desc'       => __( 'Your state, province or region.', 'chargify' ),
			'attributes' => [
				'placeholder' => __( 'State / Province / Region', 'chargify' ),
			],
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values',
		]
	);

	$signup_form->add_field(
		[
			'name'       => __( 'Zip / Post Code', 'chargify' ),
			'id'         => 'chargify_zip',
			'type'       => 'text',
			'desc'       => __( 'Your Zip or Post Code.', 'chargify' ),
			'attributes' => [
				'placeholder' => __( 'Zip / Post Code', 'chargify' ),
			],
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values',
		]
	);

	$signup_form->add_field(
		[
			'name'       => __( 'Country', 'chargify' ),
			'id'         => 'chargify_country',
			'type'       => 'select',
			'desc'       => __( 'Your country.', 'chargify' ),
			'attributes' => [
				'placeholder' => __( 'Country', 'chargify' ),
			],
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values',
		]
	);

	// Filter the Customer Details form.
	return apply_filters( 'chargify_customer_details_fields', $signup_form );
}
