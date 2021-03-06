<?php
use Chargify\Helpers\Customers;
class Test_Customer_Endpoints extends WP_UnitTestCase {
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
			'chargify_test_shared_key'       => '7856756ydsfgsdft345445',
		];

		$webhook_options = [
			'chargify_webhooks_multicheck' => [
				'customer_update'
			]
		];

		add_option( 'chargify_settings', $chargify_options );
		add_option( 'chargify_webhooks', $webhook_options );
		add_filter( 'chargify_verify_request', '__return_true' );
	}

	protected static $data = [
		'id' => '724192602',
		'event' => 'customer_update',
		'payload' => [
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
			'site' => [
				'id'        => '70648',
				'subdomain' => 'demo--6646755387',
			]
		]
	];

	function test_endpoint() {
		$request = new WP_REST_Request( 'POST', sprintf( '/chargify/v1/webhook' ) );
		$request->set_body_params( self::$data );

		$response = rest_get_server()->dispatch( $request );
		$this->assertEquals( 200, $response->get_status() );

	}

	function test_create_customer() {
		$request = new WP_REST_Request( 'POST', sprintf( '/chargify/v1/webhook' ) );
		$request->set_body_params( self::$data );

		$response = rest_get_server()->dispatch( $request );

		$customer_created = Chargify\Helpers\Customers\get_account_details_from_email( 'john@example.com' );

		$this->assertNotFalse( $customer_created );
	}




}
