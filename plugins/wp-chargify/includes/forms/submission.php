<?php
/**
 * The functions that help create a subscription from the form data.
 *
 * @file    wp-chargify/includes/forms/submission.php
 * @package WPChargify
 */

namespace Chargify\Forms\Submission;

use Chargify\Endpoints\Subscription;
use Chargify\Libraries\Requests;
use Chargify\Model\ChargifyComponentFactory;
use Chargify\Model\ChargifyComponentPricePointFactory;
use Chargify\Model\ChargifyProduct;
use Chargify\Model\ChargifyProductFactory;
use Chargify\Model\ChargifyProductPricePointFactory;
use CMB2;
use http\Env\Response;
use WP_Error;
use function Chargify\Helpers\products\get_product_family_id;

/**
 * Create a subscription, filter all of the form data into an array ready for the subscription submission.
 *
 * @param CMB2 $cmb2 The CMB2 object.
 *
 * @return mixed
 */
function create_subscription( $cmb2 ) {

	// If we don't have any post data we can bail.
	if ( empty( $_POST ) ) {
		return false;
	}

	// check required $_POST variables and security nonce.
	if ( ! isset( $_POST['submit-cmb'], $_POST['object_id'], $_POST[ $cmb2->nonce() ] ) || ! wp_verify_nonce( $_POST[ $cmb2->nonce() ], $cmb2->nonce() ) ) { // phpcs:ignore
		return new WP_Error( 'security_fail', __( 'Security check failed.', 'chargify' ) );
	}

	$sanitized_values = $cmb2->get_sanitized_values( $_POST );

	if ( $sanitized_values ) {
		$metafields = apply_filters( 'chargify_signup_metafields', null );

		$chargify_data = [
			'subscription' => [
				'product_handle'         => isset( $sanitized_values['product_handle'] ) ? $sanitized_values['product_handle'] : '',
				'customer_attributes'    => [
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
				],
			],
		];

		// Add other info to the subscription.
		$product_id = isset( $sanitized_values['product_id'] ) ? $sanitized_values['product_id'] : false;
		if ( $product_id ) {
			$chargify_data['subscription']['product_id'] = $product_id;
		}

		// Add other info to the subscription.
		$product_price_point_handle = isset( $sanitized_values['product_price_point_handle'] ) ? $sanitized_values['product_price_point_handle'] : false;
		if ( $product_price_point_handle ) {
			$chargify_data['subscription']['product_price_point_handle'] = $product_price_point_handle;
		}

		// Add other info to the subscription.
		$chargify_product_price_point_id = isset( $sanitized_values['product_price_point_id'] ) ? $sanitized_values['product_price_point_id'] : false;
		if ( $chargify_product_price_point_id ) {
			$chargify_data['subscription']['product_price_point_id'] = $chargify_product_price_point_id;
		}

		// Add other info to the subscription.
		$coupon_code = isset( $sanitized_values['chargify_coupon_code'] ) ? $sanitized_values['chargify_coupon_code'] : false;
		if ( $coupon_code ) {
			$chargify_data['subscription']['coupon_code'] = $coupon_code;
		}

		// Add components to the subscription.
		$component_id = isset( $sanitized_values['component_id'] ) ? $sanitized_values['component_id'] : false;
		if ( $component_id ) {
			$chargify_data['subscription']['components'] = [
				'component_id'                 => $component_id,
				'price_point_id'               => isset( $sanitized_values['component_price_point_id'] ) ? $sanitized_values['component_price_point_id'] : null,
				'component_price_point_handle' => isset( $sanitized_values['component_price_point_handle'] ) ? $sanitized_values['component_price_point_handle'] : null,
				'allocated_quantity'           => isset( $sanitized_values['component_allocated_quantity'] ) ? $sanitized_values['component_allocated_quantity'] : null,
			];
		}

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

