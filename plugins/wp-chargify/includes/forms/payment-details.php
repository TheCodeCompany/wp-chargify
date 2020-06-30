<?php
namespace Chargify\Forms\Payment_Details;

function register_payment_fields( $signup_form ) {
	$signup_form->add_field( [
		'name' => __( 'Payment Details', 'chargify' ),
		'desc' => __( 'Please enter your payment details below.', 'chargify' ),
		'type' => 'title',
		'id'   => 'chargify_payment_title'
	] );

	$signup_form->add_field( [
		'name'       => __( 'First Name', 'chargify' ),
		'id'         => 'chargify_payment_first_name',
		'type'       => 'text',
		'desc'       => __( 'The first name on the card.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'First Name', 'chargify' ),
		],
		'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values'
	]);

	$signup_form->add_field( [
		'name'       => __( 'Last Name', 'chargify' ),
		'id'         => 'chargify_payment_last_name',
		'type'       => 'text',
		'desc'       => __( 'The last name on the card.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'Last Name', 'chargify' ),
		],
		'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values'
	]);

	$signup_form->add_field( [
		'name'       => __( 'Card Number', 'chargify' ),
		'id'         => 'chargify_payment_card_number',
		'type'       => 'text',
		'desc'       => __( 'The credit card number.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( '1234 1234 1234 1234', 'chargify' ),
			'type'        => 'number',
		],
		'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values'
	]);

	$signup_form->add_field( [
		'name'       => __( 'Expiry Month', 'chargify' ),
		'id'         => 'chargify_payment_expiry_month',
		'type'       => 'text',
		'desc'       => __( 'The expiration month of the card.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'MM', 'chargify' ),
			'type'        => 'number',
		],
		'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values'
	]);

	$signup_form->add_field( [
		'name'       => __( 'Expiry Year', 'chargify' ),
		'id'         => 'chargify_payment_expiry_year',
		'type'       => 'text',
		'desc'       => __( 'The expiration year of the card. e.g. 2025', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'YYYY', 'chargify' ),
			'type'        => 'number',
		],
		'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values'
	]);

	$signup_form->add_field( [
		'name'       => __( 'CVV', 'chargify' ),
		'id'         => 'chargify_payment_cvv',
		'type'       => 'text',
		'desc'       => __( 'The  of the Card Verification Value.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'CVV', 'chargify' ),
			'type'        => 'number',
		],
		'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_from_posted_values'
	]);


	# Filter the Payments form
	$fields = apply_filters( 'chargify_payment_fields', $signup_form );

	return $fields;
}
