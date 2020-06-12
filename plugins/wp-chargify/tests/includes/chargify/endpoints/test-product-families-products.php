<?php
use Chargify\Chargify\Endpoints\Product_Families;

class Test_Chargify_REST_Product_Families_Products extends WP_UnitTestCase {

	public function setUp() {
		parent::setUp();

		# Setup some random options to test against.
		$chargify_options = [
			'chargify_production_API_key'    => '345345354t3erertsdfdsfg',
			'chargify_production_subdomain'  => 'https://productionsubdomain.chargify.com',
			'chargify_production_shared_key' => '456rtgfsrt456rsdsty456',
			'chargify_test_API_key'          => '6787867867dfsdfgsfg',
			'chargify_test_subdomain'        => 'https://testsubdomain.chargify.com',
			'chargify_mode'                  => 'test',
			'chargify_test_shared_key'       => '7856756ydsfgsdft345445'
		];

		add_option( 'chargify_settings', $chargify_options );
		add_filter( 'pre_http_request', array( $this, 'mock_product_families_products_request' ), 10, 3 );
	}

	public function tearDown() {
		parent::tearDown();
		remove_filter( 'pre_http_request', array( $this, 'mock_product_families_products_request' ), 10 );
	}

	function test_get_product_families_products() {
		$product_families_products = Product_Families\get_products();

		$contains = [
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
		];

		$this->assertArraySubset( $contains, $product_families_products[0] );
	}

	public function mock_product_families_products_request( $preempt, $r, $url ) {
		// Mock request to Chargify product families products endpoint.
		if ( false !== strpos( $url, '/product_families/1525024/products.json' ) || false !== strpos( $url, '/product_families/1525025/products.json' ) ) {
			return [
				'response' => [
					'code' => 200,
				],
				'body'     => wp_json_encode(
					[
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
						],
						[
							'product' => [
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
							],
						],

					]
				),
			];
		} elseif ( false !== strpos( $url, '/product_families.json' ) ) {
			return [
				'response' => [
					'code' => 200,
				],
				'body'     => wp_json_encode(
					[
						[
							'product_family' => [
								'id'              => '1525024',
								'name'            => 'Cloud Compute Servers',
								'description'     => null,
								'handle'          => 'cloud-compute-servers',
								'accounting_code' => null,
							],
						],
						[
							'product_family' => [
								'id'              => '1525025',
								'name'            => 'Cloud Database Service',
								'description'     => null,
								'handle'          => 'cloud-database-service',
								'accounting_code' => null,
							],
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
