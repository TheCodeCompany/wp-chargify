<?php
use Chargify\Chargify\Endpoints\Product_Families;

class Test_Chargify_Product_Families extends WP_UnitTestCase {

	public function setUp() {
		parent::setUp();
		add_filter( 'pre_http_request', array( $this, 'mock_product_request' ), 10, 3 );
	}

	public function tearDown() {
		parent::tearDown();
		remove_filter( 'pre_http_request', array( $this, 'mock_product_request' ), 10 );
	}

	function test_good_get_product() {
		$product = Product_Families\get_product( 1 );

		$contains = [
			'product' => [
				'id'                      => 5230866,
				'name'                    => 'Standard Plan',
				'description'             => 'Pariatur in beatae et tempore.  Vero impedit eum reiciendis.  Omnis inventore vel quisquam.',
				'updated_at'              => '2019-04-14T00:00:38-04:00',
				'price_in_cents'          => 9900,
				'interval'                => 1,
				'interval_unit'           => 'month',
				'initial_charge_in_cents' => null,
				'trial_price_in_cents'    => null,
				'trial_interval'          => null,
				'trial_interval_unit'     => null,
			]
		];

		$this->assertArraySubset( $contains, $product );
	}

	function test_bad_get_product() {
		$product = Product_Families\get_product( 0 );

		$this->assertContains( 'Not Found', $product );
	}

	public function mock_product_request( $preempt, $r, $url ) {

		// Mock request to Chargify product endpoint.
		if ( false !== strpos( $url, '/products/1.json' ) ) {
			return [
				'response' => [
					'code' => 200,
				],
				'body'     => wp_json_encode(
					[
						'product' => [
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
							'product_price_point_handle'     => 'uuid=>671e5980-77c5-0138-aae6-0a4d7438a8ec',
							'product_family'                 => [
									'id'              => 1525024,
									'name'            => 'Cloud Compute Servers',
									'description'     => null,
									'handle'          => 'cloud-compute-servers',
									'accounting_code' => null
							],
							'public_signup_pages'=> []
						],
					]
				),
			];
		} else {
			return [
				'response' => [
					'code'    => 404,
					'message' => 'Not Found'
				],
			];
		}
	}
}
