<?php
use Chargify\Chargify\Endpoints\Components;

class Test_Chargify_REST_Component extends WP_UnitTestCase {

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
		add_filter( 'pre_http_request', array( $this, 'mock_component_request' ), 10, 3 );
	}

	public function tearDown() {
		parent::tearDown();
		remove_filter( 'pre_http_request', array( $this, 'mock_component_request' ), 10 );
	}

	function test_good_get_product() {
		$component = Components\get_component( 'ip-addresses' );

		$contains = [
			'component' => [
				'id'                  => 980728,
				'name'                => 'IP Addresses',
				'handle'              => 'ip-addresses',
				'pricing_scheme'      => 'per_unit',
				'unit_name'           => 'address',
				'unit_price'          => '2.0',
				'product_family_id'   => 1525024,
				'product_family_name' => 'Cloud Compute Servers',
			]
		];

		$this->assertArraySubset( $contains, $component );
	}

	function test_bad_get_compontent() {
		$component = Components\get_component(  0 );

		$this->assertContains( 'Not Found', $component );
	}

	public function mock_component_request( $preempt, $r, $url ) {
		// Mock request to Chargify component endpoint.
		if ( false !== strpos( $url, '/components/lookup.json?handle=ip-addresses' ) ) {
			return [
				'response' => [
					'code' => 200,
				],
				'body'     => wp_json_encode(
					[
						'component' => [
							'id'                          => 980728,
							'name'                        => 'IP Addresses',
							'handle'                      => 'ip-addresses',
							'pricing_scheme'              => 'per_unit',
							'unit_name'                   => 'address',
							'unit_price'                  => '2.0',
							'product_family_id'           => 1525024,
							'product_family_name'         => 'Cloud Compute Servers',
							'price_per_unit_in_cents'     => null,
							'kind'                        => 'quantity_based_component',
							'archived'                    => false,
							'taxable'                     => true,
							'description'                 => null,
							'default_price_point_id'      => 861839,
							'prices'                   => [
								'id' => 1749485,
								'component_id'         => 980728,
								'starting_quantity'    => 1,
								'ending_quantity'      => null,
								'unit_price'           => '2.0',
								'price_point_id'       => 861839,
								'formatted_unit_price' => '$2.00',
								'segment_id'           => null
							],
							'price_point_count'           => 1,
							'price_points_url'            => 'https://demo--6646755387.chargify.com/components/980728/price_points',
							'default_price_point_name'    => 'Auto-created',
							'tax_code'                    => null,
							'recurring'                   => true,
							'upgrade_charge'              => null,
							'downgrade_credit'            => null,
							'created_at'                  => '2019-04-14T00:00:38-04:00',
							'hide_date_range_on_invoice'  => false,
							'allow_fractional_quantities' => false
						]
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
