<?php
namespace Chargify\Renewal;
use Chargify\Helpers\Customers;

function renewal_success( $payload ) {
	$account_details = Customers\get_account_details_from_email( $payload['subscription']['customer']['email'] );
	# Update expiration date.
	update_post_meta( $account_details->post->ID, 'chargify_subscription_status', sanitize_text_field( $payload['subscription']['state'] ) );
	update_post_meta( $account_details->post->ID, 'chargify_expiration_date', sanitize_text_field( $payload['subscription']['current_period_ends_at'] ) );
}

function renewal_failure( $payload ) {
	$account_details = Customers\get_account_details_from_email( $payload['subscription']['customer']['email'] );
	# Update expiration date.
	update_post_meta( $account_details->post->ID, 'chargify_subscription_status', sanitize_text_field( $payload['subscription']['state'] ) );
	update_post_meta( $account_details->post->ID, 'chargify_expiration_date', sanitize_text_field( $payload['subscription']['current_period_ends_at'] ) );
}
