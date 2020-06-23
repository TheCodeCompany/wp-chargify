<?php
namespace Chargify\Forms\Customer_Details;

function register_customer_details_form() {
	$customer_details = new_cmb2_box( [
		'id'           => 'chargify_customer_details_form',
		'object_types' => [ 'chargify_account' ],
		'hookup'       => false,
		'save_fields'  => false,
	]);

	$customer_details->add_field( array(
		'name' => __( 'Customer Details', 'chargify' ),
		'desc' => __( 'Please enter your details below', 'chargify' ),
		'type' => 'title',
		'id'   => 'chargify_customer_details_title'
	) );

	$customer_details->add_field( [
		'name'       => __( 'First Name', 'chargify' ),
		'id'         => 'chargify_first_name',
		'type'       => 'text',
		'desc'       => __( 'Your first name.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'First Name', 'chargify' ),
		]
	]);

	$customer_details->add_field( [
		'name'       => __( 'Last Name', 'chargify' ),
		'id'         => 'chargify_last_name',
		'type'       => 'text',
		'desc'       => __( 'Your first name.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'Last Name', 'chargify' ),
		]
	]);

	$customer_details->add_field([
		'name'       => __( 'Email Address', 'chargify' ),
		'id'         => 'chargify_email_address',
		'type'       => 'text_email',
		'desc'       => __( 'Your email address.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'you@yourcompany.com', 'chargify' ),
		]
	]);

	$customer_details->add_field([
		'name'       => __( 'CC Emails', 'chargify' ),
		'id'         => 'chargify_cc_emails',
		'type'       => 'text_email',
		'desc'       => __( 'Comma separated.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'accounting@yourcompany.com', 'chargify' )
		]
	]);

	$customer_details->add_field( [
		'name'       => __( 'Organisation', 'chargify' ),
		'id'         => 'chargify_organisation',
		'type'       => 'text_medium',
		'desc'       => __( 'Your organisation name.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'Organisation', 'chargify' ),
		]
	]);

	$customer_details->add_field( [
		'name'       => __( 'Address Line 1', 'chargify' ),
		'id'         => 'chargify_address_1',
		'type'       => 'text',
		'desc'       => __( 'Street address, P.O. Box, Company Name, c/o.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'Address Line 1', 'chargify' ),
		]
	]);

	$customer_details->add_field( [
		'name'       => __( 'Address Line 2', 'chargify' ),
		'id'         => 'chargify_address_2',
		'type'       => 'text',
		'desc'       => __( 'Apartment, suite , unit, building, floor, etc.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'Address Line 2', 'chargify' ),
		]
	]);

	$customer_details->add_field( [
		'name'       => __( 'City / Town', 'chargify' ),
		'id'         => 'chargify_city',
		'type'       => 'text',
		'desc'       => __( 'Your city or town.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'City / Town', 'chargify' ),
		]
	]);

	$customer_details->add_field( [
		'name'       => __( 'State / Province / Region', 'chargify' ),
		'id'         => 'chargify_state',
		'type'       => 'text',
		'desc'       => __( 'Your state, province or region.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'State / Province / Region', 'chargify' ),
		]
	]);

	$customer_details->add_field( [
		'name'       => __( 'Zip / Post Code', 'chargify' ),
		'id'         => 'chargify_zip',
		'type'       => 'text',
		'desc'       => __( 'Your Zip or Post Code.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'Zip / Post Code', 'chargify' ),
		]
	]);

	$customer_details->add_field( [
		'name'       => __( 'Country', 'chargify' ),
		'id'         => 'chargify_country',
		'type'       => 'text',
		'desc'       => __( 'Your country.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'Country', 'chargify' ),
		]
	]);

	# Filter the Customer Details form
	apply_filters( 'chargify_customer_details_form', $customer_details );

}
