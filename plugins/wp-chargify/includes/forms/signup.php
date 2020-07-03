<?php
/**
 * The signup form including the main registration of the form fields.
 *
 * @file    wp-chargify/includes/forms/customer-details.php
 * @package WPChargify
 */

namespace Chargify\Forms\Signup;

use Chargify\Forms\Message_Details;
use Chargify\Forms\Customer_Details;
use Chargify\Forms\Account_Details;
use Chargify\Forms\Billing_Details;
use Chargify\Forms\Payment_Details;
use Chargify\Forms\Coupon_Details;
use Chargify\Forms\Submission;

/**
 * The signup form including the main registration of the form fields.
 *
 * @return mixed
 */
function chargify_signup_form() {

	$signup_form_id = 'chargify_signup_form';

	$signup_form_fields = new_cmb2_box(
		[
			'id'           => $signup_form_id,
			'object_types' => [ 'chargify_account' ],
			'hookup'       => false,
			'save_fields'  => false,
		]
	);

	// Add all of the form fields.
	$signup_form_fields = Message_Details\register_message_details_fields( $signup_form_fields );
	$signup_form_fields = Customer_Details\register_customer_details_fields( $signup_form_fields );
	$signup_form_fields = Account_Details\register_account_details_fields( $signup_form_fields );
	$signup_form_fields = Billing_Details\register_customer_billing_fields( $signup_form_fields );
	$signup_form_fields = Payment_Details\register_payment_fields( $signup_form_fields );
	$signup_form_fields = Coupon_Details\register_coupon_fields( $signup_form_fields );

	// Just a placeholder object id.
	$customer_details_object_id = 'temp-signup-object-id';

	$form = cmb2_get_metabox( $signup_form_id, $customer_details_object_id );

	// Create a subscription in Chargify.
	$create_subscription = Submission\create_subscription( $form );

	$signup_form_attributes = apply_filters(
		'chargify_signup_form_attributes',
		[
			'class'        => '',
			'autocomplete' => 'on',
		]
	);

	$signup_form_args = apply_filters(
		'chargify_signup_form_args',
		[
			'form_format' => form_format( $signup_form_attributes ),
			'save_button' => __( 'Signup', 'chargify' ),
			'cmb_styles'  => true,
		]
	);

	return cmb2_get_metabox_form(
		$form,
		$customer_details_object_id,
		$signup_form_args
	);
}

/**
 * Add form attributes to the standard cmb form format.
 * Can be things such as data attributes, or class attribute.
 *
 * This does not change id, method and enctype attributes.
 *
 * @param array $form_attributes Additional attributes.
 *
 * @return false|string
 */
function form_format( $form_attributes = [] ) {

	// Ensure that the standard cmb className is set.
	if ( isset( $form_attributes['class'] ) ) {
		if ( false === strpos( '', 'cmb-form' ) ) {
			$form_attributes['class'] = 'cmb-form ' . $form_attributes['class'];
		}
	} else {
		$form_attributes['class'] = 'cmb-form';
	}

	ob_start();
	?>
	<form id="%1$s"
		method="post"
		enctype="multipart/form-data"
		<?php
		if ( ! empty( $form_attributes ) ) :
			foreach ( $form_attributes as $attribute => $value ) :
				echo esc_attr( $attribute ) . '="' . esc_attr( $value ) . '" ';
			endforeach;
		endif;
		?>
	>
		<input type="hidden" name="object_id" value="%2$s">%3$s<input type="submit" name="submit-cmb" value="%4$s" class="button-primary">
	</form>
	<?php

	return ob_get_clean();
}
