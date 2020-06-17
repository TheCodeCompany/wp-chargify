<?php
use Chargify\Post_Types\Helpers;
class Test_Post_Type_Helpers extends WP_UnitTestCase {

	public static $product;

	/**
	 * Setup a post we can use throughout the tests.
	 *
	 * @param $factory
	 */
	public static function wpSetUpBeforeClass( $factory ) {
		self::$product = $factory->post->create_and_get( [
			'post_title'   => 'Fake Product',
			'post_status'  => 'publish',
			'post_type'    => 'chargify_product',
			'post_author'  => get_current_user_id(),
		] );

		$product_meta = [
			'chargify_product_id'        => '1525024',
			'chargify_price'             => '99.00',
			'chargify_initial_cost'      => '69.00',
			'chargify_interval_unit'     => 'week',
			'chargify_interval'          => '3',
			'chargify_product_family_id' => '1525024',
			'chargify_product_family'    => 'Cloud Compute Servers',
		];

		foreach ( $product_meta as $key => $value ) {
			update_post_meta( self::$product->ID, $key, $value );
		}
	}

	function test_populate_product_post_types() {
		Helpers\populate_product_post_types( $this->mock_product_families_products_request() );

		$products = new WP_Query([
			'post_type' => 'chargify_product',
		]);

		$this->assertEquals( 'Standard Plan', $products->posts[1]->post_title );
		$this->assertEquals( 'Pariatur in beatae et tempore.  Vero impedit eum reiciendis.  Omnis inventore vel quisquam.', $products->posts[1]->post_content );
		$this->assertEquals( '99', get_post_meta( $products->posts[1]->ID, 'chargify_price', true ) );
		$this->assertEmpty( get_post_meta( $products->posts[1]->ID, 'chargify_initial_cost', true ) );
		$this->assertEquals( 'month', get_post_meta( $products->posts[1]->ID, 'chargify_interval_unit', true ) );
		$this->assertEquals( '1', get_post_meta( $products->posts[1]->ID, 'chargify_interval', true ) );
		$this->assertEquals( '1525024', get_post_meta( $products->posts[1]->ID, 'chargify_product_family_id', true ) );
		$this->assertEquals( 'Cloud Compute Servers', get_post_meta( $products->posts[1]->ID, 'chargify_product_family', true ) );
	}

	function test_chargify_products_all_option() {
		Helpers\populate_product_post_types( $this->mock_product_families_products_request() );

		$this->assertNotEmpty( get_option( 'chargify_products_all' ) );
	}

	function test_subscription_product_change() {
		$payload      = $this->mock_subscription_product_change();
		$product_id      = Helpers\update_product( $payload['subscription']['product'] );
		$product_meta = get_post_meta( $product_id );
		$contains = [
			'chargify_price'             => [ 99 ],
			'chargify_initial_cost'      => [ 0 ],
			'chargify_interval_unit'     => [ 'month' ],
			'chargify_interval'          => [ 1 ],
			'chargify_product_family_id' => [ 0 ],
			'chargify_product_family'    => [ 'Acme Online' ],
		];

		$this->assertArraySubset( $contains, $product_meta );
	}

	function mock_subscription_product_change() {
		return [
			'site'         => [
				'id'        => '70648',
				'subdomain' => 'demo--6646755387',
			],
			'subscription' => [
				'activated_at'            => '2012-09-09 11:38:33 -0400',
				'balance_in_cents'        => '9900',
				'cancel_at_end_of_period' => 'false',
				'canceled_at'             => '',
				'cancellation_message'    => '',
				'coupon_code'             => '',
				'created_at'              => '2012-09-09 11:38:32 -0400',
				'credit_card'             => [
						'billing_address'      => '987 Commerce St',
						'billing_address_2'    => 'Suite 789',
						'billing_city'         => 'Greenberg',
						'billing_country'      => 'US',
						'billing_state'        => 'NC',
						'billing_zip'          => '67890',
						'card_type'            => 'visa',
						'current_vault'        => 'bogus',
						'customer_id'          => '0',
						'expiration_month'     => '4',
						'expiration_year'      => '2016',
						'first_name'           => 'Jane',
						'id'                   => '0',
						'last_name'            => 'Doe',
						'masked_card_number'   => 'XXXX-XXXX-XXXX-1111',
						'vault_token'          => '1',
						'customer_vault_token' => '',
				],
				'current_period_ends_at'    => '2012-10-09 11:49:43 -0400',
				'current_period_started_at' => '2012-09-09 11:49:43 -0400',
				'customer'                  => [
					'address'      => '123 Main St',
					'address_2'    => 'Apt 123',
					'city'         => 'Pleasantville',
					'country'      => 'US',
					'created_at'   => '2012-09-09 11:38:32 -0400',
					'email'        => 'john@example.com',
					'first_name'   => 'John',
					'id'           => '0',
					'last_name'    => 'Doe',
					'organization' => 'Acme, Inc.',
					'phone'        => '555-555-1234',
					'reference'    => 'johndoe',
					'state'        => 'NC',
					'updated_at'   => '2012-09-09 11:38:32 -0400',
					'zip'          => '12345',
				],
				'delayed_cancel_at'          => '',
				'expires_at'                 => '',
				'id'                         => '0',
				'next_assessment_at'         => '2012-10-09 11:49:43 -0400',
				'previous_state'             => 'active',
				'payment_type'               => 'credit_card',
				'product'                    => [
					'accounting_code'          => 'pro1234',
					'archived_at'              => '1525024',
					'created_at'               => '2012-09-06 10:09:35 -0400',
					'description'              => 'Vel soluta nihil qui accusamus quidem.',
					'expiration_interval'      => '',
					'expiration_interval_unit' => 'never',
					'handle'                   => 'handle_6a9273b8a',
					'id'                       => '1525024',
					'initial_charge_in_cents'  => '',
					'interval'                 => '1',
					'interval_unit'            => 'month',
					'name'                     => 'Pro',
					'price_in_cents'           => '9900',
					'product_family'           => [
						'accounting_code' => 'aopf1234',
						'description'     => 'Lorem ipsum dolor sit amet.',
						'handle'          => 'acme-online',
						'id'              => '0',
						'name'            => 'Acme Online',
					],
					'request_credit_card'      => 'true',
					'require_credit_card'      => 'true',
					'return_params'            => '',
					'return_url'               => '',
					'trial_interval'           => '',
					'trial_interval_unit'      => 'month',
					'trial_price_in_cents'     => '',
					'update_return_url'        => '',
					'updated_at'               => '2012-09-09 11:36:53 -0400',
				],
				'signup_payment_id'      => '30',
				'signup_revenue'         => '99.00',
				'state'                  => 'active',
				'total_revenue_in_cents' => '4200',
				'trial_ended_at'         => '',
				'trial_started_at'       => '',
				'updated_at'             => '2012-09-09 11:49:44 -0400',
				'currency'               => 'USD',
			],
			'previous_product' => [
				'accounting_code'            => 'pro1234',
				'archived_at'                => '',
				'created_at'                 => '2012-09-06 10:09:35 -0400',
				'description'                => 'Vel soluta nihil qui accusamus quidem.',
				'expiration_interval'        => '',
				'expiration_interval_unit'   => 'never',
				'handle'                     => 'handle_6a9273b8a',
				'id'                         => '1525024',
				'initial_charge_in_cents'    => '',
				'interval'                   => '1',
				'interval_unit'              => 'month',
				'name'                       => 'Pro',
				'price_in_cents'             => '9900',
				'product_family'             => [
					'accounting_code' => 'aopf1234',
					'description'     => 'Lorem ipsum dolor sit amet.',
					'handle'          => 'acme-online',
					'id'              => '0',
					'name'            => 'Acme Online',
				],
				'request_credit_card'  => 'true',
				'require_credit_card'  => 'true',
				'return_params'        => '',
				'return_url'           => '',
				'trial_interval'       => '',
				'trial_interval_unit'  => 'month',
				'trial_price_in_cents' => '',
				'update_return_url'    => '',
				'updated_at'           => '2012-09-09 11:36:53 -0400',
			],
		];
	}

	public function mock_product_families_products_request() {
		return
				[
					[
						'id'                             => 5230866,
						'name'                           => 'Standard Plan',
						'handle'                         => 'server-standard',
						'description'                    => 'Pariatur in beatae et tempore.  Vero impedit eum reiciendis.  Omnis inventore vel quisquam.',
						'accounting_code'                => null,
						'request_credit_card'            => true,
						'expiration_interval'            => null,
						'expiration_interval_unit'       => null,
						'created_at'                     => '2019-04-14T00:00:38-04:00',
						'updated_at'                     => '2019-04-14T00:00:38-04:00',
						'price_in_cents'                 => 9900,
						'interval'                       => 1,
						'interval_unit'                  => 'month',
						'initial_charge_in_cents'        => null,
						'trial_price_in_cents'           => null,
						'trial_interval'                 => null,
						'trial_interval_unit'            => null,
						'archived_at'                    => null,
						'require_credit_card'            => true,
						'return_params'                  => null,
						'taxable'                        => true,
						'update_return_url'              => null,
						'tax_code'                       => null,
						'initial_charge_after_trial'     => false,
						'version_number'                 => 1,
						'update_return_params'           => null,
						'default_product_price_point_id' => 929380,
						'request_billing_address'        => false,
						'require_billing_address'        => false,
						'require_shipping_address'       => false,
						'product_price_point_id'         => 929380,
						'product_price_point_name'       => 'Default',
						'product_price_point_handle'     => 'uuid:671e5980-77c5-0138-aae6-0a4d7438a8ec',
						'product_family'                 => [
							'id'              => 1525024,
							'name'            => 'Cloud Compute Servers',
							'description'     => null,
							'handle'          => 'cloud-compute-servers',
							'accounting_code' => null
						],
						'public_signup_pages'=> []
					],
					[
						'id'                             => 5230867,
						'name'                           => 'Professional Plan',
						'handle'                         => 'server-professional',
						'description'                    => 'Et optio quaerat dolores sapiente a voluptas.  Ut eius placeat et possimus enim accusantium.  Ab illum recusandae quam.',
						'accounting_code'                => null,
						'request_credit_card'            => true,
						'expiration_interval'            => null,
						'expiration_interval_unit'       => null,
						'created_at'                     => '2019-04-14T00:00:38-04:00',
						'updated_at'                     => '2019-04-14T00:00:38-04:00',
						'price_in_cents'                 => 29900,
						'interval'                       => 1,
						'interval_unit'                  => 'month',
						'initial_charge_in_cents'        => null,
						'trial_price_in_cents'           => null,
						'trial_interval'                 => null,
						'trial_interval_unit'            => null,
						'archived_at'                    => null,
						'require_credit_card'            => true,
						'return_params'                  => null,
						'taxable'                        => true,
						'update_return_url'              => null,
						'tax_code'                       => null,
						'initial_charge_after_trial'     => false,
						'version_number'                 => 1,
						'update_return_params'           => null,
						'default_product_price_point_id' => 929381,
						'request_billing_address'        => false,
						'require_billing_address'        => false,
						'require_shipping_address'       => false,
						'product_price_point_id'         => 929381,
						'product_price_point_name'       => 'Default',
						'product_price_point_handle'     => 'uuid:674311f0-77c5-0138-aae6-0a4d7438a8ec',
						'product_family'                 => [
							'id'              => 1525024,
							'name'            => 'Cloud Compute Servers',
							'description'     => null,
							'handle'          => 'cloud-compute-servers',
							'accounting_code' => null
						],
						'public_signup_pages'=> []
					]
		];
	}
}
