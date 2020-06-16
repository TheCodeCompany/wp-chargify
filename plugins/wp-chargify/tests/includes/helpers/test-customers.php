<?php
use Chargify\Helpers\Customers;
class Test_Customer_Helpers extends WP_UnitTestCase {
	public static $account;

	public static $post_meta = [
		'chargify_wordpress_user_id'   => '3',
		'chargify_user_id'             => '2345345',
		'chargify_subscription_status' => 'active',
		'chargify_expiration_date'     => '2012-10-09 11:49:43 -0400',
		'chargify_products_multicheck' => [
			'234234',
			'454536'
		]
	];

	/**
	 * Setup a post we can use throughout the tests.
	 *
	 * @param $factory
	 */
	public static function wpSetUpBeforeClass( $factory ) {
		self::$account = $factory->post->create_and_get( [
			'post_title'   => 'john@example.com',
			'post_status'  => 'publish',
			'post_type'    => 'chargify_account',
			'post_author'  => get_current_user_id(),
		] );

		foreach ( self::$post_meta as $key => $value ) {
			update_post_meta( self::$account->ID, $key, $value );
		}
	}

	function test_get_account_details() {
		$user_id = Customers\get_account_details( '3' );
		$this->assertTrue( $user_id->have_posts() );
	}
}
