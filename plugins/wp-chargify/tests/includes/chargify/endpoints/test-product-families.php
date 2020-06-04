<?php
use Chargify\Chargify\Endpoints\Product_Families;

class Test_Chargify_REST_Product_Families extends WP_UnitTestCase {

	public function setUp() {
		parent::setUp();

		# Setup some random options to test against.
		$chargify_options = [
			'chargify_production_API_key'   => '345345354t3erertsdfdsfg',
			'chargify_production_subdomain' => 'https://productionsubdomain.chargify.com',
			'chargify_test_API_key'         => '6787867867dfsdfgsfg',
			'chargify_test_subdomain'       => 'https://testsubdomain.chargify.com',
			'chargify_mode'                 => 'test'
		];

		add_option( 'chargify_settings', $chargify_options );
		add_filter( 'pre_http_request', array( $this, 'mock_product_families_request' ), 10, 3 );
	}

	public function tearDown() {
		parent::tearDown();
		remove_filter( 'pre_http_request', array( $this, 'mock_product_families_request' ), 10 );
	}

	function test_get_product_families() {
		$product_families = Product_Families\get_product_families();

		$contains = [
				'id'              => '1525024',
				'name'            => 'Cloud Compute Servers',
				'description'     => null,
				'handle'          => 'cloud-compute-servers',
				'accounting_code' => null,
		];

		$this->assertArraySubset( $contains, $product_families[0] );
	}

	public function mock_product_families_request( $preempt, $r, $url ) {
		// Mock request to Chargify product families endpoint.
		if ( false !== strpos( $url, '/product_families.json' ) ) {
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
