<?php
/**
 * The account form fields.
 *
 * @file    wp-chargify/includes/forms/account-details.php
 * @package WPChargify
 */

namespace Chargify\Forms\Account_Details;

use CMB2;

/**
 * Register the account details form fields.
 *
 * @param CMB2 $signup_form The CMB2 object holding the form and form fields.
 *
 * @return mixed
 */
function register_account_details_fields( $signup_form ) {

	$signup_form->add_field(
		[
			'name' => __( 'Account Details', 'chargify' ),
			'desc' => __( 'Please enter your account details below', 'chargify' ),
			'type' => 'title',
			'id'   => 'chargify_account_details_title',
		]
	);

	$signup_form->add_field(
		[
			'name'       => __( 'Username', 'chargify' ),
			'id'         => 'wordpress_username',
			'type'       => 'text',
			'desc'       => __( 'Your username.', 'chargify' ),
			'attributes' => [
				'placeholder' => __( 'Username', 'chargify' ),
			],
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_value',
		]
	);

	$signup_form->add_field(
		[
			'name'       => __( 'Password', 'chargify' ),
			'id'         => 'wordpress_password',
			'type'       => 'text',
			'desc'       => __( 'Your password.', 'chargify' ),
			'attributes' => [
				'placeholder' => __( 'Password', 'chargify' ),
				'type'        => 'password',
			],
			'default_cb' => 'Chargify\\Forms\\Submission\\maybe_set_default_value',
		]
	);

	// Filter the Customer Details form.
	return apply_filters( 'chargify_account_details_fields', $signup_form );
}
