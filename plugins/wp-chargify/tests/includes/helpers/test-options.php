<?php
use Chargify\Helpers\Options;

class Test_Option_Helpers extends WP_UnitTestCase {
	public function setUp(){
		parent::setUp();

		$chargify_options = [
			'chargify_production_API_key'   => 'c66318b166ad76bdffbf980e4203e159c4650f5591dbc9acd6992d1cbdff4bf0',
			'chargify_production_subdomain' => 'https://productionsubdomain.chargify.com',
			'chargify_test_API_key'         => 'Vrc6WuZTZBZc0ORr5vcKuIwdTNDBH5adjmvFfzWwQWU',
			'chargify_test_subdomain'       => 'https://testsubdomain.chargify.com',
			'chargify_mode'                 => 'test'
		];

		add_option( 'chargify_settings', $chargify_options );
	}

	function test_get_production_api_key() {
		# Test empty option.
		$api_key = Options\get_production_api_key();
		$this->assertFalse( $api_key );
	}
}
