<?php
use Chargify\Helpers\Options;
use Chargify\Admin\Helpers;

class Test_Option_Helpers extends WP_UnitTestCase {
	public function setUp(){
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
	}

	function test_get_production_api_key() {
		$production_api_key = Options\get_production_api_key();
		$this->assertEquals( '345345354t3erertsdfdsfg', $production_api_key );
	}

	function test_get_production_subdomain() {
		$production_subdomain = Options\get_production_subdomain();
		$this->assertEquals( 'https://productionsubdomain.chargify.com', $production_subdomain );
	}

	function test_get_production_shared_key() {
		$production_shared_key = Options\get_production_shared_key();
		$this->assertEquals( '456rtgfsrt456rsdsty456', $production_shared_key );
	}

	function test_get_test_api_key() {
		$test_api_key = Options\get_test_api_key();
		$this->assertEquals( '6787867867dfsdfgsfg', $test_api_key);
	}

	function test_get_test_subdomain() {
		$test_subdomain = Options\get_test_subdomain();
		$this->assertEquals( 'https://testsubdomain.chargify.com', $test_subdomain );
	}

	function test_get_test_shared_key() {
		$test_shared_key = Options\get_test_shared_key();
		$this->assertEquals( '7856756ydsfgsdft345445', $test_shared_key );
	}

	function test_chargify_mode() {
		$chargify_mode = Options\get_mode();
		$this->assertEquals( 'test', $chargify_mode );
	}

	function test_get_production_api_key_with_constant() {
		define( 'CHARGIFY_PRODUCTION_API_KEY', '7897896567567fgfghftgdfgfg' );
		$production_api_key = Options\get_production_api_key();
		$this->assertEquals( '7897896567567fgfghftgdfgfg', $production_api_key );
	}

	function test_get_production_subdomain_with_constant() {
		define( 'CHARGIFY_PRODUCTION_SUBDOMAIN', 'https://yourproductionsubdomain.chargify.com' );
		$production_subdomain = Options\get_production_subdomain();
		$this->assertEquals( 'https://yourproductionsubdomain.chargify.com', $production_subdomain );
	}

	function test_get_production_shared_key_with_constant() {
		define( 'CHARGIFY_PRODUCTION_SHARED_KEY', '678678234234546sdfgsd' );
		$production_shared_key = Options\get_production_shared_key();
		$this->assertEquals( '678678234234546sdfgsd', $production_shared_key );
	}

	function test_get_test_api_key_with_constant() {
		define( 'CHARGIFY_TEST_API_KEY', '675675645vbvbnvbnvbn' );
		$test_api_key = Options\get_test_api_key();
		$this->assertEquals( '675675645vbvbnvbnvbn', $test_api_key);
	}

	function test_get_test_subdomain_with_constant() {
		define( 'CHARGIFY_TEST_SUBDOMAIN', 'https://yoursubdomain.chargify.com' );
		$test_subdomain = Options\get_test_subdomain();
		$this->assertEquals( 'https://yoursubdomain.chargify.com', $test_subdomain );
	}

	function test_get_test_shared_key_with_constant() {
		define( 'CHARGIFY_TEST_SHARED_KEY', '545645dfgdfge5456' );
		$test_shared_key = Options\get_test_shared_key();
		$this->assertEquals( '545645dfgdfge5456', $test_shared_key );
	}

	function test_chargify_mode_with_constant() {
		define( 'CHARGIFY_MODE', 'live' );
		$chargify_mode = Options\get_mode();
		$this->assertEquals( 'live', $chargify_mode );
	}

	function test_get_api_key() {
		$api_key = Options\get_api_key();
		# CHARGIFY_PRODUCTION_API_KEY is defined and CHARGIFY_MODE is set to live.
		$this->assertEquals( '7897896567567fgfghftgdfgfg', $api_key );
	}

	function test_get_subdomain() {
		$subdomain = Options\get_subdomain();
		# Because CHARGIFY_PRODUCTION_SUBDOMAIN is defined and CHARGIFY_MODE is set to live.
		$this->assertEquals( 'https://yourproductionsubdomain.chargify.com', $subdomain );
	}

	function test_delete_options() {
		$settings = get_option( 'chargify_settings' );
		$this->assertNotEmpty( $settings );
		Helpers\delete_settings();
		$settings = get_option( 'chargify_settings' );
		$this->assertEmpty( $settings );
	}

	public function tearDown(){
		delete_option( 'chargify_settings' );
	}
}
