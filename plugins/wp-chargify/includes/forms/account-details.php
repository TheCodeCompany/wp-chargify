<?php
namespace Chargify\Forms\Account_Details;

function register_account_details_fields( $signup_form ) {

	$signup_form->add_field( array(
		'name' => __( 'Account Details', 'chargify' ),
		'desc' => __( 'Please enter your account details below', 'chargify' ),
		'type' => 'title',
		'id'   => 'chargify_account_details_title'
	) );

	$signup_form->add_field( [
		'name'       => __( 'Username', 'chargify' ),
		'id'         => 'chargify_username',
		'type'       => 'text',
		'desc'       => __( 'Your username.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'Username', 'chargify' ),
		]
	]);

	$signup_form->add_field( [
		'name'       => __( 'Password', 'chargify' ),
		'id'         => 'chargify_password',
		'type'       => 'text',
		'desc'       => __( 'Your password.', 'chargify' ),
		'attributes' => [
			'placeholder' => __( 'Password', 'chargify' ),
			'type'        => 'password',
		]
	]);

	# Filter the Customer Details form
	$fields = apply_filters( 'chargify_account_details_fields', $signup_form );

	return $fields;
}
