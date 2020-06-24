<?php
namespace Chargify\Forms\Coupon_Details;

function register_coupon_fields( $signup_form ) {

	$signup_form->add_field( [
		'name' => __( 'Coupon Details', 'chargify' ),
		'desc' => __( 'Enter any coupon details below.', 'chargify' ),
		'type' => 'title',
		'id'   => 'chargify_coupon_title'
	] );

	$signup_form->add_field( [
		'name'       => __( 'Coupon Code', 'chargify' ),
		'id'         => 'chargify_coupon_code',
		'type'       => 'text',
		'desc'       => __( 'Enter a coupon code.', 'chargify' ),
	]);

	# Filter the Coupon Details form
	$fields = apply_filters( 'chargify_coupon_fields', $signup_form );

	return $fields;
}
