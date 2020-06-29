<?php
namespace Chargify\Subscription;

use Chargify\Customers;

/**
 * A function to create a new subscription.
 * @param $chargify_subscription
 * @return int|\WP_Error
 */
function create_wordpress_subscription( $chargify_subscription, $wordpress_data ) {
	$user_id = Customers\maybe_update_customer( $chargify_subscription['subscription'], $wordpress_data );

	$args = [
		'post_type'    => 'chargify_account',
		'post_title'   => sanitize_email( $chargify_subscription['subscription']['customer']['email'] ),
		'post_status'  => 'publish',
	];

	$subscription_id = wp_insert_post( $args );

	update_post_meta( $subscription_id, 'chargify_wordpress_user_id', absint( $user_id ) );
	update_post_meta( $subscription_id, 'chargify_user_id', absint( $chargify_subscription['subscription']['customer']['id'] ) );
	update_post_meta( $subscription_id, 'chargify_subscription_status', sanitize_text_field( $chargify_subscription['subscription']['state'] ) );
	update_post_meta( $subscription_id, 'chargify_expiration_date', sanitize_text_field( $chargify_subscription['subscription']['current_period_ends_at'] ) );
	update_post_meta( $subscription_id, 'chargify_products_multicheck', sanitize_text_field( $chargify_subscription['subscription']['product']['id'] ) );

	return $subscription_id;
}

/**
 * A function to check if a user has a subscription to a product.
 *
 * @param $product_id     The product ID in Chargify.
 * @param string $user_id A WordPress user ID.
 * @return array|bool     An array of user IDs, true or false.
 */
function has_product_subscription( $product_id, $user_id = '' ) {

	if ( $product_id && $user_id ) {
		$subscription_check = new \WP_Query(
			[
				'post_type'  => 'chargify_account',
				'meta_query' => [
					'relation' => 'AND',
					[
						'meta_key' => 'chargify_wordpress_user_id',
						'value'    => $user_id,
						'compare'  => '=',
					],
					[
						'meta_key' => 'chargify_products_multicheck',
						'value'    => $product_id,
						'compare'  => '=',
					]
				]
			]
		);

		if ( $subscription_check->have_posts() ) {
			wp_reset_postdata();
			return true;
		}
	} else {
		$subscription_check = new \WP_Query(
			[
				'post_type'  => 'chargify_account',
				'meta_query' => [
					[
						'meta_key' => 'chargify_products_multicheck',
						'value'    => $product_id,
						'compare'  => '=',
					]
				]
			]
		);

		$user_ids = [];
		if ( $subscription_check->have_posts() ) {
			while ( $subscription_check->have_posts() ) {
				$subscription_check->the_post();
				$user_ids[] = get_post_meta( get_the_ID(), 'chargify_wordpress_user_id', true );
			}
		}
		wp_reset_postdata();
	}

	if ( ! empty( $user_ids ) ) {
		return $user_ids;
	}

	return false;
}
