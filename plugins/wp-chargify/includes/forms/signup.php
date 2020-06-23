<?php
namespace Chargify\Forms\Signup;

function register_customer_details_form() {
	$signup_form = new_cmb2_box( [
		'id'           => 'chargify_signup_form',
		'object_types' => [ 'chargify_account' ],
		'hookup'       => false,
		'save_fields'  => false,
	]);

	$signup_form->add_field( array(
		'name' => __( 'Customer Details', 'chargify' ),
		'desc' => __( 'Please enter your details below', 'chargify' ),
		'type' => 'title',
		'id'   => 'chargify_customer_details_title'
	) );

	$signup_form->add_field( [
		'name'       => __( 'First Name', 'chargify' ),
		'id'         => 'chargify_first_name',
		'type'       => 'text',
		'desc'       => __( 'Your first name.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'First Name', 'chargify' ),
		]
	]);

	$signup_form->add_field( [
		'name'       => __( 'Last Name', 'chargify' ),
		'id'         => 'chargify_last_name',
		'type'       => 'text',
		'desc'       => __( 'Your first name.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'Last Name', 'chargify' ),
		]
	]);

	$signup_form->add_field([
		'name'       => __( 'Email Address', 'chargify' ),
		'id'         => 'chargify_email_address',
		'type'       => 'text_email',
		'desc'       => __( 'Your email address.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'you@yourcompany.com', 'chargify' ),
		]
	]);

	$signup_form->add_field([
		'name'       => __( 'CC Emails', 'chargify' ),
		'id'         => 'chargify_cc_emails',
		'type'       => 'text_email',
		'desc'       => __( 'Comma separated.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'accounting@yourcompany.com', 'chargify' )
		]
	]);

	$signup_form->add_field( [
		'name'       => __( 'Organisation', 'chargify' ),
		'id'         => 'chargify_organisation',
		'type'       => 'text_medium',
		'desc'       => __( 'Your organisation name.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'Organisation', 'chargify' ),
		]
	]);

	$signup_form->add_field( [
		'name'       => __( 'Address Line 1', 'chargify' ),
		'id'         => 'chargify_address_1',
		'type'       => 'text',
		'desc'       => __( 'Street address, P.O. Box, Company Name, c/o.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'Address Line 1', 'chargify' ),
		]
	]);

	$signup_form->add_field( [
		'name'       => __( 'Address Line 2', 'chargify' ),
		'id'         => 'chargify_address_2',
		'type'       => 'text',
		'desc'       => __( 'Apartment, suite , unit, building, floor, etc.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'Address Line 2', 'chargify' ),
		]
	]);

	$signup_form->add_field( [
		'name'       => __( 'City / Town', 'chargify' ),
		'id'         => 'chargify_city',
		'type'       => 'text',
		'desc'       => __( 'Your city or town.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'City / Town', 'chargify' ),
		]
	]);

	$signup_form->add_field( [
		'name'       => __( 'State / Province / Region', 'chargify' ),
		'id'         => 'chargify_state',
		'type'       => 'text',
		'desc'       => __( 'Your state, province or region.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'State / Province / Region', 'chargify' ),
		]
	]);

	$signup_form->add_field( [
		'name'       => __( 'Zip / Post Code', 'chargify' ),
		'id'         => 'chargify_zip',
		'type'       => 'text',
		'desc'       => __( 'Your Zip or Post Code.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'Zip / Post Code', 'chargify' ),
		]
	]);

	$signup_form->add_field( [
		'name'       => __( 'Country', 'chargify' ),
		'id'         => 'chargify_country',
		'type'       => 'text',
		'desc'       => __( 'Your country.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'Country', 'chargify' ),
		]
	]);

	# Filter the Customer Details form
	apply_filters( 'chargify_customer_details_form', $signup_form );

}

function chargify_signup_form() {
	$metabox_id = 'chargify_signup_form';

	# Just a placeholder object id.
	$object_id  = 'temp-object-id';

	$form = cmb2_get_metabox( $metabox_id, $object_id );

	$output = cmb2_get_metabox_form(
		$form,
		$object_id,
		[
			'save_button' => __( 'Signup', 'chargify' )
		]
	);


	return $output;
}
