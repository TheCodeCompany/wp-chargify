<?php
namespace Chargify\Forms\Signup;
use Chargify\Forms\Customer_Details;
use Chargify\Forms\Account_Details;
use Chargify\Forms\Billing_Details;
use Chargify\Forms\Payment_Details;
use Chargify\Forms\Coupon_Details;
use Chargify\Forms\Submission;

function chargify_signup_form() {

	$signup_form_id = 'chargify_signup_form';

	$signup_form_fields = new_cmb2_box( [
		'id'           => $signup_form_id,
		'object_types' => [ 'chargify_account' ],
		'hookup'       => false,
		'save_fields'  => false,
	]);

	$signup_form_fields = Customer_Details\register_customer_details_fields( $signup_form_fields );
	$signup_form_fields = Account_Details\register_account_details_fields( $signup_form_fields );
	$signup_form_fields = Billing_Details\register_customer_billing_fields( $signup_form_fields );
	$signup_form_fields = Payment_Details\register_payment_fields( $signup_form_fields );
	$signup_form_fields = Coupon_Details\register_coupon_fields( $signup_form_fields );

	# Just a placeholder object id.
	$customer_details_object_id  = 'temp-signup-object-id';

	$form = cmb2_get_metabox( $signup_form_id, $customer_details_object_id );

	$create_subscription = Submission\create_subscription( $form );

	$signup_form_args = apply_filters( 'chargify_signup_form_args', [ 'save_button' => __( 'Signup', 'chargify' ) ] );

	$output = cmb2_get_metabox_form(
		$form,
		$customer_details_object_id,
		$signup_form_args
	);

	return $output;
}
