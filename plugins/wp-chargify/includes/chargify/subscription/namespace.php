<?php
namespace Chargify\Subscription;

use Chargify\Customers;

/**
 * A function to create a new subscription.
 * @param $payload
 * @return int|\WP_Error
 */
function create_subscription( $payload ) {
	$user_id = Customers\maybe_update_customer( $payload['subscription'] );

	$args = [
		'post_type'    => 'chargify_account',
		'post_title'   => sanitize_email( $payload['subscription']['customer']['email'] ),
		'post_status'  => 'publish',
	];

	$subscription_id = wp_insert_post( $args );

	update_post_meta( $subscription_id, 'chargify_wordpress_user_id', absint( $user_id ) );
	update_post_meta( $subscription_id, 'chargify_user_id', absint( $payload['subscription']['customer']['id'] ) );
	update_post_meta( $subscription_id, 'chargify_subscription_status', sanitize_text_field( $payload['subscription']['state'] ) );
	update_post_meta( $subscription_id, 'chargify_expiration_date', sanitize_text_field( $payload['subscription']['current_period_ends_at'] ) );
	update_post_meta( $subscription_id, 'chargify_products_multicheck', sanitize_text_field( $payload['subscription']['product']['id'] ) );

	return $subscription_id;
}
