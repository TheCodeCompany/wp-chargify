<?php
namespace Chargify\Helpers\Customers;

/**
 * A function to return the WordPress User ID for the Chargify user.
 *
 * @param $email
 * @return bool|false|int
 */
function get_wordpress_user_id_from_email( $email ) {
	$user_id = email_exists( $email );

	return $user_id;
}

/**
 * A function to return the Chargify account details from an email address.
 *
 * @param $email
 * @return \WP_Query
 */
function get_account_details_from_email( $email ) {
	$user_id = get_wordpress_user_id_from_email( $email );

	$account = get_account_details( $user_id );

	return $account;
}

/**
 * A function to return the Chargify Account details by using the WordPress user ID.
 *
 * @param $user_id
 * @return \WP_Query
 */
function get_account_details( $user_id ) {
	$account = new \WP_Query(
		[
			'post_type' => 'chargify_account',
			'meta_query' => [
				[
					'key'     => 'chargify_wordpress_user_id',
					'value'   => $user_id,
					'compare' => 'IN'
				]
			]
		]
	);

	return $account;
}
