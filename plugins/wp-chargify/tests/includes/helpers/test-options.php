<?php
use Chargify\Helpers\Options;

class Test_Option_Helpers extends WP_UnitTestCase {
	public function setUp(){
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
	}

	function test_get_production_api_key() {
		$production_api_key = Options\get_production_api_key();
		$this->assertEquals( '345345354t3erertsdfdsfg', $production_api_key );
	}

	function test_get_production_subdomain() {
		$production_subdomain = Options\get_production_subdomain();
		$this->assertEquals( 'https://productionsubdomain.chargify.com', $production_subdomain );
	}

	function test_get_test_api_key() {
		$test_api_key = Options\get_test_api_key();
		$this->assertEquals( '6787867867dfsdfgsfg', $test_api_key);
	}

	function test_get_test_subdomain() {
		$test_subdomain = Options\get_test_subdomain();
		$this->assertEquals( 'https://testsubdomain.chargify.com', $test_subdomain );
	}

	function test_chargify_mode() {
		$chargify_mode = Options\get_mode();
		$this->assertEquals( 'test', $chargify_mode );
	}

	public function tearDown(){
		delete_option( 'chargify_settings' );
	}
}
