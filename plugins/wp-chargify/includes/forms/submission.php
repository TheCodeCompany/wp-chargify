<?php
namespace Chargify\Forms\Submission;
use Chargify\Endpoints\Subscription;
use WP_Error;

function create_subscription( $cmb2 ) {
	$product_handle = get_query_var( 'product_handle' );

	if ( empty( $product_handle ) ) {
		# Filter the Chargify Product handle.
		$product_handle = apply_filters( 'chargify_default_product', $product_handle );
	}

	# If we don't have any post data we can bail.
    if ( empty( $_POST ) ) {
		return false;
	}

    // check required $_POST variables and security nonce
    if ( ! isset( $_POST['submit-cmb'], $_POST['object_id'], $_POST[ $cmb2->nonce() ] )  || ! wp_verify_nonce( $_POST[ $cmb2->nonce() ], $cmb2->nonce() ) ) {
		return new WP_Error( 'security_fail', __( 'Security check failed.', 'chargify' ) );
	}

	$sanitized_values = $cmb2->get_sanitized_values( $_POST );

	if ( $sanitized_values ) {
		$metafields     = apply_filters( 'chargify_signup_metafields', null );

		$chargify_data = [
			'subscription' => [
				'product_handle' => esc_attr( $product_handle ),
				'customer_attributes' => [
					'first_name'   => $sanitized_values['chargify_first_name'],
					'last_name'    => $sanitized_values['chargify_last_name'],
					'email'        => $sanitized_values['chargify_email_address'],
					'cc_emails'    => isset( $sanitized_values['chargify_cc_emails'] ) ? $sanitized_values['chargify_cc_emails'] : null,
					'organization' => isset( $sanitized_values['chargify_organisation'] ) ? $sanitized_values['chargify_organisation'] : null,
					'reference'    => isset( $sanitized_values['chargify_billing_reference'] ) ? $sanitized_values['chargify_billing_reference'] : (string) time(),
					'address'      => isset( $sanitized_values['chargify_address_1'] ) ? $sanitized_values['chargify_address_1'] : null,
					'address_2'    => isset( $sanitized_values['chargify_address_2'] ) ? $sanitized_values['chargify_address_2'] : null,
					'city'         => isset( $sanitized_values['chargify_city'] ) ? $sanitized_values['chargify_city'] : null,
					'state'        => isset( $sanitized_values['chargify_state'] ) ? $sanitized_values['chargify_state'] : null,
					'zip'          => isset( $sanitized_values['chargify_zip'] ) ? $sanitized_values['chargify_zip'] : null,
					'country'      => isset( $sanitized_values['chargify_country'] ) ? $sanitized_values['chargify_country'] : null,
					'phone'        => isset( $sanitized_values['chargify_phone'] ) ? $sanitized_values['chargify_phone'] : null,
					'verified'     => isset( $sanitized_values['chargify_verified'] ) ? $sanitized_values['chargify_verified'] : false,
					'tax_exempt'   => isset( $sanitized_values['chargify_tax_exempt'] ) ? $sanitized_values['chargify_tax_exempt'] : false,
					'vat_number'   => isset( $sanitized_values['chargify_vat_number'] ) ? $sanitized_values['chargify_vat_number'] : null,
				],
				'credit_card_attributes' => [
					'first_name'        => isset( $sanitized_values['chargify_billing_first_name'] ) ? $sanitized_values['chargify_billing_first_name'] : null,
					'last_name'         => isset( $sanitized_values['chargify_billing_last_name'] ) ? $sanitized_values['chargify_billing_last_name'] : null,
					'full_number'       => isset( $sanitized_values['chargify_payment_card_number'] ) ? $sanitized_values['chargify_payment_card_number'] : null,
					'expiration_month'  => isset( $sanitized_values['chargify_payment_expiry_month'] ) ? $sanitized_values['chargify_payment_expiry_month'] : null,
					'expiration_year'   => isset( $sanitized_values['chargify_payment_expiry_year'] ) ? $sanitized_values['chargify_payment_expiry_year'] : null,
					'billing_address'   => isset( $sanitized_values['chargify_billing_address_1'] ) ? $sanitized_values['chargify_billing_address_1'] : null,
					'billing_address_2' => isset( $sanitized_values['chargify_billing_address_2'] ) ? $sanitized_values['chargify_billing_address_2'] : null,
					'billing_city'      => isset( $sanitized_values['chargify_billing_city'] ) ? $sanitized_values['chargify_billing_city'] : null,
					'billing_state'     => isset( $sanitized_values['chargify_billing_state'] ) ? $sanitized_values['chargify_billing_state'] : null,
					'billing_zip'       => isset( $sanitized_values['chargify_billing_zip'] ) ? $sanitized_values['chargify_billing_zip'] : null,
					'billing_country'   => isset( $sanitized_values['chargify_billing_country'] ) ? $sanitized_values['chargify_billing_country'] : null,
				]
			]
		];

		if ( $metafields ) {
			$chargify_data['subscription']['metafields'] = $metafields;
		}

		$wordpress_data = [
			'username' => $sanitized_values['wordpress_username'],
			'password' => $sanitized_values['wordpress_password'],
		];

		$subscription = Subscription\create_subscription( wp_json_encode( $chargify_data ), $wordpress_data );

	}
	return false;
}

/**
 * A function to register our query parameter for the product handle.
 *
 * @param $query_vars
 * @return mixed
 */
function query_vars( $query_vars ) {
	$query_vars[] = 'product_handle';
	return $query_vars;
}
