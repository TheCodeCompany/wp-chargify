<?php
use Chargify\Subscription;

class Test_Subscription_Endpoints extends WP_UnitTestCase {
	protected static $data = [
		'id'      => '724192602',
		'event'   => 'customer_update',
		'payload' => [
			'subscription' => [
				'activated_at'            => '2012-09-09 11:38:33 -0400',
				'balance_in_cents'        => '9900',
				'cancel_at_end_of_period' => 'false',
				'canceled_at'             => '',
				'cancellation_message'    => '',
				'coupon_code'             => '',
				'created_at'              => '2012-09-09 11:38:32 -0400',
				'credit_card' => [
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
					'customer_vault_token' => ''
				],
				'current_period_ends_at'    => '2012-10-09 11:49:43 -0400',
        		'current_period_started_at' => '2012-09-09 11:49:43 -0400',
				'customer' => [
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
				'delayed_cancel_at'  => '',
				'expires_at'         => '',
				'id'                 => '0',
				'next_assessment_at' => '2012-10-09 11:49:43 -0400',
				'previous_state'     => 'active',
				'payment_type'       => 'credit_card',
				'product' => [
					'accounting_code'          => 'pro1234',
					'archived_at'              => '',
					'created_at'               => '2012-09-06 10:09:35 -0400',
					'description'              => 'Vel soluta nihil qui accusamus quidem.',
					'expiration_interval'      => '',
					'expiration_interval_unit' => 'never',
					'handle'                   => 'handle_6a9273b8a',
					'id'                       => '0',
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
						'name'            => 'Acme Online'
					],
					'request_credit_card'      => 'true',
					'require_credit_card'      => 'true',
					'return_params'            => '',
					'return_url'               => '',
					'trial_interval'           => '',
					'trial_interval_unit'      => 'month',
					'trial_price_in_cents'     => '',
					'update_return_url'        => '',
					'updated_at'               => '2012-09-09 11:36:53 -0400'
				],
				'signup_payment_id'      => '30',
				'signup_revenue'         => '99.00',
				'state'                  => 'active',
				'total_revenue_in_cents' => '4200',
				'trial_ended_at'         => '',
				'trial_started_at'       => '',
				'updated_at'             => '2012-09-09 11:49:44 -0400',
				'currency'               => 'USD'
			],
			'site'     => [
				'id'        => '70648',
				'subdomain' => 'demo--6646755387',
			],
		]
	];

	public function setUp() {
		parent::setUp();
		add_filter( 'chargify_verify_request', '__return_true' );
	}

	function test_create_subscription() {
		$subscription_id = Subscription\create_subscription( self::$data['payload'] );
		$this->assertNotFalse( $subscription_id );
	}
}
