<?php
namespace Chargify\Forms\Billing_Details;

function register_customer_billing_fields( $signup_form ) {

	$signup_form->add_field( [
		'name' => __( 'Billing Details', 'chargify' ),
		'desc' => __( 'Please enter your details below.', 'chargify' ),
		'type' => 'title',
		'id'   => 'chargify_billing_title'
	] );

	$signup_form->add_field( [
		'name'       => __( 'First Name', 'chargify' ),
		'id'         => 'chargify_billing_first_name',
		'type'       => 'text',
		'desc'       => __( 'Your first name.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'First Name', 'chargify' ),
		]
	]);

	$signup_form->add_field( [
		'name'       => __( 'Last Name', 'chargify' ),
		'id'         => 'chargify_billing_last_name',
		'type'       => 'text',
		'desc'       => __( 'Your first name.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'Last Name', 'chargify' ),
		]
	]);

	$signup_form->add_field( [
		'name'       => __( 'Organisation', 'chargify' ),
		'id'         => 'chargify_billing_organisation',
		'type'       => 'text_medium',
		'desc'       => __( 'Your organisation name.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'Organisation', 'chargify' ),
		]
	]);

	$signup_form->add_field( [
		'name'       => __( 'Reference', 'chargify' ),
		'id'         => 'chargify_billing_reference',
		'type'       => 'text_medium',
		'desc'       => __( 'Your billing reference.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'Reference', 'chargify' ),
		]
	]);

	$signup_form->add_field( [
		'name'       => __( 'Address Line 1', 'chargify' ),
		'id'         => 'chargify_billing_address_1',
		'type'       => 'text',
		'desc'       => __( 'Street address, P.O. Box, Company Name, c/o.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'Address Line 1', 'chargify' ),
		]
	]);

	$signup_form->add_field( [
		'name'       => __( 'Address Line 2', 'chargify' ),
		'id'         => 'chargify_billing_address_2',
		'type'       => 'text',
		'desc'       => __( 'Apartment, suite , unit, building, floor, etc.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'Address Line 2', 'chargify' ),
		]
	]);

	$signup_form->add_field( [
		'name'       => __( 'City / Town', 'chargify' ),
		'id'         => 'chargify_billing_city',
		'type'       => 'text',
		'desc'       => __( 'Your city or town.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'City / Town', 'chargify' ),
		]
	]);

	$signup_form->add_field( [
		'name'       => __( 'State / Province / Region', 'chargify' ),
		'id'         => 'chargify_billing_state',
		'type'       => 'text',
		'desc'       => __( 'Your state, province or region.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'State / Province / Region', 'chargify' ),
		]
	]);

	$signup_form->add_field( [
		'name'       => __( 'Zip / Post Code', 'chargify' ),
		'id'         => 'chargify_billing_zip',
		'type'       => 'text',
		'desc'       => __( 'Your Zip or Post Code.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'Zip / Post Code', 'chargify' ),
		]
	]);

	$signup_form->add_field( [
		'name'       => __( 'Country', 'chargify' ),
		'id'         => 'chargify_billing_country',
		'type'       => 'text',
		'desc'       => __( 'Your country.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'Country', 'chargify' ),
		]
	]);

	# Filter the Billing Details form
	$fields = apply_filters( 'chargify_customer_billing_fields', $signup_form );

	return $fields;
}
