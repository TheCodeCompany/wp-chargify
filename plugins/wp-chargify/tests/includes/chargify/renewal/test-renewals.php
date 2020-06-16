<?php
use Chargify\Renewal;
use Chargify\Helpers\Customers;

class Test_Renewals extends WP_UnitTestCase {
	public static $account;
	public static $user;

	/**
	 * Setup a post we can use throughout the tests.
	 *
	 * @param $factory
	 */
	public static function wpSetUpBeforeClass( $factory ) {
		self::$user = $factory->user->create_and_get( [
			'user_login' => 'john@example.com',
			'user_email' => 'john@example.com',
			'role'       => 'chargify_user',
		] );

		self::$account = $factory->post->create_and_get( [
			'post_title'   => 'john@example.com',
			'post_status'  => 'publish',
			'post_type'    => 'chargify_account',
			'post_author'  => get_current_user_id(),
		] );

		$account_meta = [
			'chargify_wordpress_user_id'   => self::$user->ID,
			'chargify_user_id'             => '2345345',
			'chargify_subscription_status' => 'active',
			'chargify_expiration_date'     => '2012-10-09 11:49:43 -0400',
			'chargify_products_multicheck' => [
				'234234',
				'454536'
			]
		];

		foreach ( $account_meta as $key => $value ) {
			update_post_meta( self::$account->ID, $key, $value );
		}
	}

	function test_renewal_success() {
		$payload = [
			'subscription' => [
				'customer' => [
					'email' => 'john@example.com',
				],
				'state'                  => 'active',
				'current_period_ends_at' => '2069-10-09 11:49:43 -0400',
			],
		];
		Renewal\renewal_success( $payload );
		$account_details = Customers\get_account_details_from_email( 'john@example.com' );
		$this->assertEquals( 'active', get_post_meta( $account_details->post->ID, 'chargify_subscription_status', true ) );
		$this->assertEquals( '2069-10-09 11:49:43 -0400', get_post_meta( $account_details->post->ID, 'chargify_expiration_date', true ) );
	}
}
